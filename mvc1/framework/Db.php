<?php

class Db
{
    public $num = 0;
    public $insertId = 0;
    private $config = [
        "db" => "mysql",
        "host" => "localhost",
        "port" => 3306,
        "user" => "root",
        "pwd" => "root",
        "charset" => "utf8",
        "dbname" => "mvc",
    ];
    private static $instance = null;
    private $conn;

    private function __construct($params)
    {
        $this->config = array_merge($this->config, $params);
        $this->connect();
    }

    private function connect()
    {
        try  {
        $dsn = "{$this->config["db"]}:host={$this->config["host"]};port={$this->config["port"]};dbname={$this->config["dbname"]};charset={$this->config["charset"]};";
        $this->conn = new PDO($dsn, $this->config["user"], $this->config["pwd"]);
        $this->conn->query("SET NAMES {$this->config["charset"]}");
    }catch (Exception $e) {
            die("数据库连接失败" . $e->getMessage());
        }
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public  static function getInstance($params=[])
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self($params);
        }
        return self::$instance;
    }

    public function exec($sql)
    {
        $num = $this->conn->exec($sql);
        if ($num > 0) {
            if (null != $this->conn->lastInsertId()) {
                $this->insertId = $this->conn->lastInsertId();
            }
            $this->num=$num;
        }
    else{
        $error = $this->conn->errorInfo();
        echo $error[0] . ":" . $error[1] . ":" . $error[2];
    }
    }

    public function  fetchAll($sql){
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function  fetch($sql){
        return $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

}