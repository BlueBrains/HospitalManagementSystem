<html>
<body>
      
<div class="panel panel-success">
  <div class="panel-heading" id="subtitle"></div>
  <div class="panel-body">
  	
  		<table class="table table-striped">
  
	   <?php
	     
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
    ?>	
		</table>
		
  </div>
</div>

</body>
</html>