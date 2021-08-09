<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */
$cms = "phpfox-neutron";
$dbms = "mysql";
define('SET_SESSION_NAME','ID');			// Session name
define('SWITCH_ENABLED','1');
define('INCLUDE_JQUERY','1');
define('FORCE_MAGIC_QUOTES','0');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($dbms == "mssql" && file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR.'sqlsrv_func.php')){
	include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'sqlsrv_func.php');
}

/* DATABASE */
define('PHPFOX', true);
define('PHPFOX_DS', DIRECTORY_SEPARATOR);
define('PHPFOX_DIR', dirname(dirname(__FILE__)) . PHPFOX_DS);
define('PHPFOX_NO_SESSION', false);



// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW
// DO NOT EDIT DATABASE VALUES BELOW

define('DB_USERTABLE_USERID','id');
define('DB_USERTABLE_NAME','f_name');
define('DB_USERTABLE','users');
define('DB_SERVER','localhost');
define('TABLE_PREFIX','');
define('DB_PORT',"3306"					);
define('DB_USERNAME','root');
define('DB_PASSWORD',"");
define('DB_NAME',"bandharphirus");
define('DB_LINKFIELD','users.id');
define('DB_AVATARFIELD','image');
define('DB_AVATARTABLE','users');
$table_prefix = $_CONF['db']['prefix'];                                 // Table prefix(if any)
$db_usertable = 'users';                            // Users or members information table name
$db_usertable_userid = 'id';                        // UserID field in the users or members table
$db_usertable_name = 'f_name';                    // Name containing field in the users or members table
$db_avatartable = ' ';
$db_avatarfield = " ".$table_prefix.$db_usertable.".image ";
$db_linkfield = ' '.$table_prefix.$db_usertable.'.id ';

/*COMETCHAT'S INTEGRATION CLASS USED FOR SITE AUTHENTICATION */

class Integration{

    function __construct(){
        if(!defined('TABLE_PREFIX')){
            $this->defineFromGlobal('table_prefix');
            $this->defineFromGlobal('db_usertable');
            $this->defineFromGlobal('db_usertable_userid');
            $this->defineFromGlobal('db_usertable_name');
            $this->defineFromGlobal('db_avatartable');
            $this->defineFromGlobal('db_avatarfield');
            $this->defineFromGlobal('db_linkfield');
        }
    }

    function defineFromGlobal($key){
        if(isset($GLOBALS[$key])){
            define(strtoupper($key), $GLOBALS[$key]);
            unset($GLOBALS[$key]);
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* FUNCTIONS */

	function getUserID() {
		global $_CONF;
		$userid = 0;
		$userid = $_SESSION["ID"];
		$userid = intval($userid);
		return $userid;
	}

	function chatLogin($userName,$userPass) {
		$userid = 0;
		global $guestsMode;

		if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {
			$sql = ("SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE email = '".sql_real_escape_string($userName)."'");
		} else {
			$sql = ("SELECT * FROM ".TABLE_PREFIX.DB_USERTABLE." WHERE user_name = '".sql_real_escape_string($userName)."'");
		}
		$result = sql_query($sql, array(), 1);
		$row = sql_fetch_assoc($result);
		if($row['password'] == md5(md5($userPass).md5($row['password_salt']))) {
			$userid = $row['user_id'];
		}
		if(!empty($userName) && !empty($_REQUEST['social_details'])) {
			$social_details = json_decode($_REQUEST['social_details']);
			$userid = socialLogin($social_details);
		}
		if(!empty($_REQUEST['guest_login']) && $userPass == "CC^CONTROL_GUEST" && $guestsMode == 1){
			$userid = getGuestID($userName);
		}
		if(!empty($userid) && isset($_REQUEST['callbackfn']) && $_REQUEST['callbackfn'] == 'mobileapp'){
			$sql = ("insert into cometchat_status (userid,isdevice) values ('".sql_real_escape_string($userid)."','1') on duplicate key update isdevice = '1'");
                sql_query($sql, array(), 1);
		}
		if($userid && function_exists('mcrypt_encrypt') && defined('ENCRYPT_USERID') && ENCRYPT_USERID == '1'){
			$key = "";
				if( defined('KEY_A') && defined('KEY_B') && defined('KEY_C') ){
					$key = KEY_A.KEY_B.KEY_C;
				}
			$userid = rawurlencode(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $userid, MCRYPT_MODE_CBC, md5(md5($key)))));
		}

		return $userid;
	}

	function getFriendsList($userid,$time) {
		global $hideOffline;
		$offlinecondition = '';
		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username,  ".DB_AVATARFIELD." avatar from users");

		return $sql;
	}

