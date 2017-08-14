(function( $ ) {
	$( document ).ready(function() {

		// slick slider
		$( '.slick-slider' ).slick();
		$( '.slick-slider .slick-prev, .slick-slider .slick-next' ).click(function() {
			$( this ).closest( '.slick-slider' ).slick( 'slickPause' );
		});
		// bt_bb_elements.js resets animated class
		$( '.slick-slider' ).on('beforeChange', function(event, slick, currentSlide, nextSlide){
		  $( this ).find( '.slick-slide .animated' ).removeClass( 'animated' );
		  $( this ).find( '.slick-slide[data-slick-index='+nextSlide+'] .animate' ).addClass( 'animated' );
		});

		// tabs
		$( '.bt_bb_tabs li' ).click(function() {
			$( this ).siblings().removeClass( 'on' );
			$( this ).addClass( 'on' );
			$( this ).closest( '.bt_bb_tabs' ).find( '.bt_bb_tab_item' ).removeClass( 'on' );
			$( this ).closest( '.bt_bb_tabs' ).find( '.bt_bb_tab_item' ).eq( $( this ).index() ).addClass( 'on' );
		});
		$( '.bt_bb_tabs' ).each(function() {
			$( this ).find( 'li' ).first().click();
		});

		// parallax
		if ( $( '.bt_bb_parallax' ).length > 0 ) {

			window.bt_bb_raf_lock = false;

			$( window ).on( 'mousewheel', function( e ) {

			});

			$( window ).on( 'scroll', function() {
				if ( ! window.bt_bb_raf_lock ) {
					window.bt_bb_raf_lock = true;
					bt_bb_requestAnimFrame( bt_bb_raf_loop );
				}
			});
			
			$( window ).on( 'load', function() {
				bt_bb_requestAnimFrame( bt_bb_raf_loop );
			});

			window.bt_bb_requestAnimFrame = function() {
				return (
					window.requestAnimationFrame       ||
					window.webkitRequestAnimationFrame ||
					window.mozRequestAnimationFrame    ||
					window.oRequestAnimationFrame      ||
					window.msRequestAnimationFrame     ||
					function( callback ) {
						window.setTimeout( callback, 1000 / 60 );
					}
				);
			}();

			bt_bb_raf_loop = function() {
				var win_w = window.innerWidth;
				var win_h = window.innerHeight;
				$( '.bt_bb_parallax' ).each(function() {
					var bounds = this.getBoundingClientRect();
					if ( bounds.top < win_h && bounds.bottom > 0 ) {
						var speed = $( this ).data( 'parallax' ) + 0.0001;
						var offset = 0;
						if ( win_w > 1024 ) offset = parseFloat( $( this ).data( 'parallax-offset' ) );
						var ypos = ( bounds.top ) * speed;
						$( this )[0].style.backgroundPosition = '50% ' + ( ypos + offset ) + 'px';
					}

				});

				window.bt_bb_raf_lock = false;

			}

			bt_bb_requestAnimFrame( bt_bb_raf_loop );	

		}

		// Countdown
		
		$( '.btCountdownHolder' ).each(function() {
			
			var cd = $( this );
			var s = cd.data( 'init-seconds' );
			
			var seconds_arr = ['', ''];
			var seconds_arr_prev = ['', ''];
			
			var minutes_arr = ['', ''];
			var minutes_arr_prev = ['', ''];
			
			var hours_arr = ['', ''];
			var hours_arr_prev = ['', ''];

			var days_prev = 0;
			
			var countdown = function( selector, i, arr, arr_prev ) {
				if ( arr[ i ] !== arr_prev[ i ] ) {
					cd.find( selector ).children().addClass( 'countdown_anim' );
					cd.find( selector ).children().eq( 0 ).html( arr[ i ] );
					cd.find( selector ).children().eq( 1 ).html( arr_prev[ i ] );
					setTimeout(function() {
						cd.find( selector ).children().eq( 1 ).html( cd.find( selector ).children().eq( 0 ).html() );
						cd.find( selector ).children().removeClass( 'countdown_anim' );
					}, 300 );
				}
			}
			
			var output = function() {
				s = s - 1;
				if ( s < 0 ) {
					s = 0;
				}
				
				var delta = s;
				
				var days = Math.floor( delta / 86400 );
				delta -= days * 86400;

				var hours = Math.floor( delta / 3600 ) % 24;
				delta -= hours * 3600;

				var minutes = Math.floor( delta / 60 ) % 60;
				delta -= minutes * 60;

				var seconds = delta;
				
				if ( hours < 10 ) {
					hours = '0' + hours;
				}
				
				if ( minutes < 10 ) {
					minutes = '0' + minutes;
				}

				if ( seconds < 10 ) {
					seconds = '0' + seconds;
				}
				
				seconds_arr = seconds.toString().split( '' );
				minutes_arr = minutes.toString().split( '' );
				hours_arr = hours.toString().split( '' );
				
				for ( var i = 0; i <= 1; i++ ) {
					countdown( '.seconds .n' + i, i, seconds_arr, seconds_arr_prev );
					countdown( '.minutes .n' + i, i, minutes_arr, minutes_arr_prev );
					countdown( '.hours .n' + i, i, hours_arr, hours_arr_prev );
				}
				
				if ( days != days_prev ) {
					days_arr = days.toString().split( '' );
					
					var days_html = '';
					for ( var i = 0; i < days_arr.length; i++ ) {
						days_html += '<span>' + days_arr[ i ] + '</span>';
					}

					cd.find( '.days' ).html( days_html + '<span class="days_text"><span>' + cd.find( '.days' ).data( 'text' ) + '</span></span>' );
				}
				
				days_prev = days;				
				
				setTimeout(function() {
					seconds_arr_prev = seconds_arr;
					minutes_arr_prev = minutes_arr;
					hours_arr_prev = hours_arr;
				}, 400 );

			}
			
			output();

			setInterval(function() {
				output();
			}, 1000 );
		});

	});

	$.fn.isOnScreen = function() {
		var element = this.get( 0 );
		if ( element == undefined ) return false;
		var bounds = element.getBoundingClientRect();
		return bounds.top + 75 < window.innerHeight && bounds.bottom > 0;
	}

	// animations
	function bt_bb_animate_elements() {
		var $elems = $( '.animate:not(.animated)' );
		$elems.each(function() {
			var $elm = $( this );
			if ( $elm.isOnScreen() ) {
				$elm.addClass( 'animated' );
				if ( $elm.hasClass( 'bt_bb_counter' ) ) {
					bt_bb_animate_counter( $elm );
				}
			}
		});
		$( '.slick-slider .slick-slide:not(.slick-active) .animate' ).removeClass( 'animated' );
	}

	$( window ).on( 'scroll', function() {
		bt_bb_animate_elements();
	});
	
	$( window ).on( 'load', function() {
		bt_bb_animate_elements();
	});

}( jQuery ));

