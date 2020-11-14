<?php

    function stringToArray($str){
        $str = str_replace('[','',$str);
        $str = str_replace(']','',$str);
        $str = str_replace('"','',$str);
        return explode(',',$str);
    }
