<?php
/*
 * nl2li
 *
 * wrapps every new line in a list-item
 *
 * Usage examples:
 * [[*tvName:nl2li]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

if ($input == "") return;

$items = explode("\n", $input);

$output = '';
foreach ($items as $item) {
    $output .= '<li>' . $item . '</li>';
}

return $output;
