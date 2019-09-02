<?php


class StudentController
{
    public function listAll()
    {
        $student = new StudentModel();
        $data=$student->getAll();
        require  "./application/home/view/student_list.php";
    }

    public function info($id = 1)
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $student = new StudentModel();
        $data = $student->get($id);
        print_r($data);
    }
}