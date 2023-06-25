<footer>
		<div class="bg2 p-t-40 p-b-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 p-b-20">
						<div class="size-h-3 flex-s-c">
							<a href="index.php">
								<img class="max-s-full mb-2" src="images/absradio.png" alt="LOGO">
							</a>
						</div>

						<div>
							<p class="f1-s-1 cl11 p-b-16">
								Anambra Broadcasting Service (ABS) is owned by the Anambra state government of Nigeria. It’s 2 FM and 2 TV stations covers Anambra and environs. ABS HISTORY Broadcasting, both Radio and Television, started simultaneously in Eastern Nigeria, Enugu regional capital, on the 1st of October, 1960. 
							</p>

							<p class="f1-s-1 cl11 p-b-16">
								Any questions? Call us on (+1) 96 716 6879
							</p>

							<div class="p-t-15">
								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-facebook-f"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-twitter"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-pinterest-p"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-vimeo-v"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-youtube"></span>
								</a>
							</div>
						</div>
					</div>
					<!-- end of about us -->

					<!-- begin of popular post -->

					<div class="col-sm-6 col-lg-6 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Latest Posts
							</h5>
						</div>

						<ul>
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
							<li class="flex-wr-sb-s p-b-20">
								<button type="submit" name="btn" class="size-w-4 wrap-pic-w hov1 trans-03">
								<img src="newsphotos/<?php echo $value['FEATURED_IMAGE']?>" alt="IMG">
								</button>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<button type="submit" class="f1-s-5 cl11 hov-cl10 trans-03">
											<?php echo $value['TITLE']?>
										</button>
									</h6>

									<span class="f1-s-3 cl6">
										<?php echo $value['DATE_POSTED']?>
									</span>
								</div>
							</li>
						</form>
						<?php }
					}?>
						</ul>
					</div>
					<!-- end of popular post -->

					<!-- begin of category -->

				<!-- 	<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Category
							</h5>
						</div>

						<ul class="m-t--12">
							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Entertainment (22)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Health (29)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									International (15)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Sports (28)
								</a>
							</li>

							
							</li>
						</ul>
					</div> -->
				</div>
			</div>
		</div>

		<div class="bg11">
			<div class="container size-h-4 flex-c-c p-tb-15">
				<span class="f1-s-1 cl0 txt-center">
					

					<a href="#" class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Project is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="" target="">Jiggy-Boy</a>

				</span>
			</div>
		</div>
	</footer>
