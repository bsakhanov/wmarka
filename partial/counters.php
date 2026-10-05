<?php
/**
 * WMARKA — счётчики: Яндекс Метрика и Google Analytics по ID из настроек,
 * произвольный код перед </body>, модули позиции counters (скрытые).
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Wmarka\Template\Config;

// Счётчики не нужны администраторам, если так настроено
$user = Factory::getApplication()->getIdentity();

if (Config::bool('counters_skip_admins', false) && $user && $user->authorise('core.login.admin')) {
    echo $this->code('body_end');
    return;
}

$ym = preg_replace('/\D/', '', Config::str('counter_yandex'));
$ga = preg_replace('/[^A-Z0-9-]/i', '', Config::str('counter_google'));

if ($ym !== '') : ?>
<script>
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};m[i].l=1*new Date();for(var j=0;j<document.scripts.length;j++){if(document.scripts[j].src===r){return;}}k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})(window,document,"script","https://mc.yandex.ru/metrika/tag.js","ym");
ym(<?php echo $ym; ?>,"init",{clickmap:true,trackLinks:true,accurateTrackBounce:true<?php echo Config::bool('counter_webvisor', false) ? ',webvisor:true' : ''; ?>});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/<?php echo $ym; ?>" style="position:absolute;left:-9999px" alt=""></div></noscript>
<?php endif;

if ($ga !== '') : ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga; ?>"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?php echo $ga; ?>');</script>
<?php endif;

echo $this->code('body_end');

if ($this->count('counters')) : ?>
<div hidden><?php echo $this->modules('counters', 'none'); ?></div>
<?php endif;
