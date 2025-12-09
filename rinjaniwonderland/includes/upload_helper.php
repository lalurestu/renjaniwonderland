<?php

declare(strict_types=1);

function ensure_uploads_dir(): string {
  $dir = __DIR__ . '/uploads';
  if (!file_exists($dir)) { @mkdir($dir, 0777, true); }
  return $dir;
}

function save_uploaded_image(array $file): ?string {
  if (!isset($file['error']) || is_array($file['error'])) return null;
  if ($file['error'] !== UPLOAD_ERR_OK) return null;


  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $mime = $finfo->file($file['tmp_name']);
  $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
  if (!isset($allowed[$mime])) return null;

  $ext = $allowed[$mime];
  $basename = bin2hex(random_bytes(8)) . '.' . $ext;

  $dir = ensure_uploads_dir();
  $dest = $dir . '/' . $basename;

  if (!move_uploaded_file($file['tmp_name'], $dest)) return null;


  return 'uploads/' . $basename;
}
