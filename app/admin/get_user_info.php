<?php 

include("include/igtop.php");

if(!IsSet($userinfo))	{
	echo "<form type=post action=get_user_info.php>
		<table border=1 bordercolor=#000000 align=center cellpadding=0 cellspacing=0>
			<tr>
				<td colspan=2><font color=#ffffff><b>User Information</b></font></td>
			<tr>
				<td><input type=\"text\" name=\"empre\" maxlength=\"50\"></td>
				<td><input type=\"submit\" name=\"userinfo\" value=\"Get Their Info\"></td>
				<input type=\"hidden\" name=\"userinfo\" value=\"6\"></td>
		</table>
	</form>";
}
else	{	

	$clock = date("m/d/y, H:ia");

	$result = mysql_query("SELECT * FROM user WHERE ename='$empre'");
		$evu = mysql_fetch_array($result);

	$result1 = mysql_query("SELECT * FROM military WHERE userid='$evu[userid]'");
		$evm = mysql_fetch_array($result1);
	
	$result2 = mysql_query("SELECT * FROM buildings WHERE userid='$evu[userid]'");
		$evb = mysql_fetch_array($result2);

	$result3 = mysql_query("SELECT * FROM return WHERE userid='$evu[userid]'");
		$evr = mysql_fetch_array($result3);

	$result4 = mysql_query("SELECT * FROM research WHERE userid='$evu[userid]'");
		$evres = mysql_fetch_array($result4);

	$result5 = mysql_query("SELECT * FROM explore WHERE userid='$evu[userid]'");
		$eve = mysql_fetch_array($result5);
	
echo"
		<table border=1 bordercolor=#000000 align=center cellpadding=0 cellspacing=0 width=80%>
			<tr>
				<td class=main align=center><b>User Info</b></td>
				<td class=main><b>Military Info</b></td>
			</tr>
			<tr>
				<td class=inner2>
					Empire Name: $evu[ename]<br>
					Email: $evu[email]<br>
					Password: $evu[pw]<br>
					Setid: $evu[setid]<br>
					GP: $evu[gp]<br>
					Iron: $evu[iron]<br>
					Lumber: $evu[lumber]<br>
					Exp: $evu[exp]<br>
					Land: $evu[land]<br>
					Mountains: $evu[mts]<br>
					AIM: $evu[aim]<br>
					MSN: $evu[msn]<br>
				</td>
				<td class=inner2>
					Generals: $evu[fleets]<br>
						<hr width=10%>
					Warriors: $evm[warriors]<br>
					Warrior Weapon: $evm[cweapon]<br>
					Warrior Armor: $evm[wararmor]<br>
						<hr width=10%>
					Priests: $evm[priests]<br>
					Priest Weapon: $evm[cstaff]<br>
					Warrior Armor: $evm[priarmor]<br>
						<hr width=10%>
					Wizards: $evm[wizards]<br>
					Wizard Spell: $evm[cspell]<br>
					Warrior Armor: $evm[wizarmor]<br>
						<hr width=10%>
					Archers: $evm[archers]<br>
					Archer Weapon: $evm[cbow]<br>
					Warrior Armor: $evm[archarmor]<br>
						<hr width=10%>
					Explorers: $evm[explorer]<br>
					Suicide Civilians: $evm[suicide]<br>
					Catapults: $evm[catapult]<br>
					Thieves: $evm[thieves]<br>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class=main align=center><b>Buildings Info</b></td>
				<td class=main><b>Return Info</b></td>
			</tr>
			<tr>
				<td class=inner2>
					Available Mountains: $evb[amts]<br>
					Available Land: $evb[aland]<br>
					Homes: $evb[home]<br>
						Building Homes: $evb[dhome]<br>
					Barracks: $evb[barrack]<br>
						Building Barracks: $evb[dbarrack]<br>
					Farms: $evb[farm]<br>
						Building Farms: $evb[dfarm]<br>
					Wooden Platforms: $evb[wp]<br>
						Building Wooden Plats: $evb[dwp]<br>
					Lumber Mills: $evb[lmill]<br>
						Building Lumber Mills: $evb[dlmill]<br>
					Gold Mines: $evb[gm]<br>
						Building Gold Mines: $evb[dgm]<br>
					Iron Mines: $evb[im]<br>
						Building Iron Mines: $evb[dim]<br>
				</td>
				<td class=inner2>
					Warriors (party 1): $evr[war1]<br>
					Priests (party 1): $evr[pri1]<br>
					Wizards (party 1): $evr[wiz1]<br>
					Archers (party 1): $evr[arch1]<br>
						<hr width=10%>
					Warriors (party 2): $evr[war2]<br>
					Priests (party 2): $evr[pri2]<br>
					Wizards (party 2): $evr[wiz2]<br>
					Archers (party 2): $evr[arch2]<br>
						<hr width=10%>
					Warriors (party 3): $evr[war3]<br>
					Priests (party 3): $evr[pri3]<br>
					Wizards (party 3): $evr[wiz3]<br>
					Archers (party 3): $evr[arch3]<br>
						<hr width=10%>	
					Warriors (party 4): $evr[war4]<br>
					Priests (party 4): $evr[pri4]<br>
					Wizards (party 4): $evr[wiz4]<br>
					Archers (party 4): $evr[arch4]<br>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td class=main align=center><b>Explore Info</b></td>
				<td class=main><b>Research Info</b></td>
			</tr>
			<tr>
				<td class=inner2>
					Explorers on Land: $eve[expland]<br>
					Explorers on Mountains: $eve[expmt]<br>
				</td>
				<td class=inner2>
					r1: $evres[r1]&nbsp; &nbsp; &nbsp; r1pts: $evres[r1pts]<br>
					r2: $evres[r2]&nbsp; &nbsp; &nbsp; r2pts: $evres[r2pts]<br>
					r3: $evres[r3]&nbsp; &nbsp; &nbsp; r3pts: $evres[r3pts]<br>
					r4: $evres[r4]&nbsp; &nbsp; &nbsp; r4pts: $evres[r4pts]<br>
					r5: $evres[r5]&nbsp; &nbsp; &nbsp; r5pts: $evres[r5pts]<br>
					r6: $evres[r6]&nbsp; &nbsp; &nbsp; r6pts: $evres[r6pts]<br>
					r7: $evres[r7]&nbsp; &nbsp; &nbsp; r7pts: $evres[r7pts]<br>
					r8: $evres[r8]&nbsp; &nbsp; &nbsp; r8pts: $evres[r8pts]<br>
					r9: $evres[r9]&nbsp; &nbsp; &nbsp; r9pts: $evres[r9pts]<br>
					r10: $evres[r10]&nbsp; &nbsp; &nbsp; r10pts: $evres[r10pts]<br>
					r11: $evres[r11]&nbsp; &nbsp; &nbsp; r11pts: $evres[r11pts]<br>
					r12: $evres[r12]&nbsp; &nbsp; &nbsp; r12pts: $evres[r12pts]<br>
					r13: $evres[r13]&nbsp; &nbsp; &nbsp; r13pts: $evres[r13pts]<br>
					r14: $evres[r14]&nbsp; &nbsp; &nbsp; r14pts: $evres[r14pts]
				</td>
			</tr>
			</table><br>";

	$empnews_sel = mysql_db_query($dbnam, "SELECT count(yourid) FROM empnews WHERE yourid='$evu[userid]'");	
	$emp_sel = mysql_result($empnews_sel,"emp_sel");
	
	if($emp_sel == 0 OR $emp_sel == "")	{
		echo"<div align=center><font class=yellow>This user has no news to be displayed.</font></div>";
		die();
	}

echo "
		<table border=1 bordercolor=#000000 align=center cellpadding=0 cellspacing=0 width=80%>
			<tr>
				<td colspan=3 class=main><b>Empire News</b></td>
			<tr>
				<td class=inner2 width=20%><b>Date</b></td>
				<td class=inner22><b>News</b></td>";

	$query_string = "SELECT date, news FROM empnews WHERE yourid='$evu[userid]' ORDER BY date DESC";
	$result_id = mysql_query($query_string, $var);
	while ($row = mysql_fetch_row($result_id))	{
		echo "
			<tr align=left valign=TOP>
				<td bgcolor=404040>$row[0]</td>
				<td bgcolor=404040>$row[1]</td>\n";
	}

	die();
}

echo "
</td>
</tr>
</table>
</body>
</html>";
?>