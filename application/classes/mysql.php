<?php

class mysql {

    protected $db;

    public function __construct()
    {
        $this->db = $this->__conn();
    }

    public function __destruct()
    {
        mysqli_close($this->__conn());
    }

    private function __conn()
    {
        require_once __DIR__ . '/../libs/db_config.php';

        $conn = new mysqli(_host, _userid, _userpw, _dbname);
        if(mysqli_connect_error()) {
            return mysqli_connect_error();
        }
        mysqli_set_charset($conn, _dbCharset);

        return $conn;
    }

    public function query($table_name, $column = '', $where = '', $sort = '')
    {
        if(!empty($where)) $where = ' WHERE ' . $where;
        if(empty($column)) $column = '*';
        if(empty($sort)) $sort = '';
        $result = mysqli_query($this->db, 'SELECT ' . $column . ' FROM ' . $table_name . $where . $sort);
        return $result;
    }

    public function update($table_name, $query, $where)
    {
        $result = mysqli_query($this->db, 'UPDATE ' . $table_name . ' SET ' . $query . ' WHERE ' . $where);
        return $result;
    }

    public function insert($table_name, $column, $values)
    {
        $result = mysqli_query($this->db, 'INSERT INTO ' . $table_name . ' ( ' . $column . ' ) VALUES (' . $values . ')');
        return $result;
    }

    public function delete($table_name, $values)
    {
        $result = mysqli_query($this->db, 'DELETE FROM ' . $table_name . ' WHERE (' . $values . ')');
        return $result;
    }

    public function count($table_name, $where = '')
    {
        if(!empty($where)) $where = ' WHERE ' . $where;
        return mysqli_query($this->db, 'SELECT COUNT(*) AS count FROM ' . $table_name . $where)->fetch_assoc()['count'];
    }

}
?>