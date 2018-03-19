<?php

  $nav_selected = "ORG"; // set the current page; options: TRAINS, ORG, CAPACITY, TRAINING, REPORTS, SETUP, LOGIN, HELP, SEARCH
  $left_buttons = "YES"; // make the left menu buttons visible; options: YES, NO
  $left_selected = "LIST"; // set the left menu button selected; options: LIST, LISTS, GRID, TREE, HYBRID // IGNORE IF left_buttons==NO

  include("./nav.php"); ?>

<div class="right-content">
    <div class="container">

        <h3>Employees</h3>

        <table id="info" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered datatable-style"
               width="100%" style="width: 100px;">

            <thead>

            <tr id="table-first-row">

                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Country</th>
                <!--<th>ZipCode</th>-->
                <!-- <th>ManagerID</th> -->
                <th>Status</th>
                <th>PrimaryTeam</th>

            </tr>

            </thead>

            <tbody>


            <?php

            $sql = "SELECT * FROM Employees";

            $result = run_sql($sql);


            if ($result->num_rows > 0) {

                // output data of each

                while ($row = $result->fetch_assoc()) {



                    echo
                    "<tr>
                        <td>" . $row["employee_nbr"] . "</td>
                        <td>" . $row["first_name"] . "</td>
            						<td>" . $row["last_name"] . "</td>
            						<td>" . $row["email_address"] . "</td>
                        <td>" . $row["city"] . "</td>
                        <td>" . $row["country"] . "</td>
                        <!--<td>" . $row["manager_nbr"] . "</td>-->
                        <td>" . $row["status"] . "</td>
                        <td>" . $row["primary_team"] . "</td>
                    </tr>";
                }
            } else {
                echo "0 results";
            }

            $result->close();

            // *** delete button functionality ***
			/*
            if (isset($_GET['id'])) {
                if ($_GET['button'] == 'delete') {
                    $id = $_GET['id'];

                    $sql = 'DELETE FROM characters WHERE word_id=' . $id . ';';
                    $result = $db->query($sql);

                    $sql = 'DELETE FROM words WHERE word_id=' . $id . ';';
                    $result = $db->query($sql);

                    echo ' <script> alert(\'Record has been successfully deleted!!\'); window.location.replace("list.php"); </script>';
                }
            }

            if (isset($_POST['submit'])) {
                $inputFileName = $_FILES["fileToUpload"]["tmp_name"];
                $target_dir = "./Images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $imageName = basename($_FILES["fileToUpload"]["name"]);
                copy($inputFileName, $target_file);
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    $sql = 'UPDATE words SET image=\'' . $imageName . '\' WHERE word_id=' . $_POST['word_id'] . '';
                    $result = run_sql($sql);
                    echo ' <script> alert(\'Image Upload Successful!!\'); window.location.replace("list.php"); </script>';
                } else {
                    echo ' <script> alert(\'Image is not valid!\');</script>';
                }
            }*/
            ?>

            <!--<script>
                function validateForm() {
                    var eng = document.forms["importFrom"]["fileToUpload"].value;
                    if (eng == "") {

                        document.getElementById("error").style = "display:block;background-color: #ce4646;padding:5px;color:#fff;";
                        return false;
                    }
                }

            </script>-->

            </tbody>

            <tfoot>

            <tr>

                <th>EmpID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Country</th>
                <!--<th>ZipCode</th>-->
                <!--<th>ManagerID</th>-->
                <th>Status</th>
                <th>PrimaryTeam</th>

            </tr>

            </tfoot>

        </table>

    </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {

            $('#info').DataTable({

            });

        });

    </script>

<?php include("./footer.php"); ?>
