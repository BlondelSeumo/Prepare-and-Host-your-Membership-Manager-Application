<?php
  /**
   * Coupons
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: coupons.tpl.php, v1.00 2020-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::hasPrivileges('manage_coupons')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments)): case "edit": ?>
<!-- Start edit -->
<h2><?php echo Lang::$word->META_T13;?></h2>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo segment form">
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->NAME;?>
          <i class="icon asterisk"></i></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->title;?>" name="title">
        </div>
      </div>
      <div class="field five wide">
        <label><?php echo Lang::$word->DC_CODE;?>
          <i class="icon asterisk"></i></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo Lang::$word->DC_CODE;?>" value="<?php echo $this->data->code;?>" name="code">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->DC_SUB3;?>
          <i class="icon asterisk"></i></label>
        <a data-dropdown="#membership_id" class="wojo light right button"><?php echo Lang::$word->ADM_MEMBS;?>
        <i class="icon chevron down"></i></a>
        <div class="wojo static dropdown small pointing top-left" id="membership_id">
          <div class="mw400">
            <div class="row grid phone-1 mobile-1 tablet-2 screen-2">
              <?php echo Utility::loopOptionsMultiple($this->mlist, "id", "title", $this->data->membership_id, "membership_id");?>
            </div>
          </div>
        </div>
      </div>
      <div class="field three wide">
        <label><?php echo Lang::$word->DC_DISC;?>
          <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->DC_DISC;?>" value="<?php echo $this->data->discount;?>" name="discount">
      </div>
      <div class="field two wide">
        <label><?php echo Lang::$word->DC_DISC;?></label>
        <select name="type">
          <option value="p"<?php if($this->data->type == "p") echo ' selected="selected"';?>><?php echo Lang::$word->DC_TYPE_P;?></option>
          <option value="a"<?php if($this->data->type == "a") echo ' selected="selected"';?>><?php echo Lang::$word->DC_TYPE_A;?></option>
        </select>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->PUBLISHED;?></label>
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
    <div class="center aligned">
      <a href="<?php echo Url::url("/admin/coupons");?>" class="wojo simple button"><?php echo Lang::$word->CANCEL;?></a>
      <button type="button" data-action="processCoupon" name="dosubmit" class="wojo primary button"><?php echo Lang::$word->DC_SUB2;?></button>
    </div>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>
<?php break;?>
<?php case "new": ?>
<h2><?php echo Lang::$word->META_T14;?></h2>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo segment form">
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->NAME;?>
          <i class="icon asterisk"></i></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" name="title">
        </div>
      </div>
      <div class="field five wide">
        <label><?php echo Lang::$word->DC_CODE;?>
          <i class="icon asterisk"></i></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo Lang::$word->DC_CODE;?>" name="code">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->DC_SUB3;?>
          <i class="icon asterisk"></i></label>
        <a data-dropdown="#membership_id" class="wojo light right button"><?php echo Lang::$word->ADM_MEMBS;?>
        <i class="icon chevron down"></i></a>
        <div class="wojo static dropdown small pointing top-left" id="membership_id">
          <div class="mw400">
            <div class="row grid phone-1 mobile-1 tablet-2 screen-2">
              <?php echo Utility::loopOptionsMultiple($this->mlist, "id", "title", false, "membership_id");?>
            </div>
          </div>
        </div>
      </div>
      <div class="field three wide">
        <label><?php echo Lang::$word->DC_DISC;?>
          <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->DC_DISC;?>" name="discount">
      </div>
      <div class="field two wide">
        <label><?php echo Lang::$word->DC_DISC;?></label>
        <select name="type">
          <option value="p"><?php echo Lang::$word->DC_TYPE_P;?></option>
          <option value="a"><?php echo Lang::$word->DC_TYPE_A;?></option>
        </select>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->PUBLISHED;?></label>
        <div class="wojo checkbox radio inline">
          <input name="active" type="radio" value="1" id="active_1">
          <label for="active_1"><?php echo Lang::$word->YES;?></label>
        </div>
        <div class="wojo checkbox radio inline">
          <input name="active" type="radio" value="0" checked="checked" id="active_0">
          <label for="active_0"><?php echo Lang::$word->NO;?></label>
        </div>
      </div>
    </div>
    <div class="center aligned">
      <a href="<?php echo Url::url("/admin/coupons");?>" class="wojo simple button"><?php echo Lang::$word->CANCEL;?></a>
      <button type="button" data-action="processCoupon" name="dosubmit" class="wojo primary button"><?php echo Lang::$word->DC_SUB1;?></button>
    </div>
  </div>
</form>
<?php break;?>
<?php default: ?>
<div class="row gutters align middle">
  <div class="columns mobile-100 phone-100">
    <h2><?php echo Lang::$word->DC_TITLE;?></h2>
    <p class="wojo small text"><?php echo Lang::$word->DC_SUB;?></p>
  </div>
  <div class="columns auto mobile-100 phone-100">
    <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small primary button stacked"><i class="icon plus alt"></i><?php echo Lang::$word->DC_SUB1;?></a>
  </div>
</div>
<?php if(!$this->data):?>
<div class="center aligned"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small demi caps text"><?php echo Lang::$word->DC_NONDISC;?></p>
</div>
<?php else:?>
<div class="wojo cards screen-3 tablet-3 mobile-1">
  <?php foreach ($this->data as $row):?>
  <div class="card" id="item_<?php echo $row->id;?>">
    <div class="content dimmable <?php echo ($row->active == 0) ? "active" : "";?>">
      <a href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>">
      <img src="<?php echo ADMINVIEW;?>/images/coupon.svg" alt=""></a>
      <p class="center aligned"><a href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>"><?php echo $row->title;?></a>
      </p>
    </div>
    <div class="divided footer">
      <div class="row align middle">
        <div class="columns">
          <a data-set='{"option":[{"trash": "trashCoupon","title": "<?php echo Validator::sanitize($row->title, "chars");?>","id": <?php echo $row->id;?>}],"action":"trash","parent":"#item_<?php echo $row->id;?>"}' class="wojo negative small inverted icon button data"><i class="icon trash"></i></a>
        </div>
        <div class="columns auto">
          <div class="wojo fitted toggle checkbox is_dimmable" data-set='{"option":[{"action": "couponStatus","id":<?php echo $row->id;?>}],"parent":"#item_<?php echo $row->id;?>"}'>
            <input name="active" type="checkbox" value="1" <?php Validator::getChecked($row->active, 1);?> id="cpn_<?php echo $row->id;?>">
            <label for="cpn_<?php echo $row->id;?>"><?php echo Lang::$word->ACTIVE;?></label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php endif;?>
<?php break;?>
<?php endswitch;?>