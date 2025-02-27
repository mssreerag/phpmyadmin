<?php
/**
 * Holds the PhpMyAdmin\Database\Designer\DesignerTable class
 *
 * @package PhpMyAdmin-Designer
 */
namespace PhpMyAdmin\Database\Designer;

use PhpMyAdmin\Util;

/**
 * Common functions for Designer
 *
 * @package PhpMyAdmin-Designer
 */
class DesignerTable
{
    private $tableName;
    private $databaseName;
    private $tableEngine;
    private $displayField;

    /**
     * Create a new DesignerTable
     *
     * @param string      $databaseName The database name
     * @param string      $tableName    The table name
     * @param string      $tableEngine  The table engine
     * @param string|null $displayField The display field if available
     */
    public function __construct(
        string $databaseName,
        string $tableName,
        string $tableEngine,
        ?string $displayField
    ) {
        $this->databaseName = $databaseName;
        $this->tableName = $tableName;
        $this->tableEngine = $tableEngine;
        $this->displayField = $displayField;
    }

    /**
     * The table engine supports or not foreign keys
     *
     * @return bool
     */
    public function supportsForeignkeys(): bool
    {
        return Util::isForeignKeySupported($this->tableEngine);
    }

    /**
     * Get the database name
     *
     * @return string
     */
    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    /**
     * Get the table name
     *
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * Get the table engine
     *
     * @return string
     */
    public function getTableEngine(): string
    {
        return $this->tableEngine;
    }

    /**
     * Get the db and table separated with a dot
     *
     * @return string
     */
    public function getDbTableString(): string
    {
        return $this->databaseName . '.' . $this->tableName;
    }
}
