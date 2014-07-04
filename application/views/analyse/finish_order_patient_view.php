<html>
	<head>
		
	</head>
	<body>
		<table>
		 <table width="100%" border="1">
        <?php
            
            foreach ($records as $row) 
            {
                echo "<tr>";
                echo "<td>".$row->Pname."</td>";
                echo "<td>".$row->Dname."</td>";
                echo "<td>".$row->Nname."</td>";
				if ($row->state==1)
				 {
					echo "<td> not uploaded </td>";
					echo "<td>    </td>";
				}
				else
					{
						echo "<td> uploaded </td>";
					echo "<td>"."<a href="."analyse/Analyse/".$row->id.">"."edit" ."</td>";
					}
                echo "</tr>";
            }
        ?>
    </table>

		</table>
	</body>
</html>