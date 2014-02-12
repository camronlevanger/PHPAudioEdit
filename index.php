<?php
/**
 * Created by PhpStorm.
 * User: Camron Levanger
 * Date: 2/12/14
 * Time: 9:04 AM
 */
?>

<p><h1>Audio Clipper Prototype 1</h1></p>
<p><h3>Upload an mp3 file:</h3></p>
<br/>

<form enctype="multipart/form-data" action="upload.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Upload and Chop..." />
</form>
