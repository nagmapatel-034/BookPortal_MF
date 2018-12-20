@extends('layout.app')
@section('content')
@include('inc.header')

<?php use App\book_author;
	use App\book_genre;?>
	
	<!-- banner -->
	<div class="banner">
			<div class="container">
				<h3 style="padding-left: 60px;">Book Portal, <span>Your World</span></h3>
			</div>
	</div>
	<!-- //banner --> 
	
	<!-- category -->
	@php($genre = book_genre::select('*')->get())
	@foreach($genre as $genre)
	<div class="new-products" style="padding: 0 0">

		@php ($count=0)
		@php ($count1=0)
		@php ($count2=0)
				<div class="container" style="padding-bottom: 20px;">
					<br/>
					<h3>{{$genre->genre_name}}</h3>	
					<div class="col-md-12 w3ls_mobiles_grid_right">
							<!--TIGA YANG FIRST-->
							<div class="w3ls_mobiles_grid_right_grid3">
								@if(count($books) > 0)
								@foreach($books as $book)
									@if($genre->genre_name === $book->genre_name)
									@if($count2<3)
									<div class="col-md-4 agile info_new_products_grid agile info_new_products_grid_mobiles">
										<div class="agile_ecommerce_tab_left mobiles_grid">
											<div class="hs-wrapper hs-wrapper2">
												<img src="{{$book->image_url}}" alt="No Image" class="img-responsive"/>	
											</div>
											<h5><a href="/book/{{$book->book_id}}">{{$book->book_title}}</h5>
												@php($authors = book_author::select('*')
														->leftjoin('book_contributor', 'book_contributor.author_id', '=', 'book_author.author_id')
														->where('book_id',$book->book_id)
														->get())
													<p>
													@foreach($authors as $author)
													{{$author->author_name}}
													@endforeach
													</p>
											<div class="col-md-12">
												<a class="button button2" href="book/{{$book->book_id}}" role="button">View More</a>
											</div> 
										</div>
										
									</div>
									@php($count2++)
									@endif
									@endif
								@endforeach
								@endif
								<div class="clearfix"> </div>
							</div>
						</div>
				</div>
				@php($count++)
	
			@if($count1<1)
			<a class="w3ls-cart" href="bookCategory/{{$genre->genre_id}}" role="button"  style="float: right; padding-right:200px;">View More</a>
				@php($count1++)
			@endif
		@endforeach
	</div>
	<!-- //category -->
@include('inc.footer')
@endsection