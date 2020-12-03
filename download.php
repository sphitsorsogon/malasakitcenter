<?php 
$file = $_GET['file'];

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
} else {
    $id = $_GET['id'];
    $url = "./home.php?id=$id";
    $url = str_replace(PHP_EOL, '', $url);
    header("Location: $url");
}


?>