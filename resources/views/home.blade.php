@extends('layouts.app')
  
 <style type="text/css">
     form
     {
        display: inline;
     }
 </style> 

@section('content')
<div class="container">
    <div class="row">  
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default">
                <div class="panel-heading">Welcome back</div>

                <div class="panel-body">
          <form action="{{ action('electioncreateController@electioncreate') }}">
    <input type="submit" value="Create New One" />    
</form> 
   <form action="{{ action('MyelectionController@findelection') }}">
    <input type="submit" value="See Old One" />
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
