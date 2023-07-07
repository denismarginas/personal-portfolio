<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "visibility" => "enable",
    "post_type" => "portfolio",
    "media_path" => "aatoysfurnitures",
    "title" => "A&A Toys & Furniture",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "This is one of the first websites I have created in my career. When I started working on it, the website was already 25% complete. I took over from the previous developer and familiarized myself with the intricacies of WordPress and the Elementor Plugin environment along the way.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "website_url" => "www.aatoys.ro",
    "website_platform" => "Wordpress",
    "website_status" => "Done",
    "employ" => "Pia Soft Product",
    "date" => "10.2019 - 12.2019",
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#5e606c",
        "post_color_secondary" => "#FFFFFF",
        "post_color_background" => "#5e606c",
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