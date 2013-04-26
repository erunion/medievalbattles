<?
mysql_connect (localhost, username, password);
mysql_select_db(db) or die('Error with connect');

mysql_query("DELETE FROM emailvalidate");
echo "<div align=center><b>All validation codes have been deleted from the database.</b></div>";

mysql_query("DELETE FROM messages");
echo "<div align=center><b>All messages have been deleted from the database.</b></div>";

mysql_query("DELETE FROM setnews");
echo "<div align=center><b>All settlement news have been deleted from the database.</b></div>";

mysql_query("DELETE FROM setforums");
mysql_query("DELETE FROM setforumsmsgs");
echo "<div align=center><b>All settlement forum posts have been deleted from the database.</b></div>";

mysql_query("DELETE FROM user");
mysql_query("DELETE FROM return");
mysql_query("DELETE FROM research");
mysql_query("DELETE FROM military");
mysql_query("DELETE FROM explore");
mysql_query("DELETE FROM buildings");
echo "<div align=center><b>All accounts have been deleted from the database.</b></div>";

mysql_query("DELETE FROM guild");
mysql_query("DELETE FROM guildmsgs");
mysql_query("DELETE FROM guildthreads");
mysql_query("DELETE FROM guildnews");
mysql_query("DELETE FROM guildrequests");
echo "<div align=center><b>All guild-related items have been deleted from the database.</b></div>";

mysql_query("UPDATE settlement SET setname='None'") or die(mysql_error('Error'));
mysql_query("UPDATE settlement SET setpic=''") or die(mysql_error('Error'));
mysql_query("UPDATE settlement SET members='0'") or die(mysql_error('Error'));
mysql_query("UPDATE settlement SET setnotice='Welcome to Medieval Battles'") or die(mysql_error('Error'));
mysql_query("UPDATE settlement SET setstrength='0'") or die(mysql_error('Error'));
echo "<div align=center><b>All settlement-related items have been deleted from the database.</b></div>";
?>
