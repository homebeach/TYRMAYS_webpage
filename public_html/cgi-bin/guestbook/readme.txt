
PLEASE READ SMILEYS README.TXT


##################

Copyright (C) 2001 - 2007, active-scripts.net. All rights reserved.

This is version 14.5

If this is the first time you have used this script, please see
getting_started.txt once you have successfully installed the
guestbook.

###########################################################

Script is free for non-commercial use.

If you download and install this script on your non-commercial
site then the script is free.

If you require support for this script, then you will need to
purchase a license at http://www.active-scripts.net/guestbook_costs.htm

If you provide this script to your customers, WHETHER OR NOT YOUR
CUSTOMER'S SITE IS COMMERCIAL and WHETHER OR NOT YOU CHARGE
FOR IT, then you will probably need to purchase a license.

Please visit
http://www.active-scripts.net/guestbook_costs.htm



###########################################################

Distribution is ONLY allowed if the entire script and this
readme file both remain unchanged.

The Active Scripts logo at the top of the main guestbook
page can/should be removed via the Standard Preferences Manager in
the Control Panel.

Script can only be edited to change the appearance in the public
part of the guestbook.

Please report all bugs to bugs@active-scripts.net.

###########################################################

IF YOU ARE UPGRADING FROM AN EARLIER VERSION....
all you need to do is upload the new guestbook over
your current version.  Assuming you haven't edited
the main body of the script, all your images, messages
and settings should remain exactly the same.

FORGOTTEN YOUR PASSWORD?
Lots of folk install our script and then forget the password
they set to go to the Control Panel.

To reset the script to the default password (i.e. the word
"active" in lower case), go to the active_guestbook_files
directory and delete the file active.txt.  The word "active"
is now the password.

###########################################################

NOTES

ACTIVE GUESTBOOK WILL RUN ON MOST WEB SERVERS.  SOME FREE
WEB PROVIDERS (LIKE TRIPOD FOR EXAMPLE) CAN CAUSE PROBLEMS
WHEN THEY AUTOMATICALLY TRY TO PUT ADS AT THE TOP OF THE PAGE.
Try www.netfirms.com for an excellent free web host with
minimal ads.

- Active Guestbook does NOT require SSIs.
- Active Guestbook should run okay on Perl 5 on Unix.
(It also runs on most NT systems if you have the correct permissions
set by your ISP but some features may not work. Check out
http://www.atexcellence.com/convert-perl-scripts.htm
for more info.)

##################

INSTALLATION

Active Guestbook can be installed very simply.  You just
need to follow the following steps.

Please note that, if your provider is using an NT server,
you can ignore the bits where you are asked to set permissions
BUT you need to ensure that your ISP has set permissions properly.

