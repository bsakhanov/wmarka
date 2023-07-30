<?php

defined('_JEXEC') or die;

?>
 
<section id="block-k" class="uk-section uk-section2 uk-section-small uk-section-muted">
    <div class="uk-container  ">
        <div class=" uk-child-width-1-2@m uk-child-width-1-1@s uk-flex uk-flex-center uk-flex3" >
            			<div class=" uk-child-width-expand@s " >
    <div class="uk-text-primary">Информационное агентство «VRK News». Свидетельство о регистрации СМИ №15632-ИА выдано Комитетом связи, информатизации и информации Министерства по инвестициям и развитию Республики Казахстан 04.11.2015 г. </div>
    <div>
									
		<?php jimport( 'joomla.application.module.helper' );
    	        $position    = 'menu-footer';
		$modules 	= JModuleHelper::getModules( $position );
		$modulehtml = '';
		$attribs['style']	= 'xhtml';
 
		foreach($modules as $module) {	
			$modulehtml .= JModuleHelper::renderModule($module, $attribs);
		}
 
		// Add placholder code for onModuleRender search/replace
		$modulehtml .= '<!-- '.$position. ' -->';
		echo $modulehtml;
		?>
					
	</div>
    <div>
  <!-- extlinks -->   	
 
            
         
              
     <amp-analytics type="metrika">
        <script type="application/json">
        {
          "vars": {
            "counterId": "32250269"
          }
        }
        </script>
      </amp-analytics>

      <amp-analytics id="analytics_liveinternet">
<script type="application/json">{
 "requests": {
   "pageview": "https://counter.yadro.ru/hit;vrk_news?u${ampdocUrl};r${documentReferrer};s${screenWidth}*${screenHeight}*32;h${title};${random}"
 },
 "triggers": {
  "track pageview": {
   "on": "visible",
   "request": "pageview"
  }
 }
}</script>
      </amp-analytics>


	<hr /><small class="copy">Разработка: <a title="Разработка контентных сайтов" href="https://webmarka.kz" target="_blank" rel="noopener">Webmarka</a></small> 	


<!-- /extlinks -->		
		
		</div>
</div>
        </div>
    </div>
</section>
 