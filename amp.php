<?php defined('_JEXEC') or die;
require dirname(__FILE__) . '/php/init.php';
?>
<?php
require_once __DIR__ . '/amp/amp/vendor/autoload.php';
use Lullabot\AMP\AMP;
use Lullabot\AMP\Validate\Scope;
?>
<!doctype html>
<html ⚡>
<head>
<meta charset="utf-8">
  <?php
  $document = JFactory::getDocument();
  use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Language\Associations;
HTMLHelper::addIncludePath(JPATH_COMPONENT . '/helpers');


  echo "<title>".$document->title."</title>".PHP_EOL;
  if (!empty($document->description)) {
    echo "<meta name='description' content='".$document->description."'/>";
  }
  else {
    $descr = str_replace("\n", ' ', $document->_custom[8]); //description
    echo $descr;
  }
  $amp = new AMP();
  $html = file_get_contents(JURI::current().'?tmpl=ampcomponent');
  $amp->loadHtml($html);
  $amp_html = $amp->convertToAmpHtml();
  // $amp_html = str_replace('<div id="disqus_thread"></div>', '', $amp_html);
  // dump($amp_html,0,'test');
  ?>

<!-- Twitter card -->
<meta content="summary" property="twitter:card" />
<meta name="twitter:title" content="<?php echo JHtml::_('string.truncate', (strip_tags($document->title)), '60'); ?>" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@shkola_30nur_sultan" />
<meta name="twitter:creator" content="@shkola_30nur_sultan" />
<meta name="twitter:url" content="<?php echo JURI::current(); ?>" />
<meta name="twitter:description" content="<?php echo $document->description; ?>" />
<meta name="twitter:image" content="<?php echo $document->images; ?>" />
<meta name="twitter:image:src" content="<?php echo $document->images; ?>" />	

  <link rel='canonical' href='<?php echo JURI::current(); ?>' >
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
        <script async src="https://cdn.ampproject.org/v0.js"></script>
        <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
        <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
        <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
		<script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>
		<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
		<script async custom-element="amp-facebook" src="https://cdn.ampproject.org/v0/amp-facebook-0.1.js"></script>
		<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
		<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
		<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
		<script async custom-element="amp-audio" src="https://cdn.ampproject.org/v0/amp-audio-0.1.js"></script>
		<script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>  
		<script async custom-element="amp-image-lightbox" src="https://cdn.ampproject.org/v0/amp-image-lightbox-0.1.js"></script>
  <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
 <style amp-custom>
