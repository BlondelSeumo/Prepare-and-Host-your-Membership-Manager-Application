<?php
  /**
   * Index
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.php, v1.00 2016-06-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);

  include ('init.php');
  $router = new Router();
  $tpl = App::View(BASEPATH . 'view/');
  $core = App::Core();
  
  //admin routes
  $router->mount('/admin', function() use ($router, $tpl) {
      //admin login
	  $router->match('GET|POST', '/login', function () use ($tpl)
	  {
		  if (App::Auth()->is_Admin()) {
			  Url::redirect(SITEURL . '/admin/'); 
			  exit; 
		  }
		  
		  $tpl->template = 'admin/login.tpl.php'; 
		  $tpl->title = Lang::$word->LOGIN; 
	  });
	  
	  //admin index
	  $router->get('/', 'Admin@Index');
	  
	  //admin users
	  $router->mount('/users', function() use ($router, $tpl) {
		  $router->match('GET|POST', '/', 'Users@Index');
		  $router->match('GET|POST', '/grid', 'Users@Index');
		  $router->get('/history/(\d+)', 'Users@History');
		  $router->get('/edit/(\d+)', 'Users@Edit');
		  $router->get('/new', 'Users@Save');
	  });
	  
	  //admin memberships
	  $router->mount('/memberships', function() use ($router, $tpl) {
		  $router->match('GET', '/', 'Membership@Index');
		  $router->get('/history/(\d+)', 'Membership@History');
		  $router->get('/edit/(\d+)', 'Membership@Edit');
		  $router->get('/new', 'Membership@Save');
	  });

	  //admin email templates
	  $router->mount('/templates', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Templates');
		  $router->get('/edit/(\d+)', 'Content@TemplateEdit');
	  });

	  //admin countries
	  $router->mount('/countries', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Countries');
		  $router->get('/edit/(\d+)', 'Content@CountryEdit');
	  });

	  //admin coupons
	  $router->mount('/coupons', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Coupons');
		  $router->get('/edit/(\d+)', 'Content@CouponEdit');
		  $router->get('/new', 'Content@CouponSave');
	  });

	  //admin pages
	  $router->mount('/pages', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Pages');
		  $router->get('/edit/(\d+)', 'Content@PageEdit');
		  $router->get('/new', 'Content@PageSave');
	  });
	  
	  //admin custom fields
	  $router->mount('/fields', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Fields');
		  $router->get('/edit/(\d+)', 'Content@FieldEdit');
		  $router->get('/new', 'Content@FieldSave');
	  });

	  //admin news
	  $router->mount('/news', function() use ($router, $tpl) {
		  $router->get('/', 'Content@News');
		  $router->get('/edit/(\d+)', 'Content@NewsEdit');
		  $router->get('/new', 'Content@NewsSave');
	  });

	  //admin account
	  $router->mount('/myaccount', function() use ($router, $tpl) {
		  $router->get('/', 'Admin@Account');
		  $router->get('/password', 'Admin@Password');
	  });

	  //admin gateways
	  $router->mount('/gateways', function() use ($router, $tpl) {
		  $router->get('/', 'Admin@Gateways');
		  $router->get('/edit/(\d+)', 'Admin@GatewayEdit');
	  });

	  //admin permissions
	  $router->mount('/permissions', function() use ($router, $tpl) {
		  $router->get('/', 'Admin@Permissions');
		  $router->get('/privileges/(\d+)', 'Admin@Privileges');
	  });
	  
	  //admin maintenance manager
	  $router->get('/maintenance', 'Admin@Maintenance');
	  
	  //admin backup
	  $router->get('/backup', 'Admin@Backup');

	  //admin files
	  $router->get('/files', 'Admin@Files');
	  
	  //admin newsletter
	  $router->get('/mailer', 'Admin@Mailer');

	  //admin system
	  $router->get('/system', 'Admin@System');

	  //admin transactions
	  $router->match('GET|POST', '/transactions', 'Admin@Transactions');

	  //admin configuration
	  $router->get('/configuration', 'Admin@Configuration');
	  
	  //admin help
	  $router->get('/help', 'Admin@Help');

	  //admin trash
	  $router->get('/trash', 'Admin@Trash');
	  
	  //admin language manager
	  $router->get('/language', 'Lang@Index');
	  
	  //logout
	  $router->get('/logout', function()
	  {
		  App::Auth()->logout();
		  Url::redirect(SITEURL . '/admin/');
	  });
  });
  
  //front end routes
  $router->match('GET|POST', '/', 'Front@Index');
  if(App::Core()->reg_allowed) {
	  $router->match('GET|POST', '/register', 'Front@Register');
  }
  
  $router->get('/contact', 'Front@Contact');
  $router->get('/activation', 'Front@Activation');
  $router->get('/packages', 'Front@Packages');
  $router->get('/news', 'Front@News');
  $router->get('/validate', 'Front@Validate');
  $router->get('/privacy', 'Front@Privacy');
  $router->match('GET|POST', '/password/([a-z0-9_-]+)', 'Front@Password');
  
  $router->match('GET|POST', '/page/([a-z0-9_-]+)', 'Front@Page');

  $router->mount('/dashboard', function() use ($router, $tpl) {
	  $router->match('GET|POST', '/', 'Front@Dashboard');
	  $router->get('/history', 'Front@History');
	  $router->get('/profile', 'Front@Profile');
	  $router->get('/downloads', 'Front@Downloads');
  });

  //Custom Routes add here
  $router->get('/logout', function()
  {
	  App::Auth()->logout();
	  Url::redirect(SITEURL . '/');
  });

  //404
  $router->set404(function () use($core, $router)
  {
      $tpl = App::View(BASEPATH . 'view/'); 
	  $tpl->dir = $router->segments[0] == "admin" ? 'admin/' : 'front/';
	  $tpl->core = $core;
	  $tpl->segments = $router->segments;
	  $tpl->template = $router->segments[0] == "admin" ? 'admin/404.tpl.php' : 'front/404.tpl.php'; 
	  $tpl->title = Lang::$word->META_ERROR; 
	  $tpl->keywords = null;
	  $tpl->description = null;
	  $tpl->pages = Db::run()->select(Content::pTable, array("title", "slug"), array("active" => 1))->results();
	  echo $tpl->render(); 
  });

  // Run router
  $router->run(function () use($tpl, $router)
  {
	  $tpl->segments = $router->segments;
	  $tpl->core = App::Core();
      echo $tpl->render(); 
  });
 