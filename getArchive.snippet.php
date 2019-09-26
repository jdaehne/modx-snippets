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
$parents = explode(',', $modx->getOption('parents', $scriptProperties, $modx->resource->get('parent'), true));

if (empty($parents)) return;

$query = $modx->newQuery('modResource');
$query->sortby('publishedon','DESC');
$query->where(array(
    'published' => 1,
    'deleted' => 0,
    'parent:IN' => $parents,
));
$resources = $modx->getCollection('modResource', $query);


$archive = array();

foreach ($resources as $resource){
    $year = date("Y", strtotime($resource->get('publishedon')));
    $archive[$year][] = array(
            'id' => $resource->get('id'),
            'title' => $resource->get('pagetitle'),
            'publishedon' => $resource->get('publishedon'),
        );
}

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
