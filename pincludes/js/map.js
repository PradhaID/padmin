function loadMap(lat, lng, target) {
	var myLatlng = new google.maps.LatLng(lat, lng);
	var mapOptions = {
		zoom: 17,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.SATELLITE,
	}
	var map = new google.maps.Map(document.getElementById(target), mapOptions);
	var image = 'flag.png';
	var marker = new google.maps.Marker({
		position: myLatlng,
		animation: google.maps.Animation.BOUNCE,
		title:"Hotel Ayong Linggarjati",
		//icon: image
	});
	var html_text	= '<img src="http://www.hotelayonglinggarjati.com/pcontent/upload/gambar.php?img=902abb0f21d1639e968062cef818db71.jpg&size=80" align="left" style="margin:0 5px;"><strong>Hotel Ayong Linggarjati</strong><br>Hotel Resort & Convention**';
	var infowindow = new google.maps.InfoWindow({
		content: html_text
	});
	google.maps.event.addListener(marker, 'mouseover', function() {
		infowindow.open(map,marker);
	});
	google.maps.event.addListener(infowindow, 'closeclick', function() {
		infowindow.hide();
	});
	marker.setMap(map);
}