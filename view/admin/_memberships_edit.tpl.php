<?php
  /**
   * Membership Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: _memberships_edit.tpl.php, v1.00 2020-02-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h2><?php echo Lang::$word->META_T7;?></h2>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo segment form">
    <div class="row gutters">
      <div class="columns screen-70 tablet-60 mobile-100 phone-100 padding">
        <div class="wojo fields align middle">
          <div class="field four wide labeled">
            <label><?php echo Lang::$word->NAME;?>
              <i class="icon asterisk"></i></label>
          </div>
          <div class="field">
            <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->title;?>" name="title">
          </div>
        </div>
        <div class="wojo fields align middle">
          <div class="field four wide labeled">
            <label><?php echo Lang::$word->MEM_PRICE;?>
              <i class="icon asterisk"></i></label>
          </div>
          <div class="field">
            <div class="wojo labeled input">
              <div class="wojo simple label"><?php echo Utility::currencySymbol();?></div>
              <input type="text" placeholder="<?php echo Lang::$word->MEM_PRICE;?>" value="<?php echo $this->data->price;?>" name="price">
            </div>
          </div>
        </div>
        <div class="wojo fields align middle">
          <div class="field four wide labeled">
            <label><?php echo Lang::$word->MEM_DAYS;?>
              <i class="icon asterisk"></i></label>
          </div>
          <div class="field">
            <div class="wojo action input">
              <input type="text" placeholder="<?php echo Lang::$word->MEM_DAYS;?>" value="<?php echo $this->data->days;?>" name="days">
              <select name="period">
                <?php echo Utility::loopOptionsSimpleAlt(Date::getMembershipPeriod(), $this->data->period);?>
              </select>
            </div>
          </div>
        </div>
        <div class="wojo fields">
          <div class="field four wide labeled">
            <label><?php echo Lang::$word->MEM_PRIVATE;?></label>
          </div>
          <div class="field">
            <div class="wojo checkbox radio inline">
              <input name="private" type="radio" value="1" <?php Validator::getChecked($this->data->private, 1); ?> id="private_1">
              <label for="private_1"><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio inline">
              <input name="private" type="radio" value="0" <?php Validator::getChecked($this->data->private, 0); ?> id="private_0">
              <label for="private_0"><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="wojo fields">
          <div class="field four wide labeled">
            <label><?php echo Lang::$word->MEM_REC;?></label>
          </div>
          <div class="field">
            <div class="wojo checkbox radio inline">
              <input name="recurring" type="radio" value="1" <?php Validator::getChecked($this->data->recurring, 1); ?> id="recurring_1">
              <label for="recurring_1"><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio inline">
              <input name="recurring" type="radio" value="0" <?php Validator::getChecked($this->data->recurring, 0); ?> id="recurring_0">
              <label for="recurring_0"><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="wojo fields">
          <div class="field four wide labeled">
            <label><?php echo Lang::$word->PUBLISHED;?></label>
          </div>
          <div class="field">
            <div class="wojo checkbox radio inline">
              <input name="active" type="radio" value="1" <?php Validator::getChecked($this->data->active, 1); ?> id="active_1">
              <label for="active_1"><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio inline">
              <input name="active" type="radio" value="0" <?php Validator::getChecked($this->data->active, 0); ?> id="active_0">
              <label for="active_0"><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="columns screen-30 tablet-40 mobile-100 phone-100">
        <div class="wojo block fields">
          <div class="field">
            <input type="file" name="thumb" data-type="image" data-exist="<?php echo ($this->data->thumb) ? UPLOADURL . '/memberships/' . $this->data->thumb : UPLOADURL . '/default.png';?>" accept="image/png, image/jpeg">
          </div>
          <div class="field">
            <label><?php echo Lang::$word->DESCRIPTION;?></label>
            <textarea placehoder="<?php echo Lang::$word->DESCRIPTION;?>" name="description"><?php echo $this->data->description;?></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="center aligned">
      <a href="<?php echo Url::url("/admin/memberships");?>" class="wojo simple button"><?php echo Lang::$word->CANCEL;?></a>
      <button type="button" data-action="processMembership" name="dosubmit" class="wojo primary button"><?php echo Lang::$word->MEM_SUB2;?></button>
    </div>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>