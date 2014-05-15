 <?php  require_once('../../Connections/db_connect.php'); ?>
 <?php 
 $cat_id = $_POST['cat_id'];
 $sql = mysql_query("select * from category where parent='$cat_id'");
 $c=mysql_num_rows($sql);if($c >0) { ?>

 							<div class="control-group" id="sub_cat_cont">
								<label class="control-label" for="focusedInput">Sub Category</label>
								<div class="controls">
								  <select name="sub_category" id="sub_category">
								  <option value="" selected="selected">Select</option>
								  	<?php 
								  	while($result = mysql_fetch_object($sql)):?>
								  	<option value="<?php echo $result->cat_id;?>"><?php echo $result->title;?></option>
								  <?php endwhile; ?>e
								
								  </select> 
								</div>
							  </div>
<?php }else{
echo "0";
}?>