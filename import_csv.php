<?php include("./nav.php"); ?>

    <div id="body-container">

        <div id="import-form">

          <?php

          //Upload File
          if (isset($_POST['submit'])) {

            $target_table = $_POST['target_table'];
            $deleterecords = "TRUNCATE TABLE ".$target_table; //empty the table of its current records
            $result = run_sql($deleterecords);

              if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                  echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded
                    successfully." . "</h1>";
                  echo "<h2>Displaying contents:</h2>";
                  readfile($_FILES['filename']['tmp_name']);
              }

              $inputFileName = $_FILES['filename']['tmp_name'];
              $target_dir = "/var/www/html/safe/csv/";
              $target_file = $target_dir . $target_table . "-" . basename($_FILES['filename']['name']);
              //echo $target_file;
              $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
              $imageName = basename($_FILES['filename']['name']);
              // echo $imageName;
              if (!empty($imageName)) {
                  copy($inputFileName, $target_file);
              }

              print "file uploaded to".$target_file;

              if ($target_table == "Employees") {
                //Import uploaded file to Database
                $query =      "LOAD DATA INFILE '".$target_file."'
                               INTO TABLE ".$target_table."
                               FIELDS TERMINATED BY ','
                               OPTIONALLY ENCLOSED BY '\"'
                               LINES TERMINATED BY '\\r\\n'
                               IGNORE 1 LINES
                              (employee_id, last_name,	first_name,	city,	country,	manager_id,	email,	cost_center_id,	status,	primary_team,	date_created,	date_modified);";
              }

               $result = run_sql($query);

               print $result;

              print "<br/><br/>Import done";

          //view upload form
          } else {
            ?>

              <form enctype='multipart/form-data' action='import_csv.php' method='post'>

              <h3>Import new CSV data to Database from local file:</h3>

              <h4>Select target table to import data to:</h4>
              <select name="target_table">
                <option value="Employees">Employees</option>
              </select>

              <h4>Select a file (must be .csv):</h4>

              <input size='50' type='file' name='filename'><br />

              <input type='submit' name='submit' value='Upload'></form>

          <?php
          }

          ?>

      </div>

    </div>

<?php include("./footer.php"); ?>
