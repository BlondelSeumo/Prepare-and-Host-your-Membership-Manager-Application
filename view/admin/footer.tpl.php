<?php
  /**
   * Footer
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: footer.php, v1.00 2020-02-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<!-- Footer -->
</div>
</main>
<footer> Copyright &copy;<?php echo date('Y') . ' '. $this->core->company;?>
  <i class="icon middle wojologo"></i> Powered by: wojo works v <?php echo $this->core->wojov;?>
</footer>
<?php Debug::displayInfo();?>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/editor/editor.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/editor/alignment.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/editor/fullscreen.js"></script>
<script type="text/javascript" src="<?php echo ADMINVIEW;?>/js/master.js"></script> 
<script type="text/javascript"> 
// <![CDATA[  
$(document).ready(function() {
    $.Master({
        weekstart: <?php echo($this->core->weekstart);?>,
		ampm: "<?php echo ($this->core->time_format) == "hh:mm" ? false : true;?>",
		url: "<?php echo ADMINVIEW;?>",
		surl: "<?php echo SITEURL;?>",
        lang: {
            button_text: "<?php echo Lang::$word->BROWSE;?>",
            empty_text: "<?php echo Lang::$word->NOFILE;?>",
            monthsFull: [ <?php echo Date::monthList(false);?> ],
            monthsShort: [ <?php echo Date::monthList(false, false);?> ],
            weeksFull: [ <?php echo Date::weekList(false); ?> ],
            weeksShort: [ <?php echo Date::weekList(false, false);?> ],
			weeksMed: [ <?php echo Date::weekList(false, false, true);?> ],
			dateFormat: "<?php echo $this->core->calendar_date;?>",
            today: "<?php echo Lang::$word->TODAY;?>",
			now: "<?php echo Lang::$word->NOW;?>",
            clear: "<?php echo Lang::$word->CLEAR;?>",
			clsBtn: "<?php echo Lang::$word->CLOSE;?>",
            delBtn: "<?php echo Lang::$word->DELETE_REC;?>",
			trsBtn: "<?php echo Lang::$word->MTOTRASH;?>",
			restBtn: "<?php echo Lang::$word->RFCOMPLETE;?>",
			canBtn: "<?php echo Lang::$word->CANCEL;?>",
            delMsg1: "<?php echo Lang::$word->DELCONFIRM1;?>",
            delMsg2: "<?php echo Lang::$word->DELCONFIRM2;?>",
			delMsg3: "<?php echo Lang::$word->TRASH;?>",
			delMsg5: "<?php echo Lang::$word->DELCONFIRM4;?>",
			delMsg6: "<?php echo Lang::$word->DELCONFIRM6;?>",
			delMsg7: "<?php echo Lang::$word->DELCONFIRM10;?>",
			delMsg8: "<?php echo Lang::$word->DELCONFIRM3;?>",
			delMsg9: "<?php echo Lang::$word->DELCONFIRM11;?>",
            working: "<?php echo Lang::$word->WORKING;?>"
        }
    });
});
// ]]>
</script>
</body>
</html>