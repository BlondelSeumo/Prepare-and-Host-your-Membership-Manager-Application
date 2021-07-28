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

  if (!App::Auth()->is_Admin()) {
	  Url::redirect(SITEURL . '/admin/login/'); 
	  exit; 
  }
 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title><?php echo $this->title;?></title>
<link href="<?php echo ADMINVIEW . '/cache/' . Cache::cssCache(array('base.css','transition.css','label.css','form.css','dropdown.css','input.css','button.css','message.css','image.css','list.css','table.css','icon.css','card.css','modal.css','editor.css','tooltip.css','menu.css','progress.css','utility.css','style.css'), ADMINBASE);?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/jquery.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/global.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
</head>
<body data-theme="<?php echo Session::cookieExists("MMPA_THEME", "dark") ? "dark" : "light";?>">
<header>
  <div class="wojo-grid">
    <div class="row horizontal small gutters align middle">
      <div class="columns">
        <a href="<?php echo Url::url("/admin");?>" class="logo">
        <?php echo (App::Core()->logo) ? '<img src="' . SITEURL . '/uploads/' . $this->core->logo . '" alt="' . $this->core->company . '">': $this->core->company;?>
        </a>
      </div>
      <div class="columns auto">
        <div class="wojo buttons" data-dropdown="#dropdown-uMenu" id="uName">
          <div class="wojo transparent button"><?php echo App::Auth()->name;?></div>
          <div class="wojo primary inverted icon button"><?php echo Utility::getInitials(App::Auth()->name);?></div>
        </div>
        <div class="wojo small dropdown top-right" id="dropdown-uMenu">
          <div class="wojo small circular center image">
            <img src="<?php echo UPLOADURL;?>/avatars/<?php echo (App::Auth()->avatar) ? App::Auth()->avatar : "blank.svg";?>" alt="">
          </div>
          <h5 class="wojo small dimmed text center aligned"><?php echo App::Auth()->name;?></h5>
          <a class="item" href="<?php echo Url::url("/admin/myaccount");?>"><i class="icon user"></i>
          <?php echo Lang::$word->M_MYACCOUNT;?></a>
          <a class="item" href="<?php echo Url::url("/admin/myaccount/password");?>"><i class="icon lock"></i>
          <?php echo Lang::$word->M_SUB2;?></a>
          <a class="atheme-switch item" data-mode="<?php echo Session::cookieExists("MMPA_THEME", "dark") ? "dark" : "light";?>"><i class="icon contrast"></i><span><?php echo Session::cookieExists("MMPA_THEME", "dark") ? "Light" : "Dark";?></span></a>
          <div class="divider"></div>
          <a class="item" href="<?php echo Url::url("/admin/logout");?>"><i class="icon power"></i>
          <?php echo Lang::$word->LOGOUT;?></a>
        </div>
      </div>
      <?php if (Auth::checkAcl("owner")):?>
      <div class="columns auto">
        <a data-dropdown="#dropdown-aMenu" class="wojo icon simple transparent button">
        <i class="icon cogs"></i>
        </a>
        <div class="wojo small dropdown top-right" id="dropdown-aMenu">
          <a class="item" href="<?php echo Url::url("/admin/configuration");?>"><i class="icon sliders vertical alt"></i>
          <?php echo Lang::$word->ADM_CONFIG;?></a>
          <a class="item" href="<?php echo Url::url("/admin/permissions");?>"><i class="icon lock"></i>
          <?php echo Lang::$word->ADM_PERMS;?></a>
          <a class="item" href="<?php echo Url::url("/admin/language");?>"><i class="icon flag"></i>
          <?php echo Lang::$word->ADM_LNGMNG;?></a>
          <a class="item" href="<?php echo Url::url("/admin/maintenance");?>"><i class="icon settings alt"></i>
          <?php echo Lang::$word->ADM_MTNC;?></a>
          <a class="item" href="<?php echo Url::url("/admin/system");?>"><i class="icon laptop"></i>
          <?php echo Lang::$word->ADM_SYSTEM;?></a>
          <a class="item" href="<?php echo Url::url("/admin/backup");?>"><i class="icon database"></i>
          <?php echo Lang::$word->ADM_BACKUP;?></a>
          <a class="item" href="<?php echo Url::url("/admin/gateways");?>"><i class="icon wallet"></i>
          <?php echo Lang::$word->ADM_GATE;?></a>
          <a class="item" href="<?php echo Url::url("/admin/transactions");?>"><i class="icon credit card"></i>
          <?php echo Lang::$word->ADM_TRANS;?></a>
          <div class="divider"></div>
          <a class="item" href="<?php echo Url::url("/admin/trash");?>"><i class="icon trash"></i>
          <?php echo Lang::$word->ADM_TRASH;?></a>
        </div>
      </div>
      <?php endif;?>
      <div class="columns auto hide-all" id="mobileToggle">
        <a class="wojo transparent icon button menu-mobile"><i class="icon white reorder"></i></a>
      </div>
    </div>
  </div>
