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
				echo "<td>"."<a href = ".base_url()."radiology/delete/".$row->id.">Reject Request </a><br/>";
                echo "</tr>";
            }
         }
         
	  else
	  	{
	  		echo "<tr class='danger'>";
	  	    echo "<td> There Is Erro while sending you'r request </td>";
			echo "</tr>";}
			}
    ?>	
		</table>		
  </div>
</div>
	<?php echo form_open(base_url()."hospital/doctor");?>
<div class="row" style="margin-bottom:50px">
		<div class='col-sm-2'>
			<button class="btn btn-lg btn-primary" type="submit">Send_Request</button>
		</div>
</div>
<?php 
    	echo form_close(); 
    ?>
</body>
</html>