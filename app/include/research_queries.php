<?

// select research items	
$research_query = "SELECT * FROM research WHERE email='$email' AND pw= '$pw'";
$res_query = mysql_db_query($dbnam, $research_query) or die("Error: " . mysql_error());
$res = mysql_fetch_array($res_query);

##################
### New Spells
##################
//	Fireball
	$fireball  = "$res[r1pts]" . "/50,000";
		if($res[r1pts] >= 50000)	{	$fireball = "<i>Done</i>";	}
	$res[r1pts] = number_format($res[r1pts]);
//	Ice Storm
	$ice_storm = "$res[r2pts]" . "/100,000";
		if($res[r2pts] >= 100000)	 { $ice_storm = "<i>Done</i>"; }
	$res[r2pts] = number_format($res[r2pts]);
//	Wall of Fire
	$wall_of_fire = "$res[r3pts]" . "/200,000";
		if($res[r3pts] >= 200000)	 { $wall_of_fire = "<i>Done</i>"; }
	$res[r3pts] = number_format($res[r3pts]);
//	Wall of Ice
	$wall_of_ice = "$res[r4pts]" . "/300,000";
		if($res[r4pts] >= 300000)	 { $wall_of_ice = "<i>Done</i>"; }
	$res[r4pts] = number_format($res[r4pts]);
//Chain Lightning
	$chain_lightning = "$res[r5pts]" . "/400,000";
		if($res[r5pts] >= 400000)	 { $chain_lightning = "<i>Done</i>"; }
	$res[r5pts] = number_format($res[r5pts]);
//	Gust of Wind
	$gust_of_wind = "$res[r6pts]" . "/500,000";
		if($res[r6pts] >= 500000)	 { $gust_of_wind = "<i>Done</i>"; }
	$res[r6pts] = number_format($res[r6pts]);
//	Flaming Sphere
	$flaming_sphere = "$res[r7pts]" . "/600,000";
		if($res[r7pts] >= 600000)	 { $flaming_sphere = "<i>Done</i>"; }
	$res[r7pts] = number_format($res[r7pts]);
//	Cloud Kill
	$cloud_kill = "$res[r8pts]" . "/700,000";
		if($res[r8pts] >= 700000)	 { $cloud_kill =" <i>Done</i>"; }
	$res[r8pts] = number_format($res[r8pts]);
//	Lightning Bolt
	$lightning_bolt = "$res[r9pts]" . "/800,000";
		if($res[r9pts] >= 800000)	 { $lightning_bolt = "<i>Done</i>"; }
	$res[r9pts] = number_format($res[r9pts]);
//	Meteor Swarm
	$meteor_swarm = "$res[r10pts]" . "/900,000";
		if($res[r10pts] >= 900000)	 { $meteor_swarm = "<i>Done</i>"; }
	$res[r10pts] = number_format($res[r10pts]);

##################
### Empire Enchantments
##################
//	Adv Gold
	$adv_gold = "$res[r11pts]". "/100,000";
		if($res[r11pts] >= 100000)	 { $adv_gold = "<i>Done</i>"; }
	$res[r11pts] = number_format($res[r11pts]);
//	Adv Iron
	$adv_iron = "$res[r12pts]" . "/100,000";
		if($res[r12pts] >= 100000)	 { $adv_iron = "<i>Done</i>"; }
	$res[r12pts] = number_format($res[r12pts]);
//	Adv Farming
	$adv_farm = "$res[r15pts]" . "/100,000";
		if($res[r15pts] >= 100000)	 { $adv_farm = "<i>Done</i>"; }
	$res[r15pts] = number_format($res[r15pts]);
//	Adv Construction
	$adv_build = "$res[r16pts]" . "/100,000";
		if($res[r16pts] >= 100000)	 { $adv_build = "<i>Done</i>"; }
	$res[r16pts] = number_format($res[r16pts]);

##################
### New Units
##################
//	Archery
	$archery = "$res[r13pts]" . "/125,000";
		if($res[r13pts] >= 125000)	 { $archery = "<i>Done</i>"; }
	$res[r13pts] = number_format($res[r13pts]);
//	Demolitions
	$demolitions = "$res[r14pts]" . "/125,000";
		if($res[r14pts] >= 125000)	 { $demolitions = "<i>Done</i>"; }
	$res[r14pts] = number_format($res[r14pts]);
//	Animation
	$animation = "$res[r17pts]" . "/125,000";
		if($res[r17pts] >= 125000)	 { $animation = "<i>Done</i>"; }
	$res[r17pts] = number_format($res[r17pts]);
//	Adv Animation
	$adv_animation = "$res[r18pts]" . "/125,000";
		if($res[r18pts] >= 125000)	 { $adv_animation = "<i>Done</i>"; }
	$res[r18pts] = number_format($res[r18pts]);

?>