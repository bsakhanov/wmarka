<?php
/**
 * WMARKA — категория списком (таблица материалов).
 *
 * @var \Joomla\Component\Content\Site\View\Category\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

$this->subtemplatename = 'articles';

echo LayoutHelper::render('joomla.content.category_default', $this);
