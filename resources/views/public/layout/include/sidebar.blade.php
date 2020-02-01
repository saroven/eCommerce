<div class="sidebar nobottommargin col_last">
						<div class="sidebar-widgets-wrap">

							<div class="widget widget_links clearfix">

								<h4>Shop Categories</h4>
								<ul>
									@foreach (categories() as $category)
										<li>
											<a href="{{ route('category.show', $category->id) }}">{{$category->title}}</a>
										</li>
									@endforeach
									
								</ul>

							</div>

							<div class="widget clearfix">

								<h4>Recent Items</h4>
								<div id="post-list-footer">

									@foreach (Latest() as $latest)
										<div class="spost clearfix">
										<div class="entry-image">
											<a href="#"><img src="{{ asset('img/thumbnail') }}/{{$latest->thumbnail}}" alt="Image"></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="{{ route('product.show',  $latest->id) }}">{{ $latest->name }}</a></h4>
											</div>
											<ul class="entry-meta">
												<li class="color">${{$latest->sell_price}}</li>
												<li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i></li>
											</ul>
										</div>
									</div>
									@endforeach

									

								</div>

							</div>

							<div class="widget clearfix">

								<h4>You May ALso Like</h4>
								<div class="widget-last-view">

									@foreach (scopeMightAlsoLike() as $item)
										<div class="spost clearfix">
										<div class="entry-image">
											<a href="#"><img src="{{ asset('img/thumbnail') }}/{{$item->thumbnail}}" alt="Image"></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">{{$item->name}}</a></h4>
											</div>
											<ul class="entry-meta">
												<li class="color">{{$item->sell_price}}</li>
												<li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i></li>
											</ul>
										</div>
									</div>
									@endforeach

								</div>

							</div>

							<div class="widget clearfix">

								<h4>Popular Items</h4>
								<div id="Popular-item">
									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#"><img src="{{ asset('fontend/images/shop/small/8.jpg') }}" alt="Image"></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Pink Printed Dress</a></h4>
											</div>
											<ul class="entry-meta">
												<li class="color">$21</li>
												<li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i></li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#"><img src="{{ asset('fontend/images/shop/small/5.jpg') }}" alt="Image"></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Blue Round-Neck Tshirt</a></h4>
											</div>
											<ul class="entry-meta">
												<li class="color">$19.99</li>
												<li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#"><img src="{{ asset('fontend/images/shop/small/12.jpg') }}" alt="Image"></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Men Aviator Sunglasses</a></h4>
											</div>
											<ul class="entry-meta">
												<li class="color">$14.99</li>
												<li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li>
											</ul>
										</div>
									</div>
								</div>

							</div>

							<div class="widget clearfix">
								<iframe src="https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FEnvato&amp;width=240&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:290px;" allowTransparency="true"></iframe>
							</div>

							<div class="widget subscribe-widget clearfix">

								<h4>Subscribe For Latest Offers</h4>
								<h5>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
								<form action="#" role="form" class="notopmargin nobottommargin">
									<div class="input-group divcenter">
										<input type="text" class="form-control" placeholder="Enter your Email" required="">
										<div class="input-group-append">
											<button class="btn btn-success" type="submit"><i class="icon-email2"></i></button>
										</div>
									</div>
								</form>
							</div>

							<div class="widget clearfix">

								<div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false">

									<div class="oc-item"><a href="#"><img src="{{ asset('fontend/images/clients/1.png') }}" alt="Clients"></a></div>
									<div class="oc-item"><a href="#"><img src="{{ asset('fontend/images/clients/2.png') }}" alt="Clients"></a></div>
									<div class="oc-item"><a href="#"><img src="{{ asset('fontend/images/clients/3.png') }}" alt="Clients"></a></div>
									<div class="oc-item"><a href="#"><img src="{{ asset('fontend/images/clients/4.png') }}" alt="Clients"></a></div>
									<div class="oc-item"><a href="#"><img src="{{ asset('fontend/images/clients/5.png') }}" alt="Clients"></a></div>
									<div class="oc-item"><a href="#"><img src="{{ asset('fontend/images/clients/6.png') }}" alt="Clients"></a></div>
									<div class="oc-item"><a href="#"><img src="{{ asset('fontend/images/clients/7.png') }}" alt="Clients"></a></div>
									<div class="oc-item"><a href="#"><img src="{{ asset('fontend/images/clients/8.png') }}" alt="Clients"></a></div>

								</div>

							</div>

						</div>
					</div>