<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */

define('ASS', "assets/");
define('ADMINASSETS', "assets/backend/");
define('WEBASSETS', "assets/frontend/");
define('FAVICONPATH', "assets/favicon/");
define('IMAGEPATH', "uploads/images/");
define('THUMBPATH', "uploads/thumbs/");
define('FILESPATHS', "uploads/thumbs/");
define('VER', 8);
define('FIREBASETOKEN', 'AAAAYtkF8XM:APA91bGgQXUUUYP7bGUEmSiOnYwRTOTCO2-YKLE9p0zdyJWpL2AqoEPCYCCH-1CXS6UJltTUMCOp5l0Zq9nYsuuUE5f9Z6XCxCUPsiDlglDJRaOiC_eGBW6xCiSz4CC4vw0YOYwk-2qS');
define('LOCAL_LANG', 'en');
define('COMMISSIONS_ORDERS', 0.01 );
define('COMMISSIONS_APP', 0.25 );

/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */
define('QUALIFICATIONKEY', 1);
define('EXPERYEAR', 2);
define('NUMBEREMPLOYEES', 3);
define('TYPEWORK', 4);

/**
 *  ============================================================
 *
 *  ------------------------------------------------------------
 *
 *  ============================================================
 */

define('USERIMAGE', 'DE.png');
define('COMPANEIMAGE', 'DE.png');
define('HLOGO', 'h_logo.png');
define('WLOGO', 'w_logo.png');
define('JOBIMAGE', 'job.png');




/**
 *  ============================================================
 *
 *  ------------------------  notification_type    -------------
 *
 *  ============================================================
 */
define('LIMIT_PROVIDERS', 20);


define('ORDER_WAT_PAY', -1); // PENDING
define('ORDER_START', 0); // PENDING
define('ORDER_BLOCKED', 1);
define('ORDER_ACCEPT', 2); // ACCEPT
define('ORDER_END', 3); // PROVIDER END
define('ORDER_END_ALL', 4); // CLIENT END
define('ORDER_CANCEL', 5); // CLIENT CANCEL
define('ORDER_DELETE', 6); // PROVIDER CANCEL


define('ACTION_NOTHING', 0);
define('ACTION_ACCEPT_REFUSE', 1);
define('ACTION_RATE_PROVIDER', 2);


define('ADMIN_USER', 1);
define('ADMIN_PROVIDER', 2);
define('ADMIN_ADMIN', 3);

/*
define('ADMIN_ALL_USER', 4);
define('ADMIN_ALL_PROVIDER',5 );
define('ADMIN_ALL_REGIST', 6);
define('ADMIN_ALL_ADMIN', 7);
*/


define('USER_USER', 8);
define('USER_PROVIDER', 9);
define('USER_ADMIN', 10);

/*
define('USER_ALL_USER', 11);
define('USER_ALL_PROVIDER', 12);
define('USER_ALL_REGIST', 13);
define('USER_ALL_ADMIN', 14);
*/


define('PROVIDER_USER', 15);
define('PROVIDER_PROVIDER', 16);
define('PROVIDER_ADMIN', 17);

/*
define('PROVIDER_ALL_USER', 18);
define('PROVIDER_ALL_PROVIDER', 19);
define('PROVIDER_ALL_REGIST', 20);
define('PROVIDER_ALL_ADMIN', 21);
*/

/**
 *  ============================================================
 *
 *  ------------------------  notification_msg_id    ----------
 *
 *  ============================================================
 */

define('NEW_ORDER', 1);
define('RATE_PROVIDER', 2);
define('HAVE_RATING', 3);



/**
 *  ============================================================
 *
 *  ------------------------  logos    -------------
 *
 *  ============================================================
 */

define('LOGO_HOME_AR', 'assets/favicon/logo-1.png'); // logo-2.png
define('LOGO_HOME_CARE_AR', 'assets/favicon/logo-3.png');
define('LOGO_TECNOLOGY_AR', 'assets/favicon/logo-1.png');
define('LOGO_HOME_EN', 'assets/favicon/logo-4.png'); // logo-6.png
define('LOGO_HOME_CARE_EN', 'assets/favicon/logo-5.png');
define('LOGO_TECNOLOGY_EN', 'assets/favicon/logo-4.png');
