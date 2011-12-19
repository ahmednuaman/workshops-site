var S	= {
	cssAnimation												: 'webkitAnimationEnd animationend oAnimationEnd',
	cssTransition												: 'webkitTransitionEnd transitionend oTransitionEnd',
	ease														: 'easeInOutExpo',
	hasAnimations												: false,
	hasTransitions												: false,
	
	ready														: function()
	{
		var h	= window.location.hash;
		
		S.detectBrowser();
		
		if ( h.length > 0 )
		{
			S.scrollTo( h );
		}
		
		if ( $( 'body' ).hasClass( 'home' ) )
		{
			S.prepareHomeCarousel();
		}
	},
	
	prepareHomeCarousel											: function()
	{
		var lis	= $( '#learning-carousel > li' );
		var ts	= $( '#learning-thumbs > li' );
		
		lis.not( ':nth-child(1)' ).hide();
		
		ts.click( function()
		{
			var t	= $( this );
			var i	= t.index();
			
			if ( S.hasTransitions && false )
			{
				
			}
			else
			{
				lis.filter( ':visible' ).stop( true ).fadeOut( 'fast', S.ease, function()
				{
					var t	= lis.eq( i );
					
					$( '.thumbnail', t ).css({
						'margin-top'	: 100,
						'opacity'		: 0
					}).animate({
						'margin-top'	: 0,
						'opacity'		: 1
					}, 'slow', S.ease );
					
					$( '.excerpt', t ).hide().delay( 500 ).fadeIn();
					
					$( '.content', t ).hide().delay( 1000 ).fadeIn();
					
					t.fadeIn();
				});
			}
			
			ts.not( t ).removeClass( 'selected' );
			
			t.addClass( 'selected' );
		}).eq( 0 ).click();
	},
	
	scrollTo													: function(h)
	{
		var y	= $( h ).offset().top - $( '#menubar' ).outerHeight();
		
		$( 'html, body' ).animate({
			'scrollTop'	: y
		}, 2000, S.ease );
	},
	
	detectBrowser												: function()
	{
		if ( $.browser.msie )
		{
			$( 'html' ).addClass( 'ie' );
			
			if ( $.browser.version )
			{
				$( 'html' ).addClass( 'ie' + Number( $.browser.version ) );
			}
			else
			{
				$( 'html' ).addClass( 'ie6' );
			}
		}

		if ( $.browser.webkit )
		{
			$( 'html' ).addClass( 'webkit' );
			
			if ( navigator.userAgent.indexOf( 'Chrome' ) === -1 )
			{
				$( 'html' ).addClass( 'safari' );
			}
			else
			{
				$( 'html' ).addClass( 'chrome' );
			}
		}

		if ( $.browser.mozilla )
		{
			$( 'html' ).addClass( 'ff' );
		}
		
		if ( $.browser.opera )
		{
			$( 'html' ).addClass( 'opera' );
		}

		if ( navigator.userAgent.indexOf( 'Windows' ) != -1 )
		{
			$( 'html' ).addClass( 'windows' );
		}
		else if ( navigator.userAgent.indexOf( 'Mac' ) != -1 )
		{
			$( 'html' ).addClass( 'mac' );
		}
		
		if ( navigator.userAgent.indexOf( 'iPad' ) != -1 )
		{
			$( 'html' ).addClass( 'ipad' );
		}
		
		$( 'html' ).removeClass( 'no-js' );
		
		S.hasAnimations		= $( 'html' ).hasClass( 'cssanimations' );
		S.hasTransitions	= $( 'html' ).hasClass( 'csstransitions' );
	}
};

$.extend($.easing,
{
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	}
});

// var _gaq=[['_setAccount','UA-XXX'],['_trackPageview'],['_trackPageLoadTime']];
// (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
// g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
// s.parentNode.insertBefore(g,s)}(document,'script'));

$( document ).ready( S.ready );