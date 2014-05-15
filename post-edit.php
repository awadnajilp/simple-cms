<?php include('header.php');
$post_type = $_GET['post_type'];
$post_type_label = ucfirst(str_replace("_", " ", $_GET['post_type'])); 
if (isset($_GET['id'])) {
	$post_id = $_GET['id'];
}
$query= mysql_query("select * from posts where id=$post_id");
$count = mysql_num_rows($query);
if ($count >0 ) {
	$recordset = mysql_fetch_object($query);
}else{
	die('Post not found!');
}
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
<?php if (isset($_GET['succ'])) {?>
				<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							Post saved Succesfully.
						</div>
			<?php }?>

			<?php if (isset($_GET['src'])) {?>
				<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							Post Published Succesfully.
						</div>
			<?php }?>
			<div class="row-fluid sortable">
			<form class="form-horizontal" method="POST" action="post-edit-action.php"  enctype="multipart/form-data">
				<div class="box span9">
					<div class="box-header well" data-original-title>
						<h2><i class=" icon-star"></i> Edit <?php echo $post_type_label?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					
					<input type="hidden" name="post_id" value="<?php echo $post_id;?>">
						  <fieldset style="padding-right:20px;padding-left:-10px">
							<legend>Edit <?php echo $post_type_label?></legend>
							 <div class="control-group">
								<label class="control-label" for="focusedInput"> <?php echo $post_type_label?> Title</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="title" id="focusedInput" type="text" style="width:100%" value="<?php echo $recordset->title;?>" >
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="focusedInput"> <?php echo $post_type_label?> Category</label>
								<div class="controls">
								  <select name="category" id="category">
								  <option value="" selected="selected">Select</option>
								  	<?php 
								  	$category_main = $recordset->post_cat;
								  	if($recordset->is_sub_cat == '1'){
								  		
								  		$sql_sub = "select * from category where cat_id='".$recordset->post_cat."'";
								  		$sub_cat_res = mysql_query($sql_sub);
								  			$recordset_sub = mysql_fetch_object($sub_cat_res);
								  			$category_main= $recordset_sub->parent;

								  	}
								  	$sql = mysql_query("select * from category where parent='-1' and post_type='$post_type'");
								  	$c=mysql_num_rows($sql);if($c >0) { while($result = mysql_fetch_object($sql)):
								  		if($result->cat_id == $category_main ):?>
								  	<option value="<?php echo $result->cat_id;?>" selected="selected"><?php echo $result->title;?></option>
								  	<?php continue; endif; ?>								  	
								  	<option value="<?php echo $result->cat_id;?>"><?php echo $result->title;?></option>
								  <?php endwhile; }else{?>
								  <option value="">No Category</option>ee
								  <?php }?>
								  </select> <span> <a href="category-new.php?post_type=<?php echo $post_type;?>"> &nbsp; Add New Category</a> </span>
								</div>
							  </div>
							  <div id="sub_cat">
							  <?php if($recordset->is_sub_cat == '1'){?>
 							<div class="control-group" id="sub_cat_cont">
							  <label class="control-label" for="focusedInput">Sub Category</label>
								<div class="controls">
							  <select name="sub_category" id="sub_category">
								  <option value="" selected="selected">Select</option>
							  	
							  	<?php echo $sql_query = "select * from category where parent=$category_main";
							  	$sql2 = mysql_query($sql_query);
								  	$c3=mysql_num_rows($sql2);if($c3 >0) { while($result = mysql_fetch_object($sql2)):
								  		if($result->cat_id == $recordset->post_cat):?>
								  	<option value="<?php echo $result->cat_id;?>" selected="selected"><?php echo $result->title;?></option>
								  	<?php continue; endif; ?>								  	
								  	<option value="<?php echo $result->cat_id;?>"><?php echo $result->title;?></option>
								  <?php endwhile; }else{?>
								  <option value="">No Category</option>ee
								  <?php }?>
								  </select> 
							  
							  </div>
							  </div>
							  	<?php }?>
							  </div>
							<div class="control-group">
						
							  <label class="control-label" for="textarea2"> <?php echo $post_type_label?> Content</label>
							  <div class="controls">
								<textarea class="cleditor" name="content" id="textarea2" rows="3"><?php echo $recordset->content; ?></textarea>
							  </div>
							</div>
							<input type="hidden" name="post_type" value="<?php echo $post_type;?>">
							<input name="submit_form" type="hidden" value="1">
							<div id="m">
							<div class="control-group">
						
							  <label class="control-label" for="textarea2">File Uploads</label>
								<div class="controls"><?php $sql = "select * from uploads where belongs_to=$recordset->id and post_type='$post_type' and type<>'jpg'";
								$query = mysql_query($sql);
								$count_uploads = mysql_num_rows($query);
								if($count_uploads > 0): while($result = mysql_fetch_object($query)):?>
								<a href="uploads/<?php echo $result->file;?>"><?php echo $result->title;?></a>
							<?php endwhile;endif;?>
							</div></div>
							</div>
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
							  
							  <?php if($recordset->featured_img != ''):?>
							  	<img src="uploads/ft_images/<?php echo $recordset->featured_img;?>" style="width:230px;height:auto"> &nbsp;
							  	 &nbsp; &nbsp; &nbsp;<br> 

							  	 <input type="hidden" name="tmp_ft_img" value="<?php echo $recordset->featured_img;?>">
							  <?php endif;?>
							  <br>
								<input type="file" class="form-control" name="ft_img">
							  	
							</div>
					</div>
				</div><!--/span-->
			</form>   
			</div><!--/row-->
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i> Image  Uploads</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<p class="center">
							<button id="toggle-fullscreen" class="btn btn-large btn-primary visible-desktop" data-toggle="button">Toggle Fullscreen</button>
						</p>
						<br/>
						<ul class="thumbnails gallery">
						<?php $sql = "select * from uploads where belongs_to=$recordset->id and post_type='$post_type' and type='jpg'";
								$query = mysql_query($sql);
								$count_uploads = mysql_num_rows($query);
								if($count_uploads > 0): while($result = mysql_fetch_object($query)):?>
								<li id="<?php echo $result->id;?>" class="thumbnail" data-image-id="<?php echo $result->id;?>">
								<a style="background:url(uploads/<?php echo $result->file;?>)" title="<?php echo $result->title;?>" href="uploads/<?php echo $result->file;?>"><img class="grayscale" src="uploads/<?php echo $result->file;?>" alt="<?php echo $result->title;?>"></a>
								</li>
							<?php endwhile;endif;?>
						</ul>
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