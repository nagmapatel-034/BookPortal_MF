@extends('layout.app')
@section('content')
@include('inc.header')

<?php use App\book_author;
	  use App\book_items;
	  use App\book_genre;
	  use App\user_preference;
	  ?>

	@php($count=0)

	<!-- Hot Book User Category -->
			<div class="container">
				<div class="top-brands">
				<h3>Recommended Based on Your Selected Preference</h3></div>
				
				@foreach($user as $users)
					@if($count<1)
						<div class="col-md-7 wthree_banner_bottom_right">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav nav-tabs" role="tablist">
									@foreach($user as $genre_tap)<li role="presentation"><a href="{{$genre_tap->genre_name}}" id="home-tab" role="tab" data-toggle="tab" aria-controls="{{$genre_tap->genre_name}}">
									{{$genre_tap->genre_name}}</a></li>@endforeach
									<br/>
									</ul>
									
									<div id="myTabContent" class="tab-content">
											@foreach($user as $genre_tap1)
											<div role="tabpanel" class="tab-pane fade active in" id="{{$genre_tap1->genre_name}}" aria-labelledby="{{$genre_tap1->genre_name}}">
											
												<div class="agile_ecommerce_tabs">

															<div class="col-md-12 agile_ecommerce_tab_left">
																	
																	@php ($book = book_items::select('*')
																	->join('book_category', 'book_category.book_id', '=', 'book_items.book_id')
																	->join('book_genre', 'book_genre.genre_id', '=', 'book_category.genre_id')
																	->where('book_genre.genre_id',$genre_tap1->genre_id)
																	->get())

																@php($count2=0)
																<div class="w3ls_mobiles_grid_right_grid3">
																		@if(count($book) > 0)
																		@foreach($book as $books)
																			@if($count2<3)
																			<div class="col-md-4 agile info_new_products_grid agile info_new_products_grid_mobiles">
																				<div class="agile_ecommerce_tab_left mobiles_grid">
																					<div class="hs-wrapper hs-wrapper2">
																						<img src="{{$books->image_url}}" alt="No Image" class="img-responsive"/>	
																					</div>
																					<h5><a href="/book/{{$books->book_id}}">{{$books->book_title}}</h5>
																						@php($authors = book_author::select('*')
																								->leftjoin('book_contributor', 'book_contributor.author_id', '=', 'book_author.author_id')
																								->where('book_id',$books->book_id)
																								->get())
																							<p>
																							@foreach($authors as $author)
																							{{$author->author_name}}
																							@endforeach
																							</p>
																					<div class="col-md-12">
																						<a class="button button2" href="book/{{$books->book_id}}" role="button">View More</a>
																					</div> 
																				</div>
																				
																			</div>
																			@php($count2++)
																			@endif
																		@endforeach
																		@endif
																		<div class="clearfix"> </div>
																</div>
															</div>
													<div class="clearfix"> </div>
												</div>
											</div>
											@endforeach
									</div>
								</div>
							</div>
						</div>
						@php($count++)
					@endif
				@endforeach
				<div class="clearfix"> </div>
			</div>
	<!-- //Hot Book User Category --> 
	
	
	
@include('inc.footer')