<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

// Note that there are certain parts of this layout used only when there is exactly one tag.
$description      = $this->params->get('all_tags_description');
$descriptionImage = $this->params->get('all_tags_description_image');
JLoader::register('JUImage',  JPATH_LIBRARIES . '/juimage/JUImage.php');
$juImg = new JUImage();	
$regexImageSrc = '/#joomlaImage?([^\'" >]+)/';
?>
<div class="com-tags tag-category">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1 class="h2">
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>

    <?php if ($this->params->get('all_tags_show_description_image') && !empty($descriptionImage)) : ?>
        <div class="com-tags__image">
  <?php

$thumb = $juImg->render(preg_replace($regexImageSrc, '', $descriptionImage), [
	'w'     	=> '1920',
	'h'     	=> '720',
	'q'         => '65',
	'zc'        => 'C',
	'far'        => 'C',	
	'webp'      => true,
	'webp_q'    => '60',
	'webp_maxq' => '65',
	'error_image' => 'images/none.jpg',		
	'cache'     => 'img' 

	
]); 
?>
                  <img src="<?php echo $thumb->webp; ?>" type="image/webp" width="1920" height="720" alt="<?php echo $this->escape($this->params->get('page_heading')); ?>"  itemprop="thumbnailUrl"/>
        </div>


    <?php endif; ?>
    <?php if (!empty($description)) : ?>
        <h2 class="h5 p-3 mb-2 bg-light text-dark">			
            <?php echo $description; ?>
        </h2>
    <?php endif; ?>
    <?php echo $this->loadTemplate('items'); ?>
</div>
