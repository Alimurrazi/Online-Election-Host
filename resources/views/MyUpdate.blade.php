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

a
{
	text-decoration: none;
}

</style>
</head>

<body>
<table>

<a href="{{url('my'.'/list/'.$id.'/Fundamental')}}"><h2 align="center">{{"Fundamental"}}</h2><br>
<a href="{{url('my'.'/list/'.$id.'/Post')}}"><h2 align="center">{{"Post"}}</h2><br>
<a href="{{url('my'.'/list/'.$id.'/Candidate')}}"><h2 align="center">{{"Candidate"}}</h2><br>
<a href="{{url('my'.'/list/'.$id.'/Voter')}}"><h2 align="center">{{"Voter"}}</h2>
  
</table>
</body>


@stop