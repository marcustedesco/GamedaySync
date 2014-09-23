<div class="container">

   <p id="info" class="bold"> </p>

   <script>   

      var deadline = <?php echo $milliseconds; ?>; 

      var c_date = new Date();
      var c_time=Number(c_date.getTime());
      var s_time=Number('<?php echo round(microtime(true) * 1000); ?>'); 
      var diff = String(s_time-c_time);
      deadline = deadline - diff;     


      var dif=setInterval(function(){difference()},10);

      function difference()
      {
         var cur_time = new Date();
         var cur_time=Number(cur_time.getTime());

         var remaining = Number(deadline)-Number(cur_time);
         var countdown = Math.round(Number(remaining/1000));

         document.getElementById("info").innerHTML=countdown;
         
         /*definitely need to change this to stop the loop when finished*/
         if(remaining > 0){ //|| deadline==NaN){//diff){
            document.getElementById("body").style.background = "orange";
         }
         else{
            document.getElementById("body").style.background = "black";
         }
      }
   </script>

</div>