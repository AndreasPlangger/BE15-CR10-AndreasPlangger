<?php
function file_upload($picture)
{
    $result = new stdClass();
    $result->fileName = 'product.png';
    $result->error = 1;
    $fileName = $picture["name"];
    $fileType = $picture["type"];
    $fileTmpName = $picture["tmp_name"];
    $fileError = $picture["error"];
    $fileSize = $picture["size"];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $filesAllowed = ["png", "jpg", "jpeg"];
    if ($fileError == 4) {
        $result->ErrorMessage = "No image added. You can still change this later.";
        return $result;
    } else {
        if (in_array($fileExtension, $filesAllowed)) {
            if ($fileError === 0) {
                if ($fileSize < 500000) {
                    $fileNewName = uniqid('') . "." . $fileExtension;
                    $destination = "../pictures/$fileNewName";
                    if (move_uploaded_file($fileTmpName, $destination)) {
                        $result->error = 0;
                        $result->fileName = $fileNewName;
                        return $result;
                    } else {
                        $result->ErrorMessage = "An error occurred while uploading this file.";
                        return $result;
                    }
                } else {
                    $result->ErrorMessage = "Image is bigger than the allowed 500Kb. <br> Choose a smaller image size and try again.";
                    return $result;
                }
            } else {
                $result->ErrorMessage = "Error uploading - $fileError code. Please contact a System Admin.";
                return $result;
            }
        } else {
            $result->ErrorMessage = "File type can't be uploaded.";
            return $result;
        }
    }
}
