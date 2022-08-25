jQuery(document).ready(function($){
	var body = $('.rinrose_fresh_home');
	$(window).scroll(function () {
		var scroll = $(window).scrollTop();
		if (scroll >= 25) {
			body.removeClass('rinrose_fresh_home').addClass('rinrose_scrolled_home');
		}
	});
	setTimeout(function() {
		body.removeClass('rinrose_fresh_home').addClass('rinrose_scrolled_home');
	}, 3000);
});

var map;
var bounds;

var styledMapType;

const gmapStyles = [
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
		"featureType": "administrative",
		"elementType": "geometry",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "administrative.country",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "administrative.land_parcel",
		"stylers": [
			{
				"visibility": "off"
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
		"featureType": "administrative.locality",
		"stylers": [
			{
				"visibility": "on"
			}
		]
	},
	{
		"featureType": "administrative.locality",
		"elementType": "labels.text.fill",
		"stylers": [
			{
				"color": "#919191"
			}
		]
	},
	{
		"featureType": "administrative.neighborhood",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "administrative.province",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "poi",
		"stylers": [
			{
				"visibility": "off"
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
		"featureType": "road",
		"elementType": "labels.icon",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "road.arterial",
		"elementType": "labels.text.fill",
		"stylers": [
			{
				"color": "#d6d6d6"
			}
		]
	},
	{
		"featureType": "road.highway",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#ffffff"
			}
		]
	},
	{
		"featureType": "road.highway",
		"elementType": "labels.text.fill",
		"stylers": [
			{
				"color": "#dedede"
			}
		]
	},
	{
		"featureType": "road.highway.controlled_access",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "road.local",
		"stylers": [
			{
				"visibility": "off"
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
	},
	{
		"featureType": "transit.station.airport",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "transit.station.bus",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "transit",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "transit.line",
		"stylers": [
			{
				"visibility": "on"
			}
		]
	},
];

const transitStyles = [
	{
		"featureType": "transit.line",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#9EABA3"
			}
		]
	},
	{
    	"featureType": "transit.line",
    	"elementType": "geometry.fill",
    	"stylers": [
    		{
        		"color": "#9EABA3"
    		},
    		{
        		"weight": 1
    		}
    	]
	},
	{
		"featureType": "transit.station",
		"elementType": "geometry",
		"stylers": [
			{
				"color": "#9EABA3"
			}
		]
	},
	{
		"featureType": "transit.station.rail",
		"stylers": [
			{
				"visibility": "on"
			}
		]
	},
	{
		"featureType": "transit.station.rail",
		"elementType": "geometry.fill",
		"stylers": [
			{
				"color": "#9EABA3"
			}
		]
	},
	{
		"featureType": "transit.station.rail",
		"elementType": "geometry.stroke",
		"stylers": [
			{
				"color": "#9EABA3"
			}
		]
	},
	{
		"featureType": "transit.station.rail",
		"elementType": "labels.text.fill",
		"stylers": [
			{
				"color": "#9EABA3"
			}
		]
	},
];

gmapStyles.push.apply(gmapStyles, transitStyles);


const markers = [
	['The Rinrose', '3768 E Colorado Blvd, Pasadena, CA 91107', '34.146358489990234', '-118.07096862792969', 'main'],
];

const poi_education = [
	["California Institute of Technology ", "1200 E California Blvd, Pasadena, CA 91125", "34.1359061", "-118.1257822", "education", "fit", 90],
	["Pasadena City College", "1570 E Colorado Blvd, Pasadena, CA 91106", "34.1440002", "-118.1185206", "education", "fit", 65],
];
markers.push.apply(markers, poi_education);

const poi_entertainment = [
	["Beer & Claw", "61 S Fair Oaks Ave #130, Pasadena, CA 91105", "34.1446236", "-118.150658", "entertainment", "fit", 40],
	["Pasadena Certified Farmers Market", "363 E Villa St, Pasadena, CA 91101", "34.1542665", "-118.142314", "entertainment","fit",  95],
	["Blu Bar", "928 E Colorado Blvd, Pasadena, CA 91106", "34.145467", "-118.1312113", "entertainment", "fit", 5, -10],
	["Bistro 45", "45 S Mentor Ave, Pasadena, CA 91106", "34.1452933", "-118.1309435", "entertainment", "fit", 33],
	["Rose Bowl", "1001 Rose Bowl Dr, Pasadena, CA 91103", "34.163214", "-118.165789", "entertainment", "fit", 40],
	["The Huntington Library, Art Museum and Botanical Gardens", "1151 Oxford Rd, San Marino, CA 91108", "34.1277856", "-118.1120142", "entertainment", "fit", 150],
	["Pasadena Victory Park Farmers Market", "2925 E Sierra Madre Blvd, Pasadena, CA 91107", "34.161414", "-118.09191", "entertainment", "fit", 105],
	["38 Degrees Ale House & Grill", "100 W Main St, Alhambra, CA 91801", "34.094668", "-118.127906", "entertainment", "", 80],
];
markers.push.apply(markers, poi_entertainment);

const poi_shopping = [
	["Shops of Old Pasadena", "1 E Colorado Blvd, Pasadena, CA 91105", "34.145857", "-118.150356", "shopping", "fit", 70],
	["Urban Outfitters", "139 W Colorado Blvd, Pasadena, CA 91105", "34.1461077", "-118.1534969", "shopping", "fit", -45],
	["Intelligentsia Coffee", "55 E Colorado Blvd, Pasadena, CA 91105", "34.1457786", "-118.1500056", "shopping", "fit", 25, -10],
	["The Luggage Room Pizzeria", "260 S Raymond Ave, Pasadena, CA 91105", "34.141776", "-118.148778", "shopping", "fit", -65],
	["Republik Coffee", "854 E Green St, Pasadena, CA 91101", "34.1444644", "-118.1330388", "shopping", "fit"],
	["Saso", "37 S El Molino Ave, Pasadena, CA 91101", "34.1452206", "-118.137081", "shopping", "fit", -15],
	["Philz Coffee", "146 S Lake Ave #106, Pasadena, CA 91101", "34.1429414", "-118.1322229", "shopping", "fit", 40],
	["SUGARFISH", "146 S Lake Ave #108, Pasadena, CA 91101", "34.1429414", "-118.1322229", "shopping", "fit", -30],
	["CAVA", "345 S Lake Ave, Pasadena, CA 91101", "34.1400694", "-118.1328965", "shopping", "fit", 25],
	["The Arbour", "527 S Lake Ave #120, Pasadena, CA 91101", "34.1368384", "-118.1323718", "shopping", "fit", 40],
	["Pie'n Burger", "913 E California Blvd, Pasadena, CA 91106", "34.1359646", "-118.1315471", "shopping", "fit", -30],
	["Lucky Boy ", "640 S Arroyo Pkwy, Pasadena, CA 91105", "34.1343351", "-118.147225", "shopping", "fit", 30, 5],
	["Nordstrom Rack", "3363 E Foothill Blvd, Pasadena, CA 91107", "34.150173", "-118.081007", "shopping", "fit"],
	["Trader Joe's", "467 N Rosemead Blvd, Pasadena, CA 91107", "34.15428", "-118.077983", "shopping", "fit"],
	["Trader Joe's", "345 S Lake Ave, Pasadena, CA 91101", "34.1400694", "-118.1328965", "shopping", "fit", -30],
	["Trader Joe's", "610 S Arroyo Pkwy, Pasadena, CA 91105", "34.134916", "-118.14723", "shopping", "fit", 40, -5],
	["Whole Foods Market", "465 S Arroyo Pkwy, Pasadena, CA 91105", "34.137544", "-118.1474524", "shopping", "fit", -50],
	["Sprouts", "39 N Rosemead Blvd, Pasadena, CA 91107", "34.146957", "-118.073457", "shopping", "fit", 5, -10],
	["Dot's Cafe", "3819 E Colorado Blvd, Pasadena, CA 91107", "34.1461772", "-118.0869627", "shopping", "fit", -30],
	["Target", "3121 E Colorado Blvd, Pasadena, CA 91107", "34.1465388", "-118.0845781", "shopping", "fit", 30],
	["Westfield Santa Anita", "400 S Baldwin Ave, Arcadia, CA 91007", "34.135995", "-118.054166", "shopping", "fit", 65],
];
markers.push.apply(markers, poi_shopping);

const poi_recreation = [
	["Speakeasy Fitness", "39 S Altadena Dr, Pasadena, CA 91107", "34.1452797", "-118.0987556", "recreation", "fit", -50],
	["Alice's Dog Park", "3026 E Orange Grove Blvd, Pasadena, CA 91107", "34.15844", "-118.087574", "recreation", "fit"],
	["Victory Park", "2575 Paloma St, Pasadena, CA 91107", "34.160354", "-118.0962599", "recreation", "fit", -35],
	["Eaton Canyon Golf Course", "1150 Sierra Madre Villa Ave, Pasadena, CA 91107", "34.1665102", "-118.0804784", "recreation", "fit", -62],
	["Eaton Canyon Trailhead", "1999 Veranada Ave, Pasadena, CA 91107", "34.1759984", "-118.099312", "recreation", "", -60],
	["Walnut Canyon Trailhead", "Unnamed Road, Pasadena, CA 91107", "34.18573842105448", "-118.09999282893223", "recreation", "", 75],
	["Mt. Wilson Trailhead", "Mt Wilson Trail, Sierra Madre, CA 91024", "34.170305", "-118.049301", "recreation", "fit", 65],
	["LA County Arboretum", "301 N Baldwin Ave, Arcadia, CA 91007", "34.1443566", "-118.0501603", "recreation", "fit", 65],
];
markers.push.apply(markers, poi_recreation);

function initMap() {
	styledMapType = new google.maps.StyledMapType(
    	gmapStyles,
    	{ name: 'Styled Map' }
	);

	map = new google.maps.Map(document.getElementById('map'), {
  		zoom: 12,
  		center: {lat: 34.14593144331132, lng: -118.11375738156701},
	});

	const transitLayer = new google.maps.TransitLayer();
	transitLayer.setMap(map);
	
	bounds = new google.maps.LatLngBounds();

	const colors = {
		entertainment: '#02293A',
		shopping: '#B37350',
		recreation: '#6A8171',
		education: '#D8B9AB',
		metro: '#9EABA3',
		radius: '#80949C',
	};

	var label;
	var labelClass;
	var icon;
	for (let i = 0; i < markers.length; i++) {
		icon = {
			url: '/wp-content/themes/therinrose-tenderling/inc/img/rinrose_map_'+markers[i][4]+'.svg',
			scaledSize: new google.maps.Size(10, 10), // scaled size
			origin: new google.maps.Point(0,0), // origin
			anchor: new google.maps.Point(0, 0), // anchor
			labelOrigin: new google.maps.Point(50, 6.2), // label origin
		};
		if(markers[i][4] == 'main') {
			icon.scaledSize = new google.maps.Size(50, 50);
			//origin = new google.maps.Point(10,10);
			label = '';
			labelClass = '';
		}else {
			if(typeof markers[i][6] != 'undefined' && typeof markers[i][7] != 'undefined') {
				icon.labelOrigin = new google.maps.Point(markers[i][6], markers[i][7]);
			}else if(typeof markers[i][6] != 'undefined') {
				icon.labelOrigin = new google.maps.Point(markers[i][6], 6.2);
			}else if(typeof markers[i][7] != 'undefined') {
				icon.labelOrigin = new google.maps.Point(50, markers[i][7]);
			}
			labelClass = "poi-label";
		    label = {
		        text: markers[i][0],
		        color: colors[markers[i][4]],
		        fontSize: '10px',
		    };
		}
    	const marker = new google.maps.Marker({
        	position: new google.maps.LatLng(markers[i][2], markers[i][3]),
        	icon: icon,
        	title: markers[i][0],
        	labelClass: labelClass,
		    label: label,
		    map: map,
    	});
    	if(markers[i][5] == "fit") {
    		bounds.extend(marker.position);
    	}
    }
	map.fitBounds(bounds);

	var myLatLng = new google.maps.LatLng(34.14659579475012, -118.11022083241194);

	var radius = 4024;

	var lineSymbol = {
    	path: 'M 0,-1 0,1',
    	strokeOpacity: 1,
    	scale: 2
	};

	var circlePoly = new google.maps.Polyline({
    	path: drawCircle(myLatLng, radius / 1609.344, 1),
    	strokeOpacity: 0,
    	icons: [{
    		icon: lineSymbol,
    		offset: '0',
    		repeat: '20px'
    	}],
    	strokeWeight: 1,
    	strokeColor: colors['radius'],
    	fillColor: 'transparent',
    	fillOpacity: 0,
    	map: map
  	});

	var circle = new google.maps.Circle({
    	strokeWeight: 0,
    	fillColor: 'transparent',
    	fillOpacity: 0,
    	map: map,
    	center: myLatLng,
    	radius: radius
	});

	map.mapTypes.set('styled_map', styledMapType);
	map.setMapTypeId('styled_map');
}

function drawCircle(point, radius, dir) {
	var d2r = Math.PI / 180; // degrees to radians
	var r2d = 180 / Math.PI; // radians to degrees
	var earthsradius = 3963; // 3963 is the radius of the earth in miles

	var points = 360;

	// find the raidus in lat/lon
	var rlat = (radius / earthsradius) * r2d;
	var rlng = rlat / Math.cos(point.lat() * d2r);

	var extp = [];
	var start;
	var end;
	if (dir === 1) {
    	start = 0;
    	end = points + 1; // one extra here makes sure we connect the path
	} else {
    	start = points + 1;
    	end = 0;
  	}
	for (var i = start; (dir === 1 ? i < end : i > end); i = i + dir) {
    	var theta = Math.PI * (i / (points / 2));
    	var ey = point.lng() + (rlng * Math.cos(theta)); // center a + radius x * cos(theta)
    	var ex = point.lat() + (rlat * Math.sin(theta)); // center b + radius y * sin(theta)
    	extp.push(new google.maps.LatLng(ex, ey));
  	}
  	return extp;
}

window.initMap = initMap;