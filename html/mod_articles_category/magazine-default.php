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
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;

if (!$list)
{
	return;
}

?>
	
<section class="magazine-section">
	
	<!-- Section heading -->
	<h3 class="text-center fw-bold mb-4 pb-2">Magazine Newsfeed</h3>
	<!-- Section description -->
	<p class="text-center w-responsive mx-auto w-50 mb-5">Skouarn vouezh redek c’hoar eoul ebeul sell tevel paper, amzer patatez dud a c’hann biskoazh bloaz priz dre, dreist c’hwec’hvet bugel Sant-Gwenole torgenn ha ar Evitañ a-raok.</p>
	
	
	<?php 
		$article_image   = [];
		$article_image_alt   = [];
	?>
	<?php foreach ($list as $item) : ?>
		<?php
			$article_images  = json_decode($item->images);
						
			if(isset($article_images->image_intro) && !empty($article_images->image_intro)) {
				$article_image[$item->id]  = $article_images->image_intro;
				$article_image_alt[$item->id]  = $article_images->image_intro_alt;
			} else {
				$article_image[$item->id]  = 'images/sampledata/grey-bg.png'; // image placeholder
				$article_image_alt[$item->id]  = 'No image'; // alt image placeholder
				}
			?> 
	<?php endforeach; ?>
	
	<div class="row g-5">
		
		<div class="col-lg-6 col-md-12 mb-4">
			
			<!-- Latest article -->
			<div class="single-news">
				
				<!-- Intro image -->
				<div class="view overlay rounded shadow mb-4">
					<a href="<?php echo $list[0]->link; ?>">
						<img class="img-fluid w-100" src="<?php echo $article_image[$list[0]->id]; ?>" alt="<?php echo $article_image_alt[$list[0]->id]; ?>" />
					</a>
				</div>
				
				<!-- Title and date -->
				<div class="news-data d-flex justify-content-between">					
					<h3 class="fw-bold text-secondary mb-3">
						<a href="<?php echo $list[0]->link; ?>"><?php echo $list[0]->title; ?></a>
					</h3>
					<p class="fw-bold text-secondary"><?php echo $list[0]->displayDate; ?></p>
				</div>
				
				<!-- Introtext -->
              	<div class="news-data d-flex justify-content-between">
					<p class="text-secondary"><?php echo $list[0]->displayIntrotext; ?></p>		
                	<a href="<?php echo $list[0]->link; ?>"><i class="fas fa-angle-double-right"></i></a>  
              	</div>
			</div>
			
		</div>
		
		<div class="col-lg-6 col-md-12 mb-4">
			
			<!-- Article 1 -->
			<div class="single-news mb-4">					
				<div class="row">
					<div class="col-md-3">
						
						<!--Image-->
						<div class="view overlay rounded shadow mb-4">
							<a href="<?php echo $list[1]->link; ?>">
								<img class="img-fluid" src="<?php echo $article_image[$list[1]->id]; ?>" alt="<?php echo $article_image_alt[$list[1]->id]; ?>" />
							</a>
						</div>
						
					</div>
					<div class="col-md-9">
						
						<!-- -->
						<p class="fw-bold text-secondary"><?php echo $list[1]->displayDate; ?></p>
						<div class="d-flex justify-content-between">
							<div class="col-11 text-truncate ps-0 mb-3">
								<a href="<?php echo $list[1]->link; ?>" class="text-secondary"><?php echo $list[1]->displayIntrotext; ?></a>
							</div>
							<a href="<?php echo $list[1]->link; ?>"><i class="fas fa-angle-double-right"></i></a>
						</div>
						
					</div>
				</div>
			</div>
			
			
			<!-- Article 2 -->
			<div class="single-news mb-4">
				<div class="row">
					<div class="col-md-3">
						
						<!--Image-->
						<div class="view overlay rounded shadow mb-4">
							<a href="<?php echo $list[2]->link; ?>">
								<img class="img-fluid" src="<?php echo $article_image[$list[2]->id]; ?>" alt="<?php echo $article_image_alt[$list[2]->id]; ?>" />
							</a>
						</div>
						
					</div>
					<div class="col-md-9">
						
						<!--  -->
						<p class="fw-bold text-secondary"><?php echo $list[2]->displayDate; ?></p>
						<div class="d-flex justify-content-between">
							<div class="col-11 text-truncate ps-0 mb-3">
								<a href="<?php echo $list[2]->link; ?>"><?php echo $list[2]->displayIntrotext; ?></a>
							</div>
							<a href="<?php echo $list[2]->link; ?>"><i class="fas fa-angle-double-right"></i></a>
						</div>
						
					</div>
				</div>					
			</div>
			
			<!-- Article 3 -->
			<div class="single-news mb-4">
				<div class="row">
					<div class="col-md-3">
						
						<!--Image-->
						<div class="view overlay rounded shadow mb-4">
							<a href="<?php echo $list[3]->link; ?>">
								<img class="img-fluid" src="<?php echo $article_image[$list[3]->id]; ?>" alt="<?php echo $article_image_alt[$list[3]->id]; ?>" />
							</a>
						</div>
						
					</div>
					<div class="col-md-9">
						
						<!--  -->
						<p class="fw-bold text-secondary"><?php echo $list[3]->displayDate; ?></p>
						<div class="d-flex justify-content-between">
							<div class="col-11 text-truncate ps-0 mb-3">
								<a href="<?php echo $list[3]->link; ?>"><?php echo $list[3]->displayIntrotext; ?></a>
							</div>
							<a href="<?php echo $list[3]->link; ?>"><i class="fas fa-angle-double-right"></i></a>
						</div>
						
					</div>
				</div>
			</div>
			
			<!-- Article 4 -->
			<div class="single-news">
				<div class="row">
					<div class="col-md-3">
						
						<!--Image-->
						<div class="view overlay rounded shadow mb-md-0 mb-4">
							<a href="<?php echo $list[4]->link; ?>">
								<img class="img-fluid" src="<?php echo $article_image[$list[4]->id]; ?>" alt="<?php echo $article_image_alt[$list[4]->id]; ?>" />
							</a>
						</div>
						
					</div>
					<div class="col-md-9">
						
						<!-- infos -->
						<p class="fw-bold text-secondary"><?php echo $list[4]->displayDate; ?></p>
						<div class="d-flex justify-content-between">
							<div class="col-11 text-truncate ps-0 mb-lg-3">
								<a href="<?php echo $list[4]->link; ?>"><?php echo $list[4]->displayIntrotext; ?></a>
							</div>
							<a href="<?php echo $list[4]->link; ?>"><i class="fas fa-angle-double-right"></i></a>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
	
</section>
