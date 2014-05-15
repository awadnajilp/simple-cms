<?php include('header.php'); ?><?php 
$banner_type = 'banner';

$query = mysql_query("select posts.id,uploads.file from posts  inner join uploads on posts.id=uploads.belongs_to where posts.post_type='banner';");
$count = mysql_num_rows($query);

if (isset($_GET['id'])) {
  	mysql_query("delete from pages where id=".$_GET['id']);
  	header("location:pages.php?del");
}
?>


	<link rel="stylesheet" type="text/css" href="css/upload.css" media="screen" />
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Home Banners</a>
					</li>
				</ul>
			</div>
<?php if (isset($_GET['deleted'])) {?>
				<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							 Deleted Succesfully.
						</div>
			<?php }?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>Banners</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							<div style="margin-bottom:17px;"><a class="btn btn-primary" href="#addnew">
										<i class=" icon-star icon-white"></i>  
										Add new <?php echo $banner_type;?>                                         
									</a></div>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Image</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						<?php if($count > 0): while($banner = mysql_fetch_object($query)):?>
							<tr>
								<td><img src="uploads/<?php echo $banner->file;?>" style="height:250px;"></td>
								<td class="center">
								
									<a class="btn btn-danger" onclick="return confirm('Are you sure ?');" href="delete.php?post_type=banner&id=<?php echo $banner->id;?>">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
						<?php endwhile;endif;?>
						</tbody>
						</table>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			<div class="row-fluid sortable">
				<div class="box span12" id="addnew">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>New Slideshow Item</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="banner-action.php"  enctype="multipart/form-data">
						  <fieldset style="padding-right:20px;padding-left:-10px">
							<legend>New Image</legend>
							 <div class="control-group">
								<label class="control-label" for="focusedInput">  Title</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="title" id="focusedInput" type="text" style="width:100%" >
								</div>
							  </div>
							   
							<div class="control-group">
							  <label class="control-label" for="textarea2"> Description</label>
							  <div class="controls">
								<textarea class="form-control" name="content" id="textarea2" style="width:100%" rows="3"></textarea>
							  </div>
							</div>
							  <input type="hidden" name="post_type" value="banner">
							<input name="submit_form" type="hidden" value="1">
							<div id="media_upload">

							<input type="hidden" name="AddFiles" id="AddFiles" value="1">
						
							<div id="media_uploads" style="display:none"><input type="file" name="upload_file[]" class="hidden" style="diplay:none" id="upload_file"  /></div>
						
							<hr>
							<strong id="form-text">Upload Media </strong>
							<div class="button" id="uploadTrigger">Select File</div>
							<hr>
							
							<div id="selectedFiles"></div> 

							</div>
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
	<script>
	$(function(){
		$("#upload_file").hide();
	});
     var selDiv = "";
	document.addEventListener("DOMContentLoaded", init, false);

	function init() {
		document.querySelector('#upload_file').addEventListener('change', handleFileSelect, false);
		selDiv = document.querySelector("#selectedFiles");

	}
		
	function handleFileSelect(e) {
		if(!e.target.files) return;
		var files = e.target.files;
		for(var i=0; i<files.length; i++) {
			var f = files[i];
			selDiv.innerHTML += "<div class='file_list'>"+f.name + "</div>";
		}
                
	}

	
	$(document).ready(function(){
		$('#upload_file').hide();
	    $("#uploadTrigger").click(function(){
		$("#upload_file").click();
            });	
	});

	</script>
