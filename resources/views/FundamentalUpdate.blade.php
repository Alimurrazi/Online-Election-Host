@extends('layouts.master')
  
@section('content')

<head>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}"/>
<script type="text/javascript" src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>


<form method="post" action="{{ action('FundamentalUpdateController@update') }}" class="form" accept-charset="UTF-8">
  <input type="hidden"  name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="election_id" value={{$id}}> 
<br>
@foreach($data as $data) 
  Election name:
  <br>
  <input type="text" name="election_name" value="{{$data->election_name}}"> 
  <br>
  

   Start Time:
   <div class="input-append date form_datetime">
    <input type="text" name="start_time" value="{{$data->start_time}}" readonly>
    <span class="add-on"><i class="icon-th"></i></span>
</div>

   End Time:
   <div class="input-append date form_datetime">
    <input  type="text" name="end_time" value="{{$data->end_time}}" readonly>
    <span class="add-on"><i class="icon-th"></i></span>
</div>
@endforeach
 
 <br> 

 <input type="submit" value="Submit">
 <br>
 <br> 

<a href="{{ url('my/Fundamental/Delete/'.$id) }}" class="btn btn-danger">Remove the Election</a>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii"
    });

    
</script> 

</form>
 
@endsection