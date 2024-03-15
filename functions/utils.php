<?php

function redirect(string $location): never
{
    header('Location: ' . $location);
    exit;
}

function upload_file(array $file, string $emplacement): string
{
    // On récupère le nom du fichier
    $filename = uniqid() . "_" . date("YmdHis") . "_" . $file['name'];
    // On construit le chemin de destination
    $destination = __DIR__ . "/../uploads/" . $emplacement . "/" . $filename;
    // On bouge le fichier temporaire dans la destination
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        return "null";
    }
    return $filename;
}