<?php
use is\prototype\ProcessManager;
use is\prototype\FileManager;

/**
 * This is not a good example of safe file upload handling.
 * For quick and dirty prototyping only.
 */

$uploaddir = './uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print_r($_FILES['error']);

print "</pre>";

?>
