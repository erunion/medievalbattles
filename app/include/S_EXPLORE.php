 
<form method=get action="explore.php">
<table border="0" bordercolor="#808080" align=center width="80%">
 <tr><td colspan=5 class=main><b class=top>Explore</b></td>
 <tr><td colspan=5 class=main2>You have <?php echo"$aexplorers"; ?> explorers you can send.<br>It takes 50 explorers to find 1 land/mountain</td>
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
<? 			$land_hr = $expland / 50; $land_hr = floor($land_hr); $mt_hr = $expmt / 50;  $mt_hr = floor($mt_hr);
			 echo"
				<center>Land per hour: $land_hr   <br>Mountains per hour: $mt_hr</center>"; ?>
<br><br>				
<center><center><input class=button type="submit" name="explore" value="Send"></center>
				<input type="hidden" name="explore" value="1">	