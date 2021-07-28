<?php
  /**
   * Membership Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: _memberships_grid.tpl.php, v1.00 2020-02-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row gutters align middle">
  <div class="columns mobile-100 phone-100">
    <h2><?php echo Lang::$word->META_T6;?></h2>
    <p class="wojo small text"><?php echo Lang::$word->MEM_SUB;?></p>
  </div>
  <div class="columns auto mobile-100 phone-100">
    <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small primary button stacked"><i class="icon plus alt"></i><?php echo Lang::$word->MEM_SUB1;?></a>
  </div>
</div>
<?php if(!$this->data):?>
<div class="center aligned"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small demi caps text"><?php echo Lang::$word->MEM_NOMEM;?></p>
</div>
<?php else:?>
<div class="wojo cards screen-3 tablet-2 mobile-1">
  <?php foreach($this->data as $row):?>
  <div class="card" id="item_<?php echo $row->id;?>">
    <div class="content center aligned">
      <?php if($row->thumb):?>
      <img src="<?php echo UPLOADURL;?>/memberships/<?php echo $row->thumb;?>" alt="">
      <?php else:?>
      <img src="<?php echo UPLOADURL;?>/memberships/default.svg" alt="">
      <?php endif;?>
      <h4><?php echo Utility::formatMoney($row->price);?>
        <?php echo $row->title;?></h4>
      <p class="wojo tiny text"><?php echo Validator::truncate($row->description,40);?></p>
      <a href="<?php echo Url::url(Router::$path, "history/" . $row->id);?>" class="wojo small icon label"><?php echo $row->total;?>
      <?php echo Lang::$word->TRX_SALES;?></a>
    </div>
    <div class="footer divided">
      <div class="row">
        <div class="columns">
          <a href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>" class="wojo icon inverted positive small button"><i class="icon pencil"></i></a>
        </div>
        <div class="columns auto">
          <a data-set='{"option":[{"trash": "trashMembership","title": "<?php echo Validator::sanitize($row->title, "chars");?>","id": <?php echo $row->id;?>}],"action":"trash","parent":"#item_<?php echo $row->id;?>"}' class="wojo icon inverted negative small button data"><i class="icon trash"></i></a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php endif;?>