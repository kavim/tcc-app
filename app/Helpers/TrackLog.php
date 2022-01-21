<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('logLogin')) {
    function logLogin()
    {
        $user = Auth::user();
        $user->update([
            'last_login' => now()
        ]);
    }
}

if (! function_exists('logWishedPlace')) {
    function logWishedPlace($place_id)
    {
        //Vamos salvar aqui um log dos lugares mais gostados
    }
}
