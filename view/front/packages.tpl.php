<?php
  /**
   * Packages
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: packages.tpl.php, v1.00 2020-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo-grid">
  <h2><?php echo Lang::$word->META_T29;?></h2>
  <?php if($this->data):?>
  <div class="row grid screen-3 tablet-2 mobile-1 phone-1 gutters">
    <?php foreach($this->data as $row):?>
    <div class="columns" id="item_<?php echo $row->id;?>">
      <div class="wojo attached segment">
        <?php if($row->thumb):?>
        <img src="<?php echo UPLOADURL;?>/memberships/<?php echo $row->thumb;?>" alt="">
        <?php else:?>
        <img src="<?php echo UPLOADURL;?>/memberships/default.svg" alt="">
        <?php endif;?>
        <h4 class="center aligned margin top"><?php echo Utility::formatMoney($row->price);?>
          <?php echo $row->title;?></h4>
        <p><?php echo Lang::$word->MEM_REC1;?>
          <?php echo ($row->recurring) ? Lang::$word->YES : Lang::$word->NO;?></p>
        <p class="wojo tiny text"><?php echo $row->description;?></p>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <?php endif;?>
</div>