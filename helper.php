<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\ArticlesCategory\Site\Helper;

use Joomla\CMS\Access\Access;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Date\Date;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\String\StringHelper;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects


function publish_date($timestamp) {
    $current_time = time();
    $publish_time = strtotime($timestamp);
    $time_diff = $current_time - $publish_time;
 
    $seconds = $time_diff;
    $minutes = round($seconds / 60); // 60 секунд. Минуты в UNIX формате даты
    $days = JHtml::_('date', $current_time, 'd') - JHtml::_('date', $publish_time, 'd');
 
    $minutes_interval = $minutes >= 2 && $minutes <= 4 || $minutes >= 22 && $minutes <= 24 || $minutes >= 32 && $minutes <= 34 || $minutes >= 42 && $minutes <= 44 || $minutes >= 52 && $minutes <= 54;
    $minut_interval   = $minutes == 0 || $minutes >= 5 && $minutes <= 20 || $minutes >= 25 && $minutes <= 30 || $minutes >= 35 && $minutes <= 40 || $minutes >= 45 && $minutes <= 50 || $minutes >= 55 && $minutes <= 60;
    $minuta_interval  = $minutes == 1 | $minutes == 21 || $minutes == 31 || $minutes == 41 || $minutes == 51;
 
    if ($seconds <= 60) {
      return "<span>" . JText::_('COM_CCK_JUST_NOW') . "</span>";
    } else if ($minutes <= 59) {
      if ($minutes == 1) {
        return "<span>" . JText::_('COM_CCK_JUST_NOW') . "</span>";
      } else if ($minutes_interval) {
        return "<span>" . $minutes . " " . JText::_('COM_CCK_MINUTES') . " " . JText::_('COM_CCK_AGO') . "</span>";
      } else if ($minut_interval) {
        return "<span>" . $minutes . " " . JText::_('COM_CCK_MINUT') . " " . JText::_('COM_CCK_AGO') . "</span>";
      } else if ($minuta_interval) {
        return "<span>" . $minutes . " " . JText::_('COM_CCK_MINUTE') . " " . JText::_('COM_CCK_AGO') . "</span>";
      }
    } else if ($days == 0) {
      return "<span>" . JText::_('COM_CCK_TODAY_AT') . " " . JHtml::_('date', $timestamp, JText::_('DATE_FORMAT_LC12')) . "</span>";
    }else if ($days == 1) {
      return "<span>" . JText::_('COM_CCK_YESTERDAY_IN') . " " . JHtml::_('date', $timestamp, JText::_('DATE_FORMAT_LC12')) . "</span>";
    } else {
      return "<span>" . JHtml::_('date', $timestamp, JText::_('DATE_FORMAT_LC2')) . "</span>";
    }
  }