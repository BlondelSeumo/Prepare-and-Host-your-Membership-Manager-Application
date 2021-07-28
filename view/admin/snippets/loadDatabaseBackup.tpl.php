<?php
  /**
   * Load Database Backup
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: loadDatabaseBackup.tpl.php, v1.00 2020-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="item">
  <div class="content">
    <span class="wojo small bold text">-1.</span>
    <?php echo str_replace(".sql", "", $this->backup);?></div>
  <div class="content auto"><span class="wojo small dark inverted label"><?php echo File::getFileSize($this->dbdir . '/' . $this->backup, "kb", true);?></span>
    <a href="<?php echo UPLOADURL . '/backups/' . $this->backup;?>" data-content="<?php echo Lang::$word->DOWNLOAD;?>" class="wojo icon positive inverted circular button button"><i class="download icon"></i></a>
    <a data-set='{"option":[{"restore": "restoreBackup","title": "<?php echo $this->backup;?>","id":1}],"action":"restore","parent":".item"}' class="wojo icon primary inverted circular button data"><i class="icon refresh"></i></a>
    <a data-set='{"option":[{"delete": "deleteBackup","title": "<?php echo $this->backup;?>","id":1}],"action":"delete","parent":".item"}' class="wojo icon negative inverted circular button data"><i class="icon trash"></i></a>
  </div>
</div>