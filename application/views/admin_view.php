<html>
	<script src="<?php echo base_url();?>/js/jquery.js" type="text/javascript"></script>
	<script type="text/javascript">

function set(name){
  document.subtitle.value = name
}

</script>

<script type="text/javascript">
   $(document).ready(function() {
   	 changeClass(<?php if (isset($idd)) echo $idd;?>);
}
);

    function changeClass(id)
    {
    	if (id==1)
    	{
	        document.getElementById("1").className = "list-group-item active";
	        document.getElementById("2").className = "list-group-item ";
	        document.getElementById("3").className = "list-group-item ";
	        document.getElementById("subtitle").innerHTML="Pharmacy";
	         <?php $x =1; ?>
       }
       else if (id==2)
    	{
	        document.getElementById("2").className = "list-group-item active";
	        document.getElementById("1").className = "list-group-item ";
	        document.getElementById("3").className = "list-group-item ";
	        document.getElementById("subtitle").innerHTML="Radiology";
<?php	         $x =2;?>	        
       }
       else
    	{
	        document.getElementById("3").className = "list-group-item active";
	        document.getElementById("2").className = "list-group-item ";
	        document.getElementById("1").className = "list-group-item ";
	        document.getElementById("subtitle").innerHTML="Analyses";
<?php	        $x=3;?>	        
       }
    }
</script>
<body>
 <div class="list-group">
  <a href="#" onclick="changeClass(1)" class="list-group-item" id="1">Pharmacy</a>
  <a href="<?php echo base_url();?>radiology/patient_req/0" onclick="changeClass(2)" class="list-group-item active" id="2">Radiology</a>
  <a href="#" class="list-group-item" onclick="changeClass(3)" id="3">Analyses</a>
</div>

<div class="panel panel-success">
  <div class="panel-heading" id="subtitle"></div>
  <div class="panel-body">
  	
  		<table class="table table-striped">
  
	   <?php
	  if ($idd=2 || $x=2)
	  {  
      if (isset($record))
		{
		 if(is_array($record)){
             foreach($record as $row ) 
            {
            	
				if ($row->checked)
					$active='class="success"';
				else
					$active ='class="active"';    	
                echo "<tr".$active.">";
                echo "<td>"."Section Name:"."&nbsp".$row->section_name."</td>";
                echo "<td>"."Request Date:"."&nbsp".$row->date."</td>";
                echo "<td>"."Part of Body:"."&nbsp".$row->part_of_body."</td>";
                echo "<td>"."Position:"."&nbsp".$row->position."</td>";
                echo "<td>"."Descreption:"."&nbsp".$row->description."</td>";
                //echo "<td>"."<a href=\"photo(".$row->img_id.")"."\">".$row->img_name."</a><br />";
                //echo "<td>"."<a href=upload/".$row->id.">".$row->name."</a><br/>";
				 echo "<td>"."<a href = ".base_url()."radiology/upload/".$row->id.">Request Accepted</a><br/>";
				 echo "<td>"."<a href = ".base_url()."radiology/delete/".$row->id.">Reject Request </a><br/>";
                echo "</tr>";
            }
         }
         
	  else
	  	{
	  		echo "<tr class='danger'>";
	  	    echo "<td> No Request Now</td>";
			echo "</tr>";}
			}
			}
		else
			{echo "<tr class='danger'>";
	  	    echo "<td> No Request Now</td>";
			echo "</tr>";}
			
    ?>	
		</table>
		
  </div>
</div>

</body>
</html>