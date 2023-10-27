<?php

/**
 * Class Session
 */
class Session
{
    /**
     * Initialize the session with custom options.
     *
     * @param array $options
     */
    public static function init(array $options = []): void
    {
        if (isset($options["save_path"])) {
            session_save_path($options["save_path"]);
        }

        if (isset($options["name"])) {
            session_name($options["name"]);
        }

        if (isset($options["cookie_params"])) {
            session_set_cookie_params(
                $options["cookie_params"]["lifetime"],
                $options["cookie_params"]["path"],
                $options["cookie_params"]["domain"],
                $options["cookie_params"]["secure"],
                $options["cookie_params"]["httponly"]
            );
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Set a session variable.
     *
     * @param string $key
     * @param mixed $value
     */
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get the value of a session variable.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Check if a session variable exists.
     *
     * @param string $key
     * @return bool
     */
    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }


    /**
     * Flash a message to the session.
     *
     * @param string $key
     * @param mixed $value
     */
    public static function flash(string $key, mixed $value): void
    {
        // Store the value in the session for the next request
        $_SESSION[$key] = $value;
    }

    /**
     * Get a flashed message and remove it from the session.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function getFlash(string $key, mixed $default = null): mixed
    {
        // Check if the key exists in the session
        if (self::has($key)) {
            // Get the value
            $value = self::get($key);

            // Remove it from the session
            self::remove($key);

            return $value;
        }

        // If the key is not found, return the default value
        return $default;
    }

    /**
     * Remove a session variable.
     *
     * @param string $key
     */
    public static function remove(string $key): void
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Destroy the session and all session data.
     */
    public static function destroy(): void
    {
        session_unset();
        session_destroy();
    }
}
