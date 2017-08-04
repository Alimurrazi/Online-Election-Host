@extends('layouts.master')
 
@section('content')

<!DOCTYPE html>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $(".flip").click(function(){
        $(this).next(".panel").slideToggle("slow");
    });
}); 
</script>

<script>

$(document).ready(function () {
    $("input").change(function () {
        var maxAllowed = 2;
        var cnt = $("input:checked").length;
        if (cnt > maxAllowed) {
            $(this).prop("checked", "");
            alert('You can select maximum ' + maxAllowed + ' technologies!!');
        }
    });
});
 
</script>

<script>

$(document).ready(function(){
    $("h4").click(function(){
        $("video").toggle();
    });
});
</script>

<style type="text/css">

.panel, .flip {
    padding: 5px;
    text-align: center;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
}

.panel {
    padding: 50px;
    display: none;
}

	ul {
  list-style-type: none;
}

li {
  display: inline-block;
}

input[type="checkbox"]{
 {{-- display: none; --}}
}

label {
  border: 1px solid #ff0000;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: .4s;
  transform: scale(0);
}

label img {
  height: 210px;
  width: 250px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked + label {
  border-color: #ddd;
}

:checked + label:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
}

:checked + label img {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
}
</style>
 

</head>
<body>
   
<form method="post" action="{{action('votesubmitController@votesubmit')}}" class="form"> 
 
 <input type="hidden"  name="_token" value="{{ csrf_token() }}">
   <input type="hidden"  name="voter_id" value="{{ $voter_data->id }}">
   
@foreach($post_list as $post_list)
  <h1>{{$post_list->postname}}</h1>
  <div class="flip">Click to slide the panel down or up</div>
<div class="panel">

<ul>
 
 @foreach($candidate_list[$post_list->id] as $candidate_list[$post_list->id])
  
  <li>
  <input type="checkbox" name="selected[]" value= {{ $candidate_list[$post_list->id]->id }}>
  <label>
  <img src="{{ URL::asset($candidate_list[$post_list->id]->image)}}" />
  <p>{{$candidate_list[$post_list->id]->name}}</p>
  <video height="210" width="250" controls>
  <source src="{{ URL::asset($candidate_list[$post_list->id]->video)}}" type="video/mp4">
  <source src="{{ URL::asset($candidate_list[$post_list->id]->video)}}" type="video/ogg">
  Your browser does not support the video tag.
</video>
  <h4>campaign</h4>
    </label> 
  </li>

@endforeach 

 
</ul>
</div>

@endforeach

<button type="submit" id="login-button">Submit</button>
</form>
</body>
</html>

@stop