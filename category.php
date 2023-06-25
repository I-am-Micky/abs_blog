

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php 
			echo $_POST['category_name'];
			?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/absradio (2).png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<style type="text/css">
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
</style>
<body class="animsition">
	
	<!-- Header -->
<?php 
include_once "frontheader.php";

?>
<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category']) ) {
	// code...

include_once "abs/admin.php";
		
	

?>

	<!-- Breadcrumb -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.php" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				

				<span class="breadcrumb-item f1-s-3 cl9">
					<?php 
			echo $_POST['category_name'];
			?>
				</span>
			</div>

			<!-- <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div> -->
		</div>
	</div>

		

	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			<?php 
			echo $_POST['category_name'];
			?>
		</h2>
	</div>
		
	<!-- Feature post -->
	<section class="bg0">

		<div class="container">
		
			<div class="row m-rl--1">
				
				<div class="col-md-6 p-rl-1 p-b-2">
						<?php 

	$obj = new Admin();
			$cat_id = $_POST['catid'];
		
										//reference 
										$state_news= $obj->Category($cat_id);

										//check if there are products 

										if(count($state_news)>0){

											//loop through
											foreach ($state_news as $key => $value) {
												// code...
												$news = $value['NEWS_ID'];
												$newstitle = $value['TITLE'];
		?>
		<form method="post" action="news-detail.php?title=<?php echo $value['TITLE'] ?>" id="">	
					<div class="bg-img1 size-a-3 how1 pos-relative" id="here1" style="background-image: url(newsphotos/<?php echo $value['FEATURED_IMAGE']?>);">
						<button type ="submit" class="dis-block how1-child1 trans-03 btn-link"></button>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="#here1" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								<?php echo $value['SUBCAT_NAME']?>
							</a>

							<h3 class="how1-child2 m-t-14 m-b-10">
								<button type="submit" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03 btn-link">
									<?php echo $value['TITLE']?>
								</button>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
									<?php echo $value['FIRSTNAME'] . $value['LASTNAME']?>
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
									<?php echo $value['DATE_POSTED']?>
								</span>
							</span>
						</div>
					</div>
						<input type="hidden" name="title" value="<?php echo $value['TITLE']?>">
														<input type="hidden" name="newsid" value="<?php echo $value['NEWS_ID']?>">	
														<input type="hidden" name="featuredimage" value="<?php echo $value['FEATURED_IMAGE']?>">
														<input type="hidden" name="category" value="<?php echo $value['CAT_NAME']?>">
														<input type="hidden" name="sub-category" value="<?php echo $value['SUBCAT_NAME']?>">

														<input type="hidden" name="description" value="<?php echo $value['DESCRIPTION']?>">
														<input type="hidden" name="publisher" value="<?php echo $value['FIRSTNAME'] . $value['LASTNAME']?>">
														<input type="hidden" name="dateposted" value="<?php echo $value['DATE_POSTED']?>">
													</form>
					<?php 
				}
			}
					?>
				</div>

				<div class="col-md-6 p-rl-1">
						

					<div class="row m-rl--1">
						<?php 

	$obj = new Admin();
			$cat_id = $_POST['catid'];
		
										//reference 
										$state_news= $obj->Sidecategory($cat_id);

										//check if there are products 

										if(count($state_news)>0){

											//loop through
											foreach ($state_news as $key => $value) {
												// code...
												$news = $value['NEWS_ID'];
												$newstitle = $value['TITLE'];
		?>
						<div class="col-sm-6 p-rl-1 p-b-2">
							<form method="post" action="news-detail.php?title=<?php echo $value['TITLE'] ?>" id="">	
							<div class="bg-img1 size-a-14 how1 pos-relative" id="here" style="background-image: url(newsphotos/<?php echo $value['FEATURED_IMAGE']?>);">
								<button type ="submit" class="dis-block how1-child1 trans-03 btn-link"></button>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="#here" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										<?php echo $value['SUBCAT_NAME']?>
									</a>

									<h3 class="how1-child2 m-t-14">
										<button type="submit" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											<?php echo $value['TITLE']?>
										</button>
									</h3>
								</div>
							</div>
								<input type="hidden" name="title" value="<?php echo $value['TITLE']?>">
														<input type="hidden" name="newsid" value="<?php echo $value['NEWS_ID']?>">	
														<input type="hidden" name="featuredimage" value="<?php echo $value['FEATURED_IMAGE']?>">
														<input type="hidden" name="category" value="<?php echo $value['CAT_NAME']?>">
														<input type="hidden" name="sub-category" value="<?php echo $value['SUBCAT_NAME']?>">

														<input type="hidden" name="description" value="<?php echo $value['DESCRIPTION']?>">
														<input type="hidden" name="publisher" value="<?php echo $value['FIRSTNAME'] . $value['LASTNAME']?>">
														<input type="hidden" name="dateposted" value="<?php echo $value['DATE_POSTED']?>">
													</form>
						</div>

						<?php 
				}

			}

					?>	
					</div>
				
				</div>
				
			</div>
		
		</div>
			
	</section>

	<!-- Post -->
	<section class="bg0 p-t-70 p-b-55">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="row">
									<?php 

	$obj = new Admin();
			$cat_id = $_POST['catid'];
		
										//reference 
										$state_news= $obj->Morecategory($cat_id);

										//check if there are products 

										if(count($state_news)>0){

											//loop through
											foreach ($state_news as $key => $value) {
												// code...
												$news = $value['NEWS_ID'];
												$newstitle = $value['TITLE'];
		?>
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->
							<form method="post" action="news-detail.php?title=<?php echo $value['TITLE'] ?>" id="">	
							<div class="m-b-45">
								<button type="submit" class="wrap-pic-w hov1 trans-03 ">
									<img src="newsphotos/<?php echo $value['FEATURED_IMAGE']?>" alt="IMG">
								</button>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<button type="submit" class="f1-m-3 cl2 hov-cl10 trans-03 btn-link" name="title">
										<?php echo $value['TITLE']?>
										</button>
									</h5>

									<span class="cl8">
										<a class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo $value['FIRSTNAME'] . $value['LASTNAME']?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											<?php echo $value['DATE_POSTED']?>
										</span>
									</span>
								</div>
							</div>
						</div>
							<input type="hidden" name="title" value="<?php echo $value['TITLE']?>">
														<input type="hidden" name="newsid" value="<?php echo $value['NEWS_ID']?>">	
														<input type="hidden" name="featuredimage" value="<?php echo $value['FEATURED_IMAGE']?>">
														<input type="hidden" name="category" value="<?php echo $value['CAT_NAME']?>">
														<input type="hidden" name="sub-category" value="<?php echo $value['SUBCAT_NAME']?>">

														<input type="hidden" name="description" value="<?php echo $value['DESCRIPTION']?>">
														<input type="hidden" name="publisher" value="<?php echo $value['FIRSTNAME'] . $value['LASTNAME']?>">
														<input type="hidden" name="dateposted" value="<?php echo $value['DATE_POSTED']?>">
													</form>


						<?php 
					}
				}

						?>
					</div>

					<!-- Pagination -->
					<div class="flex-wr-s-c m-rl--7 p-t-15">
						<a href="#" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 pagi-active">1</a>
						<a href="#" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7">2</a>
					</div>
						<?php 

}
	?>

					<!-- advertisement -->

					<div class="container">
		<div class="flex-c-c">
			<!-- 1st advert -->
				<div class="row ">
				<div class="col banner">
					<div class="row">
						<div class="col overlay" style="height:90px  ;width:50vw ;border: 1px solid black;"><a href="#" style="color:white;">ADVERTISEMENT</a>
					
				</div>
			</div>
		</div>
	</div>		
