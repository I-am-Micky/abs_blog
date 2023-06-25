
<?php 
include_once "portalheader.php";


include_once "abs/admin.php";

$obj =new Admin();

$data = $obj->getNews($_REQUEST['newsid']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnedit'])) {
	// code...

		if (empty($_POST['title'])) {
		
		$errors['title'] = "Title Cannot be Empty!";
	}
		
	

		if (empty($_POST['category'])) {
			$errors['category'] ="Please Select A Category";
		}
		if (empty($_POST['subcat'])) {
			$errors['subcat'] ="Please Select A Sub-Category!";
		}
		if (empty($_POST['description'])) {
			$errors['description'] ="DESCRIPTION Cannot be Empty!";
		}

		if (empty($errors)){
				// code...
			include_once "abs/common.php";
	$cmobj = new Common;

			$title = ($_POST['title']);
			
			$category = ($_POST['category']);
			$subcat =($_POST['subcat']);
			$description =($_POST['description']);
			$news_id=$_POST['newsid'];
			// $image = $_POST['myfile'];
			
			

			
			

			//reference

			$output = $obj->updateNews($title,$category,$subcat,$description,$news_id);


			//check if Successful 
			if ($output == true ) {
				// code...

				$msg =" News Was Successfully Updated ";

				//redirect

				header("Location:admindashboard.php?m=$msg");
				exit();
		}elseif ($output == 0){
          $msg = "No Changes was made!";
            header("Location: admindashboard.php?m=$msg");
        }else{
				$errors[] = "OOPS! Could Not Upload News".$output;
			}

		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<title>Edit News</title>
	<!-- CK EDITOR -->
<script src="ckeditor/ckeditor.js"></script>
	<style type="text/css">
		body{
		background-color: #EDEDED;
	}
	</style>
</head>
<body>


<div class="container">
	<div class="row">
		<div class="col">
				<h2>EDIT NEWS.<p style="font-size:10px ; ">(Must be Online to Upload News)<span style="color:red; font-size: 16px;">*</span></p></h2>
					<h2><p style="font-size:10px ; ">(FILL ALL FORMS!)<span style="color:red; font-size: 16px;">*</span></p></h2>
					<?php if (isset($_REQUEST['m'])){?>


        <div class="alert alert-success mt-3">
          <?php echo $_REQUEST['m'];?>
        </div>

        <?php

        }?>
					 <?php 
            if (!empty($errors)){
                echo "<ul class='alert alert-danger'>";
                foreach($errors as $key => $value){
                  echo "<li>$value</li>";
                }
                echo "</ul>";
            }
          ?>

				<form method="post" class="form-control" action="editnews.php?newsid=<?php if(isset($_REQUEST['newsid'])){ echo $_REQUEST['newsid'];}?>"   enctype="multipart/form-data">
					
					<div class="control-group form-group">
						<div class="controls">
					<label class="form-label  ">CHANGE Title: <span style="color:red; font-size: 16px;">*</span></label>
					<input type="text" name="title" class="form-control" id="title" value="<?php if(isset($data['TITLE'])){ echo $data['TITLE']; }?>
					">
				</div>
			</div>

			

			<div class="control-group form-group mt-2">
				
				<div class="controls">
					<label class="form-label" for="category">SELECT Category: <span style="color:red; font-size: 16px;">*</span></label>
					<select class="form-select" name="category" id="category" >
						<option  value="<?php if(isset($data['CAT_ID'])){ echo $data['CAT_ID']; }?>
					"><?php if(isset($data['CAT_NAME'])){ echo $data['CAT_NAME']; }?> </option>

						<?php 
						include_once "abs/admin.php";

						//create object 
						$obj = new Admin();

						//make reference 
						$cat = $obj->getCat();

						if(count($cat)>0){

						foreach ($cat as $key => $value) {
							$cat_id  = $value['CAT_ID'];
							$catname = $value['CAT_NAME'];


							echo "<option value='$cat_id'>$catname</option>";
						}
					}


						?>

					</select>

				</div>
			</div>

				<div class="control-group form-group mt-2">
				
				<div class="controls">
					<label for="subcat">SELECT Sub-Category: <span style="color:red; font-size: 16px;">*</span></label>
					<select class="form-select" name="subcat" id="subcat">
						<option value="<?php if(isset($data['SUBCAT_ID'])){ echo $data['SUBCAT_ID']; }?>
					" ><?php if(isset($data['SUBCAT_NAME'])){ echo $data['SUBCAT_NAME']; }?></option>



					</select>

				</div>
			</div>
			


			<div class="control-group form-group mt-2">
				<div class="row">
					<label class="form-label">UPDATE Image: <span style="color:red; font-size: 16px;">*</span></label>
					<div class="col-3">
						<div class="controls">
							
						<img src="newsphotos/<?php if(isset($data['FEATURED_IMAGE'])){ echo $data['FEATURED_IMAGE']; }?>" alt="IMG" class="img-fluid">
					</div>
					
				</div>
					<div class="col-8">
            <div class="controls">
              
              <input type="file" class="form-control" id="emblem1" name='myfile'>
              
            </div>
        </div>
          </div>
          

          


          <label class="form-label">Description: <span style="color:red; font-size: 16px;">*</span></label>
          <textarea name="description" rows="5" cols="50" class="form-control " id="description" style="resize: none;" value="">
          	<?php if(isset($data['DESCRIPTION'])){ echo $data['DESCRIPTION']; }?>

          </textarea>
          
          
          <input type="hidden" name="newsid" value="<?php if (isset($data['NEWS_ID'])){
          	echo $data['NEWS_ID'];
          } ?>">

          	<button type="submit" class="btn btn-success form-control mt-2" name="btnedit" id="btnedit" > EDIT NEWS </button>

          	
				</form>
		</div>

		<p  style="justify-content: flex-end;">
          	<a href="admindashboard.php">BACK</a>
          </p>
	</div>



</div>



 <script>
                        

                            
CKEDITOR.replace('description',{

  width: "100%",
  height: "200px"

}); 

                </script>




<!-- Jquery -->

	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" language="javascrpt">
		
		$(document).ready(function(){
			//get subcategory based on category selected 
			$("#category").change(function(){
				// get the category id 
				var cat_id = $(this).val();

				//fetch sub-category using Ajax Method 

				$.ajax({
					url:"loadsubcat.php",
					type:"POST",
					data:{catid: cat_id},
					success:function(response){
						$('#subcat').html(response);
						$('#subcat').prop('disabled',false);
					},

					error:function(err){
						alert("oops something went wrong");
					}
				});

			})
		})

	</script>


</body>
</html>