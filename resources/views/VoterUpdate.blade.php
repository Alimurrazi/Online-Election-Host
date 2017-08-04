@extends('layouts.master')
  
@section('content')

<head>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}"/>
<script type="text/javascript" src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>


<form method="post" action="{{ action('VoterUpdateController@update') }}" class="form" accept-charset="UTF-8">
  <input type="hidden"  name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="election_id" value={{$id}}> 
@foreach($voter_data as $data) 
  <br>
  Voter Name:
  <input type="text" name="name{{$data->id}}" value="{{$data->username}}"> 
  <br>
   
   Id number:
   <input type="number" name="id_number{{$data->id}}" value="{{$data->id_number}}">    
  <br>

  Email:
   <input type="Email" name="email{{$data->id}}" value="{{$data->email}}">    
  <br>

<a href="{{ url('my/Voter/Delete/'.$data->id) }}" class="btn btn-danger">Remove the Voter</a>
<br>
 @endforeach

 <br> 

 <input type="submit" value="Submit">
 <br>
 <br> 

</form>
 
@endsection