</header>
<div class="navbar">
  <div class="wojo-grid">
    <nav class="wojo menu">
      <ul>
        <li<?php if (Utility::in_array_any(["templates","countries","coupons","fields","news","mailer", "pages"], $this->segments)) echo ' class="active"';?>>
          <a href="#">
          <img src="<?php echo ADMINVIEW;?>/images/content.svg">
          <span class="title"><?php echo Lang::$word->ADM_CONTENT;?></span>
          <i class="icon chevron down"></i></a>
          <ul>
            <li><a<?php if (in_array("pages", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/pages");?>"><?php echo Lang::$word->ADM_PAGES;?></a>
            </li>
            <li><a<?php if (in_array("templates", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/templates");?>"><?php echo Lang::$word->ADM_EMTPL;?></a>
            </li>
            <li><a<?php if (in_array("countries", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/countries");?>"><?php echo Lang::$word->ADM_CNTR;?></a>
            </li>
            <li><a<?php if (in_array("coupons", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/coupons");?>"><?php echo Lang::$word->ADM_COUPONS;?></a>
            </li>
            <li><a<?php if (in_array("fields", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/fields");?>"><?php echo Lang::$word->ADM_CFIELDS;?></a>
            </li>
            <li><a<?php if (in_array("news", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/news");?>"><?php echo Lang::$word->ADM_NEWS;?></a>
            </li>
            <li><a<?php if (in_array("mailer", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/mailer");?>"><?php echo Lang::$word->ADM_NEWSL;?></a>
            </li>
          </ul>
        </li>
        <li<?php if (in_array("memberships", $this->segments)) echo ' class="active"';?>>
          <a href="<?php echo Url::Url("/admin/memberships");?>">
          <img src="<?php echo ADMINVIEW;?>/images/memberships.svg">
          <span class="title"><?php echo Lang::$word->ADM_MEMBS;?></span>
          </a>
        </li>
        <li<?php if (in_array("users", $this->segments)) echo ' class="active"';?>>
          <a href="<?php echo Url::Url("/admin/users");?>">
          <img src="<?php echo ADMINVIEW;?>/images/users.svg">
          <span class="title"><?php echo Lang::$word->ADM_USERS;?></span>
          </a>
        </li>
        <li<?php if (in_array("files", $this->segments)) echo ' class="active"';?>>
          <a href="<?php echo Url::Url("/admin/files");?>">
          <img src="<?php echo ADMINVIEW;?>/images/files.svg">
          <span class="title"><?php echo Lang::$word->ADM_FILES;?></span>
          </a>
        </li>
        <li<?php if (in_array("help", $this->segments)) echo ' class="active"';?>>
          <a href="<?php echo Url::Url("/admin/help");?>">
          <img src="<?php echo ADMINVIEW;?>/images/help.svg">
          <span class="title"><?php echo Lang::$word->ADM_HELP;?></span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
<main>
<div class="wojo-grid">
<div class="wojo small breadcrumb">
  <?php echo Url::crumbs($this->crumbs ? $this->crumbs : $this->segments, "//", Lang::$word->HOME);?>
</div>