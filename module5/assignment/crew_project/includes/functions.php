<?php
defined("APPLICATION_NAME") or die("Direct script access is not allowed.");

/**
 * @param string|null $uri
 * @return string
 */
function baseUrl(string $uri = null): string
{
    return APPLICATION_URL . $uri;
}

/**
 * @param string $name
 * @return mixed
 */
function inputPost(string $name): mixed
{
    $value = $_POST[$name] ?? "";
    return is_string($value) ? trim($value) : $value;
}

/**
 * @param string $name
 * @return mixed
 */
function inputGet(string $name): mixed
{
    $value = $_GET[$name] ?? "";
    return is_string($value) ? trim($value) : $value;
}

function passwordHash($data): string
{
    return md5($data);
}

/**
 * @param string $url
 */
function redirect(string $url): void
{
    header("Location: $url");
    exit;
}

/**
 * @param array|string $uri
 * @return string
 */
function activeMenu(array|string $uri): string
{
    $requestUri = ltrim($_SERVER["PATH_INFO"] ?? "", "/");
    if (is_string($uri)) {
        return $requestUri === $uri ? "active" : "";
    } else {
        return in_array($requestUri, $uri) ? "active" : "";
    }
}

/**
 * @param string $message
 * @return string
 */
function success(string $message): string
{
    return <<<MESSAGE
        <div class="alert alert-success alert-dismissible fade show text-left" role="alert">
            $message
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    MESSAGE;
}

/**
 * @param string $message
 * @return string
 */
function error(string $message): string
{
    return <<<MESSAGE
         <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
            $message
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    MESSAGE;
}
