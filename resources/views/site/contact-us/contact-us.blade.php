@extends('layouts.master')

@section('title', 'Zidni Contact Us')


@section('links')



@endsection


@section('contant')




<section>




        <!--Start Page Header-->
    
    
        <div class="jumbotron jumbotron-fluid pages-header contactus-header">
    
    
            <img class="pages-header-img lazyload" data-src="{{asset('images/demo-3.jpeg')}}" src="{{asset('images/gray.jpg')}}" width="100%" height="300">
    
    
            <div class="pages-header-overlay"></div>
    
            <div class="container">
    
                <div class="pages-header-container">
    
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">Contact Us</a>
                            </li>
                        </ol>
                    </nav>
    
    
                    <h1 class="display-6 page-header-title">Contact Us</h1>
    
                    
    
                </div>
    
    
            </div>
    </div>
    
    
        <!--End Page Header-->
    
    
    
    </div>
    
    
    
    
    
    </section>
    
    


<section class="contactus-container">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <h3 class="contactus-title">Get In Touch With Us</h3>

                <p class="contactus-text">We are here to help. Want to learn more about us? <br/> Please get in touch, we'd love to hear from you!</p>

            </div>


            <div class="col-lg-7 col-md-12">
        
                <div id="contactus-form-container">


                        <form class="contactus-form">


                            <div class="form-group">
                                <input class="form-control" type="text" id="contactusName" name="contactusName" placeholder="Your Name">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" id="contactusEmail" name="contactusEmail" placeholder="Your E-Mail">
                            </div>


                            <div class="form-group">
                                <textarea class="form-control" id="contactusMessage" name="contactusMessage" rows="5" placeholder="Your Message"></textarea>
                            </div>
    
                            <div class="form-submit">
        
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Send Message</button>
        
                                <div class="ajax-loading loader loader--style2" title="1">
                                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                    <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                    <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"
                                    />
                                    </path>
                                </svg>
                                </div>
        
        
                            </div>
                            
                            
                        </form>




                </div>



            </div>


            <div class="col-lg-4 col-md-12">


                <div class="contactus-info-card">

                        <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">HEADQUARTER</h5>
                            <div class="card-item">

                                <i class="fas fa-phone"></i>
                                <p class="card-text">023 433 113 /2</p>

                            </div>

                            <div class="card-item">

                                <i class="fas fa-envelope"></i>
                                <p class="card-text"><a href="mailto:info@zidniinstitute.org" target="_blank">info@zidniinstitute.org</a></p>

                            </div>
                        </div>
                        </div>


                </div>


            </div>



            {{-- map --}}





        </div>


    </div>


    <div class="container-fluid kill-padding">

        <div id="zidni-map-container"></div>


    </div>



</section>











@endsection


@section('scripts')


<script>

    var map;
    function initMap() {


        var styledMapType = new google.maps.StyledMapType(
            [
                {
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                    {
                        "visibility": "off"
                    }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#616161"
                    }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#bdbdbd"
                    }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [
                    {
                        "visibility": "simplified"
                    }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#757575"
                    }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#ffffff"
                    }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#757575"
                    }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#dadada"
                    }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#616161"
                    }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#e5e5e5"
                    }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#eeeeee"
                    }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                    {
                        "color": "#c9c9c9"
                    }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                    ]
                }
                ],
            {name: 'Styled Map'});

            var zidniLocation = {lat: 44.145882, lng: -93.999077 };
            map = new google.maps.Map(document.getElementById('zidni-map-container'), {
                center: zidniLocation,
                zoom: 15,
                mapTypeControlOptions: {
                    mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain']
                }
            });

            var image = "{{asset('images/map-icon-1.png')}}";
            var beachMarker = new google.maps.Marker({
                position: zidniLocation,
                map: map,
                icon: image
            });



              var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<div class="map-zidni-logo"><img src="{{asset('images/logo.png')}}" alt="Zidni Logo" /></div>'+
                '<div id="bodyContent">'+
                '<p><b>Zidni Islamic Institute </b>, is a non-profit organization that teaches the Islamic Sciences according to the methodology of orthodox Sunni Islam, Ahl al-Sunnah Wa al-Jamāʿah.</p>'+
                '</div>'+
                '</div>';


              var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });


                var marker = new google.maps.Marker({
                    position: zidniLocation,
                    map: map,
                    icon: image

                });


                
                marker.addListener('mouseover', function() {
                    infowindow.open(map, marker);
                });




        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
    }


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYUp18UQpGaU6ga8x77PaEq8ruE6EUkFE
&callback=initMap"
async defer></script>




@endsection