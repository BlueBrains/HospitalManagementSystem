<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url();?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script src="<?php echo base_url();?>/javascript/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/javascript/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
        <link href="<?php echo base_url();?>/javascript/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
        
		<script type="text/javascript">
            $(document).ready(function(){
                $('.TabbedPanels .TabbedPanelsContent:first').hide();
                $('#ok').hide();
                 //$('#s_'+'2').slideToggle('slow');
                //$('.TabbedPanels .TabbedPanelsContent:nth-child(2)').slideDown('slow');
                
                $('.TabbedPanelsTab').click(function(){
                                                        var x=$(this).attr('id');
                                                        //alert(x);
                                                        $('#s_'+x).hide();
                                                        $('#s_'+x).slideToggle('slow');
                                                          $('#ok').fadeIn('slow');});
            });
        </script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">radiograph</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 12px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?php echo base_url();?>assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/homepage"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a class="active-menu" href="<?php echo base_url(); ?>radiograph_supervisor/total_order_list"><i class="fa fa-desktop fa-3x"></i> ALL Requests</a>
                    </li>
                    <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/un_seen"><i class="fa fa-qrcode fa-3x"></i> Un Seen Requests</a>
                    </li>	
                    <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/order_list"><i class="fa fa-qrcode fa-3x"></i> Un Finished Requests</a>
                    </li>
                    <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/radiograph_external_request_done"><i class="fa fa-qrcode fa-3x"></i> Out Order Request</a>
                    </li>							 	
                      <li>
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/order_list_implemented"><i class="fa fa-table fa-3x"></i> Implemented Request</a>
                    </li>
                    <li  >
                        <a  href="<?php echo base_url(); ?>radiograph_supervisor/radiograph_external_request"><i class="fa fa-edit fa-3x"></i> Out Order Management </a>
                    </li>				
     				  <li>
                        <a   href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Section Activation</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
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
         <form id="form1" name="form1" method="post" action="<?php echo base_url();?>doctor/new_analyse_request">
         	<table width="50%" border="0">
    <tr>
      <td width="51%" height="41"><label for="patient_id">patient id</label>
      <input type="text" name="patient_id" id="patient_id" /></td>
      <td width="49%"><p>
        <label for="doctor_id">doctor id</label>
        <input type="text" name="doctor_id" id="doctor_id" />
    </p></td>
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
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
         <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
    
</body>
</html>