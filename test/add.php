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
		  <input type="text" class="form-control" id="title" placeholder="请输入标题" required="required" />
		</div>
	  </div>
	  <div class="form-group">
		<label for="phone" class="col-sm-2 control-label">手机号码</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="phone" placeholder="请输入手机号码" required="required">
		</div>
	  </div>
	  <div class="form-group">
		<label for="times" class="col-sm-2 control-label">时间间隔</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="times" placeholder="请输入间隔" required="required">
		</div>
	  </div>
	  <div class="form-group">
		<label for="name" class="col-sm-2 control-label">名字</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="name" placeholder="请输入名字" required="required">
		</div>
	  </div>
	  <div class="form-group">
		<label for="content">服务内容</label>
		<textarea class="form-control" rows="3" id="content"></textarea>
	  </div>
	  <div class="form-group">
		<label for="address" class="col-sm-2 control-label">地址</label>
		<div class="col-sm-10">
		<div id="addDiv">
		  <input type="text" class="form-control address" id="" placeholder="请输入地址" required="required">
		  <button onclick="add()">添加</button>
		</div>
		</div>
	  </div>
	  <div class="form-group">
		<label for="service_date" class="col-sm-2 control-label">服务日期</label>
		<div class="col-sm-10">
		<div id="addDate">
		  <input type="date" class="form-control service_date" id="" placeholder="请输入服务日期" required="required">
		  <button onclick="addDate()">添加</button>
		</div>
		</div>
	  </div>
	  <div class="form-group">
		<label for="service_time" class="col-sm-2 control-label">服务时间</label>
		<div class="col-sm-10">
		<div id="addTime">
		  <input type="time" class="form-control firsttime" id="" placeholder="请输入服务时间" required="required">
		  <input type="time" class="form-control lasttime" id="" placeholder="请输入服务时间" required="required">
		  <button onclick="addTime()">添加</button>
		</div>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-default" id="submit">提交</button>
		</div>
	  </div>

</body>
<script>
	function add(){
		$('#addDiv').append(
			'<input type="text" class="form-control address" id="" placeholder="请输入地址" required="required">' +
			'<button onclick="add()">添加</button>'
		);
	}
	function addDate(){
		$('#addDate').append(
			'<input type="date" class="form-control service_date" id="" placeholder="请输入服务日期" required="required">' + 
			'<button onclick="addDate()">添加</button>'
		);
	}
	function addTime(){
		$('#addTime').append(
			'<input type="time" class="form-control firsttime" id="" placeholder="请输入服务时间" required="required">' +
			'<input type="time" class="form-control lasttime" id="" placeholder="请输入服务时间" required="required">' +
			'<button onclick="addTime()">添加</button>'
		)
	}
	$('#submit').click(function (){
		var title = $('#title').val();
		var phone = $('#phone').val();
		var times = $('#times').val();
		var name = $('#name').val();
		var content = $('#content').val();
		var address = [];
		var date = [];
		var firsttime = [];
		var lasttime = [];
		$('.address').each(function (key, value){
			address[key] = $(this).val();
		});
		$('.service_date').each(function (key, value){
			date[key] = $(this).val();
		});
		$('.firsttime').each(function (key, value){
			firsttime[key] = $(this).val();
		});
		$('.lasttime').each(function (key, value){
			lasttime[key] = $(this).val();
		});
		
		/*if(title == ''){
			alert('标题不能为空');
			return;
		}
		if(phone == ''){
			alert('号码不能为空');
			return;
		}
		if(times == ''){
			alert('时间间隔不能为空');
			return;
		}
		if(name == ''){
			alert('名字不能为空');
			return;
		}
		if(content == ''){
			alert('内容不能为空');
			return;
		}*/
		
		if(address[0] == ''){
			alert('地址不能为空');
			return;
		}
		if(date[0] == ''){
			alert('服务日期不能为空');
			return;
		}
		if((firsttime[0] == '') || (lasttime[0] == '')){
			alert('服务时间不能为空');
			return;
		}
		
		var data = {
			'title': title,
			'phone': phone,
			'times': times,
			'name':name,
			'content': content,
			'address': address,
			'service_date': date,
			'firsttime': firsttime,
			'lasttime': lasttime,
		};
		console.log(data);
		$.ajax({
			url: 'reserve.php',
			type: 'post',
			data: data,
			success: function (res){
				//console.log(res);
				row = JSON.parse(res);
				if(row.code == 200){
					alert('提交成功');
					$(location).attr('href', 'adminList.php');
				}else if(row.code == 401){
					alert('标题已被添加');
				}else if(row.code == 404){
					alert('提交失败');
					window.location.reload();
				}
			}
		});
	});
</script>
</html>