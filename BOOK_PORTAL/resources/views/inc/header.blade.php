
<!-- header modal -->
@if(Auth::guest())

<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 60% , margin:auto ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;</button>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Don't Wait, Login now!</h4>
      </div>
      <div class="modal-body modal-body-sub">
        <div class="row">
            <div class="sap_tabs">	
              <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;align-content: center;">
                <div style="display:inline-block; width: 100%;align-content:center;">
                  <ul style="text-align: center;">
                    <li class="resp-tab-item" aria-controls="tab_item-0"><a class="nav-link" href="#" style="color: black">{{ __('Login') }}</a></li>
                    <li class="resp-tab-item" aria-controls="tab_item-1"><a class="nav-link" href="#" style="color: black">{{ __('Register') }}</a></li>
                  </ul>
                </div>		
                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                  <div class="facts">
                    <div class="register" style="text-align: center;">
                        @include('auth.login')
                    </div>
                  </div> 
                </div>	 
                <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
                  <div class="facts">
                    <div class="register" >
                        @include('auth.register')
                    </div>
                  </div>
                </div> 			        					            	      
              </div>	
            </div>

  <!--AutoComplete jQuery.ui.js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--/AutoComplete jQuery.ui.js -->

            <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
            <script type="text/javascript">
              $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                  type: 'default', //Types: default, vertical, accordion           
                  width: 'auto', //auto or any width like 600px
                  fit: true   // 100% fit in a container
                });
              });
            </script>
            
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- header -->
<div class="header" id="home1">
    <div class="container">
      <div class="w3l_login" >
        <a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
        <p>Login</p>
      </div>
      <div class="w3l_logo" >
        <h1><a href="/">Book Portal<span>Your Library. Your Way.</span></a></h1>
      </div>
      <div class="search" >
        <input class="search_box" type="checkbox" id="search_box">
        <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
          <div class="search_form">

            <!-- Autocomplete section -->
            <form action="{{action('SearchController@show')}}" method="GET" role="search" autocomplete="off">
            <input type="text" name="q" id ="q" placeholder="Search keywords...">
            <input type="submit" value="send">
              <div id="bookList">
              </div>{{ csrf_field() }}
            <!-- /Autocomplete Section -->

            <!-- Dispay recorded database--> 
            <div class="container">
                @if(isset($details))
                <h2>Search Results for <b> {{ $query }} </b> ...</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Book Name</th>
                      <th>ISBN</th>
                      <th>Location</th>
                      <th>Status</th>
                      <th>Unit Available</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($details as $items)
                    <tr>
                      <td>{{$items->book_id}}</td>
                      <td>{{$items->book_title}}</td>
                      <td>{{$items->book_isbn}}</td>
                      <td>{{$items->book_location}}</td>
                      <td>{{$items->book_status}}</td>
                      <td>{{$items->book_unit}}</td>
          
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @elseif(isset($message))
                  <p>{{ $message }}</p>
            
                @endif
              </div>
          </form>
      </div>
    </div>
</div>
  <!-- //header -->

  <!-- navigation -->
<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="/" >Home</a></li>	
						
						<li><a href="/bookCategory" >Browse by Genre</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->

  @else
<!-- header after login-->
<div class="header" id="home1">
    <div class="container">
      <div class="w3l_login">
        <div class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="display: block;margin-left: auto;margin-right: auto"><span class="glyphicon glyphicon-user" aria-hidden="true" ></span></a>
        <div class="dropdown-content">
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <span class="glyphicon glyphicon-log-out" aria-hidden="true" style="fill: #C2C2C2">logout</span>
          </a>
          
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </div></div>
        <p style="font-size:15px; ">Hi,{{Auth::user()->user_fname}}</p>
        
      </div>
      <div class="w3l_logo" style="text-align: center;">
          <h1><a href="/">Book Portal<span>Your Library. Your Way.</span></a></h1>
        </div>

        <div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
            <div class="search_form">
              
            <!-- Autocomplete section -->
            <form action="{{action('SearchController@show')}}" method="GET" role="search" autocomplete="off">
            <input type="text" name="q" id ="q" placeholder="Search keywords...">
            <input type="submit" value="send">
              <div id="bookList">
              </div>
            <!-- /Autocomplete Section -->

                <!-- Dispay recorded database--> 
                <div class="container">
                    @if(isset($details))
                    <h2>Search Results for <b> {{ $query }} </b> ...</h2>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Book Name</th>
                          <th>ISBN</th>
                          <th>Location</th>
                          <th>Status</th>
                          <th>Unit Available</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($details as $items)
                        <tr>
                          <td>{{$items->book_id}}</td>
                          <td>{{$items->book_title}}</td>
                          <td>{{$items->book_isbn}}</td>
                          <td>{{$items->book_location}}</td>
                          <td>{{$items->book_status}}</td>
                          <td>{{$items->book_unit}}</td>
              
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @elseif(isset($message))
                      <p>{{ $message }}</p>
                
                    @endif
                  </div>
              </form>
            </div>
          </div>
        </div>
      
  
        <!--label style=" border-color=blue;"><a href="#" style="padding-left:20px;">logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></label-->
      </div>
    </div>
  </div>
  <!-- //header after login-->

  <!-- navigation -->
<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="/" >Home</a></li>	
						
						<li><a href="/bookCategory" >Genre</a></li>						

						<li><a href="/recommended">Recommended Book</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
@endguest

<script>
$(document).ready(function(){

 $('#q').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#bookList').fadeIn();  
                    $('#bookList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#q').val($(this).text());  
        $('#bookList').fadeOut();  
    });  

});
</script>
