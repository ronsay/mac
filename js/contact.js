    var map;

    function init_map(){
        var myOptions = {zoom:16,center:new google.maps.LatLng(48.1934165,6.4378545),mapTypeId: google.maps.MapTypeId.ROADMAP};
        map = new google.maps.Map(document.getElementById('map'), myOptions);
        var marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(48.1934165,6.4378545)});
        var infowindow = new google.maps.InfoWindow({content:'<div style="color: #000;"><strong>MAC Onsay</strong><br>60 rue d\'Epinal<br>88190 Golbey<br></div>'});
        google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);
    }

    function resize_map() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
    }

    $(document).ready(function() {
        google.maps.event.addDomListener(window, 'load', init_map);
        google.maps.event.addDomListener(window, "resize", resize_map);
    });
	