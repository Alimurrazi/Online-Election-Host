@extends('layouts.master')

@section('content')
<head>
<style type="text/css">
	table {
    border-collapse: collapse;
    width: 100%;
}

th {
    text-align: center;
    padding: 8px;
}
 
tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

h2 { color: #7c795d; font-family: 'Trocchi', serif; font-size: 45px; font-weight: normal; line-height: 48px; margin: 0; }

body
{
  {{-- background: #2f4f4f; --}}
}

h3
{
	text-align: left;
	padding-left: 18px;
	float: left;
}

h5
{
	text-align: right;
	padding-right: 18px;
	float: right;
}

</style>
</head>

<body>
<table>
 
<h2>List of Elections</h2>

  @foreach($electionlist as $v_electionlist)
     <tr>
  <td>
   
  <h3>
  <a href="{{url('test/'.$v_electionlist->id.'/'.$electionlist_status[$v_electionlist->id])}}">{{$v_electionlist->election_name}}</a>
  </h3>
   
   @if($electionlist_status[$v_electionlist->id]==0)
       <h5>
  	 ended...
  </h5>
      @elseif($electionlist_status[$v_electionlist->id]==1)
       <h5>
  	 running...
  </h5>
       @else
       <h5>
  	 coming...
  </h5>
   @endif

  </td>
     </tr>
  @endforeach
  
</table>
</body>



@stop