<?php
  /**
   * Index
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: index.tpl.php, v1.00 2020-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo-grid">
  <div class="wojo raised auto segment">
    <div class="row align middle gutters">
      <div class="columns">
        <h3><?php echo Lang::$word->M_SUB16;?></h3>
      </div>
      <?php if(App::Core()->reg_allowed):?>
      <div class="columns auto"><a href="<?php echo Url::url("/register");?>" class="wojo primary button"><?php echo Lang::$word->M_SUB17;?></a>
      </div>
      <?php endif;?>
    </div>
    <h2 class="center aligned"><?php echo Utility::sayHello();?></h2>
    <div class="center aligned margin bottom">
      <img src="<?php echo UPLOADURL;?>/avatars/default.svg" id="icon" alt="User Icon">
    </div>
    <div id="loginform" class="wojo form">
      <form id="admin_form" name="admin_form" method="post">
        <div class="wojo block fields">
          <div class="field">
            <label><?php echo Lang::$word->USERNAME;?>
              <i class="icon asterisk"></i></label>
            <input type="text" name="username" placeholder="<?php echo Lang::$word->USERNAME;?>">
          </div>
          <div class="field">
            <label><?php echo Lang::$word->M_PASSWORD;?>
              <i class="icon asterisk"></i></label>
            <input type="password" name="password" placeholder="<?php echo Lang::$word->M_PASSWORD;?>">
          </div>
          <div class="field">
            <button id="doSubmit" type="button" name="submit" class="wojo fluid secondary button"><?php echo Lang::$word->LOGIN;?></button>
          </div>
        </div>
      </form>
      <div class="center aligned">
        <a id="passreset"><?php echo Lang::$word->M_PASSWORD_RES;?>?</a>
      </div>
    </div>
    <div id="passform" class="wojo form hide-all">
      <div class="wojo block fields">
        <div class="field">
          <label><?php echo Lang::$word->M_EMAIL;?>
            <i class="icon asterisk"></i></label>
          <input type="text" name="pEmail" id="pEmail" class="input-container" placeholder="<?php echo Lang::$word->M_EMAIL;?>">
        </div>
        <div class="field">
          <button id="dopass" type="button" name="doopass" class="wojo secondary fluid button"><?php echo Lang::$word->SUBMIT;?></button>
        </div>
      </div>
      <div class="center aligned">
        <a id="backto"><?php echo Lang::$word->M_SUB14;?></a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo FRONTVIEW;?>/js/login.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.Login({
		url: "<?php echo FRONTVIEW;?>",
		surl: "<?php echo SITEURL;?>"
    });
});
</script>