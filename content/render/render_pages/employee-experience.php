<?php

$seo = getSeoFromCurrentPageData(pathinfo(basename(__FILE__), PATHINFO_FILENAME));

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('hero', "compress-squares",
  ["filename" => pathinfo(basename(__FILE__), PATHINFO_FILENAME)]
);
$renderer_sections->renderSection('job-list');


// Function Footer
$renderer_structure->footer();

?>