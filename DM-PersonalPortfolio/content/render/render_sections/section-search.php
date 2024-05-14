<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}

if(!isset($jsonIndexPages)) {
    $jsonIndexPages = getDataJson('index-data-pages', 'index');
}

?>

<script src="<?php echo $GLOBALS['urlPath'];?>content/json/index/index-data-pages.json"></script>
<script src="<?php echo $GLOBALS['urlPath'];?>themes/dm-theme/assets/js/content-data-search.js"></script>

<section class="dm-search-section grid-background-animation">
    <container>
        <div class="dm-search-header" data-motion="transition-fade-0">
            <h1>
                <?php echo $jsonGlobalData["search-fields"]["title"]; ?>
            </h1>
            <form id="search" class="dm-search-bar">
                <div class="search-input">
                    <input id="search-keywords" class="input-search" placeholder="<?php echo $jsonGlobalData["search-fields"]["button-placeholder"]; ?>">
                    <button id="search-content" type="submit" class="search-submit">
                        <?php echo $jsonGlobalData["search-fields"]["button-text"]; ?>
                    </button>
                </div>
                <div id="searched-string-section" class="searched-string-section">
                    <span class="searched-string"></span>
                    <span class="searched-delete" style="display: none;">
                        <?php SVGRenderer::renderSVG('close'); ?>
                    </span>
                </div>
            </form>
        </div>
        <ul id="search-list" class="dm-search-list">
            <?php foreach ($jsonIndexPages as $item) : ?>
                <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s" class="search-item"><a
                                                class="search-item-image" href="<?php echo $item["page"]; ?>"><img
                                                    src="<?php echo $GLOBALS['urlPath']; ?>content/img/placeholder/page-placeholder.svg" lazy-load="true">
                        <div class="preview-image"><img src="<?php $item["default-img"]; ?>"
                                                        lazy-load="true"></div>
                    </a>
                    <div class="search-item-data">
                        <a class="title" href="<?php echo $item["page"]; ?>">
                            <?php echo $item["meta-title"]; ?>
                        </a>
                        <p class="description">
                            <?php echo $item["meta-description"]; ?>
                        </p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </container>
</section>