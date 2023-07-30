<?php

/**
 * @package   FL Amp Plugin
 * @author    Дмитрий Васюков http://fictionlabs.ru
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$date = JFactory::getDate()->format('Y-m-d');

?>

<!-- Microdata -->
    
<?php if ($this->params->get('schema_enable', 0) && $this->params->get('schema_org_name', 0) && $this->params->get('schema_author', 0) && $this->params->get('schema_logo', 0)) { 
?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": "<?php echo JURI::current(); ?>",
            "headline": "<?php echo JHtml::_('string.truncate', strip_tags($title), 110); ?>",
            "description": "<?php echo $description; ?>",
            "datePublished": "<?php echo $date; ?>",
            "dateModified": "<?php echo $date; ?>",
            "author": {
                "@type": "Person",
                "name": "<?php echo $this->params->get('schema_author'); ?>"
            },
            "publisher": {
                "@type": "Organization",
                "name": "<?php echo $this->params->get('schema_org_name'); ?>",
                "logo": {
                    "@type": "ImageObject",
                    "url": "<?php echo $this->getAbsoluteUrl($this->params->get('schema_logo')); ?>"
                }
            },
            <?php if (!empty($image)) : ?>
                "image": {
                    "@type": "ImageObject",
                    "url": "<?php echo $image; ?>"
                }
            <?php endif; ?>
        }
    </script>
<?php } ?>