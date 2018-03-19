<?php

  $nav_selected = "CAPACITY"; // set the current page; options: TRAINS, ORG, CAPACITY, TRAINING, REPORTS, SETUP, LOGIN, HELP, SEARCH
  $left_buttons = "YES"; // make the left menu buttons visible; options: YES, NO
  $left_selected = "ACTIVE_PI"; // set the left menu button selected; options: LIST, LISTS, GRID, TREE, HYBRID // IGNORE IF left_buttons==NO

  include("./nav.php"); ?>

 <div class="right-content">
    <div class="container">

        <h3>Capacity</h3>

		<table style="width:100%" style="border: 1px solid black; border-collapse: collapse;">
		  <tr>
			<th colspan="2">Current Iteration Details</th>
		  </tr>
		  <tr>
			<td>Today's Date</td>
			<?php
				echo "<td>" . date("Y-m-d") . "</td>";
			?>
		  </tr>
		  <tr>
			<td>Program Increment (PI)</td>
			<?php
				$sql = "SELECT *
				FROM `cadence`
				WHERE start_date <= '" . date("Y-m-d") . "'
				AND end_date >= '". date("Y-m-d") . "'";
				$result = run_sql($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					echo "<td>" . $row["program_increment"] . "</td>";
				} else {
					echo "<td>In-between Program Increments</td>";
				}
				$result->close();
			?>
		  </tr>
		  <tr>
			<td>Iteration</td>
			<?php
				$sql = "SELECT *
				FROM `cadence`
				WHERE start_date <= '" . date("Y-m-d") . "'
				AND end_date >= '". date("Y-m-d") . "'";
				$result = run_sql($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					echo "<td>" . $row["iteration"] . "</td>";
				} else {
					echo "<td>In-between Iterations</td>";
				}
				$result->close();
			?>
		  </tr>
		  <tr>
			<td>Current Iteration Ends On</td>
			<?php
				$sql = "SELECT *
				FROM `cadence`
				WHERE start_date <= '" . date("Y-m-d") . "'
				AND end_date >= '". date("Y-m-d") . "'";
				$result = run_sql($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					echo "<td>" . $row["end_date"];
					$date1 = new DateTime(date("Y-m-d"));
					$date2 = new DateTime($row["end_date"]);
					$interval = $date1->diff($date2);
					echo " (In " . ($interval->days) . " days)";
				} else {
					echo "<td>In-between Iterations</td>";
				}
				$result->close();
			?>
		  </tr>
		  <tr>
			<td>Current Program Increment Ends On</td>
			<?php
				$sql = "SELECT *
					FROM
					(	SELECT MIN(start_date) as start_date, MAX(end_date) as end_date
						FROM cadence
						WHERE start_date <= '" . date("Y-m-d") . "'
						OR end_date >= '" . date("Y-m-d") . "'
						GROUP BY program_increment
					) as PI
					WHERE PI.start_date <= '" . date("Y-m-d") . "'
					AND PI.end_date >= '" . date("Y-m-d") . "'";
				$result = run_sql($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					echo "<td>" . $row["end_date"];
					$date1 = new DateTime(date("Y-m-d"));
					$date2 = new DateTime($row["end_date"]);
					$interval = $date1->diff($date2);
					echo " (In " . ($interval->days + 1). " days)";
				} else {
					echo "<td>In-between Program Increments</td>";
				}
				$result->close();
			?>
		</table>
    </div>
</div>

<?php include("./footer.php"); ?>
