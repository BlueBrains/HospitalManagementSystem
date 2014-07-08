    <div class="panel panel-primary">
        <div class="panel-heading">
            Patient Information
        </div>
        <div class="panel-body">
            <div class="panel-heading">
                             Patients 
                        </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        	<th>Patient name</th>
                                            <th>Date Of Birth</th>
                                            <th>Nationality Country</th>
                                            <th>City</th>
                                            <th>Marital Status</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
								   <?php
							      if (isset($record))
									{
									 if(is_array($record)){
							             foreach($record as $row ) 
							            {
							                echo "<tr>";
							                echo "<td>".$row->fname." ".$row->lname."</td>";
											
							                echo "<td>".$row->date_of_birth."</td>";
							                echo "<td>".$row->n_country."</td>";
							                echo "<td>".$row->n_town."</td>";
											echo "<td>".$row->marital_status."</td>";
							                echo "</tr>";
											
							            }
							         }
									  else
									  	{
									  }
									 }
									
							    ?>	
                                    </tbody>
                                </table>
                        
        </div>
    </div>
  </div>        
          <div class="panel panel-default">
                        <div class="panel-heading">
                            Entry Information
                        </div>
                        <div class="panel-body">
                           <form action="<?php echo base_url(); ?>recepient/enter_patient/id/<?php if (isset($row->id))echo $row->id; else echo $id;?>"> 
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Hospital Visiting Info</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="col-md-6">	
											       <div class='row' style="margin-bottom:20px">	
														<div class="input-group">
															<span class="input-group-btn">
																<button class="btn btn-default" type="button">Ward Class*</button>
											    			</span>	
															<select class="form-control" name="ward_class">
															    <option value="1">Class C</option>
															    <option value="2">Class B2</option>
															    <option value="3">Class B2+</option>
															    <option value="4">Class B1</option>
															    <option value="5">Class A1</option>
																<option value="6">Class A1+</option>
															</select>
														</div>	
													</div>
																	
								                    <div class="panel panel-success">
								                        <div class="panel-heading">
								                            Ward Class Features
								                        </div>
								                        <div class="panel-body">
								                            <p></p>
								                        </div>
								                    </div>
											    </div>
											    <div class="col-md-6">
								                	<div class='row' style="margin-bottom:20px">
														<div class="input-group">
															<span class="input-group-btn">
																<button class="btn btn-default" type="button">Room Number*</button>
											    			</span>
															<input type="text" name="room_id" id="room_id" class="form-control">		
														</div>
													</div>
													<div class='row' style="margin-bottom:30px">
														<div class="input-group">
															<span class="input-group-btn">
																<button class="btn btn-default" type="button">Bed Number*</button>
											    			</span>
															<input type="text" name="bed_id" id="bed_id" class="form-control">		
														</div>
													</div>
													<div class='row' style="margin-bottom:30px">
														<div class="input-group">
															<span class="input-group-btn">
																<button class="btn btn-default" type="button">Department ID*</button>
											    			</span>
																								
															<select class='form-control' placeholder='' name='section'>
																  <option value='2'>Accident and emergency (A&E)</option>
																  <option value='3'>Haematology</option>
																  <option value='4'>Pain management clinics</option>
																  <option value='5'>Ear nose and throat (ENT)</option>
																  <option value='6'>Obstetrics and Gynaecology</option>
																  <option value='6'>Intensive care unit (ICU) </option>
															</select>		
														</div>
													</div>
												</div>	
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Medical Information</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                          <div class="col-md-6">	
                                            <div class='row' style="margin-bottom:20px">	
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Patient Entry Way*</button>
									    			</span>	
													<select class="form-control" name="state_id">
													    <option value="1">Normal</option>
													    <option value="2">Emergency</option>
													    <option value="3">Another Hospital</option>
													</select>
												</div>	
											</div>
											<div class='row' style="margin-bottom:20px" >
												<button class="btn btn-default" type="button">Diagnosis</button>
									    		<textarea name="comment"cols="60" rows="4" class="form-control"></textarea>
									   		 </div>		                
										</div>
						                 <div class="col-md-6">
											<div class='row' style="margin-bottom:20px">
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Aider Name</button>
									    			</span>
													<input type="text" name="aider_id" id="aider_id" class="form-control">		
												</div>
											</div>
											<div class='row' style="margin-bottom:20px">
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Doctor Incharge Name</button>
									    			</span>
													<input type="text" name="doctor_name" id="doctor_name" class="form-control">		
												</div>
											</div>
											<div class='row' style="margin-bottom:40px">
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Doctor Incharge phone</button>
									    			</span>
													<input type="text" name="doctor_phone" id="doctor_phone" class="form-control">		
												</div>
											</div>
						                </div>			        
						         
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
               			        <p>
						            <button type="submit" class="btn btn-primary btn-lg">Enter Patient</button> 
						        </p>
						   <?php
						    if (isset($error) && is_string($error)){
							echo "<div class='alert alert-warning'>";
							echo "<a>".$error."</a>";
							echo "</div>";
						} ?>
						    </form>    
                        </div>
                    </div>