 <?

include("include/connect.php");
##########################################################################################################################
####
####
####		your stuff begins
####
####
#########################################################################################################################		
		

			$tfleets = $fleets;
	

			if($TIME_1 == 0)
				{$tfleets = 1;}
			if($TIME_2 == 0)
				{$tfleets = 2;}
			if($TIME_3 == 0)
				{$tfleets = 3;}
			if($TIME_4 == 0)
				{$tfleets = 4;}
		
			//DEFAULT HIT POINTS
			$archhp = 170;
			$warhp = 160;
			$prihp = 150;
			$wizhp = 140;
			
			
			if($wardef == 3)
				{$warhp = 210;
				}
			if($wardef == 5)
				{$warhp = 260;
				}
			if($wardef == 6)
				{$warhp = 285;
				}
			if($wardef == 9)
				{$warhp = 335;
				}
			
			
			if($archdef == 3)
				{$archhp = 230;
				}
			if($archdef == 5)
				{$archhp = 290;
				}
			if($archdef == 6)
				{$archhp = 310;
				}
			if($archdef == 9)
				{$archhp = 400;
				}

			if($pridef == 4)
				{$prihp = 180;
				}
			if($pridef == 6)
				{$prihp = 250;
				}
			
			if($wizdef == 3)
				{$wizhp == 200;
				}
			if($wizdef == 5)
				{$wizhp == 260;
				}
			if($wizdef == 8)
				{$wizhp = 300;
				}

	if($uwarrior > 0)
		{$u_tally = $u_tally + 1;}
	elseif($uwizard > 0)
		{$u_tally = $u_tally + 1;}
	elseif($upriest > 0)
		{$u_tally = $u_tally + 1;}
	elseif($uarcher > 0)
		{$u_tally = $u_tally + 1;}


		$divided_pts = $theirtotalpower / $u_tally;
		if($theirtotalpower == 0)
			{$theirtotalpower = 10;}

		if($uwarrior > 0)
			{
			 $total_war_hp = $uwarrior * $warhp;
			  $y_war_loss = $total_war_hp - $divided_pts;
			   $y_war_loss = $y_war_loss / $warhp;
				if($y_war_loss < 0)
					{$y_war_loss = 0;}
			   $subtractedwar = round($y_war_loss);
			  $warcol = "war" . "$tfleets";
			 mysql_query("UPDATE return SET $warcol =\"$subtractedwar\" WHERE email='$email' AND pw='$pw'");
			}
		if($uwizard > 0)
			{
			 $total_wiz_hp = $uwizard * $wizhp;
			  $y_wiz_loss = $total_wiz_hp - $divided_pts;
			   $y_wiz_loss = $y_wiz_loss / $wizhp;
				if($y_wiz_loss < 0)
					{$y_wiz_loss = 0;}
			   $subtractedwiz = round($y_wiz_loss);
			  $wizcol = "wiz" . "$tfleets";
			 mysql_query("UPDATE return SET $wizcol =\"$subtractedwiz\" WHERE email='$email' AND pw='$pw'");	
			}
		if($upriest > 0)
			{
			 $total_pri_hp = $upriest * $prihp;
			  $y_pri_loss = $total_pri_hp - $divided_pts;
			   $y_pri_loss = $y_pri_loss / $prihp;
				if($y_pri_loss < 0)
					{$y_pri_loss = 0;}
			   $subtractedpri = round($y_pri_loss);
			  $pricol = "pri" . "$tfleets";
			 mysql_query("UPDATE return SET $pricol =\"$subtractedpri\" WHERE email='$email' AND pw='$pw'");
			}
		if($uarcher > 0)
			{
			 $total_arch_hp = $uarcher * $archhp;
			  $y_arch_loss = $total_arch_hp - $divided_pts;
			   $y_arch_loss = $y_arch_loss / $archhp;
				if($y_arch_loss < 0)
					{$y_arch_loss = 0;}
			   $subtractedarch = round($y_arch_loss);
			  $archcol = "arch" . "$tfleets";
			 mysql_query("UPDATE return SET $archcol =\"$subtractedarch\" WHERE email='$email' AND pw='$pw'");
			}

			$warriors = $warriors - $uwarrior;
			$wizards = $wizards - $uwizard;
			$priests = $priests - $upriest;
			$archers = $archers - $uarcher;
	
			 mysql_query("UPDATE military SET warriors =\"$warriors\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET wizards =\"$wizards\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET priests =\"$priests\" WHERE email='$email' AND pw='$pw'");
			 mysql_query("UPDATE military SET archers =\"$archers\" WHERE email='$email' AND pw='$pw'");
			
			if($yourtotalpower > $theirtotalpower)
			{$extra = $their_xp * .03;}

	 		$subwarexp = ($uwarrior - $subtractedwar) * $warexpa;
			$subwizexp = ($uwizard  - $subtractedwiz) * $wizexpa;
			$subpriexp = ($upriest - $subtractedpri) * $priexpa;
			$subarchexp = ($uarcher - $subtractedarch) * $archexpa;
			$totalsubexp = $exp2 + $extra - ($subwarexp + $subwizexp + $subpriexp + $subarchexp);
			mysql_query("UPDATE user SET exp2 =\"$totalsubexp\" WHERE email='$email' AND pw='$pw'");
	

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
		
				if($race == Elf)
					{$R_time = $R_time * .8; $R_time = floor($R_time);}

				//RETURN TIME
				$returning = "time" . "$tfleets";
				
				mysql_query("UPDATE return SET $returning =\"$R_time\" WHERE email='$email' AND pw='$pw'");
				
				$newfleets = $fleets - 1;
				mysql_query("UPDATE user SET fleets =\"$newfleets\" WHERE email='$email' AND pw='$pw'");


