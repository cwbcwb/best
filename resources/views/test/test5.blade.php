@foreach($data as $v)
{{$v->id}}<br/>
@endforeach
@if($day == '1')
	yi
@elseif($day == '2')
	er
@endif