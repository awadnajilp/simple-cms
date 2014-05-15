<?php include('header.php');
$_type = 'page';
$_type_label = 'Page'; 
?>

	<link rel="stylesheet" type="text/css" href="css/upload.css" media="screen" />
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#"><?php echo $_type_label?></a>
					</li>
				</ul>
			</div>
<?php if (isset($_GET['src'])) {?>
				<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							Page Published Succesfully.
						</div>
			<?php }?>
			<div class="row-fluid sortable">
			<form class="form-horizontal" method="POST" action="page-action.php"  enctype="multipart/form-data">
				<div class="box span9">
					<div class="box-header well" data-original-title>
						<h2><i class=" icon-star"></i> New <?php echo $_type_label?> </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					
						  <fieldset style="padding-right:20px;padding-left:-10px">
							<legend>Create New <?php echo $_type_label?> </legend>
							 <div class="control-group">
								<label class="control-label" for="focusedInput"> <?php echo $_type_label?> Title</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="title" id="focusedInput" type="text" style="width:100%" >
								</div>
							  </div>
							   
							<div class="control-group">
							  <label class="control-label" for="textarea2"> <?php echo $_type_label?> Content</label>
							  <div class="controls">
								<textarea class="cleditor" name="content" id="textarea2" rows="3"></textarea>
							  </div>
							</div>

						

							<input type="hidden" name="_type" value="<?php echo $_type;?>">
							<input name="submit_form" type="hidden" value="1">
							<div id="media_upload">

							<input type="hidden" name="AddFiles" id="AddFiles" value="1">
		
			<div id="media_uploads" style="display:none"><input type="file" name="upload_file[]" class="hidden" style="diplay:none" id="upload_file" multiple /></div>
		
			<hr>
			<strong id="form-text">Upload Media </strong>
			<div class="button" id="uploadTrigger">Select Files</div>
			<hr>
			
			<div id="selectedFiles"></div> 

							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
					 
					</div>
				</div><!--/span-->
							<div class="box span3">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> Featured Image</h2>
						<div class="box-icon">
						
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							<div class="control-group">
							  
							  <label class="control-label" for="textarea2"> Set Featured Image</label>
								<input type="file" class="form-control" name="ft_img">
							  	
							</div>
					</div>
				</div><!--/span-->
			</form>   
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
