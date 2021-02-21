<?php
	include_once 'chocolate.php';

  	function generate_salt()
  	{
		define("MAX_LENGTH", 6);
	    	$intermediateSalt = md5(uniqid(rand(), true));
    		$salt = substr($intermediateSalt, 0, MAX_LENGTH);
     
      		return $salt; 
  	}

	function generate_password($password)
	{
		
		$salt = generate_salt();
		//echo "salt is : " . $salt;
  		//echo "<br>";
		
		$random1 = rand(0,55);
		$random2 = $random1+8;
		//echo $random1." and ".$random2."<br>";
		
		$initial_password = hash("sha256", $password . $salt);
  		//echo $initial_password;
  		//echo "<br>";
		
		//var_dump($initial_password);
		//echo "<br>";
		
		for($i=$random1;$i<$random2;$i++)
			$compact.=$initial_password[$i];
		
		//echo $compact;
  		//echo "<br>";
		
		//var_dump($compact);
		//echo "<br>";
		
		
		$numbers = Array(0,1,2,3,4,5,6,7,8,9);
		$uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$lowercase = 'abcdefghijklmnopqrstuvwxyz';
		//$special = '`-=~!@#$%^&*()_+,./<>?;:[]{}\|';
		$special = '`-=~!@#$%^&*()_+,./?;:[]{}\|';
		
		$one = $numbers[random_int(0,10)];
		//echo "random number : ".$one;
		//echo "<br>";
		$two = $uppercase[random_int(0,25)];
		//echo "random upper : ".$two;
		//echo "<br>";
		$three = $lowercase[random_int(0,25)];
		//echo "random lower : ".$three;
		//echo "<br>";
		$four = $special[random_int(0,29)];
		//echo "random special : ".$four;
		//echo "<br>";

		$one1 = $numbers[random_int(0,10)];
		//echo "random number : ".$one1;
		//echo "<br>";
		$two2 = $uppercase[random_int(0,25)];
		//echo "random upper : ".$two2;
		//echo "<br>";
		$three3 = $lowercase[random_int(0,25)];
		//echo "random lower : ".$three3;
		//echo "<br>";
		$four4 = $special[random_int(0,29)];
		//echo "random special : ".$four4;
		//echo "<br>";
		
		$secure_password = $one.$two.$three.$four.$compact.$one1.$two2.$three3.$four4;
		//echo $secure_password;
		
		//echo "<br><br><br><br>";
		
		return $secure_password;
		
	} 	
	

?>
