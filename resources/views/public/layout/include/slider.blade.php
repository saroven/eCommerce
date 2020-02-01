		<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix" data-autoplay="7000" data-speed="650" data-loop="true">

			<div class="slider-parallax-inner">

				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
		{{-- slider start --}}
		@foreach (Latest() as $product)
						<div class="swiper-slide" style="background-image: url('{{ asset('img/thumbnail') }}/{{$product->thumbnail}}'); background-position: center top;">
							<div class="container clearfix">
								<div class="slider-caption">
									<a href=""><h2 data-animate="fadeInUp">{{$product->name}}</h2></a>
									{{-- <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p> --}}
								</div>
							</div>
						</div>
		@endforeach
		{{-- slider end --}}

					</div>
					<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
					<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
					<div class="swiper-pagination"></div>
				</div>

			</div>

		</section>