$(document).ready(function(){

    $.whatever = function(){
    
        var map;
        var center = new google.maps.LatLng(-34.397, 150.644);
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();        
        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var directionsService = new google.maps.DirectionsService();

        // Execute
        (function() {
            var data = makeRequest('php/getuserlocation.php', function(data) {
             
                var data = JSON.parse(data.responseText);
                 
                center = new google.maps.LatLng(data[0].lat, data[0].long);

                displayMap(center);
            });

            google.maps.event.addListenerOnce(map, 'idle', function(){
                google.maps.event.trigger(map, 'resize');
                map.setCenter(location);
            });
        })();

        function makeRequest(url, callback) {
            var request;
            if (window.XMLHttpRequest) {
                request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
            } else {
                request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
            }
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    callback(request);
                }
            }
            request.open("GET", url, true);
            request.send();
        }

        function displayMap(center){
            var mapOptions = {
                zoom: 15,
                center: center,
                mapTypeId: google.maps.MapTypeId.SATELLITE
            }
             
            map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var marker = new google.maps.Marker({
                map: map, 
                position: center
            });

            var data = makeRequest('php/getschoollocation.php', function(data) {
             
                var data = JSON.parse(data.responseText);
                 
                for (var i = 0; i < data.length; i++) {
                    displayLocation(data[i]);
                }
            });
        }

        function displayLocation(location) {
         
            var content =   '<div class="infoWindow" style="color: black;"><strong>'  + location.schoolname + '</strong>'
                            + '</div>';
            var iconType = 'images/schools/' + location.schoolabv + '.png';
            if (parseInt(location.lat) == 0) {
                geocoder.geocode( { 'address': location.address }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var marker = new google.maps.Marker({
                            map: map, 
                            position: results[0].geometry.location,
                            title: location.name,
                            icon: {
                                    url: iconType, // url
                                    scaledSize: new google.maps.Size(50, 50), // scaled size
                                    origin: new google.maps.Point(0,0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                },
                        });
                         
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.setContent(content);
                            infowindow.open(map,marker);
                        });
                    }
                });
            } else {
                var position = new google.maps.LatLng(parseFloat(location.lat), parseFloat(location.long));
                var marker = new google.maps.Marker({
                    map: map, 
                    position: position,
                    title: location.schoolname,
                    icon: {
                            url: iconType, // url
                            scaledSize: new google.maps.Size(50, 50), // scaled size
                            origin: new google.maps.Point(0,0), // origin
                            anchor: new google.maps.Point(0, 0) // anchor
                        },
                });
                 
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                    $('.nav-tabs a[href="#searches"]').tab('show');
                    var var_data = "Hello World";
                    $.ajax({
                        url: 'schoolinfo.php',
                        type: 'POST',
                         data: { source: var_data },
                         success: function(data) {
                            $("#searches").load("schoolinfo.php");
                         }
                     });
                    
                });
            }
        }

        function refresh() {
            setInterval(function () {loadMarker();}, 1000);
        };

        function loadMarker() {
            $.ajax({
                url: 'php/getmarkerlocation.php',
                success:function(data){
                    var obj = JSON.parse(data);
                    var totalLocations = obj.length;

                    for (var i = 0; i < totalLocations; i++) {

                        var position = new google.maps.LatLng(parseFloat(obj[i].latitude), parseFloat(obj[i].longitude));
                        var marker = new google.maps.Marker({
                            position: position,
                            map: map,
                        });

                        var end = new google.maps.LatLng(obj[i].latitude, obj[i].longitude);
                        var start = new google.maps.LatLng(obj[i].stationlatitude, obj[i].stationlongitude);
                        calcRoute(start, end);

                    }

                }
            });  
        };

        function calcRoute(start, end) {
            var request = {
                origin:start,
                destination:end,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });
        }
    }
});








