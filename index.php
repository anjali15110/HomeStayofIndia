<?php 
	
	include "admin/conn/conn.php";
	
	$sqlcategories = "select * from category";
	$querycategories = mysqli_query($conn, $sqlcategories);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php include "include/header_script.php";?>
	</head>
	<body>
	
		<?php include "include/header.php";?>
<section>
	<div style="margin-top: -74px;">
		<div class="owl-carousel owl-theme" id="mainslider">
			<div class="item">
				<div class="mainslider_images">
					<img src="images/mainsliderimages/Cover-Pic-1.jpg" />
				</div>
			</div>
			<<div class="item">
				<div class="mainslider_images">
					<img src="images/mainsliderimages/cover-1.jpeg" />
				</div>
			</div>
			<div class="item">
				<div class="mainslider_images">
					<img src="images/mainsliderimages/cover-2.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="mainslider_images">
					<img src="images/mainsliderimages/cover-3.jpg" />
				</div>
			</div>
		</div>
	</div>
	
	<div class="title">
		<div>
			<h2>HomeStay Of India | New Delhi | Delhi | India</h2>
			<span>_______</span>
			<span>_______</span>
			<p style="margin: 10px 0;"> B-140, Rama Park, Near Dwarka Mor Metro Station. New Delhi – 110059 INDIA</p>
		</div>
	</div>
</section>

<section style="margin-top: 88px;">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="py-2">
					<h2>About Homestays of India </h2>
					<p>HOI is National Award Winner enterprise dedicated to support authentic family run homestays across India. We aim to provide travelers a unique cultural experience and the locals an alternate source of income. Staying in homestays give an enriching experience. Homestay owners host their spaces in many different ways, which makes each homestay experience unique and full of discovery. Live in an informal setting and get an opportunity to interact with hosts and co-travelers, experience the local culture & traditions and taste India’s rich cuisine.</p>
					<button class="btn readmore">Read More</button>
				</div>
			</div>
			<div class="col-md-5">
				<div class="video py-2">
					<iframe width="100%" height="315" src="https://www.youtube.com/embed/pryiQKj3F4o"></iframe>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="categorieslist">
	<div class="container">
		<div class="mt-5">
			<div class="owl-carousel owl-theme" id="categories">
			<?php
				while($fetchcategories = mysqli_fetch_assoc($querycategories)){
			?>
				<div class="item">
					<div class="categoryimage">
					<a href="list_page.php?listid=<?php echo $fetchcategories['id'] ?>">
						<img src="<?php echo 'admin/images/category/' .$fetchcategories['category_image'] ?>" />
						</a>
					</div>
				</div>
			<?php
				}
			?>
			</div>
		</div>
	</div>
</section>

<section class="mb-5">
	<div class="container">
		<div class="testimonialwidth">
			<h2 class="my-4 text-center">Testimonials</h2>
			<div class="owl-carousel owl-theme" id="testimonial">
				<div class="item">
					<div class="testimonials">
						<p> The hospitality , the fresh organic local food, the people , the boat ride , the star gazing part ,etc etc . Everything about this place is just amazing! Will be visiting again very soon.”</p>
						<a>Read More</a>
						<h6> Julia Zane Thoidingjam, 24 Oct 2020</h6>
					</div>
				</div>
				<div class="item">
					<div class="testimonials">
						<p> The hospitality , the fresh organic local food, the people , the boat ride , the star gazing part ,etc etc . Everything about this place is just amazing! Will be visiting again very soon.”</p>
						<a>Read More</a>
						<h6> Julia Zane Thoidingjam, 24 Oct 2020</h6>
					</div>
				</div>
				<div class="item">
					<div class="testimonials">
						<p> The hospitality , the fresh organic local food, the people , the boat ride , the star gazing part ,etc etc . Everything about this place is just amazing! Will be visiting again very soon.”</p>
						<a>Read More</a>
						<h6> Julia Zane Thoidingjam, 24 Oct 2020</h6>
					</div>
				</div>
				<div class="item">
					<div class="testimonials">
						<p> The hospitality , the fresh organic local food, the people , the boat ride , the star gazing part ,etc etc . Everything about this place is just amazing! Will be visiting again very soon.”</p>
						<a>Read More</a>
						<h6> Julia Zane Thoidingjam, 24 Oct 2020</h6>
					</div>
				</div>
				<div class="item">
					<div class="testimonials">
						<p> The hospitality , the fresh organic local food, the people , the boat ride , the star gazing part ,etc etc . Everything about this place is just amazing! Will be visiting again very soon.”</p>
						<a>Read More</a>
						<h6> Julia Zane Thoidingjam, 24 Oct 2020</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>




		
		
		

       	<?php include "include/footer.php";?>
		<?php include "include/footer_script.php";?>
		
	<script>
		$('#mainslider').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			autoplay:true,
			autoplayTimeout:3000,
			animateIn:'fadeIn', 
			animateOut:'fadeOut',
			navText: ['<i class="fa-solid fa-angle-left fa-lg"></i></i>','<i class="fa-solid fa-angle-right fa-lg"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:1
				}
			}
		});
		
		$('#testimonial').owlCarousel({
			loop:true,
			margin:25,
			nav:true,
			autoplay:true,
			autoplayTimeout:3000,
			navText: ['<i class="fa-solid fa-angle-left fa-lg"></i></i>','<i class="fa-solid fa-angle-right fa-lg"></i>'],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:3
				}
			}
		})
		
		$('#categories').owlCarousel({
			loop:true,
			margin:25,
			nav:true,
			autoplay:true,
			autoplayTimeout:3000,
			navText: ['<i class="fa-solid fa-angle-left fa-lg"></i></i>','<i class="fa-solid fa-angle-right fa-lg"></i>'],
			responsive:{
				0:{
					items:3
				},
				600:{
					items:3
				},
				1000:{
					items:4
				}
			}
		})
	</script>
	</body>
</html>
