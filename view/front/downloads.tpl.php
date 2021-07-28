<?php
  /**
   * Downloads
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: downloads.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="center aligned"><img src="<?php echo UPLOADURL;?>/avatars/<?php echo (App::Auth()->avatar) ? App::Auth()->avatar : "blank.png";?>" alt="" class="avatar"></div>
<div class="wojo-grid">
  <div class="center aligned margin bottom">
    <div class="wojo stacked buttons">
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard");?>"><?php echo Lang::$word->ADM_MEMBS;?></a>
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard/history");?>"><?php echo Lang::$word->HISTORY;?></a>
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard/profile");?>"><?php echo Lang::$word->M_SUB18;?></a>
      <a class="wojo passive dark button"><?php echo Lang::$word->DOWNLOADS;?></a>
    </div>
  </div>
  <?php if(!$this->data and !$this->userfiles):?>
  <div class="center aligned"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
    <p class="wojo small thick caps text"><?php echo Lang::$word->AD_NO_DOWN;?></p>
  </div>
  <?php else:?>
  <?php if($this->data):?>
  <p class="right aligned"><span class="wojo simple label"><?php echo count($this->data);?>
    <?php echo Lang::$word->FM_FILES;?></span></p>
  <div class="row gutters">
    <?php foreach($this->data as $i => $row):?>
    <?php if(!($i % 2) && $i > 0):?>
  </div>
  <div class="row gutters">
    <?php endif;?>
    <div class="columns screen-50 tablet-50 mobile-100 phone-100">
      <div class="wojo fluid relaxed celled list">
        <div class="item align middle">
          <img src="<?php echo SITEURL;?>/assets/images/filetypes/<?php echo File::getFileType($row->name);?>" class="wojo small rounded shadow image">
          <div class="columns">
            <p class="header"><?php echo $row->alias;?></p>
            <span class="wojo small text"><?php echo Date::doDate("long_date", $row->created);?></span>
            <p class="wojo small text"><?php echo File::getSize($row->filesize);?> - <a href="<?php echo FRONTVIEW;?>/controller.php?token=<?php echo $row->token;?>"><?php echo Lang::$word->DOWNLOAD;?></a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <?php endif;?>
  <?php if($this->userfiles):?>
  <p class="right aligned"><span class="wojo simple label"><?php echo count($this->userfiles);?>
    <?php echo Lang::$word->FM_FILES;?></span></p>
  <div class="row gutters">
    <?php foreach($this->userfiles as $i => $row):?>
    <?php if(!($i % 2) && $i > 0):?>
  </div>
  <div class="row gutters">
    <?php endif;?>
    <div class="columns screen-50 tablet-50 mobile-100 phone-100">
      <div class="wojo fluid relaxed celled list">
        <div class="item align middle">
          <img src="<?php echo SITEURL;?>/assets/images/filetypes/<?php echo File::getFileType($row->name);?>" class="wojo small rounded shadow image">
          <div class="columns">
            <p class="header"><?php echo $row->alias;?></p>
            <span class="wojo small text"><?php echo Date::doDate("long_date", $row->created);?></span>
            <p class="wojo small text"><?php echo File::getSize($row->filesize);?> - <a href="<?php echo FRONTVIEW;?>/controller.php?token=<?php echo $row->token;?>"><?php echo Lang::$word->DOWNLOAD;?></a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <?php endif;?>
  <?php endif;?>
</div>