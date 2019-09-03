<?php
/*
 * formatNumber
 *
 * add leading 0 to numbers - Options default is 2 digits
 *
 * Usage examples:
 * [[+idx:formatNumber=`3`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

$digits = intval(!empty($options) ? $options : 2);

return sprintf('%0'. $digits .'d', $input);
