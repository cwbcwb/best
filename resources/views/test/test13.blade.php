
<form method='post' action=''>
名字<input type='text' name='name'>
邮箱<input type='text' name='email'>
验证码<input type='text' name='captcha'><img src='{{captcha_src()}}'/>
<input type="submit" value='提交'>
</form>
@if(count($errors) > 0)
	<div>
		<ul>
			@foreach($errors->all() as $error)
				<li>
				{{$error}}
				</li>
			@endforeach
		</ul>
	</div>
@endif

