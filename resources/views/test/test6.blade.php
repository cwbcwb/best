<link rel='stylesheet' type='text/css' href='/css/app.css'>
<link rel='stylesheet' type='text/css' href='{{asset("css")}}/app.css'>
@extends('test.parent')
@section('main')
<div>woshi</div>
@endsection
双向标签
@include('test.parent')引入文件

<!--
关于csrf
在表单提交时可以写{{csrf_field}}或是
<input type='hidden' name='_token' value='{{csrf_token}}'>
修改免csrf验证的路径laravel\app\Http\Middleware\VerifyCsrfToken.php
-->
