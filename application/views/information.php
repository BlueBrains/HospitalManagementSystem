
<html>
    <body>
        <table width="100%" height="82%" border="1">
            <?php
            foreach ($records as $row) 
             {
                echo "<tr>";
                echo "<td>"."Patient Name"."</td>";
                echo "<td>". $row->patientName ."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient BearthDay"."</td>";
                echo "<td>".$row->dates."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient Country"."</td>";
                echo "<td>".$row->country."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient City"."</td>";
                echo "<td>".$row->city."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient Address"."</td>";
                echo "<td>".$row->address."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient Phone"."</td>";
                echo "<td>".$row->phone."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient Mobile"."</td>";
                echo "<td>".$row->mobile."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient Emergencey_phone1"."</td>";
                echo "<td>".$row->emergencyPhone1."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient BloodGroup"."</td>";
                echo "<td>".$row->bloodGroup."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient addiction"."</td>";
                echo "<td>".$row->addiction."</td>";
                echo "</tr>";
                
                echo "<tr>";
                echo "<td>"."Patient Chronic_diseases"."</td>";
                echo "<td>".$row->chronicDiseases."</td>";
                echo "</tr>";
            }
            
        ?>
    </table>
    </body>
</html>
