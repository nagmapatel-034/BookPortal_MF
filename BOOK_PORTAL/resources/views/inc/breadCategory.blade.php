<!-- breadcrumbs -->
<div class="breadcrumb_dress">
        <div class="container">
                <ul>
                        <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> 
                        <i> / </i></li>
                        @if(isset($genre))
                        <li><a href = "/bookCategory/{{$genre->genre_id}}"></span>{{$genre->genre_name}}</a>
                        @else
                        <li><a href = "/bookCategory"></span>All Book</a>        
                        @endif
                </ul>
        </div>
    </div>
<!-- //breadcrumbs --> 