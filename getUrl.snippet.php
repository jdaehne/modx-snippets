<?php
/*
 * getUrl
 *
 * extracts all urls in a string
 *
 * Usage examples:
 * [[*tvName:getUrl]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */
 
if (preg_match_all('/<a\s+href=["\']([^"\']+)["\']/i', $input, $links, PREG_PATTERN_ORDER)) {
    $hrefs = array_unique($links[1]);
    
    return $hrefs[0];
}

return '#';
