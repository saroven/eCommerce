<nav id="primary-menu">

						<ul>
							<li>
								<a href="{{ url('/') }}"><div>Home</div></a>
							</li>
							
							<li><a href="#"><div>Categories</div></a>
								<ul>
									@foreach (categories() as $category)
									<li>
										<a href="#"><div>{{$category->title}}</div></a>
									</li>
									@endforeach
									
								</ul>
							</li>

							<li>
								<a href="#"><div>About</div></a>
							</li>
							
						</ul>

						<!-- Top Cart
						============================================= -->

						@php
							$cart = \Cart::getContent();
						@endphp
						<div id="top-cart">
							<a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>{{$cart->count()}}</span></a>
							<div class="top-cart-content">
								<div class="top-cart-title">
									<h4>Shopping Cart</h4>
								</div>
								<div class="top-cart-items">
										


										@if ($cart->count() == 0)
											<p>Your shopping cart is empty !</p>
										@else

											@foreach ($cart as $item)

												<div class="top-cart-item clearfix">
													<div class="top-cart-item-image">
														<a href="#"><img src="{{ asset('img/thumbnail') }}/{{product($item->id)->thumbnail}}" alt="{{$item->name}}" /></a>
													</div>
													<div class="top-cart-item-desc">
														<a href="{{ route('product.show', $item->id) }}">{{$item->name}}</a>
														<span class="top-cart-item-price">BDT {{$item->price}}</span>
														<span class="top-cart-item-quantity">x {{$item->quantity}}</span>
													</div>
												</div>	
											@endforeach

										@endif
										
									
								</div>
								@if ($cart->count() !== 0)
									<div class="top-cart-action clearfix">
									<span class="fleft top-checkout-price">BDT {{\Cart::getTotal()}}</span>
									<a href="{{ route('cart') }}" class="button button-3d button-small nomargin fright">View Cart</a>
								</div>
								@endif
							</div>
						</div>
						<!-- #top-cart end -->

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

					</nav>