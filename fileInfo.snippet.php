<?php
/*
 * fileInfo
 *
 * Returns infos of a File
 *
 * Usage examples:
 * [[*tvName:fileInfo=`size`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */
 
$file = $input;
$parts = pathinfo($file);

switch ($options) {
    case 'dirname':
        return $parts['dirname'];
    case 'basename':
        return $parts['basename'];
    case 'filename':
        return $parts['filename'];
    case 'size':
        return filesize(str_replace('/assets', 'assets', $file));
    case 'extension':
    default:
        return $parts['extension']; 
}


return $input;
