<?php
  /**
   * Profile
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: profile.tpl.php, v1.00 2020-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="center aligned"><img src="<?php echo UPLOADURL;?>/avatars/<?php echo (App::Auth()->avatar) ? App::Auth()->avatar : "blank.png";?>" alt="" class="avatar"></div>
<div class="wojo-grid">
  <div class="center aligned big margin bottom">
    <div class="wojo stacked buttons">
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard");?>"><?php echo Lang::$word->ADM_MEMBS;?></a>
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard/history");?>"><?php echo Lang::$word->HISTORY;?></a>
      <a class="wojo passive dark button"><?php echo Lang::$word->M_SUB18;?></a>
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard/downloads");?>"><?php echo Lang::$word->DOWNLOADS;?></a>
    </div>
  </div>
  <form method="post" id="wojo_form" name="wojo_form">
    <div class="wojo segment form">
      <input type="file" name="avatar" data-type="image" data-exist="<?php echo ($this->data->avatar) ? UPLOADURL . '/avatars/' . $this->data->avatar : UPLOADURL . '/avatars/blank.png';?>" accept="image/png, image/jpeg">
      <div class="wojo big space divider"></div>
      <div class="wojo fields">
        <div class="field five wide">
          <label><?php echo Lang::$word->M_FNAME;?>
            <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->M_FNAME;?>" value="<?php echo $this->data->fname;?>" name="fname">
        </div>
        <div class="field five wide">
          <label><?php echo Lang::$word->M_LNAME;?>
            <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->M_LNAME;?>" value="<?php echo $this->data->lname;?>" name="lname">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field five wide">
          <label><?php echo Lang::$word->M_EMAIL;?>
            <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->M_EMAIL;?>" value="<?php echo $this->data->email;?>" name="email">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->NEWPASS;?></label>
          <input type="password" name="password">
        </div>
      </div>
      <?php if($this->custom_fields):?>
      <div class="wojo simple segment">
        <?php echo $this->custom_fields;?></div>
      <?php endif;?>
      <?php if($this->core->enable_tax):?>
      <div class="wojo fields">
        <div class="field four wide labeled">
          <label><?php echo Lang::$word->M_ADDRESS;?></label>
        </div>
        <div class="field">
          <input type="text" placeholder="<?php echo Lang::$word->M_ADDRESS;?>" value="<?php echo $this->data->address;?>" name="address">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field four wide labeled">
          <label><?php echo Lang::$word->M_CITY;?></label>
        </div>
        <div class="field">
          <input type="text" placeholder="<?php echo Lang::$word->M_CITY;?>" value="<?php echo $this->data->city;?>" name="city">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field four wide labeled">
          <label><?php echo Lang::$word->M_STATE;?></label>
        </div>
        <div class="field">
          <div class="wojo action input">
            <input type="text" placeholder="<?php echo Lang::$word->M_STATE;?>" value="<?php echo $this->data->state;?>" name="state">
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field four wide labeled">
          <label><?php echo Lang::$word->M_ZIP;?></label>
        </div>
        <div class="field">
          <input type="text" placeholder="<?php echo Lang::$word->M_ZIP;?>" value="<?php echo $this->data->zip;?>" name="zip">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field four wide labeled">
          <label><?php echo Lang::$word->M_COUNTRY;?></label>
        </div>
        <div class="field">
          <select name="country">
            <?php echo Utility::loopOptions($this->clist, "abbr", "name", $this->data->country);?>
          </select>
        </div>
      </div>
      <?php endif;?>
      <div class="wojo fields">
        <div class="field four wide labeled">
          <label><?php echo Lang::$word->M_SUB10;?></label>
        </div>
        <div class="field">
          <div class="wojo checkbox radio fitted inline">
            <input name="newsletter" type="radio" value="1" id="newsletter_1" <?php Validator::getChecked($this->data->newsletter, 1); ?>>
            <label for="newsletter_1"><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio fitted inline">
            <input name="newsletter" type="radio" value="0" id="newsletter_0" <?php Validator::getChecked($this->data->newsletter, 0); ?>>
            <label for="newsletter_0"><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="content-center">
        <button type="button" data-action="profile" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->M_UPDATE;?></button>
      </div>
    </div>
  </form>
</div>