</div>
	</div>

				</div>

				<div class="col-md-10 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">							
						<!-- Subscribe -->
				<!-- 		<div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-50">
											<?php 

							if (isset($_POST['btnsubmit'])) {
								// code...

			

							if (empty($_POST['email'])) {
		$errors['email'] = "Email Field is Required";
	}
				if (empty($errors)) {
						include_once "abs/common.php";
					$obj = new Common;
				
					$email = $obj->sanitizeInputs($_POST['email']);

				include_once "abs/admin.php";
				
				$user= new Admin();
							

					
					$output= $user->addSubscriber($email);
					if ($output == true ){
		// redirect user to login page
		$msg = " <div class='alert alert-dismissible alert-success mt-3'>

          
            <p>Subscription was successful</p>
        </div>";
		echo "$msg";
	}else{
		$errors[]="oops something happened";
	}

				}
			}

							?>
							<h5 class="f1-m-5 cl0 p-b-10">
								Subscribe
							</h5>

							<p class="f1-s-1 cl0 p-b-25">
								Get all latest content delivered to your email a few times a month.
							</p>

							<form class="size-a-9 pos-relative" method="post">
								<input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">

								<button type="submit" class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03" name="btnsubmit">
									<i class="fa fa-arrow-right"></i>
								</button>
							</form>
						
						</div> -->

						<!-- Most Popular -->
						<div class="p-b-23">
								<div class="flex-c-s p-t-8">
								<div class="row ">
				<div class="col banner">
					<div class="row">
						<div class="col overlay" style="height:600px  ;width:300px;border: 1px solid black;"><a href="#" style="color: white;">ADVERTISEMENT</a>
					
				</div>
			</div>
		</div>
	</div>
						</div>
						</div>

						<!--  -->
						<div class="flex-c-s p-b-50">
							<div class="row ">
				<div class="col banner">
					<div class="row">
						<div class="col overlay" style="height:600px  ;width:300px;border: 1px solid black;"><a href="#" style="color: white;">ADVERTISEMENT</a>
					
				</div>
			</div>
		</div>
	</div>
						</div>
						
						<!-- Tag -->
					<!-- 		<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									Tags
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Health
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Sports
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Entertainment
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Politics
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									International
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Nigeria
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									State
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Business
								</a>
								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Blogs
								</a>
							</div>	
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php 

		include_once "frontfooter.php";



	?>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>



</body>
</html>