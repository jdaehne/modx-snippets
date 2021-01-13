<?php
/*
 * isMember
 *
 * checks if the user is a memebr of a usergroup
 *
 * Usage examples:
 * [[isMember? &group=`xy`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

$group = $modx->getObject('group', $scriptProperties);

if ($modx->user->isMember($group) ) {
    return true;
}

return false;
