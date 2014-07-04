

    <?php if(isset($records) && count($records)) : ?>
       
         <?php foreach($records as $row) : ?>
             <p>
             <div id="<?php echo $row->id ; ?>" style="border: 1px solid black;">
                 <table>
            <tbody>
           
                <tr>
                    <td>Patient Name :</td>
                    <td><?php echo $row->Pname; ?></td>
                 </tr>
                 <tr>
                      <td>Doctor Name :</td>
                    <td><?php echo $row->Dname; ?></td>
                 </tr>
                 <tr>
                      <td>Analyse Name :</td>
                    <td><?php echo $row->Nname; ?></td>
                </tr>
                 </tbody>
        </table>
              </div>
         </p>
            <?php endforeach; ?>
    
    <?php endif; ?>
       