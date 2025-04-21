<?php

namespace App\config;

use PDO;
use PDOException;

class Database
{
    public PDO $pdo;
    public array $migrationsArray = [];

    public function __construct(
    ) {
        $this->connect();
    }

    private function connect(): void
    {
        try {
            $user = $_ENV['DB_USERNAME'] ?? '';
            $pass = $_ENV['DB_PASSWORD'] ?? '';

            $dsn = "mysql:host=" . ($_ENV['DB_HOST'] ?? 'localhost') . ";dbname=" . ($_ENV['DB_NAME'] ?? 'mvc') . ";port=" . ($_ENV['DB_PORT'] ?? '3306');

            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo '<div style="background-color:white; color:red">' . $e->getMessage() . '</div>';
        }
    }

    public function applyMigrations(string $mode): bool
    {
        $path = dirname(__DIR__) . '/database/Migrations/';
        $writtenMigrations = array_filter(scandir($path), fn($file) => pathinfo($file, PATHINFO_EXTENSION) === 'php');

        $this->createMigrationsTable();
        $existing = $this->existingMigrations();
        $newMigrations = array_diff($writtenMigrations, $existing);

        if ($mode === 'down') {
            foreach ($newMigrations as $migrationName) {
                require_once $path . $migrationName;
                $className = pathinfo($migrationName, PATHINFO_FILENAME);
                (new $className())->down();
            }

            return true;
        }

        foreach ($newMigrations as $migrationName) {
            require_once $path . $migrationName;
            $className = pathinfo($migrationName, PATHINFO_FILENAME);
            (new $className())->$mode();

            $this->migrationsArray[] = $migrationName;
        }

        if (!empty($this->migrationsArray)) {
            $this->saveMigrations($this->migrationsArray);
            $this->log('MIGRATIONS APPLIED SUCCESSFULLY!');
        } else {
            $this->log('NOTHING TO MIGRATE!');
        }

        return true;
    }

    private function createMigrationsTable(): void
    {
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS migrations (
                id INT AUTO_INCREMENT PRIMARY KEY,
                migration_name VARCHAR(255) NOT NULL
            ) ENGINE=INNODB;
        SQL;

        $this->pdo->exec($sql);
    }

    private function existingMigrations(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM migrations");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    private function saveMigrations(array $migrations): void
    {
        $values = implode(',', array_map(fn(string $m) => "('$m')", $migrations));
        $sql = "INSERT INTO migrations ('name') VALUES $values";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function prepare(string $sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

    private function log(string $message): void
    {
        echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
    }
}
