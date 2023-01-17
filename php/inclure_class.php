<?php

// mampiditra izay fichier rehetra ilaina anaty page iray

    function inclure_class($class_name) {
        if (file_exists($fichier = __DIR__.'/'.$class_name.'.php')) {
            require $fichier;
        }
    }

    spl_autoload_register('inclure_class');

?>