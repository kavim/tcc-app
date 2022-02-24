<?php


namespace App\Helpers;

use Illuminate\Support\Facades\App;

class ImageHelper
{
    /**
     * Este metodo confere se o SRC provido é uma imagem externa ou local, se for local parametriza o prefixo de acordo com storage
     */
    public static function checkIfIsALink($src)
    {
        if (substr($src, 0, 4) === 'http') {
            return $src;
        }

        return asset('/storage/' . $src);
    }
}
