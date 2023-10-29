<?php

/**
 * Class Template
 */
class Template
{
    /**
     * @var array
     */
    private static array $sections;

    /**
     * @var array
     */
    private static array $files;

    /**
     * @var string
     */
    private static string $name;

    /**
     * @param $source
     */
    public static function extend($source): void
    {
        self::$files[] = $source;
    }

    /**
     * @param $name
     * @param null $value
     */
    public static function section($name, $value = null): void
    {
        ob_start();
        self::$name = $name;

        if ($value) {
            self::$sections[$name] = $value;
            ob_end_clean();
        }
    }

    /**
     *
     */
    public static function endSection(): void
    {
        self::$sections[self::$name] = ob_get_contents();
        ob_end_clean();
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function yield($name): mixed
    {
        return self::$sections[$name] ?? "";
    }

    /**
     *
     */
    public static function execute(): void
    {
        foreach (self::$files as $file) {
            include ROOT_DIRECTORY . "$file";
        }
    }
}

