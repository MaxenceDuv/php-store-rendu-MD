<?php

function redirect(string $location): never
{
    header('Location: ' . $location);
    exit;
}

function upload_file(array $file, string $emplacement): bool
{
    // On récupère le nom du fichier
    $filename = uniqid() . "_" . date("YmdHis") . "_" . $file['name'];
    var_dump($filename);
    // On construit le chemin de destination
    $destination = __DIR__ . "/../uploads/" . $emplacement . "/" . $filename;
    var_dump($destination);
    // On bouge le fichier temporaire dans la destination
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        return true;
    }
    return false;
}