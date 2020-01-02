<?php
$id=$_POST['id'];
require_once 'DAOPDO.class.php';
$configs=array(
    'dbname'=>'test'
);
$dao=DAOPDO::getSingleton($configs);
$sql="delete form day1 where id=$id";
$res=$dao->query($sql);
echo $res;
if ($res){
    $arr=array(
        'code'=>1,
        'msg'=>'删除成功'
    );
    echo json_encode($arr);
}else{
    $arr=array(
        'code'=>1,
        'msg'=>'删除失败'
    );
    echo json_encode($arr);
}
