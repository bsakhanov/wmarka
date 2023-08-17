<?php
/*
 * footer-left
 * footer-center
 * footer-right
 */
if (
    $_this->countModules('footer-left')
    || $_this->countModules('footer-center')
    || $_this->countModules('footer-right')
) {
    $sectionPosCount =
        ($_this->countModules('footer-left') ? 1 : 0)
        + ($_this->countModules('footer-center') ? 1 : 0)
        + ($_this->countModules('footer-right') ? 1 : 0);
    $sectionGridClass = 'uk-child-width-1-' . $sectionPosCount . '@m';
    ?>
<footer id="section-footer" class="uk-section uk-section-secondary uk-section-small">
    <div class="uk-container uk-container-small">
        <div class="<?php echo $sectionGridClass; ?>" data-uk-grid>

            <?php if ($_this->countModules('footer-left')) { ?>
            <div>
                <jdoc:include type="modules" name="footer-left" style="master3" />
            </div>
            <?php } ?>

            <?php if ($_this->countModules('footer-center')) { ?>
            <div>
                <jdoc:include type="modules" name="footer-center" style="master3" />
            </div>
            <?php } ?>

            <?php if ($_this->countModules('footer-right')) { ?>
            <div>
                <jdoc:include type="modules" name="footer-right" style="master3" />
            </div>
            <?php } ?>

        </div>
    </div>
</footer>
<?php } ?>