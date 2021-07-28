<?php
  /**
   * Transactions
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: transactions.tpl.php, v1.00 2020-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if (!Auth::checkAcl("owner")) : print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<h2><?php echo Lang::$word->TRX_PAY;?></h2>
<div class="wojo card" id="pData">
  <div class="header">
    <div class="row horizontal gutters align middle">
      <div class="columns">
        <a data-dropdown="#dropdown-transMenu" class="wojo icon button">
        <i class="icon chevron down"></i>
        </a>
        <div class="wojo small dropdown top-left" id="dropdown-transMenu">
          <a class="item" data-value="all"><?php echo Lang::$word->ALL;?></a>
          <a class="item" data-value="day"><?php echo Lang::$word->TODAY;?></a>
          <a class="item" data-value="week"><?php echo Lang::$word->THIS_WEEK;?></a>
          <a class="item" data-value="month"><?php echo Lang::$word->THIS_MONTH;?></a>
          <a class="item" data-value="year"><?php echo Lang::$word->THIS_YEAR;?></a>
        </div>
      </div>
      <div class="columns auto">
        <div id="legend" class="wojo small horizontal responsive list">
        </div>
      </div>
    </div>
  </div>
  <div class="content h400" id="payment_chart"></div>
</div>
<div class="wojo form segment">
  <form method="post" id="wojo_form" action="<?php echo Url::url(Router::$path);?>" name="wojo_form">
    <div class="row align center middle gutters">
      <div class="columns screen-30 tablet-40 mobile-100 phone-100">
        <div class="wojo icon input">
          <input name="fromdate" type="text" placeholder="<?php echo Lang::$word->FROM;?>" readonly id="fromdate">
          <i class="icon calendar alt"></i>
        </div>
      </div>
      <div class="columns screen-30 tablet-40 mobile-100 phone-100">
        <div class="wojo action input">
          <input name="enddate" type="text" placeholder="<?php echo Lang::$word->TO;?>" readonly id="enddate">
          <button id="doDates" class="wojo icon primary inverted button"><i class="icon find"></i></button>
        </div>
      </div>
      <div class="columns auto phone-hide">
        <a href="<?php echo Url::url(Router::$path);?>" class="wojo icon button"><i class="icon refresh"></i></a>
      </div>
      <div class="columns auto phone-hide">
        <a href="<?php echo ADMINVIEW;?>/helper.php?action=exportAllTransactions" class="wojo primary icon button"><i class="icon wysiwyg table"></i></a>
      </div>
    </div>
  </form>
  <?php if($this->data):?>
  <table class="wojo responsive basic table">
    <thead>
      <tr>
        <th class="disabled center aligned"><i class="icon disabled id"></i></th>
        <th><?php echo Lang::$word->ITEM;?></th>
        <th><?php echo Lang::$word->USER;?></th>
        <th><?php echo Lang::$word->TRX_PP;?></th>
        <th><?php echo Lang::$word->TRX_TOTAMT;?></th>
        <th><?php echo Lang::$word->CREATED;?></th>
      </tr>
    </thead>
    <?php $total = 0;?>
    <?php foreach ($this->data as $row):?>
    <?php $total += $row->total;?>
    <tr id="item_<?php echo $row->id;?>">
      <td class="auto"><span class="wojo small dark inverted label"><?php echo $row->id;?></span></td>
      <td><?php echo $row->title;?></td>
      <td><?php echo $row->name;?></td>
      <td><?php echo $row->pp;?></td>
      <td><?php echo $row->total;?></td>
      <td><?php echo Date::doDate("short_date", $row->created);?></td>
    </tr>
    <?php endforeach;?>
  </table>
  <div class="wojo small primary inverted passive button"><?php echo Lang::$word->TRX_TOTAMT;?>
    <?php echo Utility::formatMoney($total);?></div>
  <?php endif;?>
</div>
<?php if($this->data):?>
<div class="row gutters align middle">
  <div class="columns auto mobile-100 phone-100">
    <div class="wojo small semi text"><?php echo Lang::$word->TOTAL . ': ' . $this->pager->items_total;?> / <?php echo Lang::$word->CURPAGE . ': ' . $this->pager->current_page . ' '. Lang::$word->OF . ' ' . $this->pager->num_pages;?></div>
  </div>
  <div class="columns right aligned mobile-100 phone-100"><?php echo $this->pager->display_pages();?></div>
</div>
<?php endif;?>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/morris.min.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/raphael.min.js"></script>
<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function() {	
    function getStats(range) {
        $("#pData").addClass('loading');
		$("#payment_chart").empty();
        $.ajax({
            type: 'GET',
            url: "<?php echo ADMINVIEW;?>/helper.php?action=getSalesChart&timerange=" + range,
            dataType: 'json'
        }).done(function(json) {
			var legend = '';
            json.legend.map(function(val) {
               legend += val;
            });
			$("#legend").html(legend);
            Morris.Line({
                element: 'payment_chart',
                data: json.data,
                xkey: 'm',
                ykeys: json.label,
                labels: json.label,
                parseTime: false,
                lineWidth: 4,
                pointSize: 6,
                lineColors: json.color,
				gridTextColor: "rgba(0,0,0,0.6)",
				gridTextSize: 14,
                fillOpacity: '.1',
                hideHover: 'auto',
				preUnits: json.preUnits,
				hoverCallback: function(index, json, content) {
					var text = $(content)[1].textContent;
					return content.replace(text, text.replace(json.preUnits, ""));
				},
                smooth: true,
                resize: true,
            });
            $("#pData").removeClass('loading');
        });
    }
    getStats('all');
	
    $("#dropdown-transMenu").on('click', '.item', function() {
		$("#payment_chart").html('');
        getStats($(this).data('value'));
    });
});
// ]]>
</script>