<?php
/**
 * WMARKA — категория контактов.
 *
 * @var \Joomla\Component\Contact\Site\View\Category\HtmlView $this
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

$this->subtemplatename = 'items';

echo LayoutHelper::render('joomla.content.category_default', $this);
