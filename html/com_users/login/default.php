<?php
/**
 * WMARKA — страница входа / выхода.
 *
 * @var \Joomla\Component\Users\Site\View\Login\HtmlView $this
 */

\defined('_JEXEC') or die;

echo (!empty($this->user->cookieLogin) || $this->user->guest) ? $this->loadTemplate('login') : $this->loadTemplate('logout');
