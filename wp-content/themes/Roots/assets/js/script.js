$(document).ready(function(){

	// EVENTS FILTER

		// BY TYPE
	$('.event-filter').on('click', function(e){
		e.preventDefault();
		$('.event-filter').removeClass('selected-opt');
		$(this).addClass('selected-opt');
		var eventType = $(this).data('id');
		
		if(eventType == 3) {
			$('.event').fadeIn();
		} else {
		$('.event').fadeOut();
		$("div[data-type='"+eventType+"']").fadeIn();
		}

	});
		// BY ORGANIZATION

		$('.filter_option').on('click', function(e){
			e.preventDefault();
			var chosen_org = $(this).text();
			$('.filter_option').css('font-weight', '400');
			$(this).css('font-weight', '600');
			$('div.event').fadeOut(); //inside calendar
			$("div[data-author='"+chosen_org+"']").fadeIn();

			$('.upcoming ul').fadeOut(); // upcoming lines
			$("ul[data-author='"+chosen_org+"']").fadeIn();
			
			

			if($(this).attr('id') == "no-org-filter") {
				$('.event').fadeIn();
				$('.upcoming ul').fadeIn();
			}
		});

		// UPCOMING EVENTS SHOW ALL
		$('#show-all-upcoming').on('click', function(){
			$('#all-upcoming').show();
		});

	// URL PARSER
	function getUrlVars() {
	    var vars = [], hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    
	    for (var i = 0; i < hashes.length; i++) {
	        hash = hashes[i].split('=');
	        vars.push(hash[0]);
	        vars[hash[0]] = hash[1];
	    }
	    return vars.eventid;
	};


	// DISPLAY EVENT DETAIL ON SIDEBAR

	// event display function
	var eventDisplay = function(event_id) {
		$.ajax({
			url: "http://youthroundtable.ca/wp-content/themes/Roots/event_info.php",
			type: "POST",
			data: {
				eventParam : event_id
			},
			contentType: "application/x-www-form-urlencoded",
			dataType: "json",
			success: function(data){
				$('.selected').show();
				$('#event-title').html(data.event_title);
				$('#event-img').attr('src', data.event_img);
				$('#user-avatar').html(data.event_submitted_by);
				$('#user-name').html(data.user_name);
				$('#event-date').html(data.event_date);
				$('#event-start-time').html(data.event_start_time);
				$('#event-end-time').html(data.event_end_time);
				$('#event-location').html(data.event_location);
				$('#event-notes').html(data.event_notes);
				$('#event-id-locator').html(event_id);

				if(data.eventbrite_url) {
					$('#eventbrite-link').attr('href', data.eventbrite_url);
				} else {
					$('#eventbrite-link').hide();
				}

				if(data.facebook_url) {
					$('#facebook-link').attr('href', data.facebook_url);
				} else {
					$('#facebook-link').hide();
				}
				

				// Event Type - Meeting, Socials, Fundraising
				if(data.event_type == 0) {
					$('#event-type').html("Meeting");	
				} else if (data.event_type == 1) {
					$('#event-type').html("Social");
				} else if (data.event_type == 2){
					$('#event-type').html("Fundraising");
				} else {
					$('#event-type').html("Event");
				}

				// show and hide divs
				$('.new-event').hide();
				$('.organizations').hide();

				
				// screen positioning
				if($(window).width() < 400) {
					//scroll down if mobile
					$('body').animate({
					    scrollTop: $('#selected-event').offset().top
					}, 2000);

				} else {
					//scroll up if not mobile
					$('body').animate({
					    scrollTop: 100
					}, 2000);
				}
			},
			error: function() {
				console.log("Sorry, there was an error.");
			}
		});
	};

	// AJAX CALL TO DISPLAY EVENT
	$('.event').on('click', function(){
		var event_id = $(this).data("id");
		eventDisplay(event_id);

	});

	// Display event by URL
	if(getUrlVars() != undefined) {
		var eventIdNumber = getUrlVars();
		eventDisplay(eventIdNumber);
	}

	// SOCIAL MEDIA SHARING

	$('#share-btn').on('click', function(){
		$('div.share-btn').show();
		// TWITTER
		window.twttr = (function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));

		var eventIdentification = $('#event-id-locator').html();  
		var oldUrl = 'http://youthroundtable.ca/events/?eventid=' + eventIdentification;
		var encodedUrl = encodeURIComponent(oldUrl);
		$('.twitter-share-button').attr('href', 'https://twitter.com/intent/tweet?url=' + encodedUrl);

		// Facebook Sharing link
		function FBshare(){	
		  shareURL = encodedUrl;
		  console.log(shareURL);
		  window.open(
		     'https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&sdk=joey&u='+shareURL, 
		     'facebook-share-dialog', 
		     'width=626,height=436'); 
		  return false;
		}

		$(".facebook").bind("click", function(){
		   FBshare();
		});
	});

});