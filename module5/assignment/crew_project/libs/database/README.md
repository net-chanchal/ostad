# Database Library

In this library, each CSV file has compared to a database table and various operations can be performed from that table
like select, insert, update delete and other operations.

It allows creating, dropping and modifying new tables.

```php
// Include Library
require "autoload.php";
```

### Object Create
If you want to interact with a table, you must first create an object.

```php
const DATA_DIRECTORY = "./path/database";

// Create Object
$db = new Database(DATA_DIRECTORY);
```

__Note:__ `DATA_DIRECTORY` Specify here the path to the directory where your data files will be stored.


### Select Query

__Method Get__  
Returns all records with all columns as an array.

```text
table(table_name): object

get(): array
```
__Note:__ The table `$db->table(table_name)` method is mandatory for every query.

__Example__
```php
$db = new Database(DATA_DIRECTORY);

$result = $db->table("users")->get();
```

__Method Select__  
Select method has used to select  particular columns.

```text
select(column_name, column_name, ...): object
```

__Example__
```php
$db = new Database(DATA_DIRECTORY);

$result = $db->table("users")
    ->select("id", "first_name", "last_name")
    ->get();
````

__Method Where__  
Where method has used to add conditions to columns.

```text
where(column_name, value): object
```

__Example__
```php
$db = new Database(DATA_DIRECTORY);
$result = $db->table("users")
        ->where("gender", "Male")
        ->where("date_of_birth", "2021-01-01")
        ->get();
```
__Note:__ Where method can only compare `$x == $y` and not the other way around


__Method Limit__  
The limit method has used to select limited records.

```text
limit(limit, [offset = 0]): object
```

__Example__
```php
$db = new Database(DATA_DIRECTORY);
$result = $db->table("users")
        ->where("gender", "Male")
        ->where("date_of_birth", "2021-01-01")
        ->limit(10)
        ->get();
```

__Method Count__  
Count method Counts total records.

```text
count(): int
```

__Example__
```php
$db = new Database(DATA_DIRECTORY);
$result = $db->table("users")
        ->where("gender", "Male")
        ->where("date_of_birth", "2021-01-01")
        ->limit(5, 2)
        ->count();
```

__Method First__  
First row select.

```text
first(): false|array
```

__Example__
```php
$db = new Database(DATA_DIRECTORY);
$result = $db->table("users")
        ->first();
```


__Method Last__  
Last row select.

```text
last(): false|array
```

__Example__
```php
$db = new Database(DATA_DIRECTORY);
$result = $db->table("users")
        ->last();
```

### Insert Query

Insert data in table.

```text
insert(associative_array): bool
```

__Example__
```php
$db = new Database(DATA_DIRECTORY);

$data = [
    "id" => 3323,
    "first_name" => "Chanchal",
    "last_name" => "Biswas",
    "gender" => "Male",
    "date_of_birth" => "2021-01-01",
    "email" => "mchanchalbd@gamil.com",
    "password" => "12345"
];

$result = $db->table("users")->insert($data);
```

__Note:__ Each field is required for data entry. if you want to keep blank then you can assign null as value.

### Update Query

Update data in table.

```text
update(associative_array): bool
```

__Example__
```php
$db = new Database(DATA_DIRECTORY);

$data = [
    "first_name" => "Md. Chanchal",
    "password" => "12345678"
];

$result = $db->table("users")
    ->where("id", 3323)
    ->update($data);
```
