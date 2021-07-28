<?php
  /**
   * Footer
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: footer.tpl.php, v1.00 2020-05-05 10:12:05 gewa Exp $
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

<script type="text/javascript" src="<?php echo FRONTVIEW;?>/js/master.js"></script> 
<?php Debug::displayInfo();?>
<script type="text/javascript"> 
// <![CDATA[  
$(document).ready(function() {
    $.Master({
		url: "<?php echo FRONTVIEW;?>",
		surl: "<?php echo SITEURL;?>",
        lang: {
            button_text: "<?php echo Lang::$word->BROWSE;?>",
            empty_text: "<?php echo Lang::$word->NOFILE;?>",
        }
    });
});
// ]]>
</script>
<?php if(Utility::in_array_any(["dashboard"], $this->segments)):?>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<?php endif;?>
</body>
</html>

