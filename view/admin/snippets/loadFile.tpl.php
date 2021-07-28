<?php
  /**
   * Load File
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: loadFile.tpl.php, v1.00 2020-03-02 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!$data) : Message::invalid("ID" . Filter::$id); return; endif;
?>
<div class="columns" id="item_<?php echo $data->id;?>">
  <div class="wojo attached card">
    <div class="header divided">
      <div class="wojo small bold text truncate"><?php echo $data->name;?></div>
      <p class="wojo small text"><?php echo Date::doDate("long_date", $data->created);?></p>
    </div>
    <div class="content">
      <div class="wojo small fluid list">
        <div class="item align middle">
          <img src="<?php echo SITEURL;?>/assets/images/filetypes/<?php echo File::getFileType($data->name);?>" class="wojo small rounded shadow image">
          <div class="columns">
            <p class="header"><?php echo $data->alias;?></p>
            <p class="wojo tiny text"><?php echo File::getSize($data->filesize);?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="footer divided">
      <div class="row align middle">
        <div class="columns">
          <a data-set='{"option":[{"action":"renameFile","id": <?php echo $data->id;?>}], "label":"<?php echo Lang::$word->ASSIGN;?>", "url":"helper.php", "parent":"#item_<?php echo $data->id;?>", "complete":"replace", "modalclass":"normal"}' class="wojo small positive icon inverted button action"><i class="icon pencil"></i></a>
          <a data-set='{"option":[{"delete": "deleteFile","title": "<?php echo Validator::sanitize($data->alias, "chars");?>","id":<?php echo $data->id;?>,"name": "<?php echo $data->name;?>"}],"action":"delete", "parent":"#item_<?php echo $data->id;?>"}' class="wojo small negative icon inverted button data"><i class="icon close"></i></a>
        </div>
        <div class="columns auto">
          <span class="wojo small light inverted static icon button"><?php echo($data->fileaccess > 0 ? '<i class="icon positive check"></i>' : '<i class="icon negative minus"></i>');?></span>
        </div>
      </div>
    </div>
  </div>
</div>