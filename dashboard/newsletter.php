<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Newsletter</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>Newsletter</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="newsletter-action.php"  enctype="multipart/form-data">
						  <fieldset style="padding-right:20px;padding-left:-10px">
							<legend>Create Newsletter </legend>
							 <div class="control-group">
								<label class="control-label" for="focusedInput">  Title</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="title" id="focusedInput" type="text" style="width:100%" >
								</div>
							  </div>
							   
							<div class="control-group">
							  <label class="control-label" for="textarea2"> Content</label>
							  <div class="controls">
								<textarea class="cleditor" name="content" id="textarea2" rows="3"></textarea>
							  </div>
							  <input name="submit_form" type="hidden" value="1">
							</div>
								<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Send</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>All Newsletters</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Title</th>
								  <th>Date posted</th>
								  
							  </tr>
						  </thead>   
						  <tbody>
						<?php 
						$query = mysql_query("select * from newsletter ");
						$count = mysql_num_rows($query);
						if($count > 0): while($post = mysql_fetch_object($query)):?>
							<tr>
								<td><?php echo $post->title;?></td>
								<td><?php echo $post->date;?></td>
								
								
							</tr>
						<?php endwhile;endif;?>
						</tbody>
						</table>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


    
<?php include('footer.php'); ?>
