<?php
  /**
   * News
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: news.tpl.php, v1.00 2019-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo-grid">
  <div class="wojo raised segment">
    <h2><?php echo Lang::$word->NW_TITLE1;?></h2>
    <?php if($this->data):?>
    <?php foreach ($this->data as $row):?>
    <div class="wojo basic card" id="item_<?php echo $row->id;?>">
      <div class="header">
        <div class="row horizontal gutters">
          <div class="columns auto align middle"><i class="icon huge disabled news"></i></div>
          <div class="columns">
            <p class="wojo black small text"><?php echo Date::doDate("short_date", $row->created);?></p>
            <?php echo $row->title;?>
            <p><small><?php echo Lang::$word->BY;?>: <?php echo $row->author;?></small></p>
          </div>
        </div>
      </div>
      <div class="content">
        <?php echo str_replace("[SITEURL]", SITEURL, $row->body);?>
      </div>
    </div>
    <?php endforeach;?>
    <?php endif;?>
  </div>
</div>