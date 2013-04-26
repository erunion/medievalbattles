<?
echo "
<form method='get' action='cexplore.php'>
<table border='0' bordercolor='#808080' align='center' width='40%'>
	<tr>
		<td colspan='5' class='main'><b class='top'>Cancel Explorers</b></td>
	<tr>
		<td class='main2'><b class='reg'>Type</b></td>
		<td class='main2'><b class='reg'>Explorers Exploring</b></td>
		<td class='main2'><b class='reg'>Explorers to cancel</b></td>
	<tr>
		<td class='inner2'>Land</td>
		<td class='inner2'>$expland</td>
		<td class='inner2'><input type='number' name='cexploreland' size='10'></td>
	<tr>
		<td class='inner2'>Mountain</td>
		<td class='inner2'>$expmt</td>
		<td class='inner2'><input type='number' name='cexploremt' size='10'></td>
</table>				
<br>
<center>
<input type='submit' name='cancel' value='Cancel'>
<input type='hidden' name='cancel' value='1'>
</center>";
?>