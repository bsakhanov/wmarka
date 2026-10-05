<?php
/**
 * WMARKA — позиции под основным контентом: block-c … block-k.
 *
 * @var \Wmarka\Template\Helper $this
 */

\defined('_JEXEC') or die;

foreach (['block-c', 'block-d', 'block-e', 'block-f', 'block-g', 'block-h', 'block-i', 'block-k'] as $position) {
    echo $this->block($position);
}
