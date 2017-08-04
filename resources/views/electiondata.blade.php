@extends('layouts.master')
  
@section('content')

<head>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}"/>
<script type="text/javascript" src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>


<form method="post" action="{{ action('electiondataController@datasubmit') }}" class="form" accept-charset="UTF-8">
  <input type="hidden"  name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="election_id" value={{$id}}> 
<br> 
  Election name:
  <br>
  <input type="text" name="election_name" value=""> 
  <br>
  

   Start Time:
   <div class="input-append date form_datetime">
    <input type="text" name="start_time" value="" readonly>
    <span class="add-on"><i class="icon-th"></i></span>
</div>

   End Time:
   <div class="input-append date form_datetime">
    <input  type="text" name="end_time" value="" readonly>
    <span class="add-on"><i class="icon-th"></i></span>
</div>
 
 <br>


 Total Post:
  	<input type="number" id="total_post" name="total_post" value="">
  	<a href="#" id="post_go" onclick="addpostdetails()">Go</a>
  <div id="post">

  </div> 

 <input type="submit" value="Submit">

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii"
    });

        function addpostdetails(){
            var number = document.getElementById("total_post").value;
/*             
            var ara=new Array(number);
	        for (var i=0;i<number;i++)
	        {
		     ara[i]=new Array(5);
	        }
*/
            var container = document.getElementById("post");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                container.appendChild(document.createTextNode("Post Number #" + (i+1)));
                container.appendChild(document.createElement("br"));

                container.appendChild(document.createTextNode("Post Name "));
                var post_name = document.createElement("input");
                post_name.type = "text";
                post_name.name=i+"post_name";
                container.appendChild(post_name);
                
                container.appendChild(document.createTextNode(" Seat for this post "));
                var individual_seat = document.createElement("input");
                individual_seat.type = "number";
                individual_seat.name=i+"individual_seat";
                container.appendChild(individual_seat);

                container.appendChild(document.createElement("br"));

                container.appendChild(document.createTextNode("Total candidate "));
                var total_candidate = document.createElement("input");
                total_candidate.type = "number";
                total_candidate.name=i+"total_candidate";
                total_candidate.setAttribute('id',"total_candidate");
                container.appendChild(total_candidate);
/*
                var aTag = document.createElement('a');
                aTag.setAttribute('href',"#");
                aTag.setAttribute('onclick',"candidatedetails()");
                aTag.setAttribute('id',"candidate_go");
                aTag.innerHTML = " Go";
                container.appendChild(aTag);
*/
                container.appendChild(document.createElement("br"));

            }
        }

/*
        function candidatedetails()
        {
        //	number=$(this).prev().val();
        	var number =document.getElementById("total_candidate").value;
            window.alert(number);

            var container = document.getElementById("candidate");
                for (i=0;i<number;i++)
            {
                container.appendChild(document.createTextNode("Post Number #" + (i+1)));
                container.appendChild(document.createElement("br"));
            }
        }
*/
</script> 

</form>
 
@endsection