<?php
/**
 * Registra el autoload de las clases
 *
 * @author Andrés Michel <dev@amsolucionesweb.com.ar>
 */
spl_autoload_register(function ($class) {

        $file = rtrim(__DIR__, '/').'/'.str_replace('\\', '/', $class).'.php';
        if (file_exists($file)) {
            require $file;
        }
    }
);