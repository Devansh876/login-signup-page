<!DOCTYPE html>

<!-- Querying a database and displaying the results. -->
<html>
   <head>
      <meta charset = "utf-8">
      <title>Search Results</title>
   <style type = "text/css">
         body  { font-family: sans-serif;
                 background-color: lightyellow; } 
         table { background-color: lightblue; 
                 border-collapse: collapse; 
                 border: 1px solid gray; }
         td    { padding: 5px; }
         tr:nth-child(odd) {
                 background-color: white; }
      </style>

      <script src="finalp.js"></script>

   </head>
   <body>
      <?php
      $un = $_POST["signusername"];
      $pw = $_POST["signpassword"];
      $fn = $_POST["sfirstname"];
      $ln = $_POST["slastname"];
      $ph = $_POST["sphone"];
      $em = $_POST["semail"];

       // build SELECT query
         $query="INSERT INTO auth (username, password, firstName, lastName, email, phone) VALUES ('".$un."','".$pw."','".$fn."','".$ln."','".$em."','".$ph."')";
         //$query = "SELECT * FROM auth WHERE username='".$user."' and password='".$pw."';";
        
         // Connect to MySQL
         if ( !( $database = mysqli_connect( "localhost", "webphp", "password" ) ) )                      
            die( "Could not connect to database </body></html>" );
   
         else {
          print "<p>Success! You are now registered.</p>";
         }

         showTable($database);
         mysqli_close( $database );

      ?>

      <?php

      function showTable($database) {
      $query = "SELECT firstName, lastName FROM auth";
      print ("<table>");
      if ( !( $result = mysqli_query( $database,$query ) ) ) 
             {
                print( "<p>Could not execute query!</p>" );
                die( mysqli_error($database) . "</body></html>" );
             } // end if
        else {

          print( "<tr><td> First Name</td><td> Last Name</td></tr>");


          while ( $row = mysqli_fetch_row( $result ) )
                {
                   // build table to display results
                   print( "<tr>" );
                   

                   foreach ( $row as $value ) 
                      print( "<td>$value</td>" );

                   print( "</tr>" );
                }
      print ("</table>");

        }
    }

      ?>
      
    </body>
  </html>