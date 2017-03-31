@extends('layouts.master')

 
@section('content')

<head>
   <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}"> 
</head>
 
<body>
  <div class="wrapper">
	<div class="container"> 
		<h2>{{ $present_election }}</h2>
		 		 
<form method="post" action="{{ action('VotercheckController@votercheck',$id)}}" class="form" accept-charset="UTF-8"> 
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
			<input type="text" name="username" placeholder="Username" required>
			<input type="text" name="fathername" placeholder="Father's Name" required>
			<input type="text" name="mothername" placeholder="Mother's Name" required>
            <input type="password" name="idnumber" placeholder="Id number" required>
			<input type="email" name="email" placeholder="email" required>
			<input type="password" name="password" placeholder="Password" required>
			<input type="submit" value="Submit">		
		{{--	<button type="submit" id="login-button">Login</button>  --}}
		</form>
		
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            
<script src="{{ URL::asset('js/index.js')}}"></script>
 

</body>

@stop

