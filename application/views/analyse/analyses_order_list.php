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
				if($row->state==0)
				{
					echo "<td> not confirm </td>";
					echo "<td>"."<a href="."analyse/confirm_request/".$row->id.">"."confirm request"."</a><br/>";
				}
				elseif ($row->state==1)
				 {
					echo "<td> not uploaded </td>";
					echo "<td>"."<a href="."analyse/upload/".$row->id.">"."upload result"."</a><br/>";
				}
				else
					{
						echo "<td> uploaded </td>";
					echo "<td>"."<a href="."analyse/Analyse/".$row->id.">"."edit" ."</td>";
					}
                echo "</tr>";
            }
			echo "<a href="."analyse/confirm_request_all>"."confirm all request"."</a><br/>";
        ?>
    </table>

		</table>
	</body>
</html>