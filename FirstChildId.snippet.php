<?php
/**
 * FirstChildId
 * Gets the first child id of the given id. Works as output filter.
 * Example use: [[*id:FirstChildId]]
 *
 * @autor Bert Oost at OostDesign.nl <bert@oostdesign.nl>
 */

if (empty($input)) return;

$docId = $input;

$c = $modx->newQuery('modResource');
$c->sortby('menuindex', 'ASC');
$c->select(array('id','parent'));
$c->limit(1);
$c->where(array('parent' => $docId));

$childObj = $modx->getObject('modResource', $c);

if ($childObj) {
    $childId = $childObj->get('id');
}

return $childId;
