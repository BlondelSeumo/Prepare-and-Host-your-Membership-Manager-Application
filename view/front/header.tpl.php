<?php
  /**
   * Header
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: header.tpl.php, v1.00 2020-10-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title><?php echo isset($this) ? $this->title : App::Core()->company;?></title>
<?php if(isset($this->keywords)):?>
<meta name="keywords" content="<?php echo $this->keywords;?>">
<meta name="description" content="<?php echo $this->description;?>">
<?php endif;?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/jquery.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/global.js"></script>
<link href="<?php echo FRONTVIEW . '/cache/' . Cache::cssCache(array('base.css','transition.css','label.css','form.css','dropdown.css','input.css','button.css','message.css','image.css','list.css','table.css','icon.css','card.css','modal.css','editor.css','tooltip.css','menu.css','progress.css','utility.css','style.css'), FRONTBASE);?>" rel="stylesheet" type="text/css" />
</head>
<body data-theme="<?php echo Session::cookieExists("MMPF_THEME", "dark") ? "dark" : "light";?>">
<header>
  <a id="nav" data-dropdown="#dropdown-aMenu" class="wojo icon button"><i class="icon reorder"></i></a>
  <div class="wojo small dropdown pointing top-right" id="dropdown-aMenu">
    <?php if(App::Auth()->is_User()):?>
    <a href="<?php echo Url::url("/dashboard");?>" class="item"><i class="icon dashboard"></i><?php echo Lang::$word->ADM_DASH;?></a>
    <?php else:?>
    <a href="<?php echo Url::url('');?>" class="item"><i class="icon lock"></i><?php echo Lang::$word->M_SUB16;?></a>
    <a href="<?php echo Url::url("/register");?>" class="item"><i class="icon note"></i><?php echo Lang::$word->M_SUB17;?></a>
    <?php endif;?>
    <?php if($this->pages):?>
    <div class="divider"></div>
    <?php foreach($this->pages as $row):?>
    <a href="<?php echo Url::url("/page", $row->slug);?>" class="item"><?php echo $row->title;?></a>
    <?php endforeach;?>
    <?php endif;?>
    <div class="divider"></div>
    <a href="<?php echo Url::url("/packages");?>" class="item"><i class="icon membership"></i><?php echo Lang::$word->ADM_MEMBS;?></a>
    <a href="<?php echo Url::url("/contact");?>" class="item"><i class="icon email"></i><?php echo Lang::$word->CONTACT;?></a>
    <a href="<?php echo Url::url("/news");?>" class="item"><i class="icon news"></i><?php echo Lang::$word->ADM_NEWS;?></a>
    <div class="divider"></div>
    <a class="atheme-switch item" data-mode="<?php echo Session::cookieExists("MMPF_THEME", "dark") ? "dark" : "light";?>"><i class="icon contrast"></i><span><?php echo Session::cookieExists("MMPF_THEME", "dark") ? "Light" : "Dark";?></span></a>
	<?php if(App::Auth()->is_User()):?>
    <a href="<?php echo Url::url("/logout");?>" class="item"><i class="icon power"></i><?php echo Lang::$word->LOGOUT;?></a>
     <?php endif;?>
  </div>
  <div id="logo">
    <a href="<?php echo SITEURL;?>/" class="logo"><?php echo ($this->core->logo) ? '<img src="' . SITEURL . '/uploads/' . $this->core->logo . '" alt="'. $this->core->company . '">': $this->core->company;?></a>
  </div>
  <div class="shape">
    <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="140px" viewBox="20 -20 300 100"  xml:space="preserve">
      <path d="M30.913 43.944s42.911-34.464 87.51-14.191c77.31 35.14 113.304-1.952 146.638-4.729 48.654-4.056 69.94 16.218 69.94 16.218v54.396H30.913V43.944z" class="wojo white fill" opacity=".4"/>
      <path d="M-35.667 44.628s42.91-34.463 87.51-14.191c77.31 35.141 113.304-1.952 146.639-4.729 48.653-4.055 69.939 16.218 69.939 16.218v54.396H-35.667V44.628z" class="wojo white fill" opacity=".4"/>
      <path d="M-34.667 62.998s56-45.667 120.316-27.839C167.484 57.842 197 41.332 232.286 30.428c53.07-16.399 104.047 36.903 104.047 36.903l1.333 36.667-372-2.954-.333-38.046z" class="wojo white fill"/>
    </svg>
  </div>
</header>
<main>