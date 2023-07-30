<?php

defined('_JEXEC') or die;

?>
<?php
/*
 * footer-left
 * footer-center
 * footer-right
 */

if ($_this->countModules('footer-left + footer-center + footer-right')) {
?>
<footer class="uk-section uk-section-secondary uk-padding-remove-bottom">
			<div class="uk-container">

        <div class="uk-margin-top uk-child-width-1-3@m" data-uk-grid>

            <?php if ($_this->countModules('footer-left')) { ?>
            <div>
                <jdoc:include type="modules" name="footer-left" style="none" />
            </div>
            <?php } ?>

            <?php if ($_this->countModules('footer-center')) { ?>
            <div>
                <jdoc:include type="modules" name="footer-center" style="none" />
            </div>
            <?php } ?>

            <?php if ($_this->countModules('footer-right')) { ?>
            <div>
                <jdoc:include type="modules" name="footer-right" style="none" />
            </div>
            <?php } ?>
        </div>
		<div class="uk-grid-small uk-child-width-1-2@m" data-uk-grid>
		<div class="uk-navbar-item uk-logo uk-text-large uk-text-bold "><img src="/templates/wmarka/images/logo.svg" width="300" height="68">	
			</div> 
			<div>	
			Copyright © 2012—2023 Bestnews.kz Все права защищены +18 
			</div>
		</div>
		<div>
<div>
		<ul class="as-social  uk-grid-small uk-flex-middle" data-uk-grid>
    <li>
        <a class="as-icon-tiktok uk-icon-button" href="https://tiktok.com/@bestnews.kz1" data-uk-icon="icon: tiktok" title="Tiktok"></a>
    </li>	
    <li>
        <a class="as-icon-facebook uk-icon-button" href="https://www.facebook.com/Bestnewskz/" data-uk-icon="icon: facebook" title="Facebook"></a>
    </li>
    <li>
        <a class="as-icon-telegram uk-icon-button" href="https://t.me/bestnewskz" data-uk-icon="icon: telegram" title="Telegram"></a>
    </li>
    <li>
        <a class="as-icon-twitter uk-icon-button" href="https://twitter.com/bestnews_kz" data-uk-icon="icon: twitter" title="Twitter"></a>
    </li>
    <li>
        <a class="as-icon-youtube uk-icon-button" href="https://www.youtube.com/user/bestnewskz" data-uk-icon="icon: youtube" title="YouTube"></a>
    </li>
    <li>
        <a class="as-icon-instagram uk-icon-button" href="https://www.instagram.com/bestnews.kz/" data-uk-icon="icon: instagram" title="Instagram"></a>
    </li>


 

</ul>
<style>
    .as-social [class*=as-icon-]{color:#fff;background-color:#1e87f0;border-radius:50%;transition-property:border-radius,background-color;}
    .as-icon-facebook:hover{background-color:#3B5999}
    .as-icon-youtube:hover{background-color:#FF0000}
    .as-icon-instagram:hover{background-color:#DB307F}
    .as-icon-twitter:hover{background-color:#3FACE2}
    .as-icon-vk:hover{background-color:#5181B8}
    .as-icon-odnoklassniki:hover{background-color:#F58220}
    .as-icon-whatsapp:hover{background-color:#3EE25B}
    .as-icon-viber:hover{background-color:#7B519D}
    .as-icon-telegram:hover{background-color:#24A1DE}
    .as-icon-tiktok:hover{background-color:#0078CA}
    [class*=as-icon-]:hover{color:#fff;border-radius:6px}
</style>
</div>
						<div class="uk-h5" >
 
					<!--РИА Bestnews.kz информационный партнер ХК Барыс и ХК Сарыарка-->
					<!--РИА Bestnews.kz — информпартнер:-->
					Информпартнерство:
				</div>
				<div class="uk-h5 uk-width-1-3@s" >
				<div>
					<a href="/">
						<picture>
							<source srcset="/templates/wmarka/images/part/baris-logo.webp" type="image/webp" width="115" height="93">
							<img src="/templates/wmarka/images/part/baris-logo.png" width="115" height="93" class=""
							alt="Наш партнер ХК Барыс "  itemprop="thumbnailUrl"/>
						</picture>		
					</a></div>
					<div>
                    <a href="/">
						<picture>
							<img src="/templates/wmarka/images/part/footer-logo-3.png" width="115" height="93" class=""
							alt="Наш партнер ХК Барыс "  itemprop="thumbnailUrl"/>
						</picture>	
					</a></div>
					<div>
					<a href="/">
						<picture>
							<source srcset="/templates/wmarka/images/part/logo-sariarka.webp" type="image/webp" width="115" height="93">
							<img src="/templates/wmarka/images/part/logo-sariarka.png" width="115" height="93" class=""
							alt="Наш партнер ХК Сарыарка"  itemprop="thumbnailUrl"/>
						</picture>					
					</a>
				</div>
				</div>
    </div>
</footer>
<?php } ?>