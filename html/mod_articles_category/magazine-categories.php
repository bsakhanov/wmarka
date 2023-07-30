<?php
	/**
		* @package     Joomla.Site
		* @subpackage  mod_articles_category
		* @author		web-eau.net
		* @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
		* @license     GNU General Public License version 2 or later; see LICENSE.txt
	*/
	
	defined('_JEXEC') or die;
	
	use Joomla\CMS\Helper\ModuleHelper;
	use Joomla\CMS\Language\Text;
	
	if (!$list)
	{
		return;
	}
	
?>

<div class="container category-module<?php echo $moduleclass_sfx; ?>">
	<?php if ($grouped) : ?>	
    <div class="row">
        <div class="include-wrapper pb-5 col-12">
            <section class="row">  	
				<div class="col-12 pt-2 pl-md-1 mb-3 mb-lg-1">
					<?php foreach ($list as $group_name => $group) : ?>
                    <div class="row card-group">                        
						<?php foreach ($group as $item) : ?>
                        <div class="col-6 pb-2">
                            <div class="card border-0 rounded-0 text-white overflow zoom">
                                <div class="position-relative">
                                    <div class="ratio_right-cover-2 image-wrapper">
                                        <?php
											$article_images  = json_decode($item->images);
											$article_image   = '';
											$article_image_alt   = '';
											if(isset($article_images->image_intro) && !empty($article_images->image_intro)) {
												$article_image  = $article_images->image_intro;
												$article_image_alt  = $article_images->image_intro_alt;
											}?>  					
											<a href="<?php echo $item->link; ?>">
												<img class="img-fluid card-img-top" src="<?php echo $article_image; ?>" alt="<?php echo $article_image_alt; ?>" >
											</a>
									</div>                                  
                                    <div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
                                        <span class="text-white p-1 badge badge-primary rounded-0 text-decoration-none">
											<?php echo $item->displayCategoryTitle; ?>
										</span>
                                        <a href="<?php echo $item->link; ?>" class="text-decoration-none">
                                            <h2 class="h5 text-white my-1"><?php echo $item->title; ?></h2>
										</a>
									</div>
								</div>
							</div>
						</div>
                        <?php endforeach; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</section>
		</div>
	</div>
	<?php endif; ?>
</div>