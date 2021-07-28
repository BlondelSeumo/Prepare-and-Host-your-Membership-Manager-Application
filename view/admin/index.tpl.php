<?php
  /**
   * Index
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: index.tpl.php, v1.00 2020-03-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h2><?php echo Lang::$word->META_T27;?></h2>
<div class="row gutters">
  <div class="columns screen-25 tablet-50 mobile-50 phone-100">
    <div class="wojo basic segment">
      <div class="center aligned"><span class="wojo positive massive text"><?php echo $this->counters[0];?></span></div>
      <div class="center aligned wojo positive text"><?php echo Lang::$word->AD_RUSER;?></div>
    </div>
  </div>
  <div class="columns screen-25 tablet-50 mobile-50 phone-100">
    <div class="wojo basic segment">
      <div class="center aligned"><span class="wojo secondary massive text"><?php echo $this->counters[1];?></span></div>
      <div class="center aligned wojo secondary text"><?php echo Lang::$word->AD_AUSER;?></div>
    </div>
  </div>
  <div class="columns screen-25 tablet-50 mobile-50 phone-100">
    <div class="wojo basic segment">
      <div class="center aligned"><span class="wojo negative massive text"><?php echo $this->counters[2];?></span></div>
      <div class="center aligned wojo negative text"><?php echo Lang::$word->AD_PUSER;?></div>
    </div>
  </div>
  <div class="columns screen-25 tablet-50 mobile-50 phone-100">
    <div class="wojo basic segment">
      <div class="center aligned"><span class="wojo primary massive text"><?php echo $this->counters[3];?></span></div>
      <div class="center aligned wojo primary text"><?php echo Lang::$word->AD_AMEM;?></div>
    </div>
  </div>
</div>
<?php if(Auth::checkAcl("owner")):?>
<h4><?php echo Lang::$word->AD_TYEAR;?></h4>
<div class="row gutters align bottom">
  <div class="columns screen-80 tablet-70 mobile-100 phone-100">
    <div id="legend" class="wojo small horizontal list"></div>
    <div id="payment_chart"  class="wojo segment h360"></div>
  </div>
  <div class="columns screen-20 tablet-30 mobile-100 phone-100">
    <div class="wojo basic segment">
      <div class="small padding">
        <p class="wojo semi text"><?php echo Utility::formatMoney($this->stats['totalsum']);?></p>
        <div id="chart1" data-values="<?php echo $this->stats['amount_str'];?>"></div>
      </div>
    </div>
    <div class="wojo basic segment">
      <div class="small padding">
        <p class="wojo semi text"><?php echo $this->stats['totalsales'];?>
          <?php echo Lang::$word->TRX_SALES;?></p>
        <div id="chart2" data-values="<?php echo $this->stats['sales_str'];?>"></div>
      </div>
    </div>
  </div>
</div>
<h4><?php echo Lang::$word->TRX_POPMEM;?></h4>
<div id="legend2" class="wojo small horizontal list align-right"></div>
<div id="payment_chart2" class="wojo segment h360"></div>
<?php endif;?>
<?php if(Auth::checkAcl("owner")):?>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/morris.min.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/raphael.min.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/sparkline.min.js"></script>
<script src="<?php echo ADMINVIEW;?>/js/index.js"></script>
<script type="text/javascript"> 
// <![CDATA[	
$(document).ready(function() {
    $.Index({
        url: "<?php echo ADMINVIEW;?>",
    });
});
// ]]>
</script>
<?php endif;?>