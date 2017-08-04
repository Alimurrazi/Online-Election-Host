@extends('layouts.master')
  
@section('content')

<head>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}"/>
<script type="text/javascript" src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>


<form method="post" action="{{ action('PostUpdateController@update') }}" class="form" accept-charset="UTF-8">
  <input type="hidden"  name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="election_id" value={{$id}}> 
@foreach($data as $data)
  <br> 
  Post name: 
  <br>
  <input type="text" name="post_name{{$data->id}}" value="{{$data->postname}}"> 
  <br>
  

   Total Post:
    
  <br>
  <input type="number" name="total_post{{$data->id}}" value="{{$data->total_post}}"> 
  <br>

   Total Candidate:
    
  <br>
<input type="number" name="total_candidate{{$data->id}}" value="{{$data->total_candidate}}"> 
  <br>
 
 <a href="{{ url('my/Post/Delete/'.$data->id) }}" class="btn btn-danger">Remove the Post</a>
 <br>
@endforeach
 <br> 

 <input type="submit" value="Submit">
 <br>
 <br> 

</form>
 
@endsection