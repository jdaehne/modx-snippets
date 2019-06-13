<?php
/*
 * copyrightYear
 *
 * Returns the year for the copyright statement. Specify the &start property
 * with the year that the website launched to get a year range in the next year.
 *
 * Usage examples:
 * [[!copyrightYear]]
 * [[!copyrightYear? &start=`2010`]]
 *
 * @author Christian Seel <cs@seda.digital>
 */

$firstYear = !empty($start) ? $start : strftime("%Y");
$currentYear = strftime("%Y");

if ($firstYear == $currentYear) {
  $output = $currentYear;
} else {
  $output = $firstYear.' - '.$currentYear;
}

return $output;
