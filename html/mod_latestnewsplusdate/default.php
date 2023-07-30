<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_latestnewsplusdate
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * 
 * @subpackage	mod_latestnewsplusdate
 * @author     	TemplatePlazza
 * @link 		http://www.templateplazza.com
 */

defined('_JEXEC') or die;

?>
<ul class="lnpd_item_wrapper">
<?php 
	$n = 1;
	$morecatlinks = array();

	foreach ($list as $item) : 
		
		// Check whether thumbnail image is exist or not. If it's not then start thumbnail generation process
		if($n <= $count_intro) {
			
			// More Category List and Blog
			$item->categlist = JRoute::_('index.php?option=com_content&view=category&id='.$item->catid);
			// Get the thumbnail 
			$thumb_img = LatestNewsPlusDateHelper::getThumbnail($item->id, $item->images,$thumb_folder,$show_default_thumb,$thumb_width,$thumb_height,$item->title,$item->introtext,$modulebase);
			?>

			<li  class="lnpd_item_with_intro" itemscope itemtype="https://schema.org/Article">
				<?php 
				if($thumb_loadorder == 1) {
					echo "<div class='lnpd_thumb_before_title'>".$thumb_img."</div>";
				}
				?>
				<a class="lnpd_item_title" href="<?php echo $item->link; ?>" itemprop="url">
					<?php echo $item->title; ?>
				</a>
				<span class="lnpd_item_date">
				<?php
					//s how date
					LatestNewsPlusDateHelper::getDate($show_date, $show_date_type, $item->created, $custom_date_format);
				?>
				</span>
				<?php 
				if($thumb_loadorder == 0) {
					if($introtext_truncate == 1){
						$thumb_class = "lnpd_thumb_before_title";
					} else {
						$thumb_class = "lnpd_thumb_after_title";
					}
					echo "<div class='".$thumb_class."'>".$thumb_img."</div>";
				}
				?>
				<?php if($introtext_truncate != 1){ ?>		
				<div class="lnpd_item_introtext">
					<?php 
					echo JHtmlString::truncate(strip_tags($item->introtext), $introtext_truncate);  ?>
				</div>
				<?php } ?>
			</li>
			<?php 
		} else { ?>
			<li class="lnpd_item_without_intro" itemscope itemtype="https://schema.org/Article">
			<span class="lnpd_item_date">
				<?php
					//s how date
					LatestNewsPlusDateHelper::getDate($show_date, $show_date_type, $item->created, $custom_date_format);
				?>
			</span>
			<a href="<?php echo $item->link; ?>" itemprop="url" class="lnpd_item_title"><span itemprop="name"><?php echo $item->title; ?></span></a>	
			</li>

		<?php 
		}
		$n++;

		// More category links
		$morecatlink = "<a href=".JRoute::_('index.php?option=com_content&view=category&id='.$item->catid).">".$item->category_title."</a>";
		$morecatlinks[$morecatlink] = true;
		if (isset($morecatlinks[$morecatlink])) {
			continue;
		}
	endforeach; ?>
</ul>
<?php 
if($show_morecat_links) 
{	echo "<div class='lnpd_more_cat'>".JText::_('MOD_LNPD_MORE_CAT'). " ";
	foreach ($morecatlinks as $morecatlink => $val) 
	{
		echo $morecatlink. '&nbsp;&nbsp;';
	}
	echo "</div>";
}
?>