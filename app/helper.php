<?php

if (!function_exists('sallary_to_min_max_sallary')){
    function sallary_to_min_max_sallary($sallary,$seperator = '_'):array
    {
        $sallaryArray = explode($seperator,$sallary);

        return [(int)$sallaryArray[0],(int)$sallaryArray[1]];
    }
}

if (!function_exists('string_to_ten_digits_phone_number')){
    function string_to_ten_digits_phone_number($phoneNumber):int
    {
        $phoneNumber = str_replace(' ', '', $phoneNumber);
        $firstChar = substr($phoneNumber,0,1);
        if ($firstChar == 0){
            $phoneNumber = substr($phoneNumber, 1);
        }

        return  (int)$phoneNumber;
    }
}
if (!function_exists('sesli_harflere_gore_e_a_yapma')){
    function sesli_harflere_gore_e_a_yapma(string $string ):int
    {
        $phoneNumber = str_replace(' ', '', $phoneNumber);
        $firstChar = substr($phoneNumber,0,1);
        if ($firstChar == 0){
            $phoneNumber = substr($phoneNumber, 1);
        }

        return  (int)$phoneNumber;
    }
}
