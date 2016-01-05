<?php
//call like: [[*textareatv:nl2ul]]

$values = explode(PHP_EOL, $input);
 
$output = '<ul>';
 
foreach($values as $value) {
    $output .= '<li>' . $value . '</li>';
}
 
$output .= '</ul>';

return $output;
