<?php
include 'mysql.php';

$id = $_GET['id'];
$sql = "SELECT * FROM test_company where id={$id}";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<body>
	  <div class="form-group">
		<label for="title" class="col-sm-2 control-label">标题</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="title" value='<?php echo $row['title'];?>' placeholder="请输入标题" required="required">
		</div>
	  </div>
	  <div class="form-group">
		<label for="phone" class="col-sm-2 control-label">手机号码</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="phone" value='<?php echo $row['phone'];?>' placeholder="请输入手机号码" required="required">
		</div>
	  </div>
	  <div class="form-group">
		<label for="times" class="col-sm-2 control-label">时间间隔</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="times" value='<?php echo $row['times'];?>' placeholder="请输入间隔" required="required">
		</div>
	  </div>
	  <div class="form-group">
		<label for="name" class="col-sm-2 control-label">名字</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="name" value='<?php echo $row['name'];?>' placeholder="请输入名字" required="required">
		</div>
	  </div>
	  <div class="form-group">
		<label for="content">服务内容</label>
		<textarea class="form-control" rows="3" value='' id="content"><?php echo $row['content'];?></textarea>
	  </div>
		<div class="form-group">
			<label for="service_date" class="col-sm-2 control-label">服务日期</label>
			<div class="col-sm-10">
				<div id="addDate">
				  <?php
					$sql_date = "SELECT service_date FROM test_date where company_id={$id}";
					$result_date = mysql_query($sql_date);
					if(mysql_num_rows($result_date) > 0){
						while($row_date = mysql_fetch_assoc($result_date)){
							echo "<input type='date' class='form-control service_date' value='$row_date[service_date]' required='required'>";
						}
					}
				  ?>
				  <!--<input type="date" class="form-control service_date" id="" placeholder="请输入服务日期">-->
				  <button onclick="addDate()">添加</button>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="service_time" class="col-sm-2 control-label">服务时间</label>
			<div class="col-sm-10">
				<div id="addTime">
				  <?php
					$service_time = json_decode($row['service_time'], true);
					if(count($service_time) > 0){
						foreach($service_time as $k=>$v){
							$k_time = explode('-', $k);
							echo '
								<input type="time" class="form-control firsttime" value='.$k_time[0].' placeholder="请输入服务时间" required="required">
								<input type="time" class="form-control lasttime" value='.$k_time[1].' placeholder="请输入服务时间" required="required">
							';
						}
					}
				  ?>	
				  <button onclick="addTime()">添加</button>
				</div>
			</div>
		</div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <input type='hidden' value='<?php echo $row['id']?>' id='company_id'>	
		  <button type="submit" class="btn btn-default" id="submit">提交</button>
		</div>
	  </div>
	</body>
	<script>
		function addDate(){
			$('#addDate').append(
				'<input type="date" class="form-control service_date" id="" placeholder="请输入服务日期">' + 
				'<button onclick="addDate()">添加</button>'
			);
		}
		function addTime(){
			$('#addTime').append(
				'<input type="time" class="form-control firsttime" id="" placeholder="请输入服务时间">' +
				'<input type="time" class="form-control lasttime" id="" placeholder="请输入服务时间">' +
				'<button onclick="addTime()">添加</button>'
			)
		}
		$('#submit').click(function (){
			var title = $('#title').val();
			var phone = $('#phone').val();
			var times = $('#times').val();
			var name = $('#name').val();
			var content = $('#content').val();
			var id = $('#company_id').val();
			//var address = [];
			var date = [];
			var firsttime = [];
			var lasttime = [];
			/*$('.address').each(function (key, value){
				address[key] = $(this).val();
			});*/
			$('.service_date').each(function (key, value){
				date[key] = $(this).val();
			});
			$('.firsttime').each(function (key, value){
				firsttime[key] = $(this).val();
			});
			$('.lasttime').each(function (key, value){
				lasttime[key] = $(this).val();
			});
			
			var data = {
				'id': id,	
				'title': title,
				'phone': phone,
				'times': times,
				'name':name,
				'content': content,
				//'address': address,
				'service_date': date,
				'firsttime': firsttime,
				'lasttime': lasttime,
			};
			console.log(data);
			$.ajax({
				url: 'edit.php',
				type: 'post',
				data: data,
				success: function (res){
					console.log(res);
					row = JSON.parse(res);
					if(row.code = 200){
						alert('提交成功');
						$(location).attr('href', 'adminList.php');
					}else{
						alert('提交失败');
					}
				}
			});
		});
	</script>
</html>
