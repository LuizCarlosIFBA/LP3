<?php
    function serializeCorreto($aux){
        $bad_data = serialize($aux);
    
        $fixed_data = preg_replace_callback ('!s:(\d+):"(.*?)";!', function($match) {      
            return ($match[1] == strlen($match[2])) ? $match[0] : 's:' . strlen($match[2]) . ':"' . $match[2] . '";';
        }, $bad_data);

        return $fixed_data;
    } 
?>