	function getFriendsIds($userid) {
		$sql = ("select ".TABLE_PREFIX."friend.friend_user_id friendid from ".TABLE_PREFIX."friend where ".TABLE_PREFIX."friend.user_id = '".sql_real_escape_string($userid)."' union (select ".TABLE_PREFIX."friend.user_id friendid from ".TABLE_PREFIX."friend where ".TABLE_PREFIX."friend.friend_user_id = '".sql_real_escape_string($userid)."')");

		return $sql;
	}

	function getUserDetails($userid) {
		$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".DB_LINKFIELD." link, ".DB_AVATARFIELD." avatar, cometchat_status.lastactivity lastactivity, cometchat_status.lastseen lastseen, cometchat_status.lastseensetting lastseensetting, cometchat_status.status, cometchat_status.message message, cometchat_status.isdevice, cometchat_status.readreceiptsetting readreceiptsetting from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".sql_real_escape_string($userid)."' and ".TABLE_PREFIX.DB_USERTABLE.".profile_page_id = '0'");

		return $sql;
	}

	function getActivechatboxdetails($userids) {
		$sql = ("select DISTINCT ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".DB_LINKFIELD." link, ".DB_AVATARFIELD." avatar, cometchat_status.lastactivity lastactivity, cometchat_status.lastseen lastseen, cometchat_status.lastseensetting lastseensetting, cometchat_status.status, cometchat_status.message, cometchat_status.isdevice, cometchat_status.readreceiptsetting readreceiptsetting from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid ".DB_AVATARTABLE." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." IN (".$userids.")");

		return $sql;
	}

	function getUserStatus($userid) {
		 $sql = ("select cometchat_status.message, cometchat_status.lastseen lastseen, cometchat_status.lastseensetting lastseensetting, cometchat_status.status from cometchat_status where userid = '".sql_real_escape_string($userid)."'");
		 return $sql;
	}

	function fetchLink($link) {
		$cc_url = (defined('CC_SITE_URL') ? CC_SITE_URL : BASE_URL);
		if(PHPFOX_VER == '1'){
			return $cc_url.'../../index.php?do=/'.$link.'/';
		}else{
			return $cc_url.'../../../../index.php?do=/'.$link.'/';
		}
	}

	function getAvatar($image) {
		$cc_url = (defined('CC_SITE_URL') ? CC_SITE_URL : BASE_URL);
		$image_50 = str_replace('%s','_50',$image);
		if(is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'file'.DIRECTORY_SEPARATOR.'pic'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$image_50)) {
			return $cc_url.'../file/pic/user/'.$image_50;
		} elseif(is_file(dirname(dirname(dirname(dirname(dirname(__FILE__))))).DIRECTORY_SEPARATOR.'PF.Base'.DIRECTORY_SEPARATOR.'file'.DIRECTORY_SEPARATOR.'pic'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$image_50)) {
			return $cc_url.'../../../../index.php/file/pic/user/'.$image_50;
		}else{
			$image_50sq = str_replace('%s','_50_square',$image);
			if (is_file(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'file'.DIRECTORY_SEPARATOR.'pic'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$image_50sq)) {
				return $cc_url.'../file/pic/user/'.$image_50sq;
			}elseif(is_file(dirname(dirname(dirname(dirname(dirname(__FILE__))))).DIRECTORY_SEPARATOR.'PF.Base'.DIRECTORY_SEPARATOR.'file'.DIRECTORY_SEPARATOR.'pic'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$image_50sq)) {
				return $cc_url.'../../../../index.php/file/pic/user/'.$image_50sq;
			} else {
				return BASE_URL.'images/noavatar.png';
			}
		}
	}

	function getTimeStamp() {
		return time();
	}

