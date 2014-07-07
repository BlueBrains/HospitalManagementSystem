<form method="post" action='<?php echo base_url(); ?>radiograph_supervisor/upload_image' name="koko" enctype="multipart/form-data"> 
<div class='row' style="margin-bottom:20px" style="padding-left: 20px" >
 <div class="col-md-6">
 	<input type="hidden" name="id" value="<?php echo $req_id; ?>" />
    <label>File input</label>
    <input type="file" name='fic' id="fic">
 
</div>
</div>
<div class='row' style="margin-bottom:20px" style="padding-right: 20px">
<div style="padding-left: 20px">			
			<button class="btn btn-default" type="button">Comment</button>
			
    			<textarea name="description"cols="50" rows="4" class="form-control"></textarea>
			</div>   		
 </div>
   <button type="submit" class="btn btn-default">Upload</button>  		
</form>
