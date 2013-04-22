<?php

$var =  @mysql_connect(localhost, ziccarelli, pa724);
mysql_select_db(medievalbattles_com) or die(darnit);
$dbnam = "medievalbattles_com";

	session_register('login');
	session_register('email');
	session_register('pw');

include("functions.php");

?>
<HTML>
<HEAD>
<TITLE>Medieval Battles</TITLE>
	<link rel=stylesheet type="text/css" href="css/ingame.css">
</HEAD>
<BODY>
<!-- THIS IS OUTER TABLE -->
<table class=outer border="0" cellpadding="1" cellspacing="0"  width="100%">
 <TR>
  <TD valign="top" colspan="2">
   <table border="0" width="100%" cellpadding=0 cellspacing=0>
	<tr>
	 <td><center><img src="images/igtop.gif"></center></td>
</TD>
   <table border="1" cellpadding="2" cellspacing="0" bgcolor="#336600" bordercolor="#630000" width="100%">
	<tr>
	 <td class=top><b>GP:</b><? echo"$gp"; ?> </td>
	 <td class=top><b>Civilians:</b><? echo"$civ"; ?></td>
	 <td class=top><b>Land:</b> <? echo"$land"; ?></td>
	 <td class=top><b>Mountains:</b><? echo"$mts"; ?></td>
	 <td class=top><b>Experience:</b><? echo"$exp"; ?></td>
	</table>	
</TD>
</TR>  
<TR valign="top">
 <TD width="15%">
	<?php
		include("include/ignavbar.php");
	?>
 </TD>
 <TD width="85%"> <!-- BODY OF PAGE BEGINS HERE -->
<br><br>


	
	<table border="1" bordercolor="#000000" align=center width="80%">
	<tr>
		  <td colspan=5>
			<form method="post" action="settlement.php">
			<center>
			<b class=reg>Change Settlement:</b> <input type="number" name="snum" size="3" maxlength="2">
			<input type="submit" name="change" value="Change" class=button>
			<input type="hidden" name="change" value="1">
			</center>
			</form>
			</td>
	

	
	
	
<?php
if (!IsSet($change))
{
?>	
	<? $ssettlementpic = mysql($dbnam, "SELECT setpic FROM settlement WHERE setid = '$setid'");	
	$settlepic = mysql_result($ssettlementpic,"settlepic");	
	$ssettlementname = mysql($dbnam, "SELECT setname FROM settlement WHERE setid = '$setid'");	
	$settlename = mysql_result($ssettlementname,"settlename");

	echo"<img src=$settlepic width=300 height=200><br><br>$settlename"; ?>
<?php
 
	

	
	$var =  @mysql_connect(localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";
	function display_db_table($tablename, $var)
	{	
		global $setid;
			$query_string = "SELECT ename, mts, land, exp FROM user WHERE setid='$setid'";
			$result_id = mysql_query($query_string, $var);
			$column_count = mysql_num_fields($result_id);

			while ($row = mysql_fetch_row($result_id))
		{
				print("<TR ALIGN=center VALIGN=TOP colspan=4>");
				for ($column_num = 0;
				$column_num < $column_count;
				$column_num++)
					
					print("<TD bgcolor=#404040>$row[$column_num]</TD>\n");
				print("</TR>\n");
		}
		print("</TABLE>\n");
	}

echo "
		<tr>
		  <td class=\"main\" colspan=\"4\"><b class=\"reg\">Settlement: $setid</b></td>
		<tr>
		  <td class=\"main2\" width=><b class=\"reg\">Empire Name</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Mountains</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Land</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Experience</b></td>
		<tr colspan=\"4\">
		  <td colspan=\"4\">"; 
				display_db_table("user", $var);
echo "
				</td>
	    </table>";
}
else
{
		if($snum <1)
	{echo"There is no such settlement.";die();
	}
	else
		{


	$ssettlementpic = mysql($dbnam, "SELECT setpic FROM settlement WHERE setid = '$snum'");	
	$settlepic = mysql_result($ssettlementpic,"settlepic");	


	
	$ssettlementname = mysql($dbnam, "SELECT setname FROM settlement WHERE setid = '$snum'");	
	$settlename = mysql_result($ssettlementname,"settlename");

	echo"<img src=$settlepic width=300 height=200><br><br>$settlename";

	$var =  @mysql_connect(localhost, ziccarelli, pa724);
	mysql_select_db(medievalbattles_com) or die(darnit);
	$dbnam = "medievalbattles_com";
	$tablename = "user";
	function display_db_table($tablename, $var)
	{	
		global $snum;
			$query_string = "SELECT ename, mts, land, exp FROM user WHERE setid='$snum'";
			$result_id = mysql_query($query_string, $var);
			$column_count = mysql_num_fields($result_id);

			while ($row = mysql_fetch_row($result_id))
		{
				print("<TR ALIGN=center VALIGN=TOP colspan=4>");
				for ($column_num = 0;
				$column_num < $column_count;
				$column_num++)
					
					print("<TD bgcolor=#404040>$row[$column_num]</TD>\n");
				print("</TR>\n");
		}
		print("</TABLE>\n");
	}
echo "
		<tr>
		  <td class=\"main\" colspan=\"4\"><b class=\"reg\">Settlement: $snum</b></td>
		<tr>
		  <td class=\"main2\" width=><b class=\"reg\">Empire Name</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Mountains</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Land</b></td>
		  <td class=\"main2\" width=><b class=\"reg\">Experience</b></td>
		<tr colspan=\"4\">
		  <td colspan=\"4\">"; 
				display_db_table("user", $var);
echo "
				</td>
	    </table>";

 }
}
?>
 
 
 
 <!-- body ends here -->
 </TD>
</TR>
</TABLE>
</BODY>
</HTML>
