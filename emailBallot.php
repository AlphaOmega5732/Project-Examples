<?php
// loop through POST Variables and auto assign // https://www.php.net/manual/en/control-structures.foreach.php
// $_POST is an array containing the values passed from the form https://www.php.net/manual/en/reserved.variables.post
foreach($_POST as $x => $value) {  // key => value - $x is the Name of the input(key) => $value is the Value of the input
			$nameOfVar = $x; // assign the variable "nameOfVar" to $x (name passed from input field)
			$$nameOfVar = $value; // assign that value of the variable "nameOfVar" as a "variable variables", that is assign the value of nameOfVar as the variable name AND assign $value as the Value		// https://www.php.net/manual/en/language.variables.variable.php	
		}

// To view exactly what the $_POST array contains uncomment below
//echo '<pre>'; print_r($_POST); echo '</pre>';
// To view more details of the $_POST array uncomment below
//echo '<pre>'; var_dump($_POST); echo '</pre>';

date_default_timezone_set('America/Chicago'); // https://www.php.net/manual/en/function.date-default-timezone-set
$formattedDate = date("M d, Y h:i A"); // Month Day, Year Hour:Minutes AM/PM Date Format //https://www.php.net/manual/en/function.date.php
// create the email body
$mailBody ='
<html>
<body>
	<p>El Matador Condominium Owners Association<br>
663 Bishops Lodge Road - Unit 81<br>
	Santa Fe, NM 87501</p>
	<h2>BALLOT</h2> 
<p>Below please find the names of the Candidates running for the Board of Directors of the El 
Matador Condominium Owners Association for 2022-2024. Three (3) Directors will be 
	elected for a two (2) year term.  </p>
Your Name and Unit Number: <br>
Name:<br><strong>'.$contactName.'</strong><br>
<br>Unit Number:<br><strong>'.$unitNumber.'</strong><br><br>
Vote for up to three (3) Candidates by typing an "X" in the box.  <br>
<ol  style="list-style-type:none; text-align:left;">
	<li>CANDIDATE 1 (Phase I, Unit #) <strong>'.$candidate1.'</strong></li>
	<li>CANDIDATE 2 (Phase II, Unit #) <strong>'.$candidate2.'</strong></li>
	<li>CANDIDATE 3 (Phase III, Unit #) <strong>'.$candidate3.'</strong></li>
</ol>	
<br> 
'.$formattedDate.'</body></html>';
$from ="EMAIL"; // return email
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "Cc: admin <EMAIL>\n"; // CC Email
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
// More headers
$customerEmail ="EMAIL"; // Send to this Email Address(Client)
$subject = 'Matador Condominium Owners Association Ballot';
// Send the Email
if(mail($customerEmail, $subject, $mailBody, $headers)){ // https://www.php.net/manual/en/function.mail
	// Success Message
echo "Mail Sent!<br>";
} else{
	// Failure Message
	echo "Mail Failed to Send!<br>";
}
unset($_POST); // clear the variables in POST