<html>
<head>
	

	<title>Learn vue </title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1 class="mytask">My task</h1>
		<task ></task>

		
	</div>
	<template id="tasks-template">
		<ul class="list-group">
				<li class="list-group-item" v-for="task in list">
					
					@{{task.name}}
				</li>


			


		</ul>
	</template>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.14/vue.js" type="text/javascript" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.6.0/vue-resource.js" type="text/javascript"></script>
	<script src="/js/main.js" type="text/javascript"></script>



</body>


</html>