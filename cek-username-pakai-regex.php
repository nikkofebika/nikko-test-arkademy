<?php
	 function isAcceptedUsername($username) {
		  return preg_match('/^[aiueo]{3}[a-zA-Z0-9]{2,7}$/',$username) ;
	 }
	 
	 // Cara menggunakan fungsi di atas
	 if (isAcceptedUsername("Aaat3st1ng")) {
		 echo "Username Is Valid" ;
	 } else {
		 echo "Username Is Invalid" ;
	 }
?>