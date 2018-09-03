<?php
function __autoload($class)
{
    switch ($class[0]) {
        // Loading view class
        case 'V':
            require_once('../../pages/views/' . $class . '.view.php');
            break;
        // Loading mod class
        case 'M':
            require_once('../../core/models/' . $class . '.mod.php');
            break;
    }
    return;
}
