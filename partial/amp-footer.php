<?php
/*
 * amp-footer-left
 * amp-footer-center
 * amp-footer-right
 */
if (
    $_this->countModules('amp-footer-left')
    || $_this->countModules('amp-footer-center')
    || $_this->countModules('amp-footer-right')
) {
    $sectionPosCount =
        ($_this->countModules('amp-footer-left') ? 1 : 0)
        + ($_this->countModules('amp-footer-center') ? 1 : 0)
        + ($_this->countModules('amp-footer-right') ? 1 : 0);
    $sectionGridClass = 'uk-child-width-1-' . $sectionPosCount . '@m';
    ?>
<footer id="section-footer" class="uk-section uk-section-secondary uk-section-small">
    <div class="uk-container uk-container-small">
        <div class="<?php echo $sectionGridClass; ?>" data-uk-grid>

            <?php if ($_this->countModules('amp-footer-left')) { ?>
            <div>
                <jdoc:include type="modules" name="amp-footer-left" style="master3" />
            </div>
            <?php } ?>

            <?php if ($_this->countModules('amp-footer-center')) { ?>
            <div>
                <jdoc:include type="modules" name="amp-footer-center" style="master3" />
            </div>
            <?php } ?>

            <?php if ($_this->countModules('amp-footer-right')) { ?>
            <div>
                <jdoc:include type="modules" name="amp-footer-right" style="master3" />
            </div>
            <?php } ?>

        </div>
    </div>
	      <amp-analytics type="metrika">
        <script type="application/json">
        {
          "vars": {
            "counterId": "999999999"
          }
        }
        </script>
      </amp-analytics>
  
   
 <amp-analytics type="googleanalytics" id="googleanalytics">
        <script type="application/json">
        {
          "vars": {
            "account": "UA-999999999"
          },
          "triggers": {
            "defaultPageview": {
              "on": "visible",
              "request": "pageview",
              "vars": {
                "title": "AMP Pageview"
              }
            }
          }
        }
        </script>
      </amp-analytics>

     <amp-analytics id="analytics_liveinternet">
<script type="application/json">{
 "requests": {
   "pageview": "https://counter.yadro.ru/hit?u${ampdocUrl};r${documentReferrer};s${screenWidth}*${screenHeight}*32;h${title};${random}"
 },
 "triggers": {
  "track pageview": {
   "on": "visible",
   "request": "pageview"
  }
 }
}</script></amp-analytics> 	
</footer>
<?php } ?>