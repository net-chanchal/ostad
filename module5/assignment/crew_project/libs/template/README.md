# Template Library

The Template Library simplifies the process of creating consistent web pages by allowing you to define 
layouts, sections, and content and then render them together. This promotes code reusability and makes 
your application more maintainable.

```php
// Include Library
require "autoload.php";
```

### Extend
If you use the template's extend method, you get some special benefits that you don't get with include or require.

When you extend a page, you can pass data from that page to the extended page. And from there it should be received 
through another method.

```text
Template::extend("/path/your-file.php");
```

```php
// Example
Template::extend("includes/layouts/master.php");
```

### Section
To create a new section, use the section method of the template.

There are two methods of creating sections.

```text
Template::section("name", "value");
```

```text
Template::section("name");
write your html content
....
....
Template::endSection();
```


```php
// Example
Template::section("title", "Dashboard");

Template::section("content");
echo "<h1>Dashboard</h1>";
echo "<p>Hello...</p>";
Template::endSection();
```

### Yield
Use the yield method of the template where you want to display the data written within the section.

```text
Template::yield("name"): mixed
```

```php
echo Template::yield("title");
echo Template::yield("content");
```
__Note__: You use template yield method in extend file to display the results.

### Execute
You need to render use the template execute method to and display the result.

```text
Template::execute();
```

```php
// Example
Template::execute();
```

### Full Example

`includes/layouts/master.php`

```html
<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>
        <?php echo Template::yield("title"); ?>
    </title>
</head>
<body>

<h1>This is a Heading</h1>  
<p>This is a paragraph.</p>

<div class="main">
    <?php echo Template::yield("content"); ?>
</div>

</body>
</html>
```

`pages/dashboard.php`

```php
<?php
Template::extend("includes/layouts/master.php");
Template::section("title", "Dashboard");
Template::section("content");
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Welcome to Dashboard</h1>
</div>
<?php
Template::endSection();
Template::execute();

```