1. Open guestbook.cgi in a plain text editor (we use
DzSoft Perl Editor from http://www.dzsoft.com/), and change
the first line to reflect the path to your
perl interpreter.  The default setting
(#!/usr/bin/perl) should suit the vast majority of systems.
If this doesn't work try #!/usr/local/bin/perl
Save the changes.

2. Create a directory in your cgi-bin directory (or in whatever directory
your provider allows you to run cgi scripts).  You can call it whatever you
like but for the moment let's call it "guestbook".
** Set the permissions on your guestbook directory to 755. **


3. Upload guestbook.cgi INTO YOUR GUESTBOOK DIRECTORY, using ASCII mode.
If you use binary mode the programme will not work.
** Set the permissions on your guestbook.cgi to 755. **

4. Run the programme from your browser by calling the setup
script.  For example, if your cgi-bin is at
http://www.mydomain.com/cgi-bin/,  then you should type
*******************************************************************
http://www.mydomain.com/cgi-bin/guestbook/guestbook.cgi?action=setup
*******************************************************************
into your browser, press Enter and follow the instructions.

5. Once you navigate to the Control Panel there is a link to a
comprehensive help file.
You can get to the Control Panel at...
*******************************************************************
http://www.mydomain.com/cgi-bin/guestbook/guestbook.cgi?action=control_panel
*******************************************************************

6. Following successful installation, you can link to the guestbook
from your main page by using
http://www.mydomain.com/cgi-bin/guestbook/guestbook.cgi

###########################################################


HAVING DIFFICULTY INSTALLING ACTIVE GUESTBOOK?

If you can't find the answer to your problem below, please visit the FAQ
archive on our site at...

http://www.active-scripts.net/cgi-bin/faq/faq.cgi

If you have trouble installing this script, we can do it for you.
We charge $24.00 for this service and if we can not get the script
to work you obviously don't pay anything.  If you want us to install
the script on your server, please email us at install@active-scripts.net
with the ftp address, username and password.

Please check the following things first.....

1 - Did you get a message saying...
Can't open ./active_guestbook_files/user_html.txt...?
(If you did, and you are NOT using an NT server,
then the first line of your script is fine and the
permissions on the file itself are fine.  It's just a matter of
finding the correct permissions for your guestbook directory.)
Try setting the permissions on your guestbook directory to 777 or 750.
If using NT then it is likely that your ISP has not set
the permissions properly for you.
Check out http://www.atexcellence.com/convert-perl-scripts.htm.

2 - Is the first line of the guestbook.cgi script correct
for your server? See point 1 in the installation instructions
above.

3 - Did you create a guestbook directory for the file, did you set
the permissions on the directory to 755, and did you put guestbook.cgi
into that directory using ASCII mode?

4 - Have you set the correct permissions for the guestbook.cgi file?
While this shouldn't be an issue if using NT, it seems to be the most
common reason for failure on Unix systems.

5 - If the guestbook loads fine, but when you try to go to the Control
Panel your browser tells you that it can't find the file, then go into
the script itself and change the line near the start from

$use_absolute_reference = "no";   to  $use_absolute_reference = "yes";

and then change

$urladdress = "http:/www.active-scripts.net/cgi-bin/guestbook/guestbook.pl";

to the address of your guestbook.

6 - Try changing the name of guestbook.cgi to guestbook.pl.


#################

FEATURES IN ACTIVE GUESTBOOK

(If there is a feature you would like added, let us know.)

Too many to mention but we'll have a go
(these are the features of the very first release;
there have been loads of improvements since)...

* Webmaster Control Panel to manage all preferences

	- Standard Preferences Manager
		- Control page width
		- Control page alignment
		- Control whether or not messages have to be approved by you before
                  being added
		- Set/Restore User defaults
		- Restore Factory defaults
		- Set number of messages per screen
		- Use your own images/html to customize the look of the guestbook
		- Set the number of days that guestbook backups are kept
		- Disallow profane words of your choice
		- Enable/disable guest's web link
		- Enable/disable guest's email address
		- Enable/disable thank-you message to guest
		- Enable/disable webmaster notification of new messages
		- Enable/disable regular email of backup to webmaster
		- Enable/disable permission for guests to use html in messages
		- Enable/disable multiple postings from the same IP in the same day
		  (stops spamming)
		- Block annoying IPs
		- and a few more things

	- Color Preferences Manager
		- Full control of text/table/background/link colors
		- Set/Restore User color defaults
		- Restore Factory Color defaults

	- Message Manager
		- Edit messages
		- Delete messages
		- Add a webmaster comment

	- Language Manager
		- Control the language used throughout the public part
                  of the guestbook

	- Trash Manager
		- Undelete messages
		- Permanently wipe messages

	- Backup Manager
		- View/Restore backed-up guestbooks
		- Undo last restore

	- Password Manager
		- Change your Control Panel password

* Search facility for guests
* Automatic handling of double posts by visitors
* Automatic checking for sensible email addresses
* Guest can preview their message before posting

##################

SOME MORE NOTES

Automatic backups are carried out each time a new message is added.  If more
than one message is added on any particular day, only the last version is then archived
for that day.

If you enable the feature to automatically email you a full backup at regular intervals,
backups will only be sent if at least one person visits the guestbook on the chosen date.
If no-one visits, then a backup will be sent the next time someone visits.

#################

Thanks for reading

#################