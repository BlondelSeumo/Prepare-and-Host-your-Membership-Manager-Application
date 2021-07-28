<?php
  /**
   * User Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: _users_new.tpl.php, v1.00 2020-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h2><?php echo Lang::$word->META_T4;?></h2>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo segment form">
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->M_FNAME;?>
          <i class="icon asterisk"></i></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo Lang::$word->M_FNAME;?>" name="fname">
        </div>
      </div>
      <div class="field five wide">
        <label><?php echo Lang::$word->M_LNAME;?>
          <i class="icon asterisk"></i></label>
        <div class="wojo input">
          <input type="text" placeholder="<?php echo Lang::$word->M_LNAME;?>" name="lname">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->M_EMAIL;?>
          <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->M_EMAIL;?>" name="email">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->NEWPASS;?>
          <i class="icon asterisk"></i></label>
        <div class="wojo input action">
          <input type="text" name="password">
          <button class="wojo icon button" type="button" id="randPass">
          <i class="lock icon"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field three wide">
        <label><?php echo Lang::$word->M_SUB8;?>
        </label>
        <select name="membership_id">
          <option value="0">-/-</option>
          <?php echo Utility::loopOptions($this->mlist, "id", "title");?>
        </select>
      </div>
      <div class="field two wide">
        <label><?php echo Lang::$word->M_SUB8;?>
        </label>
        <div class="wojo fitted inline toggle checkbox">
          <input name="update_membership" type="checkbox" value="1" id="update_membership">
          <label for="update_membership"><?php echo Lang::$word->YES;?></label>
        </div>
      </div>
      <div class="field three wide">
        <label><?php echo Lang::$word->M_SUB15;?></label>
        <input placeholder="<?php echo Lang::$word->TO;?>" name="mem_expire" type="text" value="<?php echo Date::doDate("calendar", Date::NumberOfDays('+ 30 day'));?>" readonly class="datepick">
      </div>
      <div class="field two wide">
        <label><?php echo Lang::$word->M_SUB15;?></label>
        <div class="wojo fitted inline toggle checkbox">
          <input name="extend_membership" type="checkbox" value="1" id="extend_membership">
          <label for="extend_membership"><?php echo Lang::$word->YES;?></label>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->M_SUB23;?></label>
        <div class="wojo fitted inline checkbox">
          <input name="add_trans" type="checkbox" value="1" id="add_trans">
          <label for="add_trans"><?php echo Lang::$word->YES;?></label>
        </div>
      </div>
    </div>
    <div class="wojo simple segment">
      <h5><?php echo Lang::$word->CSF_TITLE;?></h5>
      <?php echo $this->custom_fields;?></div>
    <div class="wojo fields align middle">
      <div class="field four wide labeled">
        <label><?php echo Lang::$word->M_ADDRESS;?></label>
      </div>
      <div class="field">
        <input type="text" placeholder="<?php echo Lang::$word->M_ADDRESS;?>" name="address">
      </div>
    </div>
    <div class="wojo fields align middle">
      <div class="field four wide labeled">
        <label><?php echo Lang::$word->M_CITY;?></label>
      </div>
      <div class="field">
        <input type="text" placeholder="<?php echo Lang::$word->M_CITY;?>" name="city">
      </div>
    </div>
    <div class="wojo fields align middle">
      <div class="field four wide labeled">
        <label><?php echo Lang::$word->M_STATE;?></label>
      </div>
      <div class="field">
        <input type="text" placeholder="<?php echo Lang::$word->M_STATE;?>" name="state">
      </div>
    </div>
    <div class="wojo fields align middle">
      <div class="field four wide labeled">
        <label><?php echo Lang::$word->M_ZIP;?></label>
      </div>
      <div class="field">
        <input type="text" placeholder="<?php echo Lang::$word->M_ZIP;?>" name="zip">
      </div>
    </div>
    <div class="wojo fields align middle">
      <div class="field four wide labeled">
        <label><?php echo Lang::$word->M_COUNTRY;?></label>
      </div>
      <div class="field">
        <select name="country">
          <?php echo Utility::loopOptions($this->clist, "abbr", "name");?>
        </select>
      </div>
    </div>
    <div class="wojo simple segment scrollbox h360">
      <h5><?php echo Lang::$word->M_SUB26;?></h5>
      <?php if($this->userfiles):?>
      <div class="row grid small gutters screen-4 tablet-3 mobile-1 phone-1">
        <?php foreach($this->userfiles as $file):?>
        <div class="columns">
          <div class="wojo checkbox inline fitted">
            <input type="checkbox" name="user_files[]" value="<?php echo $file->id;?>" id="user_files_<?php echo $file->id;?>">
            <label for="user_files_<?php echo $file->id;?>"><?php echo Validator::truncate($file->alias, 30);?></label>
          </div>
        </div>
        <?php endforeach;?>
      </div>
      <?php endif;?>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->STATUS;?></label>
        <div class="wojo checkbox radio fitted inline">
          <input name="active" type="radio" value="y" id="active_y" checked="checked">
          <label for="active_y"><?php echo Lang::$word->ACTIVE;?></label>
        </div>
        <div class="wojo checkbox radio fitted inline">
          <input name="active" type="radio" value="n" id="active_n">
          <label for="active_n"><?php echo Lang::$word->INACTIVE;?></label>
        </div>
        <div class="wojo checkbox radio fitted inline">
          <input name="active" type="radio" value="t" id="active_t">
          <label for="active_t"><?php echo Lang::$word->PENDING;?></label>
        </div>
        <div class="wojo checkbox radio fitted inline">
          <input name="active" type="radio" value="b" id="active_b">
          <label for="active_b"><?php echo Lang::$word->BANNED;?></label>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->M_SUB9;?></label>
        <div class="wojo checkbox radio fitted inline">
          <input name="type" type="radio" value="staff" id="staff" checked="checked">
          <label for="staff"><?php echo Lang::$word->STAFF;?></label>
        </div>
        <div class="wojo checkbox radio fitted inline">
          <input name="type" type="radio" value="editor" id="editor">
          <label for="editor"><?php echo Lang::$word->EDITOR;?></label>
        </div>
        <div class="wojo checkbox radio fitted inline">
          <input name="type" type="radio" value="member" id="member">
          <label for="member"><?php echo Lang::$word->MEMBER;?></label>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->M_SUB10;?></label>
        <div class="wojo checkbox radio fitted inline">
          <input name="newsletter" type="radio" value="1" id="newsletter_1">
          <label for="newsletter_1"><?php echo Lang::$word->YES;?></label>
        </div>
        <div class="wojo checkbox radio fitted inline">
          <input name="newsletter" type="radio" value="0" id="newsletter_0" checked="checked">
          <label for="newsletter_0"><?php echo Lang::$word->NO;?></label>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->M_SUB13;?></label>
        <div class="wojo checkbox toggle inline">
          <input name="notify" type="checkbox" value="1" id="notify_0">
          <label for="notify_0"><?php echo Lang::$word->YES;?></label>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <textarea placeholder="<?php echo Lang::$word->M_SUB11;?>" name="notes"></textarea>
      </div>
    </div>
    <div class="center aligned">
      <a href="<?php echo Url::url("/admin/users");?>" class="wojo small simple button"><?php echo Lang::$word->CANCEL;?></a>
      <button type="button" data-action="processUser" name="dosubmit" class="wojo primary button"><?php echo Lang::$word->M_TITLE5;?></button>
    </div>
  </div>
</form>