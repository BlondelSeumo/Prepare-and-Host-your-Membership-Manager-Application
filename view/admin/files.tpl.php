<?php
  /**
   * File Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: files.tpl.php, v1.00 2020-02-09 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::hasPrivileges('manage_files')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<div class="row gutters align middle">
  <div class="columns mobile-100 phone-100">
    <h3><?php echo Lang::$word->META_T35;?></h3>
    <p class="wojo small text"><?php echo str_replace("[LIMIT]", '<span class="wojo bold positive text">' . ini_get('upload_max_filesize') . '</span>', Lang::$word->FM_INFO);?></p>
  </div>
  <div class="columns auto mobile-100 phone-100">
    <div class="wojo small primary button stacked uploader" id="drag-and-drop-zone">
      <label><i class="icon plus alt"></i>
        <?php echo Lang::$word->UPLOAD;?>
        <input type="file" multiple name="files[]">
      </label>
    </div>
  </div>
</div>
<div id="fileList" class="wojo small fluid relaxed celled items"></div>
<div class="wojo segment">
  <div class="wojo divided horizontal list">
    <div class="disabled item wojo bold text">
      <?php echo Lang::$word->FILTER_O;?>
    </div>
    <a href="<?php echo Url::url(Router::$path);?>" class="item<?php echo Url::setActive("type", false);?>">
    <?php echo Lang::$word->FM_ALL_F;?>
    </a>
    <a href="<?php echo Url::url(Router::$path, "?type=audio");?>" class="item <?php echo Url::isActive("type", "audio");?>">
    <i class="icon musical notes"></i>
    <?php echo Lang::$word->FM_AUD_F;?>
    </a>
    <a href="<?php echo Url::url(Router::$path, "?type=video");?>" class="item <?php echo Url::isActive("type", "video");?>">
    <i class="icon movie"></i>
    <?php echo Lang::$word->FM_VID_F;?>
    </a>
    <a href="<?php echo Url::url(Router::$path, "?type=image");?>" class="item <?php echo Url::isActive("type", "image");?>">
    <i class="icon photo"></i>
    <?php echo Lang::$word->FM_AMG_F;?>
    </a>
    <a href="<?php echo Url::url(Router::$path, "?type=document");?>" class="item <?php echo Url::isActive("type", "document");?>">
    <i class="icon files"></i>
    <?php echo Lang::$word->FM_DOC_F;?>
    </a>
    <a href="<?php echo Url::url(Router::$path, "?type=archive");?>" class="item <?php echo Url::isActive("type", "archive");?>">
    <i class="icon book"></i>
    <?php echo Lang::$word->FM_ARC_F;?>
    </a>
  </div>
  <div class="vertical padding">
    <div class="wojo divided horizontal link list align-center">
      <div class="disabled item wojo bold text">
        <?php echo Lang::$word->SORTING_O;?>
      </div>
      <a href="<?php echo Url::url(Router::$path);?>" class="item<?php echo Url::setActive("order", false);?>">
      <?php echo Lang::$word->RESET;?>
      </a>
      <a href="<?php echo Url::url(Router::$path, "?order=name|DESC");?>" class="item<?php echo Url::setActive("order", "name");?>">
      <?php echo Lang::$word->NAME;?>
      </a>
      <a href="<?php echo Url::url(Router::$path, "?order=alias|DESC");?>" class="item<?php echo Url::setActive("order", "alias");?>">
      <?php echo Lang::$word->FM_ALIAS;?>
      </a>
      <a href="<?php echo Url::url(Router::$path, "?order=filesize|DESC");?>" class="item<?php echo Url::setActive("order", "filesize");?>">
      <?php echo Lang::$word->FM_FSIZE;?>
      </a>
      <div class="item"><a href="<?php echo Url::sortItems(Url::url(Router::$path), "order");?>" data-tooltip="ASC/DESC"><i class="icon triangle unfold more link"></i></a>
      </div>
    </div>
  </div>
  <div class="center aligned">
    <?php echo Validator::alphaBits(Url::url(Router::$path), "letter");?>
  </div>
</div>
<div class="row grid gutters screen-3 tablet-3 mobile-2 phone-1" id="fileData">
  <?php if($this->data):?>
  <?php foreach ($this->data as $row):?>
  <div class="columns" id="item_<?php echo $row->id;?>">
    <div class="wojo attached card">
      <div class="header divided">
        <div class="wojo small bold text truncate"><?php echo $row->name;?></div>
        <p class="wojo small text"><?php echo Date::doDate("long_date", $row->created);?></p>
      </div>
      <div class="content">
        <div class="wojo small fluid list">
          <div class="item align middle">
            <img src="<?php echo SITEURL;?>/assets/images/filetypes/<?php echo File::getFileType($row->name);?>" class="wojo small rounded shadow image">
            <div class="columns">
              <p class="header"><?php echo $row->alias;?></p>
              <p class="wojo tiny text"><?php echo File::getSize($row->filesize);?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer divided">
        <div class="row align middle">
          <div class="columns">
            <a data-set='{"option":[{"action":"renameFile","id": <?php echo $row->id;?>}], "label":"<?php echo Lang::$word->ASSIGN;?>", "url":"helper.php", "parent":"#item_<?php echo $row->id;?>", "complete":"replace", "modalclass":"normal"}' class="wojo small positive icon inverted button action"><i class="icon pencil"></i></a>
            <a data-set='{"option":[{"delete": "deleteFile","title": "<?php echo Validator::sanitize($row->alias, "chars");?>","id":<?php echo $row->id;?>,"name": "<?php echo $row->name;?>"}],"action":"delete", "parent":"#item_<?php echo $row->id;?>"}' class="wojo small negative icon inverted button data"><i class="icon close"></i></a>
          </div>
          <div class="columns auto">
            <span data-tooltip="<?php echo($row->fileaccess > 0 ? Lang::$word->ASSIGNED : Lang::$word->UNASSIGNED);?>"><?php echo($row->fileaccess > 0 ? '<i class="icon positive check"></i>' : '<i class="icon negative minus"></i>');?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
  <?php endif;?>
</div>
<div class="row gutters align middle">
  <div class="columns auto mobile-100 phone-100">
    <div class="wojo small thick text"><?php echo Lang::$word->TOTAL . ': ' . $this->pager->items_total;?> / <?php echo Lang::$word->CURPAGE . ': ' . $this->pager->current_page . ' '. Lang::$word->OF . ' ' . $this->pager->num_pages;?></div>
  </div>
  <div class="columns right aligned mobile-100 phone-100"><?php echo $this->pager->display_pages();?></div>
</div>
<script src="<?php echo ADMINVIEW;?>/js/files.js"></script>
<script type="text/javascript"> 
// <![CDATA[	
  $(document).ready(function() {
	  $("#fileData").Manager({
		  url: "<?php echo ADMINVIEW;?>",
		  surl: "<?php echo SITEURL;?>",
		  lang: {
			  removeText: "<?php echo Lang::$word->REMOVE;?>"
		  }
	  });
  });
// ]]>
</script>