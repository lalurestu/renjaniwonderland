<?php
include 'includes/db_connect.php';

header('Content-Type: text/plain');

if ($conn->connect_error) {
    echo "error: Connection failed: " . $conn->connect_error;
    exit;
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql_select = "SELECT image FROM packages WHERE id = ?";
    $stmt_select = $conn->prepare($sql_select);
    
    if ($stmt_select) {
        $stmt_select->bind_param("i", $id);
        $stmt_select->execute();
        $stmt_select->bind_result($image_path);
        $stmt_select->fetch();
        $stmt_select->close();

        $sql = "DELETE FROM packages WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo "error: " . $conn->error;
            $conn->close();
            exit;
        }

        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if (!empty($image_path) && file_exists($image_path)) {
                unlink($image_path);
            }
            echo "success";
        } else {
            echo "error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "error: " . $conn->error;
    }
} else {
    echo "error: No ID provided.";
}

$conn->close();
?>