<?php
	$phone = $_GET['phone'];
	$signatureUser = md5('reserveUser'.$phone);
	if($signatureUser != $_GET['signatureUser']){
		die('Data abnormity!!!');
	}
?>
<?php
header("Content-Type: text/html;charset=utf-8");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <script src="js/jquery.2.1.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .main {
            padding: 50px;
            color: #4a4a4a;
        }
        .main  .group {
            height: 70px;
            line-height: 66px;
            border-top: 1px solid #dedede;
            box-sizing: border-box;
        }
        .main .group label,.label {
            color: #5a5a5a;
            font-weight: bold;
        }
        .main .group input {
            width: 170px;
            background: #e0e0e0;
            height: 45px;
            margin-left: 27px;
            text-indent: 15px;
            border-radius: 5px;
        }
        .table-bordered td, .table-bordered th {
            text-align: center;
        }
        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 2px;
            color: #fff;
            background: #5c9dff;
            text-align: center;
        }
        .main .delete {
            background: #d9534f!important;
            border: none;
        }
        .main .hundred {
            margin-left: 10px;
            font-size: 25px;
        }
    </style>
    <title>预约后台</title>
</head>
<body>
<div class="main">
    <table class="table table-bordered" style="margin-top: 15px">
        <thead>
        <tr>
            <th>标题</th>
            <th>预约时间</th>
            <th>备注</th>
        </tr>
        </thead>
        <tbody>
        <?php

		include 'mysql.php';

		//$id = $_GET['id'];
		$sql_company = "SELECT u.subscribe_time,u.remark,c.title FROM test_user as u,test_company as c WHERE u.phone={$phone} and u.company_id=c.id";
		$result_company = mysql_query($sql_company);
		while($row_company = mysql_fetch_assoc($result_company)){
			echo "<tr>
				<td>$row_company[title]</td>
				<td>$row_company[subscribe_time]</td>
				<td>$row_company[remark]</td>
			</tr>";
		}
		?>
        
        </tbody>
    </table>
</div>

</body>
<script>
	
</script>
</html>