<?php
/**
 * Блок счетчиков и аналитики
 * Размещается в самом конце <body> для максимальной скорости загрузки страницы.
 */

defined('_JEXEC') or die;

// --- НАСТРОЙКИ СЧЕТЧИКОВ ---
$googleId       = ''; // Пример: 'G-XXXXXXXXXX'
$yandexId       = ''; // Пример: '12345678'
$liveinternetId = ''; // Твой ID LiveInternet

?>

<?php /* Визуальный блок счетчиков (виден только на больших экранах) */ ?>
<div id="counters" class="uk-section uk-section-xsmall uk-padding-remove-vertical uk-visible@m">
    <div class="uk-container uk-container-small">
        <div class="uk-flex uk-flex-center uk-flex-middle uk-grid-small" uk-grid>

            <?php if ($liveinternetId) : ?>
                <div class="tm-counter-item">
                    <script>
                        document.write("<a href='//www.liveinternet.ru/click' "+
                        "target=_blank><img src='//counter.yadro.ru/hit?t26.6;r"+
                        escape(document.referrer)+((typeof(screen)=="undefined")?"":
                        ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
                        screen.colorDepth:screen.bufferDepth))+";u"+escape(document.URL)+
                        ";h"+escape(document.title.substring(0,150))+";"+Math.random()+
                        "' alt='' title='LiveInternet' "+
                        "border='0' width='88' height='31'><\/a>")
                    </script>
                </div>
            <?php endif; ?>

            <?php /* Сюда можно добавить другие информеры (Яндекс, Rambler и т.д.) */ ?>
            
        </div>
    </div>
</div>

<?php /* --- СКРЫТЫЕ СКРИПТЫ АНАЛИТИКИ --- */ ?>

<?php if ($yandexId) : ?>
    <script type="text/javascript">
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();
       for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
       k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(<?php echo $yandexId; ?>, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/<?php echo $yandexId; ?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<?php endif; ?>

<?php if ($googleId) : ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleId; ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo $googleId; ?>');
    </script>
<?php endif; ?>

<?php /* Вывод модуля 'counters' из админки (если нужно добавить что-то через админ-панель — любые новые коды отслеживания 
(например, пиксель Facebook, тег Pinterest или код Hotjar) прямо через панель управления, не залезая в PHP-файлы шаблона.) */ ?>
<?php if ($this->doc->countModules('counters')) : ?>
    <div class="uk-hidden">
        <jdoc:include type="modules" name="counters" style="none" />
    </div>
<?php endif; ?>
