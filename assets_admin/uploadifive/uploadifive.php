<?php
/*
UploadiFive
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
*/

$targetFolder = $_POST['targetFolder']; // Relative to the root
$unik =$_POST['timestamp'];

$verifyToken = @md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$ImageName = $_FILES['Filedata']['name'][0];
	$replacedImage = str_replace(' ', '_', $ImageName);
  	$tempFile = $_FILES['Filedata']['tmp_name'][0];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = @rtrim($targetPath,'/') . '/'. $unik .'_'.$replacedImage;
	//echo $targetFile;
	// Validate the file type
	//$fileTypes = array('jpg','jpeg','gif','png','mp3','mp4','MP4','avi','flv','wmv'); // File extensions
        $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'); // Allowed file extensions
	$fileParts = @pathinfo($replacedImage);
	if(@in_array($fileParts['extension'],$fileTypes)) {// after adding @ at  in_array then the problem is out
            if(!empty($tempFile)){
                @move_uploaded_file($tempFile,$targetFile);// after adding @ at  move_uploaded_file then the problem is out
                echo $unik.'_'.$replacedImage;
            }else{
                echo 'Upload Failed. Please Try Again Later.';
            }
	} else {
		echo 'Invalid file type. Upload Failed';
	}
}

?>