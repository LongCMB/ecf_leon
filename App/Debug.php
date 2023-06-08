<?php

class Debug
{
    public static function vardum(mixed $data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

    public static function print(mixed $data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}