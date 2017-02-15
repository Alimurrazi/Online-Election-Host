<!doctype html>
<html>
<head>
<!-- my head section goes here -->
<!-- my css and js goes here -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">


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
max-width: 140px;
margin: 0;
padding: 1em;
background-color: #292929;
height: 500px;
}
.contents{
 
margin-left: 10px;
overflow: hidden;
}

    blockquote
    {
        font-family: Georgia, serif;
        padding-top: 70px;
        font-size: 28px;
        font-style: italic;
        position: relative;
        color: white;
    }
    blockquote:before
    {
        display: block;
        content: "\201C";
        font-size: 100px;
        position: absolute;
        top: -0px;
        left: -40px;
        color: white;
    }
  blockquote cite
  {
    font-size: 14px;
    display: block;
    margin-top: 5px;
  }
  blockquote cite:before
  {
    content: "\2014 \2009";
  }

h1 { color: #b48608; font-family: 'Droid serif', serif; font-size: 50px; font-weight: 400; font-style: italic; line-height: 44px; margin: 0 0 12px; text-align: center; }

</style>

</head>
   
<body>
<div class="container">

<header>
  <h1> Online Election Host</h1>    
</header>
 
<div class="sidebar">@yield('sidebar')</div>
<div class="contents">@yield('content') </div>

<footer>

</footer>

</div>
</body>
 
</html>
