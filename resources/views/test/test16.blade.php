<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>带样式的laravel分页</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
		<script type='text/javascript' src='/js/jquery.js'></script>
		<script type='text/javascript'>
			$(function(){
				$('#b1').click(function(){
					$.get('/Admin/Test/test17',function(data){
						console.log(data);
					},'json')
				});
				
			});
		</script>
        
    </head>
<body>
<button id='b1' >点我</button>
</body>
</html>


