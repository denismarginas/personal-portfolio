<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "visibility" => "enable",
    "post_type" => "portfolio",
    "media_path" => "agromir-sh",
    "title" => "Agromir Second-Hand",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for tools, industrial equipment tires, tractor tires is made in Prestashop 1.7. The products cannot be added to the cart, but there is 1 button to contact by phone for the product and 1 button to contact by email. The form was created by editing TPL, HTML, CSS and the Wordpress platform with the Contact Form 7 module and a JS script. The site has implemented modules from Prestashop Addons such as JoliSearch, Amazing gallery and other modules purchased or adapted free of charge for the site. ",
    "categories" => [
                    "Web Development Projects"
                  ],
    "website_url" => "www.anvelope-sh.ro",
    "website_platform" => "Prestashop",
    "website_status" => "Done",
    "employ" => "Pia Soft Product",
    "date" => "08.2020-11.2022",
    "tags" => [
                "web",
                "media-web",
              ],
    "colors" => [
        "post_color_primary" => "#fdb819",
        "post_color_secondary" => "#212121",
        "post_color_background" => "#212121",
        "post_color_text_on_background" => "#FFFFFF"
    ]
];

$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);

$post_content .= "<h2 id='webdevelopmentmedia' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Media Content</h2>";
$post_content .= renderGalleryWebMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>