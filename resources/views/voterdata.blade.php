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

 <form method="post" action="{{ action('electionvoterController@datasubmit') }}" class="form" accept-charset="UTF-8">
  <input type="hidden"  name="_token" value="{{ csrf_token() }}">
<br> 

 Total Voter:
  	<input type="number" id="total_voter" name="total_voter" value="">
  	<a href="#" id="voter_go" onclick="addvoterdetails()">Go</a>
  <div id="voter">

  </div> 

 <input type="submit" value="Submit">

<script type="text/javascript">

        function addvoterdetails(){
            var number = document.getElementById("total_voter").value;

            var container = document.getElementById("voter");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                container.appendChild(document.createTextNode("voter Number #" + (i+1)));
                container.appendChild(document.createElement("br"));

                container.appendChild(document.createTextNode("Voter Name "));
                var voter_name = document.createElement("input");
                voter_name.type = "text";
                voter_name.name=i+"voter_name";
                container.appendChild(voter_name);
                
                container.appendChild(document.createTextNode("Voter id "));
                var voter_id = document.createElement("input");
                voter_id.type = "number";
                voter_id.name=i+"voter_id";
                container.appendChild(voter_id);

                container.appendChild(document.createElement("br"));

                container.appendChild(document.createTextNode("Email "));
                var voter_email = document.createElement("input");
                voter_email.type = "Email";
                voter_email.name=i+"voter_email";
                container.appendChild(voter_email);

                container.appendChild(document.createElement("br"));

            }
        }

</script> 

</form>
</div>
</body>

@endsection