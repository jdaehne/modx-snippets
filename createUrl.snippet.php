<?php
/*
 * createUrl
 *
 * checks if the input is numeric and creates a url
 *
 * Usage examples:
 * [[*tvName:createUrl]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */
 
if (is_numeric($input)) {
    return $modx->makeUrl($input);
}else {
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return 'mailto:' . $input;
    }
    return $input;
}
