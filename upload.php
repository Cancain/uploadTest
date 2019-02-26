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
?>