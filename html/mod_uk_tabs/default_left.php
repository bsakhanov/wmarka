<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_tabs
 * @copyright   Copyright (C) 2018 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>

<div class="uk-grid-coolapse" data-uk-grid>
    <div class="uk-width-auto">
        <ul class="mod_uk_tabs<?php echo $tabs_class; ?> uk-height-1-1" data-uk-tab<?php echo $tabs_params; ?>>
            <?php
            $i = 0;
            foreach ($items as $item)
            {
                $item_title_class = trim($item->title_class) ? ' ' . trim($item->title_class) : '';
                $tab_active = $i == $active ? ' class="uk-active"' : '';
            ?>
            <li<?php echo $tab_active; ?>>
                <h3 class="text-titlus uk-text-bold uk-mini uk-flex uk-flex-middle"><a class="uk-tabs-title uk-flex<?php echo $title_class, $item_title_class; ?>">
                    <span uk-icon="icon: checkmark; ratio: 1" class="uk-margin-small-right"></span>   <?php
                        switch ($title_type)
                        {
                            case 1:
                                echo $item->title;
                                break;
                            case 2:
                                if ($item->title_image)
                                {
                                    echo '<img src="' . $item->title_image . '" alt="' . $item->title . '"' . ((int)$title_img_width ? ' width="' . (int)$title_img_width . '"' : '') . ' >';
                                } else {
                                    echo $item->title;   
                                }
                                break;
                            case 3:
                                if ($item->title_image)
                                {
                                    echo '<img src="' . $item->title_image . '" alt="' . $item->title . '"' . ((int)$title_img_width ? ' width="' . (int)$title_img_width . '"' : '') . ' class="uk-margin-small-right" class="uk-icon-link" uk-icon="check; ratio: 2">' ;
                                }
                                echo $item->title;   
                    }
                    ?>
                </a></h3>
            </li>
            <?php $i++; } ?>
        </ul>
    </div>
    <div class="uk-width-expand">
        <ul id="mod_uk_tabs_<?php echo $module_id; ?>" class="mod_uk_tabs_switcher uk-switcher">
            <?php
            $i = 0;
            foreach ($items as $item)
            {
                $item_content_class = trim($item->content_class) ? ' ' . trim($item->content_class) : '';
                $tab_active = $i == $active ? ' class="uk-active"' : '';
            ?>
            <li class="uk-tabs-content<?php echo $content_class, $item_content_class, $tab_active; ?>"><?php echo $item->content; ?></li>
            <?php $i++; } ?>
        </ul>
    </div>
</div>
