<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "busvip",
    "title" => "Bus-Vip",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","busvip"),
    "categories" => [
                    "Visual Media Projects"
                  ],
    "media_facebook_url" => "https://www.facebook.com/curseocazionalebusvip",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "01.2020",
        "date_end" => "11.2022"
    ],
    "tags" => [
                "photo",
                "video"
    ],
    "colors" => [
                "post_color_primary" => "#ffae02",
                "post_color_secondary" => "#FFFFFF",
                "post_color_background" => "#0529a3",
                "post_color_text_on_background" => "#FFFFFF"
    ]
];
$post_content = "";
$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= renderGalleryMedia($post_data);
$post_content .= renderVideoMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>