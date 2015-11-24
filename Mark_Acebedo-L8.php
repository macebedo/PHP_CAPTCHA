<?php

	$debug = 1;

	require_once "./include/variables.inc.php";

	$output_form = true;
	$error_text ='';

	$user_number = '';
	$unumber_regex = '/^([A-Z]|[a-z]|[0-9]|\^|\$|\@){5}$/';  // Allow alphanumeric (A-Z,a-z, 0-9), $,^, and @.
	$unumber_error_message = 'Invalid Entry';

	if (isset($_POST['submit'])) {

		$user_number = trim($_POST['userNumber']);

		//validate number

		if (preg_match($unumber_regex, $user_number)) {

			$output_form = false;

		} else {
			
			$output_form = true;
			$error_text .= "<p class='error'>$unumber_error_message </p>\n\r";
		}

	} // end if/else (isset($_POST['submit']))

?>

<!DOCTYPE html>
<html lang="en">
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <title>CAPTCHA</title>
   </head>
   
   <body>
       <header>
        <div id="header">
           <h2>CAPTCHA</h2>
        </div>
      </header>  
<?php if ($output_form) { 	?>  

      <p>Please enter a five character string.<br> The legal characters are alphanumeric (A-Z,a-z, 0-9), $,^, and @.<br>Anything other than what is required will be an invalid entry. </p>
      
      <form action="<?=$_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" target="_self"> 

        <!-- USER ENTRY -->

        <table id="main_table"> <!-- Start of table -->
              <tr>
                 <td class="columnOne">Enter your string (Alphanumeric):</td>
                <td class="columnOne"><input type="text" name="userNumber" value="<?=$user_number ?>"></td>
             	 <td><?=$error_text ?></td>
              </tr>
             <tr>
                  <td>
                  <br><input type="submit" name="submit" value="Submit">
                 </td>
              </tr>
        </table> <!-- End of table -->

      </form>

<?php
	} else {
?>		
	<h2>User Number is validated - create graphics</h2>		

	<p>Your number in CAPTCHA style is <br><img src="http://acebedo.byethost10.com/PHP_ASSIGNMENT_8/number_image.php?uNumb=<?=$user_number ?>" alt="user number image"></p>

<?php
	}
?>

	</body>
</html>