.italic,blockquote{font-style:italic}.nowrap,.truncate{white-space:nowrap}.list-reset,.list-style-none{list-style:none}.fit,.truncate,img{max-width:100%}.ml0,.mx0,blockquote{margin-left:0}.mr0,.mx0{margin-right:0}*,.border-box,.col,.col-right{box-sizing:border-box}body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Helvetica,sans-serif;line-height:1.5;margin:0}img{height:auto}svg{max-height:100%}a{color:#07c}h1,h2,h3,h4,h5,h6{font-weight:600;line-height:1.25;margin-top:1em;margin-bottom:.5em}.h1,h1{font-size:2rem}h2{font-size:1.5rem}h3{font-size:1.25rem}h4{font-size:1rem}h5{font-size:.875rem}h6{font-size:.75rem}code,pre,samp{font-size:87.5%}blockquote,dl,ol,p,pre,ul{margin-top:1em;margin-bottom:1em}code,pre,samp{font-family:'Roboto Mono','Source Code Pro',Menlo,Consolas,'Liberation Mono',monospace}code,samp{padding:.125em}.list-reset,.pl0,.px0{padding-left:0}.pr0,.px0{padding-right:0}.pt0,.py0{padding-top:0}.pb0,.py0{padding-bottom:0}pre{overflow:scroll}.overflow-hidden,.truncate{overflow:hidden}blockquote{font-size:1.25rem}hr{margin-top:1.5em;margin-bottom:1.5em;border:0;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#ccc}.mt0,.my0{margin-top:0}.mb0,.my0{margin-bottom:0}.h2{font-size:1.5rem}.h3{font-size:1.25rem}.h4{font-size:1rem}.h5{font-size:.875rem}.h6{font-size:.75rem}.font-family-inherit{font-family:inherit}.font-size-inherit{font-size:inherit}.text-decoration-none{text-decoration:none}.bold{font-weight:700}.regular{font-weight:400}.caps{text-transform:uppercase;letter-spacing:.2em}.left-align{text-align:left}.center{text-align:center}.right-align{text-align:right}.justify{text-align:justify}.break-word{word-wrap:break-word}.line-height-1{line-height:1}.line-height-2{line-height:1.125}.line-height-3{line-height:1.25}.line-height-4{line-height:1.5}.underline{text-decoration:underline}.truncate{text-overflow:ellipsis}.inline{display:inline}.block{display:block}.inline-block{display:inline-block}.table{display:table}.table-cell{display:table-cell}.overflow-scroll{overflow:scroll}.overflow-auto{overflow:auto}.clearfix:after,.clearfix:before{content:" ";display:table}.clearfix:after{clear:both}.left{float:left}.right{float:right}.max-width-1{max-width:24rem}.max-width-2{max-width:32rem}.max-width-3{max-width:48rem}.max-width-4{max-width:64rem}.align-baseline{vertical-align:baseline}.align-top{vertical-align:top}.align-middle{vertical-align:middle}.align-bottom{vertical-align:bottom}.m0{margin:0}.ml1,.mx1{margin-left:.5rem}.mr1,.mx1{margin-right:.5rem}.mt1,.my1{margin-top:.5rem}.mb1,.my1{margin-bottom:.5rem}.m1{margin:.5rem}.ml2,.mx2{margin-left:1rem}.mr2,.mx2{margin-right:1rem}.mt2,.my2{margin-top:1rem}.mb2,.my2{margin-bottom:1rem}.m2{margin:1rem}.ml3,.mx3{margin-left:2rem}.mr3,.mx3{margin-right:2rem}.mt3,.my3{margin-top:2rem}.mb3,.my3{margin-bottom:2rem}.m3{margin:2rem}.ml4,.mx4{margin-left:4rem}.mr4,.mx4{margin-right:4rem}.mt4,.my4{margin-top:4rem}.mb4,.my4{margin-bottom:4rem}.m4{margin:4rem}.mxn1{margin-left:-.5rem;margin-right:-.5rem}.mxn2{margin-left:-1rem;margin-right:-1rem}.mxn3{margin-left:-2rem;margin-right:-2rem}.mxn4{margin-left:-4rem;margin-right:-4rem}.ml-auto,.mx-auto{margin-left:auto}.mr-auto,.mx-auto{margin-right:auto}.p0{padding:0}.pl1,.px1{padding-left:.5rem}.pr1,.px1{padding-right:.5rem}.pt1,.py1{padding-top:.5rem}.pb1,.py1{padding-bottom:.5rem}.p1{padding:.5rem}.pt2,.py2{padding-top:1rem}.pb2,.py2{padding-bottom:1rem}.pl2,.px2{padding-left:1rem}.pr2,.px2{padding-right:1rem}.p2{padding:1rem}.pt3,.py3{padding-top:2rem}.pb3,.py3{padding-bottom:2rem}.pl3,.px3{padding-left:2rem}.pr3,.px3{padding-right:2rem}.p3{padding:2rem}.pt4,.py4{padding-top:4rem}.pb4,.py4{padding-bottom:4rem}.pl4,.px4{padding-left:4rem}.pr4,.px4{padding-right:4rem}.p4{padding:4rem}.col{float:left}.col-right{float:right}.col-1{width:8.33333%}.col-2{width:16.66667%}.col-3{width:25%}.col-4{width:33.33333%}.col-5{width:41.66667%}.col-6{width:50%}.col-7{width:58.33333%}.col-8{width:66.66667%}.col-9{width:75%}.col-10{width:83.33333%}.col-11{width:91.66667%}.col-12{width:100%}.flex{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}@media (min-width:40em){.sm-col,.sm-col-right{box-sizing:border-box}.sm-col{float:left}.sm-col-right{float:right}.sm-col-1{width:8.33333%}.sm-col-2{width:16.66667%}.sm-col-3{width:25%}.sm-col-4{width:33.33333%}.sm-col-5{width:41.66667%}.sm-col-6{width:50%}.sm-col-7{width:58.33333%}.sm-col-8{width:66.66667%}.sm-col-9{width:75%}.sm-col-10{width:83.33333%}.sm-col-11{width:91.66667%}.sm-col-12{width:100%}.sm-flex{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}}@media (min-width:52em){.md-col,.md-col-right{box-sizing:border-box}.md-col{float:left}.md-col-right{float:right}.md-col-1{width:8.33333%}.md-col-2{width:16.66667%}.md-col-3{width:25%}.md-col-4{width:33.33333%}.md-col-5{width:41.66667%}.md-col-6{width:50%}.md-col-7{width:58.33333%}.md-col-8{width:66.66667%}.md-col-9{width:75%}.md-col-10{width:83.33333%}.md-col-11{width:91.66667%}.md-col-12{width:100%}.md-flex{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}}@media (min-width:64em){.lg-col,.lg-col-right{box-sizing:border-box}.lg-col{float:left}.lg-col-right{float:right}.lg-col-1{width:8.33333%}.lg-col-2{width:16.66667%}.lg-col-3{width:25%}.lg-col-4{width:33.33333%}.lg-col-5{width:41.66667%}.lg-col-6{width:50%}.lg-col-7{width:58.33333%}.lg-col-8{width:66.66667%}.lg-col-9{width:75%}.lg-col-10{width:83.33333%}.lg-col-11{width:91.66667%}.lg-col-12{width:100%}.lg-flex{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.lg-hide{display:none}}.flex-column{-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}.flex-wrap{-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap}.items-start{-webkit-box-align:start;-webkit-align-items:flex-start;-ms-flex-align:start;-ms-grid-row-align:flex-start;align-items:flex-start}.items-end{-webkit-box-align:end;-webkit-align-items:flex-end;-ms-flex-align:end;-ms-grid-row-align:flex-end;align-items:flex-end}.items-center{-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;-ms-grid-row-align:center;align-items:center}.items-baseline{-webkit-box-align:baseline;-webkit-align-items:baseline;-ms-flex-align:baseline;-ms-grid-row-align:baseline;align-items:baseline}.items-stretch{-webkit-box-align:stretch;-webkit-align-items:stretch;-ms-flex-align:stretch;-ms-grid-row-align:stretch;align-items:stretch}.self-start{-webkit-align-self:flex-start;-ms-flex-item-align:start;align-self:flex-start}.self-end{-webkit-align-self:flex-end;-ms-flex-item-align:end;align-self:flex-end}.self-center{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center}.self-baseline{-webkit-align-self:baseline;-ms-flex-item-align:baseline;align-self:baseline}.self-stretch{-webkit-align-self:stretch;-ms-flex-item-align:stretch;align-self:stretch}.justify-start{-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start}.justify-end{-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end}.justify-center{-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.justify-between{-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between}.justify-around{-webkit-justify-content:space-around;-ms-flex-pack:distribute;justify-content:space-around}.content-start{-webkit-align-content:flex-start;-ms-flex-line-pack:start;align-content:flex-start}.content-end{-webkit-align-content:flex-end;-ms-flex-line-pack:end;align-content:flex-end}.content-center{-webkit-align-content:center;-ms-flex-line-pack:center;align-content:center}.content-between{-webkit-align-content:space-between;-ms-flex-line-pack:justify;align-content:space-between}.content-around{-webkit-align-content:space-around;-ms-flex-line-pack:distribute;align-content:space-around}.content-stretch{-webkit-align-content:stretch;-ms-flex-line-pack:stretch;align-content:stretch}.flex-auto{-webkit-box-flex:1;-webkit-flex:1 1 auto;-ms-flex:1 1 auto;flex:1 1 auto;min-width:0;min-height:0}.flex-none{-webkit-box-flex:0;-webkit-flex:none;-ms-flex:none;flex:none}.order-0{-webkit-box-ordinal-group:1;-webkit-order:0;-ms-flex-order:0;order:0}.order-1{-webkit-box-ordinal-group:2;-webkit-order:1;-ms-flex-order:1;order:1}.order-2{-webkit-box-ordinal-group:3;-webkit-order:2;-ms-flex-order:2;order:2}.order-3{-webkit-box-ordinal-group:4;-webkit-order:3;-ms-flex-order:3;order:3}.order-last{-webkit-box-ordinal-group:100000;-webkit-order:99999;-ms-flex-order:99999;order:99999}.relative{position:relative}.absolute{position:absolute}.fixed{position:fixed}.top-0{top:0}.right-0{right:0}.bottom-0{bottom:0}.left-0{left:0}.z1{z-index:1}.z2{z-index:2}.z3{z-index:3}.z4{z-index:4}.border{border-style:solid;border-width:1px}.border-top{border-top-style:solid;border-top-width:1px}.border-right{border-right-style:solid;border-right-width:1px}.border-bottom{border-bottom-style:solid;border-bottom-width:1px}.border-left{border-left-style:solid;border-left-width:1px}.border-none{border:0}.rounded{border-radius:3px}.circle{border-radius:50%}.rounded-top{border-radius:3px 3px 0 0}.rounded-right{border-radius:0 3px 3px 0}.rounded-bottom{border-radius:0 0 3px 3px}.rounded-left{border-radius:3px 0 0 3px}.not-rounded{border-radius:0}.hide{position:absolute;height:1px;width:1px;overflow:hidden;clip:rect(1px,1px,1px,1px)}@media (max-width:40em){.xs-hide{display:none}}@media (min-width:40em) and (max-width:52em){.sm-hide{display:none}}@media (min-width:52em) and (max-width:64em){.md-hide{display:none}}.display-none{display:none}.amp-container{background:#fff;max-width:960px}.amp-modules-top{margin-bottom:1rem}.amp-modules-bottom{margin-top:1rem}.amp-ad-top{margin-bottom:1rem}.amp-ad-bottom{margin-top:1rem}.amp-debug{margin-top:1rem}.amp-debug pre{color:#666;-moz-tab-size:4;tab-size:4;overflow:auto;padding:25px;border:0 solid #e5e5e5;border-radius:0;background:#f8f8f8;white-space:pre-wrap;word-wrap:break-word}.amp-close-btn{top:15px;cursor:pointer;position:absolute}.amp-close-btn-left{right:15px}.amp-close-btn-right{left:15px}.amp-sidebar ul{margin:2rem 0 0;padding:0}.amp-sidebar li{margin-bottom:20px;margin-left:10px;margin-right:10px;list-style:none}.amp-menu-toggle:hover{cursor:pointer}.fixed + .amp-container{margin-top:5rem}@media (max-width: 960px){.amp-container{margin-top:55px;margin-bottom:0}}.pagination,.uk-pagination{margin:1rem 0;padding:0}.pagination li,.uk-pagination li{list-style:none;display:inline}.pagination,.pagination li > *,.uk-pagination,.uk-pagination li > *{display:flex;flex-wrap:wrap;justify-content:center;align-items:center;font-weight:300}.pagination li > *,.uk-pagination li > *{padding-top:1px;text-decoration:none;min-width:60px;min-height:48px}.pagination li:first-of-type > *,.uk-pagination li:first-of-type > *{border-left-width:1px}.pagination li.current span,.uk-pagination li.uk-active span{padding-top:.25em;cursor:default;pointer-events:none;background-color:rgba(255,255,255,.15);-webkit-box-shadow:inset 0 2px 1px 0 rgba(0,0,0,.25);box-shadow:inset 0 2px 2px 0 rgba(0,0,0,.25);padding-top:.5rem}.amp-share{text-align:center}.amp-share-top{margin-bottom:1rem}.amp-share-bottom{margin-top:1rem}.amp-social-share-vk{background-color:#45668e;background-image:url(/plugins/system/flamp/assets/img/vk.png)}.amp-social-share-skype{background-color:#00aff0;background-image:url(/plugins/system/flamp/assets/img/skype.png)}.amp-social-share-telegram{background-color:#08c;background-image:url(/plugins/system/flamp/assets/img/telegram.png)}::selection{background:#ec3434;color:#fff;text-shadow:none}.uk-button{margin-top:5px;border:none;overflow:visible;font:inherit;color:inherit;text-transform:none;-webkit-appearance:none;border-radius:0;display:inline-block;box-sizing:border-box;padding:0 30px;vertical-align:middle;font-size:.875rem;line-height:38px;text-align:center;text-decoration:none;text-transform:uppercase;transition:.1s ease-in-out;transition-property:color,background-color,border-color}.uk-button:not(:disabled){cursor:pointer}.uk-button::-moz-focus-inner{border:0;padding:0}.uk-button:hover{text-decoration:none}.uk-button:focus{outline:none}.uk-button-default{background-color:transparent;color:#333;border:1px solid #e5e5e5}.uk-button-default:hover,.uk-button-default:focus{background-color:transparent;color:#333;border-color:#b2b2b2}.uk-button-default:active,.uk-button-default.uk-active{background-color:transparent;color:#333;border-color:#999}.uk-button-primary{background-color:#1e87f0;color:#fff;border:1px solid transparent}.uk-button-primary:hover,.uk-button-primary:focus{background-color:#0f7ae5;color:#fff}.uk-button-primary:active,.uk-button-primary.uk-active{background-color:#0e6dcd;color:#fff}.uk-button-secondary{background-color:#222;color:#fff;border:1px solid transparent}.uk-button-secondary:hover,.uk-button-secondary:focus{background-color:#151515;color:#fff}.uk-button-secondary:active,.uk-button-secondary.uk-active{background-color:#080808;color:#fff}.uk-button-danger{background-color:#f0506e;color:#fff;border:1px solid transparent}.uk-button-danger:hover,.uk-button-danger:focus{background-color:#ee395b;color:#fff}.uk-button-danger:active,.uk-button-danger.uk-active{background-color:#ec2147;color:#fff}.uk-button-default:disabled,.uk-button-primary:disabled,.uk-button-secondary:disabled,.uk-button-danger:disabled{background-color:transparent;color:#999;border-color:#e5e5e5}.uk-button-small{padding:0 15px;line-height:28px;font-size:.875rem}.uk-button-large{padding:0 40px;line-height:53px;font-size:.875rem}.uk-button-text{padding:0;line-height:1.5;background:none;color:#333;position:relative}.uk-button-text::before{content:"";position:absolute;bottom:0;left:0;right:100%;border-bottom:1px solid #333;transition:right .3s ease-out}.uk-button-text:hover,.uk-button-text:focus{color:#333}.uk-button-text:hover::before,.uk-button-text:focus::before{right:0}.uk-button-text:disabled{color:#999}.uk-button-text:disabled::before{display:none}.uk-button-link{padding:0;line-height:1.5;background:none;color:#1e87f0}.uk-button-link:hover,.uk-button-link:focus{color:#0f6ecd;text-decoration:underline}.uk-button-link:disabled{color:#999;text-decoration:none}.uk-button-group{display:inline-flex;vertical-align:middle;position:relative}.uk-button-primary{background:#ec3434;color:#fff;border:1px solid transparent}.uk-flex-middle{align-items:center}.uk-icon{margin:0;border:none;border-radius:0;overflow:visible;font:inherit;color:inherit;text-transform:none;padding:0;background-color:transparent;display:inline-block;fill:currentcolor;line-height:0}a.uk-link-muted,.uk-link-muted a{color:#999}a.uk-link-muted:hover,.uk-link-muted a:hover,.uk-link-toggle:hover .uk-link-muted,.uk-link-toggle:focus .uk-link-muted{color:#666}a.uk-link-text,.uk-link-text a{color:inherit}a.uk-link-text:hover,.uk-link-text a:hover,.uk-link-toggle:hover .uk-link-text,.uk-link-toggle:focus .uk-link-text{color:#999}a.uk-link-heading,.uk-link-heading a{color:inherit}a.uk-link-heading:hover,.uk-link-heading a:hover,.uk-link-toggle:hover .uk-link-heading,.uk-link-toggle:focus .uk-link-heading{color:#1e87f0;text-decoration:none}a.uk-link-reset,.uk-link-reset a{color:inherit;text-decoration:none}.uk-link-toggle{color:inherit;text-decoration:none}.uk-link-toggle:focus{outline:none}*+address,*+dl,*+fieldset,*+figure,*+ol,*+p,*+pre,*+ul{margin-top:20px}.uk-margin{margin-bottom:20px}* + .uk-margin{margin-top:20px}.uk-margin-top{margin-top:20px}.uk-margin-bottom{margin-bottom:20px}.uk-margin-left{margin-left:20px}.uk-margin-right{margin-right:20px}.uk-margin-small{margin-bottom:10px}* + .uk-margin-small{margin-top:10px}.uk-margin-small-top{margin-top:10px}.uk-margin-small-bottom{margin-bottom:10px}.uk-margin-small-left{margin-left:10px}.uk-margin-small-right{margin-right:10px}.uk-margin-medium{margin-bottom:40px}* + .uk-margin-medium{margin-top:40px}.uk-margin-medium-top{margin-top:40px}.uk-margin-medium-bottom{margin-bottom:40px}.uk-margin-medium-left{margin-left:40px}.uk-margin-medium-right{margin-right:40px}.uk-margin-large{margin-bottom:40px}* + .uk-margin-large{margin-top:40px}.uk-margin-large-top{margin-top:40px}.uk-margin-large-bottom{margin-bottom:40px}.uk-margin-large-left{margin-left:40px}.uk-margin-large-right{margin-right:40px}@media (min-width: 1200px){.uk-margin-large{margin-bottom:70px}* + .uk-margin-large{margin-top:70px}.uk-margin-large-top{margin-top:70px}.uk-margin-large-bottom{margin-bottom:70px}.uk-margin-large-left{margin-left:70px}.uk-margin-large-right{margin-right:70px}}.uk-margin-xlarge{margin-bottom:70px}* + .uk-margin-xlarge{margin-top:70px}.uk-margin-xlarge-top{margin-top:70px}.uk-margin-xlarge-bottom{margin-bottom:70px}.uk-margin-xlarge-left{margin-left:70px}.uk-margin-xlarge-right{margin-right:70px}@media (min-width: 1200px){.uk-margin-xlarge{margin-bottom:140px}* + .uk-margin-xlarge{margin-top:140px}.uk-margin-xlarge-top{margin-top:140px}.uk-margin-xlarge-bottom{margin-bottom:140px}.uk-margin-xlarge-left{margin-left:140px}.uk-margin-xlarge-right{margin-right:140px}}.uk-margin-auto{margin-left:auto;margin-right:auto}.uk-margin-auto-top{margin-top:auto}.uk-margin-auto-bottom{margin-bottom:auto}.uk-margin-auto-left{margin-left:auto}.uk-margin-auto-right{margin-right:auto}.uk-margin-auto-vertical{margin-top:auto;margin-bottom:auto}@media (min-width: 640px){.uk-margin-auto\@s{margin-left:auto;margin-right:auto}.uk-margin-auto-left\@s{margin-left:auto}.uk-margin-auto-right\@s{margin-right:auto}}@media (min-width: 960px){.uk-margin-auto\@m{margin-left:auto;margin-right:auto}.uk-margin-auto-left\@m{margin-left:auto}.uk-margin-auto-right\@m{margin-right:auto}}@media (min-width: 1200px){.uk-margin-auto\@l{margin-left:auto;margin-right:auto}.uk-margin-auto-left\@l{margin-left:auto}.uk-margin-auto-right\@l{margin-right:auto}}@media (min-width: 1600px){.uk-margin-auto\@xl{margin-left:auto;margin-right:auto}.uk-margin-auto-left\@xl{margin-left:auto}.uk-margin-auto-right\@xl{margin-right:auto}}.uk-margin-remove{margin:0}.uk-margin-remove-top{margin-top:0}.uk-margin-remove-bottom{margin-bottom:0}.uk-margin-remove-left{margin-left:0}.uk-margin-remove-right{margin-right:0}.uk-margin-remove-vertical{margin-top:0;margin-bottom:0}.uk-margin-remove-adjacent + *,.uk-margin-remove-first-child > :first-child{margin-top:0}.uk-margin-remove-last-child > :last-child{margin-bottom:0}@media (min-width: 640px){.uk-margin-remove-left\@s{margin-left:0}.uk-margin-remove-right\@s{margin-right:0}}@media (min-width: 960px){.uk-margin-remove-left\@m{margin-left:0}.uk-margin-remove-right\@m{margin-right:0}}@media (min-width: 1200px){.uk-margin-remove-left\@l{margin-left:0}.uk-margin-remove-right\@l{margin-right:0}}@media (min-width: 1600px){.uk-margin-remove-left\@xl{margin-left:0}.uk-margin-remove-right\@xl{margin-right:0}}.amp-butt{margin-right:3px;margin-top:1em;margin-bottom:1em}.uk-flex2{display:flow-root}.push{list-style:none}.push li{position:relative;padding:5px 0 15px 25px;color:#ec3434;cursor:pointer}.push li:before{position:absolute;width:7px;height:7px;border-radius:50%;background:#4F5151;content:"";left:0;transition:.3s ease-in-out;top:16px}.push li:after{position:absolute;border-left:1px dotted #4F5151;width:1px;bottom:-11px;content:"";left:2px;top:36px}.push2 li:before{top:16px}.push2 li:after{bottom:-4px;left:3px;top:35px}.push li:hover:before{box-shadow:0 0 0 10px rgba(0,0,0,.2)}.push li:last-child:after{content:none}.push li:a{color:#ec3434}.rounded ol,.rectangle ol{list-style:none}.rounded,.rectangle{counter-reset:li;list-style:none;padding:0;text-shadow:0 1px 0 rgba(255,255,255,.5)}.rounded a{position:relative;display:block;padding:.8em .8em .8em 3em;margin:.5em 0 0 1.3em;background:#edf4fb;color:#444;text-decoration:none;border-radius:.3em;transition:all .3s ease-out}.rounded a:hover{background:#cae5ff}.rounded a:hover:before{transform:rotate(360deg)}.rounded a:before{content:counter(li);counter-increment:li;position:absolute;left:-1.3em;top:50%;margin-top:-1.3em;background:#000;height:2em;width:2em;line-height:2em;border:.3em solid #fff;text-align:center;font-weight:700;font-size:19px;border-radius:2em;transition:all .3s ease-out;color:#fff}* + blockquote{font-size:1.15rem;font-style:italic;line-height:1.7;padding:.5em 1.5em;position:relative;transition:.2s border ease-in-out;z-index:0;color:#3968a3}* + blockquote:before{content:"";position:absolute;top:50%;left:-4px;height:2em;width:5px;margin-top:-1em}* + blockquote:after{content:"";background-image:url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg' data-svg='quote-right'%3E%3Cpath fill='%23f3f0f0' d='M17.27,7.79 C17.27,9.45 16.97,10.43 15.99,12.02 C14.98,13.64 13,15.23 11.56,15.97 L11.1,15.08 C12.34,14.2 13.14,13.51 14.02,11.82 C14.27,11.34 14.41,10.92 14.49,10.54 C14.3,10.58 14.09,10.6 13.88,10.6 C12.06,10.6 10.59,9.12 10.59,7.3 C10.59,5.48 12.06,4 13.88,4 C15.39,4 16.67,5.02 17.05,6.42 C17.19,6.82 17.27,7.27 17.27,7.79 L17.27,7.79 Z'%3E%3C/path%3E%3Cpath fill='%23f3f0f0' d='M8.68,7.79 C8.68,9.45 8.38,10.43 7.4,12.02 C6.39,13.64 4.41,15.23 2.97,15.97 L2.51,15.08 C3.75,14.2 4.55,13.51 5.43,11.82 C5.68,11.34 5.82,10.92 5.9,10.54 C5.71,10.58 5.5,10.6 5.29,10.6 C3.47,10.6 2,9.12 2,7.3 C2,5.48 3.47,4 5.29,4 C6.8,4 8.08,5.02 8.46,6.42 C8.6,6.82 8.68,7.27 8.68,7.79 L8.68,7.79 Z'%3E%3C/path%3E%3C/svg%3E");background-size:120px 120px;background-repeat:no-repeat;background-position:center;height:126px;position:absolute;top:calc(25% - 42px);left:25.5px;width:126px;transition:.2s all ease-in-out,.4s transform ease-in-out;z-index:-1}blockquote footer::before{content:""}.uk-grid{display:flex;flex-wrap:wrap;margin:0;padding:0;list-style:none}.uk-grid > *{margin:0}.uk-grid > * > :last-child{margin-bottom:0}.uk-grid{margin-left:-30px}.uk-grid > *{padding-left:30px}.uk-grid + .uk-grid,.uk-grid > .uk-grid-margin,* + .uk-grid-margin{margin-top:30px}@media (min-width: 1200px){.uk-grid{margin-left:-40px}.uk-grid > *{padding-left:40px}.uk-grid + .uk-grid,.uk-grid > .uk-grid-margin,* + .uk-grid-margin{margin-top:40px}}.uk-grid-small,.uk-grid-column-small{margin-left:-15px}.uk-grid-small > *,.uk-grid-column-small > *{padding-left:15px}.uk-grid + .uk-grid-small,.uk-grid + .uk-grid-row-small,.uk-grid-small > .uk-grid-margin,.uk-grid-row-small > .uk-grid-margin,* + .uk-grid-margin-small{margin-top:15px}.uk-grid-medium,.uk-grid-column-medium{margin-left:-30px}.uk-grid-medium > *,.uk-grid-column-medium > *{padding-left:30px}.uk-grid + .uk-grid-medium,.uk-grid + .uk-grid-row-medium,.uk-grid-medium > .uk-grid-margin,.uk-grid-row-medium > .uk-grid-margin,* + .uk-grid-margin-medium{margin-top:30px}.uk-grid-large,.uk-grid-column-large{margin-left:-40px}.uk-grid-large > *,.uk-grid-column-large > *{padding-left:40px}.uk-grid + .uk-grid-large,.uk-grid + .uk-grid-row-large,.uk-grid-large > .uk-grid-margin,.uk-grid-row-large > .uk-grid-margin,* + .uk-grid-margin-large{margin-top:40px}@media (min-width: 1200px){.uk-grid-large,.uk-grid-column-large{margin-left:-70px}.uk-grid-large > *,.uk-grid-column-large > *{padding-left:70px}.uk-grid + .uk-grid-large,.uk-grid + .uk-grid-row-large,.uk-grid-large > .uk-grid-margin,.uk-grid-row-large > .uk-grid-margin,* + .uk-grid-margin-large{margin-top:70px}}.uk-grid-collapse,.uk-grid-column-collapse{margin-left:0}.uk-grid-collapse > *,.uk-grid-column-collapse > *{padding-left:0}.uk-grid + .uk-grid-collapse,.uk-grid + .uk-grid-row-collapse,.uk-grid-collapse > .uk-grid-margin,.uk-grid-row-collapse > .uk-grid-margin{margin-top:0}.uk-grid-divider > *{position:relative}.uk-grid-divider > :not(.uk-first-column)::before{content:"";position:absolute;top:0;bottom:0;border-left:1px solid #e5e5e5}.uk-grid-divider.uk-grid-stack > .uk-grid-margin::before{content:"";position:absolute;left:0;right:0;border-top:1px solid #e5e5e5}.uk-grid-divider{margin-left:-60px}.uk-grid-divider > *{padding-left:60px}.uk-grid-divider > :not(.uk-first-column)::before{left:30px}.uk-grid-divider.uk-grid-stack > .uk-grid-margin{margin-top:60px}.uk-grid-divider.uk-grid-stack > .uk-grid-margin::before{top:-30px;left:60px}@media (min-width: 1200px){.uk-grid-divider{margin-left:-80px}.uk-grid-divider > *{padding-left:80px}.uk-grid-divider > :not(.uk-first-column)::before{left:40px}.uk-grid-divider.uk-grid-stack > .uk-grid-margin{margin-top:80px}.uk-grid-divider.uk-grid-stack > .uk-grid-margin::before{top:-40px;left:80px}}.uk-grid-divider.uk-grid-small,.uk-grid-divider.uk-grid-column-small{margin-left:-30px}.uk-grid-divider.uk-grid-small > *,.uk-grid-divider.uk-grid-column-small > *{padding-left:30px}.uk-grid-divider.uk-grid-small > :not(.uk-first-column)::before,.uk-grid-divider.uk-grid-column-small > :not(.uk-first-column)::before{left:15px}.uk-grid-divider.uk-grid-small.uk-grid-stack > .uk-grid-margin,.uk-grid-divider.uk-grid-row-small.uk-grid-stack > .uk-grid-margin{margin-top:30px}.uk-grid-divider.uk-grid-small.uk-grid-stack > .uk-grid-margin::before{top:-15px;left:30px}.uk-grid-divider.uk-grid-row-small.uk-grid-stack > .uk-grid-margin::before{top:-15px}.uk-grid-divider.uk-grid-column-small.uk-grid-stack > .uk-grid-margin::before{left:30px}.uk-grid-divider.uk-grid-medium,.uk-grid-divider.uk-grid-column-medium{margin-left:-60px}.uk-grid-divider.uk-grid-medium > *,.uk-grid-divider.uk-grid-column-medium > *{padding-left:60px}.uk-grid-divider.uk-grid-medium > :not(.uk-first-column)::before,.uk-grid-divider.uk-grid-column-medium > :not(.uk-first-column)::before{left:30px}.uk-grid-divider.uk-grid-medium.uk-grid-stack > .uk-grid-margin,.uk-grid-divider.uk-grid-row-medium.uk-grid-stack > .uk-grid-margin{margin-top:60px}.uk-grid-divider.uk-grid-medium.uk-grid-stack > .uk-grid-margin::before{top:-30px;left:60px}.uk-grid-divider.uk-grid-row-medium.uk-grid-stack > .uk-grid-margin::before{top:-30px}.uk-grid-divider.uk-grid-column-medium.uk-grid-stack > .uk-grid-margin::before{left:60px}.uk-grid-divider.uk-grid-large,.uk-grid-divider.uk-grid-column-large{margin-left:-80px}.uk-grid-divider.uk-grid-large > *,.uk-grid-divider.uk-grid-column-large > *{padding-left:80px}.uk-grid-divider.uk-grid-large > :not(.uk-first-column)::before,.uk-grid-divider.uk-grid-column-large > :not(.uk-first-column)::before{left:40px}.uk-grid-divider.uk-grid-large.uk-grid-stack > .uk-grid-margin,.uk-grid-divider.uk-grid-row-large.uk-grid-stack > .uk-grid-margin{margin-top:80px}.uk-grid-divider.uk-grid-large.uk-grid-stack > .uk-grid-margin::before{top:-40px;left:80px}.uk-grid-divider.uk-grid-row-large.uk-grid-stack > .uk-grid-margin::before{top:-40px}.uk-grid-divider.uk-grid-column-large.uk-grid-stack > .uk-grid-margin::before{left:80px}@media (min-width: 1200px){.uk-grid-divider.uk-grid-large,.uk-grid-divider.uk-grid-column-large{margin-left:-140px}.uk-grid-divider.uk-grid-large > *,.uk-grid-divider.uk-grid-column-large > *{padding-left:140px}.uk-grid-divider.uk-grid-large > :not(.uk-first-column)::before,.uk-grid-divider.uk-grid-column-large > :not(.uk-first-column)::before{left:70px}.uk-grid-divider.uk-grid-large.uk-grid-stack > .uk-grid-margin,.uk-grid-divider.uk-grid-row-large.uk-grid-stack > .uk-grid-margin{margin-top:140px}.uk-grid-divider.uk-grid-large.uk-grid-stack > .uk-grid-margin::before{top:-70px;left:140px}.uk-grid-divider.uk-grid-row-large.uk-grid-stack > .uk-grid-margin::before{top:-70px}.uk-grid-divider.uk-grid-column-large.uk-grid-stack > .uk-grid-margin::before{left:140px}}.uk-grid-match > *,.uk-grid-item-match{display:flex;flex-wrap:wrap}.uk-grid-match > * > :not([class*='uk-width']),.uk-grid-item-match > :not([class*='uk-width']){box-sizing:border-box;width:100%;flex:auto}[class*='uk-child-width'] > *{box-sizing:border-box;width:100%}.uk-child-width-1-2 > *{width:50%}.uk-child-width-1-3 > *{width:calc(100% * 1 / 3.001)}.uk-child-width-1-4 > *{width:25%}.uk-child-width-1-5 > *{width:20%}.uk-child-width-1-6 > *{width:calc(100% * 1 / 6.001)}.uk-child-width-auto > *{width:auto}.uk-child-width-expand > :not([class*='uk-width']){flex:1;min-width:1px}@media (min-width: 640px){.uk-child-width-1-1\@s > *{width:100%}.uk-child-width-1-2\@s > *{width:50%}.uk-child-width-1-3\@s > *{width:calc(100% * 1 / 3.001)}.uk-child-width-1-4\@s > *{width:25%}.uk-child-width-1-5\@s > *{width:20%}.uk-child-width-1-6\@s > *{width:calc(100% * 1 / 6.001)}.uk-child-width-auto\@s > *{width:auto}.uk-child-width-expand\@s > :not([class*='uk-width']){flex:1;min-width:1px}}@media (min-width: 960px){.uk-child-width-1-1\@m > *{width:100%}.uk-child-width-1-2\@m > *{width:50%}.uk-child-width-1-3\@m > *{width:calc(100% * 1 / 3.001)}.uk-child-width-1-4\@m > *{width:25%}.uk-child-width-1-5\@m > *{width:20%}.uk-child-width-1-6\@m > *{width:calc(100% * 1 / 6.001)}.uk-child-width-auto\@m > *{width:auto}.uk-child-width-expand\@m > :not([class*='uk-width']){flex:1;min-width:1px}}@media (min-width: 1200px){.uk-child-width-1-1\@l > *{width:100%}.uk-child-width-1-2\@l > *{width:50%}.uk-child-width-1-3\@l > *{width:calc(100% * 1 / 3.001)}.uk-child-width-1-4\@l > *{width:25%}.uk-child-width-1-5\@l > *{width:20%}.uk-child-width-1-6\@l > *{width:calc(100% * 1 / 6.001)}.uk-child-width-auto\@l > *{width:auto}.uk-child-width-expand\@l > :not([class*='uk-width']){flex:1;min-width:1px}}@media (min-width: 1600px){.uk-child-width-1-1\@xl > *{width:100%}.uk-child-width-1-2\@xl > *{width:50%}.uk-child-width-1-3\@xl > *{width:calc(100% * 1 / 3.001)}.uk-child-width-1-4\@xl > *{width:25%}.uk-child-width-1-5\@xl > *{width:20%}.uk-child-width-1-6\@xl > *{width:calc(100% * 1 / 6.001)}.uk-child-width-auto\@xl > *{width:auto}.uk-child-width-expand\@xl > :not([class*='uk-width']){flex:1;min-width:1px}}[class*='uk-width']{box-sizing:border-box;width:100%;max-width:100%}.uk-width-1-2{width:50%}.uk-width-1-3{width:calc(100% * 1 / 3.001)}.uk-width-2-3{width:calc(100% * 2 / 3.001)}.uk-width-1-4{width:25%}.uk-width-3-4{width:75%}.uk-width-1-5{width:20%}.uk-width-2-5{width:40%}.uk-width-3-5{width:60%}.uk-width-4-5{width:80%}.uk-width-1-6{width:calc(100% * 1 / 6.001)}.uk-width-5-6{width:calc(100% * 5 / 6.001)}.uk-width-small{width:150px}.uk-width-medium{width:300px}.uk-width-large{width:450px}.uk-width-xlarge{width:600px}.uk-width-2xlarge{width:750px}.uk-width-auto{width:auto}.uk-width-expand{flex:1;min-width:1px}@media (min-width: 640px){.uk-width-1-1\@s{width:100%}.uk-width-1-2\@s{width:50%}.uk-width-1-3\@s{width:calc(100% * 1 / 3.001)}.uk-width-2-3\@s{width:calc(100% * 2 / 3.001)}.uk-width-1-4\@s{width:25%}.uk-width-3-4\@s{width:75%}.uk-width-1-5\@s{width:20%}.uk-width-2-5\@s{width:40%}.uk-width-3-5\@s{width:60%}.uk-width-4-5\@s{width:80%}.uk-width-1-6\@s{width:calc(100% * 1 / 6.001)}.uk-width-5-6\@s{width:calc(100% * 5 / 6.001)}.uk-width-small\@s{width:150px}.uk-width-medium\@s{width:300px}.uk-width-large\@s{width:450px}.uk-width-xlarge\@s{width:600px}.uk-width-2xlarge\@s{width:750px}.uk-width-auto\@s{width:auto}.uk-width-expand\@s{flex:1;min-width:1px}}@media (min-width: 960px){.uk-width-1-1\@m{width:100%}.uk-width-1-2\@m{width:50%}.uk-width-1-3\@m{width:calc(100% * 1 / 3.001)}.uk-width-2-3\@m{width:calc(100% * 2 / 3.001)}.uk-width-1-4\@m{width:25%}.uk-width-3-4\@m{width:75%}.uk-width-1-5\@m{width:20%}.uk-width-2-5\@m{width:40%}.uk-width-3-5\@m{width:60%}.uk-width-4-5\@m{width:80%}.uk-width-1-6\@m{width:calc(100% * 1 / 6.001)}.uk-width-5-6\@m{width:calc(100% * 5 / 6.001)}.uk-width-small\@m{width:150px}.uk-width-medium\@m{width:300px}.uk-width-large\@m{width:450px}.uk-width-xlarge\@m{width:600px}.uk-width-2xlarge\@m{width:750px}.uk-width-auto\@m{width:auto}.uk-width-expand\@m{flex:1;min-width:1px}}@media (min-width: 1200px){.uk-width-1-1\@l{width:100%}.uk-width-1-2\@l{width:50%}.uk-width-1-3\@l{width:calc(100% * 1 / 3.001)}.uk-width-2-3\@l{width:calc(100% * 2 / 3.001)}.uk-width-1-4\@l{width:25%}.uk-width-3-4\@l{width:75%}.uk-width-1-5\@l{width:20%}.uk-width-2-5\@l{width:40%}.uk-width-3-5\@l{width:60%}.uk-width-4-5\@l{width:80%}.uk-width-1-6\@l{width:calc(100% * 1 / 6.001)}.uk-width-5-6\@l{width:calc(100% * 5 / 6.001)}.uk-width-small\@l{width:150px}.uk-width-medium\@l{width:300px}.uk-width-large\@l{width:450px}.uk-width-xlarge\@l{width:600px}.uk-width-2xlarge\@l{width:750px}.uk-width-auto\@l{width:auto}.uk-width-expand\@l{flex:1;min-width:1px}}@media (min-width: 1600px){.uk-width-1-1\@xl{width:100%}.uk-width-1-2\@xl{width:50%}.uk-width-1-3\@xl{width:calc(100% * 1 / 3.001)}.uk-width-2-3\@xl{width:calc(100% * 2 / 3.001)}.uk-width-1-4\@xl{width:25%}.uk-width-3-4\@xl{width:75%}.uk-width-1-5\@xl{width:20%}.uk-width-2-5\@xl{width:40%}.uk-width-3-5\@xl{width:60%}.uk-width-4-5\@xl{width:80%}.uk-width-1-6\@xl{width:calc(100% * 1 / 6.001)}.uk-width-5-6\@xl{width:calc(100% * 5 / 6.001)}.uk-width-small\@xl{width:150px}.uk-width-medium\@xl{width:300px}.uk-width-large\@xl{width:450px}.uk-width-xlarge\@xl{width:600px}.uk-width-2xlarge\@xl{width:750px}.uk-width-auto\@xl{width:auto}.uk-width-expand\@xl{flex:1;min-width:1px}}[class*=uk-child-width]>*{box-sizing:border-box;float:left;display:inline}.uk-text-truncate{max-width:100%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.uk-flex3{display:flex;justify-content:center}.hits2{background-image:url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='%23999999' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M4.74,20 L7.73,12 L3,12 L15.43,1 L12.32,9 L17.02,9 L4.74,20 L4.74,20 L4.74,20 Z M9.18,11 L7.1,16.39 L14.47,10 L10.86,10 L12.99,4.67 L5.61,11 L9.18,11 L9.18,11 L9.18,11 Z'%3E%3C/path%3E%3C/svg%3E");background-size:auto;background-color:#FCF8F7;width:100px;background-position:right 5px center;background-repeat:no-repeat}.date2{background-image:url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='%23999999' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M 2,3 2,17 18,17 18,3 2,3 Z M 17,16 3,16 3,8 17,8 17,16 Z M 17,7 3,7 3,4 17,4 17,7 Z'%3E%3C/path%3E%3Crect width='1' height='3' x='6' y='2'%3E%3C/rect%3E%3Crect width='1' height='3' x='13' y='2'%3E%3C/rect%3E%3C/svg%3E");background-size:auto;background-color:#FCF8F7;width:100px;background-position:right 5px center;background-repeat:no-repeat}.uk-article-meta{font-size:.875rem;line-height:1.4;color:#999;margin-bottom:10px;display:flow-root}.uk-label{display:inline-block;padding:0 10px;line-height:1.5;font-size:.875rem;color:#fff;vertical-align:middle;white-space:nowrap;text-transform:none;background:#ec3434;margin:3px}.uk-heading-bullet{position:relative}.uk-heading-divider{padding-bottom:calc(5px + .1em);border-bottom:calc(.2px + .05em) solid #e5e5e5}.uk-heading-bullet::before{content:"";display:inline-block;position:relative;top:calc(-.1 * 1em);vertical-align:middle;height:calc(4px + .7em);margin-right:calc(5px + .2em);border-left:calc(5px + .1em) solid #e5e5e5}.uk-h2,h2{font-size:1.7rem;line-height:1.3}.uk-card-footer{padding:20px 40px}.uk-margin-top2{margin-top:40px}.uk-breadcrumb{padding:0;list-style:none}.uk-breadcrumb > *{display:contents}.uk-breadcrumb > * > *{font-size:.875rem;color:#999}.uk-breadcrumb > * > :hover,.uk-breadcrumb > * > :focus{color:#666;text-decoration:none}.uk-breadcrumb > :last-child > span,.uk-breadcrumb > :last-child > a:not([href]){color:#666}.uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before{content:"/";display:inline-block;margin:0;font-size:.875rem;color:#999}body{color:#000;background:#f9f7f7}.amp-container{background:#fff;max-width:960px;margin:0 auto;width:100%;min-height:calc(100vh - 112px - 3rem);padding:1.5rem;margin-top:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 1px 0 rgba(6,8,8,0.14),0 1px 1px -1px rgba(6,8,8,0.14),0 1px 5px 0 rgba(6,8,8,0.12)}.amp-sidebar{width:250px;padding:1.5rem;background:#ec3434;color:rgba(255,255,255,.5)}.amp-sidebar a{color:#fff}.amp-header{background:#ec3434;color:#fff;height:55px;width:100vw;z-index:100;box-shadow:0 0 5px 2px rgba(237,229,194,0.1)}.amp-header a{color:#fff}.amp-modules{padding:1rem;box-shadow:0 1px 1px 0 rgba(6,8,8,0.14),0 1px 1px -1px rgba(6,8,8,0.14),0 1px 5px 0 rgba(6,8,8,0.12)}.amp-footer {background: #f9f7f7;color: #000;/* height: 55px; */width: 100vw;z-index: 100;box-shadow: 0 0 5px 2px rgb(0 0 0 / 10%);}.amp-footer a{color:#000}.amp-btn{font-weight:inherit;font-size:1rem;line-height:1.1rem;padding:.3em .8em;text-decoration:none;white-space:nowrap;word-wrap:normal;vertical-align:middle;cursor:pointer;background-color:#fff;color:#000;border:1px solid #000}.pagination li > *,.uk-pagination li > *{border:1px solid rgba(0,0,0,0.25);border-left-width:0}.uk-section-muted{background:#f8f8f8}.uk-section-small{padding-top:40px;padding-bottom:40px}.uk-section2{display:flow-root;box-sizing:border-box;padding-top:40px;padding-bottom:40px}.uk-sectio2n>:last-child{margin-bottom:0}.uk-flex-center{justify-content:center}.uk-flex{display:flex}.uk-container{display:flow-root;box-sizing:content-box;max-width:1200px;margin-left:auto;margin-right:auto;padding-left:15px;padding-right:15px}.uk-grid2{display:flex;flex-wrap:wrap;margin:0;padding:0;list-style:none}address, dl, fieldset, figure, ol, p, pre, ul {margin: 0 0 20px 0;}.uk-button{padding:0 30px;vertical-align:middle;font-size:.875rem;line-height:38px;text-align:center;text-decoration:none;}.microdata {display: block;width: 0;height: 0;font-size: 0;line-height: 0;overflow: hidden;padding: 0;margin: 0;}.uk-card-primary.uk-card-body, .uk-card-primary>:not([class*=uk-card-media]), .uk-card-secondary.uk-card-body, .uk-card-secondary>:not([class*=uk-card-media]), .uk-light, .uk-offcanvas-bar, .uk-overlay-primary, .uk-section-primary:not(.uk-preserve-color), .uk-section-secondary:not(.uk-preserve-color), .uk-tile-primary:not(.uk-preserve-color), .uk-tile-secondary:not(.uk-preserve-color) {color: rgba(255,255,255,.7);} .uk-section {padding-top: 70px; padding-bottom: 70px;}
.uk-lightbox {
  /* 1 */
  display: none;
  /* 2 */
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1010;
  /* 5 */
  background: #000;
  /* 6 */
  opacity: 0;
  transition: opacity 0.15s linear;
  /* 7 */
  touch-action: pinch-zoom;
}
/*
 * Open
 * 1. Center child
 * 2. Fade-in
 */
.uk-lightbox.uk-open {
  display: block;
  /* 2 */
  opacity: 1;
}
/*
 * Focus
 */
.uk-lightbox :focus {
  outline-color: rgba(255, 255, 255, 0.7);
}
.uk-lightbox :focus-visible {
  outline-color: rgba(255, 255, 255, 0.7);
}
.uk-lightbox-page {
  overflow: hidden;
}
/* Item
 ========================================================================== */
/*
 * 1. Center child within the viewport
 * 2. Not visible by default
 * 3. Color needed for spinner icon
 * 4. Optimize animation
 * 5. Responsiveness
 *    Using `vh` for `max-height` to fix image proportions after resize in Safari and Opera
 */
.uk-lightbox-items > * {
  /* 1 */
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  /* 2 */
  display: none;
  justify-content: center;
  align-items: center;
  /* 3 */
  color: rgba(255, 255, 255, 0.7);
  /* 4 */
  will-change: transform, opacity;
}
/* 5 */
.uk-lightbox-items > * > * {
  max-width: 100vw;
  max-height: 100vh;
}
.uk-lightbox-items > * > :not(iframe) {
  width: auto;
  height: auto;
}
.uk-lightbox-items > .uk-active {
  display: flex;
}
/* Toolbar
 ========================================================================== */
.uk-lightbox-toolbar {
  padding: 10px 10px;
  background: rgba(0, 0, 0, 0.3);
  color: rgba(255, 255, 255, 0.7);
}
.uk-lightbox-toolbar > * {
  color: rgba(255, 255, 255, 0.7);
}
/* Toolbar Icon (Close)
 ========================================================================== */
.uk-lightbox-toolbar-icon {
  padding: 5px;
  color: rgba(255, 255, 255, 0.7);
}
/*
 * Hover
 */
.uk-lightbox-toolbar-icon:hover {
  color: #fff;
}
/* Button (Slidenav)
 ========================================================================== */
/*
 * 1. Center icon vertically and horizontally
 */
.uk-lightbox-button {
  box-sizing: border-box;
  width: 50px;
  height: 50px;
  background: rgba(0, 0, 0, 0.3);
  color: rgba(255, 255, 255, 0.7);
  /* 1 */
  display: inline-flex;
  justify-content: center;
  align-items: center;
}
/* Hover */
.uk-lightbox-button:hover {
  color: #fff;
}
/* OnClick */
/* Caption
 ========================================================================== */
.uk-lightbox-caption:empty {
  display: none;
}
/* Iframe
 ========================================================================== */
.uk-lightbox-iframe {
  width: 80%;
  height: 80%;
}   
.uk-visibles {
    display: none;
}
.uk-button-small {
    padding: 0 7px;
    font-size: 0.675rem;
    line-height: 28px;
    text-transform: none;
}

.uk-button-secondary1  {
    background-color: #6D87D6;
    color: #fff;
}
.uk-button-secondary1:hover {
    background-color: #2B4181
    color: #fff;
}
  .uk-button-secondary2  {
    background-color: #9AA400;
    color: #fff;
}
.uk-button-secondary2:hover {
    background-color: #5c6202
    color: #fff;
}
.uk-button-secondary3  {
    background-color: #248F40;
    color: #fff;
}
.uk-button-secondary3:hover {
    background-color: #007C21
    color: #fff;
}
.uk-button-secondary4  {
    background-color: #A02860;
    color: #fff;
}
.uk-button-secondary4:hover {
    background-color: #8A0041
    color: #fff;
}
.uk-button-secondary5  {
    background-color: #572781;
    color: #fff;
}
.uk-button-secondary5:hover {
    background-color: #3E0470
    color: #fff;
}
  .uk-button-secondary6  {
    background-color: #052F6D;
    color: #fff;
}
.uk-button-secondary6:hover {
    background-color: #284B7E
    color: #fff;
}
   .uk-text-bold {
    font-weight: 700;
}
.uk-text-large {
    font-size: 1.5rem;
    line-height: 1.5;
}
</style>
 
  </head>

  <body>    <div class="main-body">
  <amp-sidebar id="sidebar-left"
  class="amp-sidebar"
  layout="nodisplay"
  side="left">
<div><nav class="tm-position-offcanvas tm-modid-129 tm-modclass- uk-margin-top"><ul class="uk-nav">
<li class="item-460"><a href="/exclusive?types[0]=1">Эксклюзивы</a></li><li class="item-103"><a href="/v-mire">В мире</a></li><li class="item-102 uk-active uk-active"><a href="/kazakhstan" aria-current="location">Казахстан</a></li><li class="item-107"><a href="/vlast">Власть</a></li><li class="item-204"><a href="/dengi">Деньги</a></li><li class="item-104"><a href="/sport">Спорт</a></li><li class="item-106"><a href="/chp">ЧП</a></li><li class="item-459"><a href="/woman">Woman</a></li><li class="item-246"><a href="/prislat-novost">Прислать новость</a></li></ul>
</nav></div>

</amp-sidebar>



<header class="amp-header flex justify-start items-center top-0 left-0 right-0 pl2 pr4 fixed"> <div role="button" on="tap:sidebar-left.toggle" tabindex="0" class="amp-menu-toggle align-middle inline-block">☰</div> <div class="h3 center truncate caps col-12"><div class="uk-navbar-item uk-logo uk-text-large uk-text-bold ">Bestnews.kz</div></div> 
<div id="target-element-left">
</div>
</header>
        <div class="amp-container">
            
            <!-- Advertisement -->

                <div class="amp-ad amp-ad-top center">
                   	<amp-ad width="300" height="250"
	                       	type="yandex"
	                       	data-block-id="R-A-189490-1">
	                </amp-ad>
                </div>

            
            <!-- Main Top Module -->
       



       <amp-analytics type="googleanalytics" id="googleanalytics">
        <script type="application/json">
        {
          "vars": {
            "account": "UA-xxxxxx"
          },
          "triggers": {
            "defaultPageview": {
              "on": "visible",
              "request": "pageview",
              "vars": {
                "title": "AMP Pageview"
              }
            }
          }
        }
        </script>
      </amp-analytics>

      <?php echo $amp_html; ?>
	                 <div class="amp-ad amp-ad-top center">
                   	<amp-ad width="300" height="250"
	                       	type="yandex"
	                       	data-block-id="R-A-189490-8">
	                </amp-ad>
                </div>
                <div class="amp-footer-back-button center col-12">
                    <div class="amp-footer-back-button center col-12"> <a href="<?php echo JURI::current(); ?>" class="uk-button uk-button-primary uk-button-large ">Перейти на основную версию сайта</a> 
								
                </div>
		
     </div><hr><?php echo $tpl->partial('breadcrumb.php');?>     
        </div>
		<div class="amp-share amp-share-bottom"><?php echo $tpl->partial('share.php');?>	</div>	

            

           
      

			<?php echo $tpl->partial('footer1.php');?>
 
		
    </div>


  </body>
  </html>