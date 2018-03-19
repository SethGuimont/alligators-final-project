<?php

  $nav_selected = "CAPACITY"; // set the current page; options: TRAINS, ORG, CAPACITY, TRAINING, REPORTS, SETUP, LOGIN, HELP, SEARCH
  $left_buttons = "YES"; // make the left menu buttons visible; options: YES, NO
  $left_selected = "SUMMARY";//let the left menu button selected; options: LIST, LISTS, GRID, TREE, HYBRID // IGNORE IF left_buttons==NO

  include("./nav.php"); ?>
  
  
  
  <div class="right-content">
    <div class="container">

        <h3 style = "color: #01B0F1;">Capacity Roll Up</h3>
		<p><b>For The Entire Program Increment PI-200 = 5500 Story Points</b></p>
		
		<div>Show
		<select name="Show" size="1">
		<option value="" selected="selected">5</option>
		<option value="">10</option>
		<option value="">15</option>
		<option value="">20</option>
		</select>Entries
		</div>
		
	
		<table id="info" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered datatable-style"
               width="100%" style="width: 100px;">
               <thead>
                 <tr id="table-first-row">
                   <th>Type</th>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Scrum Master /RTE /STE</th>
                   <th>PI200-1</th>
                   <th>PI200-2</th>
                   <th>PI200-3</th>
                   <th>PI200-4</th>
                   <th>PI200-5</th>
                   <th>PI200-6</th>
                   <th>Total</th>
                 </tr>
               </thead>

               <tbody>
			   
				<?php

                  $sql = "SELECT * from trains_and_teams";
                  $result = run_sql($sql);

                  if($result -> num_rows > 0){
                    while($row = $result -> fetch_assoc()){

                      echo
                      "<tr>
                        <td>" . $row["type"] . "</td>
                        <td>" .$row["team_id"] ."</td>
                        <td>" .$row["name"] . "</td>
                        <td>" .$row["parent"] ."</td>
                      </tr>";
                    }

                  }
				  else {
                    echo "0 results";
                  }

                  $result->close();


                 ?>




               </tbody>

                 
		</table>
		
		
		
		
     
      
		<input type = "submit" id="capacity-button-blue" value = "Show Previous PI">
		<input type = "submit" id="capacity-button-blue" value = "Show Next PI">
		
  
  
  
    <script type="text/javascript">

         $(document).ready(function () {

             $('#info').DataTable({

             });

         });

     </script>
  
<?php include("./footer.php"); ?>
