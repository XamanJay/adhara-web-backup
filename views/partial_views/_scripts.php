<script type="text/javascript" src="/js/booty.min.js"  ></script>
<script type="text/javascript" src="/js/moment/moment.min.js" ></script>
<script type="text/javascript" src="/js/moment/locale/es.js" ></script>
<!-- <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js" async ></script> -->
<script type="text/javascript" src="/js/daterangepicker.js" ></script>
<script type="text/javascript" src="/js/search.js"></script>
<script type="text/javascript" src="/js/offside.js"></script>
<script src="/js/hover/toucheffects.js"></script>
<script src="/js/jquery.visible.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>

<script type="text/javascript">

	$(window).on('load', function(){
	  setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
	});
	function removeLoader(){
	    $( "#loadingDiv" ).fadeOut(500, function() {
	      // fadeOut complete. Remove the loading div
	      $( "#loadingDiv" ).remove(); //makes page more lightweight 
	  });  
	}
	$(document).ready(function(){


		/*var eventTime= moment('2019-11-15').unix(); // Timestamp - Sun, 21 Apr 2013 13:00:00 GMT
		var currentTime = moment().unix(); // Timestamp - Sun, 21 Apr 2013 12:30:00 GMT
		var diffTime = eventTime - currentTime;
		var duration = moment.duration(diffTime*1000, 'milliseconds');
		var interval = 1000;

		setInterval(function(){
		  duration = moment.duration(duration - interval, 'milliseconds');
		  	$("#dias").html(duration.days());
		  	$("#horas").html(duration.hours());
		  	$("#min").html(duration.minutes());
		  	$("#seg").html(duration.seconds());
		    //$('.countdown').text(duration.hours() + ":" + duration.minutes() + ":" + duration.seconds())
		    console.log(duration.days()+ ":" +duration.hours() + ":" + duration.minutes() + ":" + duration.seconds());
		}, interval);*/


		var offsideMenu1 = offside( '#menu-1', {

		    slidingElementsSelector:'#general',
		    buttonsSelector: '.menu-btn-1, .menu-btn-1--close',
		    slidingSide: 'left',
		    afterOpen: function(){console.log("afterOffsideOpen")},
		});
		/* var overlay = document.querySelector('.site-overlay')
                .addEventListener( 'click', offside.factory.closeOpenOffside );*/


		// Select all links with hashes
		$('a[href*="#"]')
		  // Remove links that don't actually link to anything
		  .not('[href="#"]')
		  .not('[href="#0"]')
		  .click(function(event) {
		    // On-page links
		    if (
		      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		      && 
		      location.hostname == this.hostname
		    ) {
		      // Figure out element to scroll to
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		      // Does a scroll target exist?
		      if (target.length) {
		        // Only prevent default if animation is actually gonna happen
		        event.preventDefault();
		        $('html, body').animate({
		          scrollTop: target.offset().top
		        }, 1000, function() {
		          // Callback after animation
		          // Must change focus!
		          var $target = $(target);
		          $target.focus();
		          if ($target.is(":focus")) { // Checking if the target was focused
		            return false;
		          } else {
		            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
		            $target.focus(); // Set focus again
		          };
		        });
		      }
		    }
		  });

	});

</script>


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '322333031458441'); 
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=322333031458441&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
