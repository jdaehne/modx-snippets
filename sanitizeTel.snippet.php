<?php
/*
 * sanitizeTel
 *
 * Sanitize phone numbers, to use in a <a href="tel:..." link.: +49 (0)12 345-67 will be converted to 00491234567.
 *
 * Usage examples:
 * [[*tvName:sanitizeTel]]
 *
 * @author Benjamin Davis <bd@seda.digital>
 */

$stripnumber = '';
$output = '';

if(isset($input) && $input !='') {

    $stripbracketzero = preg_replace('~\(\d{1,2}\)~', '', $input);

    $stripplus = preg_replace('~^\D++~', '00', $stripbracketzero);

    $stripnumber = preg_replace('/\D/', '', $stripplus);

    $output .= $stripnumber;
}

return $output;
