<?php include('header.php');
$post_type = $_GET['post_type'];
$post_type_label = ucfirst(str_replace("_", " ", $_GET['post_type'])); 
?>

	<link rel="stylesheet" type="text/css" href="css/upload.css" media="screen" />
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#"><?php echo $post_type_label?></a>
					</li>
				</ul>
			</div>
<?php if (isset($_GET['src'])) {?>
				<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							Post Published Succesfully.
						</div>
			<?php }?>
			<div class="row-fluid sortable">
			<form class="form-horizontal" method="POST" action="post-action.php"  enctype="multipart/form-data">
				<div class="box span9">
					<div class="box-header well" data-original-title>
						<h2><i class=" icon-star"></i> New <?php echo $post_type_label?> post</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					
						  <fieldset style="padding-right:20px;padding-left:-10px">
							<legend>Create New <?php echo $post_type_label?> post</legend>
							 <div class="control-group">
								<label class="control-label" for="focusedInput"> <?php echo $post_type_label?> Title</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="title" id="focusedInput" type="text" style="width:100%" >
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput"> <?php echo $post_type_label?> Category</label>
								<div class="controls">
								  <select name="category" id="category">
								  <option value="" selected="selected">Select</option>
								  	<?php $sql = mysql_query("select * from category where parent='-1' and post_type='$post_type'");
								  	$c=mysql_num_rows($sql);if($c >0) { while($result = mysql_fetch_object($sql)):?>
								  	<option value="<?php echo $result->cat_id;?>"><?php echo $result->title;?></option>
								  <?php endwhile; }else{?>
								  <option value="">No Category</option>ee
								  <?php }?>
								  </select> <span> <a href="category-new.php?post_type=<?php echo $post_type;?>"> &nbsp; Add New Category</a> </span>
								</div>
							  </div>
							  <div id="sub_cat"></div>
							<div class="control-group">
							  <label class="control-label" for="textarea2"> <?php echo $post_type_label?> Content</label>
							  <div class="controls">
								<textarea class="cleditor" name="content" id="textarea2" rows="3"></textarea>
							  </div>
							</div>
							<input type="hidden" name="post_type" value="<?php echo $post_type;?>">
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
<script type="text/javascript">
	$(function(){
		$("#category").change(function(){
			var url = "actions/getSubCat.php";
			$.post(url,{cat_id:this.value},function(data){
				if(data != 0){
					$("#sub_cat").html(data);
				}else{
					$("#sub_cat_cont").remove();
				}
			});
		});
	});
</script> 