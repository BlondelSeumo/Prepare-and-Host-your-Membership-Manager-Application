<?php
  /**
   * Rename File
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: renameFile.tpl.php, v1.00 2020-03-02 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!$this->data) : Message::invalid("ID" . Filter::$id); return; endif;
?>
<div class="body">
  <div class="wojo small form">
    <form method="post" id="modal_form" name="modal_form">
      <p class="wojo small semi text"><?php echo Lang::$word->NAME;?>: <?php echo $this->data->name;?></p>
      <div class="wojo block fields">
        <div class="field">
          <label><?php echo Lang::$word->FM_ALIAS;?>
            <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->FM_ALIAS;?>" value="<?php echo $this->data->alias;?>" name="alias">
        </div>
        <div class="basic field">
          <label><?php echo Lang::$word->FM_MACCESS;?></label>
          <div class="row grid screen-2 tablet-2 mobile-2 phone-1">
            <?php echo Utility::loopOptionsMultiple($this->mlist, "id", "title", $this->data->fileaccess, "fileaccess", "normal");?>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>