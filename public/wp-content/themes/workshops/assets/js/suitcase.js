var Workshops	= function(window)
{
	var ease           = 'easeInOutExpo';
	var hasAnimations  = false;
	var hasTransitions = false;
	var menuHeight     = 40;
	
	function ready()
	{
		var h	= window.location.hash;
		
		detectBrowser();
		prepareHashLinks();
		prepareHeaderBlocks();
		
		if ( h.length > 0 )
		{
			scrollTo( h );
		}
	}
	
	function prepareHashLinks()
	{
		$( 'a[href^="/#"]' ).click( function()
		{
			var h	= '#' + $( this ).prop( 'href' ).split( '#' )[ 1 ];
			
			scrollTo( h );
			
			return false;
		});
	}
	
	function prepareHeaderBlocks()
	{
		$( '.header-block' ).prepend( '<hr />' ).append( '<hr />' );
	}
	
	function scrollTo(h)
	{
		var y	= h.length > 1 ? $( h ).offset().top - menuHeight : 0;
		
		$( 'html, body' ).animate({
			'scrollTop'	: y
		}, 1000, ease, function()
		{
			window.location.hash	= h;
		});
	}
	
	function detectBrowser()
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
		
		hasAnimations	= $( 'html' ).hasClass( 'cssanimations' );
		hasTransitions	= $( 'html' ).hasClass( 'csstransitions' );
	}
	
	return ready;
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

$( document ).ready( new Workshops( window ) );
