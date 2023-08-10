<?php
defined('_JEXEC') or die;


// init $tpl helper
require dirname(__FILE__) . '/php/init.php';

?><?php echo $tpl->renderHTML(); ?>
<head>
    <jdoc:include type="head"/>
</head>
<body class="<?php echo $tpl->getBodyClasses(); ?>">

    <div class="component-wrapper">
        <jdoc:include type="message" />
        <jdoc:include type="component" />
    </div>

</body></html>
