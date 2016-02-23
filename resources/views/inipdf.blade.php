<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!--{!! Html::style('css/bootstrap.css') !!}
	{!! Html::style('css/bootstrap-theme.css') !!}-->
</head>
<body>
<div class="container" width="1000px">
	<div class="col-md-6" float="left" width="40%">
		
		<h1 align="left">DEVELOPER INVOICE</h1>
	</div>
	<div class="col-md-6" float="right" width="40%">
		<p>BILL TO : {{$address}}</p><br>
		<p align="left">DATE:{{$date}}</p>
	</div>
	<div class="col-md-12">
		<div class="pannel panel-info">
			<div class="panel-body">
				<table cellspacing="0" cellpadding="15" align="left" border="2">
					<tbody>
						<tr>
							<td>CUSTOMER NAME</td>
							<td>DESCRIPTION</td>
							<td>HOUR PRICE</td>
							<td>HOURS</td>
							<td>TOTAL</td>
						</tr>
						<tr>
							<td>{{$name}}</td>
							<td>{{$description}}</td>
							<td>{{$hourly}}</td>
							<td>{{$time}}</td>
							<td>{{$total}}</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>

</body>
</html>