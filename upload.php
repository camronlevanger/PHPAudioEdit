<?php
use is\prototype\ProcessManager;
use is\prototype\FileManager;

include_once('is/prototype/ProcessManager.php');
include_once('is/prototype/FileManager.php');

/**
 * This is not a good example of safe file upload handling.
 * For quick and dirty prototyping only.
 */

$uploaddir = './uploads/';
$clipdir = './clips/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$clippedfile = $clipdir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

$fm = new FileManager();
$upload_size = $fm->display_filesize($_FILES['userfile']['size']);

echo 'Here is some more debugging info:';
print_r($_FILES);

echo 'Uploaded file size: ' .$upload_size;

$command = "ffmpeg -ss 10 -t 6 " .$uploadfile ." " .$clippedfile;
echo "Running " .$command .", Please Wait............";
$pm = new ProcessManager($command);

while(true) {
    if($pm->status()) {
        continue;
    }
    else{
        echo "Clipped file successfully! It can be found in your clips directory.";
        break;
    }
}

print "</pre>";

?>
