<?php

class Generator
{

    const DEFAULT_SHORT_URL_LENGTH = 10;

    /**
     * Random String generation code from stackoverflow:
     * http://stackoverflow.com/questions/4356289/php-random-string-generator
     *
     * @param int $length
     * @return string
     */
    public static function getRandomString($length = self::DEFAULT_SHORT_URL_LENGTH)
    {
        // Random String generation code from stackoverflow:
        // http://stackoverflow.com/questions/4356289/php-random-string-generator

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);

        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}