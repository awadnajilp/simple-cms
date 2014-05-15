<?php include('header.php');


   
?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Settings</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>Settings</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="settings-action.php"  enctype="multipart/form-data">
						  <fieldset >
							<legend>General Settings</legend>
							 <div class="control-group">
								<label class="control-label" for="focusedInput">Site Title</label>
								<div class="controls">
								  <input class="input-xlarge focused" value="<?php  echo execute_scalar("select `value` from `site_meta` where `name`='site_title'");?>" name="site_title" id="focusedInput" type="text" style="width:80%" >
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput">Primary Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" value="<?php  echo execute_scalar("select `value` from `site_meta` where `name`='primary_email'");?>"  name="email" id="focusedInput" type="text" style="width:80%" >
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput">Secondary Email</label>
								<div class="controls">
								  <input class="input-xlarge focused" value="<?php  echo execute_scalar("select `value` from `site_meta` where `name`='sec_email'");?>"  name="sec_email" id="focusedInput" type="text" style="width:80%" >
								</div>
							  </div>
							  </fieldset><fieldset>
							  <legend>Social</legend>
							 
							   <div class="control-group">
								<label class="control-label" for="focusedInput">Facebook ID</label>
								<div class="controls">
								  <input class="input-xlarge focused" value="<?php  echo execute_scalar("select `value` from `site_meta` where `name`='facebook'");?>"  name="fb" id="focusedInput" type="text" style="width:80%" >
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput">Twitter ID</label>
								<div class="controls">
								  <input class="input-xlarge focused" value="<?php  echo execute_scalar("select `value` from `site_meta` where `name`='twitter'");?>"  name="twitter" id="focusedInput" type="text" style="width:80%" >
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput">LinkedIn</label>
								<div class="controls">
								  <input class="input-xlarge focused" value="<?php  echo execute_scalar("select `value` from `site_meta` where `name`='linkedin'");?>"  name="linkedin" id="focusedInput" type="text" style="width:80%" >
								</div>
							  </div>
							  <input name="submit_form" type="hidden" value="1">
							  <div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>  
					</div>
				</div><!--/span-->


				<div class="box span6">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>Settings</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" id="changePass" action="change-password-action.php"  enctype="multipart/form-data">
						  <fieldset >
							<legend>Change Password</legend>
							 <div class="control-group">
								<label class="control-label" for="focusedInput">Old Password</label>
								<div class="controls">
								  <input class="input-xlarge focused" value="" name="old" id="focusedInput" type="password" style="width:80%" >
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput">New Password</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="password"  name="new" id="focusedInput" type="password" style="width:80%" >
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput">Confirm Password</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="cpassword" name="sec_email" id="focusedInput" type="password" style="width:80%" >
								</div>
							  </div>
							  </fieldset>
							  <input name="submit_form" type="hidden" value="1">
							  <div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>  
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


   
<?php include('footer.php'); ?>
 <script type="text/javascript">
    $(function(){
    	$("#changePass").submit(function(){
    		if($('#password').val() == $('#cpassword').val()){
    			$("#changePass").submit();
    		}else{
    			alert('Password do not match!');
    		}
    		return false;
    	});
    });
    </script>