##########################################################################################################################
####
####
####		your stuff ends
####
####
#########################################################################################################################

	//###########empire subtract begins
	//subtraction warriors, wizards, priests to warout, wizout, priout for you
		
			$warhp = 170;
			$prihp = 160;
			$wizhp = 150;
			$archhp = 140;

			if($WAR_DEF == 3)
				{$warhp = 210;
				}
			if($WAR_DEF == 5)
				{$warhp = 260;
				}
			if($WAR_DEF == 6)
				{$warhp = 285;
				}
			if($WAR_DEF == 9)
				{$warhp = 335;
				}
			
			
			if($ARCH_DEF == 3)
				{$archhp = 230;
				}
			if($ARCH_DEF == 5)
				{$archhp = 290;
				}
			if($ARCH_DEF == 6)
				{$archhp = 310;
				}
			if($ARCH_DEF == 9)
				{$archhp = 400;
				}
			
			if($PRI_DEF == 4)
				{$prihp = 180;
				}
			if($PRI_DEF == 6)
				{$prihp = 250;
				}
			
			if($WIZ_DEF == 3)
				{$wizhp == 200;
				}
			if($WIZ_DEF == 5)
				{$wizhp == 260;
				}
			if($WIZ_DEF == 8)
				{$wizhp = 300;
				}

		
		if($ttwarriors > 0)
			{$you_tally = $you_tally + 1;}
		if($ttwizards > 0)
			{$you_tally = $you_tally + 1;}
		if($ttpriests > 0)
			{$you_tally = $you_tally + 1;}
		if($ttarchers > 0)
			{$you_tally = $you_tally + 1;}
		
		if($you_tally >= 1)
			{$empvalue_pts = $yourtotalpower / $you_tally;
			}
		if($you_tally == 0)
			{$empvalue_pts = 0;
			}

		if($yourtotalpower == 0)
			{$yourtotalpower = 10;
			}


			 $total_war_hp = $ttwarriors * $warhp;
			  $y_war_loss = $total_war_hp - $empvalue_pts;
			   $y_war_loss = $y_war_loss / $warhp;
				if($y_war_loss < 0)
					{$y_war_loss = 0;}
			  $newwar = round($y_war_loss);
			 mysql_query("UPDATE military SET warriors =\"$newwar\" WHERE userid='$empvalue'");
			
			 $total_wiz_hp = $ttwizards * $wizhp;
			  $y_wiz_loss = $total_wiz_hp - $empvalue_pts;
			   $y_wiz_loss = $y_wiz_loss / $wizhp;
				if($y_wiz_loss < 0)
					{$y_wiz_loss = 0;}
			  $newwiz = round($y_wiz_loss);
			 mysql_query("UPDATE military SET wizards =\"$newwiz\" WHERE userid='$empvalue'");	
		
			 $total_pri_hp = $ttpriests * $prihp;
			  $y_pri_loss = $total_pri_hp - $empvalue_pts;
			   $y_pri_loss = $y_pri_loss / $prihp;
				if($y_pri_loss < 0)
					{$y_pri_loss = 0;}
			  $newpri = round($y_pri_loss);
			 mysql_query("UPDATE military SET priests =\"$newpri\" WHERE userid='$empvalue'");
		
			 $total_arch_hp = $ttarchers * $archhp;
			  $y_arch_loss = $total_arch_hp - $empvalue_pts;
			   $y_arch_loss = $y_arch_loss / $archhp;
				if($y_arch_loss < 0)
					{$y_arch_loss = 0;}
			  $newarch = round($y_arch_loss);
			 mysql_query("UPDATE military SET archers =\"$newarch\" WHERE userid='$empvalue'");
			


			$war_exp = ($ttwarriors - $newwar) * $warexpa;
			$wiz_exp = ($ttwizards - $newwiz) * $wizexpa;
			$pri_exp = ($ttpriests - $newpri) * $priexpa;
			$arch_exp = ($ttarchers - $newarch) * $archexpa;
			
			$war_exp = round($war_exp);
			$wiz_exp = round($wiz_exp);
			$pri_exp = round($pri_exp);
			$arch_exp = round($arch_exp);
	
			$empvalue_exp = $A_EXP2  - ($war_exp + $wiz_exp + $pri_exp + $arch_exp);
			mysql_query("UPDATE user SET exp2 =\"$empvalue_exp\" WHERE userid='$empvalue'");

		
		//###########EMPIRE ATTACKED SUBTRACT ENDS
				
$war_loss = $uwarrior - $subtractedwar;
$wiz_loss = $uwizard - $subtractedwiz;
$pri_loss = $upriest - $subtractedpri;
$arch_loss = $uarcher - $subtractedarch;

if($uwarrior > 0)
	{if($war_loss > 1){$wtype = warriors;}else{$wtype = warrior;}$war_l = "<font class=yellow>$war_loss</font> $wtype";
	}
if($uwizard > 0)
	{if($wiz_loss > 1){$witype = wizards;}else{$witype = wizard;}$wiz_l = "<font class=yellow>$wiz_loss</font> $witype";
	}
if($upriest > 0)
	{if($pri_loss > 1){$ptype = priests;}else{$ptype = priest;}$pri_l = "<font class=yellow>$pri_loss</font> $ptype";
	}
if($uarcher > 0)
	{if($arch_loss > 1){$atype = archers;}else{$atype = archer;}$arch_l = "<font class=yellow>$arch_loss</font> $atype";
	}
$your_losses = "Your losses: $war_l $wiz_l $pri_l $arch_l";

?>