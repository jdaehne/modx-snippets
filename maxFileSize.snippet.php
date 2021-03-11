<?php
/*
 * maxFileSize
 *
 * Custom Formit FileSize Validator
 *
 * Usage examples:
 * &validate=`file:maxFileSize=^5.2^`
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

// get max file size
$maxFileSizeValue = $param ?? 5; // default 5 MB
$maxFileSize = (float)$maxFileSizeValue * 1048576; // MB to byte

// get file
$file = $_FILES[$key];

// if file is empty
if (empty($file['name'])) return true;

// return error if file size is too large
if ($file['size'] > $maxFileSize) {
    
    $modx->lexicon->load('site:default');
    $error = $modx->lexicon('form.validation.error.maxfilesize', array('filesize' => $maxFileSizeValue));
    
    $validator->addError($key, $error);
}

return true;
