<?php

    function makeURL($str, $delimiter = '-'){
        setlocale(LC_ALL, 'en_US.UTF8');
        $clean = str_replace("'", ' ', $str);
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $clean);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }
    
    function getExtStatic($configName, $type){
        $configs = config($configName);
        return config('statics.cdnext').$configs['name'].'/'.$configs['version'].'/'.$configs[$type]['url'];
    }
    
    function getExtStaticIntegrity($configName, $type){
        $configs = config($configName);
        return $configs[$type]['sha'];
    }
