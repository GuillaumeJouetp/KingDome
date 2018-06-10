<head>
    <link rel="stylesheet" href="..\src\css\dashboard.css"> 
	
</head>

<body>
<div id="refresh"></div>

<script type='text/javascript'>
$(document).ready(function(){
	$('#refresh').load('dashboard2.php');
	refresh();
	});
		function refresh()
		{
			setTimeout( function(){
				$('#refresh').fadeOut('slow').load('dashboard2.php').fadeIn('slow');
				refresh();
			},200);

</script>
</body>