
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href={{asset('css/app.css')}}>

<link href={{asset('css/mycustomstyle.css')}} rel="stylesheet" type="text/css" media="all" />

<link href={{asset('css/font-awesome.css')}} rel="stylesheet"> 

<script src={{asset('js/jquery.min.js')}}></script> 

<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="text/javascript" src={{asset('js/bootstrap-3.1.1.min.js')}}></script>

<script type="text/javascript">
jQuery(document).ready(function($) {
$(".scroll").click(function(event){		
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
});
});

</script>

<title>{{config('app.name', 'Book & Reco')}}</title>

<!-- flexslider -->
        <script defer src={{asset('js/jquery.flexslider.js')}}></script>
        <link rel="stylesheet" href={{asset('css/flexslider.css')}} type="text/css" media="screen" />
        <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
          $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
          });
        });
    </script>
<!-- flexslider -->

<!-- zooming-effect -->
    <script src= {{asset('js/imagezoom.js')}}></script>
<!-- //zooming-effect -->

<script src={{asset('js/easyResponsiveTabs.js')}} type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab1').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>
@include('inc.messages')
@include('inc.header')

<body>

@include('inc.breadCategory')
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