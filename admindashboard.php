<?php 
include_once "abs/admin.php";

session_start();
?>

<!-- this is the  beginning of add news -->
<?php 

if ($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btnadd'])) {
	// validate 

	if (empty($_POST['title'])) {
		
		$errors['title'] = "Title Cannot be Empty!";

		
	}
	if (empty($_POST['name'])) {
			$errors['name'] ="Name Cannot be Empty!";
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

		if (empty($errors)) {
				// code...
					include_once "abs/common.php";
	$cmobj = new Common;
			$title = ($_POST['title']);
			$name =  ($_POST['name']);
			$category = ($_POST['category']);
			$subcat =($_POST['subcat']);
			$description =($_POST['description']);

			
			

			$obj = new Admin();
			

			//reference

			$output = $obj->addNews($title,$category,$subcat,$description,$name);


			//check if Successful 
			if ($output == true ) {
				// code...

				$msg =" News Was Successfully Uploaded ";

				//redirect

				header("Location:admindashboard.php?m=$msg");
				exit();
			}else{
				$errors[] = "OOPS! Could Not Upload News".$output;
			}

		}


}



	



?>

<!-- this is the End of Add News -->


<!-- this is the beginiinig of add admin -->


	<?php 

	


	?>

<!-- this is the end of Add Admin -->






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="images/absradio (2).png"/>
		<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
		<!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->

</head>
<style type="text/css">
	div{
		height:;
		border: px solid black ;
	}
	body{
	overflow-x:hidden ;
	overflow-y:;
		width: 100vw;
	}
	html{
		width: 100vw;
	}

		.banner{
				background-color: rgb(227,87,46);
				background-image: url("images/absradio (2).png");
				background-attachment: fixed;
				background-repeat:repeat;
				/*background-size: cover;*/
				width: 100%vw;
				
			}
			.overlay{
				background-color: rgba(0,0, 0, 0.5);
				
			}
			h2{color: white;}
			.cl11 {color: #fff;}
			.cl10 {color: #fff;}
			.bg2 {background-color: #0076c8;}
			.bg11 {background-color: #151515;}
			.img{
				width: 100% !important;
				height: 100% !important;
			}
</style>





<body class="" >
<div class="row body">
				<div class="col banner">
					<div class="row">
						<div class="col overlay">

							<header>
	
		<div class="container" >
			<div class="row" style=" background-color: white;">
				<div class="col-3" style="border:1px solid #ccc;">
				<img src="images/absradio.png " class="img-fluid py-2 " >	
				</div>

				<div class="col-9" style="text-align: center ; border:1px solid #ccc; ">
					<h1 class="" style="font-family: tahoma;font-weight: bold; color:#486db3; ">ABS RADIO ADMIN</h1>
				</div>
			</div>
		</div>

</header>
	<div  class="container">
		<div class="row">
			<div class="col">
	<?php if (isset($_REQUEST['m'])){?>


        <div class="alert alert-dismissible alert-success mt-3">

          <?php echo $_REQUEST['m'];?>
            	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>

        <?php

        }?>

        <?php if (isset($_REQUEST['e'])){?>


       <div class="alert alert-dismissible alert-danger mt-3">
          <?php echo $_REQUEST['e'];?>
           
        	<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>

        <?php

        }?>

      </div>
    </div>
  </div>


	<div class="container mt-2">
		 <?php 
            if (!empty($errors)){
                echo "<ul class='alert alert-danger'>";
                foreach($errors as $key => $value){
                  echo "<li>$value</li>";
                }
                echo "</ul>";
            }
          ?>
		
		<div class="row">
			<div class="col-4">
				
				<p>
					<button type="button" class="btn btn-warning form-control mb-1" name="addnews" id="addnews" style="font-size:16px;">
						ADD NEWS
					</button>

				</p>
				<p>

				<button name="addadmin" type="button" class="btn btn-info form-control mb-1" id="addadmin" style="font-size:16px;">ADD ADMIN</button>

				</p>
			

				<p>

				<button name="allnews" type="button" class="btn btn-success form-control mb-1" id="allnews" style="font-size:16px;">ALL NEWS</button>

				</p>

				<p>

				<button name="contact" type="button" class="btn btn-danger form-control mb-1" id="contact" style="font-size:16px;">ALL CONTACT</button>

				</p>

					<p>

				<button name="subscribers" type="button" class="btn btn-primary form-control mb-1" id="subscribers" style="font-size:16px;">SUBSCRIBERS</button>

				</p>

					<p>

				<button name="advert" type="button" class="btn btn-warning form-control mb-1" id="advert" style="font-size:16px;">All ADVERTISEMENT</button>

				</p>

			</div>

			<div class="col-8" id="con">
			
				
			</div>

		

		</div>
	</div>



		<footer class="">
			<div class="container-fluid bg2">
			
				<div class="row">
		


					</div> 
					<div style="color:white; text-align: center;">Copyright &copy; ABS-RADIO TV 2022</div>
						
				</div>
			</div>
			</div>
</div>
</div>


		</footer>

		










	 <script>
CKEDITOR.replace('description',{

  width: "100%",
  height: "200px"

}); </script>

	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			$('#addnews').click(function(){
				$.ajax({
					url:"addnews.php",
					type:"POST",
					success:function(data){
						$('#con').html(data);
					}

				})

			})

			//add headline 
			$('#allnews').click(function(){
				$.ajax({
					url:"news-list.php",
					type:"POST",
					success:function(data){
						$('#con').html(data);
					}

				})

			})

			//all contact
				$('#contact').click(function(){
				$.ajax({
					url:"allcontact.php",
					type:"POST",
					success:function(data){
						$('#con').html(data);
					}

				})

			})



			// add admin

				$('#addadmin').click(function(){
				$.ajax({
					url:"addadmin.php",
					type:"POST",
					success:function(data){
						$('#con').html(data);
					}

				})

			})

				//edit 
					$("#edit").click(function(){

				$.ajax({
					// url:"editnews.php",
					type:"POST",
					success:function(data){
					$('#con').html(data);
				},


				})
	

			})

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

<?php 

// include_once "portalfooter.php";

?>

</body>
</html>