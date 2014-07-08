<div class="table-responsive">
<table class="table table-hover">
    <thead>
    	<tr>
    		<th>Address</th>
    		<th>Province</th>
    		<th>Current Countery</th>
    		<th>Email</th>
    		<th>Phone NUM</th>
    		<th>Cell Phone Num</th>
    		<th>Position</th>
    		<th>Company</th>
    		<th>Comments</th>
    	</tr>
    </thead>

    <tbody>
    	<tr>
    		<?php 
                if($patient['private'] != NULL){
                    echo "<td id='address'>{$patient['private']->address}</td>
                    <td id='province'>{$patient['private']->province}</td>
                    <td id='c_country'>{$patient['private']->c_country}</td>
                    <td id='email'>{$patient['private']->email}</td>
                    <td id='phone'>{$patient['private']->phone}</td>
                    <td id='cell'>{$patient['private']->cell}</td>
                    <td id='position'>{$patient['private']->position}</td>
                    <td id='company'>{$patient['private']->company}</td>
                    <td id='comments'>{$patient['private']->comments}</td>";
                }
            ?>
    	</tr>
    </tbody>

</table>
</div>

<?php echo form_open('patient/pr',array('role'=>'form','class'=>'add','method'=>'PUT'),array('id'=>$patient['private']->id));?>
    
    <div class="input-group">
        <span class="input-group-addon">Field:</span>
        <select class="form-control" name='field'>
            <option value="address">Address</option>
            <option value="province">Province</option>
            <option value="c_country">Current Countery</option>
            <option value="email">Email</option>
            <option value="phone">Phone NUM</option>
            <option value="cell">Cell Phone Num</option>
            <option value="position">Position</option>
            <option value="company">Company</option>
            <option value="comments">Comments</option>
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