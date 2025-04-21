<?php

namespace App\config;

use PDO;

abstract class DbModel
{
    public int $id;
    public string $created_at;
    public string $updated_at;

    
    public function __construct(
        public ?int $id = null,
        public ?string $created_at = null,
        public ?string $updated_at = null,
    ) {
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }
    abstract public function attrs(): array;
    abstract public static function tableName(): string;

    public function store($array): bool
    {
        $table = static::tableName();
        if (!$array) {
            $columns = $this->attrs();
        }
        $placeholders = array_map(fn($col) => ":$col", $array);
        $sql = "INSERT INTO $table (" . implode(',', $array) . ") VALUES (" . implode(',', $placeholders) . ")";
        
        $stmt = App::$app->database->prepare($sql);

        foreach ($array as $column) {
            $stmt->bindValue(":$column", $this->{$column});
        }

        return $stmt->execute();
    }

    public static function getW(array $conditions): array
    {
        $table = static::tableName();
        $where = implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($conditions)));
        $sql = "SELECT * FROM $table WHERE $where";

        $stmt = App::$app->database->prepare($sql);
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get(): array
    {
        $table = static::tableName();
        $stmt = App::$app->database->prepare("SELECT * FROM $table");
        $stmt->execute();
        return array_reverse($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public static function find(array $searchTerms): array|string
    {
        $table = static::tableName();
        $conditions = implode(' AND ', array_map(fn($key) => "$key LIKE :$key", array_keys($searchTerms)));

        $sql = "SELECT * FROM $table WHERE $conditions";
        $stmt = App::$app->database->prepare($sql);

        foreach ($searchTerms as $key => $value) {
            $stmt->bindValue(":$key", '%' . $value . '%');
        }

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return !empty($results) ? $results : 'No match found';
    }

    public static function where(string $column, array $where): mixed
    {
        $table = static::tableName();
        [$wKey, $wVal] = array_values($where);
        $sql = "SELECT $column FROM $table WHERE $wKey = :$wKey";

        $stmt = App::$app->database->prepare($sql);
        $stmt->bindValue(":$wKey", $wVal);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function update(array $where, array $values): bool
    {
        $table = static::tableName();
        $set = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($values)));
        $condition = implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($where)));

        $sql = "UPDATE $table SET $set WHERE $condition";
        $stmt = App::$app->database->prepare($sql);

        foreach (array_merge($values, $where) as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public static function delete(array $where): bool
    {
        $table = static::tableName();
        $condition = implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($where)));
        $sql = "DELETE FROM $table WHERE $condition";

        $stmt = App::$app->database->prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }
}
