<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
  
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu" style="background-color: #0D4F7A;">
				  <?php
                    
                    if (isset($pic))
					{        
					echo'<li class="text-center">
	                    	<img src="'.$pic.'" class="user-image img-responsive"/>
						</li>';
					}
					else 
						{
							echo'<li class="text-center">
	                    	<img src="'.base_url().'assets/img/find_user.png" class="user-image img-responsive"/>
						</li>';
					
						}
                   	$this->load->helper('sidebar');
                   	$side = side_array();
                    if (isset($side))
					{
					
                    if (is_array($side)){
                    $arrlength = count($side);
                    for($i=0;$i<$arrlength;$i++) {
						  $sidebar = explode(',', $side[$i]);
						if ($sidebar[3]=="True")
							$active = "active-menu";
						else 
							$active = "";
                   echo "<li>
                        <a  href=".base_url().$sidebar[2]." class=".$active." ><i class='fa ".$sidebar[0]." fa-3x'></i>".$sidebar[1]." </a>
                   </li>";
					}
						}
					else 
						{
							$sidebar = explode(',', $side);
							if ($sidebar[3]=="True")
							$active = "active-menu";
						else 
							$active = "";
                   echo "<li>
                        <a  href=".base_url().$sidebar[2]." class=".$active." ><i class='fa ".$sidebar[0]." fa-3x'></i>".$sidebar[1]." </a>
                   </li>";
						}
							}
							
					 if(isset($sub_menue))
					{
						 if (is_array($sub_menue)){
						 	$array_rows=count($sub_menue);
						  for($i=0;$i<$array_rows;$i++) {
						  	$arrlength=count($sub_menue[$i]);
						  	for($j=0;$j<$arrlength;$j++)
							{
								$subbar = explode(',', $sub_menue[$i][$j]);
							  	if($j==0)
									{
										if ($subbar[3]=="True")
											$active = "active-menu";
										else 
											$active = "";
										echo "<li><a href='#' class=".$active.">
										<i class='fa ". $subbar[0]." fa-3x'></i> ".$subbar[1]."<span class='fa arrow'></span></a>";
										echo " <ul class='nav nav-second-level'>";
									}
								else
									{
										if ($subbar[3]=="True")
											$active = "active-menu";
										else 
											$active = "";
										echo"<li>
	                                		<a href=".base_url().$subbar[2]." class=".$active.">".$subbar[1]."</a>".
	                            			"</li>";
										
									}
							}
						  	echo "</ul>
                      		</li>  "; 
								
						  }
							
						  
						 }
						 
						
					}
					?>
                    <!--
                      <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> UI Elements</a>
                    </li>
                    <li>
                        <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
                    </li>
						   <li  >
                        <a  href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
                    </li>	
                      <li  >
                        <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>				
					
					                   
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>  
                  <li  >
                        <a class="active-menu"  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                  </li>	-->
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
