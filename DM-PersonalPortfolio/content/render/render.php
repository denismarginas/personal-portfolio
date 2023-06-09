<?php

require_once __DIR__ . '/classes/classes-general.php';
require_once __DIR__ . '/classes/class-svg-render.php';
require_once __DIR__ . '/classes/class-video-render.php';
require_once __DIR__ . '/functions/functions.php';
require_once __DIR__ . '/config/config-debug.php';

$sectionPath = __DIR__ . '/../../themes/dm-theme/templates-html/';
$sectionFiles = glob($sectionPath . '*.html');
foreach ($sectionFiles as $sectionFile) {
    unlink($sectionFile);
    $log[] = "Deleted $sectionFile" . PHP_EOL;
}
$sectionFiles = glob('render_sections/*.php');

foreach ($sectionFiles as $sectionFile) {
    $urlPath = URLPath::getUrlPaths()['template'];
    $GLOBALS['urlPath'] = $urlPath;
    $sectionHtmlFileName = basename($sectionFile, '.php') . '.html';
    ob_start();
    $renderer_structure = new RendererStructure();
    $renderer_structure->header();
    include $sectionFile;
    $renderer_structure->footer();
    $sectionOutput = ob_get_clean();
    $sectionFilePath = $sectionPath . $sectionHtmlFileName;
    file_put_contents($sectionFilePath, $sectionOutput);
    $log[] = "Rendered $sectionFile to $sectionFilePath" . PHP_EOL;
}

$pagePath = __DIR__ . '/../pages/';
$pageFiles = glob($pagePath . '*.html');
foreach ($pageFiles as $pageFile) {
    unlink($pageFile);
    $log[] = "Deleted $pageFile" . PHP_EOL;
}
$pageFiles = glob('render_pages/*.php');

foreach ($pageFiles as $pageFile) {
    $urlPath = URLPath::getUrlPaths()['page'];
    $GLOBALS['urlPath'] = $urlPath;
    $pageHtmlFileName = basename($pageFile, '.php') . '.html';
    ob_start();
    include $pageFile;
    $pageOutput = ob_get_clean();
    $pageFilePath = $pagePath . $pageHtmlFileName;
    file_put_contents($pageFilePath, $pageOutput);
    $log[] =  "Rendered $pageFile to $pageFilePath" . PHP_EOL;
}


$postPath = $pagePath;
$postFiles = glob('render_posts/*.php');

foreach ($postFiles as $postFile) {
    $urlPath = URLPath::getUrlPaths()['post'];
    $GLOBALS['urlPath'] = $urlPath;
    $postHtmlFileName = basename($postFile, '.php') . '.html';
    ob_start();
    include $postFile;
    $postOutput = ob_get_clean();
    $postFilePath = $postPath . $postHtmlFileName;
    file_put_contents($postFilePath, $postOutput);
    $log[] =  "Rendered $postFile to $postFilePath" . PHP_EOL;
}


// -- RENDER VIEW --

// Show debug
@include("render_structure/head.php");
$renderer_sections = new RendererSections();
$renderer_sections->renderSection('debug');

foreach ($log as $log_item) {
    echo "<p>".$log_item."</p>";
}

?>
