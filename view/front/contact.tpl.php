<?php
  /**
   * Contact
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: contact.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo-grid">
  <div class="wojo raised segment">
    <h2><?php echo Lang::$word->META_T30;?></h2>
    <p><?php echo Lang::$word->CNT_INFO;?></p>
    <form method="post" id="wojo_form" name="wojo_form">
      <div class="wojo form">
        <div class="wojo block fields">
          <div class="field">
            <label><?php echo Lang::$word->CNT_NAME;?>
              <i class="icon asterisk"></i></label>
            <input type="text" placeholder="<?php echo Lang::$word->CNT_NAME;?>" value="<?php echo (App::Auth()->logged_in) ? App::Auth()->name : null;?>" name="name">
          </div>
          <div class="field">
            <label><?php echo Lang::$word->M_EMAIL;?>
              <i class="icon asterisk"></i></label>
            <input type="text" placeholder="<?php echo Lang::$word->M_EMAIL;?>" value="<?php echo (App::Auth()->logged_in) ? App::Auth()->email : null;?>" name="email">
          </div>
          <div class="field">
            <label><?php echo Lang::$word->ET_SUBJECT;?></label>
            <select name="subject">
              <option value=""><?php echo Lang::$word->CNT_SUBJECT_1;?></option>
              <option value="<?php echo Lang::$word->CNT_SUBJECT_2;?>"><?php echo Lang::$word->CNT_SUBJECT_2;?></option>
              <option value="<?php echo Lang::$word->CNT_SUBJECT_3;?>"><?php echo Lang::$word->CNT_SUBJECT_3;?></option>
              <option value="<?php echo Lang::$word->CNT_SUBJECT_4;?>"><?php echo Lang::$word->CNT_SUBJECT_4;?></option>
              <option value="<?php echo Lang::$word->CNT_SUBJECT_5;?>"><?php echo Lang::$word->CNT_SUBJECT_5;?></option>
              <option value="<?php echo Lang::$word->CNT_SUBJECT_6;?>"><?php echo Lang::$word->CNT_SUBJECT_6;?></option>
              <option value="<?php echo Lang::$word->CNT_SUBJECT_7;?>"><?php echo Lang::$word->CNT_SUBJECT_7;?></option>
            </select>
          </div>
          <div class="field">
            <label><?php echo Lang::$word->MESSAGE;?>
              <i class="icon asterisk"></i></label>
            <textarea placeholder="<?php echo Lang::$word->MESSAGE;?>" name="notes"></textarea>
          </div>
          <div class="field">
            <label><?php echo Lang::$word->CAPTCHA;?>
              <i class="icon asterisk"></i></label>
            <div class="wojo labeled input">
              <input name="captcha" placeholder="<?php echo Lang::$word->CAPTCHA;?>" type="text">
              <div class="wojo simple label"><?php echo Session::captcha();?></div>
            </div>
          </div>
          <div class="field">
            <div class="wojo checkbox">
              <input name="agree" type="checkbox" value="1" id="agree_1">
              <label for="agree_1"><a href="<?php echo Url::url("/privacy");?>" target="_blank"><?php echo Lang::$word->AGREE;?></a>
              </label>
            </div>
          </div>
        </div>
        <div class="center aligned">
          <button class="wojo secondary button" data-action="contact" name="dosubmit" type="button"><span class="wojo bold small caps text"><?php echo Lang::$word->CNT_SUBMIT;?></span></button>
        </div>
      </div>
    </form>
  </div>
</div>