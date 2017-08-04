<!doctype html>
<html>
<head>
<!-- my head section goes here -->
<!-- my css and js goes here -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">

<title>Online Election Host</title>
<style>
 

div.container {
{{-- width: 600px; --}}
margin:0 auto;
}
 
ul {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
 
}
 
li {
float: left;
}
 
li a {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}
 
li a:hover {
background-color: #111;
}
header, footer {
padding: 1em;
color: white;
background-color: black;
clear: left;
text-align: center;
{{-- width:500px; --}}
}
.sidebar{
float: left;
max-width: 170px;
margin: 0;
padding: 1em;
background-color: #292929;
height: 532px;
}

.sidebar:hover
{
   transform: scale(1.01);
}

.contents{
 
margin-left: 10px;
{{-- border-left: 1px solid gray; --}}
{{-- padding: 1em; --}}
overflow: hidden;
{{-- height: 300px; --}}
}
</style>
</head>
  
<body>
<div class="container">
<header> @include('layouts.header') </header>
<div class="sidebar"> @include('layouts.sidebar') </div>  
<div class="contents"> @yield('content') </div>
<footer> @include('layouts.footer') </footer>
</div>
</body>
 
</html>
