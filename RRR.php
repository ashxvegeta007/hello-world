


<style>
.bx-loading{
	width: 800px!important;

}
.bx-viewport{
	overflow: visible!important;
}
.bx-wrapper .bx-loading {

background:none!important;
}

</style>

<?php
require('includes/application_top.php');
$action = $_GET['action'];
if($action == 'showmodule'){
$module_id = $_GET['module_id'];
if($module_id){

	$get_module_data_query = tep_db_query("select * from index_module_data imd
	INNER JOIN index_module_manager imm ON imm.module_id = imd.module_id
	where imd.module_id = '$module_id'");
$get_module_data = tep_db_fetch_array($get_module_data_query);
$products_id  = $get_module_data['products_id '];
$module_heading  = $get_module_data['heading'];
$status  = $get_module_data['status'];
$subheading = preg_split('/~/',$get_module_data['title']);
$content = preg_split('/~/',$get_module_data['content']);
$images = preg_split('/~/',$get_module_data['image']);
$link = preg_split('/~/',$get_module_data['image_link']);
$text_link = preg_split('/~/',$get_module_data['heading_link']);

}
?>
			<?php  if($_GET["backend"]){ ?>
            <div style="margin-top:20px;float:left">
            <input type="checkbox" id="status<?php echo $module_id; ?>" name="status<?php echo $module_id; ?>" <?php if($status == 1) echo "checked"; ?> onClick="foobar_ajax('modst',this.checked,'<?php echo $module_id; ?>')"  /><img src="<?php echo DIR_WS_IMAGES_WEB; ?>images/delete-icon.png" width="19" height="20" style="cursor:pointer; margin-bottom:-5px;" onclick="foobar_ajax('detete_mod','<?php echo $module_id; ?>')" /> (<?php echo $module_id; ?>)<br/><?php /* echo $get_module_data['heading']; */ ?></div>
			<br/><br/>
			<?php } ?>
			<br>
			<div style="width:83%; display:block;font-family: ArialMT,sans-serif;" class="div_mbwti" >
<p style="border-bottom: solid 6px #4c4c4c;width: 50%;">Review Section</p>

    <?php
$count = count($images);
$i = 0;
for($i;$i< $count; $i++){
?>

<div class="<?php echo $module_id; ?> bxslider">
<?php
for ($i = 0; $i < $count; $i++) {
?>
<div>
<img class="rounded-circle shadow mb-4" src="<?php echo DIR_WS_IMAGES . 'images/' . $images[$i]; ?>"  style="width: 150px;" />
<div class="row justify-content-center">
<div class="col-lg-8">
<h5 class="mb-3"><?php echo $subheading[$i]; ?></h5>
<p><?php echo $text_link[$i]; ?></p>
<p class="text-muted">
<i class="fa fa-quote-left" aria-hidden="true"></i>
<?php echo $content[$i]; ?>
<i class="fa fa-quote-right" aria-hidden="true"></i>
</p>
</div>
</div>
</div>
    <?php
    }
    ?>
</div>

<?php
}
    ?>
</div>
<?php
}
if($action == 'edit'){
?>
<div id="mainbody">
<table border="0" width="100%">
 <tr>
   <td>
   <div class="module">
	<table width="100%" class="title" border="0">
		<tr>
		  <td align="center">Author Review</td>
		  <td align="right" width="1"><input type="submit" id="banner_with_heading_text_images" name="banner_with_heading_text_images" value="Save Module" class="rowbutton" /></td>
		</tr>


		<tr>


			</td>

		  <td >

			  <table width="100%" class="more_row_table" align="center" cellpadding="4px" cellspacing="1px" border="0">
				  <tr>
					<td colspan="2">
				<table width="110%" align="center" cellpadding="4px" cellspacing="1px" border="0">
						<tr class="data">
						<table class="more_row" style="width: 100%;">
						<td>
						<table style="width: 100%;" align="center" border="1">
							<tr class="data">
								<td class="label">
								<div style="padding:5px">
								<table align="center">
									<tr>
									  <td><b class="label">Author</b></td>
									  <td><?php echo tep_draw_input_field_main('sub_heading[]','','','text','','','','','','');?></td>
									  <td><b class="label">Author Comments</b></td>
									  <td><?php echo tep_draw_input_field_main('content[]','','','text','','','','','','' );?></td>
									  <td><b class="label">Image(316*274)</b></td>
									  <td><?php echo tep_draw_input_field_main('image[]','','','text','','','','','','' );?></td>
                                      <td><b class="label">Designation</b></td>
									  <td><?php echo tep_draw_input_field_main('link_text[]','','','text','','','','','','' );?></td>
									</tr>
									<tr>
									</tr>
								</table>
								</div>
								</td>
								<input type="hidden" id="ver_bannercount" value="1">
							</tr>
						</table>
						</td>
					 </tr>
					 </table>
				</table>

				<table width="100%" align="center" cellpadding="4px" cellspacing="1px" border="0">
					<tr class="data">
						<td class="label" align="center">
							<input type="button" id="ver_banner_class" value="Add Banner Block Upto 5" onclick="add_more_ver_banner_mod('more_row','more_row_table')" />
						</td>
					</tr>
				</table>

			</td>

			</tr>

			</table>
		  </td>
		</tr>
		</table>
	</div>
</td>
</tr>
</table>
</div>
		<?php
}
?>


