<?php
include 'includes/db_connect.php';

header('Content-Type: text/plain');

if ($conn->connect_error) {
    echo "error: Connection failed: " . $conn->connect_error;
    exit;
}

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = intval($_POST['id']);
    
    error_log("Debug: Deleting photography package ID: " . $id);

    // First, get the image path to delete the file
    $sql_select = "SELECT image FROM photography_packages WHERE id = ?";
    $stmt_select = $conn->prepare($sql_select);
    
    if ($stmt_select) {
        $stmt_select->bind_param("i", $id);
        $stmt_select->execute();
        $stmt_select->bind_result($image_path);
        $stmt_select->fetch();
        $stmt_select->close();

        error_log("Debug: Image path from DB: " . $image_path);

        // Delete the image file if it exists
        if (!empty($image_path)) {
            // Fix path issue - handle relative paths
            $actual_image_path = $image_path;
            
            // If path is relative, make it absolute
            if (strpos($image_path, '/') !== 0 && strpos($image_path, 'http') !== 0) {
                $actual_image_path = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($image_path, '/');
            }
            
            error_log("Debug: Actual image path: " . $actual_image_path);
            
            if (file_exists($actual_image_path)) {
                if (unlink($actual_image_path)) {
                    error_log("Debug: Image file deleted successfully");
                } else {
                    error_log("Debug: Failed to delete image file");
                    // Continue with database deletion even if file delete fails
                }
            } else {
                error_log("Debug: Image file not found at: " . $actual_image_path);
                // Continue with database deletion even if file not found
            }
        }

        // Prepare the DELETE query
        $sql = "DELETE FROM photography_packages WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo "error: Prepare failed - " . $conn->error;
            $conn->close();
            exit;
        }

        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "success";
                error_log("Debug: Database record deleted successfully");
            } else {
                echo "error: No record found with ID: " . $id;
                error_log("Debug: No record found with ID: " . $id);
            }
        } else {
            echo "error: Execute failed - " . $stmt->error;
            error_log("Debug: Execute failed: " . $stmt->error);
        }

        $stmt->close();
    } else {
        echo "error: Select prepare failed - " . $conn->error;
        error_log("Debug: Select prepare failed: " . $conn->error);
    }
} else {
    echo "error: No ID provided or ID is empty";
    error_log("Debug: No valid ID provided");
}

$conn->close();
?>