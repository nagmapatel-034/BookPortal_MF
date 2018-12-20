
@include('inc.messages')
@include('inc.header')

<body>

<!-- breadcrumbs -->
@include('inc.breadCategory')
<!-- //breadcrumbs --> 

<!-- mobiles -->
<div class="mobiles">
    
    <div class="container">
        <div class="w3ls_mobiles_grids">

            @include('inc.list')
            
            @yield('content')
       
            <div class="clearfix"> 

            </div>
        </div>
    </div>
</div>  


        
</body>
