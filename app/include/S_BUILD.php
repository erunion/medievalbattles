<form type=get action="buildings.php">
<table border=0 cellpadding=2 cellspacing=0 width="100%" valign="top">
 <tr>
  <td><br>
   <table border="1" bordercolor="#000000" align=center width="80%" cellpadding=0 cellspacing=0>
	<tr>
	 <td colspan=7 class=main><b class=top>Land</b></td>
	<tr>
	 <td colspan=7 class=main2>It costs <?php echo"$b_cost"; ?> gp to construct a building<br><? echo"You have $aland free land to build on"; ?></td>
	<tr><form method=get action="buildings.php">
	 <td class=main2><b class=reg></b></td>
	 <td class=main2><b class=reg>Building Type</b></td>
	 <td class=main2><b class=reg>Owned</b></td>
	 <td class=main2><b class=reg>Developing</b></td>
	 <td class=main2><b class=reg>Maximum</b></td>
	 <td class=main2><b class=reg>Develop</b></td>
	<tr>
	 <td class=num>1</td>
	 <td class=inner2>Home</td>
	 <td class=inner2> <?php echo"$home"; ?></td>
	 <td class=inner2><?php echo"$dhome"; ?></td>
	 <td class=inner2><?php echo"$max_land"; ?></td>
	 <td class=inner2><input type="number" name="uhome" size=5></td>
	<tr>
	 <td class=num>2</td>
	 <td class=inner2>Barrack</td>
	 <td class=inner2><?php echo"$barrack"; ?></td>
	 <td class=inner2><? echo"$dbarrack"; ?></td>
	 <td class=inner2><?php echo"$max_land"; ?></td>
	 <td class=inner2><input type="number" name="ubarrack" size=5></td>
	<tr>
	 <td class=num>3</td>
	 <td class=inner2>Farm</td>
	 <td class=inner2><?php echo"$farm"; ?></td>
	 <td class=inner2><? echo"$dfarm"; ?></td>
	 <td class=inner2><?php echo"$max_land"; ?></td>
	 <td class=inner2><input type="number" name="ufarm" size=5></td>
<? if($race != Orc){echo"	
	<tr>
	 <td class=num>4</td>
	 <td class=inner2>Wooden Platform</td>
	 <td class=inner2>$wp</td>
	 <td class=inner2>$dwp</td>
	 <td class=inner2>$max_land</td>
	 <td class=inner2><input type=number name=uwp size=5></td>
	";
	}
?>
<? if($r6pts >= 125000)
{echo"
	<tr>
	 <td class=num>5</td>
	 <td class=inner2>Lumber Mill</td>
	 <td class=inner2>$lmill</td>
	 <td class=inner2>$dlmill</td>
	 <td class=inner2>$max_land</td>
	 <td class=inner2><input type=number name=ulmill size=5></td>
	 ";
}
?>
   </table>
<br><br>
<form type=get action="buildings.php">
   <table border="1" bordercolor="#000000" align=center width="80%" cellpadding=0 cellspacing=0>
	<tr>
	 <td colspan=7 class=main><b class=top>Mountains</b></td>
	<tr>
	 <td colspan=7 class=main2>It costs <?php  echo"$bm_cost"; ?> gp to construct a mine<br><? echo"You have $amts free mines to build on"; ?></td>
	<tr><form method=get action="script.url">
	 <td class=main2><b class=reg></b></td>
	 <td class=main2><b class=reg>Mine Type</b></td>
	 <td class=main2><b class=reg>Owned</b></td>
	 <td class=main2><b class=reg>Developing</b></td>
	 <td class=main2><b class=reg>Maximum</b></td>
	 <td class=main2><b class=reg>Develop</b></td>
	<tr>
	 <td class=num>1</td>
	 <td class=inner2>Gold Mines</td>
	 <td class=inner2><?php echo"$gm"; ?></td>
	 <td class=inner2><?php echo"$dgm"; ?></td>
	 <td class=inner2><?php echo"$max_mt"; ?></td>
	 <td class=inner2><input type="number" name="ugm" size=5>
	<tr>
	 <td class=num>2</td>
	 <td class=inner2>Iron Mines</td>
	 <td class=inner2><?php echo"$im"; ?></td>
	 <td class=inner2><?php echo"$dim"; ?></td>
	 <td class=inner2><?php echo"$max_mt"; ?></td>
	 <td class=inner2><input type="number" name="uim" size=5></td>
	</tr>
   </table>
<br><br>	   
<center>
<input class=button type="submit" name="develop" value="Develop Buildings">
<input type="hidden" name="update" value="1"> 
</center> 
	