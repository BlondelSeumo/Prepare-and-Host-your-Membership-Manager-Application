<?php
  /**
   * User Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: _users_list.tpl.php, v1.00 2020-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row gutters align middle">
  <div class="columns auto mobile-100 mobile-order-1">
    <h2><?php echo Lang::$word->META_T2;?></h2>
  </div>
  <div class="columns right aligned mobile-50 phone-100 mobile-order-2">
    <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small primary stacked button"><i class="icon plus alt"></i><?php echo Lang::$word->M_TITLE5;?></a>
  </div>
  <div class="columns auto mobile-50 mobile-order-3">
    <a class="wojo small disabled icon button"><i class="icon unordered list"></i></a>
    <a href="<?php echo Url::url(Router::$path, "grid/");?>" class="wojo small primary icon button"><i class="icon grid list"></i></a>
    <a href="<?php echo ADMINVIEW . '/helper.php?action=exportUsers';?>" class="wojo small button"><?php echo Lang::$word->EXPORT;?></a>
  </div>
</div>
<div class="row gutters align center">
  <div class="columns screen-40 tablet-50 mobile-100 phone-100">
    <form method="post" id="wojo_form" name="wojo_form" class="wojo form">
      <div class="wojo action input">
        <input name="find" placeholder="<?php echo Lang::$word->SEARCH;?>" type="text">
        <button class="wojo small primary icon button">
        <i class="icon find"></i></button>
      </div>
    </form>
  </div>
</div>
<div class="center aligned">
  <div class="wojo small divided horizontal list">
    <div class="disabled item wojo bold text">
      <?php echo Lang::$word->SORTING_O;?>
    </div>
    <a href="<?php echo Url::url(Router::$path);?>" class="item<?php echo Url::setActive("order", false);?>">
    <?php echo Lang::$word->RESET;?>
    </a>
    <a href="<?php echo Url::url(Router::$path, "?order=membership_id|DESC");?>" class="item<?php echo Url::setActive("order", "membership_id");?>">
    <?php echo Lang::$word->MEMBERSHIP;?>
    </a>
    <a href="<?php echo Url::url(Router::$path, "?order=email|DESC");?>" class="item<?php echo Url::setActive("order", "email");?>">
    <?php echo Lang::$word->M_EMAIL;?>
    </a>
    <a href="<?php echo Url::url(Router::$path, "?order=fname|DESC");?>" class="item<?php echo Url::setActive("order", "fname");?>">
    <?php echo Lang::$word->NAME;?>
    </a>
    <div class="item"><a href="<?php echo Url::sortItems(Url::url(Router::$path), "order");?>" data-tooltip="ASC/DESC"><i class="icon triangle unfold more link"></i></a>
    </div>
  </div>
</div>
<div class="center aligned margin top">
  <?php echo Validator::alphaBits(Url::url(Router::$path), "letter");?>
</div>
<?php if(!$this->data):?>
<div class="center aligned"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small demi caps text"><?php echo Lang::$word->M_INFO6;?></p>
</div>
<?php else:?>
<?php foreach($this->data as $row):?>
<div class="wojo card" id="item_<?php echo $row->id;?>">
  <div class="header divided">
    <div class="row horizontal gutters">
      <div class="columns auto"><img src="<?php echo UPLOADURL;?>/avatars/<?php echo $row->avatar ? $row->avatar : "blank.svg" ;?>" alt="" class="wojo avatar image"></div>
      <div class="columns auto">
        <p class="wojo black small icon text"><i class="icon date"></i>
          <?php echo Date::doDate("short_date", $row->created);?></p>
        <h4 class="wojo semi medium text">
          <?php if(Auth::hasPrivileges('edit_user')):?>
          <a class="grey" href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>"><?php echo $row->fullname;?></a>
          <?php else:?>
          <?php echo $row->fullname;?>
          <?php endif;?>
        </h4>
      </div>
      <div class="columns phone-100">
        <div><?php echo Utility::userType($row->type);?></div>
      </div>
      <div class="columns auto phone-100">
        <?php echo Utility::status($row->active, $row->id);?>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="row align middle">
      <div class="columns">
        <div class="wojo horizontal small list">
          <div class="item">
            <div class="header"><?php echo Lang::$word->M_EMAIL1;?>
              <span class="description"><a href="<?php echo Url::url("/admin/mailer", "?email=" . urlencode($row->email));?>"><?php echo $row->email;?></a>
              </span>
            </div>
          </div>
          <div class="item">
            <div class="header"><?php echo Lang::$word->MEMBERSHIP;?>
              <span class="description"><?php echo ($row->membership_id) ? '<a href="' . Url::url("/admin/memberships/edit/" . $row->membership_id) . '">' . $row->mtitle . '</a> <small> @' . Date::doDate("short_date", $row->mem_expire) . '</small>' : '-/-';?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="columns auto">
        <a data-dropdown="#userDrop_<?php echo $row->id;?>" class="wojo small primary inverted icon circular button">
        <i class="icon vertical ellipsis"></i>
        </a>
        <div class="wojo dropdown small pointing top-right" id="userDrop_<?php echo $row->id;?>">
          <?php if(Auth::hasPrivileges('edit_user')):?>
          <a class="item" href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>"><i class="icon pencil"></i>
          <?php echo Lang::$word->EDIT;?></a>
          <?php endif;?>
          <a class="item" href="<?php echo Url::url(Router::$path, "history/" . $row->id);?>"><i class="icon history"></i>
          <?php echo Lang::$word->HISTORY;?></a>
          <?php if(Auth::hasPrivileges('delete_user')):?>
          <div class="divider"></div>
          <a data-set='{"option":[{"trash":"trashUser","title": "<?php echo Validator::sanitize($row->fullname, "chars");?>","id": "<?php echo $row->id;?>"}],"action":"trash","subtext":"<?php echo Validator::sanitize(Lang::$word->DELCONFIRM3, "chars");?>","parent":"#item_<?php echo $row->id;?>"}' class="item wojo demi text data">
          <i class="icon trash"></i><?php echo Lang::$word->TRASH;?>
          </a>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php endif;?>
<div class="row gutters align middle">
  <div class="columns auto mobile-100 phone-100">
    <div class="wojo small semi text"><?php echo Lang::$word->TOTAL . ': ' . $this->pager->items_total;?> / <?php echo Lang::$word->CURPAGE . ': ' . $this->pager->current_page . ' '. Lang::$word->OF . ' ' . $this->pager->num_pages;?></div>
  </div>
  <div class="columns right aligned mobile-100 phone-100"><?php echo $this->pager->display_pages();?></div>
</div>