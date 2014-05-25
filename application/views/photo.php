<?php
    
 foreach ($records as $row) 
    {
        if(!$row->result_id)
        {
            echo "خطأ في طلب الصورة";
        }
        else {
             header ("Content-type: ".$row->type);
             //echo "enter to photo view";
             //header( "localhost".DIRECTORY_SEPARATOR."xampp".DIRECTORY_SEPARATOR."test2".DIRECTORY_SEPARATOR."patient".DIRECTORY_SEPARATOR."photo.php?id=".$row->img_id);
            echo $row->photo_blob;
        }
    }
 ?>