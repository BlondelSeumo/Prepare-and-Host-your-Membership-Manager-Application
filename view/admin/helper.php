<?php
  /**
   * Helper
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: helper.php, v1.00 2020-02-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once("../../init.php");
	  
  if (!App::Auth()->is_Admin())
      exit;

  $gAction = Validator::get('action');
  $pAction = Validator::post('action');
  $iAction = Validator::post('iaction');
  $title = Validator::post('title') ? Validator::sanitize($_POST['title']) : null;
  
  /* == GET Actions == */
  switch ($gAction) :
	  /* == Edit Role == */
	  case "editRole":
		  $tpl = App::View(BASEPATH . 'view/admin/snippets/'); 
		  $tpl->data = Db::run()->first(Users::rTable, null, array('id' => Filter::$id));
		  $tpl->template = 'editRole.tpl.php'; 
		  echo $tpl->render(); 
	  break;

	  /* == Load Language Section == */
	  case "languageSection":
		  $xmlel = simplexml_load_file(BASEPATH . Lang::langdir . Core::$language . ".lang.xml");
		  $section = $xmlel->xpath('/language/phrase[@section="' . Validator::sanitize($_GET['section']) . '"]');
		  $tpl = App::View(BASEPATH . 'view/admin/snippets/'); 
		  $tpl->xmlel = $xmlel;
		  $tpl->section = $section;
		  $tpl->template = 'loadLanguageSection.tpl.php'; 
		  $json['html'] = $tpl->render(); 
		  print json_encode($json);
	  break;

	  /* == All Sales Chart == */
	  case "getSalesChart":
		  $data = Stats::getAllSalesStats();
		  print json_encode($data);
	  break;

	  /* == All Sales Export == */
	  case "exportAllTransactions":
		  header("Pragma: no-cache");
		  header('Content-Type: text/csv; charset=utf-8');
		  header('Content-Disposition: attachment; filename=AllPayments.csv');
		  
		  $data = fopen('php://output', 'w');
		  fputcsv($data, array('TXN ID', 'Item', 'User', 'Amount', 'TAX/VAT', 'Coupon', 'Total Amount', 'Currency', 'Processor', 'Created'));
		  
		  $result = Stats::exportAllTransactions();
		  if($result):
			  foreach ($result as $row) :
				  fputcsv($data, $row);
			  endforeach;
		  endif;
	  break;
	  
	  /* == Export Users == */
	  case "exportUsers":
		  header("Pragma: no-cache");
		  header('Content-Type: text/csv; charset=utf-8');
		  header('Content-Disposition: attachment; filename=UserList.csv');
		  
		  $data = fopen('php://output', 'w');
		  fputcsv($data, array('Name', 'Membership', 'Expire', 'Email', 'Newsletter', 'Created'));
		  
		  $result = Stats::exportUsers();
		  if($result):
			  foreach ($result as $row) :
				  fputcsv($data, $row);
			  endforeach;
		  endif;
	  break;

	   /* == Export User Payments == */
	  case "exportUserPayments":
		  header("Pragma: no-cache");
		  header('Content-Type: text/csv; charset=utf-8');
		  header('Content-Disposition: attachment; filename=UserPayments.csv');
		  
		  $data = fopen('php://output', 'w');
		  fputcsv($data, array('TXN ID', 'Name', 'Amount', 'TAX/VAT', 'Coupon', 'Total Amount', 'Currency', 'Processor', 'Created'));
		  
		  $result = Stats::exportUserPayments(Filter::$id);
		  if($result):
			  foreach ($result as $row) :
				  fputcsv($data, $row);
			  endforeach;
		  endif;
	  break;

	   /* == User Payments Chart == */
	  case "getUserPaymentsChart":
		  $data = Stats::getUserPaymentsChart(Filter::$id);
		  print json_encode($data);
	  break;

	  /* == Rename File == */
	  case "renameFile":
		  $tpl = App::View(BASEPATH . 'view/admin/snippets/'); 
		  $tpl->template = 'renameFile.tpl.php'; 
		  $tpl->data = Db::run()->first(Content::fTable, null, array('id' => Filter::$id));
		  $tpl->mlist = App::Membership()->getMembershipList();
		  echo $tpl->render(); 
	  break;

	   /* == Membership Payments Chart == */
	  case "getMembershipPaymentsChart":
		  $data = Stats::getMembershipPaymentsChart(Filter::$id);
		  print json_encode($data);
	  break;

	   /* == Export Membership Payments == */
	  case "exportMembershipPayments":
		  header("Pragma: no-cache");
		  header('Content-Type: text/csv; charset=utf-8');
		  header('Content-Disposition: attachment; filename=MembershipPayments.csv');
		  
		  $data = fopen('php://output', 'w');
		  fputcsv($data, array('TXN ID', 'User', 'Amount', 'TAX/VAT', 'Coupon', 'Total Amount', 'Currency', 'Processor', 'Created'));
		  
		  $result = Stats::exportMembershipPayments(Filter::$id);
		  if($result):
			  foreach ($result as $row) :
				  fputcsv($data, $row);
			  endforeach;
		  endif;
	  break;
  
	   /* == Index Payments Chart == */
	  case "getIndexStats":
		  $data = Stats::indexSalesStats();
		  print json_encode($data);
	  break;
	
	  /* == Main Stats == */
	  case "getMainStats":
		  $data = Stats::getMainStats();
		  print json_encode($data);
	  break;

	  /* == Resend Notification == */
	  case "resendNotification":
		  $tpl = App::View(BASEPATH . 'view/admin/snippets/'); 
		  $tpl->template = 'resendNotification.tpl.php'; 
		  $tpl->data = Db::run()->first(Users::mTable, array("id", "email", "CONCAT(fname,' ',lname) as name"), array('id' => Filter::$id));
		  echo $tpl->render(); 
	  break;
		  
  endswitch;
  
  /* == Post Actions == */
  switch ($pAction) :
	  /* == Update Role Description == */
	  case "editRole":
		  App::Users()->updateRoleDescription();
	  break;  
	  
	  /* == Chnage Role == */
	  case "changeRole":
		  if(Auth::checkAcl("owner")):
			  Db::run()->update(Users::rpTable, array("active" => intval($_POST['active'])), array("id" => Filter::$id));
		  endif;
	  break;
	  
	  /* == Update Language Phrase == */
	  case "editPhrase":
		  if (file_exists(BASEPATH . Lang::langdir . Core::$language . ".lang.xml")):
			  $xmlel = simplexml_load_file(BASEPATH . Lang::langdir . Core::$language . ".lang.xml");
			  $node = $xmlel->xpath("/language/phrase[@data = '" . $_POST['key'] . "']");
			  $node[0][0] = $title;
			  $xmlel->asXML(BASEPATH . Lang::langdir . Core::$language . ".lang.xml");
			  
			  $json['title'] = $title;
			  print json_encode($json);
		  endif;
	  break; 

	  /* == Update Country Tax == */
	  case "editTax":
		  if (empty($_POST['title'])):
			  print '0.000';
			  exit;
		  endif;
			  $data['vat'] = Validator::sanitize($_POST['title'], "float");
			  Db::run()->update(Content::cTable, $data, array('id' => Filter::$id));
		  
		  $json['title'] = $title;
		  print json_encode($json);			  
	  break; 

	  /* == Chnage Cooupon Status == */
	  case "couponStatus":
		  Db::run()->update(Content::dcTable, array("active" => intval($_POST['active'])), array("id" => Filter::$id));
	  break;
	  
	  /* == Chnage Gateway Status == */
	  case "gatewayStatus":
		  if(Auth::checkAcl("owner")):
			  Db::run()->update(Admin::gTable, array("active" => intval($_POST['active'])), array("id" => Filter::$id));
		  endif;
	  break;
	  
	  /* == Rename File == */
	  case "renameFile":
		  App::Content()->renameFile();
	  break;
	  
	  /* == Process Notification == */
	  case "resendNotification":
		  App::Users()->resendNotification();
	  break;
  endswitch;
		  	  
  /* == Instant Actions == */
  switch ($iAction) :
	  /* == Database Backup == */
	  case "databaseBackup":
		  dbTools::doBackup();
	  break;
	  
	  /* == Sort Custom Fields == */
	  case "sortFields":
		  $i = 0;
		  $query = "UPDATE `" . Content::cfTable . "` SET `sorting` = CASE ";
		  $idlist = '';
		  foreach ($_POST['sorting'] as $item):
			  $i++;
			  $query .= " WHEN id = " . $item . " THEN " . $i . " ";
			  $idlist .= $item . ',';
		  endforeach;
		  $idlist = substr($idlist, 0, -1);
		  $query .= "
				  END
				  WHERE id IN (" . $idlist . ")";
		  Db::run()->pdoQuery($query);
	   break;
	   
	  /* == File Upload == */
	  case "fileUpload":
		  if (!empty($_FILES['file']['name'])):
			  $upl = Upload::instance(Content::FS, Content::FE);
			  $upl->process("file", App::Core()->file_dir, 'SOURCE_');
			  if (empty(Message::$msgs)):
				  $data = array(
					  'alias' => $upl->fileInfo['name'],
					  'name' => $upl->fileInfo['fname'],
					  'filesize' => $upl->fileInfo['size'],
					  'extension' => $upl->fileInfo['ext'],
					  'type' => $upl->fileInfo['type_short'],
					  'token' => Utility::randomString(16),
					  'fileaccess' => 0,
					  );
					  
				  $last_id = Db::run()->insert(Content::fTable, $data)->getLastInsertId(); 
				  $row = Db::run()->first(Content::fTable, null, array('id' => $last_id)); 
		  
				  $json['status'] = "success";
				  $json['filename'] = $data['name'];
				  $json['type'] = File::getFileType($data['name']);
				  $json['id'] = $last_id;
				  $json['html'] = Utility::getSnippets(ADMINBASE . "/snippets/loadFile.tpl.php", $data = $row);
			  else:
				  $json['type'] = "error";
				  $json['message'] = Message::$msgs['name'];
			  endif;
			  print json_encode($json);
		  endif;
	  break;
  endswitch;

  /* == Clear Session Temp Queries == */
  if (isset($_GET['ClearSessionQueries'])):
      App::Session()->remove('debug-queries');
	  App::Session()->remove('debug-warnings');
	  App::Session()->remove('debug-errors');
	  print 1;
  endif;