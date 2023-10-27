<?php

/**
 * Class Database
 */
class Database
{
    /**
     * CSV file directory.
     *
     * @var string
     */
    private string $directory;

    /**
     * CSV filename.
     *
     * @var string
     */
    private string $filename;

    /**
     * CSV resource file.
     *
     * @var mixed
     */
    private mixed $file;

    /**
     * CSV data header.
     *
     * @var array
     */
    private array $header;

    /**
     * CSV data
     *
     * @var array
     */
    private array $data;

    /**
     * Query selected columns.
     *
     * @var array
     */
    private array $columns;

    /**
     * Query conditions.
     *
     * @var array
     */
    private array $conditions;

    /**
     * Query limit.
     *
     * @var int
     */
    private int $limit;

    /**
     * Query offset.
     *
     * @var int
     */
    private int $offset;

    /**
     * Query success index position in data array.
     *
     * @var array
     */
    private array $index;

    /**
     * Table method load.
     *
     * @var bool
     */
    private bool $tableLoaded = false;

    /**
     * Database constructor.
     *
     * @param string $directory
     */
    public function __construct(string $directory)
    {
        $this->directory = $directory;
    }

    /**
     *
     */
    public function __destruct()
    {
        fclose($this->file);
    }

    public function table($name): static
    {
        $this->attributesInit();

        $this->filename = $this->directory . $name . '.csv';
        if (file_exists($this->filename)) {
            $this->file = fopen($this->filename, "r+");
            if ($this->file === false) $this->checkFileOpen();
        } else {
            $this->checkFileName($name);
        }

        $this->tableLoaded = true;
        $this->loadData();
        return $this;
    }

    /**
     * @param ...$columns
     * @return $this
     */
    public function select(...$columns): static
    {
        $this->checkTableLoaded();
        $this->checkSelect($columns);

        $this->columns = $columns;
        return $this;
    }

    /**
     * @param $column
     * @param $value
     * @return $this
     */
    public function where($column, $value): static
    {
        $this->checkTableLoaded();
        $this->checkWhere($column);

        $this->conditions[$column] = $value;
        return $this;
    }

    /**
     * @param int $limit
     * @param int $offset
     * @return $this
     */
    public function limit(int $limit, int $offset = 0): static
    {
        $this->checkTableLoaded();
        $this->limit = $limit;
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        $this->checkTableLoaded();

        $selectedData = [];
        $size = count($this->data);
        $i = -1;

        while (++$i < $size) {
            // Select All
            $allData = $this->data[$i];

            // Where Condition
            // If the condition applies and the condition does not match then continue
            if (!empty($this->conditions) &&
                count(array_intersect_assoc($allData, $this->conditions)) !== count($this->conditions)) {
                continue;
            }

            // Selected columns
            if (!empty($this->columns)) {
                $allData = array_filter($allData, fn($key) => in_array($key, $this->columns), ARRAY_FILTER_USE_KEY);
            }

            $this->index[] = $i;
            $selectedData[] = $allData;
        }

        $limit = $this->limit === 0 ? $size : $this->limit;
        return array_slice($selectedData, $this->offset, $limit);
    }

    /**
     * @return array|false
     */
    public function first(): array|false
    {
        return current($this->get());
    }

    /**
     * @return array|false
     */
    public function last(): array|false
    {
        $data = $this->get();
        return end($data);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        $this->checkTableLoaded();
        return count($this->get());
    }

    /**
     * @param $assocArray
     * @return bool
     */
    public function insert($assocArray): bool
    {
        $this->checkTableLoaded();
        $this->checkInsert($assocArray);

        return fputcsv($this->file, $assocArray) !== false;
    }

    /**
     * @param $assocArray
     * @return bool
     */
    public function update($assocArray): bool
    {
        $this->checkTableLoaded();
        $file = fopen($this->filename, "w");
        if ($file === false) $this->checkFileOpen();

        // This method call for only index values
        $this->get();
        $data = $this->data;

        foreach ($this->index as $index) {
            $update = [];

            foreach ($this->header as $key) {
                if (in_array($key, array_keys($assocArray))) {
                    $update[$key] = $assocArray[$key];
                } else {
                    $update[$key] = $this->data[$index][$key];
                }
            }

            $data[$index] = $update;
        }

        fputcsv($file, $this->header);
        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        return true;
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        $this->checkTableLoaded();
        $file = fopen($this->filename, "w");
        if ($file === false) $this->checkFileOpen();

        // This method call for only index values
        $this->get();
        $data = $this->data;

        foreach ($this->index as $index) {
            unset($data[$index]);
        }

        fputcsv($file, $this->header);
        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        return true;
    }

    /**
     *
     */
    private function loadData()
    {
        $this->header = fgetcsv($this->file);

        while (($data = fgetcsv($this->file)) !== false) {
            // If any line blank or column not match by header then skip
            if (count($data) !== count($this->header)) continue;

            $this->data[] = array_combine($this->header, $data);
        }
    }

    /**
     *
     */
    private function checkTableLoaded()
    {
        if (!$this->tableLoaded) {
            throw new RuntimeException("You must call table() before using other methods.");
        }
    }

    /**
     * @param array $assocArray
     */
    private function checkInsert(array $assocArray): void
    {
        // Throw exception if column not match and size not equal
        $columnExist = count(array_diff($this->header, array_keys($assocArray))) == 0 && count($assocArray) == count($this->header);
        if (!$columnExist) {
            $message = implode(",", $this->header) . ") in (" . implode(",", array_keys($assocArray));
            throw new RuntimeException("Column not match: ($message)");
        }
    }

    /**
     * @param array $columns
     */
    private function checkSelect(array $columns): void
    {
        // Throw exception if column not match
        $columnExist = count(array_intersect($this->header, $columns)) == count($columns);
        if (!$columnExist) {
            $message = implode(",", $this->header) . ") in (" . implode(",", $columns);
            throw new RuntimeException("Column not match: ($message)");
        }
    }

    /**
     * @param string $column
     */
    private function checkWhere(string $column): void
    {
        // Throw exception if column not match
        $columnExist = in_array($column, $this->header);
        if (!$columnExist) {
            $message = "`$column` not exist in (" . implode(",", $this->header) . ")";
            throw new RuntimeException("Column not match: $message");
        }
    }

    /**
     *
     */
    private function checkFileOpen(): void
    {
        throw new RuntimeException("Failed to open the file: " . $this->filename);
    }

    /**
     *
     */
    private function checkFileName($name): void
    {
        throw new RuntimeException("Invalid Table Name: $name");
    }


    /**
     * Attributes default initialization
     */
    private function attributesInit()
    {
        $this->header = [];
        $this->data = [];
        $this->columns = [];
        $this->conditions = [];
        $this->limit = 0;
        $this->offset = 0;
        $this->index = [];
    }
}
