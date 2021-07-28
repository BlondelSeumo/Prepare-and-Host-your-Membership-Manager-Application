<?php
  /**
   * Page
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2021
   * @version $Id: page.tpl.php, v1.00 2021-05-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo-grid">
  <h1><?php echo $this->row->title;?></h1>
  <?php if($this->row->page_type == "membership"):?>
  <?php if(Membership::is_valid(explode(",", $this->row->membership_id))):?>
  <?php echo Url::out_url($this->row->body);?>
  <?php else:?>
  <div class="wojo negative relaxed icon message align middle">
    <i class="icon big white lock"></i>
    <div class="content">
      <h1 class="wojo white basic text"><?php echo Lang::$word->PG_MERROR_2;?></h1>
    </div>
  </div>
  <?php if($this->packages):?>
  <ul class="wojo list">
    <?php foreach ($this->packages as $row):?>
    <li class="item"><i class="icon asterisk"></i><?php echo $row->title;?></li>
    <?php endforeach;?>
  </ul>
  <?php endif;?>
  <?php endif;?>
  <?php else:?>
  <?php echo Url::out_url($this->row->body);?>
  <?php endif;?>
</div>