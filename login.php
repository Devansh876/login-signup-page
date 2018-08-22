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
   </head>
   <body>
      <?php
      $user = $_POST["loginusername"];
      $pw = $_POST["loginpassword"];

         $query = "SELECT firstName, lastName, email, phone FROM auth WHERE username='".$user."' and password='".$pw."';";
 
         // Connect to MySQL
         if ( !( $database = mysqli_connect( "localhost", "webphp", "password" ) ) )                      
            die( "Could not connect to database </body></html>" );

         if (mysqli_num_rows($result) == 0) {
            print "Error: Username or password not found! Please try again.";
          }
        else {
            print "Welcome back user ".$user."! Here's your information:";
          }

         showTable($database);
         mysqli_close( $database );

      ?>

      <?php

      function showTable($database) {
      $user = $_POST["loginusername"];
      $pw = $_POST["loginpassword"];
      $query = "SELECT firstName, lastName, email, phone FROM auth WHERE username='".$user."' and password='".$pw."';";
      print ("<table>");
      if ( !( $result = mysqli_query( $database,$query ) ) ) 
             {
                print( "<p>Could not execute query!</p>" );
                die( mysqli_error($database) . "</body></html>" );
             } // end if
        else {

          print( "<tr><td> First Name</td>
            <td> Last Name</td><td> Email</td>
            <td> Phone</td>
            </tr>");

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
      </table>
    </body>
  </html>