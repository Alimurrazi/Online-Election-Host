@extends('layouts.master')
  
@section('content')

<head>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}"/>
<script type="text/javascript" src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
 

<form method="post" action="{{ action('CandidateUpdateController@update') }}" class="form" accept-charset="UTF-8">
  <input type="hidden"  name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="election_id" value={{$id}}>

  
  @foreach($candidate as $candidate)
  <br>
  Candidate Name:
  <input type="text" name="candidate_name{{$candidate[0]->id}}" value="{{$candidate[0]->name}}"> 
  <br>
  
   Team:
  <input type="text" name="team{{$candidate[0]->id}}" value="{{$candidate[0]->team}}"> 
  <br>
   
  Image:
   <input type="file" name="image{{$candidate[0]->id}}" >    
  <br>

  video:
    <input type="file" name="video{{$candidate[0]->id}}" > 
  <br>
<a href="{{ url('my/Candidate/Delete/'.$candidate[0]->id) }}" class="btn btn-danger">Remove the Post</a>
<br>
 @endforeach

 <br> 

 <input type="submit" value="Submit">
 <br>
 <br> 

</form>
 
@endsection