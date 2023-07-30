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

    <div class="uk-container uk-container-xsmall  ">
		<div class=" uk-padding uk-hr uk-flex uk-flex-middle uk-flex-center"  uk-grid>
 
			 
			 <div class="uk-width-auto uk-flex  uk-flex-center">
			 <a class="uk-logo" href="/">
			     <img src="https://bestnews.kz/templates/wmarka/images/logo.svg" width="120" height="34" alt="">
			 </a>
 
			
			</div>
         
			<div class="uk-padding-remove-top uk-text-center  uk-visibles"> 
			<small>Copyright © 2012—2023 Bestnews.kz <br>  Все права защищены  <br> <div class="uk-text-large uk-text-bold">18+</div>  </small>
	

				</div>
		</div>   		 
		<div class="  uk-flex uk-flex-top uk-flex-center uk-margin-small uk-visibles" >
			 
 
<ul class="as-social uk-grid-small uk-grid-small2 uk-flex-middle uk-width-2-3@m uk-flex  uk-flex-center" data-uk-grid>
	<li><a href="https://tiktok.com/@bestnews.kz1" class="as-icon-tiktok uk-icon-button" title="Tiktok" data-uk-icon="icon: tiktok"></a></li>
	<li><a href="https://www.facebook.com/Bestnewskz/" class="as-icon-facebook uk-icon-button" title="Facebook" data-uk-icon="icon: facebook"></a></li>
	<li><a href="https://t.me/bestnewskz" class="as-icon-telegram uk-icon-button" title="Telegram" data-uk-icon="icon: telegram"></a></li>
	<li><a href="https://twitter.com/bestnews_kz" class="as-icon-twitter uk-icon-button" title="Twitter" data-uk-icon="icon: twitter"></a></li>
	<li><a href="https://www.youtube.com/user/bestnewskz" class="as-icon-youtube uk-icon-button" title="YouTube" data-uk-icon="icon: youtube"></a></li>
	<li><a href="https://www.instagram.com/bestnews.kz/" class="as-icon-instagram uk-icon-button" title="Instagram" data-uk-icon="icon: instagram"></a></li>
</ul>
 
 </div>      
        <div uk-margin class="uk-padding uk-text-center uk-text-bold center">
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
		 
			  
 
 
 
	<div class="uk-padding-small uk-flex uk-flex-top uk-flex-center" uk-grid>	 
					

	
<div class="uk-grid-collapse  uk-text-center uk-padding-remove-vertical center uk-visibles uk-visibles" uk-grid>
				<div class="uk-width-auto uk-text-bold"  >
 
					Партнеры:
				</div>
				<div class="uk-flex uk-flex-top uk-flex-center  uk-text-center"  >
				<div class="uk-width-auto margin-mini5">
					<a href="https://www.hcbarys.kz/">
						<picture>
							<source srcset="/templates/wmarka/images/part/baris-logo.webp" type="image/webp" width="60" height="48">
							<img src="/templates/wmarka/images/part/baris-logo.png" width="60" height="48" class="" alt="Наш партнер — ХК Барыс" title="Наш — партнер ХК Барыс" itemprop="thumbnailUrl">
						</picture>		
						</a>
						</div>
						<div class="uk-width-auto margin-mini5">
					<a href="https://saryarka-hc.kz/">
							<img src="/templates/wmarka/images/part/sary2.png" width="70" height="48" class="uk-margin-small-left" alt="Наш партнер — ХК «Сарыарка»" title="Наш партнер — ХК «Сарыарка»" itemprop="thumbnailUrl">
					</a>
					</div>
						<div class="uk-width-auto margin-mini5 uk-margin-small-left">					
					<a href="https://kfb.kz/">
						<picture>
							<source srcset="/templates/wmarka/images/part/logo1-kfb.webp" type="image/webp" width="42" height="48">
							<img src="/templates/wmarka/images/part/logo1-kfb.jpg" width="42" height="48" class="" alt="Наш партнер — Федерация бокса" title="Наш партнер — Федерация бокса" itemprop="thumbnailUrl">
						</picture>						</a></div>
								</div>
									</div>
								 
<div class="uk-margin-left uk-flex uk-flex-top uk-flex-center uk-visibles" >
			<div class="margin-mini5">
				<!-- Yandex.Metrika informer -->
				<a href="https://metrika.yandex.kz/stat/?id=14187916&amp;from=informer"
				target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/14187916/2_1_FFFFE9FF_FFF0C9FF_0_pageviews"
				style="width:80px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры)" class="ym-advanced-informer" data-cid="14187916" data-lang="ru" /></a>
				<!-- /Yandex.Metrika informer -->

				<!-- Yandex.Metrika counter -->
				<script type="text/javascript" >
				   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
				   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
				   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

				   ym(14187916, "init", {
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true
				   });
				</script>
				<noscript><div><img src="https://mc.yandex.ru/watch/14187916" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
				<!-- /Yandex.Metrika counter -->
				</div>
				<div class="margin-mini5">
								<!-- ZERO.kz -->
				<span id="_zero_64243">
				<noscript>
					<a href="http://zero.kz/?s=64243" target="_blank">
					<img src="http://c.zero.kz/z.png?u=64243" width="88" height="31" alt="ZERO.kz" />
					</a>
				</noscript>
				</span>

				<script type="text/javascript"><!--
				var _zero_kz_ = _zero_kz_ || [];
				_zero_kz_.push(["id", 64243]);
				// Цвет кнопки
				_zero_kz_.push(["type", 1]);
				// Проверять url каждые 200 мс, при изменении перегружать код счётчика
				// _zero_kz_.push(["url_watcher", 200]);

				(function () {
					var a = document.getElementsByTagName("script")[0],
					s = document.createElement("script");
					s.type = "text/javascript";
					s.async = true;
					s.src = (document.location.protocol == "https:" ? "https:" : "http:")
					+ "//c.zero.kz/z.js";
					a.parentNode.insertBefore(s, a);
				})(); //-->
				</script>
				<!-- End ZERO.kz -->
				</div>
				<div class="margin-mini5">
				<!--LiveInternet counter--><script type="text/javascript">
				document.write('<a href="//www.liveinternet.ru/click" '+
				'target="_blank"><img src="//counter.yadro.ru/hit?t52.6;r'+
				escape(document.referrer)+((typeof(screen)=='undefined')?'':
				';s'+screen.width+'*'+screen.height+'*'+(screen.colorDepth?
				screen.colorDepth:screen.pixelDepth))+';u'+escape(document.URL)+
				';h'+escape(document.title.substring(0,150))+';'+Math.random()+
				'" alt="" title="LiveInternet: показано число просмотров и'+
				' посетителей за 24 часа" '+
				'border="0" width="88" height="31"><\/a>')
				</script><!--/LiveInternet-->				
				</div>
				<div class="margin-mini5">
				<!-- Rating Mail.ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "2396736", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = "https://top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "topmailru-code");
</script><noscript><div>
<img src="https://top-fwz1.mail.ru/counter?id=2396736;js=na" style="border:0;position:absolute;left:-9999px;" alt="Top.Mail.Ru" />
</div></noscript>
<!-- //Rating Mail.ru counter -->

			</div>
</div>
	</div>
 </div>
			 
	 
	
</footer>