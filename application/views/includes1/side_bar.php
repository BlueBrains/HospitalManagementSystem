<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
  
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
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
	                    	<img src="<?echo base_url();?>assets/img/find_user.png" class="user-image img-responsive"/>
						</li>';
					
						}
                    
                    
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
					?>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
