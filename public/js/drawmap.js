$(window).load(function(){
	var latitude=8.5241391;
	var longitude=76.93663760000004;
	var map;
	var markers = [];
     $(function () {
         var lat = latitude,
             lng = longitude,
             latlng = new google.maps.LatLng(lat, lng);
            var mapOptions = {
             center: new google.maps.LatLng(lat, lng),
             zoom: 13,
             mapTypeId: google.maps.MapTypeId.ROADMAP,
             panControl: true,
             panControlOptions: {
                 position: google.maps.ControlPosition.TOP_RIGHT
             },
             zoomControl: true,
             zoomControlOptions: {
                 style: google.maps.ZoomControlStyle.LARGE,
                 position: google.maps.ControlPosition.TOP_left
             }
         },
         map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
             marker = new google.maps.Marker({});
         var input = document.getElementById('searchTextField');
         var autocomplete = new google.maps.places.Autocomplete(input, {
             types: ["geocode"]
         });

         autocomplete.bindTo('bounds', map);
         var infowindow = new google.maps.InfoWindow();

         google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
             infowindow.close();
             var place = autocomplete.getPlace(); 
             if (place.geometry.viewport) {
                 map.fitBounds(place.geometry.viewport);
             } else {
                 map.setCenter(place.geometry.location);
                 map.setZoom(17);
             }
			  var street=place.formatted_address.split(',');
			  street.length=3;
			  input.value=street;
			  input.setAttribute('title',street);
			 $('#city_name').val(input.value);
			  $('#mapLat').val(place.geometry.location.lat());
             $('#mapLong').val(place.geometry.location.lng());
			  addMarker(place.geometry.location);
         });
         google.maps.event.addListener(map, 'click', function (event) {
            
			  $('#mapLat').val(event.latLng.lat());
              $('#mapLong').val(event.latLng.lng());
			addMarker(event.latLng);
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(event.latLng.lat(),event.latLng.lng());
			geocoder.geocode({'latLng': latlng}, function(result, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					$.each(result,function(i,v){
						if(i==1){
							//$('#searchTextField').val(this.formatted_address.split(',')[0]);
							var street=this.formatted_address.split(',');
							street.length=3;
							$('#searchTextField').val(street);
							$('#searchTextField').attr('title',street);
							$('#city_name').val(this.formatted_address);
						}
					});
				}
			});
         });
         $("#searchTextField").focusin(function () {
             $(document).keypress(function (e) {
                 if (e.which == 13) {
                     return false;
                     infowindow.close();
                     var firstResult = $(".pac-container .pac-item:first").text();
                     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({
                         "address": firstResult
                     }, function (results, status) {
                         if (status == google.maps.GeocoderStatus.OK) {
                             var lat = results[0].geometry.location.lat(),
                                 lng = results[0].geometry.location.lng(),
                                 placeName = results[0].address_components[0].long_name,
                                 latlng = new google.maps.LatLng(lat, lng);

                             moveMarker(placeName, latlng);
                             $("input").val(firstResult);
                         }
                     });
                 }
             });
         });

         function moveMarker(placeName, latlng) {
             marker.setPosition(latlng);
             infowindow.setContent(placeName);
         }
		
		// Add a marker to the map and push 

			function addMarker(location) {
			  clearMarkers();
			  markers = [];
			  var marker = new 
			
			google.maps.Marker({
				position: location,
				map: map
			  });
			  markers.push(marker);
			}
			
			// Sets the map on all markers in 
			
			function setAllMap(map) {
			  for (var i = 0; i < 
			
			markers.length; i++) {
				markers[i].setMap(map);
			  }
			}
			
			// Removes the markers from the 
			
			function clearMarkers() {
			  setAllMap(null);
			}

		 
     });
});//]]>  

