<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>	

<body>
<div id="container">
	<div class="card">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="#">CMZoo</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01"
			aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav ml-auto ">
					<li class="nav-item active">
						<a class="nav-link" href="#">Map <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link"  href="Report">Report</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Chart</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Sensor">Status</a>
					</li>
				</ul>
			</div>
		</nav>

		<div id='body'>
			<div id="map"></div>
			<div id="opt"></div>
		</div>
		<div class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
			<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></div>
	</div>
</div>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYq_A_0vrK4r5n2iOFH4SoEZ0s2FH2r3o&callback=initMap">
</script>  

<script>

	var overlay;
	USGSOverlay.prototype = new google.maps.OverlayView();

	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 18.8006126, lng:98.9445969},	/*18.8006126,98.9445969,21z*/
		zoom: 21
		});

		var bounds = new google.maps.LatLngBounds(
		new google.maps.LatLng(18.800900, 98.944168),
		new google.maps.LatLng(18.800335, 98.945023));

		var srcImage = 'https://developers.google.com/maps/documentation/' +
            'javascript/examples/full/images/talkeetna.png';

		overlay = new USGSOverlay(bounds, srcImage, map);
	}

	function USGSOverlay(bounds, image, map) {

		// Initialize all properties.
		this.bounds_ = bounds;
		this.image_ = image;
		this.map_ = map;

		// Define a property to hold the image's div. We'll
		// actually create this div upon receipt of the onAdd()
		// method so we'll leave it null for now.
		this.div_ = null;

		// Explicitly call setMap on this overlay.
		this.setMap(map);
	}

	/**
	 * onAdd is called when the map's panes are ready and the overlay has been
	 * added to the map.
	 */
	USGSOverlay.prototype.onAdd = function () {

		var div = document.createElement('div');
		div.style.borderStyle = 'none';
		div.style.borderWidth = '0px';
		div.style.position = 'absolute';

		// Create the img element and attach it to the div.
		var img = document.createElement('img');
		img.src = this.image_;
		img.style.width = '100%';
		img.style.height = '100%';
		img.style.position = 'absolute';
		div.appendChild(img);

		this.div_ = div;

		// Add the element to the "overlayLayer" pane.
		var panes = this.getPanes();
		panes.overlayLayer.appendChild(div);
	};

	USGSOverlay.prototype.draw = function () {

		// We use the south-west and north-east
		// coordinates of the overlay to peg it to the correct position and size.
		// To do this, we need to retrieve the projection from the overlay.
		var overlayProjection = this.getProjection();

		// Retrieve the south-west and north-east coordinates of this overlay
		// in LatLngs and convert them to pixel coordinates.
		// We'll use these coordinates to resize the div.
		var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
		var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());

		// Resize the image's div to fit the indicated dimensions.
		var div = this.div_;
		div.style.left = sw.x + 'px';
		div.style.top = ne.y + 'px';
		div.style.width = (ne.x - sw.x) + 'px';
		div.style.height = (sw.y - ne.y) + 'px';
	};

	// The onRemove() method will be called automatically from the API if
	// we ever set the overlay's map property to 'null'.
	USGSOverlay.prototype.onRemove = function () {
		this.div_.parentNode.removeChild(this.div_);
		this.div_ = null;
	};

	google.maps.event.addDomListener(window, 'load', initMap);

</script>

</body>
</html>