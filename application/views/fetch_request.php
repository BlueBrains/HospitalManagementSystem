<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <script src="<?php echo base_url();?>/javascript/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/javascript/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
        <link href="<?php echo base_url();?>/javascript/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css">
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
                                                      
                //alert( $(this).attr('id'))
                //e.relatedTarget
                //$('.TabbedPanels .TabbedPanelsContent:nth-child()').slideDown('slow')
                //$('.TabbedPanels .TabbedPanelsContent').slideToggle('slow')
                //$('.TabbedPanels .TabbedPanelsContent').click(function(e){alert("enter");});
                
            });
            
            
        </script>
    </head>
    <body>
        <div id="header">
        <a href="index.html" class="logo"><img src="<?php echo base_url();?>/images/logo.png" alt=""></a>
            <ul>
            <li class="selected">
                <a href="index.html">home</a>
            </li>
            <li>
                <a href="about.html">about</a>
            </li>
            <li>
                <a href="services.html">services</a>
            </li>
            <li>
                <a href="location.html">our locations</a>
            </li>
            <li>
                <a href="contact.html">contact</a>
            </li>
            <li>
                <a href="blog.html">blog</a>
            </li>
        </ul>
    </div>
     <div id="section">
        <div>
            <div>
                
            </div>
        </div>
    </div>
    <div id="featured">
        <div>
          <div class="article">
<form id="form1" name="form1" method="post" action="createRequest">
  <table width="50%" border="0">
    <tr>
      <td width="51%" height="41"><label for="patient_id">patient id</label>
      <input type="text" name="patient_id" id="patient_id" /></td>
      <td width="49%"><p>
        <label for="doctor_id">doctor id</label>
        <input type="text" name="doctor_id" id="doctor_id" />
    </p></td>
    </tr>
    <tr>
      <td colspan="2"><div id="TabbedPanels1" class="TabbedPanels">
        
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
         
             //echo $y['records2'][$i]->catagoury_id;
             // echo $y['records2'][$i+1]->catagoury_id;
            //  echo $x['records'][$c]->catagoury_id;
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
          </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="ok" id="ok" value="Submit" /></td>
    </tr>
  </table>
</form>
</div>
 <ul>
                <li>
                    <h3>hematology</h3>
                    <div>
                        <p>
                            Blood extraction using seismic energy for painless testing.
                        </p>
                        <a href="blog.html" class="more">read more</a>
                    </div>
                    <img src="<?php echo base_url();?>/images/hematology.jpg" alt="">
              </li>
                <li>
                    <h3>urine &amp; drug testing</h3>
                    <div>
                        <p>
                            Accurate and secure testing of urine for diseases and drugs and medicines.
                        </p>
                        <a href="blog.html" class="more">read more</a>
                    </div>
                    <img src="<?php echo base_url();?>/images/urine-and-drug-testing.jpg" alt="">
                </li>
                <li>
                    <h3>x-ray</h3>
                    <div>
                        <p>
                            Fast and clear x-ray results. You’ll be assisted by our friendly staff all the way.
                        </p>
                        <a href="blog.html" class="more">read more</a>
                    </div>
                    <img src="<?php echo base_url();?>/images/x-ray.jpg" alt="">
                </li>
                <li>
                    <h3>pathology and dna</h3>
                    <div>
                        <p>
                            State of the art testing for DNA that’s sure to be have fast and accurate results.
                        </p>
                        <a href="blog.html" class="more">read more</a>
                    </div>
                    <img src="<?php echo base_url();?>/images/pathology-and-dna.jpg" alt="">
                </li>
          </ul>

</div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
     </body>
</html>