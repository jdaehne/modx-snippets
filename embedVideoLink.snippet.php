<?php
/*
 * embedVideoLink
 *
 * Formats video Link of YouTube and Vimeo to embed Video-Link to use in Fancybox etc.
 *
 * Usage examples:
 * [[*tvName:embedVideoLink]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

// YouTube
$input = str_replace('youtu.be/', "youtube.com/embed/", $input);
$input = str_replace('youtube.com/watch?v=', "youtube.com/embed/", $input);

// Vimeo
$input = str_replace('//vimeo.com/', "//player.vimeo.com/video/", $input);

return $input;
