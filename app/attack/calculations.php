<?		


  include("include/connect.php");

	
			//subtraction warriors, wizards, priests to warout, wizout, priout for you
			$subtractedwar = $uwarrior * .89;
			$subtractedwiz = $uwizard * .85;
			$subtractedpri = $upriest * .87;
 			$subtractedarch = $uarcher * .90;

			if($wardef == 3)
				{
					$subtractedwar = $uwarrior * .9165;
				}
			if($wardef == 5)
				{
					$subtractedwar = $uwarrior * .92;
				}
			if($wardef == 6)
				{
					$subtractedwar = $uwarrior * .92375;
				}
			if($wardef == 9)
				{
					$subtractedwar = $uwarrior * .94;
				}
			
			
			if($archdef == 3)
				{
					$subtractedarch = $uarcher * .9185;
				}
			if($archdef == 5)
				{
					$subtractedarch = $uarcher * .925;
				}
			if($archdef == 6)
				{
					$subtractedarch = $uarcher * .92475;
				}
			if($archdef == 9)
				{
					$subtractedarch = $uarcher * .945;
				}
			$subtractedwar = floor($subtractedwar);
			$subtractedwiz = floor($subtractedwiz);
			$subtractedpri = floor($subtractedpri);
			$subtractedarch = floor($subtractedarch);

			$warriors = $warriors - $uwarrior;
			$wizards = $wizards - $uwizard;
			$priests = $priests - $upriest;
			$archers = $archers - $uarcher;
	
			 mysql_query("UPDATE military SET warriors =\"$warriors\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET wizards =\"$wizards\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET priests =\"$priests\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET archers =\"$archers\" WHERE email='$email' AND pw='$pw'");
	
	 		$subwarexp = ($uwarrior - $subtractedwar) * $warexpa;
			$subwizexp = ($uwizard  - $subtractedwiz) * $wizexpa;
			$subpriexp = ($upriest - $subtractedpri) * $priexpa;
			$subarchexp = ($uarcher - $subtractedarch) * $archexpa;
			$totalsubexp = $exp2 - $subwarexp - $subwizexp - $subpriexp - $subarchexp;
			mysql_query("UPDATE user SET exp2 =\"$totalsubexp\" WHERE email='$email' AND pw='$pw'");
	

			$warcol = "war" . "$fleets";
			$wizcol = "wiz" . "$fleets";
			$pricol = "pri" . "$fleets";
			$archcol = "arch" . "$fleets";
	  
			mysql_query("UPDATE return SET $warcol =\"$subtractedwar\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET $wizcol =\"$subtractedwiz\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET $pricol =\"$subtractedpri\" WHERE email='$email' AND pw='$pw'");
			mysql_query("UPDATE return SET $archcol =\"$subtractedarch\" WHERE email='$email' AND pw='$pw'");

		
				if($uwarrior > 0 AND $uwarrior != "")
				{$Tally_f = $Tally_f + 1; $wspeed = $warspeedw + $warspeeda;
				}
				if($uwizard > 0 AND $uwizard != "")
				{$Tally_f = $Tally_f + 1; $wispeed = $wizspeeds + $wizspeeda;
				}
				if($upriest > 0 AND $upriest != "")
				{$Tally_f = $Tally_f + 1; $pspeed = $prispeedw + $prispeeda;
				}
				if($uarcher > 0 AND $uarcher != "")
				{$Tally_f = $Tally_f + 1; $aspeed = $archspeedw + $archspeeda;
				}
				$R_time = ($wspeed + $wispeed + $pspeed + $aspeed) / $Tally_f;
		

				//RETURN TIME
				$returning = "time" . "$fleets";
				
				mysql_query("UPDATE return SET $returning =\"$R_time\" WHERE email='$email' AND pw='$pw'");
				
				$newfleets = $fleets - 1;
				mysql_query("UPDATE user SET fleets =\"$newfleets\" WHERE email='$email' AND pw='$pw'");



/*	
	//###########empire subtract begins
	//subtraction warriors, wizards, priests to warout, wizout, priout for you
			$newwar = $ttwarriors * .89;
			$newwiz = $ttwizards * .85;
			$newpri = $ttpriests * .87;
 			$newarch = $ttarchers * .90;

			if(WAR_DEF == 3)
				{
					$newwar = $ttwarriors * .9165;
				}
			if(WAR_DEF == 5)
				{
					$newwar = $ttwarriors * .92;
				}
			if(WAR_DEF == 6)
				{
					$newwar = $ttwarriors * .92375;
				}
			if(WAR_DEF == 9)
				{
					$newwar = $ttwarriors * .94;
				}
			
			
			if($ARCH_DEF == 3)
				{
					$newarch = $ttarchers * .9185;
				}
			if($ARCH_DEF == 5)
				{
					$newarch = $ttarchers * .925;
				}
			if($ARCH_DEF == 6)
				{
					$newarch = $ttarchers * .92475;
				}
			if($ARCH_DEF == 9)
				{
					$newarch = $ttarchers * .945;
				}
			$newar = floor($newar);
			$newwiz = floor($newwiz);
			$newpri = floor($newpri);
			$newarch = floor($newarch);

			$war_exp = ($ttwarriors - newwar) * $warexpa;
			$wiz_exp = ($ttwizards - $newwiz) * $wizexpa;
			$pri_exp = ($ttpriests - $newpri) * $priexpa;
			$arch_exp = ($ttarchers - $newarch) * $archexpa;
			
			$war_exp = round($war_exp);
			$wiz_exp = round($wiz_exp);
			$pri_exp = round($pri_exp);
			$arch_exp = round($arch_exp);
	
			 mysql_query("UPDATE military SET warriors =\"$newwar\" WHERE userid='$empvalue'");
			 mysql_query("UPDATE military SET wizards =\"$newwiz\" WHERE userid='$empvalue'");
			 mysql_query("UPDATE military SET priests =\"$newpri\" WHERE userid='$empvalue'");
			 mysql_query("UPDATE military SET archers =\"$newarch\" userid='$empvalue'");
	
	 		
			$empvalue_exp = $A_EXP2 - ($war_exp + $wiz_exp + $pri_exp + $arch_exp);
			mysql_query("UPDATE user SET exp2 =\"$empvalue_exp\" WHERE userid='$empvalue'");
*/
		
		//###########EMPIRE ATTACKED SUBTRACT ENDS
				

?>