	function processTime($time) {
		return $time;
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/* HOOKS */

		function hooks_message($userid,$to,$unsanitizedmessage,$dir,$origmessage='') {
		if($userid < 10000000 && $to < 10000000) {
			if($dir == 2){
				return;
			}
			$userid = sql_real_escape_string($userid);
			$to = sql_real_escape_string($to);
			$decoded_cc_message = decode_controlmessage($unsanitizedmessage);
			if(!empty($decoded_cc_message)){
				if($decoded_cc_message['name'] == 'stickers'){
					$unsanitizedmessage = 'has sent a sticker';
				}else{
					$unsanitizedmessage = '';
				}
			}
			if(strpos($unsanitizedmessage, 'class="imagemessage ') !== FALSE){
				$unsanitizedmessage = "Has sent a file.";
			}
			if(strpos($unsanitizedmessage,'cometchat_smiley')!==false){
				preg_match_all('/<img[^>]+\>/i',$unsanitizedmessage,$matches);
				for($i=0;$i<sizeof($matches[0]);$i++){
					$msgpart = (explode('/images/smileys/',$matches[0][$i]));
					$imagenamearr = explode('"',$msgpart[1]);
					$imagename = $imagenamearr[0];
					$smileynamearr = explode('.',$imagename);
					$smileyname = $smileynamearr[0];
					if(!empty($smileyname)){
						$unsanitizedmessage = str_replace($matches[0][$i],':'.$smileyname.':',$unsanitizedmessage);
					}
				}
			}

			$unsanitizedmessage = strip_tags($unsanitizedmessage);
			$unsanitizedmessage = iconv('UTF-8', 'ISO-8859-1', $unsanitizedmessage);
			if(!empty($unsanitizedmessage)){
				$time = time();
				$hash_id = md5(implode('', array( $userid,$to)));
				$sql = ("select `value_actual` from `".TABLE_PREFIX."setting` where var_name = 'inbox_sync' and phrase_var_name='inbox_sync'");
				$query = sql_query($sql, array(), 1);
				$is_active = sql_fetch_assoc($query);
				if($is_active['value_actual'] == 1) {
					$sql = ("select a.thread_id from `".TABLE_PREFIX."mail_thread_user` as a left join `".TABLE_PREFIX."mail_thread_user` as b on a.thread_id = b.thread_id where a.user_id = '$userid' and b.user_id = '$to'");
					$query = sql_query($sql, array(), 1);
					$thread_id = sql_fetch_assoc($query);

					if(empty($thread_id['thread_id'])) {
						$sql = ("insert into `".TABLE_PREFIX."mail_thread`(`hash_id`, `time_stamp`) values ('".$hash_id."','".$time."')");
						$query = sql_query($sql, array(), 1);
						$tablename = TABLE_PREFIX.'mail_thread';
						$thread_id = sql_insert_id($tablename);

						sql_query("insert into `".TABLE_PREFIX."mail_thread_user`(`thread_id`, `user_id`, `is_read`, `is_archive`, `is_sent`, `is_sent_update`) values ('$thread_id','".$userid."',1,0,1,1)", array(), 1);
						sql_query("insert into `".TABLE_PREFIX."mail_thread_user`(`thread_id`, `user_id`, `is_read`, `is_archive`, `is_sent`, `is_sent_update`) values ('$thread_id','".$to."',1,0,0,0)", array(), 1);

						/*insert messages*/
						$sql = ("insert into `".TABLE_PREFIX."mail_thread_text` (`thread_id`, `user_id`, `text`, `time_stamp`, `total_attachment`, `is_mobile`, `has_forward`) values ('".$thread_id."', '$userid', '$unsanitizedmessage', '$time', '0', '0', '0')");
						$query = sql_query($sql, array(), 1);

						/*Update Last ID*/
						$sql = ("select `message_id` from `".TABLE_PREFIX."mail_thread_text` where  (`user_id` = '$userid' OR `user_id` = '$to') and `thread_id`= '$thread_id' order by message_id DESC LIMIT 1");
						$query = sql_query($sql, array(), 1);
						$last_id = sql_fetch_assoc($query);
						sql_query("update `".TABLE_PREFIX."mail_thread` set `last_id`='$last_id[0]' where `thread_id` =  '".$thread_id."'", array(), 1);
					}else {
						$sql = ("insert into `".TABLE_PREFIX."mail_thread_text` (`thread_id`, `user_id`, `text`, `time_stamp`, `total_attachment`, `is_mobile`, `has_forward`) values ('".$thread_id[0]."', '$userid', '$unsanitizedmessage', '$time', '0', '0', '0')");
						$query = sql_query($sql, array(), 1);

						$sql = ("select `message_id` from `".TABLE_PREFIX."mail_thread_text` where (`user_id` = '$userid' OR `user_id` = '$to') and `thread_id`= '$thread_id[0]' order by message_id DESC LIMIT 1");
						$query = sql_query($sql, array(), 1);

						$last_id = sql_fetch_assoc($query);
						sql_query("update `".TABLE_PREFIX."mail_thread` set `last_id`='$last_id[0]' where `thread_id` =  '".$thread_id[0]."'", array(), 1);
						sql_query("update `".TABLE_PREFIX."mail_thread_user` set `is_sent_update` = 0 where `thread_id` = '$thread_id[0]'", array(), 1);
					}
				}
			}
		}
	}

	function hooks_forcefriends() {

	}

	function hooks_updateLastActivity($userid) {

	}

	function hooks_statusupdate($userid,$statusmessage) {

	}

	function hooks_activityupdate($userid,$status) {

	}

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* Nulled by DarkGoth - Nullcamp.com 2018 */

$p_ = 4;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