// google maps
function bt_bb_gmap_init( map_id, zoom, custom_style ) {

	var myLatLng = new google.maps.LatLng( 0, 0 );
	var mapOptions = {
		zoom: zoom,
		center: myLatLng,
		scrollwheel: false,
		scaleControl:true,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL,
			position: google.maps.ControlPosition.RIGHT_CENTER
		},
		streetViewControl: true,
		mapTypeControl: true
	}
	var map = new google.maps.Map( document.getElementById( map_id ), mapOptions );

	if ( custom_style != '' ) {
		
		var style_array = [];
		
		if ( custom_style != '' ) {
			style_array = JSON.parse( atob( custom_style ) );
		}
		
		var customMapType = new google.maps.StyledMapType( style_array, {
			name: 'Custom Style'
		});

		var customMapTypeId = 'custom_style';
		map.mapTypes.set( customMapTypeId, customMapType );
		map.setMapTypeId( customMapTypeId );
	}

	var n = 0;

	var container = jQuery( '#' + map_id ).parent();
	
	var locations = container.find( '.bt_bb_google_maps_location' );
	
	var center_map = container.data( 'center' );
	if ( center_map == 'no' ) {
		center_map = false;
	} else {
		center_map = true;
	}

	var lat_sum = 0;
	var lng_sum = 0;
	
	locations.each(function() {
		
		var lat = jQuery( this ).data( 'lat' );
		var lng = jQuery( this ).data( 'lng' );
		var icon = jQuery( this ).data( 'icon' );

		lat_sum += lat;
		lng_sum += lng;

		var myLatLng = new google.maps.LatLng( lat, lng );
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: icon,
			count: n
		});
		
		if ( ! center_map && n == 0 ) {
			map.setCenter( myLatLng );
		}
		
		locations.eq( 0 ).addClass( 'bt_bb_google_maps_location_show' );
		
		marker.addListener( 'click', function() {
			//map.setZoom( zoom );
			//map.setCenter( marker.getPosition() );
			container.removeClass( 'bt_bb_google_maps_no_overlay' );
			locations.removeClass( 'bt_bb_google_maps_location_show' );
			locations.eq( this.count ).addClass( 'bt_bb_google_maps_location_show' );
		});
		
		n++;
	});

	if ( center_map ) {
		var centerLatLng = new google.maps.LatLng( lat_sum / n, lng_sum / n );
		map.setCenter( centerLatLng );
	}
	
}