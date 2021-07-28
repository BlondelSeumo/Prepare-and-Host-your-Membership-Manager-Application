<?php
  /**
   * Controller
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: controller.php, v1.00 2020-02-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once("../../init.php");
	  
  if (!App::Auth()->is_Admin())
      exit;
	  
  $delete = Validator::post('delete');
  $trash = Validator::post('trash');
  $action = Validator::post('action');
  $restore = Validator::post('restore');
  $title = Validator::post('title') ? Validator::sanitize($_POST['title']) : null;

  /* == Delete Actions == */
  switch ($delete):
      /* == Delete Custom Field == */
      case "deleteField":
          if ($row = Db::run()->delete(Content::cfTable, array("id" => Filter::$id))):
		     Db::run()->delete(Users::cfTable, array("field_id" => Filter::$id));
             $json['type'] = "success";
          endif;

          $json['title'] = Lang::$word->SUCCESS;
          $json['message'] = str_replace("[NAME]", $title, Lang::$word->CF_DEL_OK);
		  print json_encode($json);
          break;
		  
      /* == Delete Database == */
      case "deleteBackup":
		  File::deleteFile(UPLOADS . '/backups/' . $title);
		  
          $json['title'] = Lang::$word->SUCCESS;
          $json['message'] = str_replace("[NAME]", $title, Lang::$word->DBM_DEL_OK);
		  print json_encode($json);
          break;

      /* == Delete File == */
      case "deleteFile":
          if ($row = Db::run()->first(Content::fTable, null, array("id" => Filter::$id))):
			 File::deleteFile(App::Core()->file_dir . $row->name);
			 Db::run()->delete(Content::fTable, array("id" => $row->id));
			 $json['type'] = "success";
          endif; 
		  
          $json['title'] = Lang::$word->SUCCESS;
          $json['message'] = str_replace("[NAME]", $title, Lang::$word->FM_DEL_OK);
		  print json_encode($json);
          break;
          
      /* == Delete Trash == */
      case "trashAll":
		  Db::run()->truncate(Core::txTable);
		  Message::msgReply(true, 'success', Lang::$word->TRASH_DEL_OK);
          break;
		  
	  /* == Delete User == */
	  case "deleteUser":
		  $res = Db::run()->delete(Core::txTable, array("id" => Filter::$id));
		  Message::msgReply($res, 'success', str_replace("[NAME]", $title, Lang::$word->M_DELETE_OK));
	  break; 
	  
	  /* == Delete Coupon == */
	  case "deleteCoupon":
		  $res = Db::run()->delete(Core::txTable, array("id" => Filter::$id));
		  Message::msgReply($res, 'success', str_replace("[NAME]", $title, Lang::$word->DC_DELETE_OK));
	  break; 

	  /* == Delete News == */
	  case "deleteNews":
		  $res = Db::run()->delete(Core::txTable, array("id" => Filter::$id));
		  Message::msgReply($res, 'success', str_replace("[NAME]", $title, Lang::$word->NW_DELETE_OK));
	  break; 

	  /* == Delete Page == */
	  case "deletePage":
		  $res = Db::run()->delete(Core::txTable, array("id" => Filter::$id));
		  Message::msgReply($res, 'success', str_replace("[NAME]", $title, Lang::$word->PG_DELETE_OK));
	  break; 
	  
	  /* == Delete Membership == */
	  case "deleteMembership":
		  $res = Db::run()->delete(Core::txTable, array("id" => Filter::$id));
		  Message::msgReply($res, 'success', str_replace("[NAME]", $title, Lang::$word->MEM_DELETE_OK));
	  break; 
  endswitch;
  
  /* == Trash Actions == */
  switch ($trash):
      /* == Trash User == */
      case "trashUser":
          if ($row = Db::run()->first(Users::mTable, "*", array("id =" =>Filter::$id, "AND type <>" => "owner"))):
              $data = array(
                  'type' => "user",
                  'parent_id' => Filter::$id,
                  'dataset' => json_encode($row));
              Db::run()->insert(Core::txTable, $data);
              Db::run()->delete(Users::mTable, array("id" => $row->id));
          endif;

		  $message = str_replace("[NAME]", $title, Lang::$word->M_TRASH_OK);
          Message::msgReply(Db::run()->affected(), 'success', $message);
          break;
		  
      /* == Trash Membership == */
      case "trashMembership":
          if ($row = Db::run()->first(Membership::mTable, "*", array("id =" =>Filter::$id))):
              $data = array(
                  'type' => "membership",
                  'parent_id' => Filter::$id,
                  'dataset' => json_encode($row));
              Db::run()->insert(Core::txTable, $data);
              Db::run()->delete(Membership::mTable, array("id" => $row->id));
          endif;

		  $message = str_replace("[NAME]", $title, Lang::$word->MEM_TRASH_OK);
          Message::msgReply(Db::run()->affected(), 'success', $message);
          break;
		  
		  
      /* == Trash Coupon == */
      case "trashCoupon":
          if ($row = Db::run()->first(Content::dcTable, "*", array("id =" =>Filter::$id))):
              $data = array(
                  'type' => "coupon",
                  'parent_id' => Filter::$id,
                  'dataset' => json_encode($row));
              Db::run()->insert(Core::txTable, $data);
              Db::run()->delete(Content::dcTable, array("id" => $row->id));
          endif;

		  $message = str_replace("[NAME]", $title, Lang::$word->DC_TRASH_OK);
          Message::msgReply(Db::run()->affected(), 'success', $message);
          break;

      /* == Trash Page == */
      case "trashPage":
          if ($row = Db::run()->first(Content::pTable, "*", array("id =" =>Filter::$id))):
              $data = array(
                  'type' => "page",
                  'parent_id' => Filter::$id,
                  'dataset' => json_encode($row));
              Db::run()->insert(Core::txTable, $data);
              Db::run()->delete(Content::pTable, array("id" => $row->id));
          endif;

		  $message = str_replace("[NAME]", $title, Lang::$word->PG_TRASH_OK);
          Message::msgReply(Db::run()->affected(), 'success', $message);
          break;
		  
      /* == Trash News == */
      case "trashNews":
          if ($row = Db::run()->first(Content::nTable, "*", array("id =" =>Filter::$id))):
              $data = array(
                  'type' => "news",
                  'parent_id' => Filter::$id,
                  'dataset' => json_encode($row));
              Db::run()->insert(Core::txTable, $data);
              Db::run()->delete(Content::nTable, array("id" => $row->id));
          endif;

		  $message = str_replace("[NAME]", $title, Lang::$word->NW_TRASH_OK);
          Message::msgReply(Db::run()->affected(), 'success', $message);
          break;
  endswitch;

  /* == Restore Actions == */
  switch ($restore):
      /* == Restore Database == */
      case "restoreBackup":
		  dbTools::doRestore($title);
          break;
		  
	  /* == Restore User == */
	  case "restoreUser":
		  if($result = Db::run()->first(Core::txTable, array('dataset'), array("id" => filter::$id))):
			  $array = Utility::jSonToArray($result->dataset);
			  Core::restoreFromTrash($array, Users::mTable);
			  Db::run()->delete(Core::txTable, array("id" => filter::$id));
			  
              $json['type'] = 'success';
              $json['title'] = Lang::$word->SUCCESS;
              $json['message'] = str_replace("[NAME]", $title, Lang::$word->M_RESTORE_OK);
          else :
              $json['type'] = 'alert';
              $json['title'] = Lang::$word->ALERT;
              $json['message'] = Lang::$word->NOPROCCESS;
          endif;

          print json_encode($json);
          break;
	 
	  
	  /* == Restore Coupon == */
	  case "restoreCoupon":
		  if($result = Db::run()->first(Core::txTable, array('dataset'), array("id" => filter::$id))):
			  $array = Utility::jSonToArray($result->dataset);
			  Core::restoreFromTrash($array, Content::dcTable);
			  Db::run()->delete(Core::txTable, array("id" => filter::$id));
			  
              $json['type'] = 'success';
              $json['title'] = Lang::$word->SUCCESS;
              $json['message'] = str_replace("[NAME]", $title, Lang::$word->DC_RESTORE_OK);
          else :
              $json['type'] = 'alert';
              $json['title'] = Lang::$word->ALERT;
              $json['message'] = Lang::$word->NOPROCCESS;
          endif;

          print json_encode($json);
	  break;

	  /* == Restore Page == */
	  case "restorePage":
		  if($result = Db::run()->first(Core::txTable, array('dataset'), array("id" => filter::$id))):
			  $array = Utility::jSonToArray($result->dataset);
			  Core::restoreFromTrash($array, Content::pTable);
			  Db::run()->delete(Core::txTable, array("id" => filter::$id));
			  
              $json['type'] = 'success';
              $json['title'] = Lang::$word->SUCCESS;
              $json['message'] = str_replace("[NAME]", $title, Lang::$word->PG_RESTORE_OK);
          else :
              $json['type'] = 'alert';
              $json['title'] = Lang::$word->ALERT;
              $json['message'] = Lang::$word->NOPROCCESS;
          endif;

          print json_encode($json);
	  break;
	  /* == Restore News == */
	  case "restoreNews":
		  if($result = Db::run()->first(Core::txTable, array('dataset'), array("id" => filter::$id))):
			  $array = Utility::jSonToArray($result->dataset);
			  Core::restoreFromTrash($array, Content::nTable);
			  Db::run()->delete(Core::txTable, array("id" => filter::$id));
			  
              $json['type'] = 'success';
              $json['title'] = Lang::$word->SUCCESS;
              $json['message'] = str_replace("[NAME]", $title, Lang::$word->NW_RESTORE_OK);
          else :
              $json['type'] = 'alert';
              $json['title'] = Lang::$word->ALERT;
              $json['message'] = Lang::$word->NOPROCCESS;
          endif;

          print json_encode($json);
	  break;
	  
	  /* == Restore Membership == */
	  case "restoreMembership":
		  if($result = Db::run()->first(Core::txTable, array('dataset'), array("id" => filter::$id))):
			  $array = Utility::jSonToArray($result->dataset);
			  Core::restoreFromTrash($array, Membership::mTable);
			  Db::run()->delete(Core::txTable, array("id" => filter::$id));
			  
              $json['type'] = 'success';
              $json['title'] = Lang::$word->SUCCESS;
              $json['message'] = str_replace("[NAME]", $title, Lang::$word->MEM_RESTORE_OK);
          else :
              $json['type'] = 'alert';
              $json['title'] = Lang::$word->ALERT;
              $json['message'] = Lang::$word->NOPROCCESS;
          endif;

          print json_encode($json);
	  break;
  endswitch;
  
  /* == Actions == */
  switch ($action):
      /* == Process User == */
      case "processUser":
          App::Users()->processUser();
      break;
      /* == Process Membership == */
      case "processMembership":
          App::Membership()->processMembership();
      break;
      /* == Process Template == */
      case "processTemplate":
          App::Content()->processTemplate();
      break;
      /* == Process Country == */
      case "processCountry":
          App::Content()->processCountry();
      break;
      /* == Process Coupon == */
      case "processCoupon":
          App::Content()->processCoupon();
      break;
      /* == Process Page == */
      case "processPage":
          App::Content()->processPage();
      break;
      /* == Process Field == */
      case "processField":
          App::Content()->processField();
      break;
      /* == Process News == */
      case "processNews":
          App::Content()->processNews();
      break;
      /* == Update Account == */
      case "updateAccount":
          App::Admin()->updateAccount();
      break;
      /* == Update Password == */
      case "updatePassword":
          App::Admin()->updateAdminPassword();
      break;
      /* == Process Gateway == */
      case "processGateway":
          App::Admin()->processGateway();
      break;
      /* == Process Mailer == */
      case "processMailer":
          App::Admin()->processMailer();
      break;
      /* == Delete Inactive users == */
      case "processMInactive":
          Stats::deleteInactive(intval($_POST['days']));
      break;
      /* == Delete Banned Users == */
      case "processMIBanned":
          Stats::deleteBanned();
      break;
      /* == Delete Cart == */
      case "processMCart":
          Stats::emptyCart();
      break;
      /* == Page Builder == */
      case "pageBuilder":
          Admin::pageBuilder();
      break;
      /* == Process Configuration == */
      case "processConfig":
          App::Core()->processConfig();
      break;
  endswitch;