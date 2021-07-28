<?php
  /**
   * Register
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: register.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo-grid">
  <div class="wojo raised auto segment">
    <div class="row align middle gutters">
      <div class="columns">
      <h3><?php echo Lang::$word->M_SUB17;?></h3>  
      </div>
      <div class="columns auto">
        <a href="<?php echo Url::url('');?>" class="wojo primary button"><?php echo Lang::$word->M_SUB16;?></a>
      </div>
    </div>
    <form method="post" id="wojo_form" name="wojo_form">
      <div class="wojo form">
        <div class="wojo block fields">
          <div class="field">
            <label><?php echo Lang::$word->M_EMAIL;?>
              <i class="icon asterisk"></i></label>
            <input type="text" placeholder="<?php echo Lang::$word->M_EMAIL;?>" name="email">
          </div>
          <div class="field">
            <label><?php echo Lang::$word->M_PASSWORD;?>
              <i class="icon asterisk"></i></label>
            <input type="password" placeholder="<?php echo Lang::$word->M_PASSWORD;?>" name="password">
          </div>
        </div>
        <div class="wojo fields">
          <div class="field">
            <label><?php echo Lang::$word->M_FNAME;?>
              <i class="icon asterisk"></i></label>
            <input type="text" placeholder="<?php echo Lang::$word->M_FNAME;?>" name="fname">
          </div>
          <div class="field">
            <label><?php echo Lang::$word->M_LNAME;?>
              <i class="icon asterisk"></i></label>
            <input type="text" placeholder="<?php echo Lang::$word->M_LNAME;?>" name="lname">
          </div>
        </div>
        <?php echo $this->custom_fields;?>
        <?php if($this->core->enable_tax):?>
        <div class="wojo block fields">
          <div class="field">
            <input type="text" placeholder="<?php echo Lang::$word->M_ADDRESS;?>" name="address">
          </div>
          <div class="field">
            <input type="text" placeholder="<?php echo Lang::$word->M_CITY;?>" name="city">
          </div>
          <div class="field">
            <input type="text" placeholder="<?php echo Lang::$word->M_STATE;?>" name="state">
          </div>
          <div class="field">
            <input type="text" placeholder="<?php echo Lang::$word->M_ZIP;?>" name="zip">
          </div>
          <div class="field">
            <select name="country">
              <?php echo Utility::loopOptions($this->clist, "abbr", "name");?>
            </select>
          </div>
        </div>
        <?php endif;?>
        <div class="wojo block fields">
          <div class="field">
            <div class="wojo labeled input">
              <input name="captcha" placeholder="<?php echo Lang::$word->CAPTCHA;?>" type="text">
              <div class="wojo simple label"><?php echo Session::captcha();?></div>
            </div>
          </div>
        </div>
        <div class="wojo block fields">
          <div class="field">
            <div class="wojo checkbox">
              <input name="agree" type="checkbox" value="1" id="agree_1">
              <label for="agree_1"><a href="<?php echo Url::url("/privacy");?>" target="_blank"><?php echo Lang::$word->AGREE;?></a>
              </label>
            </div>
          </div>
        </div>
        <button class="wojo fluid secondary button" data-action="register" name="dosubmit" type="button"><?php echo Lang::$word->M_SUB17;?></button>
      </div>
    </form>
  </div>
</div>