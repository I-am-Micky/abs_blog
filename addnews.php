<?php 



?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<title>Add News</title>
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
				<h2>ADD NEWS.<p style="font-size:10px ; ">(Must be Online to Upload News)<span style="color:red; font-size: 16px;">*</span></p></h2>
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
          				<h2 style="color:white;">Picture Must Be Less Than 1 MB<span style="color:red">!</span></h2>
				<form method="post" action="" class="form-control" enctype="multipart/form-data">
					
					<div class="control-group form-group">
						<div class="controls">
					<label class="form-label  ">Title: <span style="color:red; font-size: 16px;">*</span></label>
					<input type="text" name="title" class="form-control" id="title">
				</div>
			</div>

			<div class="control-group form-group">
						<div class="controls">
					<label class="form-label">Publisher Name: <span style="color:red; font-size: 16px;">*</span></label>
					<select class="form-select" name="name" id="name" >
			<option>Select Publisher</option>
			<?php

			include_once "abs/admin.php";

			//create object 

			$obj = new Admin();

			//make Reference 
			$role = $obj->getPub();

			if (count($role)>0) {
				foreach ($role as $key => $value) {
					// code...
				
				$role_id = $value['ADMIN_ID'];
				$role_name = $value['FIRSTNAME'] . $value['LASTNAME'];

				echo "<option value='$role_id'>$role_name</option>";
			}
		}


			?>

		</select>
				</div>
			</div>

			<div class="control-group form-group mt-2">
				
				<div class="controls">
					<label class="form-label" for="category">Category: <span style="color:red; font-size: 16px;">*</span></label>
					<select class="form-select" name="category" id="category" required >
						<option>Choose Category</option>

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
					<label for="subcat">Sub-Category: <span style="color:red; font-size: 16px;">*</span></label>
					<select class="form-select" name="subcat" id="subcat" disabled>
						<option value="">Select Sub-category</option>

					</select>

				</div>
			</div>
			


			<div class="control-group form-group mt-2">
            <div class="controls">
              <label>Featured Image: <span style="color:red; font-size: 16px;">*</span></label>
              <input type="file" class="form-control" id="emblem1" name='myfile'>
              
            </div>
          </div>
          

          


          <label class="form-label">Description: <span style="color:red; font-size: 16px;">*</span></label>
          <textarea name="description" rows="5" cols="50" class="form-control " id="description" style="resize: none;">
          	

          </textarea>
          
          


          	<button type="submit" class="btn btn-success form-control mt-2" name="btnadd" id="btnadd" > POST NEWS </button>

				</form>
		</div>
	</div>



</div>



 <script>                              
// Initialize CKEditor

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