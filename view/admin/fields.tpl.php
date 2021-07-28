<?php
  /**
   * Custom Fields
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: fields.tpl.php, v1.00 2020-02-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::hasPrivileges('manage_fields')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments)): case "edit": ?>
<!-- Start edit -->
<h2><?php echo Lang::$word->META_T16;?></h2>
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
        <label><?php echo Lang::$word->CF_TIP;?></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo Lang::$word->CF_TIP;?>" value="<?php echo $this->data->tooltip;?>" name="tooltip">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
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
      <div class="field five wide">
        <label><?php echo Lang::$word->CF_REQUIRED;?></label>
        <div class="wojo checkbox radio inline">
          <input name="required" type="radio" value="1" <?php Validator::getChecked($this->data->required, 1); ?> id="required_1">
          <label for="required_1"><?php echo Lang::$word->YES;?></label>
        </div>
        <div class="wojo checkbox radio inline">
          <input name="required" type="radio" value="0" <?php Validator::getChecked($this->data->required, 0); ?> id="required_0">
          <label for="required_0"><?php echo Lang::$word->NO;?></label>
        </div>
      </div>
    </div>
    <div class="center aligned">
      <a href="<?php echo Url::url("/admin/fields");?>" class="wojo simple button"><?php echo Lang::$word->CANCEL;?></a>
      <button type="button" data-action="processField" name="dosubmit" class="wojo primary button"><?php echo Lang::$word->CF_UPDATE;?></button>
    </div>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>
<?php break;?>
<?php case "new": ?>
<h2><?php echo Lang::$word->META_T17;?></h2>
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
        <label><?php echo Lang::$word->CF_TIP;?></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo Lang::$word->CF_TIP;?>" name="tooltip">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
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
      <div class="field five wide">
        <label><?php echo Lang::$word->CF_REQUIRED;?></label>
        <div class="wojo checkbox radio inline">
          <input name="required" type="radio" value="1" id="required_1">
          <label for="required_1"><?php echo Lang::$word->YES;?></label>
        </div>
        <div class="wojo checkbox radio inline">
          <input name="required" type="radio" value="0" checked="checked" id="required_0">
          <label for="required_0"><?php echo Lang::$word->NO;?></label>
        </div>
      </div>
    </div>
    <div class="center aligned">
      <a href="<?php echo Url::url("/admin/fields");?>" class="wojo simple button"><?php echo Lang::$word->CANCEL;?></a>
      <button type="button" data-action="processField" name="dosubmit" class="wojo primary button"><?php echo Lang::$word->CF_ADD;?></button>
    </div>
  </div>
</form>
<?php break;?>
<?php default: ?>
<div class="row gutters align middle">
  <div class="columns mobile-100 phone-100">
    <h2><?php echo Lang::$word->CF_TITLE;?></h2>
    <p class="wojo small text"><?php echo Lang::$word->CF_INFO;?></p>
  </div>
  <div class="columns auto mobile-100 phone-100">
    <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small primary button stacked"><i class="icon plus alt"></i><?php echo Lang::$word->CF_ADD;?></a>
  </div>
</div>
<?php if(!$this->data):?>
<div class="center aligned"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small demi caps text"><?php echo Lang::$word->CF_NOFIELDS;?></p>
</div>
<?php else:?>
<div class="wojo cards screen-3 tablet-3 mobile-1" id="sortable">
  <?php foreach ($this->data as $row):?>
  <div class="card" id="item_<?php echo $row->id;?>" data-id="<?php echo $row->id;?>">
    <div class="header">
      <div class="row">
        <div class="columns">
          <div class="wojo simple label"><i class="icon reorder link"></i></div>
        </div>
        <div class="columns auto">
          <a data-set='{"option":[{"delete": "deleteField","title": "<?php echo Validator::sanitize($row->title, "chars");?>","id": <?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>"}' class="wojo negative small inverted icon button data"><i class="icon trash"></i></a>
        </div>
      </div>
    </div>
    <div class="content">
      <h5 class="center aligned"><a href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>"><?php echo $row->title;?></a>
      </h5>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php endif;?>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/sortable.js"></script>
<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function() {
    $("#sortable").sortable({
        ghostClass: "ghost",
        handle: ".label",
        animation: 600,
        onUpdate: function(e) {
            var order = this.toArray();
            $.ajax({
                type: 'post',
                url: "<?php echo ADMINVIEW . '/helper.php';?>",
                dataType: 'json',
                data: {
                    iaction: "sortFields",
                    sorting: order
                }
            });
        }
    });
});
// ]]>
</script>
<?php break;?>
<?php endswitch;?>