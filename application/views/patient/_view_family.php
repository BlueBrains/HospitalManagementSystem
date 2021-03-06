<div class='row' style="margin-bottom:50px">
<div class="table-responsive">
<table class="table table-hover" id='fm_table'>
    <thead>
    	<tr>
    		<th>Patient Name</th>
    		<th>Relationship</th>
            <th>Remove</th>
    	</tr>
    </thead>

    <tbody>
    	<tr>
    		<?php 
                foreach ($patient['family'] as $fm_info) {
                   $this->load->model('patient_model');
                   $spatient = $this->patient_model->get_public_info($fm_info->s_patient_id);
                   $name = $spatient->fname." ".$spatient->lname;
                   echo "<tr><td><a href='{$spatient->id}'>{$name}<a></td>
                        <td>{$fm_info->relationship}</td>
                        <td>
                            <button type='fm' id='{$fm_info->id}' class='btn delete'>
                                <span class=' glyphicon glyphicon-remove-sign'></span>
                            </button>
                        </td></tr>";
                }
            ?>
    	</tr>
    </tbody>

</table>
</div>

<br><br>
<div>
<?php echo form_open('patient/fm',array('role'=>'form','class'=>'add'),array('patient_id'=>$patient['public']->id));?>
    
    <div class="input-group">
        <span class="input-group-addon">Name:</span>
        <input type="text" class="form-control" name="name" placeholder="Select a Name">
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon">Relation Ship:</span>
        <input type="text" class="form-control" name="relationship" placeholder="relationship">
    </div>
    <br>
<?php
    echo form_submit(array('class'=>'btn btn-primary'), 'Add New Family Member'); 
    echo form_close()?>
</div>
</div>