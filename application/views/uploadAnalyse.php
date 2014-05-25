<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <link rel="stylesheet" href="<?php echo base_url();?>/css/style2.css" type="text/css">
         <script src="<?php echo base_url();?>/javascript/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/javascript/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
        <link href="<?php echo base_url();?>/javascript/SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
       
        <script type="text/javascript">
            $(document).ready(function(){
                $('.menu_am').click(function(e)
                {
                    //alert($('#id').val());
                    var id=$(this).attr('id');
                    var x=$(this).attr('value');
                    $('#analyse').val(x);
                    $('#id').val(id);
                })
                
            })
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
              <form enctype="multipart/form-data" action="saveAnalyse" method="post">
                  <input type="text" name="patient_id" id="patient_id">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label for="patient_id">Patient ID</label>
                  <p>
                      <input type="text" name="analyse" id="analyse" value="">
                      <input type="hidden" id="id" name="id" value=""/>
                      
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label for="analyse">analyse type</label>
                      <ul id="MenuBar1" class="MenuBarVertical" class="menue">
                    <?php
                         $group_id=0;
                         $c=0;
                  
                            foreach ($records2 as $value) {
                                echo "<li id= "."'". $group_id ."'".">"."<a class= ".'"MenuBarItemSubmenu"' ."class= ".'"menue"'." href= ".'"#"'.">".$value->catagoury_name."</a>";
                                echo "<ul>";
                                $j=FALSE;
                                
                                while (!$j) {
                                   
                                     if(($c==count($records))||($records[$c]->catagoury_id!=$value->catagoury_id))
                                     {
                                         $j=TRUE;
                                     }
                                     else {
                                       
                                        echo "<li id= ". "'". $records[$c]->id ."'"." class= ".'"menu_am"'."value="."'". $records[$c]->analyse_name ."'".">"."<a href= ".'"#"'.">".$records[$c]->analyse_name ."</a></li>";           
                                        $c++;
                                     }
                                    
                                 }
                                echo "</ul>";
                                echo "</li>";
                                  $group_id++;
                                }
                    ?>
                    </ul>
                  
                  </p>
                  <p>
                  <label for="descreption">descreption</label>
               <textarea name="descreption" id="descreption"></textarea>
               
               </p>
               <p>
                <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
        <input type="file" name="fic" id="fic" size=25000000 />
        <input type="submit" value="send"/>
               </p>
              </div>
              </form>
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
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
     </body>
</html>