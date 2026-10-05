<?php
/**
 * WMARKA — кнопка «наверх» (ведёт на body#top, а не на скрываемый тулбар).
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Wmarka\Template\Config;
use Wmarka\Template\Ui;

if (!Config::bool('totop', true)) {
    return;
}
?>
<a class="uk-position-fixed uk-position-bottom-right uk-position-small uk-icon-button uk-box-shadow-small" href="#top" uk-totop uk-scroll uk-scrollspy="cls: uk-animation-fade; repeat: true" aria-label="<?php echo Ui::esc(Text::_('TPL_WMARKA_BACK_TO_TOP')); ?>" style="z-index: 980"></a>
