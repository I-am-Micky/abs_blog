



<?php 

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
			// code...
		include_once "abs/admin.php";
		$obj =new Admin();

   $data = $obj->getNews($_POST['newsid']);
		?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>	<?php echo $_POST['title']?></title>
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
		

		<!-- Breadcrumb -->
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.php" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				
				<span class="breadcrumb-item f1-s-3 cl9">
					<?php echo $_POST['title']?>
				</span>
			</div>

			<!-- <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
 -->		</div>
	</div>

	<!-- Content -->
	<section class="bg0 p-b-140 p-t-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<div class="p-b-70">
							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
								<?php echo $_POST['title']?>
							</h3>
							
							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
									<?php echo $_POST['publisher']?>
									</a>

									<span class="m-rl-3">-</span>

									<span>
										<?php echo $_POST['dateposted']?>
									</span>
								</span>

								<span class="f1-s-3 cl8 m-r-15">
									5239 Views
								</span>

								<a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
									0 Comment
								</a>
							</div>

							<div class="wrap-pic-max-w p-b-30">
								<img src="newsphotos/<?php echo $_POST['featuredimage']?>" alt="IMG">
							</div>

							<p class="f1-s-11 cl6 p-b-25">
								<?php if(isset($data['DESCRIPTION'])){ echo $data['DESCRIPTION']; }?>
							</p>

					

							<!-- Tag -->
							<div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
									Tags:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
										Streetstyle
									</a>

									<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
										Crafts
									</a>
								</div>
							</div>

							<!-- Share -->
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-facebook-f m-r-7"></i>
										Facebook
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-twitter m-r-7"></i>
										Twitter
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-google-plus-g m-r-7"></i>
										Google+
									</a>

									<a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-pinterest-p m-r-7"></i>
										Pinterest
									</a>
								</div>
							</div>
						</div>

						<!-- Leave a comment -->
						
					</div>
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">						
					

						
				

						<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Latest Post
								</h3>
							</div>
							

							<ul class="p-t-35">
								<?php 
							include_once "abs/admin.php";

							$obj = new Admin();
							$data = $obj->moreNews();
							if(count($data)>0){

											//loop through
											foreach ($data as $key => $value) {
												// code...
												$news = $value['NEWS_ID'];
												$newstitle = $value['TITLE'];
										


							?><form method="post" action="news-detail.php?title=<?php echo $value['TITLE'] ?>" id="">
								<li class="flex-wr-sb-s p-b-30">
									<button type="submit" class="size-w-10 wrap-pic-w hov1 trans-03" name="title">
									<img src="newsphotos/<?php echo $value['FEATURED_IMAGE']?>" alt="IMG">
									</button>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<button type="submit" name="title" class="f1-s-5 cl3 hov-cl10 trans-03">
											<?php echo $value['TITLE']?>
											</button>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a  class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php echo $value['SUBCAT_NAME']?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
													<?php 

																echo $value['DATE_POSTED'];
															?>
											</span>
										</span>
									</div>
								</li>
									<input type="hidden" name="title" value="<?php echo $value['TITLE']?>">

														<input type="hidden" name="newsid" value="<?php echo $value['NEWS_ID']?>">	
														<input type="hidden" name="featuredimage" value="<?php echo $value['FEATURED_IMAGE']?>">
														<input type="hidden" name="category" value="<?php echo $value['CAT_NAME']?>">
														<input type="hidden" name="sub-category" value="<?php echo $value['SUBCAT_NAME']?>">
														<input type="hidden" name="catid" value="<?php echo $value['CAT_ID']?>">	

														<input type="hidden" name="description" value="<?php echo $value['DESCRIPTION']?>">
														<input type="hidden" name="publisher" value="<?php echo $value['FIRSTNAME'] . $value['LASTNAME']?>">
														<input type="hidden" name="dateposted" value="<?php echo $value['DATE_POSTED']?>">
													</form>
								<?php }
							}?>

							</ul>
						
						</div>

						<!-- Tag -->
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

	<?php 
 }
	?>

</body>
</html>