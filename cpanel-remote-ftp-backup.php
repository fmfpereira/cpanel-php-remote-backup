<?php
/*
 * cPanel Remote FTP Backup
 * For more information about cPanel configurations check
 * https://documentation.cpanel.net/display/SDK/cPanel+API+1+Functions+-+Fileman%3A%3Afullbackup
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/settings.php';

/*
 * Check for xmlapi-php exceptions.
 */
try {
    $xmlapi = new xmlapi($settings["cpanel_host"]);
    $xmlapi->password_auth($settings["cpanel_username"], $settings["cpanel_password"]);
    $xmlapi->set_port($settings["cpanel_port"]);
    $xmlapi->set_output('json');
    $xmlapi_args = array(
        $settings["ftp_mode"],
        $settings["ftp_host"],
        $settings["ftp_username"],
        $settings["ftp_password"],
        $settings["cpanel_notification_email"],
        $settings["ftp_port"],
        $settings["ftp_path"]
    );
    $xmlapi_response = $xmlapi->api1_query($settings["cpanel_username"], 'Fileman', 'fullbackup', $xmlapi_args);
    $response = json_decode($xmlapi_response, true);
    /*
     * Check if cPanel sent a response result.
     */
    if (!isset($response["data"]["result"])) {
        throw new Exception("Unable to parse response from cPanel host");
    }
    /*
     * If response returns error.
     */
    if (!empty($response["error"])) {
        throw new Exception($response["error"]);
    }
    /*
     * If response result is empty everything worked as expected, else throw error message exception.
     */
    if (!empty($response["data"]["result"])) {
        throw new Exception($response["data"]["result"]);
    }

} catch (Exception $ex) {
    /*
     * Exit with exception error.
     */
    exit(sprintf("Error: %s\n", htmlspecialchars_decode($ex->getMessage(), ENT_QUOTES)));
}
