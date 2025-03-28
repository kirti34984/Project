<?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filePath = sys_get_temp_dir() . '/' . $file;

    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        unlink($filePath); // Delete the file after download
        exit;
    }
}
?>
