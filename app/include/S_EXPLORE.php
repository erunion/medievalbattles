 
<form method=get action="explore.php">
<table border="0" bordercolor="#808080" align=center width="40%">
 <tr><td colspan=5 class=main><b class=top>Explore</b></td>
 <tr><td colspan=5 class=main2>You have <?php echo"$aexplorers"; ?> explorers you can send.</td>
 <tr>
   <td class=main2><b class=reg>Type</b></td>
   <td class=main2><b class=reg>Explorers Exploring</b></td>
   <td class=main2><b class=reg>Explorers to send</b></td>
 <tr>
   <td class=inner2>Land</td>
   <td class=inner2><?php echo"$expland"; ?></td>
   <td class=inner2><input type="number" name="exploreland" size=10></td>
 <tr>
   <td class=inner2>Mountain</td>
   <td class=inner2><?php echo"$expmt"; ?></td>
   <td class=inner2><input type="number" name="exploremt" size=10></td>
</table>
<br>
<? 		
$land = implode("", explode(",", $land));
$mts = implode("", explode(",", $mts));
$expland = implode("", explode(",", $expland));
$expmt = implode("", explode(",", $expmt));
$cexploreland = implode("", explode(",", $cexploreland));
$cexploremt = implode("", explode(",", $cexploremt));
$exploreland = implode("", explode(",", $exploreland));
$exploremt = implode("", explode(",", $exploremt));

			$exp_num = .9;
			if($race == Human)
				{$exp_num = .8;
				}
			//FIND OUT HOW MANY EXPLORES YOU NEED FOR LAND/MTS TO GAIN THE MAX
			$max_land = $land * $exp_num;
			$max_mts = $mts * $exp_num;
			  $max_land = round($max_land);
			  $max_mts = round($max_mts);

			//FIND OUT HOW MANY EXPLORERS YOU NEED TO GAIN 1 LAND AND TO GAIN 1 MT
			$per_land = $max_land / 20;
			$per_mt = $max_mts / 20;
			  $per_land = round($per_land);
			  $per_mt = round($per_mt);
			
			if($expland != 0)
				{$land_gain = $expland / $per_land;}
			if($expmt != 0)
				{$mt_gain = $expmt / $per_mt;}

			 $mt_gain = round($mt_gain);
			 $land_gain = round($land_gain);

			if($land_gain > 20)
				{$land_gain = 20;
				}
			if($mt_gain > 20)
				{$mt_gain = 20;
				}
			
	

			if($mt_gain == ""){$mt_gain = 0;}
			if($land_gain == ""){$land_gain = 0;}

			echo"
				<center>
				
				<br><font class=orange>Explorers needed for max land gain:</font> $max_land
				<br><font class=orange>Explorers needed for max mt gain:</font> $max_mts
				<br>
				<br><font class=orange>Explorers for 1 land:</font> $per_land
				<br><font class=orange>Explorers for 1 mt:</font> $per_mt
				<br>
				<br><font class=orange>Land per tick:</font> $land_gain  
				<br><font class=orange>Mountains per tick:</font> $mt_gain 
				</center>"; 
				?>

<br><br>				
<center><center><input class=button type="submit" name="explore" value="Send"></center>
				<input type="hidden" name="explore" value="1">	