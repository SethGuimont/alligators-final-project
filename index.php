<?php

  $nav_selected = "HOME"; // set the current page; options: TRAINS, ORG, CAPACITY, TRAINING, REPORTS, SETUP, LOGIN, HELP, SEARCH
  $left_buttons = "NO"; // make the left menu buttons visible; options: YES, NO
  $left_selected = ""; // set the left menu button selected; options: LIST, LISTS, GRID, TREE, HYBRID // IGNORE IF left_buttons==NO

  include("./nav.php"); ?>

    <div class="container" style="margin: 0 auto; position: relative; padding-left: 350px;">

      <h2>Welcome to SAFe Explorer</h2>
      <table class="datatable table table-striped table-bordered datatable-style" style="width: 50%; font-weight: bold;">
        <tr id="table-first-row">
          <td colspan="2">Summary By Numbers</td>
        </tr>
        <tr>
          <td>Solution Trains</td>
          <td>
            <?php
            $result = mysqli_query($db, "SELECT * FROM trains_and_teams WHERE type='ST'");
            $num_rows = mysqli_num_rows($result);
            echo $num_rows;
            ?>
          </td>
        </tr>
        <tr>
          <td>Agile Release Trains</td>
          <td>
          <?php
          $result = mysqli_query($db, "SELECT * FROM trains_and_teams WHERE type='ART'");
          $num_rows = mysqli_num_rows($result);
          echo $num_rows;
          ?>
          </td>
        </tr>
        <tr>
          <td>Agile Teams</td>
          <td>
          <?php
          $result = mysqli_query($db, "SELECT * FROM trains_and_teams WHERE type='AT'");
          $num_rows = mysqli_num_rows($result);
          echo $num_rows;
          ?>
          </td>
        </tr>
        <tr>
          <td>Employees</td>
          <td>
          <?php
          $result = mysqli_query($db, "SELECT * FROM employees");
          $num_rows = mysqli_num_rows($result);
          echo $num_rows;
          ?>
          </td>
        </tr>
        <tr>
          <td>Release Train Engineers</td>
          <td>
          <?php
          $result = mysqli_query($db, "SELECT * FROM membership WHERE role='Developer (DEV)'");
          $num_rows = mysqli_num_rows($result);
          echo $num_rows;
          ?>
          </td>
        </tr>
        <tr>
          <td>Scrum Masters</td>
          <td>
          <?php
          $result = mysqli_query($db, "SELECT * FROM membership WHERE role='Scrum Master (SM)'");
          $num_rows = mysqli_num_rows($result);
          echo $num_rows;
          ?>
          </td>
        </tr>
        <tr>
          <td>Product Owners</td>
          <td>
          <?php
          $result = mysqli_query($db, "SELECT * FROM membership WHERE role='Product Owner (PO)'");
          $num_rows = mysqli_num_rows($result);
          echo $num_rows;
          ?>
          </td>
        </tr>
      </table>

    </div>

<?php include("./footer.php"); ?>
