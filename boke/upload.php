<?php
if($_FILES['file1']['error']>0)
{
    exit(json_encode(array("errno"=>1,"data"=>[])));
}

$info=pathinfo($_FILES['file1']['name']);
$extension=$info['extension'];
$allows=["jpg","png","jpeg"];
if(!in_array($extension,$allows)){
    exit(json_encode(array("errno"=>2,"data"=>[])));
}


move_uploaded_file($_FILES['file1']['tmp_name'],'./upload/'.$_FILES['file1']['name']);
$f1=new finfo(FILEINFO_MIME_TYPE);
$mime_type=$f1->file($_SERVER['DOCUMENT_ROOT']."/untitled/boke/upload/".$_FILES['file1']['name']);
exit(json_encode(array("errno"=>0,"data"=>["./upload/".$_FILES['file1']['name']])));
