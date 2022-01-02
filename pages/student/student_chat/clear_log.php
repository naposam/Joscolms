<?php

    $_00hours = date('His');


    if($_00hours == '000000'){

        $log_file = 'log.html';

        file_put_contents($log_file, '');

    }

?>