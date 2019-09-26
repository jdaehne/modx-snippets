<?php
/*
 * getArchive
 *
 * Returns a List of links to the resources with pagetitle within a list of years
 *
 * Usage examples:
 * [[getArchive]]
 * [[getArchive? &tpl=`linkTpl` &outerTpl=`yearTpl` &parents=`[[*parents]]`]]
 *
 * Parameters:
 * @ tpl = the template for the link (available placeholders: title, id, publishedon)
 * @ outerTpl = template for the link group with the year (available placeholders: year, links)
 * @ parents = resource ids of parent resources (defaults to current parent id)
 *
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */


$outerTpl = $modx->getOption('outerTpl', $scriptProperties, 'archiveOuterTpl', true);
$tpl = $modx->getOption('tpl', $scriptProperties, 'archiveLinkTpl', true);
$parents = $modx->getOption('parents', $scriptProperties, $modx->resource->get('parent'), true);

if (empty($parents)) return;

$pdoTools = $modx->getService('pdoFetch');
$resources = $pdoTools->getCollection('modResource', array('published' => 1, 'deleted' => 0), array('parents' => $parents, 'sortby' => 'publishedon'));

$archive = array();

foreach ($resources as $resource){
    $year = date("Y", $resource['publishedon']);
    $archive[$year][] = array(
            'id' => $resource['id'],
            'title' => $resource['pagetitle'],
            'publishedon' => $resource['publishedon'],
        );
}

arsort($archive);

$output = '';

foreach ($archive as $year => $resources) {
    
    $outputLinks = '';
    
    foreach ($resources as $resource) {
        $outputLinks .= $modx->getChunk($tpl,array(
            'id' => $resource['id'],
            'publishedon' => $resource['publishedon'],
            'title' => $resource['title'],
        ));
    }
    
    $output .= $modx->getChunk($outerTpl,array(
        'year' => $year,
        'links' => $outputLinks,
    ));
}

return $output;
