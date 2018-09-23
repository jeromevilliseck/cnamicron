<?php
function __autoload($class)
{
    switch ($class[0])
    {
        // Inclusion des class de type View
        case 'V' : require_once('../../pages/views/'.$class.'.view.php');
            break;
        // Inclusion des class de type Mod
        case 'M' : require_once('../../core/database/'.$class.'.mod.php');
            break;
    }
    return;
}