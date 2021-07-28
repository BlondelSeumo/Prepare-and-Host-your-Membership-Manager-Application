<?php
  /**
   * Gateways
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: gateways.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if (!Auth::checkAcl("owner")) : print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments)): case "edit": ?>
<!-- Start edit -->
<h2><?php echo Lang::$word->GW_TITLE1;?></h2>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo segment form">
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->GW_NAME;?>
          <i class="icon asterisk"></i></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo Lang::$word->GW_NAME;?>" value="<?php echo $this->data->displayname;?>" name="displayname">
        </div>
      </div>
      <div class="field five wide">
        <label><?php echo $this->data->extra_txt;?>
          <i class="icon asterisk"></i></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo $this->data->extra_txt;?>" value="<?php echo $this->data->extra;?>" name="extra">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo $this->data->extra_txt2;?></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo $this->data->extra_txt2;?>" value="<?php echo $this->data->extra2;?>" name="extra2">
        </div>
      </div>
      <div class="field five wide">
        <label><?php echo $this->data->extra_txt3;?>
        </label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo $this->data->extra_txt3;?>" value="<?php echo $this->data->extra3;?>" name="extra3">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->GW_LIVE;?></label>
        <div class="wojo checkbox radio inline">
          <input name="live" type="radio" value="1" <?php Validator::getChecked($this->data->live, 1); ?> id="live1">
          <label for="live1"><?php echo Lang::$word->YES;?></label>
        </div>
        <div class="wojo checkbox radio inline">
          <input name="live" type="radio" value="0" <?php Validator::getChecked($this->data->live, 0); ?> id="live2">
          <label for="live2"><?php echo Lang::$word->NO;?></label>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->ACTIVE;?></label>
        <div class="wojo checkbox radio inline">
          <input name="active" type="radio" value="1" <?php Validator::getChecked($this->data->active, 1); ?> id="active1">
          <label for="active1"><?php echo Lang::$word->YES;?></label>
        </div>
        <div class="wojo checkbox radio inline">
          <input name="active" type="radio" value="0" <?php Validator::getChecked($this->data->active, 0); ?> id="active2">
          <label for="active2"><?php echo Lang::$word->NO;?></label>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->GW_IPNURL;?></label>
        <input type="text" readonly value="<?php echo SITEURL.'/gateways/' . $this->data->dir . '/ipn.php';?>">
      </div>
    </div>
    <div class="center aligned">
      <a href="<?php echo Url::url("/admin/gateways");?>" class="wojo simple button"><?php echo Lang::$word->CANCEL;?></a>
      <button type="button" data-action="processGateway" name="dosubmit" class="wojo primary button"><?php echo Lang::$word->GW_UPDATE;?></button>
    </div>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>
<?php break;?>
<?php default: ?>
<h2><?php echo Lang::$word->GW_TITLE;?></h2>
<p class="wojo small text"><?php echo Lang::$word->GW_SUB;?></p>
<?php if($this->data):?>
<div class="wojo cards screen-3 tablet-3 mobile-1">
  <?php foreach ($this->data as $row):?>
  <div class="card">
    <div class="content dimmable <?php echo ($row->active == 0) ? "active" : "";?>" id="item_<?php echo $row->id;?>">
      <a href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>">
      <img src="<?php echo SITEURL;?>/gateways/<?php echo $row->dir;?>/logo_large.png" alt=""></a>
    </div>
    <div class="divided footer">
      <div class="row align middle">
        <div class="columns">
          <a href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>"><?php echo $row->displayname;?></a>
        </div>
        <div class="columns auto">
          <div class="wojo fitted toggle checkbox is_dimmable" data-set='{"option":[{"action": "gatewayStatus","id":<?php echo $row->id;?>}],"parent":"#item_<?php echo $row->id;?>"}' >
            <input name="active" type="checkbox" value="1" <?php Validator::getChecked($row->active, 1); ?> id="gateway_<?php echo $row->id;?>">
            <label for="gateway_<?php echo $row->id;?>"><?php echo Lang::$word->ACTIVE;?></label>
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