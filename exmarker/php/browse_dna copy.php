<?php
ini_set('memory_limit', '1024M');
// hub
$db = new PDO('mysql:host=localhost;dbname=exmarker1', 'exmarker1', 'waR2Fxw8HtP2ymSY');                 //连接数据库，输入服务器名、用户名和密码
// ali
// $db = new PDO('mysql:host=localhost;dbname=bdlb1_1', 'root', 'c90d204689ee9dcf');
$table='summary_table';

$msgArray = array('code'=>0, 'data'=>array(), 'message'=>'参数接收错误，请关闭浏览器后重试。');
$level = isset($_POST['level']) ? trim($_POST['level']) : trim($_GET['level']);            //这里像是定义了level变量，决定了它是GET还是POST

header('content-type:application:json;charset=utf8');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');


function gtfinfor($level){
        global $db ;
        $query = "select * from summary_table";                                                    //从browse DNA中选取所有记录（SQL）
        $result = $db->query($query);
        if(is_object($result)){
                $resultArray = $result->fetchAll();
                return $resultArray;
        }else{
                echo "bu shi dui xiang";
                echo $query;
                echo gettype($result);
        }
}
$response=gtfinfor($level);
echo json_encode($response);
?>
