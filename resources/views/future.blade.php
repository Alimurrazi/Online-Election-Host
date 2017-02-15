@extends('layouts.master')


@section('sidebar')
  <blockquote>
    Time and Tide waits for none
  	<cite> Proverb </cite>
  </blockquote>
@stop

@section('content')

<head>
	<style type="text/css">
	
	body
	{
		background: #f6f6f6;
	}

	.countdownContainer
	{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translateX(-50%) translateY(-50%);
		text-align: center;
		background: #ddd;
		border: 1px solid #999;
		padding: 10px;
		box-shadow: 0 0 5px 3px #ccc;
	}

	.info
	{
		font-size: 80px;
	}

	</style>
</head>

<body>
 
	<table class="countdownContainer">
		<tr class="info">
			<td colspan="4" >Election Countdown</td>
		</tr>
		<tr class="info">
			<td id="days">120</td>
			<td id="hours">4</td>
			<td id="minutes">12</td>
			<td id="seconds">22</td>
		</tr>
		<tr>
			<td>Days</td>
			<td>Hours</td>
			<td>Minutes</td>
			<td>Seconds</td>
		</tr>
	</table>

 <script type="text/javascript">
 	
 	function windowbox()
 	{
 		alert("Please refresh ...!");
 	}

 	function countdown(year,month,date,hour,minute,second)
 	{
 		var now = new Date();

 		var eventDate= new Date(year,month,date,hour,minute,second);
     

 		var currentTime = now.getTime();
 		var eventTime = eventDate.getTime();
        

 		var remTime = eventTime-currentTime;

 		var s=Math.floor(remTime/1000);
 		var m=Math.floor(s/60);
 		var h=Math.floor(m/60);
 		var d=Math.floor(h/24);
        
        h%=24;
        m%=60;
        s%=60;

        h= (h<10) ? "0" + h : h;
        m= (m<10) ? "0" + m : m;
        s= (s<10) ? "0" + s : s;
       
       document.getElementById("days").textContent = d;
       document.getElementById("days").innerText = d;

      document.getElementById("hours").textContent =h;
      document.getElementById("minutes").textContent =m;
      document.getElementById("seconds").textContent =s;

     if(d!=0 || h!=0 || m!=0 || s!=0)
      {	
     setTimeout(countdown, 1000,year,month,date,hour,minute,second);
      }
      else
      {
      	 windowbox();
      }
 	}
    
    var year={{$year}};
    var month={{$month}}-1; 

    {{-- in javascript 0=january 1=february sql timedate formate  1=january--}}

    var date={{$date}};
    var hour={{$hour}};
    var minute={{$minute}};
    var second={{$second}};

    countdown( year,month,date,hour,minute,second);

 </script>

</body>

@stop