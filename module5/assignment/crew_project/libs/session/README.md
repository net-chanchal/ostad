# Session Library



```php
// Include Library
require "autoload.php";
```


### Session Option Initialization
Session configuration is optional and each parameter is also optional.

```text
Session::init([array]);
```

```php
// Example
const config = [
    "save_path" => CACHE_DIRECTORY,
    "name" => "CREW_SESSION",
    "cookie_params" => [
        "lifetime" => 3600,
        "path" => "/",
        "domain" => "localhost",
        "secure" => true,
        "httponly" => true,
    ],
];

Session::init(config);
```

__Note__: You must initialize the session to use other functions.

### Set Method
```text
Session::set(string key, mixed value);
```

```php
// Example
Session::set("name", "Jon Deo");
```

### Get Method
```text
Session::get(string key, [mixed default=null]) mixed;
```

```php
// Example
echo Session::get("name");
```

### Has Method
```text
Session::get(string key) bool;
```

```php
// Example
if (Session::has("name")) {
    echo "exist";
} else {
    echo "not exist";
}
```

### Flash and Get Flash Method
```text
Session::flash(string key, mixed value);
Session::getFlash(string key, [mixed default=null]) mixed
```

```php
// Example
Session::flash("message", "Success Insert"); // set flash

echo Session::getFlash("message"); // get flash message
```

### Remove Session
```text
Session::remove(string key);
```

```php
// Example
Session::remove("name");
```

### Destroy Session
```text
Session::destroy();
```

```php
// Example
Session::destroy();
```


