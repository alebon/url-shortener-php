<?php

/**
 * Class LinkValidator
 */
class LinkValidator
{
    /**
     * @param string $url
     * @return bool
     */
    public function isValid($url)
    {
        // Taken from: http://www.w3schools.com/php/filter_validate_url.asp

        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            return false;
        }

        return true;
    }

}