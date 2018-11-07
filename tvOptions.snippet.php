<?php
/*
 * tvOptions
 *
 * templating tv Options of TV (type: DropDown List or multi DropDown List)
 *
 * Usage examples:
 * [[!tvOptions? &tpl=`optionTpl` &tv=`1`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

$tpl = $modx->getOption('tpl', $scriptProperties);
$tv = $modx->getOption('tv', $scriptProperties); // ID of TV

$output='';

if (!empty($tv)) {
    $tv = $modx->getObject('modTemplateVar', $tv);
    $optionValues = $tv->get('elements');   
    $options = explode("||", $optionValues);
    
    foreach ($options as $option) {
        $valueKey = explode("==", $option);
        $output .= $modx->getChunk($tpl, array(
            'value' => $valueKey[0],
            'id' => $valueKey[1],
        ));
    }
}

return $output;
