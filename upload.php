<?php
use is\prototype\ProcessManager;
use is\prototype\FileManager;

include_once('is/prototype/ProcessManager.php');
include_once('is/prototype/FileManager.php');

/**
 * This is not a good example of safe file upload handling.
 * For quick and dirty prototyping only.
 */

$uploaddir = '/var/www/prototype/PHPAudioEdit/uploads/';
$clipdir = '/var/www/prototype/PHPAudioEdit/clips/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$clippedfile = $clipdir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\r\n";
}

$fm = new FileManager();
$upload_size = $fm->display_filesize($_FILES['userfile']['size']);

echo 'Here is some more debugging info:';
print_r($_FILES);

echo 'Uploaded file size: ' .$upload_size ."\r\n";

$command = "ffmpeg -ss 10 -t 6 -i " .$uploadfile ." " .$clippedfile;
echo "Running " .$command .", Please Wait............\r\n";
$pm = new ProcessManager($command);

while(true) {
    if($pm->status()) {
        continue;
    }
    else{
        echo "Clipped file successfully! It can be found in your clips directory.\r\n";
        break;
    }
}

print "</pre>";

?>
