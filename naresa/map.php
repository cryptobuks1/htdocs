<script type="text/javascript"><!--https://maps.google.com.ec/maps/ms?msid=207689829304345249591.0004de144877dbd39cdbd&msa=0&ll=-1.244356,-78.629724&spn=0.001368,0.002626-->
    function initialize() {
        var latlng = new google.maps.LatLng(-1.2382023974009964   , -78.62048374736025  );
        var settings = {
            zoom: 16,
            center: latlng,
            mapTypeControl: false,
			scaleControl: false,
			scrollwheel : false, 
			mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	
	var map = new google.maps.Map(document.getElementById("map_canvas"), settings);	
	var companyPos = new google.maps.LatLng(-1.2382023974009964   , -78.62048374736025 );
  	var companyLogo = new google.maps.MarkerImage('images/iconomap.png',
    new google.maps.Size(85,45),
    new google.maps.Point(0,0),
    new google.maps.Point(20,41)
	);
	var companyShadow = new google.maps.MarkerImage('images/logoshadow.png',
    new google.maps.Size(106,24),
    new google.maps.Point(0,0),
    new google.maps.Point(10,26)
	);
	var companyPos = new google.maps.LatLng(-1.2382023974009964   , -78.62048374736025 );
	var companyMarker = new google.maps.Marker({
    position: companyPos,
    map: map,
    icon: companyLogo,
    shadow: companyShadow,
    title:"Skema Diseño y Equipamiento"
	});
}
	
</script>
