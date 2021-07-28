<?php
  /**
   * Trash
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: trash.tpl.php, v1.00 2020-02-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if (!Auth::checkAcl("owner")) : print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<div class="row align middle gutters">
  <div class="columns">
    <h3><?php echo Lang::$word->TRS_TITLE;?></h3>
    <p class="wojo small text"><?php echo Lang::$word->TRS_INFO;?></p>
  </div>
  <?php if($this->data):?>
  <div class="columns auto">
    <a data-set='{"option":[{"delete": "trashAll","title": "<?php echo Validator::sanitize(Lang::$word->TRS_TEMPTY, "chars");?>"}],"action":"delete", "parent":"#self","redirect":"<?php echo Url::url("/admin/trash");?>"}' class="wojo small negative button data">
    <?php echo Lang::$word->TRS_TEMPTY;?>
    </a>
  </div>
  <?php endif;?>
</div>
<?php if(!$this->data):?>
<div class="center aligned"><img src="<?php echo ADMINVIEW;?>/images/trash_empty.svg" alt="" class="wojo center big image">
  <p class="wojo semi grey text"><?php echo Lang::$word->TRS_NOTRS;?></p>
</div>
<?php else:?>
<?php foreach($this->data as $type => $rows):?>
<?php switch($type): ?>
<?php case "user":?>
<table class="wojo small segment table">
  <thead>
    <tr>
      <th colspan="2"><h5 class="basic"><?php echo Lang::$word->ADM_USERS;?></h5></th>
    </tr>
  </thead>
  <?php foreach($rows as $row):?>
  <?php $dataset = Utility::jSonToArray($row->dataset);?>
  <tr id="user_<?php echo $row->id;?>">
    <td><?php echo $dataset->fname;?>
      <?php echo $dataset->lname;?></td>
    <td class="auto"><div class="wojo mini buttons">
        <a data-set='{"option":[{"restore": "restoreUser","title": "<?php echo Validator::sanitize($dataset->fname . ' ' . $dataset->lname, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"restore","subtext":"<?php echo Lang::$word->DELCONFIRM11;?>", "parent":"#user_<?php echo $row->id;?>"}' class="wojo positive button data">
        <?php echo Lang::$word->RESTORE;?>
        </a>
        <a data-set='{"option":[{"delete": "deleteUser","title": "<?php echo Validator::sanitize($dataset->fname . ' ' . $dataset->lname, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"delete", "parent":"#user_<?php echo $row->id;?>"}' class="wojo negative button data">
        <?php echo Lang::$word->TRS_DELGOOD;?>
        </a>
      </div></td>
  </tr>
  <?php endforeach;?>
  <?php unset($dataset);?>
</table>
<?php break;?>
<?php case "membership":?>
<table class="wojo small segment table">
  <thead>
    <tr>
      <th colspan="2"><h5 class="basic"><?php echo Lang::$word->ADM_MEMBS;?></h5></th>
    </tr>
  </thead>
  <?php foreach($rows as $row):?>
  <?php $dataset = Utility::jSonToArray($row->dataset);?>
  <tr id="membership_<?php echo $row->id;?>">
    <td><?php echo $dataset->title;?></td>
    <td class="auto"><div class="wojo mini buttons">
        <a data-set='{"option":[{"restore": "restoreMembership","title": "<?php echo Validator::sanitize($dataset->title, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"restore","subtext":"<?php echo Lang::$word->DELCONFIRM11;?>", "parent":"#membership_<?php echo $row->id;?>"}' class="wojo positive button data">
        <?php echo Lang::$word->RESTORE;?>
        </a>
        <a data-set='{"option":[{"delete": "deleteMembership","title": "<?php echo Validator::sanitize($dataset->title, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"delete", "parent":"#membership_<?php echo $row->id;?>"}' class="wojo negative button data">
        <?php echo Lang::$word->TRS_DELGOOD;?>
        </a>
      </div></td>
  </tr>
  <?php endforeach;?>
  <?php unset($dataset);?>
</table>
<?php break;?>
<?php case "news":?>
<table class="wojo small segment table">
  <thead>
    <tr>
      <th colspan="2"><h5 class="basic"><?php echo Lang::$word->ADM_NEWS;?></h5></th>
    </tr>
  </thead>
  <?php foreach($rows as $row):?>
  <?php $dataset = Utility::jSonToArray($row->dataset);?>
  <tr id="news_<?php echo $row->id;?>">
    <td><?php echo $dataset->title;?></td>
    <td class="auto"><div class="wojo mini buttons">
        <a data-set='{"option":[{"restore": "restoreNews","title": "<?php echo Validator::sanitize($dataset->title, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"restore","subtext":"<?php echo Lang::$word->DELCONFIRM11;?>", "parent":"#news_<?php echo $row->id;?>"}' class="wojo positive button data">
        <?php echo Lang::$word->RESTORE;?>
        </a>
        <a data-set='{"option":[{"delete": "deleteNews","title": "<?php echo Validator::sanitize($dataset->title, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"delete", "parent":"#news_<?php echo $row->id;?>"}' class="wojo negative button data">
        <?php echo Lang::$word->TRS_DELGOOD;?>
        </a>
      </div></td>
  </tr>
  <?php endforeach;?>
  <?php unset($dataset);?>
</table>
<?php break;?>
<?php case "coupon":?>
<table class="wojo small segment table">
  <thead>
    <tr>
      <th colspan="2"><h5 class="basic"><?php echo Lang::$word->ADM_COUPONS;?></h5></th>
    </tr>
  </thead>
  <?php foreach($rows as $row):?>
  <?php $dataset = Utility::jSonToArray($row->dataset);?>
  <tr id="coupon_<?php echo $row->id;?>">
    <td><?php echo $dataset->title;?></td>
    <td class="auto"><div class="wojo mini buttons">
        <a data-set='{"option":[{"restore": "restoreCoupon","title": "<?php echo Validator::sanitize($dataset->title, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"restore","subtext":"<?php echo Lang::$word->DELCONFIRM11;?>", "parent":"#coupon_<?php echo $row->id;?>"}' class="wojo positive button data">
        <?php echo Lang::$word->RESTORE;?>
        </a>
        <a data-set='{"option":[{"delete": "deleteCoupon","title": "<?php echo Validator::sanitize($dataset->title, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"delete", "parent":"#coupon_<?php echo $row->id;?>"}' class="wojo negative button data">
        <?php echo Lang::$word->TRS_DELGOOD;?>
        </a>
      </div></td>
  </tr>
  <?php endforeach;?>
  <?php unset($dataset);?>
</table>
<?php break;?>

<?php break;?>
<?php case "page":?>
<table class="wojo small segment table">
  <thead>
    <tr>
      <th colspan="2"><h5 class="basic"><?php echo Lang::$word->ADM_COUPONS;?></h5></th>
    </tr>
  </thead>
  <?php foreach($rows as $row):?>
  <?php $dataset = Utility::jSonToArray($row->dataset);?>
  <tr id="coupon_<?php echo $row->id;?>">
    <td><?php echo $dataset->title;?></td>
    <td class="auto"><div class="wojo mini buttons">
        <a data-set='{"option":[{"restore": "restorePage","title": "<?php echo Validator::sanitize($dataset->title, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"restore","subtext":"<?php echo Lang::$word->DELCONFIRM11;?>", "parent":"#coupon_<?php echo $row->id;?>"}' class="wojo positive button data">
        <?php echo Lang::$word->RESTORE;?>
        </a>
        <a data-set='{"option":[{"delete": "deletePage","title": "<?php echo Validator::sanitize($dataset->title, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"delete", "parent":"#coupon_<?php echo $row->id;?>"}' class="wojo negative button data">
        <?php echo Lang::$word->TRS_DELGOOD;?>
        </a>
      </div></td>
  </tr>
  <?php endforeach;?>
  <?php unset($dataset);?>
</table>
<?php break;?>
<?php endswitch;?>
<?php endforeach;?>
<?php endif;?>