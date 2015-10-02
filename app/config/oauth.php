<?php
return array(
 "base_url" => "http://localhost:8070/oauth/auth",
 "providers" => array (
 		"OpenID" => array ("enabled" => true),
 		"Facebook" => array (
 			"enabled" => TRUE,
			 "keys" => array (
			 		"id" => "941520272544256",
			 		 "secret"=> "63adb423ec471cbe2e55233cec52e387"),
					 "scope" => "email",
 						),
		 "Twitter" => array (
 			"enabled" => true,
 			"keys" => array ("key" => "CONSUMER_KEY",
 			"secret" => "CONSUMER_SECRET")
 						),
		 "LinkedIn" => array (
			 "enabled" => true,
			 "keys" => array ("key" => "APP_KEY", "secret" => "APP_SECRET")
 				)
 				)
			);