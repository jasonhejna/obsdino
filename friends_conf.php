<?php 

if (isset($_SESSION['user_id'])) {
	$sesvar = $_SESSION['user_id'];
	$result4 = mysql_query("SELECT `friends` FROM users WHERE `id` = '$sesvar' ");
		
	while($row4 = mysql_fetch_array($result4)) {

		$explodefriend = explode('|', $row4['friends']);

		foreach ($explodefriend as $key => $value) {

				$result2 = mysql_query("SELECT `full_name`, `profile_pic`, `id` FROM users WHERE `id` = $value");
				$i=0;
				while($row = mysql_fetch_array($result2)) {
					$i++;
					if (is_null($row['profile_pic'])) {
						echo '<div id="userbox">

						<div id="coolbox">
						<img class="upic" src="images/malesilhouette.png" /></div>&nbsp;&nbsp;' 
				    	. $row['full_name'] . '<form><input id="conf" class="confirmfr" name="' . $row['id'] . '" type="button" /></form></div>';
					}
					else {
						echo '<div id="userbox">
						
						<div id="coolbox">
						<img class="upic" src="data:image/jpeg;base64,' . base64_encode( $row['profile_pic'] ) . '" /></div>&nbsp;&nbsp;' 
				    	. $row['full_name'] . '<form><input id="conf" class="confirmfr" name="' . $row['id'] . '" type="button" /></form></div>';
					}
				}

		}

	}


	
}
?>