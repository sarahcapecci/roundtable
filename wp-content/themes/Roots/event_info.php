<?php 
$request_id = $_POST['eventParam'];
$data = array();

$connect = mysqli_connect("youthroundtable.accountsupportmysql.com", "main", "RYR2014", "resources") or die("Error " . mysqli_error($connect));

$query = "SELECT event_title, event_img, submitted_by, event_type, event_date, event_start_time, event_end_time, eventbrite_url, facebook_url, event_location, event_notes, user_name, event_img_size, event_img_name, event_img_type FROM wp_events WHERE id = $request_id " or die("Error in the consult.." . mysqli_error($connect));

$result = mysqli_query($connect, $query);

while($row = mysqli_fetch_assoc($result)) {
	$data['event_title'] = $row['event_title'];
	$data['event_submitted_by'] = $row['submitted_by'];
	$data['event_type'] = $row['event_type'];
	$data['event_date'] = date('l, F j, Y', strtotime($row['event_date']));
	$data['event_start_time'] = date('h:i A', strtotime($row['event_start_time']));
	$data['event_end_time'] = date('h:i A', strtotime($row['event_end_time']));
	$data['eventbrite_url'] = $row['eventbrite_url'];
	$data['facebook_url'] = $row['facebook_url'];
	$data['event_location'] = $row['event_location'];
	$data['event_notes'] = $row['event_notes'];
	$data['user_name'] = $row['user_name'];

	if ($row['event_img_size'] > 0) {
		$data['event_img'] = "http://youthroundtable.ca/torch/wp-content/themes/Roots/assets/img/events_img/" .$row['event_img_name'];
	} else {
		$data['event_img'] = "http://youthroundtable.ca/torch/wp-content/themes/Roots/assets/img/events_img/default-calendar.jpg";
	}

}

echo json_encode($data);

?>