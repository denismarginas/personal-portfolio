<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonDataExperience)) :
    $jsonDataExperience = getDataJson('data-content-personal', 'data')["experience"];
endif;

?>

<section class="dm-about dm-experience-knowledge grid-background-animation">
  <container>

      <?php if(isset($jsonDataExperience["img"])) : ?>
          <div data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
              <?php echo renderImage($GLOBALS['urlPath']."content/img".$jsonDataExperience["img-path"].$jsonDataExperience["img"]);?>
              <?php SVGRenderer::renderSVG('background-shape-1'); ?>
          </div>
      <?php endif; ?>

      <div>

          <?php if(isset($jsonDataExperience["title"])) : ?>
              <h2 data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.5s">
                  <?php echo $jsonDataExperience["title"]; ?>
              </h2>
          <?php endif; ?>

          <?php if(isset($jsonDataExperience["knowledge-lists-text"]["text-items"])) : ?>
              <?php $experience_text = $jsonDataExperience["knowledge-lists-text"]["text-items"];?>

              <?php $i = 1; foreach ($experience_text as $experience_text_item) : ?>
                  <p data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.6s" data-delay="<?php echo $i*0.03; ?>s">
                      <?php echo $experience_text_item; ?>
                  </p>
                  <?php $i++; endforeach; ?>
          <?php endif; ?>

          <?php if(isset($jsonDataExperience["knowledge-lists-text"]["list-items"])) : ?>
              <?php $experience_list = $jsonDataExperience["knowledge-lists-text"]["list-items"];?>
              <ul>
                  <?php $i = 1; foreach ($experience_list as $experience_list_item) : ?>
                      <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.6s" data-delay="<?php echo $i*0.06; ?>s">
                          <?php echo $experience_list_item; ?>
                      </li>
                      <?php $i++; endforeach; ?>
              </ul>
          <?php endif; ?>

          <?php if(isset($jsonDataExperience["knowledge-lists-items"])) : ?>
              <?php
              $renderer = new RendererElements();
              $renderer->renderElement('knowledge-list-icons');
              ?>
          <?php endif; ?>

          <?php if( isset($layout) && ( $layout == "standard" )) : ?>
              <?php if(isset($jsonDataExperience["buttons"])) : ?>
                  <div class="buttons">
                      <?php  foreach ($jsonDataExperience["buttons"] as $button) : ?>
                          <a data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" href="<?php echo $button["button_page_redirect_slug"].$jsonGlobalData["page-slug-extension"]; ?>" data-button="primary">
                              <?php SVGRenderer::renderSVG($button["button-icon-svg"]); ?>
                              <span>
                                <?php echo $button["button_text"];?>
                            </span>
                          </a>
                      <?php endforeach; ?>
                  </div>
              <?php endif; ?>
          <?php endif; ?>

      </div>

  </container>
</section>

