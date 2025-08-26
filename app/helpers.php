<?php

if (!function_exists('markdown')) {
    function markdown($text)
    {
    return (string) app('markdown.converter')->convertToHtml($text);
    }
}
