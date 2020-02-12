<?php
/*
 * nlSeperator
 *
 * breaks string into seperate lines
 *
 * Usage examples:
 * [[*tvName:nlSeperator=`|`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

if ($input == "") return;

$seperator = empty($options) ? ',' : $options;

$items = array_map('trim', explode($seperator, $input));

return implode('<br>', $items);
