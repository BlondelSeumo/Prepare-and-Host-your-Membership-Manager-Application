<?php
  /**
   * Resend Notification
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: resendNotification.tpl.php, v1.00 2020-03-02 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!$this->data) : Message::invalid("ID" . Filter::$id); return; endif;
?>
<div class="body">
  <div class="wojo small form">
    <form method="post" id="modal_form" name="modal_form">
      <p><?php echo str_replace("[NAME]", '<span class="wojo bold text">' . $this->data->email  . '</span>', Lang::$word->M_INFO4);?></p>
    </form>
  </div>
</div>