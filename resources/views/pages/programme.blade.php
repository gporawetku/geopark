@extends('../blogContent')

@section('content')
<h3 class="text-dark-color">กำหนดการ</h3>
<hr class="text-base-color">
<br>
@for($i=1; $i <= 7; $i++)
<img width="100%" src="{{asset('images/schedules/agenda-'.$i.'.jpg')}}" alt="">
<hr class="text-base-color my-4 mx-5">
@endfor
@stop