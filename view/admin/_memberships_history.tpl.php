<?php
  /**
   * Membership Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _memberships_history.tpl.php, v1.00 2016-07-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row">
  <div class="columns">
    <h3><?php echo Lang::$word->META_T9;?> <small>// <?php echo $this->data->title;?></small></h3>
  </div>
  <div class="columns auto"><a href="<?php echo ADMINVIEW . '/helper.php?action=exportMembershipPayments&amp;id=' . $this->data->id;?>" class="wojo small primary button"><?php echo Lang::$word->EXPORT;?></a></div>
</div>
<div class="wojo segment">
  <div id="legend" class="wojo small horizontal list align-right"></div>
  <div id="payment_chart" class="h300"></div>
</div>
<?php if($this->plist):?>
<div class="wojo segment">
  <table class="wojo basic responsive table">
    <thead>
      <tr>
        <th data-sort="string"><?php echo Lang::$word->USER;?></th>
        <th data-sort="int"><?php echo Lang::$word->TRX_AMOUNT;?></th>
        <th data-sort="int"><?php echo Lang::$word->TRX_TAX;?></th>
        <th data-sort="int"><?php echo Lang::$word->TRX_COUPON;?></th>
        <th data-sort="int"><?php echo Lang::$word->TRX_TOTAMT;?></th>
        <th data-sort="int"><?php echo Lang::$word->CREATED;?></th>
      </tr>
    </thead>
    <?php foreach ($this->plist as $row):?>
    <tr>
      <td><a class="inverted" href="<?php echo Url::url("/admin/users/edit", $row->user_id);?>"><?php echo $row->name;?></a></td>
      <td><?php echo $row->rate_amount;?></td>
      <td><?php echo $row->tax;?></td>
      <td><?php echo $row->coupon;?></td>
      <td><?php echo $row->total;?></td>
      <td data-sort-value="<?php echo strtotime($row->created);?>"><?php echo Date::doDate("short_date", $row->created);?></td>
    </tr>
    <?php endforeach;?>
  </table>
  <div class="wojo small primary passive inverted button"><?php echo Lang::$word->TRX_TOTAMT;?> <?php echo Utility::formatMoney(Stats::doArraySum($this->plist, "total"));?></div>
</div>
<div class="row gutters align middle">
  <div class="columns auto mobile-100 phone-100">
    <div class="wojo small thick text"><?php echo Lang::$word->TOTAL . ': ' . $this->pager->items_total;?> / <?php echo Lang::$word->CURPAGE . ': ' . $this->pager->current_page . ' '. Lang::$word->OF . ' ' . $this->pager->num_pages;?></div>
  </div>
  <div class="columns right aligned mobile-100 phone-100"><?php echo $this->pager->display_pages();?></div>
</div>
<?php endif;?>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/morris.min.js"></script> 
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/raphael.min.js"></script> 
<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function() {	
	$("#payment_chart").parent().addClass('loading');
	$.ajax({
		type: 'GET',
		url: "<?php echo ADMINVIEW . '/helper.php?action=getMembershipPaymentsChart&id=' . $this->data->id;?>&timerange=all",
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
			fillOpacity: '.75',
			hideHover: 'auto',
			preUnits: json.preUnits,
			smooth: true,
			resize: true,
		});
		$("#payment_chart").parent().removeClass('loading');
	});
});
// ]]>
</script>