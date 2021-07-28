<?php
  /**
   * Permissions
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: permissions.tpl.php, v1.00 2020-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if (!Auth::checkAcl("owner")) : print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments)): case "privileges": ?>
<!-- Start privileges -->
<h2><?php echo Lang::$word->M_TITLE2;?></h2>
<p><?php echo str_replace("[ROLE]", '<span class="wojo bold text">' . $this->role->name . '</span>', Lang::$word->M_SUB4);?> <?php echo ($this->role->code != "owner") ? '<span class="wojo bold text"><i>' . Lang::$word->M_INFO . '</i></span>' : null;?></p>
<div class="wojo segment">
  <table class="wojo basic responsive table" id="pTable">
    <thead>
      <tr>
        <th class="disabled"><?php echo Lang::$word->TYPE;?></th>
        <th class="disabled"><?php echo Lang::$word->ADD;?></th>
        <th class="disabled"><?php echo Lang::$word->EDIT;?></th>
        <th class="disabled"><?php echo Lang::$word->APPROVE;?></th>
        <th class="disabled"><?php echo Lang::$word->MANAGE;?></th>
        <th class="disabled"><?php echo Lang::$word->DELETE;?></th>
      </tr>
    </thead>
    <tbody>
      <?php
    foreach ($this->result as $type => $rows):
        echo '<tr>';
        echo '<td>' . $type . '</td>';
        echo '<td>';
        foreach ($rows as $i => $row):
            if (isset($row->mode) and $row->mode == "add") {
                $checked = ($row->active == 1) ? ' checked="checked"' : null;
                $is_owner = ($this->role->code == "owner") ? ' disabled="disabled"' : null;
                echo '<div class="wojo fitted checkbox" data-id="' . $row->id . '"><input id="perm_' . $row->id . '" type="checkbox" data-val="' . $row->active . '" value="' . $row->id . '" name="view-' . $row->id . '" ' . $is_owner . $checked . '><label for="perm_' . $row->id . '"></label><span data-tooltip="' . $row->description . '"><i class="icon question sign"></i></span></div> ';
            }
        endforeach;
        echo '</td>';
		
        echo '<td>';
        foreach ($rows as $row):
            if (isset($row->mode) and $row->mode == "edit") {
                $checked = ($row->active == 1) ? ' checked="checked"' : null;
                $is_owner = ($this->role->code == "owner") ? ' disabled="disabled"' : null;
                echo '<div class="wojo fitted checkbox" data-id="' . $row->id . '"><input id="perm_' . $row->id . '" type="checkbox" data-val="' . $row->active . '" value="' . $row->id . '" name="view-' . $row->id . '" ' . $is_owner . $checked . '><label for="perm_' . $row->id . '"></label><span data-tooltip="' . $row->description . '"><i class="icon question sign"></i></span></div>';
            }
        endforeach;
        echo '</td>';
  
        echo '<td>';
        foreach ($rows as $row):
            if (isset($row->mode) and $row->mode == "approve") {
                $checked = ($row->active == 1) ? ' checked="checked"' : null;
                $is_owner = ($this->role->code == "owner") ? ' disabled="disabled"' : null;
                echo '<div class="wojo fitted checkbox" data-id="' . $row->id . '"><input id="perm_' . $row->id . '" type="checkbox" data-val="' . $row->active . '" value="' . $row->id . '" name="view-' . $row->id . '" ' . $is_owner . $checked . '><label for="perm_' . $row->id . '"></label><span data-tooltip="' . $row->description . '"><i class="icon question sign"></i></span></div>';
            }
        endforeach;
        echo '</td>';

        echo '<td>';
        foreach ($rows as $row):
            if (isset($row->mode) and $row->mode == "manage") {
                $checked = ($row->active == 1) ? ' checked="checked"' : null;
                $is_owner = ($this->role->code == "owner") ? ' disabled="disabled"' : null;
                echo '<div class="wojo fitted checkbox" data-id="' . $row->id . '"><input id="perm_' . $row->id . '" type="checkbox" data-val="' . $row->active . '" value="' . $row->id . '" name="view-' . $row->id . '" ' . $is_owner . $checked . '><label for="perm_' . $row->id . '"></label><span data-tooltip="' . $row->description . '"><i class="icon question sign"></i></span></div>';
            }
        endforeach;
        echo '</td>';
		
        echo '<td>';
        foreach ($rows as $row):
            if (isset($row->mode) and $row->mode == "delete") {
                $checked = ($row->active == 1) ? ' checked="checked"' : null;
                $is_owner = ($this->role->code == "owner") ? ' disabled="disabled"' : null;
                echo '<div class="wojo fitted checkbox" data-id="' . $row->id . '"><input id="perm_' . $row->id . '" type="checkbox" data-val="' . $row->active . '" value="' . $row->id . '" name="view-' . $row->id . '" ' . $is_owner . $checked . '><label for="perm_' . $row->id . '"></label><span data-tooltip="' . $row->description . '"><i class="icon question sign"></i></span></div>';
            }
        endforeach;
        echo '</td>';
  
        echo '</tr>';
    endforeach;
  ?>
    </tbody>
  </table>
</div>
<script type="text/javascript"> 
// <![CDATA[  
$(document).ready(function() {
    $("#pTable").on('click', '.wojo.checkbox input', function() {
        var status = $(this).prop('checked') ? 1 : 0;
        var id = $(this).parent().data('id');
        $.post("<?php echo ADMINVIEW . "/helper.php";?>", {
            action: "changeRole",
            id: id,
            active: status
        });
    });
});
// ]]>
</script>
<?php break;?>
<?php default: ?>
<h2><?php echo Lang::$word->M_TITLE1;?></h2>
<p class="wojo small text"><?php echo Lang::$word->M_SUB3;?></p>
<div class="wojo cards screen-3 tablet-3 mobile-1">
  <?php foreach ($this->data as $row):?>
  <div class="card">
    <div class="content">
      <img src="<?php echo ADMINVIEW;?>/images/<?php echo $row->code;?>.svg" alt="">
      <h5><?php echo $row->name;?></h5>
      <p id="item_<?php echo $row->id;?>" class="wojo small grey text"><?php echo Validator::truncate($row->description, 100);?></p>
    </div>
    <div class="footer divided center aligned">
      <a href="<?php echo Url::url(Router::$path, "privileges/" . $row->id);?>" class="wojo icon circular inverted negative button"><i class="icon lock"></i></a>
      <a data-set='{"option":[{"action":"editRole","id": <?php echo $row->id;?>}], "label":"<?php echo Lang::$word->UPDATE;?>", "url":"helper.php", "parent":"#item_<?php echo $row->id;?>", "complete":"replace", "modalclass":"normal"}' class="wojo icon primary circular inverted button action">
      <i class="icon pencil"></i></a>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php break;?>
<?php endswitch;?>