<div class="container">
      <h2>Deadline set to: </h2>
   
      <div id="content"> 

      	 <p>Server time: </p>
	     <p id="server_time"></p>
         
         <!--<a href="<?php echo base_url('time'); ?>" style="color:white"><strong>SET DEADLINE</strong></a>-->
      
         <!--<?php  var_dump($date); ?>
         <p><?php echo $date; ?></p>-->

         <br/>

         <!--onsubmit="return(changeToMilli())"-->
         <!--<form method="post" name="myForm" id="myForm" action="<?php echo base_url();?>time/set" enctype="multipart/form-data">
		      <input type="datetime-local" name="userset" id="userset">
		      <input type="submit" id="submit_button" name="submit_button" value='SET' >
		 </form>-->

         <input type="datetime-local" name="timeout" id="timeout">
   		 <button onclick="set()">GET TIME</button>
         
         <br/><br/>

		 <p>Set to: </p>
		 <p id="set_time"></p>

		 <br/>

		 <form method="post" name="myForm" id="myForm" action="<?php echo base_url();?>time/set" enctype="multipart/form-data">
		      <input type="number" name="userset" id="userset">
		      <input type="submit" id="submit_button" name="submit_button" value='SET' >
		 </form>
            
      </div>
</div>

<div id="timing" display="none">
<!-- <form method="post" name="myForm" action="<?php echo base_url();?>time/set" enctype="multipart/form-data">
  
      <p>Input date and time: </p> 
      <input type="datetime-local" name="deadline">
      <input type="submit" value='SET' >
   </form>-->

   <br/><br/><br/>

   <p>DEADLINE: </p>
   <p id="milli"><?php echo $milliseconds; ?></p>

   <br/><br/>

   <p>USER SET DEADLINE: </p>
   <p id="time"><?php echo $time; ?></p>

   <br/><br/>

   <p>Server time: </p>
   <p id="server_time"></p>

   <br/>

   <p>Initial client time:</p>
   <p id="int_client_time"></p>

   <p>Client time set:</p>
   <p id="client_time"></p>
   <p>Client time counting:</p>
   <p id="client_time_count"></p>

   <p>Time difference in milliseconds:</p>
   <p id="differ"></p>

   <p>offset time:</p>
   <p id="offset"></p>

   <p>time info:</p>
   <p id="info"></p>

    <br/><br/>

   <p>changed at client time:</p>
   <p id="change_time"></p>

   <script>   

      var deadline = <?php echo $milliseconds; ?>; 

      var c_date = new Date();
      var c_time=Number(c_date.getTime());
      var s_time=Number('<?php echo round(microtime(true) * 1000); ?>'); 
      var diff = String(s_time-c_time);
      deadline = deadline - diff;
      document.getElementById("differ").innerHTML=diff;

      function set(){
         var date = new Date(document.getElementById('deadline').value);
         var t=date.getTime();
         deadline=date.getTime();
         t=t+"    "+deadline;
         document.getElementById("set_time").innerHTML=t;
      }


      var server=setInterval(function(){myServerTimer()},1000);

      function myServerTimer()
      {
         //var t= '<?php echo date('Y-m-d H:i:s'); ?>';
         //milliseconds
         var t= '<?php echo round(microtime(true) * 1000); ?>'; //echo time(); ?>';
         document.getElementById("server_time").innerHTML=t;
      }

      var d=new Date();
      //var t=d.toUTCString();
      var t=d.getTime() + " " + d.toUTCString();
      document.getElementById("int_client_time").innerHTML=t;

      d.setTime('<?php echo round(microtime(true) * 1000); ?>');

      var t=d.getTime();
      document.getElementById("client_time").innerHTML=t;

      var client=setInterval(function(){myClientTimer()},1000);

      function myClientTimer()
      {
         var c_time = new Date();
         var t=c_time.getTime();//toUTCString();
         //vat t=d.getTime();
         document.getElementById("client_time_count").innerHTML=t;
      }

      var dif=setInterval(function(){difference()},10);

      function difference()
      {
         /*var c_date = new Date();
         var c_time=Number(c_date.getTime());
         var s_time= Number('<?php echo round(microtime(true) * 1000); ?>'); 
         var diff = String(s_time-c_time);
         document.getElementById("differ").innerHTML=diff;*/

         var cur_time = new Date();
         var cur_time=Number(cur_time.getTime());

         var remaining = Number(deadline)-Number(cur_time);

         document.getElementById("info").innerHTML=deadline+"   "+cur_time+"   "+remaining+"   "+diff;
         
         /*definitely need to change this to stop the loop when finished*/
         if(remaining > 0){ //|| deadline==NaN){//diff){
            document.getElementById("offset").innerHTML=remaining+"    Time left";
            document.getElementById("body").style.background = "orange";
         }
         else{
            document.getElementById("change_time").innerHTML=cur_time;
            document.getElementById("offset").innerHTML=remaining+"    Time up";
            document.getElementById("body").style.background = "black";
            //cycle();
         }
         /*

         if(Number(deadline)-c_time > Number(diff)){
            var t = Number(deadline)-c_time;
            document.getElementById("offset").innerHTML=t;
         }else{
            var t = Number(deadline) + "BOOM";
            document.getElementById("offset").innerHTML=t;
         }  */


         //var date = new Date(document.getElementById('deadline').value);
         //var offset_time=date.getTime();
         //var off = String(_time-c_time);
         //document.getElementById("offset").innerHTML=offset_time;
      }

      /*var x;

      function cycle() {
          x = 1;
          setInterval(change, 1000);
      }

      function change() {
          if (x === 1) {
              color = "red";
              x = 2;
          } else {
              color = "blue";
              x = 1;
          }

          document.body.style.background = color;
      }*/
   </script>
</div>

<script type="text/javascript">
		/*$('#submit_button').click(function() {
			var date = new Date(document.getElementById('userset').value);
			var time = Number(date.getTime());
		    $('#userset').val(time);
		    $('#myForm').submit();
		});*/
/*
		$('#myForm').submit( function(){
			var date = new Date(document.getElementById('userset').value);
	        var time=Number(date.getTime());
	        document.getElementById('userset').value = time;
		});

		function changeToMilli(){
			var date = new Date(document.getElementById('userset').value);
	        var t=Number(date.getTime());
	        return t;
		}*/

		var server=setInterval(function(){myServerTimer()},1000);
		function myServerTimer()
	    {
	         //var t= '<?php echo date('Y-m-d H:i:s'); ?>';
	         //milliseconds
	         var t= '<?php echo date("m/d/y G.i:s<br>", time()); ?>'; //echo time(); ?>';
	         document.getElementById("server_time").innerHTML=t;
	    }

	    function set(){
	         var date = new Date(document.getElementById('timeout').value);
	         var t=date.getTime();
	         //deadline=date.getTime();
	         document.getElementById("set_time").innerHTML=t;
      }

</script>
