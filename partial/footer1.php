<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.master3lite
 * @copyright   Copyright (C) Aleksey A. Morozov. All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

?>

<footer class="uk-section uk-section-secondary2 uk-padding-remove-vertical">

    <div class="uk-container uk-container-xsmall  center">
		 
 
			 
			 
			 <a class="uk-logo" href="/">
			     <img src="https://new.bestnews.kz/templates/wmarka/images/logo.svg" width="120" height="34" alt="">
			 </a>
 
			
	 
         
			<div class="uk-margin-top  center  "> 
			<small>Copyright © 2012—2023 Bestnews.kz <br>  Все права защищены  <br> <div class="uk-text-large uk-text-bold">18+</div>  </small>
	

				</div>
		   		 
      
        <div  class="uk-margin-top uk-padding uk-text-center uk-text-bold center">
             <a class="uk-button uk-button-default uk-button-small uk-border-rounded uk-button-secondary2">Магазин (подарки)</a>
			 <a class="uk-button uk-button-default uk-button-small uk-border-rounded uk-button-secondary1" href="o-nas/bestnews-history">История+награды</a>
			 <a class="uk-button uk-button-default uk-button-small uk-border-rounded uk-button-secondary" href="spetsproekty">Спецпроекты</a>
			 <a class="uk-button uk-button-default uk-button-small uk-border-rounded uk-button-danger" href="reklama">Для рекламодателей</a>
			 <a class="uk-button uk-button-default uk-button-small uk-border-rounded uk-button-secondary3" href="pravila">Copyright</a>
			 <a class="uk-button uk-button-default uk-button-small uk-border-rounded uk-button-primary">Поддержать Bestnews.kz</a>
			 <a class="uk-button uk-button-default uk-button-small uk-border-rounded uk-button-secondary4" href="prislat-novost">Прислать новость</a>
			 <a class="uk-button uk-button-default uk-button-small uk-border-rounded uk-button-secondary5" href="/">Стать подписчиком</a>
			 <a class="uk-button uk-button-default uk-button-small uk-border-rounded uk-button-secondary6" href="#modal-login">Войти на сайт</a>
			</div>
		 
			  
 
 
 
 
 </div>
			 
	      <amp-analytics type="metrika">
        <script type="application/json">
        {
          "vars": {
            "counterId": "14187916"
          }
        }
        </script>
      </amp-analytics>
  
   
 <amp-analytics type="googleanalytics" id="googleanalytics">
        <script type="application/json">
        {
          "vars": {
            "account": "UA-11111111-1"
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