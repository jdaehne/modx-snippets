<?php
/*
 * eachTpl
 *
 * templating a comma separted list of items to a chunk-template
 *
 * Usage examples:
 * [[*tvName:eachTpl=`chunkNameTpl`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */
 
 
$items = explode(',', trim($input));
$tpl = $options;
$output = '';

if (empty($input)) return;

foreach ($items as $item) {
    $output .= $modx->getChunk($tpl, array(
        'data' => trim($item),
    ));
}

return $output;
