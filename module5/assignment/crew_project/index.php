<?php
/**
 * Main Entry Point for the CREW Application Project
 *
 * This script acts as the main entry point for the web application. It includes
 * Sets up configuration files, libraries, error handling, environment, timezone
 * and session. Http request will be accept and render this in the page.
 *
 * @author      Md. Chanchal Biswas
 * @link        https://chanchal.net
 * @since       Version 1.0.0
 * @filesource  https://github.com/net-chanchal/ostad/tree/main/module5
 *
 * @license     MIT License
 * @category    Application Bootstrap
 */

// Need minimum PHP version
$requiredVersion = "8.0.0";

// Check PHP version
if (version_compare(PHP_VERSION, $requiredVersion, '<')) {
    die("Your PHP version is not compatible. Please upgrade to PHP ^$requiredVersion");
}
unset($requiredVersion);

// Include configuration files
include "includes/config.php";
include "includes/functions.php";

// Include library files
include "libs/template/autoload.php";
include "libs/database/autoload.php";
include "libs/session/autoload.php";

// The errors will be reported in the log file
error_reporting(E_ALL);
ini_set("log_errors", 1);
ini_set("error_log", LOG_DIRECTORY . "error_log.log");

// Environment setup as display errors
if (ENVIRONMENT === "Development") {
    ini_set("display_errors", 1);
} else if (ENVIRONMENT === "Production") {
    ini_set("display_errors", 0);
}

// Set time zone ID
date_default_timezone_set(TIME_ZONE_ID);

// Session configuration initialization
Session::init(SESSION_CONFIGURATION);

/**
 * User request handle
 */
function handleHttpRequest(): void
{
    // Http request page
    $requestPath = isset($_SERVER["PATH_INFO"]) ? ltrim($_SERVER["PATH_INFO"], "/") . ".php" : DEFAULT_PAGE;
    $requestPath = ALLOWED_URI_DASHES === true ? str_replace("-", "_", $requestPath) : $requestPath;

    // Include the file if exist request path
    if (file_exists(PAGE_DIRECTORY . $requestPath)) {
        require PAGE_DIRECTORY . "$requestPath";
    } else {
        http_response_code(404);
        require PAGE_DIRECTORY . "404.php";
    }
}

handleHttpRequest();

