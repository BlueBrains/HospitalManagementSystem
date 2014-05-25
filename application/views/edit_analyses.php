<html>
<head>
    <meta charset="UTF-8">
    <title>Laboratory Website Template</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css">
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
          <table width="100%" border="1" >
            <tr>
        <?php
             echo "<td>"."name:"."&nbsp".$records[0]->name."</td>";
                echo "<td>"."birthday:"."&nbsp".$records[0]->dates."</td>";
                //echo "<td>"."weight:"."&nbsp".$records[0]->weight."</td>";
                echo "<td>"."Blood Group:"."&nbsp".$records[0]->bloodGroup."</td>";   
            
        ?>
            </tr>
        </table>
        <p>
            <table width="100%" border="1">
        <?php
            
            foreach ($records as $row) 
            {
                echo "<tr>";
                echo "<td>"."analyse type:"."&nbsp".$row->analyse_type."</td>";
                echo "<td>"."result date:"."&nbsp".$row->result_date."</td>";
                echo "<td>"."Descreption:"."&nbsp".$row->description."</td>";
                //echo "<td>"."<a href=\"photo(".$row->img_id.")"."\">".$row->img_name."</a><br />";
                echo "<td>"."<a href="."edit_Analyse/".$row->analyse_id.">".$row->file_name."</a><br/>";
                echo "</tr>";
            }
        ?>
    </table>
        
        </p>
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
                    <a href=""><img src="<?php echo base_url();?>/images/urine-and-drug-testing.jpg" alt=""></a>
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
        
    </body>
    </html>