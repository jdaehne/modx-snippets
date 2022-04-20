<?php
/*
 * nlSeparator
 *
 * separates every new line
 *
 * Usage examples:
 * [[*tvName:nl2separator=`,`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

if ($input == "") return;

$items = array_map('trim', explode("\n", $input));
$separator = empty($options) ? ',' : $options;

return implode($separator, $items);
