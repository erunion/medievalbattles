<?php


/* 
Version 1.37
*/

/*
 edit database, password and user variables to reflect your settings
 read bbbb-mysql.sql for table setup instuctions
 -------------------------------------------------------
*/



	                        
/*****  database variables  *******/

$sHostname ="localhost";     /* the hostname the databse runs on, usually localhost */
$Databasetype = "mysql";     /* one of "mysql", "odbc", "msql", "postgres", "sybase"   
                             /*	(presently, only mysql is stable, odbc may work) */	
$sDB = "medievalbattles_com";         /* the database name (YOU MUST EDIT THIS !) */
$sTable = "set" . "$setid";       /* the main table, no need to change this. */
$emailTable = "bbbb_email";  /* email notification table (optional), */
                             /* no need to change this. */
                             /* required when either $AllowEmailNotice */
                             /* or $AllowNukeing are set 1 */


/* leave these two as they are... */
$dbfile = whichdb();
require($dbfile);


/*****  password variables  *******/

$connection = db_connect("ziccarelli", "pa724"); 
                       /* insert username and password for the database here */
                       /* (YOU MUST EDIT THIS !) */



/******* user variables *******/                     
                     
$EmailFromText = "Message from my BBS";  /* subjectline of sent emails. */
$EmailFromAddr = "myplace@myhome.net";	 /* From-value of sent emails */
                                         /* (YOU MUST EDIT THIS !) */
$MyURL = "http://www.myhome.net/~myplace/bbbb/bbbb.php3"; 
                                         /* full URL of your BBS. */
                                         /* (YOU MUST EDIT THIS !). */
                                         /* you can rename bbbb.php3 */
                                         /* to your name of choice */



/*
 everything below this line already has working default values
 but you probably want to look at least into the formatting variables
 --------------------------------------------------------------
*/



/*****  formatting variables  ******/	

$ThreadColor1 = "#212121";
$ThreadColor2 = "#404040";
$SubmitImage = "send.gif\" width=32 height=32";
$FindImage = "find.gif\" width=27 height=27";
$IsEmailMarker = "<img src=\"email.gif\" width=20 height=12 border=0 alt=\"Email\">";
$IsNewMarker = "<img src=\"new.gif\" border=0 width=12 height=12>";
	
$HeaderFile = "head_inc.html";  /* this file is prepended to the BBS */
$FooterFile = "foot_inc.html";  /* this file is appended to the BBS */

$AllowHTML = 0;
/* Allow these HTML tags to be displayed. All others are rendered useless. */
/* Extend with care! Set $AllowHTML = 0; to disable all HTML display. */

$DisplayRowsAtOnce = 40; 
/* For larger boards. If not all messages are to be displayed at once */
/* choose the number to be displayed on one page. If all messages are */
/* to be displayed simultaniously, set $DisplayRowsAtOnce = 0; */
	



/*****  localization ******/		

$DetectLanguage = 1;  /* Query the user's browser for language preference. */
                      /* Set 0 to disable. */
$AvailableLanguages = "en,fr,de,nl,it,hu,pt";  /* The language files to chose from. */
$DefaultLanguage = "en";  /* Choose one from above */
$OffsetGMT = -8;		 /* Timezone of your target audience. */
                         /* e.g. 2 for Helsinki and Tel Aviv, 9 for Tokyo, */
                         /* -5 for New York, -8 for L.A. */



/*********  misc. variables *********/

$IsNewPeriod = 7;	/* Number of days messages are adorned with the NEW-Icon. */
                        /* Set 0 to disable. */
$IsOldPeriod = 7;  /* Number of days after which inactive threads are */
                    /* deleted. Set to 0 keep threads infinitely. */
                    /* Note: Messages are only deleted, after ALL messages */
                    /* in the thread are older than $IsOldPeriod. */
$IsTooBig = 8000;  /* Posted messages are chopped after so many characters. */
                   /* This should prevent people from posting lengthy */
                   /* garbage. 4000 is approximately one printed A4 page. */
                   /* Set to 0 to allow any length (max. 65535 anyway) */	
 
$AllowEmailNotice = 0;	/* when new messages are in the subscribed thread, */
                        /* an email notice is issued. Includes option for the */
                        /* user to revoke the subsciption. */
                        /* 1 = allow, 0 = disallow */
$AllowNukeing = 0;   /* users can delete their own messages */
                     /* 1 = allow, 0 = disallow */                        
                     
$NoEmailSpam = 0;  /* you may alter this value to 1 to prevent email harvesters */
                   /* that scan web pages for email adresses from gathering */
                   /* valid adresses. The backside of doing this is that */
                   /* users that want to email in resonse to messages have to */
                   /* manually remove the ".REMOVEME!" part of the email */
                   /* address displayed in their mail client. */

/*---------- end -------------*/     
?>
