<!DOCTYPE html>
<?php
	$id = $_GET['id'];
	$signature = md5('yuyue'.$id);
	if($signature != $_GET['signature']){
		die('Data abnormity!!!');
	}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>预约</title>
		<link rel="stylesheet" type="text/css" href="css/common.css" />
		<script src="js/common.js"></script>
		<script src="js/jquery-2.1.4.min.js"></script>
	</head>
	<body>
		<h3 class="title_name">德赛阳光口腔免费口腔检查【赛德阳光口腔】</h3>
		<div class="in_muber">
			<div>
				<span class='times'>10</span>
				<p>分钟/人</p>
			</div>
			<div>
				<span class='number'>24000</span>
				<p>人数</p>
			</div>
			<div style="border-right: none;">
				<span class='phone'>15976885224</span>
				<p class='name'>徐辉</p>
			</div>
		</div>
		<section class="chooseide">
			<img src="img/icon_adress.png" >
			<span class='address'>飞亚达大厦F5</span>
			<span style="text-align: right;font-size: 0.26rem;color: #376DF6;">选择地址</span>
		</section>
		<section class="service">
			<p class="p1">服务内容:</p>
			<p class="p2">北大博士口腔团免费口腔检查 <a href="JavaScript:;">查看详情>></a></p>
			<p class="p1">服务日期:</p>
		</section>
		<section class="timechoose">
			<!--<div class="active">
				<p class="p1">星期三</p>
				<p class="p1">03-06</p>
			</div> 
			<div>
				<p class="p1">星期三</p>
				<p class="p1">04-06</p>
			</div>--> 
		</section>
		<section class="service service_time">
			<p class="p1">服务时间:</p>
			<!--<span class="choseitem">12:00 - 15:10</span><span class="choseitem">15：20 - 16：50</span>-->
		</section>
		<section class="make_time">
			<p class="tit">预约详情</p>
			<ul class='make'>
			
			</ul>
		</section>
		<section class="inputwaper">
			<p>个人信息</p>
			<div class="mui-input-row">
				<label>手机号</label>
				<input type="text" class='user_phone' placeholder="必填">
			</div>
			<div class="mui-input-row">
				<label>备注</label>
				<textarea class='remark'></textarea>
			</div>
			
		</section>
		<section class="btn">
			<input type='hidden' value='<?php echo $_GET['id'];?>' id='company_id'>
			<a href="javascript:;">电话咨询</a>
			<a href="javascript:;" style="background: #376DF6;color: #fff;" id="submission">立即预定</a>
		</section>
	</body>
	<script>
		//$('.title_name').text('ok');
		var id = $('#company_id').val();
		$.ajax({
			url: 'list.php',
			type: 'get',
			data: {id: id},
			success: function (res){
				console.log(res);
				row = JSON.parse(res);
				
				$('.title_name').text(row.title);
				$('.name').text(row.name);
				$('.phone').text(row.phone);
				$('.number').text(row.number);
				$('.times').text(row.times);
				$('.p2').html(row.content.substring(0, 10) + '<a href="JavaScript:;" id="details">查看详情>></a>');
				address = row.address;
				$('.address').text(address[0]);
				service_time = JSON.parse(row.service_time);
				var a = [];
				$.each(service_time, function (key, val){
					a.push(key);
				});
				for(k = 0; k < a.length; k++){
					date_str = '<span class="choseitem">'+ a[k] +'</span>';
					$('.service_time').append(date_str);
				}
				
				$('.p2').click(function(event){
					if(event.target.innerText == '查看详情>>'){
						$('.p2').html(row.content + '<a href="JavaScript:;" id="cutOut">收起</a>');
					}else if(event.target.innerText == '收起'){
						$('.p2').html(row.content.substring(0, 10) + '<a href="JavaScript:;" id="details">查看详情>></a>');
					}
				})
				
				//服务时间预约
				for(j = 0; j < service_time[a[0]].length; j++){
					str = '<li>' +
						'<p class="select_time">'+ service_time[a[0]][j] +'</p>' +
						'<a href="JavaScript:;">预约</a>' +
					'</li>';
					$('.make').append(str);
				}
				$(".choseitem").each(function (){
					$(this).click(function(){
						$('.make').empty();
						this_time = $(this).text();
						for(j = 0; j < service_time[this_time].length; j++){
							str = '<li class="">' +
								'<p class="select_time">'+ service_time[this_time][j] +'</p>' +
								'<a href="JavaScript:;" class="test">预约</a>' +
							'</li>';
							$('.make').append(str);
						}
					})
				});
				var select_time = '';
				$('ul').click(function(event){
					console.log(event.target.innerText);
					var select_text = event.target.innerText;
					if(select_text == '预约'){
						$(event.target).text('取消预约');
						select_time = event.target.previousElementSibling.innerHTML;
						console.log(select_time);
					}else if(select_text == '取消预约'){
						$(event.target).text('预约');
					}
				});
				
				//服务日期
				service_date =row.service_date;
				console.log(service_date);
				for(i = 0; i < service_date.length; i++){
					date_var = new Date(service_date[i]);
					console.log(getMyDay(date_var));
					week = getMyDay(date_var);
					date_str = '<div class="active">' +
						'<p class="p1">'+ week +'</p>' +
						'<p class="p1 select_date">'+ service_date[i].substring(5) +'</p>' +
					'</div>';
					$('.timechoose').append(date_str);
				}
				
				var select_date = '';
				$('.active').each(function(){
					$(this).click(function(){
						//console.log($(this).find('.select_date').text());
						select_date = $(this).find('.select_date').text();
						console.log(select_date);
					})
				});
				
				$('#submission').click(function(){
					if(select_date == ''){
						alert('请选择服务日期');
						return;
					}
					
					if(select_time == ''){
						alert('请选择服务时间');
						return;
					}
					
					var user_phone = $('.user_phone').val();
					var remark = $('.remark').val();
					var user_data = {
						select_date: select_date,
						select_time: select_time,
						user_phone: user_phone,
						remark: remark
					};
					$.ajax({
						url: 'user.php',
						type: 'post',
						data: user_data,
						success: function(res){
							res = JSON.parse(res);
							if(res.code == '200'){
								alert('预约成功');
							}else if(res.code == '401'){
								alert('错过预约');
							}
						}
					})
				});	
			}
		});
		
		function getMyDay(date){
			var week;
			if(date.getDay()==0) week="周日"
			if(date.getDay()==1) week="周一"
			if(date.getDay()==2) week="周二"
			if(date.getDay()==3) week="周三"
			if(date.getDay()==4) week="周四"
			if(date.getDay()==5) week="周五"
			if(date.getDay()==6) week="周六"
			return week;
		}	
	</script>

</html>
