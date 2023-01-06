<?php
/*
 * getParam
 *
 * Returns infos of a File
 *
 * Usage examples:
 * [[!getParam? &name=`xyz`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */
 
$name = $modx->getOption('name', $scriptProperties);

return $_GET[$name];
