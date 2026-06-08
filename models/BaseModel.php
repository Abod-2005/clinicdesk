<?php

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    //داله التنفيذ الاساسيه كل الدوال تمر عليها 
    protected function execute($sql, $types = '', $params = [])
    {
        return $this->db->query($sql, $types, $params);
    }
    //تجلب صفف واحد فقط
    protected function fetchOne($sql, $types = '', $params = [])
    {
        $result = $this->db->query($sql, $types, $params);

        return $result->fetch_assoc();
    }
    //تجلب كل الصفوف 
    protected function fetchAll($sql, $types = '', $params = [])
    {
        $result = $this->db->query($sql, $types, $params);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}