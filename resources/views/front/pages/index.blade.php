@extends('front.layouts.master')
@section('title', __('unlimited'))
@section('content')


<!-- Hero Section Start -->
	<div class="hero hero-slider">
		<div class="hero-section">
			<!-- Hero Carousel Start -->
			<div class="hero-carousel">
				<div class="swiper">
					<div class="swiper-wrapper">
						<!-- Hero Slide Start -->
					  	<div class="swiper-slide">
							<div class="hero-slide">
								<div class="hero-slide-image">
									<img src="https://www.cypresspride.com/website/wp-content/uploads/2023/07/slider3.jpg" alt="">
								</div>

								<div class="hero-content">
									<div class="section-title">
										<h3>Welcome to ShowOff</h3>
										<h1>Simplify Your Life, Amplify Your Impact</h1>
									</div>
									<!-- <div class="hero-content-body">
										<p>Duis ultricies, tortor a accumsan fermentum, purus diam mollis velit, eu bibendum ipsum erat quis leo. Vestibulum finibus, leo dapibus feugiat rutrum, augue lacus rhoncus velit, vel scelerisque odio est.</p>
									</div> -->

									<div class="hero-content-footer">
										<a href="#" class="btn-default">Explore Now</a>
										<!-- <a href="#" class="btn-default btn-border">Contact Now</a> -->
									</div>
								</div>
							</div>
					  	</div>
						<!-- Hero Slide End -->

						<!-- Hero Slide Start -->
						<div class="swiper-slide">
							<div class="hero-slide">
								<div class="hero-slide-image">
									<img src="https://www.themailroombarberco.com/cdn/shop/articles/MailroomBarberCo_TeachingSession-7_2048x.jpg?v=1642018666" alt="">
								</div>

								<div class="hero-content">
									<div class="section-title">
										<h3>Welcome to ShowOff</h3>
										<h1>Unleashing Potential, Creating Impact</h1>
									</div>
									<!-- <div class="hero-content-body">
										<p>Duis ultricies, tortor a accumsan fermentum, purus diam mollis velit, eu bibendum ipsum erat quis leo. Vestibulum finibus, leo dapibus feugiat rutrum, augue lacus rhoncus velit, vel scelerisque odio est.</p>
									</div> -->

									<div class="hero-content-footer">
										<a href="#" class="btn-default">Explore Now</a>
										<!-- <a href="#" class="btn-default btn-border">Contact Now</a> -->
									</div>
								</div>
							</div>
					  	</div>
						<!-- Hero Slide End -->
					</div>

					<div class="hero-button-prev"></div>
					<div class="hero-button-next"></div>
				</div>
			</div>
			<!-- Hero Carousel End -->
		</div>
	</div>
	<!-- Hero Section End -->

	<!-- Property Type Section Start -->
	<div class="property-types">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Section Title Start -->
					<div class="section-title">
						<h3 class="wow fadeInUp">Categories Types</h3>
						<h2 class="text-anime">Explore Categories</h2>
					</div>
					<!-- Section Title End -->
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-6">
					<!-- Location Item Start -->
					<div class="location-item wow fadeInUp" data-wow-delay="0.25s">
						<!-- Location Image Start -->
						<div class="location-image">
							<figure>
								<img src="https://carfixo.in/wp-content/uploads/2022/05/car-wash-2.jpg" alt="img">
							</figure>
						</div>
						<!-- Location Image End -->

						<!-- Location Content Start -->
						<div class="location-content">
							<div class="location-header">
								<h3>Car Wash</h3>
								<p>22 Listings</p>
							</div>

							<div class="location-footer">
								<a href="shop-listings.html" class="btn-default">See More</a>
							</div>
						</div>
						<!-- Location Content End -->
					</div>
					<!-- Location Item End -->
				</div>

				<div class="col-lg-6 col-md-6">
					<!-- Location Item Start -->
					<div class="location-item wow fadeInUp" data-wow-delay="0.5s">
						<!-- Location Image Start -->
						<div class="location-image">
							<figure>
								<img src="https://assets-global.website-files.com/64277851f4875994f6a5388e/642eba075b124573aacd3ff7_How-Much-Does-a-Barber-Make-960x640.jpg" alt="">
							</figure>
						</div>
						<!-- Location Image End -->

						<!-- Location Content Start -->
						<div class="location-content">
							<div class="location-header">
								<h3>Saloon</h3>
								<p>22 Listings</p>
							</div>

							<div class="location-footer">
								<a href="shop-listings.html" class="btn-default">See More</a>
							</div>
						</div>
						<!-- Location Content End -->
					</div>
					<!-- Location Item End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Property Type Section End -->


	<!-- Testimonial Section Start -->
	<div class="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Section Title Start -->
					<div class="section-title">
						<h3 class="wow fadeInUp">Testimonial</h3>
						<h2 class="text-anime">What our Client Says</h2>
					</div>
					<!-- Section Title End -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<!-- Testimonial Carousel Start -->
					<div class="testimonial-slider">
						<div class="swiper">
							<div class="swiper-wrapper">
								<!-- Testimonial Slide Start -->
								<div class="swiper-slide">
									<div class="testimonial-slide">
										<div class="testimonial-rating">
											<img src="{{asset('front/assets/images/icon-rating.svg')}}" alt="">
										</div>

										<div class="testimonial-content">
											<p>Duis pulvinar metus elit, ut aliquam est sollicitudin finibus. Integer lobortis est interdum. Suspendisse nunc est, varius quis fringilla ac, commodo a Praesent non elit cursus, aliquam sapien quis, dictum tortor. Vestibulum eu nisl est.</p>
										</div>

										<div class="testimonial-author-info">
											<h3>- James Doe</h3>
											<figure class="image-anime">
												<img src="{{asset('front/assets/images/author-1.jpg')}}" alt="">
											</figure>
										</div>
									</div>
								</div>
								<!-- Testimonial Slide End -->

								<!-- Testimonial Slide Start -->
								<div class="swiper-slide">
									<div class="testimonial-slide">
										<div class="testimonial-rating">
											<img src="{{asset('front/assets/images/icon-rating.svg')}}" alt="">
										</div>

										<div class="testimonial-content">
											<p>Duis pulvinar metus elit, ut aliquam est sollicitudin finibus. Integer lobortis est interdum. Suspendisse nunc est, varius quis fringilla ac, commodo a Praesent non elit cursus, aliquam sapien quis, dictum tortor. Vestibulum eu nisl est.</p>
										</div>

										<div class="testimonial-author-info">
											<h3>- Jenisa James</h3>
											<figure class="image-anime">
												<img src="{{asset('front/assets/images/author-2.jpg')}}" alt="">
											</figure>
										</div>
									</div>
								</div>
								<!-- Testimonial Slide End -->

								<!-- Testimonial Slide Start -->
								<div class="swiper-slide">
									<div class="testimonial-slide">
										<div class="testimonial-rating">
											<img src="{{asset('front/assets/images/icon-rating.svg')}}" alt="">
										</div>

										<div class="testimonial-content">
											<p>Duis pulvinar metus elit, ut aliquam est sollicitudin finibus. Integer lobortis est interdum. Suspendisse nunc est, varius quis fringilla ac, commodo a Praesent non elit cursus, aliquam sapien quis, dictum tortor. Vestibulum eu nisl est.</p>
										</div>

										<div class="testimonial-author-info">
											<h3>- Alisha Silva</h3>
											<figure class="image-anime">
												<img src="{{asset('front/assets/images/author-3.jpg')}}" alt="">
											</figure>
										</div>
									</div>
								</div>
								<!-- Testimonial Slide End -->

								<!-- Testimonial Slide Start -->
								<div class="swiper-slide">
									<div class="testimonial-slide">
										<div class="testimonial-rating">
											<img src="{{asset('front/assets/images/icon-rating.svg')}}" alt="">
										</div>

										<div class="testimonial-content">
											<p>Duis pulvinar metus elit, ut aliquam est sollicitudin finibus. Integer lobortis est interdum. Suspendisse nunc est, varius quis fringilla ac, commodo a Praesent non elit cursus, aliquam sapien quis, dictum tortor. Vestibulum eu nisl est.</p>
										</div>

										<div class="testimonial-author-info">
											<h3>- Lisa Ray</h3>
											<figure class="image-anime">
												<img src="{{asset('front/assets/images/author-4.jpg')}}" alt="">
											</figure>
										</div>
									</div>
								</div>
								<!-- Testimonial Slide End -->
							</div>

							<div class="swiper-pagination"></div>
						</div>
					</div>
					<!-- Testimonial Carousel End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial Section End -->

	<!-- About Section Start -->
	<div class="about-us">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<!-- About Left Image Start -->
					<div class="about-images">
						<div class="about-video">
							<figure class="reveal image-anime">
								<img src="{{asset('front/assets/images/video-img-2.jpg')}}" alt="">
							</figure>

							<div class="video-play-button">
								<a href="https://www.youtube.com/watch?v=2JNMGesMC2Y" class="popup-video">
									<img src="{{asset('front/assets/images/icon-play.svg')}}" alt="">
								</a>
							</div>
						</div>

						<div class="about-image">
							<figure class="reveal image-anime">
								<img src="{{asset('front/assets/images/video-img-1.jpg')}}" alt="">
							</figure>
						</div>
					</div>
					<!-- About Left Image End -->
				</div>
				<div class="col-lg-6">
					<!-- About Content Start -->
					<div class="about-content">
						<!-- Section Title Start -->
						<div class="section-title">
							<h3 class="wow fadeInUp">About ShowOff</h3>
							<h2 class="text-anime">The Leading Listing Marketplace.</h2>
						</div>
						<!-- Section Title End -->

						<!-- About Content Body Start -->
						<div class="about-content-body">
							<p class="wow fadeInUp" data-wow-delay="0.5s">Duis pulvinar metus elit, ut aliquam est sollicitudin finibus. Integer lobortis est interdum. Suspendisse nunc est, varius quis fringilla ac, commodo a ante. Praesent non elit cursus, aliquam sapien quis, dictum tortor.</p>

							<ul>
								<li class="wow fadeInUp" data-wow-delay="0.75s">
									<div class="icon-box"><img src="{{asset('front/assets/images/icon-about-1.svg')}}" alt=""></div>
									<span>Make Life Easier</span>
								</li>

								<li class="wow fadeInUp" data-wow-delay="1s">
									<div class="icon-box"><img src="{{asset('front/assets/images/icon-about-2.svg')}}" alt=""></div>
									<span>Business Solutions</span>
								</li>

								<li class="wow fadeInUp" data-wow-delay="1.25s">
									<div class="icon-box"><img src="{{asset('front/assets/images/icon-about-3.svg')}}" alt=""></div>
									<span>Exceptional Lifestyle</span>
								</li>

								<li class="wow fadeInUp" data-wow-delay="1.5s">
									<div class="icon-box"><img src="{{asset('front/assets/images/icon-about-4.svg')}}" alt=""></div>
									<span>Complete 24/7 Security</span>
								</li>
							</ul>

							<a href="#" class="btn-default wow fadeInUp" data-wow-delay="1.75s">Read More</a>
						</div>
						<!-- About Content Body End -->

					</div>
					<!-- About Content End -->
				</div>
			</div>
		</div>
	</div>
	<!-- About Section End -->

@endsection

