<?php

namespace App\Tools;

class FileTools
{

    public static function uploadImage(string $destinationPath,string $imageName, string|null $oldFileName = null):array|bool
    {
        $errors = [];
        $target_file = null;

        if (isset($_FILES[$imageName]["tmp_name"]) && $_FILES[$imageName]["tmp_name"] != '') {
            $target_file = StringTools::slugify(basename($_FILES[$imageName]["name"]));
            $imageFileType = pathinfo($_FILES[$imageName]["name"], PATHINFO_EXTENSION);
            $image = uniqid($target_file . "_", true) . "." . $imageFileType;
            $target_file_uid = $destinationPath . $image;

            if (move_uploaded_file($_FILES[$imageName]["tmp_name"], _ROOTPATH_.$target_file_uid)) {
                if ($oldFileName) {
                    unlink($destinationPath . $oldFileName);
                }
            } else {
                $errors['file'] = 'Le fichier n\'a pas été uploadé';
            }
        }
        return ['fileName' => $image ?? null, 'errors' => $errors];
    }

    public static function verifyImage(string $imageName):array|bool{
        $errorsImage = [];
        $uploadOk = 1;
        // Vérification qu'il s'agit bien d'une vrai image
        $check = getimagesize($_FILES[$imageName]["tmp_name"]);
        if ($check === false) {
            $errorsImage[$imageName] = "Ce fichier n'est pas une image.";
            $uploadOk = 0;
        }
        // Vérification de la taille du fichier (en B)
        $maxSize = 4000000 ; // 100; // 
        if ($_FILES[$imageName]["size"] > $maxSize && $uploadOk === 1) {
            $errorsImage[$imageName] = "Le fichier image doit avoir un taille inférieur à " . $maxSize/1000000 . " MB.";
            $uploadOk = 0;
        }
        // Vérification du type d'image
        $target_file = basename($_FILES[$imageName]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        if (!in_array(strtolower($imageFileType), ["jpg", "jpeg", "png", "webp"]) && $uploadOk === 1) {
            $errorsImage[$imageName] = "Seul les fichiers jpg, jpeg, png ou webp sont autorisés.";
        }
        if (!empty($errorsImage)) {
            return $errorsImage;
        } else {
            return true;
        }
    }

}