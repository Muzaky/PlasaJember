<?php



class C_Home
{
    static function homepage(){
        view('homepage/layout', ['url' => 'homepage']);
    }
}   