<?php
/*
 * tvOptionName
 *
 * returns the Name of a tv option (type: DropDown List or multi DropDown List)
 *
 * Usage examples:
 * [[*tvName:tvOptionName=`65`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

$tv = $options; // ID of TV

$tv = $modx->getObject('modTemplateVar', $tv);
$optionValues = $tv->get('elements');   
$options = explode("||", $optionValues);

foreach ($options as $option) {
    $valueKey = explode("==", $option);
    
    if (trim($valueKey[1]) == trim($input)) {
        return trim($valueKey[0]);
    }
}

return $input;
