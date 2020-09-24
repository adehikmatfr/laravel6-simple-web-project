<!DOCTYPE html>
<html>
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>MyReklame - Pesan Papan Iklan Berkualitas</title>
    
    <!--====== Favicon Icon ======-->

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{url('dash')}}/css/bootstrap.min.css">
    
    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{url('dash')}}/css/animate.css">
    
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{url('dash')}}/css/magnific-popup.css">
    
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{url('dash')}}/css/slick.css">
    
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{url('dash')}}/css/LineIcons.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{url('dash')}}/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{url('dash')}}/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{url('dash')}}/css/responsive.css">

    <link rel="stylesheet" href="{{url('leaflet')}}/leaflet.css" />
<script src="{{url('leaflet')}}/leaflet.js"></script>
<link rel="stylesheet" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
        <style type="text/css">
              #imgView{  
          padding:5px;
      }
      .loadAnimate{
          animation:setAnimate ease 5.5s infinite;
      }
      @keyframes setAnimate{
          0%  {color: #000;}     
          50% {color: transparent;}
          99% {color: transparent;}
          100%{color: #000;}
      }
      .custom-file-label{
          cursor:pointer;
      }

      #map {  
         width:1080px;
         height:500px;
          }
          @media (max-width:460px){
            #map { 
          width:330px;
          height:200px;
          }
          }

          </style>
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="spin">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand text-dark" href="">
                            MyReklame
                        </a> <!-- Logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a data-scroll-nav="0" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#product">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#contact">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#mapp">Maps</a>
                                </li>
                                 <li class="nav-item">
                                    <a data-scroll-nav="0" target="_blank" href="{{route('login')}}">Login</a>
                                </li>
                            </ul> <!-- navbar nav -->
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SLIDER PART START ======-->
    
    <section id="home" class="slider-area pt-100">
        <div class="container-fluid position-relative">
            <div class="slider-active">
                <div class="single-slider">
                    <div class="slider-bg">
                        <div class="row no-gutters align-items-center ">
                            <div class="col-lg-4 col-md-5">
                                <div class="slider-product-image d-none d-md-block">
                                    <img src="{{url('dash')}}/images/slider/1.jpg" alt="Slider">
                                    <div class="slider-discount-tag">
                                        <p>Best <br> quality</p>
                                    </div>
                                </div> <!-- slider product image -->
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="slider-product-content">
                                    <h3 class="slider-title mb-0" data-animation="fadeInUp" data-delay="0.3s"><span>Iklankan produk Pada</span> Papan Iklan <span></span></h3>
                                    <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">tayangkan iklan lebih mudah anda bisa alokasikan sekarang <br> cari lokasi yang anda inginkan skarang.</p>
                                    <a class="main-btn" href="#contact" data-animation="fadeInUp" data-delay="1.5s">Lanjutkan.. <i class="lni-chevron-right"></i></a>
                                </div> <!-- slider product content -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- single slider -->

                <div class="single-slider">
                        <div class="slider-bg">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-md-5">
                                    <div class="slider-product-image d-none d-md-block">
                                        <img src="{{url('dash')}}/images/slider/3.jpg" alt="Slider">
                                        <div class="slider-discount-tag">
                                            <p>get <br> place</p>
                                        </div>
                                    </div> <!-- slider product image -->
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="slider-product-content">
                                        <h3 class="slider-title mb-8" data-animation="fadeInUp" data-delay="0.3s"><span>Cari Lokasi</span> Papan Iklan <span>Disini</span></h3>
                                        <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">tentukan lokasi yang anda inginkan</p>
                                        <a class="main-btn" href="#contact" data-animation="fadeInUp" data-delay="1.5s">Lanjutkan..<i class="lni-chevron-right"></i></a>
                                    </div> <!-- slider product content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                </div> <!-- single slider -->

                <div class="single-slider">
                        <div class="slider-bg">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-md-5">
                                    <div class="slider-product-image d-none d-md-block">
                                        <img src="{{url('dash')}}/images/slider/2.jpg" alt="Slider">
                                        <div class="slider-discount-tag">
                                            <p>Bussines<br> JOIN</p>
                                        </div>
                                    </div> <!-- slider product image -->
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="slider-product-content">
                                        <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>Jadilah</span> Rekan Bisnis <span>Kami</span></h1>
                                        <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">Pesan Sekarang Juga</p>
                                        <a class="main-btn" href="#contact" data-animation="fadeInUp" data-delay="1.5s">Contact Us <i class="lni-chevron-right"></i></a>
                                    </div> <!-- slider product content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                </div> <!-- single slider -->
            </div> <!-- slider active -->
            
            </div>
        </div> <!-- container fluid -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->
   
    <!--====== DISCOUNT PRODUCT PART START ======-->
    
    <section id="discount-product" class="discount-product pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-discount-product mt-30">
                        <div class="product-image">
                            <img src="{{url('img')}}/bilboard/{{$bil[0]->gambar1}}" alt="Product">
                        </div> <!-- product image -->
                        <div class="product-content">
                            <h4 class="content-title mb-15 text-warning">Lihat Produk <br> Papan Kami</h4>
                            
                        </div> <!-- product content -->
                    </div> <!-- single discount product -->
                </div>
                <div class="col-lg-6">
                    <div class="single-discount-product mt-30">
                        <div class="product-image">
                        <img src="{{url('img')}}/bilboard/{{$bil[1]->gambar1}}" alt="Product">
                        </div> <!-- product image -->
                        <div class="product-content">
                            <h4 class="content-title mb-15 text-warning">Pilihan <br> Alokasi Penayangan</h4>
                            
                        </div> <!-- product content -->
                    </div> <!-- single discount product -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== DISCOUNT PRODUCT PART ENDS ======-->
   
    <!--====== PRODUCT PART START ======-->
    
    <section id="product" class="product-area pt-100 pb-130">
        <div class="container">
            <div class="row">
            
                </div>
                <div class="col-lg-12 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-furniture" role="tabpanel" aria-labelledby="v-pills-furniture-tab">
                            <div class="product-items mt-30">
                                <div class="row product-items-active">
                                    
                                @foreach($bil as $b)
                                    <div class="col-md-4">
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                                <a href="#"><img src="{{url('img')}}/bilboard/{{$b->gambar1}}" alt="Product"></a>
                                                
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href="#"></a></h5>
                                                <ul class="rating">
                                                    <li><i class="lni-star-filled"></i></li>
                                                    <li><i class="lni-star-filled"></i></li>
                                                    <li><i class="lni-star-filled"></i></li>
                                                    <li><i class="lni-star-filled"></i></li>
                                                </ul>
                                                <span class="">Tipe : {{$b->tipe_bil}}</span><br>
                                                <span class="">Ukuran : {{$b->ukuran_lebar}}x{{$b->ukuran_tinggi}} m</span><br>
                                                <span class="">Alamat : {{$b->alamat_bil}}</span>
                                                
                                            </div>
                                        </div> <!-- single product items -->
                                    </div>
                                @endforeach
                                    
                                </div> <!-- row -->
                            </div> <!-- product items -->
                        </div> <!-- tab pane -->
        </section>

        
        <section id="mapp" class="contact-area pt-115">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                <div id="map" ></div>
                <br>
                Keterangan : 
                <img src="https://img.icons8.com/ultraviolet/20/000000/filled-flag.png"/> Di pesan
                <img src="https://img.icons8.com/office/20/000000/marker.png" alt=""> Belum Di Pesan
                </div>
            </div>
        </div>
        </section>

    <!--====== CONTACT PART START ======-->
    
    <section id="contact" class="contact-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-title text-center">
                        <h2 class="title">Get In Touch</h2>
                    </div> <!-- contact title -->
                </div>
            </div> <!-- row -->
            <div class="contact-box mt-70">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info pt-25">
                            <h4 class="info-title">Contact Info</h4>
                            <ul>
                                
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>{{$owr->alamat_email}}</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-home"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>{{$owr->alamat}}</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                            </ul>
                        </div> <!-- contact info -->
                    </div> 
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form id="contact-form" action="assets/contact.php" method="post" data-toggle="validator">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-form form-group">
                                            <input type="text" name="name" placeholder="Enter Your Name" data-error="Name is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-form form-group">
                                            <input type="email" name="email" placeholder="Enter Your Email"  data-error="Valid email is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <textarea name="message" placeholder="Enter Your Message" data-error="Please,leave us a message." required="required"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-lg-12">
                                        <div class="single-form form-group">
                                            <button class="main-btn" type="submit">CONTACT NOW</button>
                                        </div> <!-- single form -->
                                    </div>
                                </div> <!-- row -->
                            </form>
                        </div> <!-- row -->
                    </div> 
                </div> <!-- row -->
            </div> <!-- contact box -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->

   

    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    
    
    
    
    
    
    
    
    
    
    <!--====== jquery js ======-->
    <script src="{{url('dash')}}/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{url('dash')}}/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{url('dash')}}/js/bootstrap.min.js"></script>
    
    
    <!--====== Slick js ======-->
    <script src="{{url('dash')}}/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{url('dash')}}/js/jquery.magnific-popup.min.js"></script>

    
    <!--====== nav js ======-->
    <script src="{{url('dash')}}/js/jquery.nav.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="{{url('dash')}}/js/jquery.nice-number.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="{{url('dash')}}/js/main.js"></script>


    
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>

