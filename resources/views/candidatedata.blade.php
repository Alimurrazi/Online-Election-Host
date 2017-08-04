@extends('layouts.app')

@section('content')

<style type="text/css">
     body {
        margin: 0;
        border: 0;
        width: 100%;
    }

    #main {
        margin: 0 60px; /* in case you want to set a fixed width on this as well */
    }

</style>

<body>
    <div id="main">

  <form method="post" action="{{ action('electioncandidateController@datasubmit') }}" class="form" accept-charset="UTF-8" enctype="multipart/form-data" >
  <input type="hidden"  name="_token" value="{{ csrf_token() }}">

<?php
$total_post=$data["total_post"];
$count=0;
?>


@for($i=0;$i<$total_post;$i++)

{{--  <h2 style="float:left;">Post no #{{$i+1}}</h2> --}}
  <h2 style="text-align:center;">{{$data[$i."post_name"]}}</h2>

  <?php
  $total_candidate=$data[$i."total_candidate"];
  ?>

  @for($j=0;$j<$total_candidate;$j++)

  <h3>Candidate no #{{$j+1}}</h3>
   
   <?php
   $count++;
   ?>

  <br>
  Candidate name:
  <br>
  <input type="text" name={{$i.'.'.$j.".candidate_name"}} value="">  
  <br>
  Team:
  <br>
  <input type="text" name={{$i.'.'.$j.".team_name"}} value=""> 
  <br>
  Image:
  <br>
  <input type="file" name="{{$i.'.'.$j.".image"}}" id="">
  <br>
  Video:
  <br>
  <input type="file" name="{{$i.'.'.$j.".video"}}" id="">
  <br>


  @endfor

@endfor

</div>

 <input type="submit" value="Submit">  

</body>


@endsection
