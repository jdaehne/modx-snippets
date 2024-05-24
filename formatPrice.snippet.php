<?php
/*
 * formatPrice
 *
 * formats a float/int to a price: seperatet by comma - dot for thousand seperator
 *
 * Usage examples:
 * [[+tv:formatPrice]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

$input = str_replace(',', '.', $input);

return number_format((float)$input, 2, ',', '.');
