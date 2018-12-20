<!-- breadcrumbs -->
<div class="breadcrumb_dress">
        <div class="container">
                <ul>
                        <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> 
                        <i> / </i></li>
                        @if(is_null($genre))
                        @else
                        <li><a href = "/bookCategory/{{$genre->genre_id}}"></span><li>{{$genre->genre_name}}</a>
                        @endif       
                        </a>
                        <i> / </i></li>
                        <li>{{$book->book_title}}</a>

                        


            
            
                </ul>
        </div>
    </div>
<!-- //breadcrumbs --> 