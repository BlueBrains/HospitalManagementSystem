<html>
	<body>
			<div class="row">		
			   <div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Patient Last Visit
                        </div>
                        <div class="panel-body">
                            <div class="col-md-4 col-sm-4">
                            	<div class="row" style="margin-bottom: 20px">
                            	</div>	
                            </div>	
                        </div>
                        <div class="panel-footer">
                            <?php if (isset($wrd)) echo "W - R - B".$wrd; ?>
                        </div>
                    </div>
                </div>
                
                <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Vital Signs</a>
                                        </h4>
                                        
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                        	<div class="row" style="margin-bottom: 15px">
                                        		<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Temperature</button>
									    			</span>
													<input type="text" name="temp" id="temp" class="form-control" >
													<span class="input-group-addon">C°</span>
												</div>
											</div>	
											<div class="row" style="margin-bottom: 15px">
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">Respiration</button>
									    			</span>
													<input type="text" name="res" id="res" class="form-control">
													<span class="input-group-addon">P.M</span>
												</div>
											</div>	  
											<div class="row" style="margin-bottom: 15px">
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">pulse</button>
									    			</span>
													<input type="text" name="pulse" id="pulse" class="form-control" >
													<span class="input-group-addon">BPM</span>
												</div>
											</div>	  
											<div class="row" style="margin-bottom: 15px">
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default" type="button">blood_pressure</button>
									    			</span>
													<input type="text" name="blood" id="blood" class="form-control">
													<span class="input-group-addon">mmHg</span>
												</div>
											</div>	    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
             </div>   
             
             <div class="row">		
			   <div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Patient update State
                        </div>
                        <div class="panel-body">
                            <div class='row' style="margin-bottom:20px" >
									<button class="btn btn-default" type="button">State</button>
						    		<textarea name="state"cols="60" rows="4" class="form-control"></textarea>
						    </div>	
						    <div class='row' style="margin-bottom:20px" >		
									<button type="button" class="btn btn-primary">Send Request </button>
							</div>
                        </div>
                        <div class="panel-footer">
                            <?php if (isset($wrd)) echo "W - R - B".$wrd; ?>
                        </div>
                    </div>
                </div>
              </div>  
       </body>         
</html>