<?php
    require_once 'DAOPDO.class.php';
    $configs=array(
        'dbname'=>'test'
    );
    $dao=DAOPDO::getSingleton($configs);
    $sql="select * from day1";
    $arr=$dao->fetchAll($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>标号</th>
            <th>游戏</th>
            <th>操作</th>
        </tr>
        <?php foreach ($arr as $key=>$value){ ?>
        <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['title_name']?></td>
            <td><a id="<?php echo $value['id'] ?>" href="javascript:void(0)" class="btn">删除</a></td>
        </tr>
        <?php } ?>
    </table>
    <script src="jquery.min.js"></script>
    <script>
        $(".btn").click(function () {
            $id=$(this).attr('id');
            $.ajax({
                url:'02.php',
                type:'post',
                data:{id:$id},
                dataType:'josn',
                success:function (data) {
                   if(data.code==1){
                       alert('删除成功');
                   }else{
                       alert('删除失败');
                   }
                }
            })
        })
    </script>
</body>
</html>
