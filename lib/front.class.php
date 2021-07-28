<?php
  /**
   * Front Admin
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: front.class.php, v1.00 2020-04-29 18:20:24 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');


  class Front
  {
	  

      /**
       * Front::Index()
       * 
       * @return
       */
      public function Index()
      {
		  if (App::Auth()->is_User()) {
			  Url::redirect(URL::url('/dashboard')); 
			  exit; 
		  }
		  $core = App::Core();
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->template = 'front/index.tpl.php';
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->title = str_replace("[COMPANY]", $core->company, Lang::$word->META_T28);
      }
	  
      /**
       * Front::Register()
       * 
       * @return
       */
      public function Register()
      {
		  if (App::Auth()->is_User()) {
			  Url::redirect(URL::url('/dashboard')); 
			  exit; 
		  }
		  $core = App::Core();
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->template = 'front/register.tpl.php';
		  $tpl->custom_fields = Content::rendertCustomFieldsFront();
		  $tpl->clist = $core->enable_tax ? App::Content()->getCountryList() : '';
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->title = str_replace("[COMPANY]", $core->company, Lang::$word->META_T28);
      }
  
      /**
       * Front::News()
       * 
       * @return
       */
      public function News()
      {

		  $core = App::Core();
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->template = 'front/news.tpl.php';
		  $tpl->data = App::Content()->renderNews();
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->title = str_replace("[COMPANY]", $core->company, Lang::$word->META_T28);
      }

      /**
       * Front::Page()
       * 
	   * @param string $slug
       * @return
       */
      public function Page($slug)
      {

		  $core = App::Core();
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->title = str_replace("[COMPANY]", $core->company, Lang::$word->META_T28);
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
		  $tpl->keywords = null;
		  $tpl->description = null;
		  
		  if (!$row = Db::run()->first(Content::pTable, null, array("slug" => $slug, "active" => 1))) {
			  $tpl->template = 'front/404.tpl.php';
			  DEBUG ? Debug::AddMessage("errors", '<i>ERROR</i>', "Invalid page detected [front.class.php, ln.:" . __line__ . "] slug ['<b>" . $slug ."</b>']") : Lang::$word->META_ERROR;
		  } else {
			  $tpl->row = $row;
			  if($row->page_type == "membership") {
				 $tpl->packages = Db::run()->select(Membership::mTable, null, array("active" => 1, "private" => 0), 'ORDER BY price')->results();
			  }
			  $tpl->title = $tpl->row->title . ' - ' . $core->company;
			  $tpl->keywords = $row->keywords;
			  $tpl->description = $row->description;
			  $tpl->crumbs = [array(0 =>Lang::$word->HOME, 1 => ''), $row->title];
			  $tpl->template = 'front/page.tpl.php';
		  }
      }
	  
      /**
       * Front::Registration()
       * 
       * @return
       */
      public function Registration()
      {
		  $rules = array(
			  'fname' => array('required|string|min_len,2|max_len,60', Lang::$word->M_FNAME),
			  'lname' => array('required|string|min_len,2|max_len,60', Lang::$word->M_LNAME),
			  'password' => array('required|string|min_len,6|max_len,20', Lang::$word->M_PASSWORD),
			  'email' => array('required|email', Lang::$word->M_EMAIL),
			  'agree' => array('required|numeric', Lang::$word->PRIVACY),
			  'captcha' => array('required|numeric|exact_len,5', Lang::$word->CAPTCHA),
			  );
			  
	      if(App::Core()->enable_tax) {
			  $rules['address'] = array('required|string|min_len,3|max_len,80', Lang::$word->M_ADDRESS);
			  $rules['city'] = array('required|string|min_len,2|max_len,80', Lang::$word->M_CITY);
			  $rules['zip'] = array('required|string|min_len,3|max_len,30', Lang::$word->M_ZIP);
			  $rules['state'] = array('required|string|min_len,2|max_len,80', Lang::$word->M_STATE);
			  $rules['country'] = array('required|string|exact_len,2', Lang::$word->M_COUNTRY);
		  }


		  if (App::Session()->get('wcaptcha') != $_POST['captcha'])
			  Message::$msgs['captcha'] = Lang::$word->CAPTCHA;

			  
          if (!empty($_POST['email'])) {
			  if (Auth::emailExists($_POST['email'])) {
              	Message::$msgs['email'] = Lang::$word->M_EMAIL_R2;
			  }
		  }

		  $filters = array(
			  'lname' => 'trim|string',
			  'fname' => 'trim|string',
			  );
			  
		  $validate = Validator::instance();
		  $safe = $validate->doValidate($_POST, $rules);
		  $safe = $validate->doFilter($_POST, $filters);
		  
		  Content::verifyCustomFields();
		  
          if (empty(Message::$msgs)) {
              $salt = '';
			  $hash = App::Auth()->create_hash($safe->password, $salt);
			  $username = Utility::randomString();
			  $core = App::Core();

              if ($core->reg_verify == 1) {
                  $active = "t";
              } elseif ($core->auto_verify == 0) {
                  $active = "n";
              } else {
                  $active = "y";
              }
			  
              $data = array(
                  'username' => $username,
				  'email' => $safe->email,
                  'lname' => $safe->lname,
				  'fname' => $safe->fname,
                  'hash' => $hash,
                  'salt' => $salt,
                  'type' => "member",
				  'token' => Utility::randNumbers(),
				  'active' => $active,
                  'userlevel' => 1,
				  );
				  
			  if(App::Core()->enable_tax) {
				  $data['address'] = $safe->address;
				  $data['city'] = $safe->city;
				  $data['state'] = $safe->state;
				  $data['zip'] = $safe->zip;
				  $data['country'] = $safe->country;
			  }

			  $last_id = Db::run()->insert(Users::mTable, $data)->getLastInsertId();
			  
			  // Start Custom Fields
			  $fl_array = Utility::array_key_exists_wildcard($_POST, 'custom_*', 'key-value');
			  if ($fl_array) {
				  $fields = Db::run()->select(Content::cfTable)->results();
				  foreach ($fields as $row) {
					  $dataArray[] = array(
						  'user_id' => $last_id,
						  'field_id' => $row->id,
						  'field_name' => $row->name,
						  );
				  }
				  Db::run()->insertBatch(Users::cfTable, $dataArray);
				  
				  foreach ($fl_array as $key => $val) {
					  $cfdata['field_value'] = Validator::sanitize($val);
					  Db::run()->update(Users::cfTable, $cfdata, array("user_id" => $last_id, "field_name" => str_replace("custom_", "", $key)));
				  }
			  }
			  
			  //Default membership
			  if($core->enable_dmembership) {
				  $row = Db::run()->first(Membership::mTable, null, array("id" => $core->dmembership));
				  $datam = array(
					  'txn_id' => "MAN_" . Utility::randomString(12),
					  'membership_id' => $row->id,
					  'user_id' => $last_id,
					  'rate_amount' => $row->price,
					  'coupon' => 0,
					  'total' => $row->price,
					  'tax' => 0,
					  'currency' => $core->currency,
					  'ip' => Url::getIP(),
					  'pp' => "MANUAL",
					  'status' => 1,
					  );
					  
					  $transid = Db::run()->insert(Membership::pTable, $datam)->getLastInsertId();
					  //insert user membership
					  $udata = array(
						  'tid' => $transid,
						  'uid' => $last_id,
						  'mid' => $row->id,
						  'expire' => Membership::calculateDays($row->id),
						  'recurring' => 0,
						  'active' => 1,
						  );
						  
					//update user record
					$xdata = array(
						'membership_id' => $row->id,
						'mem_expire' => $udata['expire'],
						);
						
					Db::run()->insert(Membership::umTable, $udata);
					Db::run()->update(Users::mTable, $xdata, array("id" => $last_id));
			  }
				  
			  if ($core->reg_verify == 1) {
				  $message = Lang::$word->M_INFO7;
				  
				  $mailer = Mailer::sendMail();
				  $tpl = Db::run()->first(Content::eTable, array("body", "subject"), array('typeid' => 'regMail'));
				  $body = str_replace(array(
					  '[LOGO]',
					  '[DATE]',
					  '[COMPANY]',
					  '[NAME]',
					  '[USERNAME]',
					  '[PASSWORD]',
					  '[LINK]',
					  '[FB]',
					  '[TW]',
					  '[SITEURL]'), array(
					  Utility::getLogo(),
					  date('Y'),
					  $core->company,
					  $safe->fname . ' ' . $safe->lname,
					  $safe->email,
					  $safe->password,
					  Url::url("/activation", '?token=' . $data['token'] . '&email=' . $data['email']),
					  $core->social->facebook,
					  $core->social->twitter,
					  SITEURL), $tpl->body);
		
				  $msg = (new Swift_Message())
						->setSubject($tpl->subject)
						->setFrom(array($core->site_email => $core->company))
						->setTo(array($data['email'] => $data['fname'] . ' ' . $data['lname']))
						->setBody($body, 'text/html'
						);
				  $mailer->send($msg);
				  
			  } elseif ($core->auto_verify == 0) {
				  $message = Lang::$word->M_INFO7;
				  
				  $mailer = Mailer::sendMail();
				  $tpl = Db::run()->first(Content::eTable, array("body", "subject"), array('typeid' => 'regMailPending'));
				  $body = str_replace(array(
					  '[LOGO]',
					  '[DATE]',
					  '[COMPANY]',
					  '[NAME]',
					  '[USERNAME]',
					  '[PASSWORD]',
					  '[LINK]',
					  '[FB]',
					  '[TW]',
					  '[SITEURL]'), array(
					  Utility::getLogo(),
					  date('Y'),
					  $core->company,
					  $safe->fname . ' ' . $safe->lname,
					  $safe->email,
					  $password,
					  Url::url(""),
					  $core->social->facebook,
					  $core->social->twitter,
					  SITEURL), $tpl->body);
		
				  $msg = (new Swift_Message())
						->setSubject($tpl->subject)
						->setFrom(array($core->site_email => $core->company))
						->setTo(array($data['email'] => $data['fname'] . ' ' . $data['lname']))
						->setBody($body, 'text/html'
						);
				  $mailer->send($msg);
			  } else {
				  //login user
				  App::Auth()->login($safe->email, $safe->password, false);
				  $message = Lang::$word->M_INFO8;
				  
				  $mailer = Mailer::sendMail();
				  $tpl = Db::run()->first(Content::eTable, array("body", "subject"), array('typeid' => 'welcomeEmail'));
				  $body = str_replace(array(
					  '[LOGO]',
					  '[DATE]',
					  '[LINK]',
					  '[COMPANY]',
					  '[USERNAME]',
					  '[NAME]',
					  '[PASSWORD]',
					  '[FB]',
					  '[TW]',
					  '[SITEURL]'), array(
					  Utility::getLogo(),
					  date('Y'),
					  Url::url(""),
					  $core->company,
					  $safe->email,
					  $safe->fname . ' ' . $safe->lname,
					  $safe->password,
					  $core->social->facebook,
					  $core->social->twitter,
					  SITEURL), $tpl->body);
		
				  $msg = (new Swift_Message())
						->setSubject($tpl->subject)
						->setFrom(array($core->site_email => $core->company))
						->setTo(array($data['email'] => $data['fname'] . ' ' . $data['lname']))
						->setBody($body, 'text/html'
						);
				  $mailer->send($msg);
			  }
			  
			  if ($core->notify_admin) {
				  $mailer = Mailer::sendMail();
				  $tpl = Db::run()->first(Content::eTable, array("body", "subject"), array('typeid' => 'notifyAdmin'));
				  $body = str_replace(array(
					  '[LOGO]',
					  '[DATE]',
					  '[EMAIL]',
					  '[COMPANY]',
					  '[NAME]',
					  '[IP]',
					  '[FB]',
					  '[TW]',
					  '[SITEURL]'), array(
					  Utility::getLogo(),
					  date('Y'),
					  $safe->email,
					  $core->company,
					  $data['fname'] . ' ' . $data['lname'],
					  Url::getIP(),
					  $core->social->facebook,
					  $core->social->twitter,
					  SITEURL), $tpl->body);
		
				  $msg = (new Swift_Message())
						->setSubject($tpl->subject)
						->setFrom(array($core->site_email => $core->company))
						->setTo(array($core->site_email => $core->company))
						->setBody($body, 'text/html'
						);
				  $mailer->send($msg);
			  }

              if (Db::run()->affected() && $mailer) {
				  $json['type'] = 'success';
				  $json['title'] = Lang::$word->SUCCESS;
				  $json['redirect'] = SITEURL;
				  $json['message'] = $message;
			  } else {
				  $json['type'] = 'error';
				  $json['title'] = Lang::$word->ERROR;
				  $json['message'] = Lang::$word->M_INFO11;
			  }
			  print json_encode($json);  
		  } else {
			  Message::msgSingleStatus();
		  }
	  }
	  
      /**
       * Front::Dashboard()
       * 
       * @return
       */
      public function Dashboard()
      {
		  if (!App::Auth()->is_User()) {
			  Url::redirect(SITEURL); 
			  exit; 
		  }
		  $core = App::Core();
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
		  $tpl->data = Db::run()->select(Membership::mTable, null, array("private" => 0, "active" => 1), "ORDER BY price")->results();
		  $tpl->user = Db::run()->first(Users::mTable, array("membership_id"), array("id" => App::Auth()->uid));
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->template = 'front/dashboard.tpl.php';
          $tpl->title = str_replace("[COMPANY]", $core->company, Lang::$word->META_T28);
      }

      /**
       * Front::Activation()
       * 
       * @return
       */
      public function Activation()
      {

		  $core = App::Core();
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->template = 'front/activation.tpl.php';
          $tpl->title = str_replace("[COMPANY]", $core->company, Lang::$word->META_T28);
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
		  
		  if(Validator::get('token') and Validator::get('email')) {
			  $rules = array(
				  'email' => array('required|email', Lang::$word->M_EMAIL),
				  'token' => array('required|numeric|min_len,5|max_len,12', Lang::$word->M_INFO10),
				  );
			  $filters = array('token' => 'string');
			  
			  $validate = Validator::instance();
			  $safe = $validate->doValidate($_GET, $rules);
			  $safe = $validate->doFilter($_GET, $filters);
			  
			  if (empty(Message::$msgs)) {
				  if ($row = Db::run()->first(Users::mTable, array("id"), array(
					  "email" => $safe->email,
					  "token" => $safe->token,
					  ))) {
					  Db::run()->update(Users::mTable, array("active" => "y", "token" => 0), array("id" => $row->id));
					  Url::redirect(Url::url("/activation","?done=true"));
				  } else {
					  Url::url("/activation","?error=true");
				  }
			  } else {
				  Url::url("/activation","?error=true");
			  }
		  } else {
			  Url::url("/activation","?error=true");
		  }
      }

      /**
       * Front::Packages()
       * 
       * @return
       */
      public function Packages()
      {

          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
		  $tpl->data = Db::run()->select(Membership::mTable, null, array("private" => 0, "active" => 1), "ORDER BY price")->results();
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->template = 'front/packages.tpl.php';
          $tpl->title = Lang::$word->META_T29;
      }

      /**
       * Front::History()
       * 
       * @return
       */
      public function History()
      {
		  if (!App::Auth()->is_User()) {
			  Url::redirect(URL::url('/dashboard')); 
			  exit; 
		  }
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
		  $tpl->data = Stats::userHistory(App::Auth()->uid, 'expire');
		  $tpl->totals = Stats::userTotals();
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->template = 'front/history.tpl.php';
          $tpl->title = Lang::$word->META_T31;
      }

      /**
       * Front::Downloads()
       * 
       * @return
       */
      public function Downloads()
      {
		  if (!App::Auth()->is_User()) {
			  Url::redirect(URL::url('/dashboard')); 
			  exit; 
		  }
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->template = 'front/downloads.tpl.php';
		  $user = Db::run()->first(Users::mTable, array("membership_id", "user_files"), array("id" => App::Auth()->uid));
		  $tpl->data = Db::run()->pdoQuery("SELECT * FROM  `" . Content::fTable . "` WHERE FIND_IN_SET(" . $user->membership_id . ", fileaccess) ORDER BY created DESC")->results();
		  $tpl->userfiles = Db::run()->pdoQuery("SELECT * FROM  `" . Content::fTable . "` WHERE id IN(" . $user->user_files . ") ORDER BY created DESC")->results();
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->title = Lang::$word->META_T34;
      }
	  
      /**
       * Front::Validate()
       * 
       * @return
       */
      public function Validate()
      {
		  if (!App::Auth()->is_User()) {
			  Url::redirect(URL::url('/dashboard')); 
			  exit; 
		  }
		  $core = App::Core();
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->template = 'front/validate.tpl.php';
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->title = str_replace("[COMPANY]", $core->company, Lang::$word->META_T28);
      }
	  
      /**
       * Front::Profile()
       * 
       * @return
       */
      public function Profile()
      {
		  if (!App::Auth()->is_User()) {
			  Url::redirect(URL::url('/dashboard')); 
			  exit; 
		  }
          $row = Db::run()->first(Users::mTable, null, array('id' => App::Auth()->uid));
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
		  $tpl->data = $row;
		  $tpl->clist = App::Content()->getCountryList();
		  $tpl->custom_fields = Content::rendertCustomFields(App::Auth()->uid);
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->template = 'front/profile.tpl.php';
          $tpl->title = Lang::$word->META_T32;
      }

      /**
       * Front::updateProfile()
       * 
       * @return
       */
	  public function updateProfile()
	  {
		  $rules = array(
			  'fname' => array('required|string|min_len,3|max_len,60', Lang::$word->M_FNAME),
			  'lname' => array('required|string|min_len,3|max_len,60', Lang::$word->M_LNAME),
			  'email' => array('required|email', Lang::$word->M_EMAIL),
			  'newsletter' => array('required|numeric|exact_len,1', Lang::$word->M_SUB10),
			  );
	
		  if (App::Core()->enable_tax) {
			  $rules['address'] = array('required|string|min_len,3|max_len,80', Lang::$word->M_ADDRESS);
			  $rules['city'] = array('required|string|min_len,2|max_len,80', Lang::$word->M_CITY);
			  $rules['zip'] = array('required|string|min_len,3|max_len,30', Lang::$word->M_ZIP);
			  $rules['state'] = array('required|string|min_len,2|max_len,80', Lang::$word->M_STATE);
			  $rules['country'] = array('required|string|exact_len,2', Lang::$word->M_COUNTRY);
		  }
	
		  $validate = Validator::instance();
		  $safe = $validate->doValidate($_POST, $rules);
	
		  Content::verifyCustomFields();
		  
		  $upl = Upload::instance(512000, "png,jpg");
		  if (!empty($_FILES['avatar']['name']) and empty(Message::$msgs)) {
			  $upl->process("avatar", UPLOADS . "/avatars/", "AVT_");
		  }
		  
		  if (empty(Message::$msgs)) {
			  $data = array(
				  'email' => $safe->email,
				  'lname' => $safe->lname,
				  'fname' => $safe->fname,
				  'newsletter' => $safe->newsletter,
				  );
			  if (App::Core()->enable_tax) {
				  $data['address'] = $safe->address;
				  $data['city'] = $safe->city;
				  $data['zip'] = $safe->zip;
				  $data['state'] = $safe->state;
				  $data['country'] = $safe->country;
			  }
	
			  if (!empty($_POST['password'])) {
				  $salt = '';
				  $hash = App::Auth()->create_hash(Validator::cleanOut($_POST['password']), $salt);
				  $data['hash'] = $hash;
				  $data['salt'] = $salt;
			  }
	
			  if (isset($upl->fileInfo['fname'])) {
				  $data['avatar'] = $upl->fileInfo['fname'];
				  if (Auth::$udata->avatar != "") {
					  File::deleteFile(UPLOADS . "/avatars/" . Auth::$udata->avatar);
					  Auth::$udata->avatar = App::Session()->set('avatar', $upl->fileInfo['fname']);
				  }
			  }
	
			  // Start Custom Fields
			  $fl_array = Utility::array_key_exists_wildcard($_POST, 'custom_*', 'key-value');
			  if ($fl_array) {
				  $result = array();
				  foreach ($fl_array as $key => $val) {
					$cfdata['field_value'] = Validator::sanitize($val);
					Db::run()->update(Users::cfTable, $cfdata, array("user_id" => Auth::$udata->uid, "field_name" => str_replace("custom_", "", $key)));
				  }
			  }
	
			  Db::run()->update(Users::mTable, $data, array("id" => Auth::$udata->uid));
			  Message::msgReply(Db::run()->affected(), 'success', str_replace("[NAME]", "", Lang::$word->M_UPDATED));
			  if(Db::run()->affected()) {
				  Auth::$udata->email = App::Session()->set('email', $data['email']);
				  Auth::$udata->fname = App::Session()->set('fname', $data['fname']);
				  Auth::$udata->lname = App::Session()->set('lname', $data['lname']);
				  Auth::$udata->name = App::Session()->set('name', $data['fname'] . ' ' . $data['lname']);
				  if (App::Core()->enable_tax) {
					  Auth::$udata->country = App::Session()->set('country', $data['country']);
				  }
			  }
		  } else {
			  Message::msgSingleStatus();
		  }
	  }
	  
      /**
       * Front::Contact()
       * 
       * @return
       */
      public function Contact()
      {

          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->template = 'front/contact.tpl.php';
          $tpl->title = Lang::$word->META_T30;
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
      }

      /**
       * Front::processContact()
       * 
       * @return
       */
      public function processContact()
      {
		  $rules = array(
			  'name' => array('required|string|min_len,3|max_len,60', Lang::$word->CNT_NAME),
			  'notes' => array('required|string|min_len,3|max_len,400', Lang::$word->MESSAGE),
			  'email' => array('required|email', Lang::$word->M_EMAIL),
			  'agree' => array('required|numeric', Lang::$word->PRIVACY),
			  'captcha' => array('required|numeric|exact_len,5', Lang::$word->CAPTCHA),
			  );

		  $filters = array(
			  'subject' => 'trim|string',
			  );

		  if (App::Session()->get('wcaptcha') != $_POST['captcha'])
			  Message::$msgs['captcha'] = Lang::$word->CAPTCHA;
			  
		  $validate = Validator::instance();
		  $safe = $validate->doValidate($_POST, $rules);
		  $safe = $validate->doFilter($_POST, $filters);
		  
          if (empty(Message::$msgs)) {
			  $tpl = Db::run()->first(Content::eTable, array("body", "subject"), array('typeid' => 'contact'));
			  $mailer = Mailer::sendMail();
			  $core = App::Core();

			  $body = str_replace(array(
				  '[LOGO]',
				  '[EMAIL]',
				  '[NAME]',
				  '[MAILSUBJECT]',
				  '[MESSAGE]',
				  '[IP]',
				  '[DATE]',
				  '[COMPANY]',
				  '[FB]',
				  '[TW]',
				  '[SITEURL]'), array(
				  Utility::getLogo(),
				  $safe->email,
				  $safe->name,
				  $safe->subject,
				  $safe->notes,
				  Url::getIP(),
				  date('Y'),
				  $core->company,
				  $core->social->facebook,
				  $core->social->twitter,
				  SITEURL), $tpl->body);
	
			  $msg = (new Swift_Message())
					->setSubject($tpl->subject)
					->setFrom(array($core->site_email => $core->company))
					->setTo(array($core->site_email => $core->company))
					->setReplyTo(array($safe->email => $safe->name))
					->setBody($body, 'text/html'
					);

              if ($mailer->send($msg)) {
				  $json['type'] = 'success';
				  $json['title'] = Lang::$word->SUCCESS;
				  $json['redirect'] = Url::url('/contact');
				  $json['message'] = Lang::$word->CNT_OK;
				  print json_encode($json);
			  } else {
				  $json['type'] = 'error';
				  $json['title'] = Lang::$word->ERROR;
				  $json['message'] = Lang::$word->M_INFO11;
				  print json_encode($json);
			  }
			  
		  } else {
			  Message::msgSingleStatus();
		  }
	  }

      /**
       * Front::Privacy()
       * 
       * @return
       */
      public function Privacy()
      {

          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->template = 'front/privacy.tpl.php';
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
          $tpl->title = Lang::$word->META_T36;
      }

      /**
       * Front::Password()
       * 
	   * @param string $token
       * @return
       */
      public function Password($token)
      {
		  
		  $core = App::Core();
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "front/";
          $tpl->title = Lang::$word->META_T36;
		  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
		  
          if (!$row = Db::run()->first(Users::mTable, null, array("token" => $token))) {
			  $tpl->dir = "front/";
			  $tpl->data = null;
			  $tpl->title = Lang::$word->META_ERROR; 
              $tpl->template = "front/404.tpl.php"; 
              DEBUG ? Debug::AddMessage("errors", '<i>ERROR</i>', "Invalid token detected [front.class.php, ln.:" . __line__ . "] slug [" . $token ."]", "session") : Lang::$word->META_ERROR;
          } else {
			  $tpl->row = $row;
			  $tpl->template = 'front/password.tpl.php';
          }
      }

      /**
       * Front::passwordChange()
       * 
       * @return
       */
      public function passwordChange()
      {
		  
		  $rules = array(
		      'token' => array('required|string|min_len,10|max_len,10', "Invalid Token"),
			  'password' => array('required|string|min_len,6|max_len,20', Lang::$word->NEWPASS),
			  );

		  $filters = array(
			  'token' => 'string',
		  );
			  
		  $validate = Validator::instance();
		  $safe = $validate->doValidate($_POST, $rules);
		  $safe = $validate->doFilter($_POST, $filters);

		  if(!$row = Db::run()->first(Users::mTable, array("id", "type"), array('token' => $safe->token))) {
			  Message::$msgs['token'] = "Invalid Token.";
			  $json['title'] = Lang::$word->ERROR;
			  $json['message'] = "Invalid Token.";
			  $json['type'] = 'error';
		  }
		  
		  if (empty(Message::$msgs)) {
              $salt = '';
			  $hash = App::Auth()->create_hash(Validator::cleanOut($safe->password), $salt);
			  
			  $data = array(
					'hash' => $hash, 
					'salt' => $salt,
					'token' => 0,
			  );
			  
			  Db::run()->update(Users::mTable, $data, array("id" => $row->id));
			  $json['type'] = "success";
			  $json['title'] = Lang::$word->SUCCESS;
			  $json['redirect'] = ($row->type == "member") ? Url::url('') : Url::url('/admin');
			  $json['message'] = Lang::$word->M_PASSUPD_OK2;
			  print json_encode($json);
		  } else {
			  Message::msgSingleStatus();
		  }
	  }
	  
      /**
       * Front::passReset()
       * 
       * @return
       */
      public function passReset()
      {
		  
          $rules = array(
              'email' => array('required|email', Lang::$word->M_EMAIL),
              );

		  
		  $validate = Validator::instance();
		  $safe = $validate->doValidate($_POST, $rules);

		  if(!empty($safe->email)) {
			  $row = Db::run()->first(Users::mTable, array("email", "fname", "lname", "id"), array('email' => $safe->email, "type" => "member", "active" => "y"));
			  if(!$row) {
				  Message::$msgs['email'] = Lang::$word->M_EMAIL_R4;
				  $json['title'] = Lang::$word->ERROR;
				  $json['message'] = Lang::$word->M_EMAIL_R4;
				  $json['type'] = 'error';
			  }
		  }
		  
          if (empty(Message::$msgs)) {
			  $row = Db::run()->first(Users::mTable, array("email", "fname", "lname", "id"), array('email' => $safe->email, "type" => "member", "active" => "y"));
			  $mailer = Mailer::sendMail();
			  $tpl = Db::run()->first(Content::eTable, array("body", "subject"), array('typeid' => 'userPassReset'));
			  $token = substr(md5(uniqid(rand(), true)), 0, 10);
			  
			  $body = str_replace(array(
				  '[LOGO]',
				  '[NAME]',
				  '[DATE]',
				  '[COMPANY]',
				  '[LINK]',
				  '[IP]',
				  '[SITEURL]'), array(
				  Utility::getLogo(),
				  $row->fname . ' ' . $row->lname,
				  date('Y'),
				  App::Core()->company,
				  Url::url('/password', $token),
				  Url::getIP(),
				  SITEURL), $tpl->body);
				  
				  $msg = (new Swift_Message())
						->setSubject($tpl->subject)
						->setTo(array($row->email => $row->fname . ' ' . $row->lname))
						->setFrom(array(App::Core()->site_email => App::Core()->company))
						->setBody($body, 'text/html');
					  
              Db::run()->update(Users::mTable, array("token" => $token), array('id' => $row->id));
			  if($mailer->send($msg)) {
				  $json['type'] = "success";
				  $json['title'] = Lang::$word->SUCCESS;
				  $json['message'] = Lang::$word->M_PASSWORD_RES_D;
				  print json_encode($json);
			  }
		  } else {
			  $json['message'] = Lang::$word->M_EMAIL_R5;
			  $json['title'] = Lang::$word->ERROR;
			  $json['type'] = "error";
			  print json_encode($json);
		  } 
      }
	  
      /**
       * Front::buyMembership()
       * 
       * @return
       */
      public function buyMembership()
      {
		  
		  if($row = Db::run()->first(Membership::mTable, null, array("id" => Filter::$id, "private" => 0))) {
			  $gaterows = Db::run()->select(Admin::gTable, null, array("active" => 1))->results();
			  
			  if ($row->price == 0)  {
				  $data = array(
					  'membership_id' => $row->id,
					  'mem_expire' => Membership::calculateDays($row->id),
					  );
	
				  Db::run()->update(Users::mTable, $data, array("id" => App::Auth()->uid));
				  Auth::$udata->membership_id = App::Session()->set('membership_id', $row->id);
				  Auth::$udata->mem_expire = App::Session()->set('mem_expire', $data['mem_expire']);
				  
				  $json['message'] = Message::msgSingleOk(str_replace("[NAME]", $row->title, Lang::$word->M_INFO12), false);
			  } else {
				  $recurring = ($row->recurring) ? Lang::$word->YES : Lang::$word->NO;
				  Db::run()->delete(Membership::cTable, array("uid" => App::Auth()->uid));
				  $tax = Membership::calculateTax();
				  
				  $data = array(
					  'uid' => App::Auth()->uid,
					  'mid' => $row->id,
					  'originalprice' => $row->price,
					  'tax' => Validator::sanitize($tax, "float"),
					  'totaltax' => Validator::sanitize($row->price * $tax, "float"),
					  'total' => $row->price,
					  'totalprice' => Validator::sanitize($tax * $row->price + $row->price, "float"),
					  );
				  Db::run()->insert(Membership::cTable, $data);
				  $cart = Membership::getCart();
				  
				  $tpl = App::View(BASEPATH . 'view/front/snippets/'); 
				  $tpl->row = $row;
				  $tpl->gateways = $gaterows;
				  $tpl->cart = $cart;
				  $tpl->template = 'loadSummary.tpl.php'; 
				  $json['message'] = $tpl->render();
			  }
		  } else {
			  $json['type'] = "error";
		  }
		  print json_encode($json);
      }
	  
      /**
       * Front::selectGateway()
       * 
       * @return
       */
	  public function selectGateway()
	  {
	
		  if ($cart = Membership::getCart()) {
			  $gateway = Db::run()->first(Admin::gTable, null, array("id" => Filter::$id, "active" => 1));
			  $row = Db::run()->first(Membership::mTable, null, array("id" => $cart->mid));
			  $tpl = App::View(BASEPATH . 'gateways/' . $gateway->dir . '/');
			  $tpl->cart = $cart;
			  $tpl->gateway = $gateway;
			  $tpl->row = $row;
			  $tpl->template = 'form.tpl.php';
			  $json['message'] = $tpl->render();
		  } else {
			  $json['message'] = Message::msgSingleError(Lang::$word->SYSERROR, false);
		  }
		  print json_encode($json);
	  }
	  
      /**
       * Front::getCoupon()
       * 
       * @return
       */
	  public function getCoupon()
	  {
	      $sql = "SELECT * FROM `" . Content::dcTable . "` WHERE FIND_IN_SET(" . Filter::$id . ", membership_id) AND code = ? AND active = ?";
		  if ($row = Db::run()->pdoQuery($sql, array(Validator::sanitize($_POST['code']), 1))->result()) {
			  $row2 = Db::run()->first(Membership::mTable, null, array("id" => Filter::$id));
			  
			  Db::run()->delete(Membership::cTable, array("uid" => App::Auth()->uid));
			  $tax = Membership::calculateTax();
			  
			  if($row->type == "p") {
				  $disc = Validator::sanitize($row2->price / 100 * $row->discount, "float");
				  $gtotal = Validator::sanitize($row2->price - $disc, "float");
			  } else {
				  $disc = Validator::sanitize($row->discount, "float");
				  $gtotal = Validator::sanitize($row2->price - $disc, "float");
			  }

			  $data = array(
				  'uid' => App::Auth()->uid,
				  'mid' => $row2->id,
				  'cid' => $row->id,
				  'tax' => Validator::sanitize($tax, "float"),
				  'totaltax' => Validator::sanitize($gtotal * $tax, "float"),
				  'coupon' => $disc,
				  'total' => $gtotal,
				  'originalprice' => $row2->price,
				  'totalprice' => Validator::sanitize($tax * $gtotal + $gtotal, "float"),
				  );
			  Db::run()->insert(Membership::cTable, $data);
		  
			  $json['type'] = "success";
			  $json['disc'] = "- " . Utility::formatMoney($disc);
			  $json['tax'] = Utility::formatMoney($data['totaltax']);
			  $json['gtotal'] = Utility::formatMoney($data['totalprice']);
		  } else {
			  $json['type'] = "error";
		  }
		  print json_encode($json);
	  }
  }