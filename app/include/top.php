<HTML>
 <HEAD>
  <TITLE>Medieval Battles</TITLE>
  <link rel=stylesheet type="text/css" href="css/mbstyles.css">
<script language="JavaScript">
<!--

/*
Slowly coming together status bar scroller
Written by BengalBoy (www.angelfire.com/nt/bengaliboy/index.html)
Visit http://javascriptkit.com for this script and more
*/

//set message:
msg = "Welcome to Medieval Battles!";

timeID = 10;
stcnt = 16;
wmsg = new Array(33);
        wmsg[0]=msg;
        blnk = "                                                               ";
        for (i=1; i<32; i++)
        {
                b = blnk.substring(0,i);
                wmsg[i]="";
                for (j=0; j<msg.length; j++) wmsg[i]=wmsg[i]+msg.charAt(j)+b;
        }

function wiper()
{
        if (stcnt > -1) str = wmsg[stcnt]; else str = wmsg[0];
        if (stcnt-- < -40) stcnt=31;
        status = str;
        clearTimeout(timeID);
        timeID = setTimeout("wiper()",100);
}

wiper()
// -->
</script>
<script LANGUAGE="JavaScript"><!--
// Preload and play audio files with event handler (MouseOver sound)
// designed by JavaScript Archive, (c)1999
// Get more free javascripts at http://jsarchive.8m.com

var aySound = new Array();
// Below: source for sound files to be preloaded
aySound[0] = "sound.wav";

// DO NOT edit below this line
document.write('<BGSOUND ID="auIEContainer">')
IE = (navigator.appVersion.indexOf("MSIE")!=-1 && document.all)? 1:0;
NS = (navigator.appName=="Netscape" && navigator.plugins["LiveAudio"])? 1:0;
ver4 = IE||NS? 1:0;
onload=auPreload;

function auPreload() {
if (!ver4) return;
if (NS) auEmb = new Layer(0,window);
else {
Str = "<DIV ID='auEmb' STYLE='position:absolute;'></DIV>";
document.body.insertAdjacentHTML("BeforeEnd",Str);
}
var Str = '';
for (i=0;i<aySound.length;i++)
Str += "<EMBED SRC='"+aySound[i]+"' AUTOSTART='FALSE' HIDDEN='TRUE'>"
if (IE) auEmb.innerHTML = Str;
else {
auEmb.document.open();
auEmb.document.write(Str);
auEmb.document.close();
}
auCon = IE? document.all.auIEContainer:auEmb;
auCon.control = auCtrl;
}
function auCtrl(whSound,play) {
if (IE) this.src = play? aySound[whSound]:'';
else eval("this.document.embeds[whSound]." + (play? "play()":"stop()"))
}
function playSound(whSound) { if (window.auCon) auCon.control(whSound,true); }
function stopSound(whSound) { if (window.auCon) auCon.control(whSound,false); }
//-->
</script>

 </HEAD>
<BODY bgcolor="black" text="#616161">

<TABLE border=0 width="100%" cellspacing=0>


 <!-- this is the top border -->
<TR>
	<TD background="images/bordertop.gif" height=10 width="100%" colspan=5></td>

<TR>
	<TD background="images/border.gif" width=3></TD>
	<TD bgcolor="#5D0101" width="98%" colspan=3><center><img src="images/logo.gif"></center></td>
	<TD background="images/border.gif"></TD>

<TR>
	<TD background="images/border.gif"></TD>
	<TD bgcolor="#5D0101" width="14%" valign=top>
		 <!-- ENTER NAVBAR HERE -->
	   <?php include ("include/mainnavbar.php"); ?>
		 <!-- END NAVBAR HERE -->
	</TD>
		
    <TD bgcolor="#000000" width="70%" valign=top>
	<BLOCKQUOTE>