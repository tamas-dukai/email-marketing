<?php

namespace App\Helpers;

class GlobalHelper
{
    public static function beautifyJson($jsonString)
    {
        $beautifiedJson = str_replace('{', '', $jsonString);
        $beautifiedJson = str_replace('}', '', $beautifiedJson);
        $beautifiedJson = str_replace('[', '', $beautifiedJson);
        $beautifiedJson = str_replace(']', '', $beautifiedJson);
        $beautifiedJson = str_replace(',', '', $beautifiedJson);
        $beautifiedJson = str_replace(':', ': ', $beautifiedJson);
        $beautifiedJson = str_replace('"', '', $beautifiedJson);
        $beautifiedJson = str_replace('.', '.</br>', $beautifiedJson);

        return $beautifiedJson;
    }

    public static function getArrayFromSeparatedString($separatedString, $separator)
    {
        $arrayToReturn = explode($separator, $separatedString);

        return $arrayToReturn;
    }

    public static function getSeparatedStringFromArray($arrayToSeparate, $separator)
    {
        $separatedString = implode($separator, $arrayToSeparate);

        return $separatedString;
    }
}
