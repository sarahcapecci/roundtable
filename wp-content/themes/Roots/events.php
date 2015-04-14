<?php
/*
Template Name: Events Page

This is the page where the upcoming events will be displayed
*/

include 'calendar.php';
?>
<div class="content-wrapper">
	<div class="left-side events">
		<h2>Collective Calendar <?php echo update_date($month, $year); ?></h2>
		<ul class="select-filter">
		    <li><a data-id="3" class="selected-opt event-filter black-link-b" href="<?php echo esc_url(home_url('/')); ?>">All Events</a> /</li>
		    <li class="middle-gray-txt">Show Only</li>
		    <li><a data-id="0" class="event-filter blue-link-b" href="#">Meetings |</a></li>
		    <li><a data-id="1" class="event-filter blue-link-b" href="#">Socials |</a></li>
		    <li><a data-id="2" class="event-filter blue-link-b" href="#">Fundraisers</a></li>
		</ul>
		<!-- Calendar -->
		<!-- event list is a repeater that displays events in that certain date -->
		<div id="calendar">
			<?php echo draw_calendar($month,$year,$events); ?>
		</div>
		<div class="upcoming">
		<h2>Upcoming</h2>
		<label class="mobile-only" for="">Filter by month</label>
		<form action="#" method="POST" name="upcoming_filter" class="margin-bottom-20 mobile-only">
		<select name="month">
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
		</select>
		<input type="submit" name="submit" value="filter">
		</form>
		<?php 
		if(isset($_POST['submit'])){
			// IF MONTH FILTER IS SELECTED
			$selected_month = $_POST['month'];

			$connect = mysqli_connect("youthroundtable.accountsupportmysql.com", "main", "RYR2014", "resources") or die("Error " . mysqli_error($connect));

			// Query the DB to a limit of 5 results
			$query = "SELECT * FROM wp_events WHERE MONTH(event_date) = $selected_month " or die("Error in the consult.." . mysqli_error($connect));
			
			$result = mysqli_query($connect, $query);

			// Displays the results as list items
			while($row = mysqli_fetch_assoc($result)) {
					echo "<ul><li>" .$row['submitted_by']. "</li><li><h4><a class='event' href='#' data-id='". $row['id']."'>" . $row['event_title'] . "</a></h4></li>".
					     "<li><p>" .date('F j, Y', strtotime($row['event_date'])). "</p><p>" .date('h:i', strtotime($row['event_start_time'])). " - " .date('h:i A', strtotime($row['event_end_time'])). "</p></li>" .
					     "<li><p>" .$row['event_location'] . "<p></li></ul>";
			    
			}
			mysqli_close($connect);
		
		} else {
			// IF THERE'S NO FILTER
			$connect = mysqli_connect("youthroundtable.accountsupportmysql.com", "main", "RYR2014", "resources") or die("Error " . mysqli_error($connect));
			// Query the DB to a limit of 5 results
			$query = "SELECT * FROM wp_events WHERE MONTH(event_date) = $month LIMIT 10" or die("Error in the consult.." . mysqli_error($connect));

			$result = mysqli_query($connect,$query);

			// Displays the results as list items
			while($row = mysqli_fetch_assoc($result)) {
					echo "<ul><li>" .$row['submitted_by']. "</li><li><h4>" . $row['event_title'] . "</h4></li>".
					     "<li><p>" .date('F j, Y', strtotime($row['event_date'])). "</p><p>" .date('h:i', strtotime($row['event_start_time'])). " - " .date('h:i A', strtotime($row['event_end_time'])). "</p></li>" .
					     "<li><p>" .$row['event_location'] . "<p></li></ul>";
			    
			}
			mysqli_close($connect);
		}

		
		?>
		<button id="show-all-upcoming">Show All</button>
		<div id="all-upcoming">
		<?php 
			$connect = mysqli_connect("youthroundtable.accountsupportmysql.com", "main", "RYR2014", "resources") or die("Error " . mysqli_error($connect));
			// Query the DB to a limit of 5 results
			$query = "SELECT * FROM wp_events WHERE MONTH(event_date) = $month LIMIT 10, 20" or die("Error in the consult.." . mysqli_error($connect));

			$result = mysqli_query($connect,$query);

			// Displays the results as list items
			while($row = mysqli_fetch_assoc($result)) {
					echo "<ul><li>" .$row['submitted_by']. "</li><li><h4>" . $row['event_title'] . "</h4></li>".
					     "<li><p>" .date('F j, Y', strtotime($row['event_date'])). "</p><p>" .date('h:i', strtotime($row['event_start_time'])). " - " .date('h:i A', strtotime($row['event_end_time'])). "</p></li>" .
					     "<li><p>" .$row['event_location'] . "<p></li></ul>";
			    
			}
			mysqli_close($connect);
			
		?>
		</div>
		</div>	
	</div>
	<!-- RIGHT side -->
	<div class="right-side events">
		<!-- Organizations List -->
		<div class="right-sidebar organizations">
			<h2>Explore events by <strong>Organization</strong></h2>
			<ul>
			<li><a class='filter_option' id="no-org-filter" href="#">Show All</a></li>
			<?php 
			$connect = mysqli_connect("youthroundtable.accountsupportmysql.com", "main", "RYR2014", "resources") or die("Error " . mysqli_error($connect));
			// Query the DB to a limit of 5 results
			$query = "SELECT DISTINCT user_name FROM wp_events LIMIT 10" or die("Error in the consult.." . mysqli_error($connect));

			$result = mysqli_query($connect,$query);

			// Displays the results as list items
			while($row = mysqli_fetch_assoc($result)) {
					echo "<li><a class='filter_option' href='#'>" .$row['user_name']. "</a></li>";
			    
			}
			mysqli_close($connect);
			?>
			</ul>
		</div>
		<!-- SELECTED Event -->
		<div class="selected right-sidebar" id="selected-event">
			<h2 id="event-title">RYR Executive Meeting</h2>
			<img id="event-img" class="event" src="" alt="Event Image" />
			<span class="host"><span id="user-avatar"></span> Hosted by <span id="user-name"></span></span>
			<h5 id="event-type" class="font-light"></h5>
			<p id="event-date"></p>
			<p><span id="event-start-time"></span> - <span id="event-end-time"></span></p>
			<p id="event-location"></p>
			<!-- social -->
			<section>
				<a id="eventbrite-link" href="" target="_blank"><img class="margin-right-5 small" src="<?php echo get_template_directory_uri(); ?>/assets/img/eventbrite.png" alt="Eventbrite Icon">Eventbrite Registration Page</a>
				<a id="facebook-link" href="" target="_blank"><img class="margin-right-5 small" src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.png" alt="Facebook Icon">Facebook Event</a>
			</section>
			<span class="not-visible" id="event-id-locator"></span>
			<button id="share-btn" class="share block">Share<i class="fa fa-share margin-left-5"></i></button>
			<div class="share-btn">
				<a href="" class="facebook">Share</a>
				<a href="" data-count="none" class="inline-block twitter-share-button"  data-text="Check out this event!">Tweet</a>
			</div>
			<h4 class="text-al-center">Notes</h4>
			<p id="event-notes"></p>
		</div>
	</div>
</div>