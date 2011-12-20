var S	= {
	cssAnimation												: 'webkitAnimationEnd animationend oAnimationEnd',
	cssTransition												: 'webkitTransitionEnd transitionend oTransitionEnd',
	ease														: 'easeInOutExpo',
	hasAnimations												: false,
	hasTransitions												: false,
	menuHeight													: 0,
	
	ready														: function()
	{
		var h	= window.location.hash;
		
		S.calculateHeights();
		S.detectBrowser();
		S.prepareHashLinks();
		
		if ( h.length > 0 )
		{
			S.scrollTo( h );
		}
		
		if ( $( 'body' ).hasClass( 'home' ) )
		{
			S.prepareHomeCarousel();
		}
	},
	
	calculateHeights											: function()
	{
		S.menuHeight	= $( '#menu' ).outerHeight() * 2;
	},
	
	prepareHashLinks											: function()
	{
		$( 'a[href^="/#"]' ).click( function()
		{
			var h	= '#' + $( this ).prop( 'href' ).split( '#' )[ 1 ];
			
			S.scrollTo( h );
			
			return false;
		});
	},
	
	prepareHomeCarousel											: function()
	{
		var lis	= $( '#learning-carousel > li' );
		var ts	= $( '#learning-thumbs > li' );
		
		if ( S.hasTransitions )
		{
			lis.addClass( 'hide' );
		}
		else
		{
			lis.not( ':nth-child(1)' ).hide();
		}
		
		ts.click( function()
		{
			var t	= $( this );
			var i	= t.index();
			var ls	= lis.filter( ':visible' );
			var l	= lis.eq( i );
			
			if ( S.hasTransitions )
			{
				ls.addClass( 'hide' );
				
				setTimeout( function()
				{
					l.removeClass( 'hide' );
				}, 400 );
			}
			else
			{
				ls.stop( true ).fadeOut( 'fast', S.ease, function()
				{
					$( '.thumbnail', l ).css({
						'margin-top'	: 100,
						'opacity'		: 0
					}).animate({
						'margin-top'	: 0,
						'opacity'		: 1
					}, 'slow', S.ease );
					
					$( '.excerpt', l ).hide().delay( 500 ).fadeIn();
					
					$( '.content', l ).hide().delay( 1000 ).fadeIn();
					
					l.fadeIn();
				});
			}
			
			ts.not( t ).removeClass( 'selected' );
			
			t.addClass( 'selected' );
		}).eq( 0 ).click();
	},
	
	scrollTo													: function(h)
	{
		var y	= h.length > 1 ? $( h ).offset().top - S.menuHeight : 0;
		
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