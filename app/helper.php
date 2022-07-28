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
if (!function_exists('is_last_letter_bold')){
    function is_last_letter_bold(string $word):bool
    {
        $length = strlen($word);
        $slenderVowel = ['e', 'i', 'ö', 'ü','E','İ','Ö','Ü'];
        $boldVowel = ['a', 'ı', 'o', 'u','A','I','O','U'];

        for ($i = 0; $i < $length; $i++) {
            if (in_array($word[$length-$i-1],$slenderVowel)){
                return false;
            }

            if (in_array($word[$length-$i-1],$boldVowel)){
                return true;
            }
        }

        return false;
    }
}
