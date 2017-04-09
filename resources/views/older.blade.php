 @extends('layouts.master')

 @section('content')
<html>
<head>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<style> 

div.polaroid {
  width: 50%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 5px;
  display: inline-block;
}

div.container {
  text-align: center;
  padding: 5px 10px;
}

</style>

</head>
<body>

@foreach($all_post as $all_post)

<h1>{{$all_post->postname}}</h2>

@for($i=1;$i<=$all_post->total_post;$i++)

<div class="polaroid">
  <img src="{{URL::asset($winner_list[$all_post->id][$i]->image)}}" style="width:40%">
  <div class="container">
    <p>{{$winner_list[$all_post->id][$i]->name}}</p>
  </div>
</div>

@endfor

@endforeach

</body>
</html>

 @stop