<?php
  /**
   * Backup Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: backup.tpl.php, v1.00 2020-02-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::hasPrivileges('manage_backup')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<div class="row gutters align middle">
  <div class="columns mobile-100 phone-100">
    <h2><?php echo Lang::$word->DBM_TITLE;?></h2>
    <p class="wojo small text"><?php echo Lang::$word->DBM_INFO;?></p>
  </div>
  <div class="columns auto mobile-100 phone-100">
    <a data-set='{"option":[{"iaction":"databaseBackup", "id":1}], "url":"/helper.php", "complete":"prepend", "parent":"#backupList"}' class="wojo small secondary button iaction"><i class="icon plus alt"></i><?php echo Lang::$word->DBM_ADD;?></a>
  </div>
</div>
<div class="wojo segment">
    <div class="wojo relaxed divided fluid list" id="backupList">
    <?php if ($this->data):?>
    <?php foreach ($this->data as $i => $row):?>
    <?php $i++;?>
    <?php $latest =  ($row == App::Core()->backup) ? " highlite" : null;?>
    <div class="item<?php echo $latest;?>">
      <div class="content"><span class="wojo small bold text"><?php echo $i;?>.</span>
        <?php echo str_replace(".sql", "", $row);?></div>
      <div class="content auto"><span class="wojo small dark inverted label"><?php echo File::getFileSize($this->dbdir . '/' . $row, "kb", true);?></span>
      <a href="<?php echo UPLOADURL . '/backups/' . $row;?>" data-content="<?php echo Lang::$word->DOWNLOAD;?>" class="wojo icon positive inverted circular button button"><i class="download icon"></i></a>
        <a data-set='{"option":[{"restore": "restoreBackup","title": "<?php echo $row;?>","id":1}],"action":"restore","parent":".item"}' class="wojo icon primary inverted circular button data"><i class="icon refresh"></i></a>
        <a data-set='{"option":[{"delete": "deleteBackup","title": "<?php echo $row;?>","id":1}],"action":"delete","parent":".item"}' class="wojo icon negative inverted circular button data"><i class="icon trash"></i></a></div>
    </div>
    <?php endforeach;?>
    <?php unset($row);?>
    <?php endif;?>
  </div>
</div>