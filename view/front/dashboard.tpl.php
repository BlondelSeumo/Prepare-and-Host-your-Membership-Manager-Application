<?php
  /**
   * Dashboard
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: dashboard.tpl.php, v1.00 2020-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="center aligned"><img src="<?php echo UPLOADURL;?>/avatars/<?php echo (App::Auth()->avatar) ? App::Auth()->avatar : "blank.png";?>" alt="" class="avatar"></div>
<div class="wojo-grid">
  <div class="center aligned big margin bottom">
    <div class="wojo stacked buttons">
      <a class="wojo dark button passive"><?php echo Lang::$word->ADM_MEMBS;?></a>
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard/history");?>"><?php echo Lang::$word->HISTORY;?></a>
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard/profile");?>"><?php echo Lang::$word->M_SUB18;?></a>
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard/downloads");?>"><?php echo Lang::$word->DOWNLOADS;?></a>
    </div>
  </div>
  <?php if($this->data):?>
  <div class="wojo cards screen-3 tablet-2 mobile-1 phone-1 gutters">
    <?php foreach($this->data as $row):?>
    <div class="card<?php echo $this->user->membership_id == $row->id ? ' active' : null;?>" id="item_<?php echo $row->id;?>">
      <div class="content">
        <?php if($row->thumb):?>
        <img src="<?php echo UPLOADURL;?>/memberships/<?php echo $row->thumb;?>" alt="">
        <?php else:?>
        <img src="<?php echo UPLOADURL;?>/memberships/default.svg" alt="">
        <?php endif;?>
        <h4 class="center aligned margin top"><?php echo Utility::formatMoney($row->price);?>
          <?php echo $row->title;?></h4>
        <p class="wojo small text"><?php echo Lang::$word->MEM_REC1;?>
          <?php echo ($row->recurring) ? Lang::$word->YES : Lang::$word->NO;?></p>
        <p class="wojo small text"><?php echo $row->days;?>@<?php echo Date::getPeriodReadable($row->period);?></p>
        <p class="wojo tiny text"><?php echo $row->description;?></p>
        <?php if($this->user->membership_id != $row->id):?>
        <p><a class="wojo small primary button add-cart" data-id="<?php echo $row->id;?>"><?php echo ($row->price <> 0) ? Lang::$word->M_SUB19 : Lang::$word->M_SUB20;?></a>
        </p>
        <?php endif;?>
      </div>
    </div>
    <?php endforeach;?>
    <?php unset($row);?>
  </div>
  <?php endif;?>
  <div id="mResult"></div>
</div>