<!doctype html>
<html lang="en">

<?php
$seoParam = isset($seo) && is_array($seo) ? $seo : null;
include "head.php";
$jsonMenuData = getDataJson('data-menu', 'data');
$jsonGlobalData = getDataJson('data-global-settings', 'data');
$jsonCategoriesData = getDataJson('data-categories', 'data');
?>

<body id="body">
<header id="header">
    <section>
        <div class="dm-logo">
            <a href="<?php echo $jsonGlobalData["front-page"]["slug"].$jsonGlobalData["page-slug-extension"]; ?>" class="dm-logo-img">
                <img data="dm-logo-front" width="50" height="50" src="<?php echo $GLOBALS['urlPath']; ?>content/img/logo/logo.webp" alt="<?php echo $jsonGlobalData["site-identity"]; ?> Personal Icon">
            </a>
            <a href="<?php echo $jsonGlobalData["front-page"]["slug"].$jsonGlobalData["page-slug-extension"]; ?>" class="dm-logo-text">
                <span><?php echo $jsonGlobalData["logo"]["primary-title"]; ?></span>
                <span><?php echo $jsonGlobalData["logo"]["secondary-title"]; ?></span>
            </a>
        </div>
        <div class="dm-menu">
            <ul>
                <?php foreach ($jsonMenuData["menu-list"] as $menuItem) : ?>

                    <?php if( $menuItem["name"] == $jsonCategoriesData["title"]) : ?>

                        <li>
                            <a href="<?php echo $jsonCategoriesData["slug"] . $jsonGlobalData["page-slug-extension"]; ?>">
                                <?php echo $jsonCategoriesData["title"]; ?>
                            </a>

                            <?php if (isset($jsonCategoriesData["categories"]) && is_array($jsonCategoriesData["categories"])) : ?>
                                <ul class="dm-submenu">
                                    <?php foreach ($jsonCategoriesData["categories"] as $submenuItem) : ?>
                                        <li>
                                            <a href="<?php echo $submenuItem["slug"] . $jsonGlobalData["page-slug-extension"]; ?>">
                                                <?php //echo $submenuItem["name"]; ?>
                                                <?php echo str_replace($jsonCategoriesData["title"], '', $submenuItem["name"]); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                        </li>

                    <?php else: ?>

                        <li>
                            <a href="<?php echo $menuItem["slug"] . $jsonGlobalData["page-slug-extension"]; ?>">
                                <?php echo $menuItem["name"]; ?>
                            </a>

                            <?php if (isset($menuItem["submenu"]) && is_array($menuItem["submenu"])) : ?>
                                <ul class="dm-submenu">
                                    <?php foreach ($menuItem["submenu"] as $submenuItem) : ?>
                                        <li>
                                            <a href="<?php echo $submenuItem["slug"] . $jsonGlobalData["page-slug-extension"]; ?>">
                                                <?php echo $submenuItem["name"]; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                        </li>

                    <?php endif; ?>

                <?php endforeach; ?>

            </ul>
            <div class="dm-menu-utility">
                <a href="<?php echo $jsonGlobalData["search-page"]["slug"].$jsonGlobalData["page-slug-extension"]; ?>" class="dm-search">
                    <?php SVGRenderer::renderSVG('search'); ?>
                </a>
                <label class="dm-toggletheme">
                    <input type="checkbox" id="toggleTheme">
                    <span>
                        <?php SVGRenderer::renderSVG('sun'); ?>
                    </span>
                </label>
            </div>
        </div>
        <span class="dm-navbar-toggle">
            <?php SVGRenderer::renderSVG('menu'); ?>
          </span>
    </section>
</header>

