<?php

/**
 * Одним из лучших применений паттерна Строитель является конструктор запросов SQL.
 * Интерфейс Строителя определяет общие шаги, необходимые для построения основного
 * SQL-запроса. В то же время Конкретные Строители, соответствующие различным
 * диалектам SQL, реализуют эти шаги, возвращая части SQL-запросов, которые могут
 * быть выполнены в данном движке базы данных.
 */

namespace RefactoringGuru\Builder\RealWorld;

/**
 * Интерфейс Строителя объявляет набор методов для сборки SQL-запроса.
 *
 * Все шаги построения возвращают текущий объект строителя, чтобы обеспечить
 * цепочку: $builder->select(...)->where(...)
 */
interface SQLQueryBuilder
{
    public function select(string $table, array $fields): SQLQueryBuilder;
    
    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder;
    
    public function limit(int $start, int $offset): SQLQueryBuilder;
    
    // +100 других методов синтаксиса SQL...
    
    public function getSQL(): string;
}

/**
 * Каждый Конкретный Строитель соответствует определённому диалекту SQL и может
 * реализовать шаги построения немного иначе, чем остальные.
 *
 * Этот Конкретный Строитель может создавать SQL-запросы, совместимые с MySQL.
 */
class MysqlQueryBuilder implements SQLQueryBuilder
{
    protected $query;
    
    protected function reset(): void
    {
        $this->query = new \stdClass();
    }
    
    /**
     * Построение базового запроса SELECT
     * @param string $table
     * @param array  $fields
     * @return \RefactoringGuru\Builder\RealWorld\SQLQueryBuilder
     */
    public function select(string $table, array $fields): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base = "SELECT " . implode(", ", $fields) . " FROM " . $table;
        $this->query->type = 'select';
        
        return $this;
    }
    
    /**
     * Добавление условия WHERE
     */
    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new \Exception('WHERE can only be added to SELECT, UPDAE OR DELETE');
        }
        $this->query->where[] = "$field $operator '$value'";
        
        return $this;
    }
    
    /**
     * Получение окончательной строки запроса.
     * @return string
     */
    public function getSQL(): string
    {
        $query = $this->query;
        $sql = $query->base;
        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }
        if (isset($query->limit)) {
            $sql .= $query->limit;
        }
        $sql .= ";";
        
        return $sql;
    }
}

/**
 * Этот Конкретный Строитель совместим с PostgreSQL. Хотя Postgres очень похож
 * на Mysql, в нём всё же есть ряд отличий. Чтобы повторно использовать общий
 * код, мы расширяем его от строителя MySQL, переопределяя некоторые шаги построения.
 */
