
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">120 New</p>
                    <p class="text-muted">Messages</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">30 Tasks</p>
                    <p class="text-muted">Remaining</p>
                </div>
             </div>
		     </div>
             <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">2 New</p></br>
                    <p class="text-muted">Emergency Order</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">3 New</p></br>
                    <p class="text-muted">Out Orders</p>
                </div>
             </div>
             
		     </div>
			</div>
                 <!-- /. ROW  -->
                <hr />  	
	

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
         <form id="form1" name="form1" method="post"  action="<?php echo base_url();?>doctor/new_analyse_request">
         	<table width="50%" border="0">
    <tr>
      
      	<?php 
      	if(isset($patient))
		{
			echo "<td width='50%' height='41'><label for='patient_id'>patient ID</label>";
			echo "&nbsp"."&nbsp"."&nbsp"."<input type='text' name='patient_id'  id='patient_id'  value= '".$patient[0]->id."'/> </td>";
		
			echo "<td width='50%' height='41'><label for='patient_name'>patient Name</label>";
			echo "<input type='text' name='patient_name' id='patient_name' value ='".$patient[0]->Pname ."'> </td>";
		}
		else {
			echo "<td width='51%' height='41'><label for='patient_id'>patient Name</label>";
			echo"<input type='text' name='patient_name' id='patient_name' /></td>";
		}
      	?>
    </tr>
    </table>
		<div id="TabbedPanels1" class="TabbedPanels">
        
         <ul class="TabbedPanelsTabGroup">
             
             <?php
                $tabindex_id=0;
                    foreach ($records2 as $value) {
                         echo " <li class=".'"TabbedPanelsTab"' ."tabindex=" . '" 0 "' ." id= "."'". $tabindex_id ."'".">".$value->catagoury_name."</li>";
                        $tabindex_id++;
                       
                    }
                
             ?>
         </ul>
         <div class="TabbedPanelsContentGroup">
             <?php
             //echo "dshdgshjgds     ".count($y['records2']) ;
             $c=0;
             $i=0;
			 
             while($i<count($records2))
             {
                 $j=FALSE;
                     $right=FALSE;
             $left=TRUE;
             $center=FALSE;
                 echo "<div class=".'"TabbedPanelsContent"'."id="."'" ."s_". $i ."'".">";
                 while(!$j)
                 {
                     if(($c==count($records))||($records[$c]->catagoury_id!=$records2[$i]->catagoury_id))
                     {
                         $j=TRUE;
                     }
                     else {
                     	if($left)
                         {
                             echo "<div class= ".'"Lcheck"'.">";
                             $left=FALSE;
                             $center=TRUE;
                         }
                        elseif ($center) {
                            
                            echo "<div class= ".'"Ccheck"'.">";
                            $center=FALSE;
                            $right=TRUE;
                        }
                        else {
                            echo "<div class= ".'"Rcheck"'.">";
                            $right=FALSE;
                            $left=TRUE        ;      
                        }
                        echo "<input type=".'"checkbox"'. "name=".'"check[]"'. "id="."'" . ($c+1) ."'". "value=". "'" . $records[$c]->id ."'" ."/>";
                        //echo "id="."'" .$c+1 ."'";
                        echo "<label for="."'" . ($c+1) ."'"."title= ". '"Sample required : '. $records[$c]->Sample_required .' &nbsp Required Time : '.$records[$c]->required_time .'"'.">".$records[$c]->analyse_name ."</label>";           
                       echo "</div>";
                        $c++;
                     }
                    
                 }
                  $i++;
                  echo "</div>";
             }
             ?>
          </div> 
          <input type="submit" name="ok" id="ok" value="Submit" /></td>
        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            </div>
           </form>
                <!-- /. ROW  -->
                    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
         <!-- CUSTOM SCRIPTS -->
    
