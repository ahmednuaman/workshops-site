var S	= {
	ready														: function()
	{
		S.detectBrowser();
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
	}
};

// var _gaq=[['_setAccount','UA-XXX'],['_trackPageview'],['_trackPageLoadTime']];
// (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
// g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
// s.parentNode.insertBefore(g,s)}(document,'script'));

$( document ).ready( S.ready );