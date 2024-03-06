<?php
$OrderNo = date('Ymdhis');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>資料送出申請中...</title>
</head>
<body>
    報名資料送出中，請稍候....    
    
    <?php require_once('../func/conni.php'); ?>
    <?php
    if (isset($_POST['name']) && $_POST['name'] != ''){ 
        $other = implode(",",$_POST['other']);

        $create_at = date('Y-m-d H:i:s');

        $qa='';
        if(isset($_POST['qa'])){
            $qa=$_POST['qa'];
        }

        $qa2='';
        if(isset($_POST['qa2'])){
            $qa=$_POST['qa2'];
        }

        $insertSQL = sprintf("INSERT INTO register (company, dept, job_title, name, company_tel, phone, company_id, email , city, about, other, item, create_at, qa, qa2, p) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                            GetSQLValueString($_POST['company'], "text"),
                            GetSQLValueString($_POST['dept'], "text"),
                            GetSQLValueString($_POST['title'], "text"),
                            GetSQLValueString($_POST['name'], "text"),
                            GetSQLValueString($_POST['company_tel'], "text"),
                            GetSQLValueString($_POST['phone'], "text"),
                            GetSQLValueString($_POST['company_id'], "text"),
                            GetSQLValueString($_POST['email'], "text"),
                            GetSQLValueString($_POST['city'], "text"),
                            GetSQLValueString($_POST['about'], "text"),
                            GetSQLValueString($other, "text"),
                            GetSQLValueString($_POST['item'], "text"),
                            GetSQLValueString($create_at, "text"),
                            GetSQLValueString($qa, "text"),
                            \GetSQLValueString($qa2, "text"),
                            GetSQLValueString($_POST['p'], "text"));

        // echo $insertSQL;

        $Result1 = $mysqli->real_query($insertSQL);

        header('location:../course/done');

        // header('location:https://www.surveycake.com/s/1wrmB');
    } else {
        header('location:../course');
    }
    ?>

    
</body>
</html>
