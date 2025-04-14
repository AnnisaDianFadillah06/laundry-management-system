<?php

namespace App;

class MD5Hasher
{
    public static function make($value)
    {
        return md5($value);
    }

    public static function check($value, $hashedValue)
    {
        return md5($value) === $hashedValue;
    }
}