<?php

function compressImage($source, $quality) {
    $info = getimagesize($source);
    ob_start(); // Captura la salida en un buffer

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
        imagejpeg($image, null, $quality); // Guardar en buffer
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
        imagepng($image, null, $quality / 10);
    } elseif ($info['mime'] == 'image/webp') {
        $image = imagecreatefromwebp($source);
        imagewebp($image, null, $quality);
    } else {
        return false;
    }

    $compressedImage = ob_get_clean(); // Obtiene el contenido del buffer
    imagedestroy($image);
    return $compressedImage;
}
