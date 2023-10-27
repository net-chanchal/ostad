<?php
/**
 * config.php
 * Application all configurations
 */

// The application title
define("APPLICATION_NAME", "CREW PROJECT");

// The base URL of the application
define("APPLICATION_URL", "http://localhost:8080/");

// The root directory of the application
define("ROOT_DIRECTORY", dirname(__DIR__) . DIRECTORY_SEPARATOR);

// The directory for application log files
define("LOG_DIRECTORY", dirname(__DIR__) . "/storage/logs/");

// The directory for application cache files (used for sessions and cookies)
define("CACHE_DIRECTORY", dirname(__DIR__) . "/storage/cache/");

// The directory for application data storage
define("DATA_DIRECTORY", dirname(__DIR__) . "/storage/data/");

// The directory for application pages
define("PAGE_DIRECTORY", dirname(__DIR__) . "/pages/");

// Accept URI dashes if true
define("ALLOWED_URI_DASHES", true);

// Default page for the application
define("DEFAULT_PAGE", "index.php");

// Time Zone
define("TIME_ZONE_ID", "Asia/Dhaka");

// Session configuration and every key is optional
define("SESSION_CONFIGURATION", [
    "save_path" => CACHE_DIRECTORY,
    "name" => "CREW_SESSION",
    "cookie_params" => [
        "lifetime" => 3600,
        "path" => "/",
        "domain" => "localhost",
        "secure" => true,
        "httponly" => true,
    ],
]);

// Development Environment
define("ENVIRONMENT", "Development"); # Production or Development
