<?php

/**
 * @TODO Generate UUID
 * @TODO Generate CheckSum
 * @TODO Generate Reference (IP)
 * @TODO Generate HashKey
 * @TODO Generate TrxDateTime
 */


if (!function_exists('UUID')) {

    /**
     * Generate Request' Header UUID
     *
     * @param void
     * @return string
     * @throws
     */
    function headerUUID()
    {
        try {

            // Generate a version 4 (random) UUID object
            $uuid4 = \Ramsey\Uuid\Uuid::uuid4();
            return $uuid4->toString() . "\n"; // i.e. 25769c6c-d34d-4bfe-ba98-e0ee856f3e7a

        } catch (\Ramsey\Uuid\Exception\UnsatisfiedDependencyException $e) {

            // Some dependency was not met. Either the method cannot be called on a
            // 32-bit system, or it can, but it relies on Moontoast\Math to be present.
            report($e);
        }
    }
}


if (!function_exists('CheckSum')) {

    /**
     * Generate Request' Header UUID
     *
     * @param $requestBody
     * @param $clientSecret
     * @return string
     */
    function CheckSum($requestBody, $clientSecret)
    {
        if (isset($requestBody["UUID"])) unset($requestBody["UUID"]);
        if (isset($requestBody["RslCod"])) unset($requestBody["RslCod"]);
        if (isset($requestBody["RslMsg"])) unset($requestBody["RslMsg"]);
        if (isset($requestBody["ResMsg"])) unset($requestBody["ResMsg"]);

        $sortyedArray = self::sortBody($clientSecret);

        $string = self::multiImplode($sortyedArray,'^');
        $string = md5($string);
        $string = $string . '^' . $clientSecret;
        $string = md5($string);

        return $string;
    }
}