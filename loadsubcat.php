<?php 

$cat_id = $_REQUEST['catid'];

include_once "abs/admin.php";

//create object 
$obj = new Admin;

//make reference 

$subcat = $obj->getSubcat($cat_id);

$option = "<option value=''>Choose Sub-category</option>";



if (!empty($subcat)) {
	foreach($subcat as $key => $value){
		$subcatid = $value['SUBCAT_ID'];
		$subcatname = $value['SUBCAT_NAME'];


		$option .="<option value='$subcatid'>$subcatname</option>"; 
	}
}

echo "$option";
?>