<script>
var mymap = L.map('map').setView([-7.186850, 108.362642], 13);
	var LeafIcon = L.Icon.extend({
		options: {
			shadowUrl: 'leaf-shadow.png',
			iconSize:     [38, 95],
			shadowSize:   [50, 64],
			iconAnchor:   [22, 94],
			shadowAnchor: [4, 62],
			popupAnchor:  [-3, -76]
		}
	});

    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	 attribution: 'keep smile :)',
   maxZoom: 20,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
}).addTo(mymap);

var srcmark = L.icon({
    iconUrl: "https://img.icons8.com/officel/40/000000/map-pin.png",
    shadowUrl: 'leaflet/images/marker-shadow.png',
    iconSize:     [36, 45], // size of the icon
    shadowSize:   [45, 66], // size of the shadow
    iconAnchor:   [8, 40], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [9, -45] // point from which the popup should open relative to the iconAnchor
});

L.control.scale().addTo(mymap);

var searchControl = new L.esri.Controls.Geosearch().addTo(mymap);

  var results = new L.LayerGroup().addTo(mymap);

  searchControl.on('results', function(data){
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng,{icon: srcmark}));
    }
    
  });



var greenIcon = L.icon({
    iconUrl: "https://img.icons8.com/office/50/000000/marker.png",
    shadowUrl: 'leaflet/images/marker-shadow.png',
    iconSize:     [36, 45], // size of the icon
    shadowSize:   [45, 66], // size of the shadow
    iconAnchor:   [8, 40], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [10, -45] // point from which the popup should open relative to the iconAnchor
});

