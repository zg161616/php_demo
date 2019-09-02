<?php
class Model{
    protected $db=null;
    public $data=null;
    public function  __construct()
    {
        $this->init();
    }
    public function  init(){
        $config=[
            "user"=>"root",
            "pwd"=>"root",
        ];
        $this->db=Db::getInstance($config);
    }
    public function get($id){
        $sql="SELECT * FROM student WHERE id={$id}";
        $this->data= $this->db->fetch($sql);
        return $this->data;
    }
    public function getAll(){
        $sql="SELECT * FROM student";
        $this->data= $this->db->fetchAll($sql);
        return $this->data;
    }
}