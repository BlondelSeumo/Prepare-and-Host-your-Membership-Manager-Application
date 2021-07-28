<?php
  /**
   * History
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: history.tpl.php, v1.00 2020-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="center aligned"><img src="<?php echo UPLOADURL;?>/avatars/<?php echo (App::Auth()->avatar) ? App::Auth()->avatar : "blank.png";?>" alt="" class="avatar"></div>
<div class="wojo-grid">
  <div class="center aligned big margin bottom">
    <div class="wojo stacked buttons">
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard");?>"><?php echo Lang::$word->ADM_MEMBS;?></a>
      <a class="wojo passive dark button"><?php echo Lang::$word->HISTORY;?></a>
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard/profile");?>"><?php echo Lang::$word->M_SUB18;?></a>
      <a class="wojo secondary button" href="<?php echo Url::url("/dashboard/downloads");?>"><?php echo Lang::$word->DOWNLOADS;?></a>
    </div>
  </div>
  <?php if($this->data):?>
  <table class="wojo simple segment table">
    <thead>
      <tr>
        <th><?php echo Lang::$word->NAME;?></th>
        <th><?php echo Lang::$word->MEM_ACT;?></th>
        <th><?php echo Lang::$word->MEM_EXP;?></th>
        <th><?php echo Lang::$word->MEM_REC1;?></th>
        <th class="auto"></th>
      </tr>
    </thead>
    <?php foreach ($this->data as $mrow):?>
    <tr>
      <td><?php echo $mrow->title;?></td>
      <td><?php echo Date::doDate("long_date", $mrow->activated);?></td>
      <td><?php echo Date::doDate("long_date", $mrow->expire);?></td>
      <td class="center aligned"><?php echo Utility::isPublished($mrow->recurring);?></td>
      <td class="center aligned"><a href="<?php echo FRONTVIEW;?>/controller.php?getInvoice=1&amp;id=<?php echo $mrow->tid;?>"><i class="icon download"></i></a></td>
    </tr>
    <?php endforeach;?>
  </table>
  <div class="wojo small primary passive inverted button"><?php echo Lang::$word->TRX_TOTAMT;?>
    <?php echo Utility::formatMoney($this->totals);?></div>
  <?php endif;?>
</div>