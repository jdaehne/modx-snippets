<?php
/*
 * nlWrapper
 *
 * wraps every new line in a chunk
 *
 * Usage examples:
 * [[*tvName:nlWrapper=`tpl`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

if ($input == "") return;

$items = array_map('trim', explode("\n", $input));

$tpl = $options;
$output = '';

foreach ($items as $item) {
    $output .= $modx->getChunk($tpl, array(
        'value' => $item,
    ));
}

return $output;