var markok = L.icon({
    iconUrl: "https://img.icons8.com/ultraviolet/40/000000/filled-flag.png",
    shadowUrl: 'leaflet/images/marker-shadow.png',
    iconSize:     [36, 45], // size of the icon
    shadowSize:   [45, 66], // size of the shadow
    iconAnchor:   [8, 40], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [9, -45] // point from which the popup should open relative to the iconAnchor
});
</script>

@foreach($bil as $bil)
<script>
@if($bil->status>0)
    L.marker([<?=$bil->latitude?>, <?=$bil->longitude?>],{icon: markok}).bindPopup("<div class='row'><div class='col-lg-12'><img src='<?=url('img')?>/bilboard/<?=$bil->gambar1?>' class='img img-fluid'></div></div<br>alamat : <?=$bil->alamat_bil?><br>ukuran : <?=$bil->ukuran_tinggi?>x<?=$bil->ukuran_lebar?> m<br>Tinggi Papan : <?=$bil->tinggi_papan?> m<br>Tipe : <?=$bil->tipe_bil?>").addTo(mymap);
@endif
@if($bil->status==0)
    L.marker([<?=$bil->latitude?>, <?=$bil->longitude?>],{icon: greenIcon}).bindPopup("<div class='row'><div class='col-lg-12'><img src='<?=url('img')?>/bilboard/<?=$bil->gambar1?>' class='img img-fluid'></div></div<br>alamat : <?=$bil->alamat_bil?><br>ukuran : <?=$bil->ukuran_tinggi?>x<?=$bil->ukuran_lebar?> m<br>Tinggi Papan : <?=$bil->tinggi_papan?> m<br>Tipe : <?=$bil->tipe_bil?>").addTo(mymap);
@endif

</script>


@endforeach



</body>

</html>
