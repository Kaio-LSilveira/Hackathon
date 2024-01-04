<?php

use CoffeeCode\Uploader\Image;
/**
 * Funções auxiliares 
 * Esse script consta no composer.json para ser incluido automaticamente
 */

 // ###   VALIDATE   ###
/**
 * @param string $email
 * @return bool
 */
function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// ###      URL     ###

/**
 * @param string|null $path
 * @return string
 */
function url(string $path = null): string
{
    if($path) {
        return CONF_URL_BASE . "/{$path}";
    }

    return CONF_URL_BASE;
}

// ###      ASSETS     ###
/**
 * @param string|null $path
 * @param string $theme
 * @return string
 */
function theme(string $path = null, string $theme = CONF_VIEW_THEME): string
{
    if(strpos($_SERVER['HTTP_HOST'], "localhost") || $_SERVER['HTTP_HOST'] == 'localhost'){
        if($path){
            return CONF_URL_TEST . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST . "/themes/{$theme}";
    }
    if($path){
        return CONF_URL_BASE . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE . "/themes/{$theme}";
}

/**
 * @param string $string
 * @return string
 */
function str_slug(string $string): string
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

    $slug = str_replace(["-----", "----", "---", "--"], "-",
        str_replace(" ", "-",
            trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))
        )
    );
    return $slug;
}

/**
 * @param string $string
 * @return string
 */
function str_studly_case(string $string): string
{
    $string = str_slug($string);
    $studlyCase = str_replace(" ", "",
        mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE)
    );

    return $studlyCase;
}

function uploadImage ($img) : string
{
    $image = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR);
    return $image->upload($img,md5(time()));
}

//function checking if the password are equal
function isEqual(string $pass, string $passRpt): bool {
    if ($pass == $passRpt) {
        return true;
    }
    return false;
}

//function checking password's length
function hasValidLength(string $pass): bool {
    if (strlen($pass) < 6 || strlen($pass) > 16) {
        return false;
    }
    return true;
}
 
//function checking if the password has only digits and numbers
function hasValidContent(string $pass): bool {
    if (!ctype_alnum($pass)) {
        return false;
    }
    return true;
}
 
//function checking if the password has at least 2 numbers
function hasEnoughDigits(string $pass): bool {
    $numberCheck = "";
    for ($i = 0; $i < strlen($pass); $i++) {
        if (ctype_digit($pass[$i])) {
            $numberCheck .= $pass[$i];
        }
    }
 
    if (strlen($numberCheck) < 2) {
        return false;
    }
    return true;
}