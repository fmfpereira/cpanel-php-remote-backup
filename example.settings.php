<?php
/*
 * cPanel Remote FTP Backup configuration file
 * For more information about cPanel configurations check
 * https://documentation.cpanel.net/display/SDK/cPanel+API+1+Functions+-+Fileman%3A%3Afullbackup
 */
$settings = array();

/*
 * cPanel hostname or ip
 */
$settings["cpanel_host"] = "";

/*
 * cPanel username
 */
$settings["cpanel_username"] = "";

/*
 * cPanel password
 */
$settings["cpanel_password"] = "";

/*
 * cPanel notification email
 * Leave empty if you don't want to receive cPanel backup notification
 */
$settings["cpanel_notification_email"] = "";

/*
 * cPanel notification port
 * Defaults to 2083
 */
$settings["cpanel_port"] = "2083";

/*
 * remote backup mode
 * available modes
 *   ftp (default)
 *   passiveftp
 *   scp
 */
$settings["ftp_mode"] = "ftp";

/*
 * remote FTP hostname or ip
 */
$settings["ftp_host"] = "";

/*
 * remote FTP username
 */
$settings["ftp_username"] = "";

/*
 * remote FTP password
 */
$settings["ftp_password"] = "";

/*
 * remote FTP port
 * Defaults to 21
 */
$settings["ftp_port"] = "21";

/*
 * remote FTP path
 * Defaults to /
 */
$settings["ftp_path"] = "/";
