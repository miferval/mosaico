<?php
/**
** functions.php
*/
//Check if constant exist

function define_safe($name, $value)
{
    if (!defined($name)) {
        define($name, $value);
    }
}
