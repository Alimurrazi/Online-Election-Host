 <html>
 <head>
   
   <title></title>
   
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

   <style>
     
@import url(http://fonts.googleapis.com/css?family=Roboto:400+700);
body {
  background: #30303A;
  font-family: Roboto;
}
#chart {
  width: 650px;
  height: 300px;
  margin: 30px auto 0;
  display: block;
}
#chart #numbers {
  width: 50px;
  height: 100%;
  margin: 0;
  padding: 0;
  display: inline-block;
  float: left;
}
#chart #numbers li {
  text-align: right;
  padding-right: 1em;
  list-style: none;
  height: 29px;
  border-bottom: 1px solid #444;
  position: relative;
  bottom: 30px;
}
#chart #numbers li:last-child {
  height: 30px;
}
#chart #numbers li span {
  color: #eee;
  position: absolute;
  bottom: 0;
  right: 10px;
}
#chart #bars {
  display: inline-block;
  background: rgba(0, 0, 0, 0.2);
  width: 600px;
  height: 300px;
  padding: 0;
  margin: 0;
  box-shadow: 0 0 0 1px #444;
}
#chart #bars li {
  display: table-cell;
  width: 100px;
  height: 300px;
  margin: 0;
  text-align: center;
  position: relative;
}
#chart #bars li .bar {
  display: block;
  width: 70px;
  margin-left: 15px;
  background: #49E;
  position: absolute;
  bottom: 0;
}
#chart #bars li .bar:hover {
  background: #5AE;
  cursor: pointer;
}
#chart #bars li .bar:hover:before {
  color: white;
  content: attr(data-percentage) '%';
  position: relative;
  bottom: 20px;
}
#chart #bars li span {
  color: #eee;
  width: 100%;
  position: absolute;
  bottom: -2em;
  left: 0;
  text-align: center;
}
	 
   </style>
    
 </head>
 <body>
 
   <div id="chart">
  <ul id="numbers">
    <li><span>100%</span></li>
    <li><span>90%</span></li>
    <li><span>80%</span></li>
    <li><span>70%</span></li>
    <li><span>60%</span></li>
    <li><span>50%</span></li>
    <li><span>40%</span></li>
    <li><span>30%</span></li>
    <li><span>20%</span></li>
    <li><span>10%</span></li>
    <li><span>0%</span></li>
  </ul>
  
  <ul id="bars">
    <li><div data-percentage="56" class="bar"></div><span>Option 1</span></li>
    <li><div data-percentage="33" class="bar"></div><span>Option 2</span></li>
    <li><div data-percentage="54" class="bar"></div><span>Option 3</span></li>
    <li><div data-percentage="94" class="bar"></div><span>Option 4</span></li>
    <li><div data-percentage="44" class="bar"></div><span>Option 5</span></li>
    <li><div data-percentage="23" class="bar"></div><span>Option 6</span></li>
  </ul>
</div>

 <script type="text/javascript">
 
  	$(function() {
  $("#bars li .bar").each( function( key, bar ) {
    var percentage = $(this).data('percentage');
    
    $(this).animate({
      'height' : percentage + '%'
    }, 1000);
  });
});
 
   </script>     

	
 </body>
 </html>