<?php
  /**
   * Language Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: language.tpl.php, v1.00 2020-02-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::hasPrivileges('manage_languages')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<h2><?php echo Lang::$word->META_T21;?></h2>
<p class="wojo small text"><?php echo Lang::$word->LG_SUB2;?></p>
<div class="wojo form">
  <div class="row gutters align center">
    <div class="columns screen-30 tablet-50 mobile-100 phone-100">
      <div class="wojo icon input">
        <input id="filter" type="text" placeholder="<?php echo Lang::$word->SEARCH;?>">
        <i class="find icon"></i>
      </div>
    </div>
    <div class="columns screen-30 tablet-50 mobile-100 phone-100">
      <select name="pgroup" id="pgroup" data-abbr="<?php echo Core::$language;?>">
        <option data-type="all" value="all"><?php echo Lang::$word->LG_SUB4;?></option>
        <?php foreach($this->sections as $rows):?>
        <option data-type="filter" value="<?php echo $rows;?>"><?php echo $rows;?></option>
        <?php endforeach;?>
        <?php unset($rows);?>
      </select>
    </div>
  </div>
</div>
<div class="wojo segment">
  <?php $i = 0;?>
  <div class="wojo small relaxed fluid celled list align middle" id="editable">
    <?php foreach ($this->data as $pkey) :?>
    <?php $i++;?>
    <div class="item align middle">
      <div class="content"><span data-editable="true" data-set='{"action": "editPhrase", "id": <?php echo $i;?>,"key":"<?php echo $pkey['data'];?>", "path":"lang"}'><?php echo $pkey;?></span></div>
      <div class="content auto phone-hide"><span class="wojo small dark inverted label"><?php echo $pkey['data'];?></span></div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<script src="<?php echo ADMINVIEW;?>/js/language.js"></script> 
<script type="text/javascript"> 
// <![CDATA[	
  $(document).ready(function() {
	  $.Language({
		  url: "<?php echo ADMINVIEW;?>",
	  });
  });
// ]]>
</script> 