<?php

$seo = getSeoFromCurrentPageData(pathinfo(basename(__FILE__), PATHINFO_FILENAME));

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('workstation-header');
$renderer_sections->renderSection('workstation-configuration');
$renderer_sections->renderSection('workstation-accessories');
$renderer_sections->renderSection('workstation-video');


// Function Footer
$renderer_structure->footer();

?>