@extends('../blogContent')

@section('content')
<h3>กำหนดการ</h3>
<hr><br>
@for($i=1; $i <= 7; $i++)
<img width="100%" src="{{asset('images/schedules/agenda-'.$i.'.jpg')}}" alt="">
@endfor
@stop