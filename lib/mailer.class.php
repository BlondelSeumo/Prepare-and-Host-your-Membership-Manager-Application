<?php
  /**
   * Mailer Class
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2020
   * @version $Id: mailer.class.php, v1.00 2020-03-05 10:12:05 gewa Exp $
   */
  
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');

  class Mailer
  {
	  
	  private static $instance;

      /**
       * Mailer::__construct()
       * 
       * @return
       */
      private function __construct(){}

      /**
       * Mailer::instance()
       * 
       * @return
       */
	  public static function instance(){
		  if (!self::$instance){ 
			  self::$instance = new Mailer(); 
		  } 
	  
		  return self::$instance;  
	  }

      /**
       * Mailer::sendMail()
       * 
       * @return
       */
      public static function sendMail()
      {
          require_once (BASEPATH . 'lib/swift/vendor/autoload.php');
          
		  $core = App::Core();
          if ($core->mailer == "SMTP") {
			  $SSL = ($core->is_ssl) ? 'ssl' : 'tsl';
			  $transport = (new Swift_SmtpTransport($core->smtp_host, $core->smtp_port, $SSL))
				->setUsername($core->smtp_user)
				->setPassword($core->smtp_pass);
          } else {
			  $transport = new Swift_SendmailTransport($core->sendmail);
		  }
          
          return new Swift_Mailer($transport);
	  }
  }