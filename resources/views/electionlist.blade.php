@extends('layouts.master')

@section('sidebar')
    <blockquote>
  	 Why so serious
  	 <cite>joker</cite>
  </blockquote>
@stop

@section('content')
<head>
<style type="text/css">
	table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>

<body>
<table>

  @foreach($electionlist as $v_electionlist)
     {{ $v_electionlist->election_name }}; 
  @endforeach

</table>
</body>

<h2>List of Elections</h2>

@stop