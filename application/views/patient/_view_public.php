<div class="table-responsive">
<table class="table table-hover">
    <thead>
    	<tr>
    		<th>Full Name</th>
    		<th>Birth Date</th>
    		<th>Naitve Countery</th>
    		<th>Naitve Town</th>
    		<th>Personal ID</th>
    		<th>Recored Num</th>
    		<th>Language</th>
    		<th>Marital Status</th>
    		<th>Comments</th>
    	</tr>
    </thead>

    <tbody>
    	<tr>
    		<?php 
    			echo "<td>{$patient['public']->fname} {$patient['public']->lname}</td>
		    		<td id='date_of_birth'>{$patient['public']->date_of_birth}</td>
		    		<td id='n_country'>{$patient['public']->n_country}</td>
		    		<td id='n_town'>{$patient['public']->n_town}</td>
		    		<td id='person_id'>{$patient['public']->person_id}</td>
		    		<td id='recored_number'>{$patient['public']->recored_number}</td>
		    		<td id='language'>{$patient['public']->language}</td>
		    		<td id='marital_status'>{$patient['public']->marital_status}</td>
		    		<td id='comments'>{$patient['public']->comments}</td>";
    		?>
    	</tr>
    </tbody>

</table>
</div>

<?php echo form_open('patient/edit',array('role'=>'form','class'=>'add','method'=>'PUT'),array('id'=>$patient['public']->id));?>
    
    <div class="input-group">
        <span class="input-group-addon">Field:</span>
        <select class="form-control" name='field'>
            <option value='date_of_birth'>Birth Date</option>
            <option value='n_country'>Naitve Countery</option>
            <option value='n_town'>Naitve Town</option>
            <option value='preson_id'>Personal ID</option>
            <option value='recored_number'>Recored Num</option>
            <option value='language'>Language</option>
            <option value='marital_status'>Marital Status</option>
            <option value='comments'>Comments</option>
        </select>
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon">Value:</span>
        <input type="text" class="form-control" name="value" placeholder="value">
    </div>
    <br>
<?php
    echo form_submit(array('class'=>'btn btn-primary'), 'Edit Information'); 
    echo form_close()
?>