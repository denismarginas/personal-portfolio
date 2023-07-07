
<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
  "visibility" => "enable",
  "post_type" => "portfolio",
  "media_path" => "cafeagano",
  "title" => "Cafea Gano",
  "logo" => "logo/logo.png",
  "logo_type" => "png",
  "description" => "WordPress website created for an online shop specializing in natural supplements and coffee.",
  "categories" => [
    "Web Development Projects"
  ],
  "website_url" => "www.cafeagano.ro",
  "website_platform" => "Wordpress",
  "website_status" => "Done",
  "employ" => "Pia Soft Product",
  "date" => "2020",
  "tags" => [
              "web"
  ],
  "colors" => [
    "post_color_primary" => "#6a4f32",
    "post_color_secondary" => "#cbb85f",
    "post_color_background" => "#312114",
    "post_color_text_on_background" => "#FFFFFF"
  ]
];

$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>