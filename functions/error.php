<?php

require_once __DIR__ . '/../classes/CategoryError.php';
require_once __DIR__ . '/../classes/ProductError.php';

function categoryErrorMessage(int $errorCode): string
{
    return match ($errorCode) {
        CategoryError::NAME_REQUIRED => "Le nom est obligatoire",
        default => "Une erreur est survenue"
    };
}
function productErrorMessage(int $errorCode): string
{
    return match ($errorCode) {
        ProductError::NAME_REQUIRED => "Le nom est obligatoire",
        ProductError::PRICE_REQUIRED => "Le prix est obligatoire",
        ProductError::COVER_REQUIRED => "La cover est obligatoire",
        ProductError::DESCRIPTION_REQUIRED => "La Description est obligatoire",
        ProductError::CATEGORY_REQUIRED => "La catégorie est obligatoire",
        ProductError::COVER_ERROR_UPLOAD => "Il y a eu une erreur lors de l'upload de l'image",
        default => "Une erreur est survenue"
    };
};

    // switch ($errorCode) {
    //     case 1:
    //         $errorMsg = "Le nom est obligatoire";
    //         break;
    //     default:
    //         $errorMsg = "Une erreur est survenue";
    // }

    // return $errorMsg;