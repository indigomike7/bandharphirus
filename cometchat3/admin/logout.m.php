<?php

/*

CometChat
Copyright (c) 2016 Inscripts
Nuller-Team : DarkGoth 2019 (nullcamp)

*/

if (!defined('CCADMIN')) { echo "NO DICE"; exit; }


function index() {
	session_destroy();
	header("Location: ".ADMIN_URL."\r\n");
	exit;
}
