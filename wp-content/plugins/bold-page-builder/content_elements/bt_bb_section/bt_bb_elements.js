(function( $ ) {

	function bt_bb_video_background() {
		$( '.bt_bb_section.video' ).each(function() {
			var video = $( this ).find( 'video' );
			var w = $( this ).outerWidth();
			var h = $( this ).outerHeight();
			if ( w / h > 16 / 9 ) {
				video.css( 'width', '105%' );
				video.css( 'height', '' );
			} else {
				video.css( 'width', '' );
				video.css( 'height', '105%' );
			}
		});
	}

	window.bt_bb_video_callback = function( v ) {
		$( v ).parent().addClass( 'video_on' );
	}

	$( document ).ready(function () {
		bt_bb_video_background();
		var googleMapSelector = "iframe[src*=\"google.com/maps\"]";
		if ( $( googleMapSelector ).length > 0 ) {
			$( googleMapSelector ).scrollprevent().start();
		}
	});

	$( window ).on( 'resize', function( e ) {		
		bt_bb_video_background();
		setTimeout( function() {
			var $elems = $( '.bt_bb_counter.animated' );
			$elems.each(function() {
				$elm = $( this );
				bt_bb_animate_counter( $elm );
			});
		}, 1000 );		
	});

	$( 'a[href*="#"]:not([href="#"])' ).not( '.menu-scroll-down' ).on( 'click', function() { // .menu-scroll-down - 2017 theme
		if ( location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname ) {
			var target = $( this.hash );
			target = target.length ? target : $( '[name=' + this.hash.slice(1) +']' );
				if ( target.length ) {
					$( 'html, body' ).animate({
						scrollTop: target.offset().top
					}, 1000 );
				return false;
			}
		}
	});


	function bt_bb_animate_counter( elm ) {
		var number_length = elm.data( 'digit-length' );
		for ( var i = parseInt( number_length ); i > 0; i-- ) {
			var digit = parseInt( elm.children( '.p' + i ).data( 'digit' ) );
			if ( digit == 0 || isNaN( digit ) ) digit = 10;
			for ( var j = 0; j <= digit; j++ ) {
				elm.children( '.p' + i ).css( 'transform', 'translateY(-' + digit * elm[0].getBoundingClientRect().height + 'px)' );
				//elm.children( '.p' + i ).css( 'transform', 'translateY(-' + digit * elm.height() + 'px)' );
			}
			elm.addClass( 'animated' );
		}
		
		return false;
	}
	
})( jQuery );