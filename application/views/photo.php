<?php
    
 foreach ($records as $row) 
    {
        if(!$row->id)
        {
            echo "خطأ في طلب الصورة";
        }
        else {
             header ("Content-type: ".$row->mime_type);
             echo $row->file_data;
			
        }
    }
 ?>