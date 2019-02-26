<?php
$targetDir = './uploads/';
$targetFile = $targetDir . basename($_FILES['upload']['name']);
$uploadOk = true;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//check if file is an image
if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES['upload']['tmp_name']);
    if($check) {
        echo 'File is an imgage - ' . $check['mime'] . '.';
        $uploadOk = true;
    } else {
        echo 'File is not an image.';
        $uploadOk = false;
    }    
}

//Check if file already exists
if(file_exists($targetFile)){
    echo 'Sorry, file already exists';
    $uploadOk = false;
}

//Check if everything is ok
if(!$uploadOk){
    echo 'Sorry, your file cannot be uploaded';

//if everything is ok, upload image
} else {
    if(move_uploaded_file($_FILES['upload']['tmp_name'], $targetFile)) {
        echo 'The file ' . basename($_FILES['upload']['name']) . ' has been uploaded';
    } else {
        echo 'Sorry, there was an error uploading your file';
    }
}


?>