<?php

if (!function_exists('sallary_to_min_max_sallary')){
    function sallary_to_min_max_sallary($sallary,$seperator = '_'):array
    {
        $sallaryArray = explode($seperator,$sallary);

        return [(int)$sallaryArray[0],(int)$sallaryArray[1]];
    }
}
