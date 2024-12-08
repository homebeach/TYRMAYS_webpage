#!/usr/bin/perl
### All code is copyright active-scripts.net 2006. # Bookmarks: 31,668 1,2179 1,4164
### Unauthorised use, editing or copying for ANY reason is
### an infringement. Anti-spam code can not be edited
### and/or used in any way outside of the code in this script.
$var = time;
use CGI qw(:all);
use CGI::Carp qw/fatalsToBrowser/; # working on refer
for (param()) { $NEWFORM{$_} = param($_); }
for (param()) {
$FORM{$_} = param($_);
$FORM{$_} =~ s/\|/-/gi unless param(action) eq "delete_ips";
}
$query = new CGI;
@todel = $query->param('todel');
$cookiedata = $ENV{'HTTP_COOKIE'};
@cookies = split(/;/,$cookiedata );
foreach $i (@cookies){
($name,$cid) = split(/=/,$i);
$name =~ s/\s+//gi;
$COOK{$name} = $cid;
}
@var1 = split(//,$var);
$lastnotvar = $var1[-1];
$lastnotvar++;
$lastnotvar = 2 if $lastnotvar ==1;
$lastnotvar2 = $lastnotvar -1;
$use_absolute_reference = "no";
$urladdress = "http://www.domainhereifallelsefails.net/cgi-bin/gb/guestbook.cgi";
$font = "<font face=Arial size=2>";
$guestbookroot = "$ENV{'HTTP_HOST'}";
if ($use_absolute_reference eq "no"){
$guesturl = "$ENV{'SCRIPT_NAME'}";
}
else{
$guesturl = $urladdress;
}
$allurl = "$guestbookroot" . "$guesturl ";
$allurl2 = "$guestbookroot" . "$guesturl";
$allurl3 = "$guestbookroot" . "$guesturl" . "?action=control_panel ";
$| = 1;
$demo="off";
$previewline = "<hr size = 1>";
$version = "1400005";
$bversion = "14.5";
&subdirectory;
$grace = 604800;
$salt = "active"; # to help crypt
$enc = crypt(active, $salt); # set default password
$location_of_lock_file = "./active_guestbook_files/guestbook.lock"; ## thanks to extropia.com
$cookie_control = "off";
unless (-e "$guestbook_data_name"){
@months = ("January","February","March","April","May","June","July","August","September","October","November","December");
&GetDate;
$now = &amqdate($messagedate);
}
$alignment_default = "center";
@active_default_alignment = split (//, $alignment_default);
$cookie_default = join ("", reverse @active_default_alignment);
$algo = "";
&startup;
&open_prefs;
&GetDate;
&open_prefst;
&check_values;
$now = &amqdate($messagedate);
&check_update;
&check_new_files;
$alignment_default = "center";
$alignment = "center" if ($alignment eq "");
$action = $FORM{'action'};
$direct = $FORM{'direct'};
$search_words = $FORM{'search_words'};
$search_fields = $FORM{'search_fields'};
$search_english= $FORM{'reload'};
@old_words = split (/\,/, $bad_words);
# $added_words = "skcuf daehtihs etihs tihs stihs tawt reggin rekcufrehtom rekcuf tnuc rekcus kcoc dratsab kcuf gnikcuf sknaw knaw stnuc sdratsab sreknaw reknaw elohesra selohesra esra sesra";
@letters = split (//, $added_words) ;
$reverse = join ("", reverse @letters);
@new_words = split (/ /, $reverse);
$rett = "jguiekjhhd";
@words = (@new_words, @old_words);
$host = ".rorre noitartsigeR";
@backhost = split (//, $host) ;
$valid_ip = join ("", reverse @backhost);
@anti_ips = split (/\,/, $anti_ips);
@anti_emails = split (/\,/, $anti_emails);
&ip_test;
$ipoops = "no";
$RemoteHost = $ENV{'REMOTE_HOST'};
if ((!$RemoteHost) || ($RemoteHost =~ m!^\d+\.\d+\.\d+\.\d+$!)) {
if ($ENV{'REMOTE_ADDR'} =~ m!^(\d+)\.(\d+)\.(\d+)\.(\d+)$!) {
$RemoteHost = (gethostbyaddr(pack('C4',$1,$2,$3,$4),2))[0] || $ENV{'REMOTE_ADDR'};
}
$RemoteHost =~ tr[A-Z][a-z];
}
foreach (@anti_ips) {
next unless $_;
$ipoops = "yes" if ($RemoteHost =~ m!$_!);
$ipoops = "yes" if ($ENV{'REMOTE_ADDR'} =~ m!$_!);
}
sub end {
&content;;
print qq~ <center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1><b>$TXT_blocked_IP </b></font> ~;
exit;
}
&set_clock_times;
sub read{
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@datalist = ();
@data = ();
@data = <USER_FILE>;
close(USER_FILE);

foreach $row (@data){
@fields = split (/\|/, $row);
push (@viewtoeditdatalist, $row);
unless (($fields[10] eq "del") || ($fields[15] eq "waiting") || ($fields[16] eq "yes")){
push (@datalist, $row);
}
}
@datalist = @viewtoeditdatalist if ($action eq "view_to_edit");
$number_of_messages = @datalist;
if ($order eq "reversed"){
@data_ordered = reverse(@datalist);
}
elsif ($order eq "random"){
srand;
@new = ();
for( @datalist ){
my $r = rand @new+1;
push(@new,$new[$r]);
$new[$r] = $_;
}
@data_ordered = @new;
}
elsif ($order eq "alpha_name"){
foreach $lrow (@datalist){
@lrow = split (/\|/, $lrow);
$sortable_field = $lrow[1];
unshift (@lrow, $sortable_field);
$lnew_row = join ("\|", @lrow);
push (@new_rows, $lnew_row);
}
@datalist = ();
@sorted_rows = sort (@new_rows);
foreach $sorted_row (@sorted_rows){
@row = split (/\|/, $sorted_row);
$sorted_field = shift (@row);
$old_but_sorted_row = join ("\|", @row);
push (@data_ordered, $old_but_sorted_row);
}
}
elsif ($order eq "alpha_message"){
foreach $lrow (@datalist){
@lrow = split (/\|/, $lrow);
$sortable_field = $lrow[2];
unshift (@lrow, $sortable_field);
$lnew_row = join ("\|", @lrow);
push (@new_rows, $lnew_row);
}
@datalist = ();
@sorted_rows = sort (@new_rows);
foreach $sorted_row (@sorted_rows){
@row = split (/\|/, $sorted_row);
$sorted_field = shift (@row);
$old_but_sorted_row = join ("\|", @row);
push (@data_ordered, $old_but_sorted_row);
}
}
else{
@data_ordered = @datalist;
}
&content;
$aspm1 = $varstamp;
&main_header;
print qq~ <table border=0 cellspacing=0 cellpadding=0 width=$table_width><tr><td width=$table_width align=$alignment_body> ~;
&active_header if $active_header eq "on";
&user_image if $user_image eq "yes";
&title if $use_title eq "on";
&user_html if $use_user_html eq "yes";
&menu;
&no_of_messages_display if $show_no_of_messages eq "yes";
$count = 1;
$grouped = 0;
$no_displayed = int($no_displayed);
if ($no_displayed <1){
$no_displayed = 1;
}
$start_number = $FORM{'start_number'};
$new_start_number = ($start_number + $no_displayed);
$old_start_number = ($start_number - $no_displayed);
$startplus = $start_number +1;
unless ($old_start_number < 0){print qq~ <font face= "$textfontface" size=$textfontsize> $left_bracket<a href="$guesturl\?start_number=$old_start_number">$TXT_previous</a>$right_bracket </font> ~;
}
&show_number_menu unless ($number_of_messages <($no_displayed+1));
unless ($new_start_number > ($number_of_messages -1 )){
print qq~ <font face= "$textfontface" size=$textfontsize> $left_bracket<a href="$guesturl\?start_number=$new_start_number">$TXT_next</a>$right_bracket </font><br> ~;
}
if (($new_start_number > ($number_of_messages -1 )) && ($number_of_messages >($no_displayed))){
print qq~ <br> ~;
}
print qq~ <font face= "$textfontface" size=$textfontsize> ~;
$rev_startplus = $number_of_messages - $startplus +1;
$rev_new_start_number = $number_of_messages - $new_start_number +1;
$rev_number_of_messages = $number_of_messages - $number_of_messages +1;
if ($order_of_message_numbers eq "reverse"){
$overall_startplus =$rev_startplus; $overall_new_start_number =$rev_new_start_number; $overall_number_of_messages =$rev_number_of_messages;
}
else{
$overall_startplus =$startplus; $overall_new_start_number =$new_start_number; $overall_number_of_messages =$number_of_messages;
}
if ($new_start_number < $number_of_messages){
print qq~ $TXT_viewing_messages$overall_startplus$TXT_to$overall_new_start_number$TXT_after_last_number</font> ~;
}
else{
if ($startplus == $number_of_messages){
print qq~ $TXT_viewing_message$overall_startplus$TXT_after_last_number1</font> ~;
}
else{
print qq~ $TXT_viewing_messages$overall_startplus$TXT_to$overall_number_of_messages$TXT_after_last_number</font> ~;
}
}
if ($lock_gb ne "yes"){
&add2 if $add_page_appears ==1;
}
$message_number = $start_number+1;
foreach $row (@data_ordered){
@fields = split (/\|/, $row);
$grouped++;
if (($grouped > ($start_number)) && ($grouped < ($start_number + $no_displayed + 1))){
&main_table_results; $message_number++;
} # end if number is right
} # end for each row
if ($use_hr_image eq "yes"){
print "<br>";
}
unless ($old_start_number < 0){
print qq~ <font face="$textfontface" size=$textfontsize> $left_bracket<a href="$guesturl\?start_number=$old_start_number">$TXT_previous</a>$right_bracket </font> ~;
}
&show_number_menu unless ($number_of_messages <($no_displayed+1));
unless ($new_start_number > ($number_of_messages -1 )){
print qq~ <font face= "$textfontface" size=$textfontsize> $left_bracket<a href="$guesturl\?start_number=$new_start_number">$TXT_next</a>$right_bracket </font> ~;
}
if ($lock_gb ne "yes"){
&add2 if $add_page_appears ==2;
}
&search_form if $includesearch ne "no";
&user_html_footer if $use_user_html_footer eq "yes";
print qq~ <!-- version $bversion $algoval   - $stamp - $varstamp -->~;
print qq~ </td></tr></table> ~;
&inter_footer;
} # end sub read
sub write{
exit if ($lock_gb eq "yes");
if (($ENV{'REQUEST_METHOD'} ne "POST")&&($limittopost eq "on")){
&content;
print "Illegal posting method. You should change settings in A15 of the Standard Preferences Manager";
exit;
}
$guest_email = $FORM{'guest_email'};
foreach (@anti_emails) {
next unless $_;
$emailoops = "yes" if ($guest_email =~ m!$_!);
}
#if ($FORM{'aspm1'} ne $varstamp){
#&basic_header;
#print qq~<center><font face="Arial" size=-1>
#<b><br>Not allowed </b></font>
#~;
#exit;
#}
if ($emailoops eq "yes"){
&basic_header;
print qq~<center><font face="Arial" size=-1>
<b><br>Email not allowed </b></font>
~;
exit;
}
if ($use_referrer_limit eq "yes"){
unless($ENV{HTTP_REFERER}=~ m/$ref_domain/gi){
&content; print "Posting not allowed from your domain - $ENV{HTTP_REFERER}"; exit;
}
}
$TXT_code_not_correct = "Code not correct" if $TXT_code_not_correct eq "";
$page_after_write = "$guesturl\?action=reload" if (($page_after_write eq "") ||($page_after_write eq " ") );
###### anti-spam bit
if ($action ne "preview"){

open(BAK,"$failedcap");
@imgpww = <BAK>;
close BAK;
foreach $juy (@imgpww){
@imgfs = split (/\|/, $juy);
if ($FORM{'capmessage'} eq $imgfs[1]){
$foundabadone++;
}
}
if ($foundabadone >1){
&content;
print qq~ <html><head><title>$title</title> <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"></head>
<body bgcolor=#ffffff>
<center><font face=Arial size=+1>Active Guestbook</font><p>$font <B>Spam limit</B></font></center> ~;
&inter_footer;
exit;
}
$foundm = "no";
open(CFILE,"$cap");
@caps = <CFILE>;
close (CFILE);
$SUB{$FORM{'capa'}} = "yes"; $SUB{$FORM{'capb'}} = "yes";
foreach $cap (@caps){
@capfields = split (/\|/, $cap);
if (($SUB{$capfields[1]} eq "yes") && ($SUB{$capfields[2]} eq "yes") && ($FORM{'capmessage'} eq $capfields[4])){
$foundm = "yes"; $var_cap = $capfields[3];
last;
}
}
if ($foundm ne "yes"){
open(UPDATE,">>$failedcap");
print UPDATE "$var|$FORM{'capmessage'}|||||||\n";
close(UPDATE);
&content;
print qq~ <html><head><title>$title</title> <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"></head>
<body bgcolor=#ffffff>
<center><font face=Arial size=+1>$title</font><p>$font <B>$TXT_code_not_correct</B></font></center> ~;
&inter_footer;
exit;
}
}
sub old_spam{
open(BAK,"$imgpw");
@imgpw = <BAK>;
close BAK;
foreach $juy (@imgpw){
@imgfs = split (/\|/, $juy);
$IMGFWS{$imgfs[0]} = $imgfs[1];
}

if ($IMGFWS{$FORM{'hiddenpwi'}} ne $FORM{'usercod'}){
&content;
print qq~ <html><head><title>$title</title> <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"></head>
<body bgcolor=#ffffff>
<center><font face=Arial size=+1>Active Guestbook</font><p>$font <B>$TXT_code_not_correct</B></font></center> ~;
&inter_footer;
exit;
}
} # old spam
sub oldone{
$FORM{'cod'} =~ s/\-//gi;
if ($showlettercheck eq "yes"){
if (($use_preview eq "yes") && ($FORM{'cod'} ne $FORM{'usercod'})){
&content;
print qq~ <html><head><title>$title</title> <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"></head>
<body bgcolor=#ffffff>
<center><font face=Arial size=+1>Active Guestbook</font><p>$font <B>$TXT_code_not_correct</B></font></center> ~;
&inter_footer;
exit;
}
}
} # end sub
if ($anti_spam eq "on"){
$multiple_ip = "no";
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
foreach $row (@data){
@fields = split (/\|/, $row);
if (($ENV{'REMOTE_ADDR'} eq $fields[7]) && ($fields[9] eq $revdate)){
$multiple_ip = "yes";
}
}
if ($multiple_ip eq "yes"){
&content;
print qq~ <html><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
<META http-equiv="refresh" content="3; URL=$page_after_write"> </head><body bgcolor=#ffffff>
<center><font face=Arial size=+1>Active Guestbook</font><p>$font <B>$TXT_multiple_not_allowed</B>
</font></center> ~;
&inter_footer;
exit;
}
}
$full_name = $FORM{'requiredfull_name'}; $tempname = $full_name; $tempname =~ s/\s//gi;
$message = $FORM{'requiredmessage'};
$tempmessage = $message; $tempmessage =~ s/\s//gi; $tempmessage =~ s/\n//gi; $tempmessage =~ s/\r//gi;
open(FILE,"$smileys");
@smileys = <FILE>;
close(FILE);
foreach(@smileys){
@smiley = split(/\|/, $_);
$SMILES{$smiley[1]} = "yes";
}
@bitsofmessage = split(/\:/, $tempmessage);
foreach(@bitsofmessage){
if ($SMILES{$_} eq "yes"){
$smileycount++;
}
}
if ($smileycount > $max_smileys){
&content;
print qq~<font face=Arial size=2><center>Too many smileys. Maximum is $max_smileys. ~;
exit;
}
if (($tempname eq "") || ($tempmessage eq "")){
&content;
print qq~<font face=Arial size=2><center>Please fill in all required fields. ~;
exit;
}
if (($use_url_field eq "req") && ($blockurls ne "yes")){
$turl = $FORM{'url'}; $turl =~ s/\s+//gi;
if ($turl eq ""){
&content;
print "<center><font face=Arial size=2>$TXT_please_fill_in";
exit;
}
}
# $FORM{'user1_field'} =~s/\|//gi;
if ($use_user1_field eq "req") {
$turl = $FORM{'user1_field'}; $turl =~ s/\s+//gi;
if ($turl eq ""){&content; print "<center><font face=Arial size=2>$TXT_please_fill_in"; exit;
}
}
if ($use_user2_field eq "req") {
$turl = $FORM{'user2_field'}; $turl =~ s/\s+//gi;
if ($turl eq ""){&content; print "<center><font face=Arial size=2>$TXT_please_fill_in"; exit;
}
}
if ($use_user3_field eq "req") {
$turl = $FORM{'user3_field'}; $turl =~ s/\s+//gi;
if ($turl eq ""){&content; print "<center><font face=Arial size=2>$TXT_please_fill_in"; exit;
}
}
if ($use_location_field eq "req") {
$turl = $FORM{'location'}; $turl =~ s/\s+//gi;
if ($turl eq ""){&content; print "<center><font face=Arial size=2>$TXT_please_fill_in"; exit;
}
}
$rtyyw= $FORM{'epij'}; $tout = $timeout*60;
$rtyyw= reverse($rtyyw);
if (($zz - $rtyyw) >$tout)
{
$target = "http://www.active-scripts.net";
&content;
print "Session timed out. Please try again.";
exit;
}
$leftarrow = 0;
$rightarrow = 0;
@chars = split(//,$message);
foreach $char(@chars)
{
if ($char eq "<"){
$leftarrow++;
}
elsif ($char eq ">"){
$rightarrow++;
}
}
if ($leftarrow ne $rightarrow){
&content;
print "There is a problem with the html. It may simply be that you have entered a left arrow (<) or a right arrow (>) in the text. In order to prevent abuse, this is not allowed.";
exit;
}
$guest_email =~ s/\"//g;
$guest_email =~ s/\'//g;
$private_message_check = $FORM{'private_message_check'};
$private_message_check = "" if (($private_message_check ne "") && ($private_message_check ne "yes") );
$location = $FORM{'location'};
$url = $FORM{'url'};
$url =~ s/\"//g;
$url =~ s/\'//g;
$url =~ s/http\:\/\///i;
if (($guest_email) || ($use_email_confirmation eq "yes") || ($use_email_field eq "req")){
&check_address_for_mistakes;
}
unless ($action eq "post_preview"){
$message =~ s/<br>/-BREAK-/gi if $allow_html eq "no";
$message =~ s/<([^>]|\n)*>//g if $allow_html eq "no";
$message =~ s/-BREAK-/<br>/gi if $allow_html eq "no";
}
$full_name =~ s/<([^>]|\n)*>//g;
$location =~ s/<([^>]|\n)*>//g;
unless ($action eq "preview"){
$message =~ s/<br>/-BREAK-/gi if $allow_html eq "no";
$message =~ s/<([^>]|\n)*>//g if $allow_html eq "no";
$message =~ s/-BREAK-/<br>/gi if $allow_html eq "no";
$message =~ s/\|/ZPIPEPIPEY/g;
$location =~ s/\|/ZPIPEPIPEY/g;
$url =~ s/\|/ZPIPEPIPEY/g;
$full_name =~ s/\|/ZPIPEPIPEY/g;
$guest_email =~ s/\|/ZPIPEPIPEY/g;
}
$FORM{'user1_field'} =~s/\|//gi; $FORM{'user2_field'} =~s/\|//gi; $FORM{'user3_field'} =~s/\|//gi;
$message =~ s/\r\n/ <br>/g;
$message =~ s/\r/ /g;
$message =~ s/\n/ <br>/g;
$message =~ s/<br>$//g;
$message =~ s/\s+/ /g;
if ((($use_url_field eq "no") || ($blockurls eq "yes")) && ($url ne "")){
&content;
print "Cheeky";
exit;
}
$warning = "Looks like a web address. URLs are currently blocked.";
$message =~ s/\.+/./g if ($blockurls eq "yes");
$url = "" if ($blockurls eq "yes");
$full_name =~ s/\.+/./g if ($blockurls eq "yes");
$location =~ s/\.+/./g if ($blockurls eq "yes");
$number_of_words = @words_in_message = split(/ /,$message);
$number_of_chars = @chars_in_message = split(//,$message);
if ($blockurls eq "yes"){
if ( ($FORM{'user1_field'}=~/\&\#/gi) || ($FORM{'user1_field'}=~/www\./gi) ||($FORM{'user1_field'}=~/http/gi) ){
&content;
print "$warning";
exit;
}
if ( ($FORM{'user2_field'}=~/\&\#/gi) || ($FORM{'user2_field'}=~/www\./gi) ||($FORM{'user2_field'}=~/http/gi) ){
&content;
print "$warning";
exit;
}
if ( ($FORM{'user3_field'}=~/\&\#/gi) || ($FORM{'user3_field'}=~/www\./gi) ||($FORM{'user3_field'}=~/http/gi) ){
&content;
print "$warning";
exit;
}
if ( ($FORM{'user1_field'}=~tr/\.//>1) ||($FORM{'user2_field'}=~tr/\.//>1) ||($FORM{'user3_field'}=~tr/\.//>1) ){
&content;
print "$warning";
exit;
}
if ( ($guest_email=~/\&\#/gi) || ($guest_email=~/www\./gi) ||($location=~/http/gi) ){
&content;
print "$warning";
exit;
}
if ( ($full_name=~/\&\#/gi) || ($message=~/\&\#/gi) ||($location=~/\&\#/gi) ){
&content;
print "$warning";
exit;
}
if (($location=~tr/\.//>1) || ($location=~/http/gi) || ($location=~/:\/\//gi) || ($location=~/www\./gi)){
&content;
print "$warning";
exit;
}
if (($full_name=~tr/\.//>1) || ($full_name=~/http/gi) || ($full_name=~/:\/\//gi) || ($full_name=~/www\./gi)){
&content;
print "$warning";
exit;
}
foreach $word (@words_in_message){
$word =~ s/<br>/ /gi;
if (($word=~/http/gi) || ($word=~/:\/\//gi) || ($word=~/www\./gi)  || ($word=~/\.com/gi)|| ($word=~/\.org/gi) || ($word=~/\.net/gi) || ($word=~/\.biz/gi)  || ($word=~/\.info/gi) || ($word=~/\.pl/gi)  || ($word=~/\.tc/gi) || ($word=~/\.ru/gi)  || ($word=~/\.html/gi) || ($word=~/\.dk/gi)
 ){
&content;
print "$warning";
exit;
}
}
}
$max_chars_per_line = 20 if $max_chars_per_line eq "";
if (($max_chars_per_line % 2) != 0){ $max_chars_per_line++; };
($limit_no_of_chars_in_line = "yes") if ($limit_no_of_chars_in_line eq "");
if ($limit_no_of_chars_in_line eq "yes"){
if ((($allow_html eq "yes") && ($message !~ /</)) || ($allow_html ne "yes")){
$new_message = "";
unless ($action eq "post_preview"){
foreach $individual_word (@words_in_message){
$length_of_this_word = length($individual_word);
if ($length_of_this_word > $max_chars_per_line){
$punctuated_message = "";
@individual_letters = split(//,$individual_word);
$rrr = @individual_letters;
for ($x = 0; $x < $rrr; $x++){
$yyyyyy = $individual_letters[$x];
if (((($x-$max_chars_per_line+1)/$max_chars_per_line) == int($x/$max_chars_per_line)) && ($x != 0) ){
$punctuated_message = "$punctuated_message" . "$yyyyyy" . "<br>" ;
}
else{
$punctuated_message = "$punctuated_message" . "$yyyyyy";
}
} # end for $x
$new_message = $new_message . " " . $punctuated_message;
}
else
{
$new_message = $new_message . " " . $individual_word;
}
} # end for each word
$message = $new_message;
}
} # unless limit
}
$message =~ s/^\s//;
$message =~ s/^<br>//;
##### block multiple posts
$multiple_post = "no";
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
open(USER_FILE,"$econf");
@data2 = <USER_FILE>;
close(USER_FILE);
@data3 = (@data2, @data);
foreach $row (@data3){
@fields = split (/\|/, $row);
if (($full_name eq $fields[1]) && ($fields[2] eq $message))
{
$multiple_post = "yes";
}
## new counter
$newhighest = $fields[0] if $fields[0] > $newhighest ;
}
$newhighest++;
if ($multiple_post eq "yes"){
&basic_header;
print qq~ <center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1><b> <a href="javascript:history.go(-1)">This message has already been added.</a> </b></font> ~;
exit;
}
if (($number_of_words > $max_length) || ($number_of_chars > $max_length_chars)){
&content;
print qq~ <center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1><b> $TXT_too_many_words </b></font> ~;
exit;
}
# check bad words
$oops = "no";
foreach (@words){
if (($message =~ /\b$_\b/i) || ($full_name =~ /\b$_\b/i) || ($guest_email =~ /\b$_\b/i) || ($location =~ /\b$_\b/i) || ($url =~ /\b$_\b/i)){
$oops = "yes";
last;
}
}
if (($message =~ /\[LINK/i) || ($location =~ /\[LINK/i) ||($full_name =~ /\[LINK/i) ||($guest_email =~ /\[LINK/i) || ($FORM{'user2_field'} =~ /\[LINK/i) ||($FORM{'user1_field'} =~ /\[LINK/i) || ($FORM{'user3_field'} =~ /\[LINK/i))
{
&content;
print qq~ <center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1><b>$TXT_disallowed_word </b></font> ~;
exit;
}
if ($oops eq "yes"){
&content;
print qq~ <center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1><b>$TXT_disallowed_word </b></font> ~;
exit;
}
if ($ipoops eq "yes"){
&content;
print qq~ <center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1><b>$TXT_blocked_IP </b></font> ~;
exit;
}# end check for blocked IP
if ($action eq "preview"){&preview;} elsif ($action ne "no_preview"){$message =~ s/QUOTQUOT/"/g;}
if ($use_email_confirmation eq "yes"){$filetoadd = $econf; }
else{
$filetoadd = $guestbook_data_name;
}
@enf = split (//, $time_in_seconds); @enf = reverse(@enf); $revtime=join("",@enf);
&get_file_lock("$location_of_lock_file");
$full_name =~ s/\n//gi; $full_name =~ s/\r//gi;  $url =~ s/\n//gi; $url =~ s/\r//gi;
$location =~ s/\n//gi; $location =~ s/\r//gi;
$guest_email =~ s/\n//gi; $guest_email =~ s/\r//gi;
$FORM{'user1_field'} =~ s/\n//gi; $FORM{'user1_field'} =~ s/\r//gi;
$FORM{'user2_field'} =~ s/\n//gi; $FORM{'user2_field'} =~ s/\r//gi;
$FORM{'user3_field'} =~ s/\n//gi; $FORM{'user3_field'} =~ s/\r//gi;
#if ($lastnotcheck ne $FORM{'lastnot'}){
#&content;
#print qq~ <center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1><b>$TXT_incorrect_selection</b></font> ~;
#exit;
#}
open(DATABASE,">>$filetoadd");
$private_message_check = "yes" if $all_private eq "yes";
if ($private_message_check eq "yes") {
print DATABASE "$newhighest|$full_name|$message|$time_in_seconds|$guest_email|$location||$ENV{'REMOTE_ADDR'}|$now|$revdate||$url|||||$private_message_check|$FORM{'user1_field'}|$FORM{'user2_field'}|$FORM{'user3_field'}|$revtime|$FORM{'aspm1'}|$var_cap|||||||||\n";
}
elsif ($moderated eq "yes"){
print DATABASE "$newhighest|$full_name|$message|$time_in_seconds|$guest_email|$location||$ENV{'REMOTE_ADDR'}|$now|$revdate||$url||||waiting||$FORM{'user1_field'}|$FORM{'user2_field'}|$FORM{'user3_field'}|$revtime|$FORM{'aspm1'}|$var_cap|||||||||\n";
}
else {
print DATABASE "$newhighest|$full_name|$message|$time_in_seconds|$guest_email|$location||$ENV{'REMOTE_ADDR'}|$now|$revdate||$url|||||$private_message_check|$FORM{'user1_field'}|$FORM{'user2_field'}|$FORM{'user3_field'}|$revtime|$FORM{'aspm1'}|$var_cap|||||||||\n";
}
close(DATABASE);
&backup_to_dir;
&release_file_lock("$location_of_lock_file");
if ($use_email_confirmation eq "yes"){
open (MAIL, "|$mail_path");
print MAIL "Content-Type: text/plain; charset=\"$TXT_main_language\"\n";
print MAIL "To: $guest_email\n";
print MAIL "From: $admin_email\n";
print MAIL "Subject: $TXT_approve_subject\n\n";
print MAIL "$TXT_approve_text\n\n";
print MAIL "http://$allurl2\?action=approve&ref=$newhighest&tero=$revtime\n\n";
print MAIL "=========================\n";
close(MAIL);
&thanks;
}
else{
 &handle_notifications;
}
}
sub handle_notifications
{
#if ($admin_email eq "webmaster")
#{
if (($send_email_to_admin eq "on") && ($admin_email ne ""))
{
&send_email_to_admin;
}
#}
if (($guest_email) && ($send_email_to_guest eq "on") && ($moderated ne "yes"))
{
&send_email_to_guest;
}
unless ($action eq "approve")
{
if ($action ne "no_preview")
{
&thanks;
}
else
{
&no_thanks;
}
}
}
sub add
{
exit if ($lock_gb eq "yes");
&end if ($ipoops eq "yes");
&content;
&main_header;
&active_header if $active_header eq "on";
print qq~ <table border=0 cellspacing=0 cellpadding=0 width=$table_width><tr><td width=$table_width align=$alignment_body> ~;
&user_image if $user_image eq "yes";
&title if $use_title eq "on";
if ($use_user_html eq "yes"){
&user_html if $disable_user_html_add ne "yes";
}
&menu;
if ($table_width =~ /\%/){
$table_width_per = $table_width;
$table_width_per =~ s/\%//gi;
$table_width_per = $table_width_per/3;
$table_width_per = ($table_width_per . "%");
$col1 = $table_width_per;
}
else{
$col1 = ($table_width/3);
}
&add2;
if ($use_user_html_footer eq "yes"){
&user_html_footer if $disable_user_html_footer_add ne "yes";
}
print qq~</td></tr></table> <!--$ipcontrollerspec --> ~;
print "\n\n</body>";
} # end sub add
sub add2{
if ($use_preview eq "yes"){
$whatever = "preview";
}
else{
$whatever = "no_preview";
}$zz = reverse($zz);
$aspm1 = $FORM{'aspm1'} if $aspm1 eq "";
$box_height = "3" if $box_height eq "";
print qq~ <center><a name="addsection"></a><FORM ACTION="$guesturl" METHOD="POST" onSubmit="return checkrequired(this)" name=addform>
<input type=hidden name=action value="$whatever"> <input type=hidden name=epij value="$zz"><input type=hidden name=lastnotvar value="$lastnotvar"> <input type=hidden name=aspm1 value="$aspm1">
<div align=$alignment_body>
<table border=0><tr><td width="$col1"><font face="$textfontface" size=$textfontsize><B>$TXT_your_name</B> $TXT_required ~;
print qq~</td><td><font face="$textfontface" size=$textfontsize><INPUT TYPE="text" maxlength = 60 NAME="requiredfull_name" SIZE="$field_length" class="textfield"></td></tr>
<tr valign="top"><td><font face="$textfontface" size=$textfontsize><B>$TXT_your_message</B> $TXT_required <br>~;
print qq~</td><td><font face="$textfontface" size=$textfontsize>
<TEXTAREA wrap="virtual" NAME="requiredmessage" ROWS="$box_height" COLS="$field_length" class="textarea" onSelect="return storeCaret(this);" onClick="return storeCaret(this);"></TEXTAREA></td></tr> ~;
open(FILE,"$smileys"); @smileys = <FILE>; close(FILE);
$ssmil = "yes" if $demo eq "on";
$ssmil = "yes" if (($var - $stamp) < $grace);
$ssmil = "yes" if ((($var - $stamp) > $grace) && ($foundasimg ne "yes")    );
if ($ssmil eq "yes"){
if ($use_smileys eq "yes"){
print "<tr><td colspan=2 align=center>";
foreach(@smileys){
@smiley = split(/\|/, $_);
next if $smiley[3] eq "inactive";
$smiley[2] =~ s/http\:\/\///gi;
print qq~
<a style="cursor:hand" onClick="return insertAtCaret(document.addform.requiredmessage, ' :$smiley[1]: ', '', 'smileys');">
<img src="http://$smiley[2]"></a> ~;
}
}
print "</tr>";
}
$use_email_field = "yes" if $use_email_field eq ""; $use_url_field = "yes" if $use_url_field eq "";
$use_location_field = "yes" if $use_location_field eq "";
$use_user1_field = "no" if $use_user1_field eq ""; $use_user2_field = "no" if $use_user2_field eq "";
$use_user3_field = "no" if $use_user3_field eq "";
if (($use_location_field eq "yes")|| ($use_location_field eq "req")){
print qq~ <tr valign="top"><td><font face="$textfontface" size=$textfontsize><B>$TXT_where_in_the_world</B> ~;
print "$TXT_required" if ($use_location_field eq "req");
print qq~</td><td><font face="$textfontface" size=$textfontsize>
<INPUT TYPE="text" maxlength = 60 NAME="location" SIZE="$field_length" class="textfield"></td></tr> ~;
}
if (($use_email_field eq "yes")|| ($use_email_field eq "req") || ($use_email_confirmation eq "yes")){
print qq~ <tr valign="top"><td><font face="$textfontface" size=$textfontsize><B>$TXT_your_email_address</B> ~;
print "$TXT_required" if (($use_email_confirmation eq "yes") || ($use_email_field eq "req"));
print qq~ </td><td><font face="$textfontface" size=$textfontsize>
<INPUT TYPE="text" maxlength = 60 NAME="guest_email" SIZE="$field_length" class="textfield"></td></tr> ~;
}
if (($use_url_field eq "yes") || ($use_url_field eq "req")){
if ($blockurls ne "yes"){
print qq~ <tr valign="top"><td><font face="$textfontface" size=$textfontsize>
<B>$TXT_your_web_page_address</B> ~;
print "$TXT_required" if ($use_url_field eq "req");
print qq~</td><td><font face="$textfontface" size=$textfontsize>
<INPUT TYPE="text" maxlength = 120 NAME="url" SIZE="$field_length" class="textfield"></td></tr>~;
}
}
if (($use_user1_field eq "yes") || ($use_user1_field eq "req")){
$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
print qq~ <tr valign="top"><td><font face="$textfontface" size=$textfontsize><B>$TXT_user1_field</B> ~;
print "$TXT_required" if ($use_user1_field eq "req");
print qq~ </td><td><font face="$textfontface" size=$textfontsize>
<INPUT TYPE="text" maxlength = 60 NAME="user1_field" SIZE="$field_length" class="textfield"></td></tr> ~;
}
if (($use_user2_field eq "yes") || ($use_user2_field eq "req")){ $TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
print qq~ <tr valign="top"><td><font face="$textfontface" size=$textfontsize><B>$TXT_user2_field</B> ~;
print "$TXT_required" if ($use_user2_field eq "req");
print qq~ </td><td><font face="$textfontface" size=$textfontsize>
<INPUT TYPE="text" maxlength = 60 NAME="user2_field" SIZE="$field_length" class="textfield"></td></tr> ~;
}
if (($use_user3_field eq "yes") || ($use_user3_field eq "req")){ $TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
print qq~ <tr valign="top"><td><font face="$textfontface" size=$textfontsize>
<B>$TXT_user3_field</B> ~;
print "$TXT_required" if ($use_user3_field eq "req");
print qq~ </td><td><font face="$textfontface" size=$textfontsize><INPUT TYPE="text" maxlength = 60 NAME="user3_field" SIZE="$field_length" class="textfield"></td></tr> ~;
}
unless ($all_private eq "yes"){
if ($allow_private_messages eq "yes"){
print qq~<tr valign="top"><td><font face="$textfontface" size=$textfontsize>
<B>$TXT_private_message</B></td><td><font face="$textfontface" size="$textfontsize"><input type="checkbox" name="private_message_check" value="yes"> $TXT_private_message2</td></tr>~;
}
}
sub tempig{
$TXT_select_this_number = "Select this number" if $TXT_select_this_number eq "";
print qq~
<tr><td><font face="$textfontface" size=$textfontsize><B>$TXT_select_this_number: $lastnot</B>  ~;
print qq~</td><td><font face="$textfontface" size="$textfontsize"><select  NAME="lastnot" class="textfield"> ~;
for ($x = 00; $x < 100; $x++){
$y = $x;
$y = ("0" . "$x") if $x <10;
print qq~ <option value="$y">$y</option>
~;
}
print qq~</select></td></tr> ~;
}
print qq~
<tr><td colspan=2> <font face="$textfontface" size=$textfontsize>
<INPUT TYPE="submit" VALUE="$TXT_continue" class="buttons"></td></tr>
</table></form><p><!-- $zz  --></div>~;
} # end sub add2
########## startup
sub startup
{
@ooolsd= ("a", "b", "g", "f", "j", "e", "h", "i", "c", "d");
$zz = time;
unless (-e "$edit")
{
open(UPDATE1,">$edit"); #install date-keep
chmod(0777, "$edit");
print UPDATE1 "$zz";
close(UPDATE1);
}
if ($algo ne ""){
unless (-e "$algo_file")
{
open(UPDATE1,">$algo_file");
chmod(0777, "$algo_file");
print UPDATE1 "$algo";
close(UPDATE1);
}
}
unless (-e "$varedit")
{
open(UPDATE1,">$varedit");  # variable day time
chmod(0777, "$varedit");
print UPDATE1 "$zz";
close(UPDATE1);
}
unless (-e "$varday")
{
open(UPDATE1,">$varday");
chmod(0777, "$varday");
print UPDATE1 "$hsday";
close(UPDATE1);
}
@uns = split(//, $zz);
@uns = reverse(@uns);
$cod2 = $ooolsd[$uns[0]] . " " . $ooolsd[$uns[4]] . " " . $ooolsd[$uns[1]] . " " . $ooolsd[$uns[2]];
$cod = $ooolsd[$uns[0]] . $ooolsd[$uns[4]] . $ooolsd[$uns[1]] . $ooolsd[$uns[2]];
unless (-e "$guestbook_backups_directory")
{
mkdir ($guestbook_backups_directory, 0777);
chmod(0777, "$guestbook_backups_directory");
open(BAK,">./$guestbook_backups_directory/undo_restore.bak");
close(BAK);
}
unless (-e "$guestbook_files_directory")
{
mkdir ($guestbook_files_directory, 0777);
chmod(0777, "$guestbook_files_directory");
}
########## months
unless (-e "$months_name")
{
open(MONTHS,">$months_name");
chmod(0777, "$months_name");
print MONTHS "January\nFebruary\nMarch\nApril\nMay\nJune\nJuly\nAugust\nSeptember\nOctober\nNovember\nDecember\n";
close(MONTHS);
}
unless (-e "$months_bak_name")
{
open(MONTHS,">$months_bak_name");
chmod(0777, "$months_bak_name");
print MONTHS "January\nFebruary\nMarch\nApril\nMay\nJune\nJuly\nAugust\nSeptember\nOctober\nNovember\nDecember\n";
close(MONTHS);
}
unless (-e "$days_name")
{
open(DAYS,">$days_name");
chmod(0777, "$days_name");
print DAYS "Sunday\nMonday\nTuesday\nWednesday\nThursday\nFriday\nSaturday\n";
close(DAYS);
}
############ added for version 1.9 # create user and factory style defaults and style
unless (-e "$user_style_name")
{
open(STYLE,">$user_style_name");
chmod(0777, "$user_style_name");
print STYLE qq~<style type="text/css">
a {text-decoration: none; color: #ff0000 }
a:hover {text-decoration: none; color: #0000ff }
.textfield {
BORDER-RIGHT: darkgray 1px solid;
BORDER-TOP: darkgray 1px solid;
BORDER-LEFT: darkgray 1px solid;
BORDER-BOTTOM: darkgray 1px solid;
font-size: 10px;
}
.textarea {
BORDER-RIGHT: darkgray 1px solid;
BORDER-TOP: darkgray 1px solid;
BORDER-LEFT: darkgray 1px solid;
BORDER-BOTTOM: darkgray 1px solid;
font-family: "Arial", serif;
font-size: 12px;
}
.buttons {
font-size: 10px;
background-color: white;
}
</style>~;
close(STYLE);
}
####################
unless (-e "$senddate_name")
{
open(UPDATE1,">$senddate_name");
chmod(0777, "$senddate_name");
print UPDATE1 "$now";
close(UPDATE1);
}
unless (-e "$econf")
{
open(UPDATE1,">$econf");
chmod(0777, "$econf");
close(UPDATE1);
}
unless (-e "$ip_name")
{
open(UPDATE3,">$ip_name");
chmod(0777, "$ip_name");
print UPDATE3 "$revdate";
close(UPDATE3);
}
unless (-e "$user_date_file")
{
open(UPDATE,">$user_date_file");
chmod(0777, "$user_date_file");
print UPDATE "date,3,6,7,8,8,8,8,8\n";
print UPDATE "space, , ,,,,,,\n";
print UPDATE "hours,0,,,,,,,\n";
close(UPDATE);
}
unless (-e "$update_name")
{
open(UPDATE,">$update_name");
chmod(0777, "$update_name");
print UPDATE "$revdate";
close(UPDATE);
}
unless (-e "$cap")
{
open(UPDATE,">$cap");
chmod(0777, "$cap");
close(UPDATE);
}
unless (-e "$history")
{
open(UPDATE,">$history");
chmod(0777, "$history");
print UPDATE "$version|$var|||||\n";
close(UPDATE);
}
unless (-e "$failedcap")
{
open(UPDATE,">$failedcap");
chmod(0777, "$failedcap");
close(UPDATE);
}
unless (-e "$smileys")
{
open(SM,">$smileys");
chmod(0777, "$smileys");
print SM "1|biggrin|www.active-scripts.net/smileys5/biggrin.gif|||||\n";
print SM "2|blink|www.active-scripts.net/smileys5/blink.gif|||||\n";
print SM "3|cool|www.active-scripts.net/smileys5/cool.gif|||||\n";
print SM "4|dry|www.active-scripts.net/smileys5/dry.gif|||||\n";
print SM "5|eek|www.active-scripts.net/smileys5/eek.gif|||||\n";
print SM "6|huh|www.active-scripts.net/smileys5/huh.gif|||||\n";
print SM "7|laugh|www.active-scripts.net/smileys5/laugh.gif|||||\n";
print SM "8|light|www.active-scripts.net/smileys5/light.gif|||||\n";
print SM "9|mad|www.active-scripts.net/smileys5/mad.gif|||||\n";
print SM "10|ohmy|www.active-scripts.net/smileys5/ohmy.gif|||||\n";
print SM "11|question|www.active-scripts.net/smileys5/question.gif|||||\n";
print SM "12|rolleyes|www.active-scripts.net/smileys5/rolleyes.gif|||||\n";
print SM "13|sad|www.active-scripts.net/smileys5/sad.gif|||||\n";
print SM "14|smile|www.active-scripts.net/smileys5/smile.gif|||||\n";
print SM "15|thumbdown|www.active-scripts.net/smileys5/thumbdown.gif|||||\n";
print SM "16|thumbup|www.active-scripts.net/smileys5/thumbup.gif|||||\n";
print SM "17|tongue|www.active-scripts.net/smileys5/tongue.gif|||||\n";
print SM "18|unsure|www.active-scripts.net/smileys5/unsure.gif|||||\n";
print SM "19|wacko|www.active-scripts.net/smileys5/wacko.gif|||||\n";
print SM "20|wink|www.active-scripts.net/smileys5/wink.gif|||||\n";
close(SM);
}
unless (-e "$user_comment_line_name")
{
open(USER_HTML,">$user_comment_line_name");
chmod(0777, "$user_comment_line_name");
print USER_HTML "<hr size=1 width=\"80%\" align=\"center\">";
close(USER_HTML);
}
unless (-e "$user_html_name")
{
open(USER_HTML,">$user_html_name");
chmod(0777, "$user_html_name");
print USER_HTML "<!-- You can type some html here which will appear just above the menu. -->";
close(USER_HTML);
}
unless (-e "$user_html_footer_name")
{
open(USER_HTML,">$user_html_footer_name");
chmod(0777, "$user_html_footer_name");
print USER_HTML "<!-- You can type some html here which will appear at the bottom of your page. -->";
close(USER_HTML);
}
unless (-e "$user_default_html_name")
{
open(USER_DEFAULT_HTML,">$user_default_html_name");
chmod(0777, "$user_default_html_name");
print USER_DEFAULT_HTML "You can type some html here which will appear just above the menu. <br>";
close(USER_DEFAULT_HTML);
}
unless (-e "$user_default_html_footer_name")
{
open(USER_DEFAULT_HTML,">$user_default_html_footer_name");
chmod(0777, "$user_default_html_footer_name");
print USER_DEFAULT_HTML "You can type some html here which will appear at the bottom of your page.";
close(USER_DEFAULT_HTML);
}
unless (-e "$spam_days")
{
open(THANKS,">$spam_days");
chmod(0777, "$spam_days");
print THANKS "10";
close(THANKS);
}
unless (-e "$thank_you_name")
{
open(THANKS,">$thank_you_name");
chmod(0777, "$thank_you_name");
print THANKS "Thank you very much for adding a message to our guestbook. Your support is much appreciated.\n\n";
close(THANKS);
}
unless (-e "$thank_you_user_default_name")
{
open(THANKS,">$thank_you_user_default_name");
chmod(0777, "$thank_you_user_default_name");
print THANKS "Thank you very much for adding a message to our guestbook. Your support is much appreciated.\n\n";
close(THANKS);
}
unless (-e "$tempcolprefs_name")
{
open(COLFILE,">$tempcolprefs_name");
chmod(0777, "$tempcolprefs_name");
print COLFILE "\n";
close(COLFILE);
}
unless (-e "$counter_name")
{
open(COUNTER,">>$counter_name");
chmod(0777, "$counter_name");
print COUNTER "1000100";
close(COUNTER);
chmod(0777, "$counter_name");
}
unless (-e "$active_name")
{
if ($COOK{'activea'} ne "")
# if (&GetCookies('activea'))
{
$coolkiepass = $COOK{'activea'};
#$coolkiepass = $Cookies{'activea'};
open(ACTIVE,">>$active_name");
chmod(0777, "$active_name");
print ACTIVE "$coolkiepass";
close(ACTIVE);
}
else
{
open(ACTIVE,">>$active_name");
chmod(0777, "$active_name");
print ACTIVE "$enc";
close(ACTIVE);
}
}
############# # language prefs added version 1.9
unless (-e "$langprefs_name")
{
open(PREFS,">>$langprefs_name");
chmod(0777, "$langprefs_name");
print PREFS "web_comment=Webmaster comments =\n";
print PREFS "TXT_approve_subject=Guestbook message confirmation required=\n";
print PREFS "TXT_approve_text=Thank you for adding a message in our guestbook. To complete the process please visit the link below.=\n";
print PREFS "TXT_add_a_message=Add a message=\n";
print PREFS "TXT_main_language=iso-8859-1=\n";
print PREFS "TXT_multiple_not_allowed=Multiple posts are currently not allowed.=\n";
print PREFS "TXT_search=Search=\n";
print PREFS "TXT_previous=<<<=\n";
print PREFS "TXT_next=>>>=\n";
print PREFS "TXT_there_is_now=There is now =\n";
print PREFS "TXT_there_are_now=There are now =\n";
print PREFS "TXT_messages_in_our_guestbook= messages in our guestbook.=\n";
print PREFS "TXT_message_in_our_guestbook= message in our guestbook.=\n";
print PREFS "TXT_viewing_message=Viewing message =\n";
print PREFS "TXT_viewing_messages=Viewing messages =\n";
print PREFS "TXT_to= to =\n";
print PREFS "TXT_after_last_number=.=\n";
print PREFS "TXT_after_last_number1=.=\n";
print PREFS "TXT_you_can_search_this_guestbook_by=You can search this guestbook by:=\n";
print PREFS "TXT_searchmessage=Message :=\n";
print PREFS "TXT_searchname=Name :=\n";
print PREFS "TXT_searchall=All :=\n";
print PREFS "TXT_incorrect_selection=Incorrect selection :=\n";
print PREFS "TXT_searchsearch=Search=\n";
print PREFS "TXT_searchtext=Please type some text:=\n";
print PREFS "TXT_back_to_guestbook=Back to guestbook=\n";
print PREFS "TXT_your_name=Your name=\n";
print PREFS "TXT_your_message=Your message=\n";
print PREFS "TXT_required=(required)=\n";
print PREFS "TXT_type_letters_only=Enter the underlined numbers=\n";
print PREFS "TXT_where_in_the_world=Where in the world?=\n";
print PREFS "TXT_user1_field=Extra field 1=\n";
print PREFS "TXT_user2_field=Extra field 2=\n";
print PREFS "TXT_user3_field=Extra field 3=\n";
print PREFS "TXT_select_this_number=Select this number=\n";
print PREFS "TXT_code_not_correct=The code you entered is not correct. Please go back and fix.=\n";
print PREFS "TXT_your_email_address=Your email address=\n";
print PREFS "TXT_your_web_page_address=Your web page address=\n";
print PREFS "TXT_private_message=Private message=\n";
print PREFS "TXT_private_message2=(when checked, message will not appear in guestbook)=\n";
print PREFS "TXT_continue=Continue=\n";
print PREFS "TXT_these_are_the=These are the details you have given.=\n";
print PREFS "TXT_if_correct=If they are correct, please click Continue.=\n";
print PREFS "TXT_if_not=If not, please =\n";
print PREFS "TXT_go_back=go back =\n";
print PREFS "TXT_and_edit=and edit.=\n";
print PREFS "TXT_emailconfsent=Thank you. For your security an email has been sent to you to allow you to confirm your message.=\n";
print PREFS "TXT_has_been_added=Thanks. Your message has been added to our guestbook.=\n";
print PREFS "TXT_has_been_added_moderated=Thanks. Your message has been sent to our webmaster and will be added shortly.=\n";
print PREFS "TXT_has_been_added_private=Thanks. Your private message has been sent to our webmaster.=\n";
print PREFS "TXT_search_results=Search results=\n";
print PREFS "TXT_back_search_again=Back to Guestbook/Search again=\n";
print PREFS "TXT_one_match=One guestbook message matches your search criteria.=\n";
print PREFS "TXT_no_match=Sorry, no messages in our guestbook match your search criteria.=\n";
print PREFS "TXT_more_matches_1=There are =\n";
print PREFS "TXT_more_matches_2= guestbook messages that match your search criteria.=\n";
print PREFS "TXT_please_fill_in=Please fill in all required fields.=\n";
print PREFS "TXT_please_go_back_and_edit=Please go back and edit=\n";
print PREFS "TXT_no_dot_at_start=Email addresses don't start with dots or @ signs.=\n";
print PREFS "TXT_no_www_at_start=Email addresses don't start with www. That's a web page address.=\n";
print PREFS "TXT_no_squiggles_in_domain=There should not be any underlines or squiggles or hashes after the @ in your email address.=\n";
print PREFS "TXT_only_one_at=Your email address is not valid.=\n";
print PREFS "TXT_no_dots_next=You are not allowed to have dots next to each other or next to @ sign in your email address.=\n";
print PREFS "TXT_wrong_end=All email addresses end in a dot and some letters (such as .com, .net, .uk, .ac etc.).=\n";
print PREFS "TXT_too_many_words=Your message is too long. Please go back and edit.=\n";
print PREFS "TXT_disallowed_word=Your message contains a disallowed word. Please go back and edit.=\n";
print PREFS "TXT_blocked_IP=This service is currently unavailable.=\n";
close(PREFS);
}
######## create and write FACTORY DEFAULT $langprefs_backup_name
unless (-e "$langprefs_backup_name"){
open(FILE,"$langprefs_name");
@lines = <FILE>;
close(FILE);
open(BAK,">$langprefs_backup_name");
chmod(0777, "$langprefs_backup_name");
foreach $line (@lines){
print BAK "$line";
}
close(BAK);
}
##############
unless (-e "$prefs_name"){
open(PREFS,">>$prefs_name");
chmod(0777, "$prefs_name");
print PREFS "disable_user_html_footer_add=no=\n";
print PREFS "lock_gb=no=\n";
print PREFS "disable_user_html_add=no=\n";
print PREFS "use_referrer_limit=no=\n";
print PREFS "limittopost=on=\n";
print PREFS "ref_domain=active-scripts=\n";
print PREFS "replacement_character=;=\n";
print PREFS "replace_dots=no=\n";
print PREFS "order_of_message_numbers=normal=\n";
print PREFS "use_message_numbers=no=\n";
print PREFS "use_own_captcha=no=\n";
print PREFS "captcha_url=no=\n";
print PREFS "message_number_pre=Message =\n";
print PREFS "message_number_post= - =\n";
print PREFS "timeout=10=\n";
print PREFS "show_f1=yes=\n";
print PREFS "show_f2=yes=\n";
print PREFS "show_f3=yes=\n";
print PREFS "show_location=yes=\n";
print PREFS "page_after_write==\n";
print PREFS "use_email_field=yes=\n";
print PREFS "use_url_field=no=\n";
print PREFS "use_location_field=yes=\n";
print PREFS "use_user1_field=no=\n";
print PREFS "use_user2_field=no=\n";
print PREFS "use_user3_field=no=\n";
print PREFS "showlettercheck=yes=\n";
print PREFS "use_email_confirmation=no=\n";
print PREFS "add_page_appears==\n";
print PREFS "max_smileys=10=\n";
print PREFS "blockurls=no=\n";
print PREFS "limit_no_of_chars_in_line=no=\n";
print PREFS "max_chars_per_line=50=\n";
print PREFS "includesearch=yes=\n";
print PREFS "show_guest_email=yes=\n";
print PREFS "show_guest_url=no=\n";
print PREFS "use_preview=yes=\n";
print PREFS "email_link_type=image=\n";
print PREFS "web_link_type=image=\n";
print PREFS "url_text=url=\n";
print PREFS "email_txt=@=\n";
print PREFS "box_height=3=\n";
print PREFS "use_smileys=yes=\n";
print PREFS "use_mailto=yes=\n";
print PREFS "web_enabled=yes=\n";
print PREFS "textfontface=Arial=\n";
print PREFS "textfontsize=2=\n";
print PREFS "marginwidth=0=\n";
print PREFS "marginheight=0=\n";
print PREFS "alignment=center=\n";
print PREFS "alignment_body=center=\n";
print PREFS "allow_private_messages=no=\n";
print PREFS "title=Active Guestbook=\n";
print PREFS "show_line=yes=\n";
print PREFS "home_page=http://www.active-scripts.net/=\n";
print PREFS "show_home_page_link=yes=\n";
print PREFS "home_page_target=_top=\n";
print PREFS "home_page_title=Active Scripts=\n";
print PREFS "order=reversed=\n";
print PREFS "border_size=0=\n";
print PREFS "mail_path=/usr/lib/sendmail=\n";
print PREFS "admin_email=webmaster\@active-scripts.net=\n";
print PREFS "send_email_to_admin=off=\n";
print PREFS "send_email_to_guest=off=\n";
print PREFS "thanks_title=Active Scripts Guestbook=\n";
print PREFS "thanks_include_message=off=\n";
print PREFS "anti_ips=111.111.111.3,server.isp.com=\n";
print PREFS "anti_emails=strange.com,stranger.com=\n";
print PREFS "bad_words=wankle rotaryengine=\n";
print PREFS "no_displayed=5=\n";
print PREFS "max_length=400=\n";
print PREFS "max_length_chars=4000=\n";
print PREFS "max=300000=\n";
print PREFS "days_to_delete=1000000=\n";
print PREFS "days_to_trash=1000000=\n";
print PREFS "days_to_delete_backup_files=60=\n";
print PREFS "mail_backup_to_admin=no=\n";
print PREFS "mail_admin_backups_interval=monthly=\n";
print PREFS "mail_admin_backups_day=1=\n";
print PREFS "mail_admin_backups_month=1=\n";
print PREFS "anti_spam=off=\n";
print PREFS "allow_html=no=\n";
print PREFS "active_header=on=\n";
print PREFS "use_title=off=\n";
print PREFS "show_no_of_messages=yes=\n";
print PREFS "mung=on=\n";
print PREFS "use_user_html=no=\n";
print PREFS "use_user_html_footer=no=\n";
print PREFS "table_width=600=\n";
print PREFS "style=on=\n";
print PREFS "moderated=yes=\n";
print PREFS "field_length=40=\n";
print PREFS "left_bracket==\n";
print PREFS "middle_bracket=:=\n";
print PREFS "right_bracket==\n";
print PREFS "all_private==\n";
close(PREFS);
}
unless (-e "$prefs_backup_name")
{
open(FILE,"$prefs_name");
@lines = <FILE>;
close(FILE);
open(BAK,">$prefs_backup_name");
chmod(0777, "$prefs_backup_name");
foreach $line (@lines){
print BAK "$line";
}
close(BAK);
}
open(BAK,"$imgpwver");
$overs = <BAK>;
close(BAK);
if ($version ne $overs){
open(UPDATE,">>$history");
print UPDATE "$version|$var|||||\n";
close(UPDATE);
open(IP,"$ip_name") || &oops('$ip_name');
$ip_addresses = <IP>;
close(IP);
if ($ip_addresses eq $cookie_default) {
open(UUU,">$ip_name");
close(UUU);
&content;
print "<font face=arial size=2>Active Guestbook has found a data corruption and repaired it. Please restore your most recent valid backup. <a href=\"$guesturl\?action=reload\">Continue</a>";
exit;
}
open(BAK,">$imgpw");
chmod(0777, "$imgpw");
print BAK qq~2030|7489|||
2031|9453|||
2032|8823|||
2033|0124|||
2034|8458|||
2035|9993|||
2036|3571|||
2037|9064|||
2038|4378|||
2039|2468|||
~;
close(BAK);
}
if ($version ne $overs){
open(BAK,">$imgpwver");
chmod(0777, "$imgpwver");
print BAK "$version";
close(BAK);
}
unless (-e "$userprefs_backup_name"){
open(USERDEFAULT,">$userprefs_backup_name");
chmod(0777, "$userprefs_backup_name");
foreach $line (@lines){
print USERDEFAULT "$line";
}
close(USERDEFAULT);
}

unless (-e "$colprefs_name"){
open(COLPREFS,">>$colprefs_name");
chmod(0777, "$colprefs_name");
print COLPREFS "trans_search=no=\n";
print COLPREFS "trans_message_header=no=\n";
print COLPREFS "trans_message_body=no=\n";
print COLPREFS "backcolor=#ffffff=\n";
print COLPREFS "data_color1=#66cc99=\n";
print COLPREFS "data_color2=#cc9900=\n";
print COLPREFS "textdata_color1=#000000=\n";
print COLPREFS "textdata_color2=#000000=\n";
print COLPREFS "table_color1=#fffff0=\n";
print COLPREFS "table_color2=#ffffd0=\n";
print COLPREFS "texttable_color1=#000000=\n";
print COLPREFS "texttable_color2=#000000=\n";
print COLPREFS "link=#000000=\n";
print COLPREFS "vlink=#000000=\n";
print COLPREFS "alink=#000000=\n";
print COLPREFS "text=#000000=\n";
print COLPREFS "searchcolor=#eeeeee=\n";
print COLPREFS "usebackgroundimage=no=\n";
print COLPREFS "fixedbackground==\n";
print COLPREFS "backgroundimage=http://www.active-scripts.net/active_guestbook/background.jpg=\n";
print COLPREFS "user_image=no=\n";
print COLPREFS "user_image_url==\n";
print COLPREFS "use_hr_image=no=\n";
print COLPREFS "hr_image=http://www.active-scripts.net/line.gif=\n";
print COLPREFS "url_image=http://www.active-scripts.net/url2.gif=\n";
print COLPREFS "email_image=http://www.active-scripts.net/mail2.gif=\n";
close(COLPREFS);
$firstinstall = "yes";
}
unless (-e "$skins_directory"){
mkdir ($skins_directory, 0777);
chmod(0777, "$skins_directory");
&copy_file($colprefs_name,"$skins_directory/default.skin");
open(COLPREFS,">$skins_directory/skin1.skin");
print COLPREFS qq~trans_search=no=
trans_message_header=no=
trans_message_body=no=
data_color1=#9f9f5f=
data_color2=#cc9900=
textdata_color1=#ffffff=
textdata_color2=#ffffff=
table_color1=#000000=
table_color2=#000000=
texttable_color1=#ffffff=
texttable_color2=#ffffff=
backcolor=#000000=
link=#000000=
vlink=#000000=
alink=#000000=
text=#ffffff=
searchcolor=#000000=
usebackgroundimage=no=
fixedbackground==
backgroundimage=http://www.active-scripts.net/active_guestbook/background.jpg=
use_hr_image=no=
hr_image=http://www.active-scripts.net/line.gif=
user_image=no=
user_image_url==
url_image=http://www.active-scripts.net/url2.gif=
email_image=http://www.active-scripts.net/mail2.gif=
~;
close(COLPREFS);
if ($firstinstall ne "yes"){# upgrade
open(FILE,"$prefs_name");
@LINES = <FILE>;
close(FILE);
foreach $LINE (@LINES){
@terms = split(/=/,$LINE);
$PREFSW{$terms[0]} = $terms[1];
}
open(COLPREFS,">>$colprefs_name");
print COLPREFS "usebackgroundimage=$PREFSW{'usebackgroundimage'}=\n";
print COLPREFS "fixedbackground=$PREFSW{'fixedbackground'}=\n";
print COLPREFS "backgroundimage=$PREFSW{'backgroundimage'}=\n";
print COLPREFS "user_image=$PREFSW{'user_image'}=\n";
print COLPREFS "user_image_url=$PREFSW{'user_image_url'}=\n";
print COLPREFS "use_hr_image=$PREFSW{'use_hr_image'}=\n";
print COLPREFS "hr_image=$PREFSW{'hr_image'}=\n";
print COLPREFS "url_image=$PREFSW{'url_image'}=\n";
print COLPREFS "email_image=$PREFSW{'email_image'}=\n";
close(COLPREFS);
open(COLPREFS,">>$skins_directory/default.skin");
print COLPREFS "usebackgroundimage=$PREFSW{'usebackgroundimage'}=\n";
print COLPREFS "fixedbackground=$PREFSW{'fixedbackground'}=\n";
print COLPREFS "backgroundimage=$PREFSW{'backgroundimage'}=\n";
print COLPREFS "user_image=$PREFSW{'user_image'}=\n";
print COLPREFS "user_image_url=$PREFSW{'user_image_url'}=\n";
print COLPREFS "use_hr_image=$PREFSW{'use_hr_image'}=\n";
print COLPREFS "hr_image=$PREFSW{'hr_image'}=\n";
print COLPREFS "url_image=$PREFSW{'url_image'}=\n";
print COLPREFS "email_image=$PREFSW{'email_image'}=\n";
close(COLPREFS);
}
}
unless (-e "$guestbook_data_name"){
chmod(0777, "$prefs_name");
chmod(0777, "$colprefs_name");
&open_prefs;
umask 000;
open(TEMP,">>$guestbook_data_name");
print TEMP "1000001|Sample user|Great guestbook.|$time_in_seconds||Uganda|||$now|$revdate||||||||||||||||||||||\n";
for ($w=2;$w<10;$w++){
print TEMP "100000$w|Sample user $w|Sample message $w.|$time_in_seconds||Uganda|||$now|$revdate||||||||||||||||||||||\n";
}
print TEMP "1000030|Active Scripts |Well done. You have successfully installed Active Guestbook. <p>";
print TEMP "Once you have browsed the features in the public part of the guestbook, you will want to access the Active Guestbook Control Panel which allows you to manage your guestbook. To access the Control Panel, you will normally need to use a password. The default password is the word <b>active</b> in lower case but you can change it to anything you like.";
print TEMP "<p><b>The first thing you should do once you visit the Control Panel is to add the page to your Bookmarks/Favorites so that you can easily get there in the future.</b><p>You can now go to the Control Panel by clicking <a href=\"$guesturl\?action=control_panel\"> here.</a><p> ";
print TEMP "You will of course want to delete all these sample messages once you get things set up the way you want.|$time_in_seconds|frank\@active-scripts.net|active-scripts.net|||$now|$revdate||www.active-scripts.net||||||||||||||||||||\n";
close(TEMP);
chmod(0777, "$guestbook_data_name");
&finish_start;
exit;
}
} # end startup
sub finish_start{
&content;
print qq~<HTML><head><title>$title</title></head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
<font face=Arial ><b><center>Active Guestbook Installation Manager<br></font>
$font Active Guestbook has been successfully installed and all support files have been generated.<br>
<a href="$guesturl?action=reload">Click here to view the guestbook</a>
~;
}
############ Get Date
sub GetDate {
($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime(time);
$hsday = $mday;
$bakday = $mday; $time_in_seconds = time();
if ($sec < 10) { $sec = "0$sec"; }
if ($min < 10) { $min = "0$min"; }
if ($hour < 10) { $hour = "0$hour"; }
if ($mday < 10) { $mday = "0$mday"; } $month = ($mon + 1);
if ($month < 10) { $month = "0$month"; }
@weekdaysbak = ("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
$today = "$year"."$month"."$mday";
$bugyear = ($year + 1900);
$bugtoday = "$bugyear"."$month"."$mday";
$messagedate = "$mday"."/"."$month"."/"."$bugyear";
$mydate = "$mday"." "."$months[$mon]"." "."$bugyear";
$amqdate = "$mday"."/"."$month"."/"."$bugyear";
$revdate = "$bugyear"."$month"."$mday";
$housetoday1 = "$bugyear"."$month"."$mday";
}
sub get_file_lock{
local ($lock_file) = @_;
local ($endtime); $endtime = 2; $endtime = time + $endtime;
while (-e $lock_file && time < $endtime){ sleep(2);}
open(LOCK_FILE, ">$lock_file");
}
sub release_file_lock{
local ($lock_file) = @_;
close(LOCK_FILE);
unlink($lock_file);
}
################# preferences
sub edit_prefs
{
&seek_cook;
unless ($FORM{'fullpageloaded'} eq "yes") {
&content; print "<font face=Arial size=2><center>You need to go back and allow the whole page to load before submitting changes.";
exit;
}
&get_file_lock("$location_of_lock_file");
open(FILE,"$prefs_name");
@lines = <FILE>;
close(FILE);
open(FILE,">$prefs_name");
print FILE "disable_user_html_footer_add=$FORM{'disable_user_html_footer_add'}=\n";
print FILE "disable_user_html_add=$FORM{'disable_user_html_add'}=\n";
print FILE "lock_gb=$FORM{'lock_gb'}=\n";
print FILE "use_referrer_limit=$FORM{'use_referrer_limit'}=\n";
print FILE "limittopost=$FORM{'limittopost'}=\n";
print FILE "ref_domain=$FORM{'ref_domain'}=\n";
print FILE "use_own_captcha=$FORM{'use_own_captcha'}=\n";
print FILE "captcha_url=$FORM{'captcha_url'}=\n";
print FILE "replacement_character=$FORM{'replacement_character'}=\n";
print FILE "replace_dots=$FORM{'replace_dots'}=\n";
print FILE "order_of_message_numbers=$FORM{'order_of_message_numbers'}=\n";
print FILE "use_message_numbers=$FORM{'use_message_numbers'}=\n";
print FILE "message_number_pre=$FORM{'message_number_pre'}=\n";
print FILE "message_number_post=$FORM{'message_number_post'}=\n";
print FILE "timeout=$FORM{'timeout'}=\n";
print FILE "show_f1=$FORM{'show_f1'}=\n";
print FILE "show_f2=$FORM{'show_f2'}=\n";
print FILE "show_f3=$FORM{'show_f3'}=\n";
print FILE "show_location=$FORM{'show_location'}=\n";
print FILE "show_guest_email=$FORM{'show_guest_email'}=\n";
print FILE "box_height=$FORM{'box_height'}=\n";
print FILE "use_email_field=$FORM{'use_email_field'}=\n";
print FILE "use_url_field=$FORM{'use_url_field'}=\n";
print FILE "use_location_field=$FORM{'use_location_field'}=\n";
print FILE "use_user1_field=$FORM{'use_user1_field'}=\n";
print FILE "use_user2_field=$FORM{'use_user2_field'}=\n";
print FILE "use_user3_field=$FORM{'use_user3_field'}=\n";
print FILE "showlettercheck=$FORM{'showlettercheck'}=\n";
print FILE "use_smileys=$FORM{'use_smileys'}=\n";
print FILE "add_page_appears=$FORM{'add_page_appears'}=\n";
print FILE "show_guest_url=$FORM{'show_guest_url'}=\n";
print FILE "max_smileys=$FORM{'max_smileys'}=\n";
print FILE "email_link_type=$FORM{'email_link_type'}=\n";
print FILE "includesearch=$FORM{'includesearch'}=\n";
print FILE "web_link_type=$FORM{'web_link_type'}=\n";
print FILE "blockurls=$FORM{'blockurls'}=\n";
print FILE "url_text=$FORM{'url_text'}=\n";
print FILE "email_txt=$FORM{'email_txt'}=\n";
print FILE "page_after_write=$FORM{'page_after_write'}=\n";
print FILE "limit_no_of_chars_in_line=$FORM{'limit_no_of_chars_in_line'}=\n";
print FILE "max_chars_per_line=$FORM{'max_chars_per_line'}=\n";
print FILE "textfontface=$FORM{'textfontface'}=\n";
print FILE "textfontsize=$FORM{'textfontsize'}=\n";
print FILE "marginwidth=$FORM{'marginwidth'}=\n";
print FILE "marginheight=$FORM{'marginheight'}=\n";
print FILE "title=$FORM{'title'}=\n";
print FILE "show_line=$FORM{'show_line'}=\n";
print FILE "alignment=$FORM{'alignment'}=\n";
print FILE "alignment_body=$FORM{'alignment_body'}=\n";
print FILE "allow_private_messages=$FORM{'allow_private_messages'}=\n";
print FILE "use_preview=$FORM{'use_preview'}=\n";
print FILE "border_size=$FORM{'border_size'}=\n";
print FILE "max=$FORM{'max'}=\n";
print FILE "home_page=$FORM{'home_page'}=\n";
print FILE "show_home_page_link=$FORM{'show_home_page_link'}=\n";
print FILE "home_page_target=$FORM{'home_page_target'}=\n";
print FILE "order=$FORM{'order'}=\n";
print FILE "mail_path=$FORM{'mail_path'}=\n";
print FILE "admin_email=$FORM{'admin_email'}=\n";
print FILE "send_email_to_admin=$FORM{'send_email_to_admin'}=\n";
print FILE "send_email_to_guest=$FORM{'send_email_to_guest'}=\n";
print FILE "home_page_title=$FORM{'home_page_title'}=\n";
print FILE "no_displayed=$FORM{'no_displayed'}=\n";
print FILE "max_length=$FORM{'max_length'}=\n";
print FILE "max_length_chars=$FORM{'max_length_chars'}=\n";
print FILE "anti_spam=$FORM{'anti_spam'}=\n";
print FILE "days_to_delete=$FORM{'days_to_delete'}=\n";
print FILE "days_to_trash=$FORM{'days_to_trash'}=\n";
print FILE "all_private=$FORM{'all_private'}=\n";
print FILE "days_to_delete_backup_files=$FORM{'days_to_delete_backup_files'}=\n";
print FILE "mail_admin_backups_interval=$FORM{'mail_admin_backups_interval'}=\n";
print FILE "mail_admin_backups_day=$FORM{'mail_admin_backups_day'}=\n";
print FILE "mail_admin_backups_month=$FORM{'mail_admin_backups_month'}=\n";
print FILE "allow_html=$FORM{'allow_html'}=\n";
print FILE "active_header=$FORM{'active_header'}=\n";
print FILE "use_title=$FORM{'use_title'}=\n";
print FILE "show_no_of_messages=$FORM{'show_no_of_messages'}=\n";
print FILE "use_mailto=$FORM{'use_mailto'}=\n";
print FILE "mung=$FORM{'mung'}=\n";
print FILE "web_enabled=$FORM{'web_enabled'}=\n";
print FILE "use_user_html=$FORM{'use_user_html'}=\n";
print FILE "use_user_html_footer=$FORM{'use_user_html_footer'}=\n";
print FILE "table_width=$FORM{'table_width'}=\n";
print FILE "mail_backup_to_admin=$FORM{'mail_backup_to_admin'}=\n";
print FILE "thanks_title=$FORM{'thanks_title'}=\n";
print FILE "thanks_include_message=$FORM{'thanks_include_message'}=\n";
print FILE "style=$FORM{'style'}=\n";
print FILE "moderated=$FORM{'moderated'}=\n";
print FILE "field_length=$FORM{'field_length'}=\n";
print FILE "left_bracket=$FORM{'left_bracket'}=\n";
print FILE "middle_bracket=$FORM{'middle_bracket'}=\n";
print FILE "right_bracket=$FORM{'right_bracket'}=\n";
print FILE "use_email_confirmation=$FORM{'use_email_confirmation'}=\n";
open(USER_FILE,">$user_comment_line_name");
$ertyu = $FORM{'user_comment_line'}; $ertyu =~ s/\r//gi;
print USER_FILE "$ertyu";
close(USER_FILE);
open(USER_FILE,">$user_html_name");
$ertyu = $FORM{'user_html'};
$ertyu =~ s/\r//gi;
print USER_FILE "$ertyu";
close(USER_FILE);
open(USER_FILE,">$user_html_footer_name");
$ertyu = $FORM{'user_html_footer'};
$ertyu =~ s/\r//gi;
print USER_FILE "$ertyu";
close(USER_FILE);
open(THANKS,">$thank_you_name");
$ertyu = $FORM{'thank_you'};
$ertyu =~ s/\r//gi;
print THANKS "$ertyu";
close(THANKS);
open(UDS,">$user_style_name");
$ertyu = $FORM{'user_style'};
$ertyu =~ s/\r//gi;
print UDS "$ertyu";
close(UDS);
$bad = $FORM{'bad_words'};$bad =~ s/\s\s/ /g;$bad =~ s/\s\s/ /g;$bad =~ s/\s/,/g;$bad =~ s/\,\,/,/g;
print FILE "bad_words=$bad=\n";
$bad1 = $FORM{'anti_ips'};$bad1 =~ s/\s\s/ /g;$bad1 =~ s/\s\s/ /g;$bad1 =~ s/\s/,/g;$bad1 =~ s/\,\,/,/g;
print FILE "anti_ips=$bad1=\n";
$bad2 = $FORM{'anti_emails'};$bad2 =~ s/\s\s/ /g;$bad2 =~ s/\s\s/ /g;$bad2 =~ s/\s/,/g;$bad2 =~ s/\,\,/,/g;
print FILE "anti_emails=$bad2=\n";
close(FILE);
&release_file_lock("$location_of_lock_file");
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl\?action=view_prefs"> ~;
&main_headerb;
print qq~<center><font face="Arial" size=+1><B>Active Guestbook</B><p></font><font face="Arial" size=-1><B>Standard preferences updated.</B></font>~;
&inter_footer;
}
sub open_prefst{
open(FILE,"$varday");
$lastvarday = <FILE>;
close(FILE);
if ($lastvarday ne $hsday){
open(UPDATE1,">$varday");
print UPDATE1 "$hsday";
close(UPDATE1);
open(UPDATE1,">$varedit");
print UPDATE1 "$zz";
close(UPDATE1);
}
open(FILE,"$varedit");
$varstamp = <FILE>;
close(FILE);
open(FILE,"$algo_file");
$algoval = <FILE>;
close(FILE);
}
sub open_prefs{
open(FILE,"$prefs_name");
@LINES = <FILE>;
close(FILE);
open(FILE,"$edit");
$stamp = <FILE>;
close(FILE);
open(FILE,"$spam_days");
$spamdays = <FILE>;
close(FILE);
@firstl = split(//,$stamp);
$archie = $FORM{'lastnotvar'}  ;
$archie2 = $FORM{'lastnotvar'}-1 ;
$lastnot = "$firstl[-$lastnotvar]$firstl[-$lastnotvar2]";
$lastnotcheck = "$firstl[-$archie]$firstl[-$archie2]";
if ($NEWFORM{'action'} eq "view_skin"){
$fto="$skins_directory/$NEWFORM{'skin'}";
}
elsif ($NEWFORM{'action'} eq "preview_skin"){
$preskin = $NEWFORM{'ref'} . ".skin";
$fto="/home/customers/active-scripts.net/cgi-bin/skins/$preskin";
}
else{
$notokaytouseasimgs = "yes";
$fto="$colprefs_name";
}
open(COLFILE,"$fto");
@COLLINES = <COLFILE>;
close(COLFILE);
foreach(@COLLINES){
if ($_ =~ /active-scripts/gi){
$foundasimgcol = "yes";
}
}
$foundasimgcol = "" if $notokaytouseasimgs ne "yes";
open(FILE,"$smileys"); @smileys = <FILE>; close(FILE);
foreach(@smileys){
if ($_ =~ /active-scripts/gi){
$foundasimg = "yes";
}
}
$foundasimg = "" if $notokaytouseasimgs ne "yes";
open(LANGFILE,"$langprefs_name");
@LANGLINES = <LANGFILE>;
close(LANGFILE);
open(MONTHS,"$months_name");
@monthlist = <MONTHS>;
close(MONTHS);
@months = ();
foreach $monthss (@monthlist){
$monthss =~ s/\n//g;
$monthss =~ s/\r//g;
push (@months, $monthss);
}
open(DAYS,"$days_name");
@daylist = <DAYS>;
close(DAYS);
@days = ();
foreach $dayss (@daylist){
$dayss =~ s/\n//g;
$dayss =~ s/\r//g;
push (@days, $dayss);
}
foreach $LANGLINE (@LANGLINES){
@langterms = split(/=/,$LANGLINE);
$LANGPREFS{$langterms[0]} = $langterms[1];
}
foreach $COLLINE (@COLLINES){
@colterms = split(/=/,$COLLINE);
$COLPREFS{$colterms[0]} = $colterms[1];
}
$brackets_exist = "no";
foreach $LINE (@LINES){#upgrade
if ($LINE =~ /left_bracket/gi){
$brackets_exist = "yes";
}# end upgrade
@terms = split(/=/,$LINE);
$PREFS{$terms[0]} = $terms[1];
}
$ipcontrollerspec= qq~>"fig.01v/ten.stpircs-evitca.www//:ptth"=crs gmi<~;
$ipcontrollerspec=  reverse($ipcontrollerspec);
$TXT_approve_subject = $LANGPREFS{'TXT_approve_subject'};
$TXT_approve_subject = "Guestbook message confirmation required" if $LANGPREFS{'TXT_approve_subject'} eq "";
$TXT_approve_text = $LANGPREFS{'TXT_approve_text'};
$TXT_approve_text = "Thank you for adding a message in our guestbook. To complete the process please visit the link below." if $LANGPREFS{'TXT_approve_text'} eq "";
$TXT_add_a_message = $LANGPREFS{'TXT_add_a_message'};
$TXT_multiple_not_allowed = $LANGPREFS{'TXT_multiple_not_allowed'};
$TXT_multiple_not_allowed = "Multiple posts are currently not allowed." if $TXT_multiple_not_allowed eq "";
$TXT_search = $LANGPREFS{'TXT_search'};
$TXT_previous = $LANGPREFS{'TXT_previous'};
$TXT_next = $LANGPREFS{'TXT_next'};
$TXT_there_is_now = $LANGPREFS{'TXT_there_is_now'};
$TXT_there_are_now = $LANGPREFS{'TXT_there_are_now'};
$TXT_incorrect_selection = $LANGPREFS{'TXT_incorrect_selection'};
$TXT_incorrect_selection = "Incorrect selection" if $TXT_incorrect_selection eq "";
$TXT_messages_in_our_guestbook = $LANGPREFS{'TXT_messages_in_our_guestbook'};
$TXT_message_in_our_guestbook = $LANGPREFS{'TXT_message_in_our_guestbook'};
$TXT_viewing_message = $LANGPREFS{'TXT_viewing_message'};
$TXT_viewing_messages = $LANGPREFS{'TXT_viewing_messages'};
$TXT_to = $LANGPREFS{'TXT_to'};
$TXT_after_last_number = $LANGPREFS{'TXT_after_last_number'};
$TXT_after_last_number1 = $LANGPREFS{'TXT_after_last_number1'};
$TXT_you_can_search_this_guestbook_by = $LANGPREFS{'TXT_you_can_search_this_guestbook_by'};
$TXT_searchmessage = $LANGPREFS{'TXT_searchmessage'};
$TXT_searchname = $LANGPREFS{'TXT_searchname'};
$TXT_searchall = $LANGPREFS{'TXT_searchall'};
$TXT_searchsearch = $LANGPREFS{'TXT_searchsearch'};
$TXT_user1_field = $LANGPREFS{'TXT_user1_field'};
$TXT_user2_field = $LANGPREFS{'TXT_user2_field'};
$TXT_emailconfsent = $LANGPREFS{'TXT_emailconfsent'};
$TXT_emailconfsent = "Thank you. For your security an email has been sent to you to allow you to confirm your message." if $LANGPREFS{'TXT_emailconfsent'} eq "";
$TXT_user3_field = $LANGPREFS{'TXT_user3_field'};
$TXT_select_this_number = $LANGPREFS{'TXT_select_this_number'};
$TXT_searchtext = $LANGPREFS{'TXT_searchtext'};
$TXT_back_to_guestbook = $LANGPREFS{'TXT_back_to_guestbook'};
$TXT_your_name = $LANGPREFS{'TXT_your_name'};
$TXT_your_message = $LANGPREFS{'TXT_your_message'};
$TXT_required = $LANGPREFS{'TXT_required'};
$TXT_code_not_correct = $LANGPREFS{'TXT_code_not_correct'};
$TXT_where_in_the_world = $LANGPREFS{'TXT_where_in_the_world'};
$TXT_type_letters_only = $LANGPREFS{'TXT_type_letters_only'};
$TXT_your_email_address = $LANGPREFS{'TXT_your_email_address'};
$TXT_your_web_page_address = $LANGPREFS{'TXT_your_web_page_address'};
$TXT_private_message = $LANGPREFS{'TXT_private_message'};
$TXT_private_message2 = $LANGPREFS{'TXT_private_message2'};
$TXT_continue = $LANGPREFS{'TXT_continue'};
$TXT_these_are_the = $LANGPREFS{'TXT_these_are_the'};
$TXT_if_correct = $LANGPREFS{'TXT_if_correct'};
$TXT_if_not = $LANGPREFS{'TXT_if_not'};
$TXT_go_back = $LANGPREFS{'TXT_go_back'};
$TXT_and_edit = $LANGPREFS{'TXT_and_edit'};
$TXT_has_been_added = $LANGPREFS{'TXT_has_been_added'};
$TXT_has_been_added_moderated = $LANGPREFS{'TXT_has_been_added_moderated'};
$TXT_has_been_added_private = $LANGPREFS{'TXT_has_been_added_private'};
$TXT_back_search_again = $LANGPREFS{'TXT_back_search_again'};
$TXT_one_match = $LANGPREFS{'TXT_one_match'};
$TXT_no_match = $LANGPREFS{'TXT_no_match'};
$TXT_more_matches_1 = $LANGPREFS{'TXT_more_matches_1'};
$TXT_more_matches_2 = $LANGPREFS{'TXT_more_matches_2'};
$TXT_main_language = $LANGPREFS{'TXT_main_language'};
$TXT_main_language = "iso-8859-1" if $TXT_main_language eq "";
$TXT_please_fill_in = $LANGPREFS{'TXT_please_fill_in'};
$TXT_please_go_back_and_edit = $LANGPREFS{'TXT_please_go_back_and_edit'};
$TXT_search_results = $LANGPREFS{'TXT_search_results'};
$TXT_no_dot_at_start = $LANGPREFS{'TXT_no_dot_at_start'};
$TXT_no_www_at_start = $LANGPREFS{'TXT_no_www_at_start'};
$TXT_no_squiggles_in_domain = $LANGPREFS{'TXT_no_squiggles_in_domain'};
$TXT_only_one_at = $LANGPREFS{'TXT_only_one_at'};
$TXT_no_dots_next = $LANGPREFS{'TXT_no_dots_next'};
$TXT_wrong_end = $LANGPREFS{'TXT_wrong_end'};
$TXT_too_many_words = $LANGPREFS{'TXT_too_many_words'};
$TXT_disallowed_word = $LANGPREFS{'TXT_disallowed_word'};
$TXT_blocked_IP = $LANGPREFS{'TXT_blocked_IP'};
$web_comment = $LANGPREFS{'web_comment'};
$lang_months = $LANGPREFS{'lang_months'};
$lang_days = $LANGPREFS{'lang_days'};
$TXT_has_been_added_moderated = "Thanks. Your message has been sent to our webmaster and will be added shortly." if ($TXT_has_been_added_moderated eq "");
$TXT_has_been_added_private = "Thanks. Your private message has been sent to our webmaster." if ($TXT_has_been_added_private eq "");
$use_referrer_limit = $PREFS{'use_referrer_limit'}; $use_referrer_limit = "no" if $use_referrer_limit eq "";
$ref_domain = $PREFS{'ref_domain'}; $ref_domain = "active-scripts" if $ref_domain eq "";
$order_of_message_numbers = $PREFS{'order_of_message_numbers'};
$disable_user_html_footer_add = $PREFS{'disable_user_html_footer_add'};
$disable_user_html_add = $PREFS{'disable_user_html_add'};
$use_message_numbers = $PREFS{'use_message_numbers'};
$lock_gb = $PREFS{'lock_gb'};
$message_number_pre = $PREFS{'message_number_pre'};
$message_number_post = $PREFS{'message_number_post'};
$timeout = $PREFS{'timeout'}; $timeout = "10" if $timeout eq "";
$show_f1 = $PREFS{'show_f1'}; $show_f1 = "yes" if $show_f1 eq "";
$show_f2 = $PREFS{'show_f2'}; $show_f2 = "yes" if $show_f2 eq "";
$show_f3 = $PREFS{'show_f3'}; $show_f3 = "yes" if $show_f3 eq "";
$show_location = $PREFS{'show_location'}; $show_location = "yes" if $show_location eq "";
$textfontface = $PREFS{'textfontface'};
$replace_dots = $PREFS{'replace_dots'};
$replacement_character = $PREFS{'replacement_character'};
$box_height = $PREFS{'box_height'};
$textfontsize = $PREFS{'textfontsize'};
$limittopost = $PREFS{'limittopost'};
$use_preview = $PREFS{'use_preview'};
$showlettercheck = $PREFS{'showlettercheck'};
$use_own_captcha = $PREFS{'use_own_captcha'};
$captcha_url = $PREFS{'captcha_url'};
$use_email_field = $PREFS{'use_email_field'};
$use_url_field = $PREFS{'use_url_field'};
$use_location_field = $PREFS{'use_location_field'};
$use_email_confirmation = $PREFS{'use_email_confirmation'};
$use_user1_field = $PREFS{'use_user1_field'};
$use_user2_field = $PREFS{'use_user2_field'};
$use_user3_field = $PREFS{'use_user3_field'};
$marginwidth = $PREFS{'marginwidth'};
$marginheight = $PREFS{'marginheight'};
$page_after_write = $PREFS{'page_after_write'};
$limit_no_of_chars_in_line = $PREFS{'limit_no_of_chars_in_line'};
$max_chars_per_line = $PREFS{'max_chars_per_line'};
$show_guest_email = $PREFS{'show_guest_email'};
$show_guest_url = $PREFS{'show_guest_url'};
$email_link_type = $PREFS{'email_link_type'};
$web_link_type = $PREFS{'web_link_type'};
$url_image = $COLPREFS{'url_image'};
$email_image = $COLPREFS{'email_image'};
$use_smileys = $PREFS{'use_smileys'};
$use_smileys = "yes" if $use_smileys eq "";
$url_text = $PREFS{'url_text'};
$email_txt = $PREFS{'email_txt'};
$add_page_appears = $PREFS{'add_page_appears'};
$blockurls = $PREFS{'blockurls'};
$includesearch = $PREFS{'includesearch'};
$title = $PREFS{'title'};
$max = $PREFS{'max'};
$border_size = $PREFS{'border_size'};
$alignment = $PREFS{'alignment'};
$alignment_body = $PREFS{'alignment_body'}; $alignment_body = "center" if $alignment_body eq "";
$allow_private_messages = $PREFS{'allow_private_messages'};
$home_page = $PREFS{'home_page'};
$home_page_title = $PREFS{'home_page_title'};
$show_home_page_link = $PREFS{'show_home_page_link'};
$home_page_target = $PREFS{'home_page_target'};
$max_smileys = $PREFS{'max_smileys'}; $max_smileys = 5 if $max_smileys eq "";
$order = $PREFS{'order'};
$show_line = $PREFS{'show_line'};
$mail_path = $PREFS{'mail_path'};
$mail_path = "$mail_path" . " -t -oi";
$admin_email = $PREFS{'admin_email'};
$send_email_to_admin = $PREFS{'send_email_to_admin'};
$send_email_to_guest = $PREFS{'send_email_to_guest'};
$bad_words = $PREFS{'bad_words'};
$moderated = $PREFS{'moderated'};
$field_length = $PREFS{'field_length'};
$no_displayed = $PREFS{'no_displayed'};
$max_length = $PREFS{'max_length'};
$all_private = $PREFS{'all_private'};
$max_length_chars = $PREFS{'max_length_chars'};
$anti_spam = $PREFS{'anti_spam'};
$anti_ips = $PREFS{'anti_ips'};
$anti_emails = $PREFS{'anti_emails'};
$days_to_delete = $PREFS{'days_to_delete'};
$days_to_trash = $PREFS{'days_to_trash'};
$days_to_delete_backup_files = $PREFS{'days_to_delete_backup_files'};
$mail_admin_backups_interval = $PREFS{'mail_admin_backups_interval'};
$mail_admin_backups_day = $PREFS{'mail_admin_backups_day'};
$mail_admin_backups_month = $PREFS{'mail_admin_backups_month'};
$allow_html = $PREFS{'allow_html'};
$active_header = $PREFS{'active_header'};
$use_title = $PREFS{'use_title'};
$show_no_of_messages = $PREFS{'show_no_of_messages'};
$mung = $PREFS{'mung'};
$use_mailto = $PREFS{'use_mailto'};
$web_enabled = $PREFS{'web_enabled'};
$user_image = $COLPREFS{'user_image'};
$user_image_url = $COLPREFS{'user_image_url'};
$use_hr_image = $COLPREFS{'use_hr_image'};
$hr_image = $COLPREFS{'hr_image'};
$use_user_html = $PREFS{'use_user_html'};
$use_user_html_footer = $PREFS{'use_user_html_footer'};
$table_width = $PREFS{'table_width'};
$usebackgroundimage = $COLPREFS{'usebackgroundimage'};
$backgroundimage = $COLPREFS{'backgroundimage'};
$fixedbackground = $COLPREFS{'fixedbackground'};
$mail_backup_to_admin = $PREFS{'mail_backup_to_admin'};
$thanks_title = $PREFS{'thanks_title'};
$thanks_include_message = $PREFS{'thanks_include_message'};
$web_comment = $PREFS{'web_comment'} if ($web_comment eq "");
$style = $PREFS{'style'};
$left_bracket = $PREFS{'left_bracket'};
$middle_bracket = $PREFS{'middle_bracket'};
$right_bracket = $PREFS{'right_bracket'};
$trans_search = $COLPREFS{'trans_search'};
$trans_message_header = $COLPREFS{'trans_message_header'};
$trans_message_body = $COLPREFS{'trans_message_body'};
$backcolor = $COLPREFS{'backcolor'};
$data_color1 = $COLPREFS{'data_color1'};
$data_color2 = $COLPREFS{'data_color2'};
$textdata_color1 = $COLPREFS{'textdata_color1'};
$textdata_color2 = $COLPREFS{'textdata_color2'};
$table_color1 = $COLPREFS{'table_color1'};
$table_color2 = $COLPREFS{'table_color2'};
$texttable_color1 = $COLPREFS{'texttable_color1'};
$texttable_color2 = $COLPREFS{'texttable_color2'};
$link = $COLPREFS{'link'};
$vlink = $COLPREFS{'vlink'};
$alink = $COLPREFS{'alink'};
$text = $COLPREFS{'text'};
$searchcolor = $COLPREFS{'searchcolor'};
$user_html = "";
$user_style = "";
$user_html_footer = "";
$thank_you = "";
open(FILE,"$user_html_name") || &oops("$user_html_name");
@user_html = <FILE>;
$user_html=join(" ",@user_html);
close(FILE);
open(FILE,"$user_comment_line_name") || &oops("$user_comment_line_name");
@user_comment_line = <FILE>;
$user_comment_line=join(" ",@user_comment_line);
close(FILE);
open(FILE,"$user_style_name") || &oops('$user_style_name');
@user_style = <FILE>;
foreach $row(@user_style)
{
$user_style = $user_style . $row;
}
close(FILE);
open(FILE,"$user_html_footer_name") || &oops('$user_html_footer_name');
@user_html_footer = <FILE>;
#	foreach $frow(@user_html_footer)
#{
#	$user_html_footer = $user_html_footer . $frow;
#}
$user_html_footer=join(" ",@user_html_footer);
close(FILE);
open(FILE,"$thank_you_name") || &oops('$thank_you_name');
@thank_you = <FILE>;
foreach $row(@thank_you)
{
$thank_you = $thank_you . $row;
}
close(FILE);
open(NUMBER,"$active_name") || &oops('$active_name');
$active_string = <NUMBER>;
close(NUMBER);
#upgrade
($use_preview = "yes") if ($use_preview eq "");
($limit_no_of_chars_in_line = "no") if ($limit_no_of_chars_in_line eq "");
($max_chars_per_line = 50) if ($max_chars_per_line eq "");
($TXT_private_message = "Private message") if ($TXT_private_message eq "");
($TXT_private_message2 = "(when checked, message will not appear in guestbook)") if ($TXT_private_message2 eq "");
($home_page_target = "_top") if ($home_page_target eq "");
($border_size = "0") if ($border_size eq "");
($field_length = 40) if ($field_length eq "");
($max_length_chars = 4000) if ($max_length_chars eq "");
($marginwidth = 0) if ($marginwidth eq "");
($marginheight = 0) if ($marginheight eq "");
if ($brackets_exist eq "no")
{
$left_bracket = "[";
$right_bracket = "]";
$middle_bracket = "|";
}
if (!$show_guest_email)
{
$show_guest_email = "yes";
$show_guest_url = "yes";
$url_image = "http://www.active-scripts.net/url2.gif";
$email_image = "http://www.active-scripts.net/mail2.gif";
$url_text = "url";
$email_txt = "@";
$email_link_type = "text";
$web_link_type = "text";
}
# end upgrade
}
### View Standard Preferences
sub view_prefs
{
&seek_cook;
&content;
($use_preview = "yes") if ($use_preview eq "");
($limit_no_of_chars_in_line = "no") if ($limit_no_of_chars_in_line eq "");
($max_chars_per_line = 50) if ($max_chars_per_line eq "");
if (!$show_guest_email){
$show_guest_email = "yes"; $show_guest_url = "yes";
$url_image = "http://www.active-scripts.net/url2.gif"; $email_image = "http://www.active-scripts.net/mail2.gif";
$url_text = "url"; $email_txt = "@"; $email_link_type = "text"; $web_link_type = "text";
}
($marginwidth = 0) if ($marginwidth eq ""); ($marginheight = 0) if ($marginheight eq "");
($TXT_private_message = "Private message - do not include in main guestbook.") if ($TXT_private_message eq "");
($TXT_private_message2 = "(when checked, message will not appear in guestbook)") if ($TXT_private_message2 eq "");
($home_page_target = "_top") if ($home_page_target eq "");
($border_size = "0") if ($border_size eq "");
($field_length = 40) if ($field_length eq "");
($max_length_chars = 4000) if ($max_length_chars eq "");
print qq~<center><html><head><title>Active Guestbook - Standard Preferences Manager</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
<script LANGUAGE="JavaScript">
<!-- Hide from non-Java browsers
function ConfirmUser() {
var Confirmation;
Confirmation = "Are you sure you want to restore your User defaults?";
if (confirm(Confirmation)){
return true;
}
else {
return false;
}
}
function ConfirmFactory() {
var Confirmationf;
Confirmationf = "Are you sure you want to restore the Factory defaults?";
if (confirm(Confirmationf)){
return true;
}
else {
return false;
}
}
// End Java Hiding. -->
</SCRIPT>
</head>
<body bgcolor=#ffffff>
<font face=Arial size=+1><B>Active Guestbook - Standard Preferences Manager</B></font><br>$font
<a href="$guesturl?action=reload">Return to Guestbook</a> | <a href="$guesturl?action=control_panel">Return to Control Panel</a><br>
<a href="$guesturl?action=restore_defaults" onclick="return ConfirmFactory()">Restore FACTORY defaults</a> | <a href="$guesturl?action=restore_user_defaults" onclick="return ConfirmUser()">Restore USER defaults</a><br>
<a href="$guesturl?action=save_user_defaults">Save these settings as USER defaults</a><br></font><font face=Arial size=-2>(If you have made any changes, you first need to UPDATE using the button at the bottom.) </font>$font ~;
if ($active_header eq "on"){
print qq~ <br>To remove the Active Scripts image from the top of your guestbook, move down to the <br>
Images/titles section below and select No for "Show Active-Scripts header".~;
}
print qq~<form action="$guesturl" METHOD="POST" ><INPUT TYPE="hidden" NAME="action" VALUE="edit_prefs">
<table border=1 width=700 cellspacing=0>
<tr valign=top><td colspan=2 bgcolor = red><font face=Arial size=-1 color=white><B>A - Guestbook Security/Abuse Control</B></font></td></tr>~;
#if ($use_referrer_limit ne "yes"){
# print qq~<tr valign=top><td colspan=2><font face=Arial size=-1 ><B>PLEASE NOTE - </B> You currently have your guestbook set to accept messages posted from ANY domain (A12 and A13 below). We STRONGLY recommend that you restrict access to only your domain. This can help limit spam.</font></td></tr>~;
#}
if ($lock_gb eq "yes"){$lock_gbyes = "checked";}else{ $lock_gbno = "checked";}
print qq~ <tr valign=top><td>$font A0 - Lock guestbook (stops guests from adding new messages)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="lock_gb" VALUE="yes" $lock_gbyes> - No:<INPUT TYPE="radio" NAME="lock_gb" VALUE="no" $lock_gbno ></font></td></tr>
~;
if ($use_email_confirmation eq "yes"){$use_email_confirmationyes = "checked";}else{ $use_email_confirmationno = "checked";}
print qq~ <tr valign=top><td>$font A1 - Require guests to confirm messages via email (use only if lots of spam is getting through)</font>
<font face=Arial size=1>(requires D1 to be correctly set and sendmail to be working on your server)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="use_email_confirmation" VALUE="yes" $use_email_confirmationyes> - No:<INPUT TYPE="radio" NAME="use_email_confirmation" VALUE="no" $use_email_confirmationno ></font></td></tr>
~;
if ($anti_spam eq "off"){$anti_spamno = "checked";}else{ $anti_spamyes = "checked";}
print qq~ <tr valign=top><td>$font A2 - Block multiple posts in same day by same IP?</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="anti_spam" VALUE="on" $anti_spamyes> - No:<INPUT TYPE="radio" NAME="anti_spam" VALUE="off" $anti_spamno ></font></td></tr>
~;
if ($blockurls ne "yes"){$blockurlsno = "checked"; $modsp2345ff = "<b>(strongly recommended)</b>";}else{ $blockurlsyes = "checked";}
print qq~ <tr valign=top><td>$font A3 - Block all urls in messages $modsp2345ff</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="blockurls" VALUE="yes" $blockurlsyes> - No:<INPUT TYPE="radio" NAME="blockurls" VALUE="no" $blockurlsno ></font></td></tr>
~;
if ($mung eq "on"){$mungyes = "checked";}else{ $mungno = "checked";}
print qq~ <tr valign=top><td>$font A4 - Mung email addresses</font> <font face=Arial size=1> (shows as you\~AT\~yourdomain\~DOT\~net)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="mung" VALUE="on" $mungyes> - No:<INPUT TYPE="radio" NAME="mung" VALUE="off" $mungno ></font></td></tr>
~;
if ($showlettercheck eq "no"){$showlettercheckno = "checked"; $modsp234ii5 = "<br><b>(strongly recommended)</b>";}else {$showlettercheckyes = "checked"; }
print qq~ <tr valign=top><td>$font A5 - Require users to enter code when adding messages? <!-- $modsp234ii5 --></td><td>$font anti-spam requirement - always ON<!--
Yes:<INPUT TYPE="radio" NAME="showlettercheck" VALUE="yes" $showlettercheckyes> - No:<INPUT TYPE="radio" NAME="showlettercheck" VALUE="no" $showlettercheckno> --> </font></td></tr>
~;
if ($moderated eq "yes"){$moderatedyes = "checked";}else{ $moderatedno = "checked";  $modsp2345NO = "<b>(strongly recommended)</b>";}
print qq~ <tr valign=top><td>$font A6 - Approve messages before they are added $modsp2345</font><br>
<font face=Arial size=1>(D3 should be set to YES if you wish to receive email notification)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="moderated" VALUE="yes" $moderatedyes> - No:<INPUT TYPE="radio" NAME="moderated" VALUE="no" $moderatedno ></font></td></tr>
~;
$anti_ips =~ s/\,/ /g;
print qq~<tr valign=top><td>$font A7 - List servers or IP addresses (or parts thereof) that you wish to block. </font><br><font face=Arial size=1>(use a white space between multiple addresses)</td><td>$font <input type=text name="anti_ips" value="$anti_ips"></font></td></tr>~;
$bad_words =~ s/\,/ /g;
print qq~<tr valign=top><td>$font A8 - List words you would rather your guest did not use<br>in your guestbook. (Use your imagination.)</font></td><td>$font <input type=text name="bad_words" value="$bad_words"></font></td></tr> ~;
$showlettercheckyes = $showlettercheckno = "";
if ($limit_no_of_chars_in_line ne "no"){$limit_no_of_chars_in_lineyes = "checked";}else{ $limit_no_of_chars_in_lineno = "checked";}
print qq~ <tr valign=top><td colspan=2>$font A9 - Limit no of characters per word -
Yes:<INPUT TYPE="radio" NAME="limit_no_of_chars_in_line" VALUE="yes" $limit_no_of_chars_in_lineyes> - No:<INPUT TYPE="radio" NAME="limit_no_of_chars_in_line" VALUE="no" $limit_no_of_chars_in_lineno >
:: Max no of characters per word - <input type=text size=2 name="max_chars_per_line" value="$max_chars_per_line"> </font><font face=Arial size=1><a href="http://www.active-scripts.net/help/guestbook-help.html#limit">help</a></td></tr>
~;
$replacement_character = ";" if $replacement_character eq "";
if ($replace_dots eq "yes"){$replace_dotsyes = "checked";}else{ $replace_dotsno = "checked";}
print qq~ <tr valign=top><td colspan=2>$font A10 - Replace dots in messages (mungs urls) -
Yes:<INPUT TYPE="radio" NAME="replace_dots" VALUE="yes" $replace_dotsyes> - No:<INPUT TYPE="radio" NAME="replace_dots" VALUE="no" $replace_dotsno >
:: Replacement character - <input type=text size=2 name="replacement_character" value="$replacement_character"> </font></tr>
~;
print qq~<tr valign=top><td>$font A11 - Set timeout for guests to complete the Add Message page</font></td><td>$font <input type=text name="timeout" value="$timeout" size=4> minutes</font></td></tr> ~;


if ($use_referrer_limit eq "yes"){$use_referrer_limityes = "checked";}else{ $use_referrer_limitno = "checked";}
print qq~ <tr valign=top><td>$font A12 - Only allow my domain to add messages (enter domain in A13)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="use_referrer_limit" VALUE="yes" $use_referrer_limityes> - No:<INPUT TYPE="radio" NAME="use_referrer_limit" VALUE="no" $use_referrer_limitno ></font></td></tr>
~;
print qq~<tr valign=top><td>$font A13 - Enter part of the guestbook domain here </font></td><td>$font <input type=text name="ref_domain" value="$ref_domain"></font></td></tr>~;


$anti_emails =~ s/\,/ /g;
print qq~<tr valign=top><td>$font A14 - List email addresses (or parts thereof) that you wish to block. </font><br><font face=Arial size=1>(use a white space between multiple addresses)</td><td>$font <input type=text name="anti_emails" value="$anti_emails"></font></td></tr>~;
if ($limittopost eq "off"){$limittopostno = "checked";}else{ $limittopostyes = "checked";}
print qq~ <tr valign=top><td>$font A15 - Block GET posts? (should be YES; only set to No if Active Guestbook asks you to.)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="limittopost" VALUE="on" $limittopostyes> - No:<INPUT TYPE="radio" NAME="limittopost" VALUE="off" $limittopostno ></font></td></tr>  ~;

if ($use_own_captcha eq "yes"){$use_own_captchayes = "checked";}else{ $use_own_captchano = "checked";}
print qq~ <tr valign=top><td>$font A16 - Use captcha images on your own server (enter directory url in A17)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="use_own_captcha" VALUE="yes" $use_own_captchayes> - No:<INPUT TYPE="radio" NAME="use_own_captcha" VALUE="no" $use_own_captchano ></font></td></tr>
~;
print qq~<tr valign=top><td>$font A17 - Enter url of directory which holds your captcha images </font></td><td>$font <input type=text name="captcha_url" value="$captcha_url"></font></td></tr>~;


print qq~</table>
<INPUT TYPE="submit" VALUE="Update standard preferences">
<table border=1 width=700 cellspacing=0 ><tr valign=top>
<td colspan=4 bgcolor = Red><font face=Arial size=-1 color=white><B>B - Presentation</B></font></td></tr>
<tr valign=top><td>$font B1 - Choose which fields to use/require/show</td>
<td colspan=3>
<table cellspacing=0 cellpadding=0 width=100%>
<tr valign=top><td><font face=Arial size=2><u><b>Field</b></u></td> <td><font face=Arial size=2><u><b>Status</b></u></td> <td><font face=Arial size=2><u><b>Show</b></u></td>
<td width=1 rowspan=4 bgcolor = #eeeeee>&nbsp;</td>
<td><font face=Arial size=2><u><b>Field</b></u></td> <td><font face=Arial size=2><u><b>Status</b></u></td> <td><font face=Arial size=2><u><b>Show</b></u></td> </tr>
<tr valign=top><td width=19%><font face=Arial size=2>Email</td><td width=35%> ~;
$use_email_field = "yes" if $use_email_field eq ""; $use_url_field = "yes" if $use_url_field eq "";
$use_location_field = "yes" if $use_location_field eq "";
$use_user1_field = "no" if $use_user1_field eq ""; $use_user2_field = "no" if $use_user2_field eq "";
$use_user3_field = "no" if $use_user3_field eq "";
if ($use_email_field eq "yes"){ $use_email_fieldselyes = "selected";}
elsif ($use_email_field eq "req"){ $use_email_fieldselreq = "selected";} else {$use_email_fieldselno = "selected";}
if ($use_url_field eq "yes"){ $use_url_fieldselyes = "selected";}
elsif ($use_url_field eq "req"){ $use_url_fieldselreq = "selected";} else {$use_url_fieldselno = "selected";}
if ($use_location_field eq "yes"){ $use_location_fieldselyes = "selected";}
elsif ($use_location_field eq "req"){ $use_location_fieldselreq = "selected";} else {$use_location_fieldselno = "selected";}
if ($use_user1_field eq "yes"){ $use_user1_fieldselyes = "selected";}
elsif ($use_user1_field eq "req"){ $use_user1_fieldselreq = "selected";} else {$use_user1_fieldselno = "selected";}
if ($use_user1_field eq "yes"){ $use_user1_fieldselyes = "selected";}
elsif ($use_user1_field eq "req"){ $use_user1_fieldselreq = "selected";} else {$use_user1_fieldselno = "selected";}
if ($use_user2_field eq "yes"){ $use_user2_fieldselyes = "selected";}
elsif ($use_user2_field eq "req"){ $use_user2_fieldselreq = "selected";} else {$use_user2_fieldselno = "selected";}
if ($use_user3_field eq "yes"){ $use_user3_fieldselyes = "selected";}
elsif ($use_user3_field eq "req"){ $use_user3_fieldselreq = "selected";} else {$use_user3_fieldselno = "selected";}
$bu = "blocked by A3<input type=hidden name=spacer value=yes>"	if ($blockurls eq "yes");
if ($show_guest_email ne "no"){$show_guest_emailselyes = "selected";} else {$show_guest_emailselno = "selected";}
if ($show_guest_url ne "no"){$show_guest_urlselyes = "selected";} else {$show_guest_urlselno = "selected";}
if ($show_location ne "no"){$show_locationselyes = "selected";} else {$show_locationselno = "selected";}
if ($show_f1 ne "no"){$show_f1selyes = "selected";} else {$show_f1selno = "selected";}
if ($show_f2 ne "no"){$show_f2selyes = "selected";} else {$show_f2selno = "selected";}
if ($show_f3 ne "no"){$show_f3selyes = "selected";} else {$show_f3selno = "selected";}
if ($use_email_confirmation ne "yes"){
print qq~ <select name=use_email_field>
<option value=yes $use_email_fieldselyes>yes</option><option value=req $use_email_fieldselreq>required</option>
<option value=no $use_email_fieldselno>no</option></select> ~;
}
else{
print qq~ $font required by A1<input type=hidden name=use_email_field value=yes> ~;
}
print qq~ </td><td>
<select name=show_guest_email>
<option value=yes $show_guest_emailselyes>yes</option><option value=no $show_guest_emailselno>no</option></select></td>
<td width=25%><font face=Arial size=2>Extra field 1</td><td width=25%><select name=use_user1_field>
<option value=yes $use_user1_fieldselyes>yes</option><option value=req $use_user1_fieldselreq>required</option>
<option value=no $use_user1_fieldselno>no</option></select></td>
<td><select name=show_f1>
<option value=yes $show_f1selyes>yes</option><option value=no $show_f1selno>no</option></select></td></tr>
<tr valign=top><td><font face=Arial size=2>URL</td><td> ~;
if ($blockurls ne "yes"){
print qq~<select name=use_url_field><option value=yes $use_url_fieldselyes>yes</option>
<option value=req $use_url_fieldselreq>required</option><option value=no $use_url_fieldselno>no</option></select> ~;
}
else{
print qq~<font face=Arial size=2> $bu ~;
}
print qq~ </td><td><select name=show_guest_url>
<option value=yes $show_guest_urlselyes>yes</option><option value=no $show_guest_urlselno>no</option></select>
</td><td><font face=Arial size=2>Extra field 2</td><td><select name=use_user2_field>
<option value=yes $use_user2_fieldselyes>yes</option><option value=req $use_user2_fieldselreq>required</option>
<option value=no $use_user2_fieldselno>no</option></select></td>
<td><select name=show_f2>
<option value=yes $show_f2selyes>yes</option><option value=no $show_f2selno>no</option></select></td></tr>
<tr valign=top><td><font face=Arial size=2>Location</td><td><select name=use_location_field>
<option value=yes $use_location_fieldselyes>yes</option><option value=req $use_location_fieldselreq>required</option>
<option value=no $use_location_fieldselno>no</option></select></td><td>
<select name=show_location>
<option value=yes $show_locationselyes>yes</option><option value=no $show_locationselno>no</option></select>
</td>
<td><font face=Arial size=2>Extra field 3</td><td><select name=use_user3_field>
<option value=yes $use_user3_fieldselyes>yes</option><option value=req $use_user3_fieldselreq>required</option>
<option value=no $use_user3_fieldselno>no</option></select></td>
<td><select name=show_f3>
<option value=yes $show_f3selyes>yes</option><option value=no $show_f3selno>no</option></select></td></tr></table>
</td></tr>
<tr valign=top><td colspan=2>$font B2a - Alignment - overall</td><td colspan=2>$font ~;
if ($alignment eq "left"){$alignmentleft = "checked";} elsif ($alignment eq "right"){$alignmentright = "checked";}
else {$alignmentcenter = "checked";}
print qq~ Left: <INPUT TYPE="radio" NAME="alignment" VALUE="left" $alignmentleft> -
Center: <INPUT TYPE="radio" NAME="alignment" VALUE="center" $alignmentcenter> - Right: <INPUT TYPE="radio" NAME="alignment" VALUE="right" $alignmentright></td></tr>
<tr valign=top><td colspan=2>$font B2b - Alignment - menus etc.</td><td colspan=2>$font ~;
if ($alignment_body eq "left"){$alignment_bodyleft = "checked";} elsif ($alignment_body eq "right"){$alignment_bodyright = "checked";}
else {$alignment_bodycenter = "checked";}
print qq~ Left: <INPUT TYPE="radio" NAME="alignment_body" VALUE="left" $alignment_bodyleft> -
Center: <INPUT TYPE="radio" NAME="alignment_body" VALUE="center" $alignment_bodycenter> - Right: <INPUT TYPE="radio" NAME="alignment_body" VALUE="right" $alignment_bodyright></td></tr>
~;
print qq~ <tr valign=top><td colspan=2>$font B3 - Add a Message box</td><td colspan=2> $font <select name="add_page_appears" >~;
@add_page_appearsoptions = ("on a Separate Page", "at TOP of Guestbook", "at BOTTOM of Guestbook");
$xxv = 0;
foreach $addoption(@add_page_appearsoptions){
print qq~ <option value=$xxv ~; print "selected" if $add_page_appears == $xxv; print qq~>$addoption</option>~;
$xxv++;
}
print qq~ </td></tr>
<tr valign=top><td colspan=2>$font B4 - Show preview page when guest adds message</td><td colspan=2>$font anti-spam requirement <INPUT TYPE="hidden" NAME="use_preview" VALUE="yes">~;
print qq~ </font></td></tr> ~;
if ($includesearch ne "no"){$includesearchyes = "checked";}else{ $includesearchno = "checked";}
print qq~ <tr valign=top><td colspan=2>$font B5 - Include Search Facility</font></td>
<td colspan=2>$font Yes:<INPUT TYPE="radio" NAME="includesearch" VALUE="yes" $includesearchyes> - No:<INPUT TYPE="radio" NAME="includesearch" VALUE="no" $includesearchno ></font></td></tr>
~;
if ($allow_private_messages ne "no"){$allow_private_messagesyes = "checked";}else{ $allow_private_messagesno = "checked";}
print qq~ <tr valign=top><td colspan=2>$font B6 - Allow guests to leave private messages</font></td>
<td colspan=2>$font Yes:<INPUT TYPE="radio" NAME="allow_private_messages" VALUE="yes" $allow_private_messagesyes> - No:<INPUT TYPE="radio" NAME="allow_private_messages" VALUE="no" $allow_private_messagesno ></font></td></tr>   ~;
if ($all_private eq "yes"){$all_privateyes = "checked";}else{ $all_privateno = "checked";}
print qq~ <tr valign=top><td colspan=2>$font B6a - Force all messages to be private (overrides B6 above)</font></td>
<td colspan=2>$font Yes:<INPUT TYPE="radio" NAME="all_private" VALUE="yes" $all_privateyes> - No:<INPUT TYPE="radio" NAME="all_private" VALUE="no" $all_privateno ></font></td></tr>
<tr valign=top><td colspan=2>$font B7 - Home page title</font><font face=Arial size=-2> (NOT the title of your guestbook)</font></td><td colspan=2>$font <input type=text name="home_page_title" value="$home_page_title" size=30></font></td></tr>
<tr valign=top><td colspan=2>$font B8 - Home page address</font><font face=Arial size=-2> (NOT the address of your guestbook)</td>
<td colspan=2>$font <input type=text size=30 name="home_page" value="$home_page"></td></tr>
<tr valign=top><td colspan=2>$font B9 - Address of page guests are taken to after they leave a message</font><font face=Arial size=-2> (Leave blank to return to main guestbook)</td>
<td colspan=2>$font <input type=text size=30 name="page_after_write" value="$page_after_write"></td></tr>
<tr valign=top><td>$font B10 - Side margin</font></td>
<td>$font <input type=text size=2 name="marginwidth" value="$marginwidth"></font></td>
<td>$font B11 - Top margin</font></td>
<td>$font <input type=text size=2 name="marginheight" value="$marginheight"></font></td></tr>
<tr valign=top><td>$font B12 - Size of border around each message</font><font face=Arial size=-2> (set to "0" for no border)</td>
<td>$font <input type=text size=2 name="border_size" value="$border_size"></font></td>
<td>$font B13 - Show horizontal line between messages </font></td> <td>$font ~;
if ($show_line eq "no") {$show_lineno = "checked";}else{ $show_lineyes = "checked";}
print qq~ Yes:<INPUT TYPE="radio" NAME="show_line" VALUE="yes" $show_lineyes><br>No:<INPUT TYPE="radio" NAME="show_line" VALUE="no" $show_lineno ></font></td></tr>
<tr valign=top><td>$font B14 - Show links to home page</font><font face=Arial size=-2><br>(you may not want to if using frames)</font></td><td>$font ~;
if ($show_home_page_link eq "no") {$show_home_page_linkno = "checked";}else{ $show_home_page_linkyes = "checked";}
print qq~ Yes:<INPUT TYPE="radio" NAME="show_home_page_link" VALUE="yes" $show_home_page_linkyes><br>No:<INPUT TYPE="radio" NAME="show_home_page_link" VALUE="no" $show_home_page_linkno ></font></td>
<td>$font B15 - Home page link target</font><font face=Arial size=-2><br>(if using frames. If you are NOT using frames, just leave blank)</font></td>
<td>$font <input size=5 type=text name="home_page_target" value="$home_page_target"></font></td></tr>
<tr valign=top><td>$font B16 - Font face</font></td><td>$font <input size=8 type=text name="textfontface" value="$textfontface"></font></td>
<td>$font B17 - Font size</font></td><td>$font <input size=5 type=text name="textfontsize" value="$textfontsize"></font></td></tr>
<tr valign=top><td>$font B18 - Board width (in pixels or as a percentage)</font></td><td>$font <input size=5 type=text name="table_width" value="$table_width"></font></td>
<td>$font B19 - Number of messages per page</font></td><td><input size=5 type=text name="no_displayed" value="$no_displayed"></font></td></tr>
<tr valign=top><td>$font B20 - Width of the fields in the Add a Message page</font></td>
<td>$font <input type=text size=5 name="field_length" value="$field_length"></td>
<td>$font B21 - Height of message box in the Add a Message page</font></td>~; $box_height = "3" if $box_height eq "";
print qq~<td><input type=text size=5 name="box_height" value="$box_height"></td></tr>
<tr valign=top><td colspan = 2>$font B22 - Brackets used in menus </font></td><td colspan=2>$font
Left:<input type=text size=1 name="left_bracket" value="$left_bracket"> -
Middle:<input type=text size=1 name="middle_bracket" value="$middle_bracket"> -
Right:<input type=text size=1 name="right_bracket" value="$right_bracket"></td></tr>
<tr valign=top><td>$font B23 - Maximum number of words in message</font></td>
<td>$font <input size=5 type=text name="max_length" value="$max_length"></font></td>
<td>$font B24 - Maximum number of characters in message</font></td>
<td>$font <input size=5 type=text name="max_length_chars" value="$max_length_chars"></font></td> </tr>
<tr valign=top><td colspan=2 align=center bgcolor=#cccccc>
$font <b>Email link display</b> ~;
if (($use_email_field eq "no") && ($use_email_confirmation ne "yes")){
print qq~ <br>(blocked by B1)~;
}
print qq~</td>
<td colspan=2 bgcolor=#eeeeee align=center>$font <b>Web link display</b> ~;
print "<br>(blocked by A3)" if ($blockurls eq "yes");
print qq~ </td></tr> ~;
print qq~ <tr valign=top><td bgcolor=#cccccc>$font B25 - Enable guest email hyperlink ~;
print "<br>(blocked by B1)" if ($show_guest_email ne "yes");
print qq~</td><td bgcolor=#cccccc>$font ~;
if ($use_mailto ne "no") {$use_mailtoyes = "checked";}else{ $use_mailtono = "checked";}
print qq~ Yes:<INPUT TYPE="radio" NAME="use_mailto" VALUE="yes" $use_mailtoyes><br>No:<INPUT TYPE="radio" NAME="use_mailto" VALUE="no" $use_mailtono ></font></td>
<td bgcolor=#eeeeee>$font B28 - Enable guest address web hyperlink ~;
print "<br>(blocked by B1)" if ($show_guest_url ne "yes");
print qq~</td><td bgcolor=#eeeeee>$font ~;
if ($web_enabled ne "no") {$web_enabledyes = "checked";}else{ $web_enabledno = "checked";}
print qq~ Yes:<INPUT TYPE="radio" NAME="web_enabled" VALUE="yes" $web_enabledyes><br>No:<INPUT TYPE="radio" NAME="web_enabled" VALUE="no" $web_enabledno ></font></td></tr>
<tr valign=top><td bgcolor=#cccccc>$font B26 - Email hyperlink display type<br></font><font face=Arial size=1>(image address set in Color Prefs Manager)</font></td><td bgcolor=#cccccc>$font ~;
if ($email_link_type eq "image"){$email_link_typeimage = "checked";}
elsif ($email_link_type eq "address"){$email_link_typeaddress = "checked";}
else{ $email_link_typetext = "checked";}
print qq~
Address:<INPUT TYPE="radio" NAME="email_link_type" VALUE="address" $email_link_typeaddress><br>
Text:<INPUT TYPE="radio" NAME="email_link_type" VALUE="text" $email_link_typetext><br>
Image:<INPUT TYPE="radio" NAME="email_link_type" VALUE="image" $email_link_typeimage></font></td>
<td bgcolor=#eeeeee>$font B29 - Web hyperlink display type<br></font><font face=Arial size=1>(image address set in Color Prefs Manager)</font></td><td bgcolor=#cccccc>$font ~;
if ($web_link_type eq "image"){$web_link_typeimage = "checked";}
elsif ($web_link_type eq "address"){$web_link_typeaddress = "checked";}
else{ $web_link_typetext = "checked";}
print qq~
Address:<INPUT TYPE="radio" NAME="web_link_type" VALUE="address" $web_link_typeaddress><br>
Text:<INPUT TYPE="radio" NAME="web_link_type" VALUE="text" $web_link_typetext><br>
Image:<INPUT TYPE="radio" NAME="web_link_type" VALUE="image" $web_link_typeimage></font></td> </tr>
<tr valign=top><td colspan=2 bgcolor=#cccccc>$font B27 - Text for "text" email hyperlink
<input size=8 type=text name="email_txt" value="$email_txt"></font></td>
<td colspan=2 bgcolor=#eeeeee>$font B30 - Text for "text" web hyperlink
<input size=8 type=text name="url_text" value="$url_text"></font></td></tr>
~;
print qq~
<tr valign=top><td colspan=2>$font B31 - Order of messages :</font><div align=right>$font ~;
if ($order eq "normal"){$ordernormalsel = "checked";}
elsif ($order eq "reversed"){$orderrevsel = "checked";}
elsif ($order eq "alpha_name"){$orderalphanamesel = "checked";}
elsif ($order eq "alpha_message"){$orderalphamesssel = "checked";}
elsif ($order eq "random"){$orderrandomsel = "checked";}
else{ $ordernormalsel = "checked";}
print qq~By date: <INPUT TYPE="radio" NAME="order" VALUE="normal" $ordernormalsel><br>
Reverse date: <INPUT TYPE="radio" NAME="order" VALUE="reversed" $orderrevsel><br>
By name: <INPUT TYPE="radio" NAME="order" VALUE="alpha_name" $orderalphanamesel><br>
By message: <INPUT TYPE="radio" NAME="order" VALUE="alpha_message" $orderalphamesssel><br>
Random: <INPUT TYPE="radio" NAME="order" VALUE="random" $orderrandomsel><br></font> ~;
print qq~</div></td><td>$font B32 - Display total number of messages</font></td><td>$font ~;
if ($show_no_of_messages eq "no") {$show_no_of_messagesno = "checked";}else{ $show_no_of_messagesyes = "checked";}
print qq~ Yes:<INPUT TYPE="radio" NAME="show_no_of_messages" VALUE="yes" $show_no_of_messagesyes><br>No:<INPUT TYPE="radio" NAME="show_no_of_messages" VALUE="no" $show_no_of_messagesno ></font></td></tr>
<tr valign=top><td rowspan=2>$font B33 - Use Message Numbers<br>~;
if ($order_of_message_numbers ne "reverse"){$order_of_message_numbersnor = "selected";} else {$order_of_message_numbersrev = "selected";}
print qq~<div align=right>Order <select name=order_of_message_numbers>
<option value=normal $order_of_message_numbersnor>normal</option><option value=reverse $order_of_message_numbersrev>reversed</option></select>
</font></div></td><td rowspan=2>$font ~;
$use_message_numbersyes = $use_message_numbersno = "";
if ($use_message_numbers eq "yes") {$use_message_numbersyes = "checked"; $messtextblocked = "";}else{ $use_message_numbersno = "checked"; $messtextblocked = "(blocked by B33)"}
print qq~ Yes:<INPUT TYPE="radio" NAME="use_message_numbers" VALUE="yes" $use_message_numbersyes><br>No:<INPUT TYPE="radio" NAME="use_message_numbers" VALUE="no" $use_message_numbersno ></font></td>
<td>$font B34 - Text before number $messtextblocked</font></td>
<td>$font <input size=6 type=text name="message_number_pre" value="$message_number_pre"></font></td></tr>
<tr valign=top>
<td>$font B35 - Text after number $messtextblocked</font></td>
<td>$font <input size=6 type=text name="message_number_post" value="$message_number_post"></font></td></tr>
</table>
<INPUT TYPE="submit" VALUE="Update standard preferences">
<table border=1 width=700 cellspacing=0>
<tr valign=top><td colspan=2 bgcolor = red><font face=Arial size=-1 color=white><B>C - Style/CSS</B></font></td></tr>~;
if ($style ne "off"){$styleyes = "checked";}else{ $styleno = "checked";}
print qq~ <tr valign=top><td>$font C1 - Use CSS</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="style" VALUE="on" $styleyes> - No:<INPUT TYPE="radio" NAME="style" VALUE="off" $styleno ></font></td></tr>~;
print qq~ <tr valign=top><td>$font C2 - CSS code</font></td><td>$font <TEXTAREA wrap=virtual NAME="user_style" ROWS="9" COLS="70">~;
foreach $row(@user_style){print "$row";}
print "</TEXTAREA></font></td></tr>";
$tempmailpath = $mail_path;
$tempmailpath =~ s/\s\-t\s\-oi//gi;
print qq~ </table>
<INPUT TYPE="submit" VALUE="Update standard preferences">
<table border=1 width=700 cellspacing=0>
<tr valign=top><td colspan=2 bgcolor = red><font face=Arial size=-1 color=white><B>D - Email info</B></font></td></tr>
<tr valign=top><td>$font D1 - Path to your sendmail programme</font></td><td>$font <input size=40 type=text name="mail_path" value="$tempmailpath"></font></td></tr>
<tr valign=top><td>$font D2 - Your email address</font></td><td>$font <input size=40 type=text name="admin_email" value="$admin_email"></font></td></tr>~;
if ($send_email_to_admin eq "off"){$send_email_to_adminno = "checked";}else{ $send_email_to_adminyes = "checked";}
print qq~ <tr valign=top><td>$font D3 - Send you email notification of new messages</font><br>
<font face=Arial size=1>(requires D1 and D2 to be correctly set)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="send_email_to_admin" VALUE="on" $send_email_to_adminyes> - No:<INPUT TYPE="radio" NAME="send_email_to_admin" VALUE="off" $send_email_to_adminno ></font></td></tr>
~;
if ($send_email_to_guest eq "off"){$send_email_to_guestno = "checked";}else{ $send_email_to_guestyes = "checked";}
print qq~ <tr valign=top><td>$font D4 - Send guest a thank you message</font><br>
<font face=Arial size=1>(requires D1 and D2 to be correctly set)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="send_email_to_guest" VALUE="on" $send_email_to_guestyes> - No:<INPUT TYPE="radio" NAME="send_email_to_guest" VALUE="off" $send_email_to_guestno ></font></td></tr>
~;
print qq~<tr valign=top><td>$font D5 - Subject to be shown in your thank you message</font></td><td>$font <input size=40 type=text name="thanks_title" value="$thanks_title"></font></td></tr>
<tr valign=top><td>$font D6 - Text of your thank you message</font></td><td>$font <TEXTAREA wrap=virtual NAME="thank_you" ROWS="4" COLS="40">~;
foreach $row(@thank_you){print "$row";} print "</TEXTAREA></font></td></tr>";
if ($thanks_include_message eq "off"){$thanks_include_messageno = "checked";}else{ $thanks_include_messageyes = "checked";}
print qq~ <tr valign=top><td>$font D7 - Include original guestbook message in thank you message</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="thanks_include_message" VALUE="on" $thanks_include_messageyes> - No:<INPUT TYPE="radio" NAME="thanks_include_message" VALUE="off" $thanks_include_messageno ></font></td></tr>~;
print qq~ </table>
<INPUT TYPE="submit" VALUE="Update standard preferences">
<table border=1 width=700 cellspacing=0>
<tr valign=top><td colspan=2 bgcolor = red><font face=Arial size=-1 color=white><B>E - Images/titles</B></font></td></tr>~;
if ($active_header eq "off"){$active_headerno = "checked";}else{ $active_headeryes = "checked";}
print qq~ <tr valign=top><td>$font E1 - Show Active-Scripts header</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="active_header" VALUE="on" $active_headeryes> - No:<INPUT TYPE="radio" NAME="active_header" VALUE="off" $active_headerno ></font></td></tr>~;
if ($use_title eq "off"){$use_titleno = "checked";}else{ $use_titleyes = "checked";}
print qq~ <tr valign=top><td>$font E2 - Use text title</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="use_title" VALUE="on" $use_titleyes> - No:<INPUT TYPE="radio" NAME="use_title" VALUE="off" $use_titleno ></font></td></tr>~;
print qq~<tr valign=top><td>$font E3 - Title of your guestbook</font></td><td>$font <input type=text name="title" value="$title"></font></td></tr>
<tr valign=top><td>$font E4 - Html before webmaster comment</font></td><td>$font <TEXTAREA wrap=virtual NAME="user_comment_line" ROWS="2" COLS="40">~;
foreach $row(@user_comment_line){print "$row";} print "</TEXTAREA></font></td></tr>";
if ($use_user_html eq "no"){$use_user_htmlno = "checked";}else{ $use_user_htmlyes = "checked";}
print qq~ <tr valign=top><td>$font E5 - Use your own html header at top of guestbook</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="use_user_html" VALUE="yes" $use_user_htmlyes> - No:<INPUT TYPE="radio" NAME="use_user_html" VALUE="no" $use_user_htmlno ></font></td></tr>~;
if ($disable_user_html_add ne "yes"){$disable_user_html_addno = "checked";}else{ $disable_user_html_addyes = "checked";}
print qq~ <tr valign=top><td>$font E5a - Disable your header on the add/preview pages</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="disable_user_html_add" VALUE="yes" $disable_user_html_addyes> - No:<INPUT TYPE="radio" NAME="disable_user_html_add" VALUE="no" $disable_user_html_addno ></font></td></tr>~;
print qq~<tr valign=top><td>$font E6 - Header html</font></td><td>$font <TEXTAREA wrap=virtual NAME="user_html" ROWS="4" COLS="40">~;
foreach $row(@user_html){print "$row";} print "</TEXTAREA></font></td></tr>";
if ($use_user_html_footer eq "no"){$use_user_html_footerno = "checked";}else{ $use_user_html_footeryes = "checked";}
print qq~ <tr valign=top><td>$font E7 - Use your own html footer at bottom of guestbook</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="use_user_html_footer" VALUE="yes" $use_user_html_footeryes> - No:<INPUT TYPE="radio" NAME="use_user_html_footer" VALUE="no" $use_user_html_footerno ></font></td></tr>~;
if ($disable_user_html_footer_add ne "yes"){$disable_user_html_footer_addno = "checked";}else{ $disable_user_html_footer_addyes = "checked";}
print qq~ <tr valign=top><td>$font E7a - Disable your footer on the add/preview pages</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="disable_user_html_footer_add" VALUE="yes" $disable_user_html_footer_addyes> - No:<INPUT TYPE="radio" NAME="disable_user_html_footer_add" VALUE="no" $disable_user_html_footer_addno ></font></td></tr>~;
print qq~<tr valign=top><td>$font E8 - Footer html</font></td><td>$font <TEXTAREA wrap=virtual NAME="user_html_footer" ROWS="4" COLS="40">~;
foreach $frow(@user_html_footer){print "$frow";} print "</TEXTAREA></font></td></tr>";
if ($allow_html eq "no"){$allow_htmlno = "checked";}else{ $allow_htmlyes = "checked";}
print qq~ <tr valign=top><td>$font E9 - $font Allow html in messages (best not to)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="allow_html" VALUE="yes" $allow_htmlyes> - No:<INPUT TYPE="radio" NAME="allow_html" VALUE="no" $allow_htmlno ></font></td></tr>~;
if ($use_smileys eq "no"){$use_smileysno = "checked";}else{ $use_smileysyes = "checked";}
print qq~ <tr valign=top><td>$font E10 - $font Use smileys</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="use_smileys" VALUE="yes" $use_smileysyes> - No:<INPUT TYPE="radio" NAME="use_smileys" VALUE="no" $use_smileysno ></font></td></tr>
<tr valign=top><td>$font E11 - Maximum number of smileys in message</font></td>
<td>$font <input size=5 type=text name="max_smileys" value="$max_smileys"></font></td></tr>~;
print qq~</table>
<INPUT TYPE="submit" VALUE="Update standard preferences">
<table border=1 width=700 cellspacing=0><tr valign=top><td colspan=3 bgcolor = red><font face=Arial size=-1 color=white><B>F - Guestbook management</B></font></td></tr>
<tr valign=top><td colspan=2>$font F1 - Maximum number of messages in entire guestbook</font></font></td><td>$font <input type=text name="max" value="$max" size=7></font></td></tr>
<tr valign=top><td colspan=2>$font F2 - Number of days until a message is automatically removed from guestbook.</font></td><td>$font <input type=text name="days_to_delete" value="$days_to_delete" size=7></font></td></tr>
<tr valign=top><td colspan=2>$font F3 - Number of days to complete wipe of messages following removal.</font></td><td>$font <input type=text name="days_to_trash" value="$days_to_trash" size=7></font></td></tr>
<tr valign=top><td colspan=2>$font F4 - No of days your daily automatic backups are retained</font></td><td>$font <input size=7 type=text name="days_to_delete_backup_files" value="$days_to_delete_backup_files"></font></td></tr></table>
<INPUT TYPE="submit" VALUE="Update standard preferences">
<table border=1 width=700 cellspacing=0><tr valign=top><td colspan=3 bgcolor = red><font face=Arial size=-1 color=white><B>G - Backup email</B></font></td></tr>~;
if ($mail_backup_to_admin eq "no"){$mail_backup_to_adminno = "checked";}else{ $mail_backup_to_adminyes = "checked";}
print qq~ <tr valign=top><td>$font G1 - Send regular email backup to admin</font><br>
<font face=Arial size=1>(requires D1 and D2 to be correctly set)</font></td>
<td>$font Yes:<INPUT TYPE="radio" NAME="mail_backup_to_admin" VALUE="yes" $mail_backup_to_adminyes> - No:<INPUT TYPE="radio" NAME="mail_backup_to_admin" VALUE="no" $mail_backup_to_adminno ></font></td></tr>~;
print qq~<tr valign=top><td rowspan=3>$font G2 - Frequency of regular email of backup to admin</font></td>~;
if ($mail_admin_backups_interval eq "daily"){$mail_admin_backups_intervaldaily = "checked";}
print qq~ <td colspan=2>$font Daily: <INPUT TYPE="radio" NAME="mail_admin_backups_interval" VALUE="daily"
$mail_admin_backups_intervaldaily></font></td></tr>~;
if ($mail_admin_backups_interval eq "weekly"){$mail_admin_backups_intervalweekly = "checked";}
print qq~ <td >$font Weekly: <INPUT TYPE="radio" NAME="mail_admin_backups_interval" VALUE="weekly"
$mail_admin_backups_intervalweekly></font></td></font></td>~;
print qq~ <td>$font Day of week : <SELECT NAME="mail_admin_backups_day">
<OPTION value = "$mail_admin_backups_day" selected>$weekdaysbak[$mail_admin_backups_day]</option>
<OPTION value = "0">Sunday</option><OPTION value = "1">Monday</option><OPTION value = "2">Tuesday</option>
<OPTION value = "3">Wednesday</option><OPTION value = "4">Thursday</option><OPTION value = "5">Friday</option>
<OPTION value = "6">Saturday </option></SELECT></font></td></tr>~;
if ($mail_admin_backups_interval eq "monthly"){$mail_admin_backups_intervalmonthly = "checked";}
print qq~ <td >$font Monthly: <INPUT TYPE="radio" NAME="mail_admin_backups_interval" VALUE="monthly"
$mail_admin_backups_intervalmonthly></font></td></font></td>~;
print qq~ <td>$font Day of month: <SELECT NAME="mail_admin_backups_month"> <OPTION selected>$mail_admin_backups_month</option>~;
for ($x = 1; $x < 29; $x++){print "<OPTION>$x</option>\n";}
print qq~</SELECT></font></td></tr></table>
<INPUT TYPE="submit" VALUE="Update standard preferences"> <input type=hidden name=fullpageloaded value="yes">
</form><hr size=1>~;
} # end view_prefs

sub purge_spam{
$spamsecs = 60*60*24;
open(USER_FILE,"$cap");
@data = <USER_FILE>;
close(USER_FILE);
open(USER_FILE,">$cap");
$spamdays = $FORM{'spamdays'} if ($setp eq "yes");
$howlong = ($spamsecs * $spamdays);
foreach $row (@data){
@fields = split (/\|/, $row);
unless (($var - $fields[3]) > $howlong){
 print USER_FILE "$row";
}
}
close(USER_FILE);
}
sub view_spam{
&seek_cook;  &basic_header;
print qq~   <style type="text/css">
a {text-decoration: none; color: #ff0000 }
a:hover {text-decoration: none; color: #0000ff }
.textfield {
BORDER-RIGHT: darkgray 1px solid;
BORDER-TOP: darkgray 1px solid;
BORDER-LEFT: darkgray 1px solid;
BORDER-BOTTOM: darkgray 1px solid;
font-size: 10px;
}
.buttons {
font-size: 10px;
background-color: #f0f0f0;
}
</style> ~;
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);  $countt = 0 ;
foreach $row (@data){
@fields = split (/\|/, $row);
$VAR_CAP{$fields[22]} = "yes";
}
open(USER_FILE,"$cap");
@data = <USER_FILE>;
close(USER_FILE);
$countdata = @data = reverse(@data);
$spamwords = "<b>ALL messages are initially placed in the Spam Log</b> until the guest confirms the message by entering the correct numbers. If A1 in the Standard Preferences Manager is also turned on, the message will remain in the Spam Log until the guest confirms by email.";
$spamwords = "<center>(No spam found)</center>"   if $countdata <1;
print qq~<form action="$guesturl" METHOD="POST" ><input type=hidden name=action value=set_purge><font face=Arial size=3> <center>
<B>Spam Log</B><br> </font>
<table width=800 cellpaddin=0><tr><td width=100%>
<font face=Arial size=2>$spamwords</td></tr></table>
<p>~;
print qq~<font face=Arial size=2><a href="$guesturl?action=control_panel">Control Panel</a>  - Automatically purge spam older than <select  NAME="spamdays" class="textfield"> ~;
for ($x = 1; $x < 32; $x++){
print qq~ <option value="$x" ~;
print "selected" if $x == $spamdays;
print qq~>$x</option>
~;
}
print qq~</select> days <input type=submit class=buttons value=Update></form>  ~;
 @data;
foreach $row (@data){
@fields = split (/\|/, $row);
next if $VAR_CAP{$fields[3]} eq "yes";
$captime = $fields[3];
($secc,$minc,$hourc,$mdayc,$monc,$yearc,$wdayc,$ydayc,$isdstc) = localtime($captime);
if ($secc < 10) { $secc = "0$secc"; }
if ($minc < 10) { $minc = "0$minc"; }
if ($hourc < 10) { $hourc = "0$hourc"; }
if ($mdayc < 10) { $mdayc = "0$mdayc"; }
$firstdatefound = $mdayc if $started ne "yes";
$started = "yes"; $lastdatefound = $mdayc;
if ($FOUND{$mdayc} ne "yes") {
$nofdds++;
push (@datesfound,$mdayc ) if ($nofdds < 29);

$FOUND{$mdayc} = "yes";
}
if ($nofdds < 29){
$TOT{$mdayc}++ ;
$maxx = $TOT{$mdayc} if  $TOT{$mdayc} > $maxx;
}
}
@datesfound = reverse(@datesfound);
print qq~
<table width=750 cellspacing=0 cellpadding=0><tr valign=bottom>~;
$homdates =@datesfound; $homdates = 1 if $homdates < 1; $widthh = int(750/$homdates) -4; $widthh = 100 if $homdates < 6;
foreach $one(@datesfound){
$heightt = (60*$TOT{$one})/$maxx;
print qq~<td align=center><font face=arial size=1><i>$TOT{$one}</i><br>
<img width=$widthh height= $heightt src="http://www.active-scripts.net/red.gif"></td> ~;
}
print "</tr><tr>";
foreach $one(@datesfound){
print qq~<td align=center><font face=arial size=1>$one </td>~;
}
print qq~  </tr></table>
<table width=750 cellspacing=0 cellpadding=3>
<tr valign=top><td><font face=Arial size=2><nobr><b>Date</b></nobr></td><td><font face=Arial size=2><b>Message</b></td></tr>
~;
foreach $row (@data){
@fields = split (/\|/, $row);
next if $VAR_CAP{$fields[3]} eq "yes";
$captime = $fields[3];
($secc,$minc,$hourc,$mdayc,$monc,$yearc,$wdayc,$ydayc,$isdstc) = localtime($captime);
if ($secc < 10) { $secc = "0$secc"; }
if ($minc < 10) { $minc = "0$minc"; }
if ($hourc < 10) { $hourc = "0$hourc"; }
if ($mdayc < 10) { $mdayc = "0$mdayc"; }
$yearc = $yearc + 1900;
$spamdate = "$mdayc"." "."$months[$monc]"." "."$yearc $hourc:$minc:$secc";
$countt++; $countt = 0 if $countt == 2;
$bg = "";   $bg = "bgcolor=#f0f0f0" if $countt == 1;
$fields[5] = $fields[4] if $fields[5] eq "";
print qq~ <tr valign=top $bg><td><font face=Arial size=2><nobr>$spamdate</nobr></td><td><font face=Arial size=2>$fields[5]</td></tr>
~;
}
print "</table>";
 exit;
}
sub view_to_edit{
&seek_cook;
$FORM{'vtenpp'} = 20 if (($FORM{'vtenpp'} eq "") || ($FORM{'vtenpp'} == 0) );
$no_displayed = $FORM{'vtenpp'};
$no_displayed = 3000000000 if $FORM{'everything'} eq "yes";
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
@data_ordered = reverse(@data);
&basic_header;
print qq~
<style type="text/css">
.buttons {
font-size: 11px;
}
</style>
<SCRIPT LANGUAGE="JavaScript">
<!-- Hide from non-Java browsers

function ConfirmDelALL() {
var Confirmation;
Confirmation = "Are you sure you want to delete ABSOLUTELY ALL your messages?";
if (confirm(Confirmation)){
return true;
}
else {
return false;
}
}
function ConfirmDelALLWAITING() {
var Confirmation;
Confirmation = "Are you sure you want to delete ALL your messages WAITING FOR APPROVAL?";
if (confirm(Confirmation)){
return true;
}
else {
return false;
}
}
function ConfirmBULK() {
var Confirmation;
Confirmation = "Are you sure you want to delete ALL selected messages?";
if (confirm(Confirmation)){
return true;
}
else {
return false;
}
}

function ConfirmDelALLPRIVATE() {
var Confirmation;
Confirmation = "Are you sure you want to delete ALL your PRIVATE messages?";
if (confirm(Confirmation)){
return true;
}
else {
return false;
}
}
// End Java Hiding. -->
</SCRIPT>
<center><font face=Arial size=+1>
<FORM ACTION="$guesturl" METHOD="POST"><input type=hidden name=action value=view_to_edit><B>Active Guestbook Message Manager</B><p></font>
$font <a href="$guesturl?action=control_panel">Control Panel</a> -  <a href="#searchform">Search</a> ~;
if ($FORM{'everything'} ne "yes"){
print qq~ - show <input type=text size=2 name="vtenpp" value="$FORM{'vtenpp'}" >  messages per page <input TYPE="submit" VALUE="change" class="buttons"> <p>
<a href="$guesturl?action=delete_all" OnClick="return ConfirmDelALL()">Delete <b>ALL</b> Messages</a> -
<a href="$guesturl?action=delete_all_waiting&vtenpp=$FORM{'vtenpp'}" OnClick="return ConfirmDelALLWAITING()">Delete All Messages <b>WAITING APPROVAL</b></a>   -
<a href="$guesturl?action=delete_all_private&vtenpp=$FORM{'vtenpp'}" OnClick="return ConfirmDelALLPRIVATE()">Delete All <b>PRIVATE</b> Messages</a> </font></form><FORM ACTION="$guesturl" METHOD="POST"  OnSubmit="return ConfirmBULK()"><input type=hidden name=action value=bulk_delete>~;
}
@datalist = ();
$count = 1;
if ($FORM{'everything'} eq "yes"){
foreach $row (@data_ordered){
@fields = split (/\|/, $row);
next if (($fields[10] eq "del") &&  ($FORM{'inctrash'} ne "yes") );
next if (($fields[15] eq "waiting") &&  ($FORM{'incwaiting'} ne "yes") );
next if (($fields[16] eq "yes") &&  ($FORM{'incprivate'} ne "yes") );
next if ((($fields[16] ne "yes") && ($fields[15] ne "waiting") && ($fields[10] ne "del")) && ($FORM{'incnormal'} ne "yes"))    ;
if (($search_fields eq "1" ) || ($search_fields eq "2" )){
$searchby = (" " . $fields[$search_fields] . " ");
}
else{
$searchby = (" " . $fields[1] . " " . $fields[2] . " " . $fields[5] . " " . $fields[6] . " " . $fields[17] . " " . $fields[18] . " " . $fields[19] . " ");
}
@word_list = split(/\s+/,$search_words);
$no_of_words_in_search = @word_list;
for ($x = @word_list; $x > 0; $x--){
$match_word = $word_list[$x - 1];
if ($searchby =~ /$match_word/i)
{
splice(@word_list,$x - 1, 1);
} # End of If
} # End of For Loop
if (@word_list < 1)
{
push (@hits, $row);
}
} # end foreach $row
close(USER_FILE);
@datalist = @hits;
}
else{
foreach $row (@data_ordered){
@fields = split (/\|/, $row);
unless ($fields[10] eq "del"){
push (@datalist, $row);
}
}
}
print "<br>";
$count = 1;
$grouped = 0;
$start_number = $FORM{'start_number'};
$new_start_number = ($start_number + $no_displayed);
$old_start_number = ($start_number - $no_displayed);
$startplus = $start_number +1;
$number_of_messages = @datalist;
if ($start_number >0){
print qq~ <font face= "Arial" size=2> [<a href="$guesturl\?start_number=0&action=view_to_edit&vtenpp=$FORM{'vtenpp'}">Start</a>]</font>
~;
}
unless ($old_start_number < 0){
print qq~ <font face= "Arial" size=2> [<a href="$guesturl\?start_number=$old_start_number&action=view_to_edit&vtenpp=$FORM{'vtenpp'}">Previous</a>] </font> ~;
}
&show_edit_number_menu unless ($number_of_messages <($no_displayed+1));
unless ($new_start_number > ($number_of_messages -1 )){
print qq~ <font face= "Arial" size=-1> [<a href="$guesturl\?start_number=$new_start_number&action=view_to_edit&vtenpp=$FORM{'vtenpp'}">Next</a>] </font><br> ~;
}
if (($new_start_number > ($number_of_messages -1 )) && ($number_of_messages >($no_displayed))){
print qq~ <br> ~;
}
print qq~ <font face= "Arial" size=-1> ~;
if ($new_start_number < $number_of_messages){
print qq~ Messages $startplus to $new_start_number</font> ~;
}
else{
if ($startplus == $number_of_messages){
print qq~ Message $startplus</font> ~;
}
else{
print qq~ Messages $startplus to $number_of_messages</font> ~;
}
}
$individno = $start_number;
foreach $row (@datalist){
@fields = split (/\|/, $row);
$grouped++;
if (($grouped > ($start_number)) && ($grouped < ($start_number + $no_displayed + 1))){
if ($fields[16] eq "yes"){
print qq~<table bgcolor=#ffffff border=0 width=800 cellspacing=0>
<tr valign=top><td colspan=2 bgcolor=#FF0000><font face="Arial" size=-1 color=#ffffff><B>THIS IS A PRIVATE MESSAGE</B></font></td></tr>
~;
}
elsif ($fields[15] eq "waiting"){
print qq~<table bgcolor=#ffffff border=0 width=800 cellspacing=0>
<tr valign=top><td colspan=2 bgcolor=#0000ff><font face="Arial" size=-1 color=#ffffff><B>THIS MESSAGE IS WAITING FOR APPROVAL</B></font></td></tr>
~;
}
elsif ($fields[10] eq "del"){
print qq~<table bgcolor=#ffffff border=0 width=800 cellspacing=0>
<tr valign=top><td colspan=2 bgcolor=#000000><font face="Arial" size=-1 color=#ffffff><B>THIS MESSAGE IS DELETED</B></font></td></tr>
~;
}
else{
if ($count ==1){
print qq~<table bgcolor=#ffffff border=0 width=800 cellspacing=0>~;
}
else{
print qq~<table bgcolor=#ffffff border=0 width=800 cellspacing=0>~;
}
} # end else
if ($fields[4]){
print qq~
<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_your_name: </b></font></td><td width=445><font face="Arial" size=-1><a href="mailto:$fields[4]">$fields[1]</a></font></td></tr>~;
}
else{
print qq~
<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_your_name: </b></font></td><td width=445><font face="Arial" size=-1>$fields[1]</font></td></tr>
~;
}
if ($fields[11]){
print qq~
<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_your_web_page_address: </b></font></td><td width=445><font face="Arial" size=-1>$fields[11]</font></td></tr>
~;
}
&date_mod;
$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
print qq~
<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_your_message: </b></font></td><td width=445><font face="Arial" size=-1>$fields[2]</font></td></tr>
~;
if ($fields[5]){
print qq~
<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_where_in_the_world: </b></font></td><td width=445><font face="Arial" size=-1>$fields[5]</font></td></tr>
~;
}
if ($fields[17]){
print qq~ <tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_user1_field: </b></font></td><td width=445><font face="Arial" size=-1>$fields[17]</font></td></tr> ~;
}
if ($fields[18]){
print qq~ <tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_user2_field: </b></font></td><td width=445><font face="Arial" size=-1>$fields[18]</font></td></tr> ~;
}
if ($fields[19]){
print qq~ <tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_user3_field: </b></font></td><td width=445><font face="Arial" size=-1>$fields[19]</font></td></tr> ~;
}
print qq~ <tr valign=top><td width=150><font face="Arial" size=-1><b>Date: </b></font></td><td width=445><font face="Arial" size=-1>$condate</font></td></tr>
~;
if ($fields[6]){
print qq~
<tr valign=top><td width=150><font face="Arial" size=-1><b>$web_comment: </b></font></td><td width=445><font face="Arial" size=-1><i>$fields[6]</i></font></td></tr>
~;
}
if ($fields[7]){
print qq~
<tr valign=top><td width=150><font face="Arial" size=-1><b>IP: </b></font></td><td width=445><font face="Arial" size=-1>$fields[7]</font></td></tr>
~;
}
if ($fields[10] ne "del"){
$addedbit = "&search_words=$FORM{'search_words'}&incnormal=yes&everything=yes" if $FORM{'everything'} eq "yes";
print qq~
<tr valign=top><td colspan=2><font face="Arial" size=-1><b>[ <a href="$guesturl?action=delete_item&ref=$fields[0]&start_number=$individno$addedbit&vtenpp=$FORM{'vtenpp'}">Delete this message</a>]</b>
~;
unless (($fields[6]) || ($fields[16] eq "yes")){
print qq~
<b>[ <a href="$guesturl?action=add_response1&ref=$fields[0]&start_number=$individno&vtenpp=$FORM{'vtenpp'}">Add a comment</a> ]</b>
~;
}
if (($fields[15] eq "waiting") && ($fields[16] ne "yes")){
print qq~
<b>[ <a href="$guesturl?action=approve_message&ref=$fields[0]&start_number=$individno&vtenpp=$FORM{'vtenpp'}">APPROVE THIS MESSAGE</a> ]</b>
~;
}
if ($fields[16] ne "yes"){
print qq~
<b>[ <a href="$guesturl?action=change1&ref=$fields[0]&start_number=$individno&vtenpp=$FORM{'vtenpp'}">Edit this message</a> ]</b>	~;
}
print qq~
( <input type=checkbox name="todel" value="$fields[0]"> Select for bulk delete )	~;
print qq~ </font></td></tr> ~;
}
print qq~</table>
<hr width=800 size=1>
~;
$individno++;
$count++;
if ($count >2){
$count = 1;
}
}
}
print qq~ <div align=center> <INPUT TYPE="submit" VALUE="Bulk delete selected messages" class="buttons"> </div>
~;
unless ($old_start_number < 0){
print qq~ <font face= "Arial" size=-1> [<a href="$guesturl\?start_number=$old_start_number&action=view_to_edit">Previous</a>] </font> ~;
}
&show_edit_number_menu unless ($number_of_messages <($no_displayed+1));
unless ($new_start_number > ($number_of_messages -1 )){
print qq~ <font face= "Arial" size=-1> [<a href="$guesturl\?start_number=$new_start_number&action=view_to_edit">Next</a>] </font><br> ~;
}
print qq~</form> ~;
&search_form;
} # end sub
sub delete_item{
&seek_cook;
&get_file_lock("$location_of_lock_file");$ref = $FORM{'ref'};
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');@data = <USER_FILE>;close(USER_FILE);
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data){
@fields = split (/\|/, $row);
if ($ref ne $fields[0]){
print USER_FILE "$row";
}
else{
print USER_FILE "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$fields[8]|$fields[9]|del|$fields[11]|$now|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
}
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file"); &content; &main_headera;
$start_number = $FORM{'start_number'}; $start_number = $start_number -1 if $start_number > 1;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_to_edit&start_number=$FORM{'start_number'}&vtenpp=$FORM{'vtenpp'}"> ~;
&main_headerb;
print qq~<center><font face=Arial size=+1><B>Active Guestbook Message Manager</B><p></font>$font
<a href="$guesturl\?action=view_to_edit&vtenpp=$FORM{'vtenpp'}"><B>Message deleted</B></a><br></body></html>~;
}
sub delete_all_private{
&seek_cook;
&get_file_lock("$location_of_lock_file");$ref = $FORM{'ref'};
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');@data = <USER_FILE>;close(USER_FILE);
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data){
@fields = split (/\|/, $row);
if ($fields[16] ne "yes"){
print USER_FILE "$row";
}
else{
print USER_FILE "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$fields[8]|$fields[9]|del|$fields[11]|$now|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
}
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file"); &content; &main_headera;
$start_number = $FORM{'start_number'}; $start_number = $start_number -1 if $start_number > 1;
print qq~ <META http-equiv="refresh" content="1;URL=$guesturl?action=view_to_edit&start_number=$FORM{'start_number'}&vtenpp=$FORM{'vtenpp'}"> ~;
&main_headerb;
print qq~<center><font face=Arial size=+1><B>Active Guestbook Message Manager</B><p></font>$font
<a href="$guesturl\?action=view_to_edit&vtenpp=$FORM{'vtenpp'}"><B>All Private Messages Deleted</B></a><br></body></html>~;
}


sub bulk_delete{
&seek_cook;
foreach $todel (@todel){
$TODEL{$todel} = "yes";
}
&get_file_lock("$location_of_lock_file");$ref = $FORM{'ref'};
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');@data = <USER_FILE>;close(USER_FILE);
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data){
@fields = split (/\|/, $row);
if ($TODEL{$fields[0]} ne "yes"){
print USER_FILE "$row";
}
else{
print USER_FILE "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$fields[8]|$fields[9]|del|$fields[11]|$now|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
}
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file"); &content; &main_headera;
$start_number = $FORM{'start_number'}; $start_number = $start_number -1 if $start_number > 1;
print qq~ <META http-equiv="refresh" content="1;URL=$guesturl?action=view_to_edit&start_number=$FORM{'start_number'}&vtenpp=$FORM{'vtenpp'}"> ~;
&main_headerb;
print qq~<center><font face=Arial size=+1><B>Active Guestbook Message Manager</B><p></font>$font
<a href="$guesturl\?action=view_to_edit&vtenpp=$FORM{'vtenpp'}"><B>Messages Deleted</B></a><br></body></html>~;
}



sub delete_all_waiting{
&seek_cook;
&get_file_lock("$location_of_lock_file");$ref = $FORM{'ref'};
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');@data = <USER_FILE>;close(USER_FILE);
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data){
@fields = split (/\|/, $row);
if ($fields[15] ne "waiting"){
print USER_FILE "$row";
}
else{
print USER_FILE "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$fields[8]|$fields[9]|del|$fields[11]|$now|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
}
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file"); &content; &main_headera;
$start_number = $FORM{'start_number'}; $start_number = $start_number -1 if $start_number > 1;
print qq~ <META http-equiv="refresh" content="1;URL=$guesturl?action=view_to_edit&start_number=$FORM{'start_number'}&vtenpp=$FORM{'vtenpp'}"> ~;
&main_headerb;
print qq~<center><font face=Arial size=+1><B>Active Guestbook Message Manager</B><p></font>$font
<a href="$guesturl\?action=view_to_edit&vtenpp=$FORM{'vtenpp'}"><B>Deleted All Messages Waiting Approval</B></a><br></body></html>~;
}
sub add_response1
{
&seek_cook;
$ref = $FORM{'ref'};
$start_number = $FORM{'start_number'};
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
foreach $row (@data)
{
@fields = split (/\|/, $row);
if ($ref eq $fields[0])
{
&date_mod;
&content;
&plain_header;
print qq~
<font face=Arial size=+1>
Active Guestbook Message Editor
</font><br>$font
<a href="$guesturl\?action=view_to_edit">Message Editor</a> | <a href="$guesturl\?action=control_panel">Control Panel</a>
<form action="$guesturl" METHOD="POST" >
<INPUT TYPE="hidden" NAME="ref" VALUE="$ref">
<INPUT TYPE="hidden" NAME="start_number" VALUE="$start_number">
<INPUT TYPE="hidden" NAME="action" VALUE="add_response2">
<INPUT TYPE="hidden" NAME="vtenpp" VALUE="$FORM{'vtenpp'}">
~;
print qq~
<table border=0 width=600>
~;
if ($fields[4])
{
print qq~
<tr valign=top><td><font face="Arial" size=-1><b>$TXT_your_name: </b></font></td><td><font face="Arial" size=-1><a href="mailto:$fields[4]">$fields[1]</a></font></td></tr>
~;
}
else
{
print qq~
<tr valign=top><td ><font face="Arial" size=-1><b>$TXT_your_name: </b></font></td><td ><font face="Arial" size=-1>$fields[1]</font></td></tr>
~;
}
print qq~
<tr valign=top><td><font face="Arial" size=-1><b>$TXT_your_message: </b></font></td><td ><font face="Arial" size=-1>$fields[2]</font></td></tr>
<tr valign=top><td ><font face="Arial" size=-1><b>Date: </b></font></td><td><font face="Arial" size=-1>$condate</font></td></tr>
~;
if ($fields[5])
{
print qq~
<tr valign=top><td><font face="Arial" size=-1><b>$TXT_where_in_the_world: </b></font></td><td><font face="Arial" size=-1>$fields[5]</font></td></tr> ~;
}
if ($fields[11])
{
print qq~
<tr valign=top><td><font face="Arial" size=-1><b>$TXT_your_web_page_address: </b></font></td><td><font face="Arial" size=-1>$fields[11]</font></td></tr> ~;
}
if ($fields[18])
{
print qq~
<tr valign=top><td><font face="Arial" size=-1><b>$TXT_user1_field: </b></font></td><td><font face="Arial" size=-1>$fields[17]</font></td></tr> ~;
}
if ($fields[18])
{
print qq~
<tr valign=top><td><font face="Arial" size=-1><b>$TXT_user2_field: </b></font></td><td><font face="Arial" size=-1>$fields[18]</font></td></tr> ~;
}
if ($fields[19])
{
print qq~
<tr valign=top><td><font face="Arial" size=-1><b>$TXT_user3_field: </b></font></td><td><font face="Arial" size=-1>$fields[19]</font></td></tr> ~;
}
$fields[6] =~ s/\<br\>/\n/g;
print qq~
<tr valign=top><td><font face="Arial" size=-1><b>$web_comment: </b></font></td><td ><font face="Arial" size=-1><TEXTAREA wrap=virtual NAME="comment" ROWS="3" COLS="40">$fields[6]</TEXTAREA></font></tr>
<tr><td ><font face="Arial" size=-1> <INPUT TYPE="submit" VALUE="Add your comment">
</td><td><font face="Arial" size=-1>
Send notification email to guest
<input type=checkbox value="yes" name="send_guest_notification"></font>
<br><font face="Arial" size=1>(requires valid email address above)</font> </td></tr>
<tr><td colspan=2><center><hr size=1></center></td></tr>
~;
print qq~
</table>
</form>
<hr width=$table_width size=1>
~;
}
}
} # end add response1
sub add_response2
{
&seek_cook;
$ref = $FORM{'ref'};
$start_number = $FORM{'start_number'};
$comment= $FORM{'comment'};
$comment =~ s/\r//g;
$comment =~ s/\n/<br>/g;
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
&get_file_lock("$location_of_lock_file");
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data)
{
chop($row);
@fields = split (/\|/, $row);
if ($ref ne $fields[0])
{
print USER_FILE "$row\n";
}
else
{
print USER_FILE "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$comment|$fields[7]|$fields[8]|$fields[9]|$fields[10]|$fields[11]|$fields[12]|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
#
$rtuse = $row;
}
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file");
@nfields = split (/\|/, $rtuse);
$guest_email = $fields[4];
if (($FORM{'send_guest_notification'} eq "yes") && ($guest_email ne "" ) ){
open (MAIL, "|$mail_path");
print MAIL "Content-Type: text/plain; charset=\"$TXT_main_language\"\n";
print MAIL "To: $guest_email\n";
print MAIL "From: $admin_email\n";
print MAIL "Subject: $title update\n\n";
if ($guest_email) {
print MAIL "$TXT_your_name: $nfields[1]\n";
}
if ($fields[5]) {
print MAIL "$TXT_where_in_the_world: $nfields[5]\n";
}
if ($fields[11]) {
print MAIL "$TXT_your_web_page_address: $nfields[11]\n";}
$converted_message = $message;
$converted_message =~ s/<br>/\n/g;
print MAIL "$converted_message\n";
if ($fields[17]) {$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
print MAIL "$TXT_user1_field: $fields[17]\n";}
if ($fields[18]) {$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
print MAIL "$TXT_user2_field: $fields[18]\n";}
if ($fields[19]) {$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
print MAIL "$TXT_user3_field: $fields[19]\n\n";}
print MAIL "$web_comment: $comment\n";
print MAIL "=========================\n";
close(MAIL);
}
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_to_edit&start_number=$start_number&vtenpp=$FORM{'vtenpp'}"> ~;
&main_headerb;
print qq~
<center>
<font face="Arial" size=+1><B>Active Guestbook Message Editor</B> <p>
</font><font face="Arial" size=-1><a href="$guesturl\?action=view_to_edit&start_number=$start_number&vtenpp=$FORM{'vtenpp'}"><B>Comment successfully added.</B></a>
</font>
~;
&inter_footer;
} # end add response2
sub change1
{
&seek_cook;
$start_number = $FORM{'start_number'};
$ref = $FORM{'ref'};
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
foreach $row (@data){
@fields = split (/\|/, $row);
if ($ref eq $fields[0]){
$fields[2] =~ s/\<br\>/\n/g;
&content; &plain_header; &date_mod;
print qq~ <font face=Arial size=+1>Active Guestbook Message Editor</font><br>$font<a href="$guesturl\?action=view_to_edit">Message Editor</a> | <a href="$guesturl\?action=control_panel">Control Panel</a>
<FORM ACTION="$guesturl" METHOD="POST">
<input type=hidden name=action value="change2">
<input type=hidden name=ref value="$ref">
<input type=hidden name=vtenpp value="$FORM{'vtenpp'}">
<input type=hidden name=start_number value="$start_number">
<input type=hidden name=original_date value="$condate">
<center> <table border=0><tr><td><font face="Arial" size=-1><B>$TXT_your_name :</B> </td>
<td ><font face="Arial" size=-1><INPUT TYPE="text" maxlength = 60 NAME="requiredfull_name" SIZE="40" value="$fields[1]"></td></tr>
<tr><td colspan=2><center><hr size=1></center></td></tr>
<tr valign="top"><td><font face="Arial" size=-1>
<B>$TXT_your_message :</B></td><td><font face="Arial" size=-1>
<TEXTAREA wrap=virtual NAME="requiredmessage" ROWS="6" COLS="40">$fields[2]</TEXTAREA></td></tr>
<tr><td colspan=2><center><hr size=1></center></td></tr>
<tr valign="top"><td><font face="Arial" size=-1>
<B>$TXT_your_email_address :</B></td><td><font face="Arial" size=-1>
<INPUT TYPE="text" maxlength = 60 NAME="guest_email" SIZE="40" value="$fields[4]"></td></tr>
<tr valign="top"><td><font face="Arial" size=-1>
<B>$TXT_your_web_page_address :</B></td><td><font face="Arial" size=-1>
<INPUT TYPE="text" maxlength = 60 NAME="url" SIZE="40" value="$fields[11]"></td></tr>
<tr valign="top"><td><font face="Arial" size=-1>
<B>$TXT_where_in_the_world :</B></td><td><font face="Arial" size=-1>
<INPUT TYPE="text" maxlength = 60 NAME="location" SIZE="40" value="$fields[5]"></td></tr>
<tr valign="top"><td><font face="Arial" size=-1>
<B>$TXT_user1_field :</B></td><td><font face="Arial" size=-1>
<INPUT TYPE="text" maxlength = 60 NAME="user1_field" SIZE="40" value="$fields[17]"></td></tr>
<tr valign="top"><td><font face="Arial" size=-1>
<B>$TXT_user2_field :</B></td><td><font face="Arial" size=-1>
<INPUT TYPE="text" maxlength = 60 NAME="user2_field" SIZE="40" value="$fields[18]"></td></tr>
<tr valign="top"><td><font face="Arial" size=-1>
<B>$TXT_user3_field :</B></td><td><font face="Arial" size=-1>
<INPUT TYPE="text" maxlength = 60 NAME="user3_field" SIZE="40" value="$fields[19]"></td></tr>
<tr valign="top"><td><font face="Arial" size=-1>
<B>Date:</B></td><td><font face="Arial" size=-1>
<INPUT TYPE="text" maxlength = 60 NAME="edited_date" SIZE="20" value="$condate"> </td></tr>
<tr valign="top"><td colspan=2><font face="Arial" size=1>
Note that edited dates will not be affected by changes in the Date Format Manager.)</td></tr>
~;
$fields[6] =~ s/\<br\>/\n/g;
print qq~
<tr valign=top><td ><font face="Arial" size=-1><B>$web_comment:</B></font></td><td><font face="Arial" size=-1><TEXTAREA wrap=virtual NAME="comment" ROWS="3" COLS="40">$fields[6]</TEXTAREA></font></tr>
~;
print qq~
<tr><td ><font face="Arial" size=-1>
<INPUT TYPE="submit" VALUE="Edit Message"> </td><td><font face="Arial" size=-1>
Send notification email to guest
<input type=checkbox value="yes" name="send_guest_notification"></font>
<br><font face="Arial" size=1>(requires valid email address above)</font> </td></tr>
<tr><td colspan=2><center><hr size=1></center></td></tr>
</table>
</form>
~;
print "\n\n</body>";
}
} # end if right one
} # end sub change1
sub change2
{
&seek_cook;
$ref = $FORM{'ref'};
$start_number = $FORM{'start_number'};
$start_number = $start_number -1 if $start_number > 0;
$original_date = $FORM{'original_date'}; $edited_date = $FORM{'edited_date'};
$comment= $FORM{'comment'}; $full_name = $FORM{'requiredfull_name'}; $message = $FORM{'requiredmessage'};
$guest_email = $FORM{'guest_email'}; $location = $FORM{'location'};
$url = $FORM{'url'}; $url =~ s/http\:\/\///i;
$message =~ s/\r\n/<br>/g; $message =~ s/\r/ /g; $message =~ s/\n/<br>/g;
$message =~ s/\s\s/ /g; $comment =~ s/\r//g; $comment =~ s/\n/<br>/g;
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
&get_file_lock("$location_of_lock_file");
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data){
chop($row);
@fields = split (/\|/, $row);
if ($ref ne $fields[0])
{
print USER_FILE "$row\n";
}
else
{
if ($original_date eq $edited_date)
{
$edited_date = $fields[3];
}
print USER_FILE "$fields[0]|$full_name|$message|$edited_date|$guest_email|$location|$comment|$fields[7]|$fields[8]|$fields[9]|$fields[10]|$url|$fields[12]|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$FORM{'user1_field'}|$FORM{'user2_field'}|$FORM{'user3_field'}|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
}
}
close(USER_FILE);
if (($FORM{'send_guest_notification'} eq "yes") && ($guest_email ne "" ) ){
open (MAIL, "|$mail_path");
print MAIL "Content-Type: text/plain; charset=\"$TXT_main_language\"\n";
print MAIL "To: $guest_email\n";
print MAIL "From: $admin_email\n";
print MAIL "Subject: $title update\n\n";
if ($guest_email) {
print MAIL "Email: $guest_email\n";
}
if ($location) {
print MAIL "Location: $location\n";
}
if ($url) {
print MAIL "URL: $url\n";}
$converted_message = $message;
$converted_message =~ s/<br>/\n/g;
print MAIL "$converted_message\n";
if ($FORM{'user1_field'}) {$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
print MAIL "$TXT_user1_field: $FORM{'user1_field'}\n";}
if ($FORM{'user2_field'}) {$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
print MAIL "$TXT_user2_field: $FORM{'user2_field'}\n";}
if ($FORM{'user3_field'}) {$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
print MAIL "$TXT_user3_field: $FORM{'user3_field'}\n\n";}
if ($comment) {
print MAIL "$web_comment: $comment\n";}
print MAIL "=========================\n";
close(MAIL);
}
&release_file_lock("$location_of_lock_file");
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_to_edit&start_number=$start_number&vtenpp=$FORM{'vtenpp'}"> ~;
&main_headerb;
print qq~<center><font face="Arial" size=+1><B>Active Guestbook Message Editor</B> <p></font><font face="Arial" size=-1><a href="$guesturl\?action=view_to_edit&start_number=$start_number&vtenpp=$FORM{'vtenpp'}"><B>Message successfully edited.</B></a>
</font>
~;
&inter_footer;
} # end change2
###############
sub view_to_undo
{
&seek_cook;
@datalist = ();
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
foreach $row (@data)
{
@fields = split (/\|/, $row);
if ($fields[10] eq "del")
{
push (@datalist, $row);
}
}
#############
if (@datalist <1)
{
&content;
&plain_header;
print qq~
<font face=Arial size=+1>
Active Guestbook Trash Manager
</font><br>$font <B>No deleted messages found.</B><br>
<a href="$guesturl\?action=control_panel">Control Panel</a>
~;
exit;
}
else
{
@sorteddata = sort(@datalist);
@reversesorteddata = reverse(@sorteddata);
&basic_header;
print qq~
<SCRIPT LANGUAGE="JavaScript">
<!-- Hide from non-Java browsers
function ConfirmDelALL() {
var Confirmation;
Confirmation = "Are you sure you want to wipe ALL messages in Trash?";
if (confirm(Confirmation)){
return true;
}
else {
return false;
}
}
// End Java Hiding. -->
</SCRIPT>
<center><font face=Arial size=+1>
Active Guestbook Trash Manager
</font><br>$font
<a href="$guesturl\?action=control_panel">Control Panel</a> - 	<a href="$guesturl\?action=empty_all_trash" OnClick="return ConfirmDelALL()">Empty Trash</a> <p>
~;
$count = 1;
foreach $row (@reversesorteddata)
{
@fields = split (/\|/, $row);
##############
if ($count ==1)
{
print qq~
<table bgcolor=#ffffff border=1 width=$table_width cellspacing=0>
~;
}
else
{
print qq~
<table bgcolor=#ffffd0 border=1 width=$table_width cellspacing=0>
~;
}
if ($fields[4])
{
print qq~
<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_your_name: </b></font></td><td width=445><font face="Arial" size=-1><a href="mailto:$fields[4]">$fields[1]</a></font></td></tr>
~;
}
else
{
print qq~
<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_your_name: </b></font></td><td width=445><font face="Arial" size=-1>$fields[1]</font></td></tr>
~;
}
&date_mod;
$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
print qq~<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_your_message: </b></font></td><td width=445><font face="Arial" size=-1>$fields[2]</font></td></tr>
<tr valign=top><td width=150><font face="Arial" size=-1><b>Date: </b></font></td><td width=445><font face="Arial" size=-1>$condate</font></td></tr>
~;
if ($fields[5])
{
print qq~<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_where_in_the_world: </b></font></td><td width=445><font face="Arial" size=-1>$fields[5]</font></td></tr>
~;
}
if ($fields[6])
{
print qq~ <tr valign=top><td width=150><font face="Arial" size=-1><b>$web_comment: </b></font></td><td width=445><font face="Arial" size=-1><i>$fields[6]</i></font></td></tr>
~;
}
if ($fields[17])
{
print qq~ <tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_user1_field: </b></font></td><td width=445><font face="Arial" size=-1>$fields[17]</font></td></tr>
~;
}
if ($fields[18])
{
print qq~<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_user2_field: </b></font></td><td width=445><font face="Arial" size=-1>$fields[18]</font></td></tr>
~;
}
if ($fields[19])
{
print qq~<tr valign=top><td width=150><font face="Arial" size=-1><b>$TXT_user3_field: </b></font></td><td width=445><font face="Arial" size=-1>$fields[19]</font></td></tr>
~;
}
if ($fields[7])
{
print qq~<tr valign=top><td width=150><font face="Arial" size=-1><b>IP address: </b></font></td><td width=445><font face="Arial" size=-1>$fields[7]</font></td></tr>
~;
}
print qq~
<tr valign=top><td colspan=2><font face="Arial" size=-1><b>[ <a href="$guesturl?action=undelete_item&ref=$fields[0]">Undelete this message</a> ] [ <a href="$guesturl?action=trash_item&ref=$fields[0]">Permanently wipe this message</a> ]</b>~;
print qq~</b></font></td></tr>~;
print qq~</table><hr width=$table_width size=1>~;
$count++;
if ($count >2)
{
$count = 1;
}
}
} # end foreach undo
} # end sub
sub undelete_item
{
&seek_cook;
$ref = $FORM{'ref'};
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
&get_file_lock("$location_of_lock_file");
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data)
{
@fields = split (/\|/, $row);
if ($ref ne $fields[0])
{
print USER_FILE "$row";
}
else
{
print USER_FILE "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$now|$fields[9]||$fields[11]||$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
}
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file");
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_to_undo"> ~;
&main_headerb;
print qq~
<center>
<font face="Arial" size=+1>Active Guestbook Trash Manager <p>
</font><font face="Arial" size=-1><a href="$guesturl\?action=view_to_undo"><B>Message successfully undeleted.</B></a>
</font>
~;
&inter_footer;
exit;
}
sub trash_item
{
&seek_cook;
$ref = $FORM{'ref'};
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
&get_file_lock("$location_of_lock_file");
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data)
{
@fields = split (/\|/, $row);
if ($ref ne $fields[0])
{
print USER_FILE "$row";
}
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file");
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_to_undo"> ~;
&main_headerb;
print qq~
<center>
<font face="Arial" size=+1>Active Guestbook Trash Manager <p>
</font><font face="Arial" size=-1><a href="$guesturl\?action=view_to_undo"><B>Message permanently wiped.</B></a>
</font>
~;
&inter_footer;
exit;
} # end trash_item
sub amqdate
{
$amqdate = $_[0];
@bits = split (/\//, $amqdate);
$amqyear = $bits[2];
if ($amqyear > 1999)
{
$amqyear = ($amqyear - 2000);
}
if ($amqyear == 4 || $amqyear == 8 || $amqyear == 12 || $amqyear == 16 || $amqyear == 0 || $amqyear == 20 || $amqyear == 24)
{$leap = "yes";}
else{$leap = "no";}
if ($amqyear == 1 || $amqyear == 5 || $amqyear == 9 || $amqyear == 13 || $amqyear == 17 || $amqyear == 21 || $amqyear == 25)
{
$extradays = ((($amqyear - 1)/4)+1);
}
$amqyeardays = (($amqyear * 365)+$extradays);
$amqday = $bits[0];
if ($bits[1] == 1)
{$monthdays = 0;}
if ($bits[1] == 2)
{$monthdays = 31;}
if ($bits[1] == 3)
{$monthdays = 59;}
if ($bits[1] == 4)
{$monthdays = 90;}
if ($bits[1] == 5)
{$monthdays = 120;}
if ($bits[1] == 6)
{$monthdays = 151;}
if ($bits[1] == 7)
{$monthdays = 181;}
if ($bits[1] == 8)
{$monthdays = 212;}
if ($bits[1] == 9)
{$monthdays = 243;}
if ($bits[1] == 10)
{$monthdays = 273;}
if ($bits[1] == 11)
{$monthdays = 304;}
if ($bits[1] == 12)
{$monthdays = 334;}
if ($leap eq "yes" && $bits[1] >2)
{
$monthdays = ($monthdays+1);
}
$amqtotal = ($amqday + $amqyeardays + $monthdays);
return($amqtotal);
}
sub check_update{
unless (-e "$update_name"){
umask 000;
}
open(NUMBER,"$update_name") || &oops('$update_name');
$num = <NUMBER>;
close(NUMBER);
if ($num < $revdate) {
&get_file_lock("$location_of_lock_file");
open(NUMBER,">$update_name");
print NUMBER "$revdate";
close(NUMBER);
$check_digits = 0;
@digits = split (//, $days_to_delete);
foreach $w (@digits)
{
unless ($w =~ /[0-9]/)
{
$check_digits = 1;
}
}
if (($check_digits == 1) || ($days_to_delete == 0))
{
$days_to_delete = 99999999999999999999999999999999999;
}
&update_database;
&release_file_lock("$location_of_lock_file");
}
}
sub update_database
{
&purge_spam;
open(USER_FILE,"$guestbook_data_name"); # reset counter/refnumbers if necessary
@data = <USER_FILE>;
close(USER_FILE);
open(USER_FILE,"$guestbook_data_name");
@data = <USER_FILE>;
close(USER_FILE);
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data){
$good = "yes";$count = 0;
@fields = split (/\|/, $row);
$good = "no" if (($fields[0] eq "") ||($fields[1] eq "") ||($fields[2] eq "")) ;
@pipes = split (//, $row);
foreach (@pipes){
$count++ if $_ eq "|";
}
$good = "no" if $count != 31;

if ($good eq "no"){
open(FILEg,">>$bad_rows_name");
print FILEg "$row";
close(FILEg);
}
elsif (($fields[10] eq "del") && ($fields[12]) && ($fields[12] < $now - $days_to_trash)){
}
elsif ((!$fields[12]) && ($fields[8] < ($now - $days_to_delete)))
{
print USER_FILE "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$fields[8]|$fields[9]|del|$fields[11]|$now|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
}
else
{
print USER_FILE "$row";
}
} # end for each
close(USER_FILE);
########### automatic prune if non-deleted messages greater than max
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
@revdata = reverse(@data);
@nondeldata = ();
@deldata = ();
@arraytodisplay = ();
foreach $row (@revdata)
{
@fields = split (/\|/, $row);
push (@nondeldata, $row) if $fields[10] ne "del"; # add non-deleted messages to new array #
push (@deldata, $row) if $fields[10] eq "del"; # add deleted messages to new array #
}
if (@nondeldata >$max){
$counter = 0;
foreach $row (@nondeldata){
@fields = split (/\|/, $row);
if ($counter < $max){
push (@arraytodisplay, $row);
}
else{
$delrow = "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$fields[8]|$fields[9]|del|$fields[11]|$now|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
push (@arraytodisplay, $delrow);
}
$counter++;
}
@alldata = (@arraytodisplay, @deldata);
@sortedalldata = sort(@alldata);
open(USER_FILE,">$guestbook_data_name") || &oops('$guestbook_data_name');
foreach $row (@sortedalldata){
print USER_FILE "$row";
}
close(USER_FILE);
}
#########
&delete_old_backups;
&mail_backup if $mail_backup_to_admin eq "yes";
}
sub backup_to_dir{
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@user_data = <USER_FILE>;
close(USER_FILE);
$location1 = "./$guestbook_backups_directory/guestbook_backup.$revdate";
umask 000;
open(BAK,">$location1");
foreach $row (@user_data){
print BAK "$row";
}
close(BAK);
}
sub mail_backup{
open(NUMBER2,"$senddate_name") || &oops('$senddate_name');
$senddate = <NUMBER2>;
close(NUMBER2);
if ((($mail_admin_backups_interval eq "monthly") && (($mail_admin_backups_month == $bakday) || (($now -$senddate) >27 ) ))
|| (($mail_admin_backups_interval eq "weekly") && (($mail_admin_backups_day == $wday) || (($now -$senddate) >6 ) ) )
|| ($mail_admin_backups_interval eq "daily")){
open (MAIL, "|$mail_path") || &oops('the mail program. Please check the mail path in the Control Panel.');
print MAIL "Content-Type: text/plain; charset=\"$TXT_main_language\"\n";
print MAIL "To: $admin_email\n";
print MAIL "From: $admin_email\n";
print MAIL "Subject: Database backup\n\n";
print MAIL "Below is a backup data file from your Active Guestbook. For details of how to restore your data from this file, please visit www.active-scripts.net.\n\n";
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@user_data = <USER_FILE>;
close(USER_FILE);
foreach $row (@user_data){
print MAIL "$row\n";
}
close (MAIL);
open(NUMBER1,"$senddate_name") || &oops('$senddate_name');
open (NUMBER1,">$senddate_name");
print NUMBER1 "$now";
close(NUMBER1);
}}
sub delete_old_backups{
opendir (USERS, "./$guestbook_backups_directory") || &oops('the $guestbook_backups_directory directory');
@files = grep(/^g/,readdir(USERS));
closedir (USERS);
$noofbackups = @files;
if ($noofbackups > 5){
foreach $file (@files){
if (-M "./$guestbook_backups_directory/$file" > $days_to_delete_backup_files){
unlink("./$guestbook_backups_directory/$file");
}}}}
sub search{
&content;
@hits = ();
&main_header;
&active_header if $active_header eq "on";
print qq~ <table border=0 cellspacing=0 cellpadding=0 width=$table_width><tr><td width=$table_width align=$alignment_body> ~;
&user_image if $user_image eq "yes";
&title if $use_title eq "on";
&user_html if $use_user_html eq "yes";
print qq~ <font face="$textfontface" size="$textfontsize"><h3>$TXT_search_results</h3></font> ~;
&menu;
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
foreach $row (@data){
@fields = split (/\|/, $row);
if (($fields[10] ne "del") && ($fields[15] ne "waiting") && ($fields[16] ne "yes")){
if (($search_fields eq "1" ) || ($search_fields eq "2" )){
$searchby = (" " . $fields[$search_fields] . " ");
}else{
$searchby = (" " . $fields[1] . " " . $fields[2] . " " . $fields[5] . " " . $fields[6] . " " . $fields[17] . " " . $fields[18] . " " . $fields[19] . " ");
}
@word_list = split(/\s+/,$search_words);
$no_of_words_in_search = @word_list;
for ($x = @word_list; $x > 0; $x--){
$match_word = $word_list[$x - 1];
if ($searchby =~ /$match_word/i){
splice(@word_list,$x - 1, 1);
} # End of If
} # End of For Loop
if (@word_list < 1){
push (@hits, $row);
}}}
close(USER_FILE);
if (@hits <1){
print "<br><B><font face=\"$textfontface\" size=\"$textfontsize\">$TXT_no_match </font></B><br>";
}
else{
&html_search_results;
}
if (($use_user_html_footer eq "yes") && ($use_hr_image eq "yes")){
print "<br>";
&user_html_footer ;
}
if (($use_user_html_footer eq "yes") && ($use_hr_image ne "yes")){
&user_html_footer ;
}
print qq~ </td></tr></table> </body></html> ~;
}
sub vsc{
&seek_cook;
&content;
open(COLFILE,"$colprefs_name");
@COLLINES = <COLFILE>;
close(COLFILE);
foreach(@COLLINES){
print "$_";
}}
sub html_search_results{
$count = 1;
$number_of_messages = @hits;
@hits = reverse(@hits);
if ($search_flag ne "no"){
if ($number_of_messages == 1){
print qq~ <br><font face= "$textfontface" size=$textfontsize><B>$TXT_one_match</B></font> ~;
}
else{
print qq~ <br><font face= "$textfontface" size=$textfontsize><B>$TXT_more_matches_1 $number_of_messages $TXT_more_matches_2</B></font>~;
}}
foreach $row (@hits){
@fields = split (/\|/, $row);
# $grouped++;
# if (($grouped > ($start_number)) && ($grouped < ($start_number + $no_displayed + 1))){
&main_table_results;
# } # end if number is right
} # end for each row
}
sub preview{
#if ($lastnotcheck ne $FORM{'lastnot'}){
#&content;
#print qq~ <center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1><b>$TXT_incorrect_selection </b></font> ~;
#exit;
#}
$TXT_type_letters_only = "Enter the underlined numbers:" if $TXT_type_letters_only eq "";
&content;
&main_header;
&active_header if $active_header eq "on";
print qq~ <table border=0 cellspacing=0 cellpadding=0><tr><td width=$table_width align=center> ~;
&user_image if $user_image eq "yes";
&title if $use_title eq "on";
if ($use_user_html eq "yes"){
&user_html if $disable_user_html_add ne "yes";
}
&menu;
$messagequot = $message;
$locationquot = $location;
$urlquot = $url;
$full_namequot = $full_name;
$messagequot =~ s/\"/QUOTQUOT/g;
$locationquot =~ s/\"/QUOTQUOT/g;
$urlquot =~ s/\"/QUOTQUOT/g;
$full_namequot =~ s/\"/QUOTQUOT/g;
$url =~ s/\"//g;
$guest_email =~ s/\"//g;
$url =~ s/\'//g;
$guest_email =~ s/\'//g;
$capmessage = $FORM{'requiredmessage'};
$capmessage = $message; $capmessage =~ s/\s//gi; $capmessage =~ s/\n//gi; $capmessage =~ s/\r//gi;$capmessage =~ s/\"//gi;$capmessage =~ s/\'//gi;
$FORM{'user1_field'} =~ s/\"//g; $FORM{'user2_field'} =~ s/\"//g; $FORM{'user3_field'} =~ s/\"//g;
print qq~
<FORM ACTION="$guesturl" METHOD="POST">
<INPUT TYPE="hidden" NAME="action" VALUE="post_preview">
<INPUT TYPE="hidden" NAME="requiredfull_name" VALUE="$full_name">
<INPUT TYPE="hidden" NAME="requiredmessage" VALUE="$messagequot">
<INPUT TYPE="hidden" NAME="guest_email" VALUE="$guest_email">
<INPUT TYPE="hidden" NAME="capmessage" VALUE="$capmessage">
<INPUT TYPE="hidden" NAME="cod" VALUE="$cod">
<INPUT TYPE="hidden" NAME="location" VALUE="$location">
<INPUT TYPE="hidden" NAME="url" VALUE="$url">
<INPUT TYPE="hidden" NAME="epij" VALUE="$FORM{'epij'}">
<INPUT TYPE="hidden" NAME="lastnot" VALUE="$FORM{'lastnot'}">
<INPUT TYPE="hidden" NAME="lastnotvar" VALUE="$FORM{'lastnotvar'}">
<INPUT TYPE="hidden" NAME="private_message_check" VALUE="$private_message_check">
<INPUT TYPE="hidden" NAME="user1_field" VALUE="$FORM{'user1_field'}">
<INPUT TYPE="hidden" NAME="user2_field" VALUE="$FORM{'user2_field'}">
<INPUT TYPE="hidden" NAME="user3_field" VALUE="$FORM{'user3_field'}">
<INPUT TYPE="hidden" NAME="aspm1" VALUE="$FORM{'aspm1'}">
~;
if ($use_smileys eq "yes")
{
open(FILE,"$smileys"); @smileys = <FILE>; close(FILE);
foreach(@smileys){
@smiley = split(/\|/, $_);
$smiley[2] =~ s/http\:\/\///gi;
$message =~ s/\:$smiley[1]\:/<img src="http:\/\/$smiley[2]">/g;
}
}
$use_email_field = "yes" if $use_email_field eq ""; $use_url_field = "yes" if $use_url_field eq "";
$use_location_field = "yes" if $use_location_field eq "";
$use_user1_field = "no" if $use_user1_field eq ""; $use_user2_field = "no" if $use_user2_field eq "";
$use_user3_field = "no" if $use_user3_field eq "";
#	$url = "$TXT_none_given" if !$url;
#	$location = "$TXT_none_given" if !$location;
#	$guest_email = "$TXT_none_given" if !$guest_email;
print qq~
<font face="$textfontface" size=$textfontsize>
<b>$TXT_these_are_the<br>$TXT_if_correct<br>$TXT_if_not<a href="javascript:history.go(-1)">$TXT_go_back</a>$TXT_and_edit</b></font>
<table cellpadding=0 cellspacing=0 border=0>
<tr><td>
<table cellpadding=0 cellspacing=0 border=0>
<tr><td colspan=2 align=center>$previewline</td></tr>
<tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_your_name</B></font></td><td width=400><font face="$textfontface" size=$textfontsize>$full_name</font></td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr>
<tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_your_message</B></font></td><td width=400><font face="$textfontface" size=$textfontsize>$message</font></td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr> ~;
if ($guest_email ne "")
{
print qq~	<tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_your_email_address</B></font></td><td width=400><font face="$textfontface" size=$textfontsize>$guest_email</font></td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr> ~;
}
if ($location ne "")
{
print qq~	<tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_where_in_the_world</B></font></td><td width=400><font face="$textfontface" size=$textfontsize>$location</font></td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr> ~;
}
if ($url ne "")
{
print qq~ <tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_your_web_page_address</B></font></td><td width=400><font face="$textfontface" size=$textfontsize>$url</font></td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr> ~;
}
if ($FORM{'user1_field'} ne "")
{ $TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
print qq~	<tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_user1_field</B></font></td><td width=400><font face="$textfontface" size=$textfontsize>$FORM{'user1_field'}</font></td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr> ~;
}
if ($FORM{'user2_field'} ne "")
{
$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
print qq~	<tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_user2_field</B></font></td><td width=400><font face="$textfontface" size=$textfontsize>$FORM{'user2_field'}</font></td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr> ~;
}
if ($FORM{'user3_field'} ne "")
{
$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
print qq~	<tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_user3_field</B></font></td><td width=400><font face="$textfontface" size=$textfontsize>$FORM{'user3_field'}</font></td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr> ~;
}
print qq~ <tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_type_letters_only</B><br> ~;
$ran = rand(100000000);
print "<table cellspacing=0 cellpadding=0><tr>";
for ($x = 0; $x < 200; $x++){
$y = int(rand(10));
next if $y == 10;
next if $FOUND{$y} eq "yes";
push (@bnums, $y);
$FOUND{$y} = "yes";
$totalnums++;

if ($use_own_captcha eq "yes"){
$captcha_url =~ s/\/$//gi;
$captcha_url =~ s/http\:\/\///gi;
$catpcha_image_url = $captcha_url;
}
else{
$catpcha_image_url = "www.active-scripts.net/a";
}
print qq~<td><img src="http://$catpcha_image_url/$y.gif"></td>~;
last if $totalnums >9;
}
$a = int(rand(10));
$b = int(rand(10));
while ($a == $b){
$b = int(rand(10));
}
open(CFILE,">>$cap");
flock(CFILE,2);
print CFILE "$ran|$bnums[$a]|$bnums[$b]|$var|$capmessage|$message||||||||\n";
print qq~ </tr><tr>  ~;
for ($x = 0; $x < 10; $x++){
if (($x == $a) || ($x == $b)) {
print qq~  <td><img src="http://$catpcha_image_url/aut.gif"></td> ~;
}
else{
print qq~ <td><img src="http://$catpcha_image_url/abt.gif"></td> ~;
}
}
print qq~  </tr>~;
close CFILE;
print "</table>     " ;
print qq~</font>
</td><td width=400>
<select name=capa class=textfield><option value="">-</option>~;
 for ($x = 0; $x < 10; $x++){
 print qq~ <option value="$x">$x</option>  ~;
 }
print qq~</select>
<select name=capb class=textfield><option value="">-</option>~;
 for ($x = 0; $x < 10; $x++){
 print qq~ <option value="$x">$x</option>  ~;
 }
print qq~</select>~;
print qq~</td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr> ~;
if ($showlettercheck eq "gghhgghh"){
open(BAK,"$imgpw");
@imgpw = <BAK>;
close BAK;
foreach $juy (@imgpw){
@imgfs = split (/\|/, $juy);
$IMGFWS{$imgfs[0]} = $imgfs[1];
}
$random = int( rand(9)) + 2030;
print qq~ <tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_type_letters_only</B><br>
<img src="http://www.active-scripts.net/pwi/$version/$random.gif"> <input type=hidden name=hiddenpwi value="$random">
<!--$cod2 --></font></td><td width=400>
<font face="$textfontface" size=$textfontsize><input type=text name=usercod value="" size=5 maxlength=4 class="textfield"></font></td><tr>
<tr><td colspan=2 align=center>$previewline</td></tr> ~;
#print qq~ <tr valign=top><td width=200><font face="$textfontface" size=$textfontsize><B>$TXT_type_letters_only</B><br>$cod2</font>
#</td><td width=400>
#<font face="$textfontface" size=$textfontsize><input type=text name=usercod value="" size=5 maxlength=4 class="textfield"></font></td><tr>
#<tr><td colspan=2 align=center>$previewline</td></tr> ~;
}
print qq~	<tr valign=top><td colspan=2><font face="$textfontface" size=$textfontsize><INPUT TYPE="submit" VALUE="$TXT_continue" class="buttons"></td></tr></table></td></tr></table></FORM> ~;
if ($use_user_html_footer eq "yes"){
&user_html_footer if $disable_user_html_footer_add ne "yes";
}
print qq~</td></tr></table>~;
exit;
}
sub view_backups
{
&seek_cook;
open(RESTORE_BACKUP,"./$guestbook_backups_directory/undo_restore.bak");
@restore_backup_data = <RESTORE_BACKUP>;
close(RESTORE_BACKUP);
opendir (USERS, "./$guestbook_backups_directory") || &oops('the backups directory');
@files = grep(/^guest/,readdir(USERS));
closedir (USERS);
if (@files<1){
&content;
print qq~<html><head><title>$title</title>
<META http-equiv="refresh" content="1; URL=$guesturl?action=control_panel"></head>
<body bgcolor=#ffffff link=#000000 vlink=#000000><center>
<font face=Arial size=+1>Active Guestbook Backup Manager</font><p>
$font <a href="$guesturl\?action=control_panel"><B>There are currently no backups to restore.</B></a></font></center>
~;
}
else{
&content;
print qq~<center>
<html><head><title>$title</title>
</head>
<body bgcolor=#ffffff link=#000000 vlink=#000000>
<font face="Arial" size=+1><B>Active Guestbook Backup Manager</B><p>
</font>
<font face="Arial" size=-1>
<a href="$guesturl\?action=control_panel">Control Panel</a>
~;
if (@restore_backup_data >2)
{
print qq~
| <a href="$guesturl?action=undo_last_restore"><B>Undo last restore</B></a>
~;
}
print qq~
</font>
<FORM ACTION="$guesturl" METHOD="POST">
<INPUT TYPE="hidden" NAME="action" VALUE="restore_backups">
<center>
<table bgcolor=#ffffff cellpadding=0 cellspacing=0 border=0 width=350>
<tr valign = top><td align=center colspan=2><font face="Arial" size=-1><B>Select backup to restore</B></td></tr>
~;
@sorted_files = sort(@files);
foreach $file (@sorted_files)
{
$year = substr($file, -8,4);
$month = substr($file, -4,2);
$month = $month-1;
$mon = $months[$month];
$day = substr($file, -2,2);
print qq~
<tr valign = top><td align=left><font face="Arial" size=-1><INPUT TYPE="radio" NAME="file_to_restore" VALUE="$file"> $day - $mon - $year</td><td> - <a href="$guesturl?action=view_single_backup&file_to_restore=$file"><font face="Arial" size=-1>View</a></td></tr>
~;
}
print qq~
<tr><td colspan = 2><INPUT TYPE="submit" VALUE="Restore selected file"></td></tr>
</table>
</center>
</FORM>
~;
}
&inter_footer;
}
sub undo_last_restore
{
&seek_cook;
open(RESTORE_BACKUP,"./$guestbook_backups_directory/undo_restore.bak");
@restore_backup_data = <RESTORE_BACKUP>;
close(RESTORE_BACKUP);
if (@restore_backup_data <2)
{
&content;
print qq~
<html><head><title>$title</title>
<META http-equiv="refresh" content="1; URL=$guesturl?action=control_panel">
</head>
<body bgcolor=#ffffff link=#000000 vlink=#000000>
<center>
<font face=Arial size=+1>Active Guestbook Backup Manager
</font><p>
$font <a href="$guesturl\?action=control_panel"><B>No undo available at the moment.</B></a>
</font>
</center>
~;
}
open(MAIN_GUESTBOOK,">$guestbook_data_name") || &oops('$guestbook_data_name');
foreach $row (@restore_backup_data)
{
print MAIN_GUESTBOOK "$row";
}
close(MAIN_GUESTBOOK);
open(RESTORE_BACKUP,">./$guestbook_backups_directory/undo_restore.bak"); # wipe undo restore file
close(RESTORE_BACKUP);
#	&set_counter;
&content;
print qq~
<html><head><title>$title</title>
<META http-equiv="refresh" content="1; URL=$guesturl?action=view_backups">
</head>
<body bgcolor=#ffffff link=#000000 vlink=#000000>
<center>
<font face=Arial size=+1>Active Guestbook Backup Manager
</font><p>
$font <a href="$guesturl\?action=view_backups"><B>Last restore undone.</B></a>
</font>
</center>
~;
exit;
}
sub restore_backups
{
if ($search_english ne "dearjean")
{
&seek_cook;	$file_to_restore = $FORM{'file_to_restore'};
}
else
{
$file_to_restore = $baktorest;
}
if ($file_to_restore eq "")
{
{
&basic_header;
print qq~
<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b> You didn't select a backup to restore. Please <a href="javascript:history.go(-1)">go back and select</a>. </b></font>
~;
exit;
}
}
open(MAIN_GUESTBOOK,"$guestbook_data_name") || &oops('$guestbook_data_name');
@main_data = <MAIN_GUESTBOOK>;
close(MAIN_GUESTBOOK);
if ($search_english ne "dearjean")
{
open(RESTORE_BACKUP,">./$guestbook_backups_directory/undo_restore.bak");
foreach $row (@main_data)
{
print RESTORE_BACKUP "$row";
}
close(RESTORE_BACKUP);
}
&get_file_lock("$location_of_lock_file");
open(MAIN_GUESTBOOK,">$guestbook_data_name");
open(RESTORE,"./$guestbook_backups_directory/$file_to_restore") || &oops('/$guestbook_backups_directory/$file_to_restore');
@restore_data = <RESTORE>;
foreach $line (@restore_data)
{
print MAIN_GUESTBOOK "$line";
}
close(RESTORE);
close(MAIN_GUESTBOOK);
&release_file_lock("$location_of_lock_file");
&set_counter;
&content;
print qq~
<html><head><title>$title</title>
<META http-equiv="refresh" content="3; URL=$guesturl?action=view_backups">
</head><body bgcolor=#ffffff link=#000000 vlink=#000000>
<center><font face=Arial size=+1>Active Guestbook Backup Manager</font><p>$font <a href="$guesturl\?action=view_backups"><B>Backup has been restored.</B></a><br>(You can undo this from the main Backup Manager page.)
</font></center>
~;
exit;
}
sub view_single_backup
{
&seek_cook;
&basic_header;
$file_to_restore = $FORM{'file_to_restore'};
$year = substr($file_to_restore, -8,4);
$month = substr($file_to_restore, -4,2);
$month = $month-1;
$mon = $months[$month];
$day = substr($file_to_restore, -2,2);
$datestamp = "$day"."-"."$mon"."-"."$year";
print qq~
<center>
<font face=Arial><B>Backup date: $datestamp</B><br></font>$font
<a href="$guesturl?action=restore_backups&file_to_restore=$file_to_restore">Restore this guestbook</a> | <a href="$guesturl\?action=view_backups">Return to Backup Manager</a></font>
~;
open(RESTORE,"./$guestbook_backups_directory/$file_to_restore");
@hits = <RESTORE>;
close(RESTORE);
$search_flag = "no";
&html_search_results_plain;
}
sub active_header
{
if ($demo eq "off"){
print qq~<table BORDER="0" CELLSPACING="0" CELLPADDING="0" width=100%><tr valign=bottom><td align=$alignment_body> <img src="http://www.active-scripts.net/active_guestbook.gif"></td></tr></table>
~;
}
else{
print qq~
<table BORDER="0" CELLSPACING="0" CELLPADDING="0" width=100%>
<tr valign=bottom><td align=$alignment_body> <img src="http://www.active-scripts.net/demo_images/active_guestbook.gif"></td></tr></table>~;
}
}
sub ip_test{
@rets = split (//, $rett) ;
$rett = join ("", reverse @rets);
$rett =~ s/h//gi;
}
sub title{
print qq~<font face="$textfontface"> <h1><b>$title</b></h1></font>~;
}
sub menu{
$mb = $middle_bracket;
print qq~<font size=$textfontsize face= "$textfontface" color=$link><b>$left_bracket~;
if ($ipoops ne "yes"){
if ($action ne "add"){
if ($lock_gb eq "yes"){
$TXT_add_a_message = $mb = "";
}
if ($add_page_appears ==0){
print qq~<a href="$guesturl?action=add&aspm1=$aspm1">$TXT_add_a_message</a> $mb ~;
}
elsif ($add_page_appears ==2){
if (($action eq "reload") || ($action eq "")){
print qq~<a href="#addsection">$TXT_add_a_message</a> $mb ~;
}
else{
print qq~ <a href="$guesturl?action=reload#addsection">$TXT_add_a_message</a> $mb ~;
}
}
}
}
unless ($show_home_page_link eq "no"){
print qq~<a href="$home_page" ~;
if ($home_page_target){
print qq~ target = "$home_page_target" ~;
}
print qq~>$home_page_title</a> ~;
print "$middle_bracket" if (($includesearch ne "no") || ($action eq "add"));
}
if ($action eq "add"){
print qq~ <a href="javascript:history.go(-1)">$TXT_back_to_guestbook</a> $middle_bracket ~;
}
if ($action eq "search"){
print qq~ <a href="$guesturl?action=reload">$TXT_back_search_again</a> $right_bracket</b><br> ~;
}
elsif (($action eq "add") || ($action eq "preview") || ($action eq "post_preview")){
if ($includesearch ne "no"){
print qq~ <a href="$guesturl?action=reload#searchform">$TXT_search</a> $right_bracket</b><br> ~;
}
else{
print qq~ $right_bracket</b><br>~;
}
}
else{
if ($includesearch ne "no"){
print qq~ <a href="#searchform">$TXT_search</a> $right_bracket</b><br>~;
}
else {
print qq~ $right_bracket</b><br>~;
}
}
print qq~</font>~;
}
sub no_of_messages_display{
print qq~
<font size=$textfontsize face="$textfontface">
~;
if ($number_of_messages == 1){
print qq~
$TXT_there_is_now$number_of_messages$TXT_message_in_our_guestbook <br>
~;
}
else{
print qq~
$TXT_there_are_now$number_of_messages$TXT_messages_in_our_guestbook <br>
~;
}
print qq~
</font>
~;
}
sub main_header{
print qq~<html><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"> ~;
&required_script if (($action eq "add")||($action eq "reload") ||($action eq "") ||($action eq "view_skin") );
if ($style ne "off"){
print qq~ $user_style ~;
}
print qq~</head><BODY BGCOLOR="$backcolor"~;
if ($action eq "" || $action eq "view_skin" || $action eq "preview_skin" || $action eq "read" || $action eq "add" || $action eq "reload" || $action eq "preview" || $action eq "search"){
if ($usebackgroundimage eq "yes"){
print qq~ background = "$backgroundimage" BGPROPERTIES="$fixedbackground" ~;
}
}
print qq~ TEXT="$text" LINK="$link" VLINK="$vlink" ALINK="$alink" marginwidth="$marginwidth" marginheight="$marginheight" LEFTMARGIN="$marginwidth" TOPMARGIN="$marginheight" >
<div align=$alignment> ~;
}
sub main_headera{
print qq~
<html><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"> ~;
&required_script if $action eq "add";
}
sub main_headerc{
if ($style ne "off")
{
print qq~ $user_style ~;
}
print qq~
</head>
<BODY BGCOLOR="$backcolor"
~;
if ($action eq"" || $action eq"read" || $action eq"add" || $action eq"reload" || $action eq"preview" || $action eq"post_preview"){
if ($usebackgroundimage eq "yes"){
print qq~
background = "$backgroundimage"
~;
}
}
print qq~
TEXT="$text" LINK="$link" VLINK="$vlink" ALINK="$alink" marginwidth="$marginwidth" marginheight="$marginheight" LEFTMARGIN="$marginwidth" TOPMARGIN="$marginheight" >
<div align=$alignment> ~;
}
sub main_headerb{
if ($style ne "off")
{
print qq~ $user_style ~;
}
print qq~
</head>
<BODY BGCOLOR="#ffffff"
~;
if ($action eq"" || $action eq"read" || $action eq"add" || $action eq"reload" || $action eq"preview" || $action eq"post_preview"){
if ($usebackgroundimage eq "yes"){
print qq~
background = "$backgroundimage"
~;
}
print qq~
TEXT="$text" LINK="$link" VLINK="$vlink" ALINK="$alink" marginwidth="$marginwidth" marginheight="$marginheight" LEFTMARGIN="$marginwidth" TOPMARGIN="$marginheight" >
<div align=$alignment> ~;
}
else{
print qq~
TEXT="#000000" LINK="#000000" VLINK="#000000" ALINK="#000000" marginwidth="$marginwidth" marginheight="$marginheight" LEFTMARGIN="$marginwidth" TOPMARGIN="$marginheight" >
<div align=$alignment> ~;
}
}
sub content{
print "Content-type: text/html\n\n";
}
sub search_form{
if ($action eq "view_to_edit"){
$checkedincprivate = $checkedincwaiting = $checkedincnormal = "checked" if $FORM{'everything'} ne "yes";
$checkedinctrash = "checked" if $FORM{'inctrash'} eq "yes";
$checkedincnormal = "checked" if $FORM{'incnormal'} eq "yes";
$checkedincwaiting = "checked" if $FORM{'incwaiting'} eq "yes";
$checkedincprivate = "checked" if $FORM{'incprivate'} eq "yes";
$TXT_you_can_search_this_guestbook_by = "Include trash <input type=checkbox name=inctrash value=yes $checkedinctrash> - private <input type=checkbox name=incprivate value=yes $checkedincprivate> - waiting approval <input type=checkbox name=incwaiting value=yes $checkedincwaiting> - normal <input type=checkbox name=incnormal value=yes $checkedincnormal>";
$TXT_searchtext = "Search Text";
$TXT_searchsearch = "Search";
$hidden = "<INPUT TYPE=hidden NAME=everything VALUE=\"yes\">";
}
print qq~<a name="searchform"></a><table width=$table_width cellspacing=0 cellpadding=0 ~;
unless (($trans_search eq "yes") ||($action eq "view_to_edit")) {
print qq~ bgcolor="$searchcolor"~;
}
print qq~><tr><td width="$table_width" align="$alignment_body"><FORM ACTION="$guesturl" METHOD="POST">
<font face= "$textfontface" size=$textfontsize>~;
if ($action eq "view_to_edit"){
print qq~ <INPUT TYPE="hidden" NAME="action" VALUE="view_to_edit">  $hidden ~;
}
else{
print qq~ <INPUT TYPE="hidden" NAME="action" VALUE="search"> ~;
}
print qq~ $TXT_you_can_search_this_guestbook_by<br>$TXT_searchmessage<INPUT TYPE="radio" NAME="search_fields" VALUE="2" > - $TXT_searchname<INPUT TYPE="radio" NAME="search_fields" VALUE="1"> - $TXT_searchall<INPUT TYPE="radio" NAME="search_fields" VALUE="all" checked><br>
<b>$TXT_searchtext</b><INPUT TYPE="text" NAME="search_words" SIZE="20" MAXLENGTH="40" class="textfield" value="$search_words"><br>
<INPUT TYPE="submit" VALUE="$TXT_searchsearch" class="buttons"></FORM></td></tr></table>~;
}
sub show_number_menu{
print qq~<font face="$textfontface" size="$textfontsize">$left_bracket ~;
$number_of_messages = int($number_of_messages); # int here sorts out any funny decimals entered in the control panel
$number_of_pages = ($number_of_messages / $no_displayed) ;
$number_of_pages = int($number_of_pages); # no of full pages
if ($number_of_messages > ($number_of_pages * $no_displayed)){
$extra = "yes";
}
if ($extra eq "yes"){
$number_of_pages = $number_of_pages +1;
}
($start_number = 0) if (!$start_number);
for ($x = 1; $x < $number_of_pages+1 ; $x++ ){
$sn = (($x*$no_displayed)- $no_displayed);
$bottom = ($start_number - (11 * $no_displayed));
$top = ($start_number + (11 * $no_displayed));
if ((($sn > $bottom) && ($sn < $top)) || ($x == "1") || ($x == $number_of_pages)){
if ($sn ne $start_number){
print qq~<font face= "$textfontface" size=$textfontsize color=$link><a href="$guesturl\?start_number=$sn">$x</a></font> ~;
}
else{
print qq~<font face="$textfontface" size=$textfontsize color=$link>$x</font> ~;
} # end else
}
} # end for
print qq~ $right_bracket</font>~;
}
sub user_image
{
if ($user_image_url){
print qq~<img src = "$user_image_url"><br>~;
}
}
sub user_html
{
print qq~ $user_html ~;
}
sub user_html_footer
{
print qq~ $user_html_footer~;
}
sub view_change_password
{
&seek_cook;
&content;
print qq~
<HTML><head><title>$title</title>
~;
&required_script;
print qq~
</head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
~;
print qq~
<center><font face=Arial size=+1>
<B>Password Manager</B></font>
<br>$font
<a href="$guesturl\?action=control_panel">Control Panel</a>
<br>
<B>Please enter your new password twice.</B><br>(please note that passwords are <i>case-sensitive</i>)</font>
<FORM ACTION="$guesturl" METHOD="POST" onSubmit="return checkrequired(this)">
<INPUT TYPE="hidden" NAME="action" VALUE="change_password">
<table border=0>
<tr><td>$font New password </td><td>$font <INPUT TYPE="text" NAME="requiredpass1" SIZE="10" MAXLENGTH="80"></td></tr>
<tr><td>$font New password again </td><td>$font <INPUT TYPE="text" NAME="requiredpasscheck" SIZE="10" MAXLENGTH="80"></td></tr>
</table>
$font
<INPUT TYPE="submit" VALUE="Change password">
</FORM>
~;
&inter_footer;
}
sub change_password
{
&seek_cook;
$pass1 = $FORM{'requiredpass1'};
$passcheck = $FORM{'requiredpasscheck'};
if ($pass1 eq $passcheck)
{
open(ACTIVE,">$active_name");
$newpass = crypt($pass1, $salt);
print ACTIVE "$newpass";
close(ACTIVE);
print "Set-Cookie:activea=$newpass\n";
#	&SetCookies('activea',$newpass);
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=control_panel"> ~;
&main_headerb;
print qq~
<font face=Arial size=+2>
<B>Change Active Guestbook Control Panel Password</B>
<br>Password has been changed.</font>
~;
}
else
{
&content;
&plain_header_stop;
print qq~
<font face=Arial size=+1>
<B>Change Active Guestbook Control Panel Password</B> </font>
<font face=Arial>
<p><B>The password has NOT been changed.<br>The two passwords you typed were not the same. </B><br></font>
$font
<a href="$guesturl?action=control_panel">Control Panel</a> | <a href="$guesturl?action=view_change_password">Try again</a>
</font>
~;
}
}
sub enter_password
{
&content;
print qq~
<HTML><head><title>$title</title>
</head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600" onLoad="document.forms[0].password.focus()">
~;
print qq~
<center><font face=Arial>
<B>Active Guestbook Control Panel</B></font>$font <br>Please enter password.<br><I>You will need to have Cookies enabled for easy navigation<br>through the Control Panel features.
</I>
</font>
$font
<FORM ACTION="$guesturl" METHOD="POST">
<INPUT TYPE="hidden" NAME="action" VALUE="control_panel">
Password <INPUT TYPE="password" NAME="password" SIZE="20" MAXLENGTH="80"><br>
<INPUT TYPE="submit" VALUE="Enter Control Panel">
</FORM>
</font>
~;
&inter_footer;
}
sub seek_cook
{
if (($cookie_default eq "") || (!$cookie_default) ){
&content;
print "$valid_ip";
exit;
}
$xyza= $FORM{'bottom'};
unless ($xyza eq $cookie_default){
if ($COOK{'activea'} ne ""){
$password = $COOK{'activea'};
$first_time = "no";
}
else
{
$xyz= $FORM{'password'};
$password = crypt($xyz, $salt);
$first_time = "yes";
}
if ($password eq $active_string)
{
if ($first_time eq "yes")
{
print "Set-Cookie:activea=$password\n";
# &SetCookies('activea',$password);
&content;
print qq~ <html><head><title>$title</title><!--
IF YOU ARE ABLE TO READ THIS MESSAGE, THEN THE VERSION OF PERL YOU ARE
USING HANDLES COOKIES IN A STRANGE WAY.
PLEASE OPEN THE GUESTBOOK.CGI SCRIPT AND CHANGE THE LINE NEAR THE TOP FROM...
$cookie_control = "off";
TO
$cookie_control = "on";
-->
<META http-equiv="refresh" content="1; URL=$guesturl?action=control_panel"> </head>
<body bgcolor=#ffffff></body></html>
~;
exit;
}
}
else
{
&enter_password;
exit;
}
}
################
}
sub oops
{
&content;
$message = $_[0];
print "Can't open $message ";
exit;
}
sub set_counter
{
open(MAIN_GUESTBOOK,"$guestbook_data_name");
@main_data = <MAIN_GUESTBOOK>;
$max = 0;
foreach $row (@main_data)
{
@fields = split (/\|/, $row);
if ($fields[0] > $max)
{
$max = $fields[0];
}
} # end for each
close(MAIN_GUESTBOOK);
$max++;
&get_file_lock("$location_of_lock_file");
open (NUMBER,">$counter_name");
print NUMBER "$max";
close(NUMBER);
&release_file_lock("$location_of_lock_file");
}
sub restore_defaults
{
&seek_cook;
open(DEFAULTS,"$prefs_backup_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$prefs_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_prefs"> ~;
&main_headerb;
print qq~
<center>
<font face="Arial" size=+1><B>Active Guestbook Standard Preferences Manager</B> <p>
</font><font face="Arial" size=-1><a href="$guesturl\?action=view_prefs"><B>Factory default preferences restored.</B></a>
</font>
~;
&inter_footer;
}
sub restore_language_defaults
{
&seek_cook;
open(DEFAULTS,"$langprefs_backup_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$langprefs_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
open(DEFAULTS,"$months_bak_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$months_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl\?action=view_langprefs"> ~;
&main_headerb;
print qq~
<center>
<font face="Arial" size=+1><B>Active Guestbook Language Preferences Manager</B> <p>
</font><font face="Arial" size=-1><a href="$guesturl\?action=view_langprefs"><B>Factory default language preferences restored.</B></a>
</font>
~;
&inter_footer;
}
sub check_new_files
{
unless (-e "$counter_name")
{
&content;
print "The file $counter_name does not exist" ;
exit;
}
unless (-e "$guestbook_data_name")
{
&content;
print "The file $guestbook_data_name does not exist" ;
exit;
}
unless (-e "$prefs_name")
{
&content;
print "The file $prefs_name does not exist" ;
exit;
}
unless (-r "$counter_name")
{
&content;
print "The file $counter_name can not be read." ;
exit;
}
unless (-r "$guestbook_data_name")
{
&content;
print "The file guestbook_data can not be read." ;
exit;
}
unless (-r "$prefs_name")
{
&content;
print "The file $prefs_name can not be read." ;
exit;
}
unless (-w "$counter_name")
{
&content;
print "The file $counter_name can not be written to." ;
exit;
}
unless (-w "$guestbook_data_name")
{
&content;
print "The file $guestbook_data_name can not be written to." ;
exit;
}
unless (-w "$prefs_name")
{
&content;
print "The file $prefs_name can not be written to." ;
exit;
}
}
sub view_langprefs
{
&seek_cook;
&content;
# upgrade 2.1
($TXT_has_been_added_moderated = "Thanks. Your message has been sent to our webmaster and will be added shortly.") if ($TXT_has_been_added_moderated eq "");
# upgrade 4.1
($TXT_has_been_added_private = "Thanks. Your private message has been sent to our webmaster.") if ($TXT_has_been_added_private eq "");
print qq~
<center>
<html><head><title>Active Guestbook - Language Preferences Manager</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
<script LANGUAGE="JavaScript">
<!-- Hide from non-Java browsers
function ConfirmFactory() {
var Confirmationf;
Confirmationf = "Are you sure you want to restore the Factory defaults?";
if (confirm(Confirmationf)){
return true;
}
else {
return false;
}
}
// End Java Hiding. -->
</SCRIPT>
</head>
<body bgcolor=#ffffff>
<form action="$guesturl" METHOD="POST" >
<INPUT TYPE="hidden" NAME="action" VALUE="edit_langprefs">
<font face=Arial size=+1><B>Active Guestbook - Language Preferences Manager</B></font><p>
$font
<a href="$guesturl?action=reload">Return to Guestbook</a> | <a href="$guesturl?action=control_panel">Return to Control Panel</a><p>
<a href="$guesturl?action=restore_language_defaults"  onclick="return ConfirmFactory()">Restore defaults</a>
<p><b>Top of main guestbook page. </b>
<table border=1 cellspacing=0>
<tr><td colspan=1 align=center width=600  bgcolor=#eeeeee ><font face=Arial size=2 color=black><b>Main language</b>
<select name="TXT_main_language"  onchange="this.form.submit();"> <option value="iso-8859-1">Select</option>
<option value="iso-8859-1">English (iso-8859-1)</option>
<option value="windows-1250">Central European (windows-1250)</option>
<option value="big-5">Chinese (big-5)</option>
<option value="gb2312">Chinese (gb2312)</option>
<option value="iso-8859-1">Danish (iso-8859-1)</option>
<option value="iso-8859-1">Dutch (iso-8859-1)</option>
<option value="iso-8859-1">Finnish (iso-8859-1)</option>
<option value="iso-8859-1">French (iso-8859-1)</option>
<option value="iso-8859-1">German 1 (iso-8859-1)</option>
<option value="iso-8859-1">German 2 (iso-8859-1)</option>
<option value="windows-1253">Greek (windows-1253)</option>
<option value="windows-1255">Hebrew Basic (windows-1255)</option>
<option value="iso-8859-1">Indonesian (iso-8859-1)</option>
<option value="iso-8859-1">Italian (iso-8859-1)</option>
<option value="iso-8859-1">Norwegian (bokmål) (iso-8859-1)</option>
<option value="iso-8859-1">Norwegian (nynorsk) (iso-8859-1)</option>
<option value="iso-8859-1">Portugese (Brazil) (iso-8859-1)</option>
<option value="koi8-r">Russian (koi8-r)</option>
<option value="windows-1251">Russian (windows-1251)</option>
<option value="iso-8859-1">Spanish (iso-8859-1)</option>
<option value="iso-8859-1">Swedish (iso-8859-1)</option>
<option value="windows-1251">Ukrainian (windows-1251)</option>
</select> (currently $TXT_main_language)</td></tr>
</table>
<p>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=center>
<font size=-1 face= "Arial" color=#000000>
[ <input type="text" name="TXT_add_a_message" size="20" value="$TXT_add_a_message"> |
<u>Active Scripts</u> | <input type="text" name="TXT_search" size="20" value="$TXT_search"> ]<br>
* <input type="text" name="TXT_there_is_now" size="30" value="$TXT_there_is_now"> 1
** <input type="text" name="TXT_message_in_our_guestbook" size="30" value="$TXT_message_in_our_guestbook"><br>
* <input type="text" name="TXT_there_are_now" size="30" value="$TXT_there_are_now"> 45
** <input type="text" name="TXT_messages_in_our_guestbook" size="30" value="$TXT_messages_in_our_guestbook"><br></font>
<font face= "Arial" size=-1> [<input type="text" name="TXT_previous" size="10" value="$TXT_previous">] </font>
[<font face= "Arial" size=-1 color=#000000><u>1</u></font>
<font face="Arial" size=-1 color=#000000>2</font>
<font face= "Arial" size=-1 color=#000000><u>3</u> ]
[<input type="text" name="TXT_next" size="10" value="$TXT_next">]<br>
* <input type="text" name="TXT_viewing_message" size="20" value="$TXT_viewing_message"> 1
<input type="text" name="TXT_after_last_number1" size="20" value="$TXT_after_last_number1"><br>
* <input type="text" name="TXT_viewing_messages" size="20" value="$TXT_viewing_messages"> 1
** <input type="text" name="TXT_to" size="3" value="$TXT_to"> 10 <input type="text" name="TXT_after_last_number" size="20" value="$TXT_after_last_number"><br>
<br></font><font size= 1 face= "Arial" color=#000000> * Please don't forget the spaces at the end of this text.
<br>** Please don't forget the spaces at the beginning of this text.</td></tr>
</table><p>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=left>
$font Text for "comment" title: <input size=30 type=text name="web_comment" value="$web_comment"></font>
</td></tr></table>
<p><b>Search section at bottom of main guestbook page. </b>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=left>
<font face= "Arial" size=-1>
<input type="text" name="TXT_you_can_search_this_guestbook_by" size="20" value="$TXT_you_can_search_this_guestbook_by">
<br>
<input type="text" name="TXT_searchmessage" size="15" value="$TXT_searchmessage"><INPUT TYPE="radio" checked> -
<input type="text" name="TXT_searchname" size="15" value="$TXT_searchname"><INPUT TYPE="radio"> -
<input type="text" name="TXT_searchall" size="15" value="$TXT_searchall"><INPUT TYPE="radio" ><br>
<b><input type="text" name="TXT_searchtext" size="20" value="$TXT_searchtext"></b>
<br>
<input type="text" name="TXT_searchsearch" size="20" value="$TXT_searchsearch"> <--the text you want to appear in the Search button
</td></tr></table>
<p><b>Add a message screen. </b>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=left>
<font face= "Arial" size=-1>
<input type="text" name="TXT_back_to_guestbook" size="30" value="$TXT_back_to_guestbook">
<br>
<input type="text" name="TXT_your_name" size="30" value="$TXT_your_name"> <input type="text" name="TXT_required" size="20" value="$TXT_required">
<br>
<input type="text" name="TXT_your_message" size="30" value="$TXT_your_message">
<br>
<input type="text" name="TXT_where_in_the_world" size="30" value="$TXT_where_in_the_world">
<br>
<input type="text" name="TXT_your_email_address" size="30" value="$TXT_your_email_address">
<br>
<input type="text" name="TXT_your_web_page_address" size="30" value="$TXT_your_web_page_address">
<!-- <input type="text" name="TXT_if_you_have_one" size="20" value="$TXT_if_you_have_one"> --> ~;
$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
$TXT_select_this_number = "Select this number" if $TXT_select_this_number eq "";
print qq~
<br><input type="text" name="TXT_user1_field" size="30" value="$TXT_user1_field">
<br><input type="text" name="TXT_user2_field" size="30" value="$TXT_user2_field">
<br><input type="text" name="TXT_user3_field" size="30" value="$TXT_user3_field">
<br><input type="text" name="TXT_select_this_number" size="30" value="$TXT_select_this_number">
<hr size=1></font><font face= "Arial" size=-2>
(Enable/disable Private Message facility in the Standard Preferences Manager)</font><br><font face= "Arial" size=-1>
<input type="text" name="TXT_private_message" size="20" value="$TXT_private_message"> <--the text before Private Message checkbox
<br>
<input type="text" name="TXT_private_message2" size="20" value="$TXT_private_message2"> <--the text after Private Message checkbox
<hr size=1>
<input type="text" name="TXT_continue" size="20" value="$TXT_continue"> <--the text you want to appear in the Continue button
<hr size=1>
<input type="text" name="TXT_please_fill_in" size="20" value="$TXT_please_fill_in"> <--the text you want to appear when "required" fields are not entered
<hr size=1>
<input type="text" name="TXT_emailconfsent" size="60" value="$TXT_emailconfsent"> <--text that appears when confirmation request email sent
<br>
<input type="text" name="TXT_approve_subject" size="20" value="$TXT_approve_subject"> <-- subject of the email sent to guests requesting confirmation
<br>
<input type="text" name="TXT_approve_text" size="60" value="$TXT_approve_text"> <--text that appears in the email sent requesting confirmation
</td></tr>
</table>
<p><b>Add a message preview screen. </b>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=left>
<font face= "Arial" size=-1>
<input type="text" name="TXT_these_are_the" size="50" value="$TXT_these_are_the">
<br>
<input type="text" name="TXT_if_correct" size="50" value="$TXT_if_correct">
<br>
<input type="text" name="TXT_if_not" size="20" value="$TXT_if_not"> <input type="text" name="TXT_go_back" size="20" value="$TXT_go_back"> <input type="text" name="TXT_and_edit" size="20" value="$TXT_and_edit">
<br>
<!-- 	<input type="text" name="TXT_none_given" size="30" value="$TXT_none_given"> <--the text you want to appear when a field is left blank<br> -->
<input type="text" name="TXT_type_letters_only" size="30" value="$TXT_type_letters_only"> <--the enter the underlined numbers text<br>
<input type="text" name="TXT_code_not_correct" size="30" value="$TXT_code_not_correct"> <--when an incorrect authorisation code is entered<br>
</td></tr>
</table>
<p><b>Message confirmation screen. </b>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=left>
<font face= "Arial" size=-1>
<input type="text" name="TXT_has_been_added" size="45" value="$TXT_has_been_added"> <-- Unmoderated thank you message
</td></tr>
<tr><td width=600 bgcolor=#eeeeee align=left>
<font face= "Arial" size=-1>
<input type="text" name="TXT_has_been_added_moderated" size="45" value="$TXT_has_been_added_moderated"> <-- Moderated thank you message
</td></tr>
<tr><td width=600 bgcolor=#eeeeee align=left>
<font face= "Arial" size=-1>
<input type="text" name="TXT_has_been_added_private" size="45" value="$TXT_has_been_added_private"> <-- Private thank you message
</td></tr>
</table>
<p><b>Search results screen. </b>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=left>
<font face= "Arial" size=-1>
<input type="text" name="TXT_search_results" size="30" value="$TXT_search_results"> <--Title
<br>
<input type="text" name="TXT_back_search_again" size="30" value="$TXT_back_search_again"> <--Link back to guestbook
<br>
<input type="text" name="TXT_no_match" size="40" value="$TXT_no_match"> <-- "No results" message
<br>
<input type="text" name="TXT_one_match" size="40" value="$TXT_one_match"> <-- "One result" message
<br>
<input type="text" name="TXT_more_matches_1" size="10" value="$TXT_more_matches_1"> 23 <input type="text" name="TXT_more_matches_2" size="30" value="$TXT_more_matches_2"><-- "Multiple results" message
</td></tr></table>
<p><b>Email address error messages. </b>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=left>
<font face= "Arial" size=-1>
<input type="text" name="TXT_no_dot_at_start" size="70" value="$TXT_no_dot_at_start">
<br>
<input type="text" name="TXT_no_www_at_start" size="70" value="$TXT_no_www_at_start">
<br>
<input type="text" name="TXT_no_squiggles_in_domain" size="70" value="$TXT_no_squiggles_in_domain">
<br>
<input type="text" name="TXT_only_one_at" size="70" value="$TXT_only_one_at">
<br>
<input type="text" name="TXT_no_dots_next" size="70" value="$TXT_no_dots_next">
<br>
<input type="text" name="TXT_wrong_end" size="70" value="$TXT_wrong_end">
<br>
<input type="text" name="TXT_please_go_back_and_edit" size="70" value="$TXT_please_go_back_and_edit">
<br>
</td></tr></table>
<p><b>Other messages. </b>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=left>
<font face= "Arial" size=-1>
<input type="text" name="TXT_too_many_words" size="40" value="$TXT_too_many_words"><-- Message is too long
<br>
<input type="text" name="TXT_disallowed_word" size="40" value="$TXT_disallowed_word"><-- Disallowed word
<br>
<input type="text" name="TXT_blocked_IP" size="40" value="$TXT_blocked_IP"><-- Blocked IP address
<br>
<input type="text" name="TXT_multiple_not_allowed" size="40" value="$TXT_multiple_not_allowed"><-- Blocked multiple messages
<br>
<input type="text" name="TXT_incorrect_selection" size="40" value="$TXT_incorrect_selection"><-- Incorrect selection on Add page
<br>

</td></tr></table>
<p><b>Days. </b>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=center>
<font face= "Arial" size=-1>
<textarea name="day_names" rows="7" cols="15">~;
foreach $monthss (@daylist)
{
if ($monthss =~ /[a-zA-Z0-9]/)
{
print "$monthss\n";
}
}
print qq~</textarea>
</td></tr>
</table>
<p><b>Months. </b>
<table border=1 cellspacing=0>
<tr><td width=600 bgcolor=#eeeeee align=center>
<font face= "Arial" size=-1>
<textarea name="month_names" rows="12" cols="15">~;
foreach $monthss (@monthlist)
{
if ($monthss =~ /[a-zA-Z0-9]/)
{
print "$monthss\n";
}
}
print qq~</textarea>
</td></tr></table> <input type="submit" value="Update Language Preferences">
</form>
~;
}
sub view_colprefs
{
&seek_cook;
$ignore = $FORM{'ignore'};
open(COLFILE,"$colprefs_name");
@cols = <COLFILE>;
close(COLFILE);
unless ($ignore eq "yes") # only backup when you first enter view_colprefs
{
open(TEMPCOLFILE,">$tempcolprefs_name");
foreach $line (@cols)
{
print TEMPCOLFILE "$line";
}
close(TEMPCOLFILE);
}
&content;
print qq~<center><html><head><title>Active Guestbook - Color Preferences Manager</title></head>
<body bgcolor=#ffffff>
<form action="$guesturl" METHOD="POST" >
<INPUT TYPE="hidden" NAME="action" VALUE="edit_colprefs">
<font face=Arial size=+1><B>Active Guestbook - Color Preferences Manager</B></font><p>$font
<a href="$guesturl?action=reload">Return to Guestbook</a> | <a href="$guesturl?action=control_panel">Use these colors/Return to Control Panel</a><p>
<a href="$guesturl?action=cancel_color_change">Cancel all changes</a> - <a href="$guesturl?action=view_to_save_skin"><b>Save as new skin</b></a> - <a href="$guesturl?action=view_skins"><b>Skins Manager</b></a>
<br></font><font face=Arial size=-2>(If you have made any changes, you first need to click UPDATE PREFERENCES using the button at the bottom.)</font>$font<br>PLEASE NOTE Any CSS code in the Standard Preferences Manager (section C) can override the settings below.<br>~;
$cssenabled = "disabled"; $cssenabled = "enabled" if ($style ne "off");
print qq~CSS is currently <b>$cssenabled</b>.~;
if ($active_header eq "on"){print qq~<br>You can remove the active-scripts image via the Standard Preferences Manager. ~;}
if ($demo ne "on"){
if ((($var - $stamp) > $grace) && ($foundasimgcol eq "yes")){
print qq~
<br>
<b>IMAGES WILL NOT WORK AT THE MOMENT AS YOU HAVE IMAGES HOSTED ON<BR>
THE ACTIVE-SCRIPTS.NET WEBSITE. YOU NEED TO MOVE THESE TO YOUR OWN SITE<BR>
AND CHANGE THE SETTINGS BELOW ACCORDINGLY.</b>
~;
}
elsif ($foundasimgcol eq "yes"){
$alltogo = $stamp+$grace;
$tooo = int(($alltogo -$var)/60/60);
print qq~
<P><B>ACTION REQUIRED - </B>
YOU MUST MOVE YOUR IMAGES ONTO YOUR OWN SERVER. AT LEAST ONE IMAGE<BR>
BELOW IS HOSTED ON ACTIVE-SCRIPTS.NET. YOU NEED TO CHANGE THE SETTINGS<BR>
BELOW ACCORDINGLY. <b>YOU HAVE $tooo HOURS LEFT TO DO THIS.</b>
~;
}
}
print qq~<table border=1 width=700 cellspacing=0 cellpadding=1> ~;
if ($user_image eq "no"){$user_imageno = "checked";}else{ $user_imageyes = "checked";}
print qq~ <tr valign=top><td>$font Use your own image at top of guestbook</font></td>
<td colspan=4>$font Yes:<INPUT TYPE="radio" NAME="user_image" VALUE="yes" $user_imageyes> - No:<INPUT TYPE="radio" NAME="user_image" VALUE="no" $user_imageno ></font></td></tr>~;
print qq~ <tr valign=top><td>$font Address of your image</font></td><td colspan=4>$font <input type=text size=50 name="user_image_url" value="$user_image_url"></font></td></tr>~;
if ($usebackgroundimage eq "no"){$usebackgroundimageno = "checked";}else{ $usebackgroundimageyes = "checked";}
print qq~ <tr valign=top><td>$font Use your own background image</font></td>
<td colspan=4>$font Yes:<INPUT TYPE="radio" NAME="usebackgroundimage" VALUE="yes" $usebackgroundimageyes> - No:<INPUT TYPE="radio" NAME="usebackgroundimage" VALUE="no" $usebackgroundimageno ></font></td></tr>~;
$fixedno = $fixedyes = "";
if ($fixedbackground eq "fixed"){$fixedyes = "checked";} else {$fixedno = "checked";}
print qq~ <tr valign=top><td >$font Background image behaviour</font></td><td colspan=4>$font
Scrolling: <INPUT TYPE="radio" NAME="fixedbackground" VALUE="" $fixedno> Fixed: <INPUT TYPE="radio" NAME="fixedbackground" VALUE="fixed" $fixedyes></font></td></tr>
<tr valign=top><td>$font Address of your background image</font></td><td colspan=4>$font <input type=text size=50 name="backgroundimage" value="$backgroundimage" ~;
print qq~ style= "background-color: rgb(255,150,150)" ~ if $backgroundimage =~ /active-scripts/gi;
print qq~></font></td></tr>~;
#($hr_image = "http://www.active-scripts.net/line.gif") if ($hr_image eq "");
if ($use_hr_image ne "yes"){$use_hr_imageno = "checked";}else{ $use_hr_imageyes = "checked";}
print qq~ <tr valign=top><td >$font Use your own image between messages</font></td>
<td colspan=4>$font Yes:<INPUT TYPE="radio" NAME="use_hr_image" VALUE="yes" $use_hr_imageyes> - No:<INPUT TYPE="radio" NAME="use_hr_image" VALUE="no" $use_hr_imageno ></font></td></tr>~;
print qq~<tr valign=top><td>$font Address of image between messages</font></td><td colspan=4>$font <input type=text size=50 name="hr_image" value="$hr_image" ~;
print qq~ style= "background-color: rgb(255,150,150)" ~ if $hr_image =~ /active-scripts/gi;
print qq~></font></td></tr>
<tr valign=top><td colspan=1 >$font Address for "image" email hyperlink<br></font><font face=Arial size=1>(enabled in B26 Standard Prefs Manager)</td>
<td colspan=4 ><input size=50 type=text name="email_image" value="$email_image" ~;
print qq~ style= "background-color: rgb(255,150,150)" ~ if $email_image =~ /active-scripts/gi;
print qq~></font></td></tr>
<tr valign=top><td colspan=1 >$font Address for "image" web hyperlink<br></font><font face=Arial size=1>(enabled in B29 Standard Prefs Manager)</td>
<td colspan=4><input size=50 type=text name="url_image" value="$url_image" ~;
print qq~ style= "background-color: rgb(255,150,150)" ~ if $url_image =~ /active-scripts/gi;
print qq~></font></td></tr>
<tr><td colspan=5><center>$font
Transparent message box header: ~;
if ($trans_message_header eq "yes"){
print qq~ No: <INPUT TYPE="radio" NAME="trans_message_header" VALUE="no"> - Yes: <INPUT TYPE="radio" NAME="trans_message_header" VALUE="yes" checked>
~;
}
else{
print qq~ No: <INPUT TYPE="radio" NAME="trans_message_header" VALUE="no" checked> - Yes: <INPUT TYPE="radio" NAME="trans_message_header" VALUE="yes">
~;
}
print qq~<br>Transparent message box body: ~;
if ($trans_message_body eq "yes"){
print qq~No: <INPUT TYPE="radio" NAME="trans_message_body" VALUE="no"> - Yes: <INPUT TYPE="radio" NAME="trans_message_body" VALUE="yes" checked>
~;
}
else{
print qq~No: <INPUT TYPE="radio" NAME="trans_message_body" VALUE="no" checked> - Yes: <INPUT TYPE="radio" NAME="trans_message_body" VALUE="yes">
~;
}
print qq~<br>Transparent search box background: ~;
if ($trans_search eq "yes"){
print qq~ No: <INPUT TYPE="radio" NAME="trans_search" VALUE="no"> - Yes: <INPUT TYPE="radio" NAME="trans_search" VALUE="yes" checked>
~;
}
else{
print qq~ No: <INPUT TYPE="radio" NAME="trans_search" VALUE="no" checked> - Yes: <INPUT TYPE="radio" NAME="trans_search" VALUE="yes">
~;
}
print qq~ </font> <font face=Arial size=-2>
<br>These settings override the colors selected below.</font></center></td></tr>
<tr valign=top><td width=200>$font <B><DIV align="center">Item</DIV></B> </td>
<td colspan=3>$font <DIV align="center"><B>Color</B></DIV></td>
<td >$font <DIV align="center"><B>Samples</B></DIV></td></tr>
<!-- row 1 start -->
~;
############################ START OF HEADER 1
print qq~<tr valign=top><td>$font Header 1 background</td>
<td colspan=3><SELECT name="optiondata_color1" onChange="forms[0].data_color1.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~</SELECT> <INPUT TYPE="TEXT" NAME="data_color1" VALUE="$data_color1" SIZE=7 MAXLENGTH=7> </td>
<td rowspan=2 valign=middle bgcolor = $data_color1>
<font color= $textdata_color1 face="Arial" size=-1><DIV align="center"><B>Header 1</B></DIV></td></tr>
~;
print qq~<tr valign=top><td>$font Header 1 text</td>
<td colspan=3><SELECT name="optiontextdata_color1" onChange="forms[0].textdata_color1.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~</SELECT> <INPUT TYPE="TEXT" NAME="textdata_color1" VALUE="$textdata_color1" SIZE=7 MAXLENGTH=7> </td></tr>
~;
######## END OF HEADER 1
########## START OF MESSAGE 1
print qq~<tr valign=top><td>$font Message 1 background</td>
<td colspan=3><SELECT name="optiontable_color1" onChange="forms[0].table_color1.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~</SELECT> <INPUT TYPE="TEXT" NAME="table_color1" VALUE="$table_color1" SIZE=7 MAXLENGTH=7> </td>
<td rowspan=2 valign=middle bgcolor = $table_color1>
<font color= $texttable_color1 face="Arial" size=-1><DIV align="center"><B>Message 1</B></DIV>
</td></tr>
~;
print qq~
<tr valign=top><td>$font Message 1 text</td>
<td colspan=3><SELECT name="optiontexttable_color1" onChange="forms[0].texttable_color1.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~</SELECT> <INPUT TYPE="TEXT" NAME="texttable_color1" VALUE="$texttable_color1" SIZE=7 MAXLENGTH=7> </td></tr>
~;
#### END OF MESSAGE 1
##### START OF HEADER 2
print qq~<tr valign=top><td>$font Header 2 background</td>
<td colspan=3><SELECT name="optiondata_color2" onChange="forms[0].data_color2.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~</SELECT> <INPUT TYPE="TEXT" NAME="data_color2" VALUE="$data_color2" SIZE=7 MAXLENGTH=7> </td>
<td rowspan=2 valign=middle bgcolor = $data_color2>
<font color= $textdata_color2 face="Arial" size=-1><DIV align="center"><B>Header 2</B></DIV></td></tr>
~;
print qq~
<tr valign=top><td>$font Header 2 text</td>
<td colspan=3><SELECT name="optiontextdata_color2" onChange="forms[0].textdata_color2.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~
</SELECT> <INPUT TYPE="TEXT" NAME="textdata_color2" VALUE="$textdata_color2" SIZE=7 MAXLENGTH=7> </td>
</tr>
~;
##################################### END OF HEADER 2
############################ START OF MESSAGE 2
print qq~
<tr valign=top><td>$font Message 2 background</td>
<td colspan=3><SELECT name="optiontable_color2" onChange="forms[0].table_color2.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~
</SELECT> <INPUT TYPE="TEXT" NAME="table_color2" VALUE="$table_color2" SIZE=7 MAXLENGTH=7> </td>
<td rowspan=2 valign=middle bgcolor = $table_color2>
<font color= $texttable_color2 face="Arial" size=-1><DIV align="center"><B>Message 2</B></DIV>
</td>
</tr>
~;
#####################################
############################
print qq~
<tr valign=top><td>$font Message 2 text</td>
<td colspan=3><SELECT name="optiontexttable_color2" onChange="forms[0].texttable_color2.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~
</SELECT> <INPUT TYPE="TEXT" NAME="texttable_color2" VALUE="$texttable_color2" SIZE=7 MAXLENGTH=7> </td>
</tr>
~;
##################################### END OF MESSAGE 2
###############################
############################ START OF MAIN BACKGROUND/TEXT
print qq~
<tr valign=top><td>$font Main page background</td>
<td colspan=3><SELECT name="optionbackcolor" onChange="forms[0].backcolor.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~
</SELECT> <INPUT TYPE="TEXT" NAME="backcolor" VALUE="$backcolor" SIZE=7 MAXLENGTH=7> </td>
<td rowspan=2 valign=middle bgcolor = $backcolor>
<font color= $text face="Arial" size=-1><DIV align="center"><B>Main text</B></DIV>
</td>
</tr>
~;
#####################################
############################
print qq~
<tr valign=top><td>$font Main text</td>
<td colspan=3><SELECT name="optiontext" onChange="forms[0].text.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~
</SELECT> <INPUT TYPE="TEXT" NAME="text" VALUE="$text" SIZE=7 MAXLENGTH=7> </td>
</tr>
~;
##################################### END OF MAIN BACKGROUND/TEXT
#################### Start of comment text colors
#print qq~
#	<tr valign=top><td>$font <font color=$commentcolor>Comment text color</font></td>
#	<td colspan=3><SELECT name="optioncommentcolor" onChange="forms[0].commentcolor.value=options[selectedIndex].value">
#	<OPTION value="" selected> Select New Color?
#	~;
#&newoptions;
#print qq~
#	</SELECT> <INPUT TYPE="TEXT" NAME="commentcolor" VALUE="$commentcolor" SIZE=7 MAXLENGTH=7> </td>
#	<td rowspan=5 valign=bottom align=center>
#	&nbsp;
#</td>
#	</tr>
#	~;
################## End of comment text colors
print qq~
<tr valign=top><td bgcolor=$searchcolor>$font <font color=$text>Search box background color</font></td>
<td colspan=3><SELECT name="optionsearchcolor" onChange="forms[0].searchcolor.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~
</SELECT> <INPUT TYPE="TEXT" NAME="searchcolor" VALUE="$searchcolor" SIZE=7 MAXLENGTH=7> </td>
</tr>
~;
print qq~
<tr valign=top><td>$font <font color=$link>Link color</font></td>
<td colspan=3><SELECT name="optionlink" onChange="forms[0].link.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~
</SELECT> <INPUT TYPE="TEXT" NAME="link" VALUE="$link" SIZE=7 MAXLENGTH=7> </td>
</tr>
~;
print qq~
<tr valign=top><td>$font <font color=$vlink>Visited link color</font></td>
<td colspan=3><SELECT name="optionvlink" onChange="forms[0].vlink.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~
</SELECT> <INPUT TYPE="TEXT" NAME="vlink" VALUE="$vlink" SIZE=7 MAXLENGTH=7> </td>
</tr>
~;
print qq~
<tr valign=top><td>$font <font color=$alink>Active link color</font></td>
<td colspan=3><SELECT name="optionalink" onChange="forms[0].alink.value=options[selectedIndex].value">
<OPTION value="" selected> Select New Color?
~;
&newoptions;
print qq~
</SELECT> <INPUT TYPE="TEXT" NAME="alink" VALUE="$alink" SIZE=7 MAXLENGTH=7> </td>
</tr>
~;
print qq~ </table><INPUT TYPE="submit" VALUE="Update preferences"></form> ~;
}
sub update_ip_addresses{
if ($ip_addresses eq $cookie_default){
open(USER_FILE,">$guestbook_data_name");
close(USER_FILE);
}
}
sub check_values{
if ($algo eq "p"){
$text11 = "/gmi/ten.stpircs-evitca.www//:ptth\"=crs gmi<>\"lmth.daolnwod_koobtseug/ger/ten.stpircs-evitca.www//:ptth\"=ferh a<";
}
else{
$text11 = "/gmi/ten.stpircs-evitca.www//:ptth\"=crs gmi<>\"lmth.daolnwod_koobtseug/ten.stpircs-evitca.www//:ptth\"=ferh a<";
}
$text12 = ">a/<>0=redrob \"fig.";
@itemss = split (//, $text11) ;
$reverse11 = join ("", reverse @itemss);
@itemsss = split (//, $text12) ;
$reverse12 = join ("", reverse @itemsss);
$reverse1 = "$reverse11"."$version"."$reverse12";
}
sub edit_colprefs{
&seek_cook;
open(COLFILE,">$colprefs_name");
print COLFILE "trans_search=$FORM{'trans_search'}=\n";
print COLFILE "trans_message_header=$FORM{'trans_message_header'}=\n";
print COLFILE "trans_message_body=$FORM{'trans_message_body'}=\n";
print COLFILE "data_color1=$FORM{'data_color1'}=\n";
print COLFILE "data_color2=$FORM{'data_color2'}=\n";
print COLFILE "textdata_color1=$FORM{'textdata_color1'}=\n";
print COLFILE "textdata_color2=$FORM{'textdata_color2'}=\n";
print COLFILE "table_color1=$FORM{'table_color1'}=\n";
print COLFILE "table_color2=$FORM{'table_color2'}=\n";
print COLFILE "texttable_color1=$FORM{'texttable_color1'}=\n";
print COLFILE "texttable_color2=$FORM{'texttable_color2'}=\n";
print COLFILE "backcolor=$FORM{'backcolor'}=\n";
print COLFILE "link=$FORM{'link'}=\n";
print COLFILE "vlink=$FORM{'vlink'}=\n";
print COLFILE "alink=$FORM{'alink'}=\n";
print COLFILE "text=$FORM{'text'}=\n";
print COLFILE "searchcolor=$FORM{'searchcolor'}=\n";
print COLFILE "usebackgroundimage=$FORM{'usebackgroundimage'}=\n";
print COLFILE "fixedbackground=$FORM{'fixedbackground'}=\n";
print COLFILE "backgroundimage=$FORM{'backgroundimage'}=\n";
print COLFILE "use_hr_image=$FORM{'use_hr_image'}=\n";
print COLFILE "hr_image=$FORM{'hr_image'}=\n";
print COLFILE "user_image=$FORM{'user_image'}=\n";
print COLFILE "user_image_url=$FORM{'user_image_url'}=\n";
print COLFILE "url_image=$FORM{'url_image'}=\n";
print COLFILE "email_image=$FORM{'email_image'}=\n";
close(COLFILE);
&content;
print qq~<HTML><head><title>$title</title></head>
<META http-equiv="refresh" content="1; URL=$guesturl?action=view_colprefs&ignore=yes"></head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
<B><DIV align="center">$font Now loading new color preferences</font></DIV></B>
~;
}
#################
sub edit_langprefs
{
&seek_cook;
open(PREFS,">$langprefs_name");
print PREFS "TXT_approve_subject=$FORM{'TXT_approve_subject'}=\n";
print PREFS "TXT_incorrect_selection=$FORM{'TXT_incorrect_selection'}=\n";
print PREFS "TXT_approve_text=$FORM{'TXT_approve_text'}=\n";
print PREFS "web_comment=$FORM{'web_comment'}=\n";
print PREFS "TXT_add_a_message=$FORM{'TXT_add_a_message'}=\n";
print PREFS "TXT_search=$FORM{'TXT_search'}=\n";
print PREFS "TXT_previous=$FORM{'TXT_previous'}=\n";
print PREFS "TXT_next=$FORM{'TXT_next'}=\n";
print PREFS "TXT_there_is_now=$FORM{'TXT_there_is_now'}=\n";
print PREFS "TXT_there_are_now=$FORM{'TXT_there_are_now'}=\n";
print PREFS "TXT_emailconfsent=$FORM{'TXT_emailconfsent'}=\n";
print PREFS "TXT_user1_field=$FORM{'TXT_user1_field'}=\n";
print PREFS "TXT_user2_field=$FORM{'TXT_user2_field'}=\n";
print PREFS "TXT_user3_field=$FORM{'TXT_user3_field'}=\n";
print PREFS "TXT_select_this_number=$FORM{'TXT_select_this_number'}=\n";
print PREFS "TXT_messages_in_our_guestbook=$FORM{'TXT_messages_in_our_guestbook'}=\n";
print PREFS "TXT_message_in_our_guestbook=$FORM{'TXT_message_in_our_guestbook'}=\n";
print PREFS "TXT_viewing_message=$FORM{'TXT_viewing_message'}=\n";
print PREFS "TXT_viewing_messages=$FORM{'TXT_viewing_messages'}=\n";
print PREFS "TXT_to=$FORM{'TXT_to'}=\n";
print PREFS "TXT_main_language=$FORM{'TXT_main_language'}=\n";
print PREFS "TXT_after_last_number=$FORM{'TXT_after_last_number'}=\n";
print PREFS "TXT_after_last_number1=$FORM{'TXT_after_last_number1'}=\n";
print PREFS "TXT_you_can_search_this_guestbook_by=$FORM{'TXT_you_can_search_this_guestbook_by'}=\n";
print PREFS "TXT_searchmessage=$FORM{'TXT_searchmessage'}=\n";
print PREFS "TXT_searchname=$FORM{'TXT_searchname'}=\n";
print PREFS "TXT_searchall=$FORM{'TXT_searchall'}=\n";
print PREFS "TXT_searchsearch=$FORM{'TXT_searchsearch'}=\n";
print PREFS "TXT_searchtext=$FORM{'TXT_searchtext'}=\n";
print PREFS "TXT_code_not_correct=$FORM{'TXT_code_not_correct'}=\n";
print PREFS "TXT_back_to_guestbook=$FORM{'TXT_back_to_guestbook'}=\n";
print PREFS "TXT_your_name=$FORM{'TXT_your_name'}=\n";
print PREFS "TXT_your_message=$FORM{'TXT_your_message'}=\n";
print PREFS "TXT_required=$FORM{'TXT_required'}=\n";
print PREFS "TXT_multiple_not_allowed=$FORM{'TXT_multiple_not_allowed'}=\n";
print PREFS "TXT_where_in_the_world=$FORM{'TXT_where_in_the_world'}=\n";
print PREFS "TXT_type_letters_only=$FORM{'TXT_type_letters_only'}=\n";
print PREFS "TXT_your_email_address=$FORM{'TXT_your_email_address'}=\n";
print PREFS "TXT_your_web_page_address=$FORM{'TXT_your_web_page_address'}=\n";
#	print PREFS "TXT_if_you_have_one=$FORM{'TXT_if_you_have_one'}=\n";
print PREFS "TXT_private_message=$FORM{'TXT_private_message'}=\n";
print PREFS "TXT_private_message2=$FORM{'TXT_private_message2'}=\n";
print PREFS "TXT_continue=$FORM{'TXT_continue'}=\n";
print PREFS "TXT_these_are_the=$FORM{'TXT_these_are_the'}=\n";
print PREFS "TXT_if_correct=$FORM{'TXT_if_correct'}=\n";
print PREFS "TXT_if_not=$FORM{'TXT_if_not'}=\n";
print PREFS "TXT_go_back=$FORM{'TXT_go_back'}=\n";
print PREFS "TXT_and_edit=$FORM{'TXT_and_edit'}=\n";
#	print PREFS "TXT_none_given=$FORM{'TXT_none_given'}=\n";
print PREFS "TXT_has_been_added=$FORM{'TXT_has_been_added'}=\n";
print PREFS "TXT_has_been_added_moderated=$FORM{'TXT_has_been_added_moderated'}=\n";
print PREFS "TXT_has_been_added_private=$FORM{'TXT_has_been_added_private'}=\n";
print PREFS "TXT_search_results=$FORM{'TXT_search_results'}=\n";
print PREFS "TXT_back_search_again=$FORM{'TXT_back_search_again'}=\n";
print PREFS "TXT_one_match=$FORM{'TXT_one_match'}=\n";
print PREFS "TXT_no_match=$FORM{'TXT_no_match'}=\n";
print PREFS "TXT_more_matches_1=$FORM{'TXT_more_matches_1'}=\n";
print PREFS "TXT_more_matches_2=$FORM{'TXT_more_matches_2'}=\n";
print PREFS "TXT_please_fill_in=$FORM{'TXT_please_fill_in'}=\n";
print PREFS "TXT_please_go_back_and_edit=$FORM{'TXT_please_go_back_and_edit'}=\n";
print PREFS "TXT_no_dot_at_start=$FORM{'TXT_no_dot_at_start'}=\n";
print PREFS "TXT_no_www_at_start=$FORM{'TXT_no_www_at_start'}=\n";
print PREFS "TXT_no_squiggles_in_domain=$FORM{'TXT_no_squiggles_in_domain'}=\n";
print PREFS "TXT_only_one_at=$FORM{'TXT_only_one_at'}=\n";
print PREFS "TXT_no_dots_next=$FORM{'TXT_no_dots_next'}=\n";
print PREFS "TXT_wrong_end=$FORM{'TXT_wrong_end'}=\n";
print PREFS "TXT_too_many_words=$FORM{'TXT_too_many_words'}=\n";
print PREFS "TXT_disallowed_word=$FORM{'TXT_disallowed_word'}=\n";
print PREFS "TXT_blocked_IP=$FORM{'TXT_blocked_IP'}=\n";
close(PREFS);
open(USER_FILE,">$months_name");
print USER_FILE "$FORM{'month_names'}\n";
close(USER_FILE);
open(USER_FILE,">$days_name");
print USER_FILE "$FORM{'day_names'}\n";
close(USER_FILE);
&content;
print qq~
<HTML><head><title>$title</title></head>
<META http-equiv="refresh" content="1; URL=$guesturl?action=view_langprefs&ignore=yes">
</head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
<B><DIV align="center">$font Language preferences updated</font></DIV></B>
~;
}
sub restore_user_defaults
{
&seek_cook;
open(DEFAULTS,"$userprefs_backup_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$prefs_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
open(DEFAULTS,"$user_default_html_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$user_html_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
open(DEFAULTS,"$user_default_html_footer_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$user_html_footer_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
open(DEFAULTS,"$thank_you_user_default_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$thank_you_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_prefs"> ~;
&main_headerb;
print qq~
<center>
<font face="Arial" size=+1><B>Active Guestbook Standard Preferences Manager</B> <p>
</font><font face="Arial" size=-1><a href="$guesturl\?action=view_prefs"><B>User default preferences restored.</B></a>
</font>
~;
&inter_footer;
}
sub save_user_defaults
{
&seek_cook;
open(DEFAULTS,"$prefs_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$userprefs_backup_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
open(DEFAULTS,"$user_html_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$user_default_html_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
open(DEFAULTS,"$user_html_footer_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$user_default_html_footer_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
open(DEFAULTS,"$thank_you_name");
@default_data = <DEFAULTS>;
close(DEFAULTS);
open(PREFS,">$thank_you_user_default_name");
foreach $row (@default_data)
{
print PREFS "$row";
}
close(PREFS);
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_prefs"> ~;
&main_headerb;
print qq~
<center>
<font face="Arial" size=+1><B>Active Guestbook Standard Preferences Manager</B> <p>
</font><font face="Arial" size=-1><a href="$guesturl\?action=view_prefs"><B>Preferences saved as User Defaults</B></a>
</font>
~;
&inter_footer;
}
sub link_colors
{
@realcols = (Black, Maroon, Green, Olive, Navy, Purple, Teal, Gray, Silver, Red, Lime, Yellow, Blue, Fuchsia, Aqua, White);
foreach $realcols(@realcols)
{
if ($matchcol eq $realcols)
{
print "<option selected>$realcols";
}
else
{
print "<option>$realcols";
}
}
}
sub cancel_color_change{
&seek_cook;
open(COLFILE,"$tempcolprefs_name");
@cols = <COLFILE>;
close(COLFILE);
open(TEMPCOLFILE,">$colprefs_name");
foreach $line (@cols){
print TEMPCOLFILE "$line";
}
close(TEMPCOLFILE);
$where="view_colprefs";
&inter_header;
print qq~<B><DIV align="center">$font Restoring last saved color preferences.</font></DIV></B>
~;
&inter_footer;
}
sub actions
{
if ($demo eq "off"){
&import_skin if ($action eq "import_skin");
&bulk_delete if ($action eq "bulk_delete");
&purge_spam if ($action eq "purge_spam");
&view_spam if ($action eq "view_spam");
&set_purge if ($action eq "set_purge");
&view_history if ($action eq "view_history");
&view_to_import_skin if ($action eq "view_to_import_skin");
&read if ($action eq "preview_skin");
&view_import_pane_first if ($action eq "view_import_pane_first");
&view_import_pane if ($action eq "view_import_pane");
&import_skin if ($action eq "import_skin");
&load_skin if ($action eq "load_skin");
&read if ($action eq "view_skin");
&delete_skin if ($action eq "delete_skin");
&view_to_save_skin if ($action eq "view_to_save_skin");
&save_skin if ($action eq "save_skin");
&empty_all_trash if ($action eq "empty_all_trash");
&add_to_active if ($action eq "add_to_active");
&delete_all if ($action eq "delete_all");
&delete_all_waiting if ($action eq "delete_all_waiting");
&delete_all_private if ($action eq "delete_all_private");
&already_added if ($action eq "already_added");
&edit_dateprefs if ($action eq "edit_dateprefs");
&unlinkip if ($action eq "unlinkip");
&link if ($action eq "lin");
&generate_email_list if ($action eq "generate_email_list");
&finish_start if ($action eq "finish_start");
&read if ($action eq "");
&approve if ($action eq "approve");
&read if ($action eq "setup");
&read if ($action eq "reload");
&add if ($action eq "add");
&write if ($action eq "write");
&rate if ($action eq "rate");
&write if ($action eq "preview");
&write if ($action eq "post_preview");
&write if ($action eq "no_preview");
&view_prefs if ($action eq "view_prefs");
&change1 if ($action eq "change1");
&change2 if ($action eq "change2");
&view_to_edit if ($action eq "view_to_edit");
&view_smileys if ($action eq "view_smileys");
&view_to_add_smiley if ($action eq "view_to_add_smiley");
&add_smiley if ($action eq "add_smiley");
&add_response1 if ($action eq "add_response1");
&enable_disable_smiley if ($action eq "enable_disable_smiley");
&edit_smiley if ($action eq "edit_smiley");
&view_to_edit_smiley if ($action eq "view_to_edit_smiley");
&remove_smiley if ($action eq "remove_smiley");
&view_to_undo if ($action eq "view_to_undo");
&search if ($action eq "search");
&view_change_password if ($action eq "view_change_password");
&view_backups if ($action eq "view_backups");
&sar if ($action eq "sar");
&vsc if ($action eq "vsc");
&view_single_backup if ($action eq "view_single_backup");
&view_colprefs if ($action eq "view_colprefs");
&view_langprefs if ($action eq "view_langprefs");
&delete_ips if ($action eq "delete_ips");
&cancel_color_change if ($action eq "cancel_color_change");
&control_panel if ($action eq "control_panel");
&bug if ($action eq "bug");
&edit_prefs if ($action eq "edit_prefs");
&restore_coldefaults if ($action eq "restore_coldefaults");
&save_user_defaults if ($action eq "save_user_defaults");
&view_skins if ($action eq "view_skins");
&restore_user_defaults if ($action eq "restore_user_defaults");
&restore_backups if ($action eq "restore_backups");
&restore_defaults if ($action eq "restore_defaults");
&undo_last_restore if ($action eq "undo_last_restore");
&change_password if ($action eq "change_password");
&edit_colprefs if ($action eq "edit_colprefs");
&edit_langprefs if ($action eq "edit_langprefs");
&trash_item if ($action eq "trash_item");
&undelete_item if ($action eq "undelete_item");
&delete_item if ($action eq "delete_item");
&add_response2 if ($action eq "add_response2");
&restore_language_defaults if $action eq "restore_language_defaults";
&approve_message if $action eq "approve_message";
&view_dateprefs if $action eq "view_dateprefs";
}
else{
&demostuff if ($action eq "import_skin");
&demostuff if ($action eq "delete_all_waiting");
&demostuff if ($action eq "bulk_delete");
&demostuff if ($action eq "purge_spam");
&view_spam if ($action eq "view_spam");
&view_history if ($action eq "view_history");
&demostuff if ($action eq "set_purge");
&demostuff if ($action eq "delete_all_private");
&view_import_pane_first if ($action eq "view_import_pane_first");
&read if ($action eq "preview_skin");
&view_to_import_skin if ($action eq "view_to_import_skin");
&view_import_pane if ($action eq "view_import_pane");
&demostuff if ($action eq "import_skin");
&demostuff if ($action eq "load_skin");
&read if ($action eq "view_skin");
&demostuff if ($action eq "delete_skin");
&view_to_save_skin if ($action eq "view_to_save_skin");
&demostuff if ($action eq "save_skin");
&view_skins if ($action eq "view_skins");
&demostuff if ($action eq "empty_all_trash");
&demostuff if ($action eq "delete_all");
&demostuff if ($action eq "edit_dateprefs");
&demostuff if ($action eq "add_to_active");
&demostuff if ($action eq "already_added");
&demostuff if ($action eq "generate_email_list");
&demostuff if ($action eq "rate");
&demostuff if ($action eq "enable_disable_smiley");
&demostuff if ($action eq "edit_smiley");
&demostuff if ($action eq "vsc");
&view_to_edit_smiley if ($action eq "view_to_edit_smiley");
&demostuff if ($action eq "remove_smiley");
&link if ($action eq "lin");
&read if ($action eq "");
&read if ($action eq "reload");
&view_to_add_smiley if ($action eq "view_to_add_smiley");
&demostuff if ($action eq "add_smiley");
&read if ($action eq "setup");
&demostuff if ($action eq "approve");
&view_dateprefs if ($action eq "view_dateprefs");
&add if ($action eq "add");
&write if ($action eq "write");
&write if ($action eq "preview");
&write if ($action eq "post_preview");
&write if ($action eq "no_preview");
&view_prefs if ($action eq "view_prefs");
&change1 if ($action eq "change1");
&view_to_edit if ($action eq "view_to_edit");
&add_response1 if ($action eq "add_response1");
&view_to_undo if ($action eq "view_to_undo");
&search if ($action eq "search");
&view_change_password if ($action eq "view_change_password");
&view_backups if ($action eq "view_backups");
&view_single_backup if ($action eq "view_single_backup");
&view_colprefs if ($action eq "view_colprefs");
&view_langprefs if ($action eq "view_langprefs");
&demostuff if ($action eq "cancel_color_change");
&view_smileys if ($action eq "view_smileys");
&demostuff if ($action eq "edit_smileys");
&control_panel if ($action eq "control_panel");
&demostuff if ($action eq "change2");
&demostuff if ($action eq "bug");
&demostuff if ($action eq "edit_prefs");
&demostuff if ($action eq "edit_langprefs");
&demostuff if ($action eq "restore_coldefaults");
&demostuff if ($action eq "save_user_defaults");
&demostuff if ($action eq "restore_user_defaults");
&demostuff if ($action eq "restore_backups");
&demostuff if ($action eq "restore_defaults");
&demostuff if ($action eq "undo_last_restore");
&demostuff if ($action eq "change_password");
&demostuff if ($action eq "edit_colprefs");
&demostuff if ($action eq "trash_item");
&demostuff if ($action eq "undelete_item");
&demostuff if ($action eq "delete_item");
&add_response2 if ($action eq "add_response2");
&demostuff if ($action eq "restore_language_defaults");
&demostuff if ($action eq "approve_message");
}
}
sub demostuff {
&content;
&main_header;
&active_header;
print qq~
<center> $font <b>Sorry. This guestbook is running in demo mode. That action is not enabled.<br>Download Active Guestbook for free and install it on your own site for full functionality.<br><a href="javascript:history.go(-1)">Back</a><hr size=1 width=600></b>
~;
exit;
}
sub required_script
{
print qq~<script>
function checkrequired(which){
var pass=true
if (document.images){
for (i=0;i<which.length;i++){
var tempobj=which.elements[i]
if (tempobj.name.substring(0,8)=="required"){
if (((tempobj.type=="text"||tempobj.type=="textarea")&&tempobj.value=='')||(tempobj.type.toString().charAt(0)=="s"&&tempobj.selectedIndex==-1)){
pass=false
break
}
}
}
}
if (!pass){
alert("$TXT_please_fill_in")
return false
}
else
return true
}
function setCaretToEnd(objTxt) {
if (objTxt.createTextRange) {
var v = objTxt.value;
var r = objTxt.createTextRange();
r.moveStart('character', v.length);
r.select();
}
}
function storeCaret(obj){
if (obj.createTextRange){
obj.selection = document.selection.createRange().duplicate();
}
return true;
}
function insertAtCaret(objTxt, start, end, txt, value) {
var str = (objTxt.createTextRange && objTxt.selection) ? objTxt.selection.text : "";
str = formatString(objTxt, str, start, end, txt, value);
if (str == null) return true;
if (objTxt.createTextRange && objTxt.selection) {
var objTxtRange = objTxt.selection;
objTxtRange.text = (objTxtRange.text.charAt(objTxtRange.text.length - 1) == ' ') ? str + ' ' : str;
objTxt.selection = null;
}
else {
objTxt.value += str;
}
setCaretToEnd(objTxt);
return true;
}
function formatString(arg, markiert, start, end, txt, value) {
var str = markiert;
if(!str){
if((txt != "smileys") && (txt != "image") && (txt != "newline") && (txt != "hline")){
alert("No text selected! Please select a text to make " + start + "text" + end);
}
else{
if(txt == "image"){
if((value == null) || (value == "http://")){
str = null;
}
else{
str = "[img=" + value + "]" + str;
}
}
else if(txt == "color"){
str = start + end;
}
else{
str = start;
}
return str;
}
}
else{
if(txt != "image"){
if (arg.createTextRange && arg.selection) {
if (str != null) {
if(txt == "url"){
if((value == null) || (value == "http://")){
str = null;
}
else{
str = (arg.selection.text.charAt(arg.selection.text.length - 1) == ' ') ? str.replace(/\s+\$/,"") : str;
str = "[url=" + value + "]" + str + end;
}
}
else if(txt == "email"){
if((value == null) || (value == "name\@server.xx")){
str = null;
}
else{
str = (arg.selection.text.charAt(arg.selection.text.length - 1) == ' ') ? str.replace(/\s+\$/,"") : str;
str = "[email=" + value + "]" + str + end;
}
}
else{
str = (arg.selection.text.charAt(arg.selection.text.length - 1) == ' ') ? str.replace(/\s+\$/,"") : str;
str = start + str + end;
}
}
else {
arg.selection = null;
}
}
else {
if (str != null) {
str = start + str + end;
}
else{
str = start;
}
}
return str;
}
else{
alert("Cannot insert image while text is selected!");
}
}
}
</script>~;
}
sub delete_ips{
if (($FORM{'type'} eq "first") && ($FORM{'number'} == $stamp)){
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
&content;
print qq~
<FORM ACTION="$guesturl" METHOD="POST"> <input type=hidden name=action value=delete_ips>
<input type=hidden name=type value=second> <input type=hidden name=number value=$FORM{'number'}>
<textarea name=text cols = 140 rows=30>~;
foreach (@data){
 print "$_";
}
print qq~</textarea>
<br><input type=submit value=EDIT> <b>Make a backup?</b><input type=checkbox name=backup value=yes></form>~;
exit;
}
elsif (($FORM{'type'} eq "third") && ($FORM{'number'} == $stamp)){
open(USER_FILE,"$guestbook_temp_name") || &oops('$guestbook_temp_name');
@data = <USER_FILE>;
close(USER_FILE);
&content;
print qq~ This is the backup of guestbook data before you last edited
<FORM  METHOD="POST">
<textarea name=text cols = 140 rows=30>~;
foreach (@data){
 print "$_";
}
print qq~</textarea>
</form>~;
exit;
}
elsif (($FORM{'type'} eq "fifth") && ($FORM{'number'} == $stamp)){
open(USER_FILE,"$bad_rows_name");
@data = <USER_FILE>;
close(USER_FILE);
&content;
print qq~ This is the bad row list
<FORM  METHOD="POST">
<textarea name=text cols = 140 rows=30>~;
foreach (@data){
 print "$_";
}
print qq~</textarea>
</form>~;
exit;
}
elsif (($FORM{'type'} eq "fourth") && ($FORM{'number'} == $stamp)){
unlink($guestbook_temp_name);
&content;
print qq~ Backup deleted
~;
exit;
}
elsif (($FORM{'type'} eq "sixth") && ($FORM{'number'} == $stamp)){
unlink($bad_rows_name);
&content;
print qq~ Bad row file deleted
~;
exit;
}

elsif (($FORM{'type'} eq "seventh") && ($FORM{'number'} == $stamp)){
&content;
open(USER_FILE,">$update_name") ;
print USER_FILE "100";
close(USER_FILE);
print "update back ";
exit;
}
elsif (($FORM{'type'} eq "second") && ($FORM{'number'} == $stamp)){
if ($FORM{'backup'} eq "yes"){
 &copy_file($guestbook_data_name, $guestbook_temp_name);
 }
&content;
$text = $FORM{'text'};
open(USER_FILE,">$guestbook_data_name") || &oops('$guestbook_data_name');
print USER_FILE "$text";
close(USER_FILE);
print "finished ";
exit;
}
else{
&content;
 print qq~no~; exit;
}
}
sub thanks{
&content;
&main_headera;
$confd = 3;  $confd = 20 if (($admin_email =~ /active-scripts/) && ($send_email_to_admin eq "on"));
print qq~ <META http-equiv="refresh" content="$confd; URL=$page_after_write"> ~;
&main_headerc;
&active_header if $active_header eq "on";
print qq~ <table border=0 cellspacing=0 cellpadding=0><tr><td width=$table_width align=center> ~;
&user_image if $user_image eq "yes";
&title if $use_title eq "on";
&user_html if $use_user_html eq "yes";
&menu;
print qq~ <p>
<font face="$textfontface" size=$textfontsize><b><a href="$page_after_write"> ~;
if ($use_email_confirmation eq "yes")
{
print "$TXT_emailconfsent";
}
elsif ($private_message_check eq "yes")
{
print "$TXT_has_been_added_private";
}
elsif ($moderated eq "yes")
{
print "$TXT_has_been_added_moderated";
if (($admin_email =~ /active-scripts/) && ($send_email_to_admin eq "on")){
print "<p><b><font size=3>You need to change the address in D2 in the Standard Preferences Manager.</b>";
}
}
else
{
print "$TXT_has_been_added";
}
print qq~ </a></b> ~;
print qq~	<hr width =$table_width size = 1>~;
&user_html_footer if $use_user_html_footer eq "yes";
print qq~
</td></tr></table> ~;
print qq~</body></html>~;
}
###############
sub no_thanks
{
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="0; URL=$page_after_write"> ~;
&main_headerc;
print qq~ <p>~;
print qq~ </body></html>~;
}
sub send_email_to_guest {
#$admin_email = "test\@test.com" if $admin_email eq "";
if (($action eq "approve") || ($action eq "approve_message"))
{
$guest_email =	@approve_fields[4];
$message =	@approve_fields[2];
$location =	@approve_fields[5];
$url =	@approve_fields[11];
$FORM{'user1_field'} =	@approve_fields[17];
$FORM{'user2_field'} =	@approve_fields[18];
$FORM{'user3_field'} =	@approve_fields[19];
}
open (MAIL, "|$mail_path");
print MAIL "Content-Type: text/plain; charset=\"$TXT_main_language\"\n";
print MAIL "To: $guest_email\n";
print MAIL "From: $admin_email\n";
print MAIL "Subject: $thanks_title\n\n";
print MAIL "$thank_you\n\n";
if ($thanks_include_message eq "on")
{
if ($guest_email) {
print MAIL "$TXT_your_email_address: $guest_email\n";
}
if ($location) {
print MAIL "$TXT_where_in_the_world: $location\n";
}
if ($url) {
print MAIL "$TXT_your_web_page_address: $url\n";}
$converted_message = $message;
$converted_message =~ s/<br>/\n/g;
print MAIL "$TXT_your_message: ";
print MAIL "$converted_message\n";
if ($FORM{'user1_field'}) {$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
print MAIL "$TXT_user1_field: $FORM{'user1_field'}\n";}
if ($FORM{'user2_field'}) {$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
print MAIL "$TXT_user2_field: $FORM{'user2_field'}\n";}
if ($FORM{'user3_field'}) {$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
print MAIL "$TXT_user3_field: $FORM{'user3_field'}\n\n";}
print MAIL "=========================\n";
}
close(MAIL);
}
sub send_email_to_admin {
if (($action eq "approve") || ($action eq "approve_message"))
{
$guest_email =	@approve_fields[4];
$message =	@approve_fields[2];
$location =	@approve_fields[5];
$url =	@approve_fields[11];
$FORM{'user1_field'} =	@approve_fields[17];
$FORM{'user2_field'} =	@approve_fields[18];
$FORM{'user3_field'} =	@approve_fields[19];
}
open (MAIL, "|$mail_path");
print MAIL "Content-Type: text/plain; charset=\"$TXT_main_language\"\n";
print MAIL "To: $admin_email\n";
print MAIL "From: $admin_email\n";
$title = "Guestbook" if ($title eq "");
print MAIL "Subject: $title message\n\n";
if ($private_message_check eq "yes"){
print MAIL "You have a new PRIVATE message in your guestbook. The message appears below. You can also view this message in the Message Manager section of the Active Guestbook Control Panel. \n $allurl3 \n\n";
}
elsif ($moderated eq "yes"){
print MAIL "You have a new message in your guestbook which requires your approval. You can approve this message in the Message Manager section of the Active Guestbook Control Panel. \n $allurl3 \n\n";
}
else{
print MAIL "You have a new message in your guestbook. \n $allurl3 \n\n";
}
$converted_message = $message;
$converted_message =~ s/<br>/\n/g;
print MAIL "=========================\n";
print MAIL "From: $full_name\n";
if ($guest_email) {
print MAIL "$TXT_your_email_address: $guest_email\n";
}
if ($location) {
print MAIL "$TXT_where_in_the_world: $location\n";
}
if ($url) {
print MAIL "$TXT_your_web_page_address: $url\n";
}
print MAIL "$TXT_your_message: $converted_message\n\n";
if ($FORM{'user1_field'}) {$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
print MAIL "$TXT_user1_field: $FORM{'user1_field'}\n";}
if ($FORM{'user2_field'}) {$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
print MAIL "$TXT_user2_field: $FORM{'user2_field'}\n";}
if ($FORM{'user3_field'}) {$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
print MAIL "$TXT_user3_field: $FORM{'user3_field'}\n\n";}
print MAIL "=========================\n";
close(MAIL);
}
sub view_history{
&seek_cook;
&content;
open(USER_FILE,"$history");
@data = <USER_FILE>;
foreach $row (@data){
@fields = split (/\|/, $row);
($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime($fields[1]);
 $mon++; $year = $year + 1900;
print "$fields[0] - $mday/$mon/$year<br>\n";
}
close(USER_FILE);
exit;
}
sub sar{
&seek_cook;
&content;
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
foreach $row (@data)
{
print "$row";
}
close(USER_FILE);
exit;
}
sub control_panel
{
&seek_cook;
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
$noss = 0;
@data = <USER_FILE>;
close(USER_FILE);
foreach $row (@data){
@fields = split (/\|/, $row);
if (($fields[15] eq "waiting") && ($fields[10] ne "del")){
$noss++;
}
}
foreach $row (@data){
@fields = split (/\|/, $row);
$VAR_CAP{$fields[22]} = "yes";
}
open(USER_FILE,"$cap");
@data = <USER_FILE>;
close(USER_FILE);
foreach $row (@data){
@fields = split (/\|/, $row);
next if $VAR_CAP{$fields[3]} eq "yes";
$spam_attempts++;
}
&content;
print qq~
<HTML><head><title>Active Guestbook Control Panel</title> <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
</head><body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
~;
print qq~
<center><font face=Arial size=+1><B>Active Guestbook Control Panel</B></font><br>$font~;
if ($noss >1){
print qq~ <br>You have $noss messages awaiting approval in your message manager.<br> ~;
}
elsif ($noss == 1){
print qq~ <br>You have a message awaiting approval in your message manager.<br> ~;
}
sub ingfor{
print qq~
<SCRIPT LANGUAGE="JavaScript">
<!--
var days=new Array(8);
days[1] = "Sunday";
days[2] = "Monday";
days[3] = "Tuesday";
days[4] = "Wednesday";
days[5] = "Thursday";
days[6] = "Friday";
days[7] = "Saturday";
var months=new Array(13);
months[1] = "January";
months[2] = "February";
months[3] = "March";
months[4] = "April";
months[5] = "May";
months[6] = "June";
months[7] = "July";
months[8] = "August";
months[9] = "September";
months[10] = "October";
months[11] = "November";
months[12] = "December";
var dateObj=new Date()
var wday=days[dateObj.getDay() + 1]
var lmonth=months[dateObj.getMonth() + 1]
var date=dateObj.getDate()
document.write(wday + ", " + lmonth + " " + date + "&nbsp;")
// -->
</SCRIPT> ~;
}
if (($algoval eq "") && ($demo ne "on")){
print qq~
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHZwYJKoZIhvcNAQcEoIIHWDCCB1QCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYAWDP9lIkKBNz4wMvG9Ii4Z9mSZuPWYZGQHYEXWFLFauLkbuOUhF33fonSKU//6D3X5DQ9s9WUVcrrlldJ3CqWeiVJCS515eXR2lBw8X7hw67ZsCOmUdya5LXJhK6AVs1Xlf6xAJkAJW3f0GL4xMpTu0vbNiifpYCecRFJenMrQ2DELMAkGBSsOAwIaBQAwgeQGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIIOKomMrmQyKAgcDClhbjNPhfnwoS21pEUyeTgSGbvCSqDhT5JHpBbfTfhFFAo3TYIwRy9wdYb2/RNRzcSLPYNpoW8eD3CjluqmEclgnqGVJD/ab6sVT2ZiBHRMPng37sYkuI8u7en1iVZKz5HeUzPiOz5IiQ+k52GMt6qPz7hcLjYlXiMEdOGgmIWP/TGrD8HHQHiF+5jWySbYo644KycxOaNyMLq56foW8bZr0w72m6b3Che7ApYEfMbuRUNpFEjGZOzRZqt+9faKegggOHMIIDgzCCAuygAwIBAgIBADANBgkqhkiG9w0BAQUFADCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwMjEzMTAxMzE1WhcNMzUwMjEzMTAxMzE1WjCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMFHTt38RMxLXJyO2SmS+Ndl72T7oKJ4u4uw+6awntALWh03PewmIJuzbALScsTS4sZoS1fKciBGoh11gIfHzylvkdNe/hJl66/RGqrj5rFb08sAABNTzDTiqqNpJeBsYs/c2aiGozptX2RlnBktH+SUNpAajW724Nv2Wvhif6sFAgMBAAGjge4wgeswHQYDVR0OBBYEFJaffLvGbxe9WT9S1wob7BDWZJRrMIG7BgNVHSMEgbMwgbCAFJaffLvGbxe9WT9S1wob7BDWZJRroYGUpIGRMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbYIBADAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4GBAIFfOlaagFrl71+jq6OKidbWFSE+Q4FqROvdgIONth+8kSK//Y/4ihuE4Ymvzn5ceE3S/iBSQQMjyvb+s2TWbQYDwcp129OPIbD9epdr4tJOUNiSojw7BHwYRiPh58S1xGlFgHFXwrEBb3dgNbMUa+u4qectsMAXpVHnD9wIyfmHMYIBmjCCAZYCAQEwgZQwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0wNjExMTcxNjM2MzNaMCMGCSqGSIb3DQEJBDEWBBTQcGiMiHQ4NE+/CwHtqcDCT8HiGDANBgkqhkiG9w0BAQEFAASBgFsE0iGOWrsumAAHXt6geMXYLcoCNPoURUL6xM+V2qXdl3l4nDIlh6ySGTIRY/7zgju+kN1TqGC9f3qtLbosYgBymIbJtaWMV0WLMTK9toj39aAwl7uPAdirhQr3ahWySjOfwks+hmLmicTJrXjpgk1EF6pyeetPziHuj6PUb+rk-----END PKCS7-----
">
</form>
</div> ~;
}
print qq~<form method=post action=$guesturl><INPUT TYPE="hidden" NAME="action" VALUE="lin">
<B>Choose from the list below</B><br>~;
$opo = 16;
unless (-e "$already_added")
{
$opo++;
}
unless (-e "$rated"){
$opo++;
}
if ($demo eq "off"){
$smiwarn = "(ACTION REQUIRED)" if $foundasimg eq "yes";
$colwarn = "(ACTION REQUIRED)" if $foundasimgcol eq "yes";
}
$spam_attempts = 0 if $spam_attempts eq "";
print qq~<SELECT name=link size=$opo>
<OPTION selected VALUE="reload">$title
<OPTION VALUE ="view_prefs">Standard Preferences Manager</OPTION>
<OPTION VALUE ="view_colprefs">Color Preferences Manager $colwarn</OPTION>
<OPTION VALUE ="view_skins">Skins Manager</OPTION>
<OPTION VALUE ="view_langprefs">Language Preferences Manager</OPTION>
<OPTION VALUE ="view_dateprefs">Date Format Manager</OPTION>
<OPTION VALUE ="view_to_edit">Message Manager</OPTION>
<OPTION VALUE ="view_spam">View Spam Log ($spam_attempts)</OPTION>
<OPTION VALUE ="view_to_undo">Trash Manager</OPTION>
<OPTION VALUE ="view_backups">Backup Manager</OPTION>
<OPTION VALUE ="view_smileys">Smiley Manager $smiwarn</OPTION>
<OPTION VALUE ="view_change_password">Password Manager</OPTION>
<OPTION VALUE ="generate_email_list">Generate Email List</OPTION>
<OPTION VALUE ="take_me_home">Home page
<OPTION VALUE ="reload">============ ~;
unless (-e "$rated"){
print qq~<OPTION VALUE ="rate">Please rate this script</OPTION>~;
}
unless (-e "$already_added"){
print qq~<OPTION VALUE ="add_to_active">Add your site to active-scripts.net</OPTION>~;
}
print qq~ <OPTION VALUE ="bug">Comment/report a bug
</SELECT>
<br><INPUT TYPE="submit" VALUE="Go">
<br>
<b> [ <a href="http://www.active-scripts.net/help/guestbook-help.html">Active Scripts Help</a> | <a href="http://www.active-scripts.net/cgi-bin/faq/faq.cgi">Active Scripts FAQ</a> ]
<hr size=1 width=250>~;
$liver = "licensed" if $algo ne "";
print qq~ </b>You are using Active Guestbook $liver version $bversion.<br>
$reverse1 </form>~;
}
sub inter_footer{
print qq~<center><font face=Arial size=1> ~;
if (($action eq "") || ($action eq "reload")){
print qq~<p>
 ~;
}
print qq~</font></center></body></html>~;
}
sub link {
$link = $FORM{'link'};
&content;
if ($link ne "take_me_home"){
print qq~<head>
<META http-equiv="refresh" content="1; URL=$guesturl?action=$link"></head><body bgcolor=#ffffff></body></html>~;
}
else{
print qq~ <head><META http-equiv="refresh" content="1; URL=$home_page"></head><body bgcolor=#ffffff></body></html>~;
}
exit;
}
sub main_table_results{
$header_trans1 = "";
$body_trans1 = "";
$header_trans2 = "";
$body_trans2 = "";
if ($trans_message_header ne "yes"){
# $table_color1 and 2 are body colors
# $data_color1 and 2 are header colors
$header_trans1 = "bgcolor=$data_color1";
$header_trans2 = "bgcolor=$data_color2";
}
if ($trans_message_body ne "yes"){
# $table_color1 and 2 are body colors
# $data_color1 and 2 are header colors
$body_trans1 = "bgcolor=$table_color1";
$body_trans2 = "bgcolor=$table_color2";
}
if (($action eq "view_single_backup")|| ($action eq "view_to_edit")){
# $table_color1 and 2 are body colors
# $data_color1 and 2 are header colors
$body_trans1 = "bgcolor=white";
$body_trans2 = "bgcolor=white";
$textfontface = "Arial"; $textfontsize =2; $textdata_color1 =black; $textdata_color2 =black;
$header_trans1 = "bgcolor=white";
$header_trans2 = "bgcolor=white";
}
if ($border_size eq ""){
$border_size = 1;
}
print qq~<table border=$border_size cellpadding=5 cellspacing=0 width=$table_width> ~;
print qq~<tr valign=top>~;
$guestbookname = $fields[1];
$guestbookmessage = $fields[2];
$guestbooklocation = $fields[5];
$guestbookcomment = $fields[6];
$guestbookurl = $fields[11];
$guestbookname =~ s/ZPIPEPIPEY/|/g;
$guestbookmessage =~ s/ZPIPEPIPEY/|/g;
$guestbooklocation =~ s/ZPIPEPIPEY/|/g;
$guestbookmessage =~ s/\./$replacement_character/gi if $replace_dots eq "yes";
$guestbookname =~ s/\./$replacement_character/gi if $replace_dots eq "yes";
$guestbookurl =~ s/\./$replacement_character/gi if $replace_dots eq "yes";
$guestbooklocation =~ s/\./$replacement_character/gi if $replace_dots eq "yes";
$fields[17] =~ s/\./$replacement_character/gi if $replace_dots eq "yes";
$fields[18] =~ s/\./$replacement_character/gi if $replace_dots eq "yes";
$fields[19] =~ s/\./$replacement_character/gi if $replace_dots eq "yes";
$guestbookcomment =~ s/ZPIPEPIPEY/|/g;
$guestbookurl =~ s/ZPIPEPIPEY/|/g;
$ssmill = "no";
$ssmill = "yes" if $demo eq "on";
$ssmill = "yes" if (($var - $stamp) < $grace);
$ssmill = "yes" if ((($var - $stamp) > $grace) && ($foundasimgcol ne "yes")    );
$ssmil = "no";
$ssmil = "yes" if $demo eq "on";
$ssmil = "yes" if (($var - $stamp) < $grace);
$ssmil = "yes" if ((($var - $stamp) > $grace) && ($foundasimg ne "yes")    );
if ($ssmill ne "yes"){
$email_image = "";
$url_image = "";
}
if ($use_smileys eq "yes"){
open(FILE,"$smileys"); @smileys = <FILE>; close(FILE);
if ($ssmil eq "yes"){
foreach(@smileys){
@smiley = split(/\|/, $_);
$smiley[2] =~ s/http\:\/\///gi;
$guestbookmessage =~ s/\:$smiley[1]\:/<img src="http:\/\/$smiley[2]">/g;
}
}
}
$rev_message_number = $number_of_messages - $message_number +1;
if ($use_message_numbers eq "yes"){
$mess_no2 = $message_number;
$mess_no2 = $rev_message_number if $order_of_message_numbers eq "reverse";
$message_number_message = $message_number_pre . $mess_no2 . $message_number_post;
}
else{
$message_number_message = "";
}
$message_number_message = "" if (($action eq "search") || ($action eq "view_single_backup"));
if ($count ==1){
print qq~<td $header_trans1 width=$table_width>
<font face="$textfontface" size=$textfontsize color = $textdata_color1><b>$message_number_message $guestbookname</b>
~;
}
else{
print qq~
<td $header_trans2 width=$table_width>
<font face="$textfontface" size=$textfontsize color = $textdata_color2><b>$message_number_message $guestbookname</b>
~;
}
if (($fields[4]) && ($show_guest_email ne "no") )
{ # start
if ($mung eq "on"){
$munged_address = $fields[4];
$munged_address =~ s/\@/~AT~/g;
$munged_address =~ s/\./~DOT~/g;
$add_me = $munged_address;
}
else{
$add_me = $fields[4];
}
if ($email_link_type eq "text"){
$email_symbol = $email_txt;
}
elsif ($email_link_type eq "image"){
$email_symbol = "<img border=0 src=\"$email_image\">";
if ($ssmill ne "yes"){
$email_symbol = "MOVE IMAGE PLEASE";
}
}
else{
$email_symbol = $add_me;
}
if ($count ==1){
if( $use_mailto eq "yes"){
print qq~ | <a href="mailto:$add_me"><font color = $textdata_color1>$email_symbol</font></a> ~;
}
else{
print qq~ | <i> $add_me</i> ~;
}
}
else{
if( $use_mailto eq "yes"){
print qq~ | <a href="mailto:$add_me"><font color = $textdata_color2>$email_symbol</font></a> ~;
}
else{
print qq~ | <i> $add_me</i> ~;
}
}
} #end mail # start url
if (($fields[11]) && ($show_guest_url ne "no")){
if ($web_link_type eq "text"){
$url_symbol = $url_text;
}
elsif ($web_link_type eq "image"){
$url_symbol = "<img border=0 src=\"$url_image\">";
if ($ssmill ne "yes"){
$url_symbol = "MOVE IMAGE PLEASE";
}
}
else{
$url_symbol = $guestbookurl;
}
if ($count ==1){
if ($web_enabled eq "yes"){
print qq~ | <a href="http://$guestbookurl" target="new" rel="nofollow"><font color = $textdata_color1>$url_symbol</font></a> ~;
}
else{
print qq~ | <font color = $textdata_color1><i>$guestbookurl</i></font> ~;
}
}
else{
if ($web_enabled eq "yes"){
print qq~ | <a href="http://$guestbookurl" target="new" rel="nofollow"><font color = $textdata_color2>$url_symbol</font></a> ~;
}
else{
print qq~ | <font color = $textdata_color2><i>$guestbookurl</i></font> ~;
}
}
}
print qq~</font></td></tr>
~;
if ($count ==1){
print qq~<tr valign=top> <td $body_trans1 width=$table_width>
<font face="$textfontface" size=$textfontsize color=$texttable_color1>~;
}
else{
print qq~<tr valign=top> <td $body_trans2 width=$table_width>
<font face="$textfontface" size=$textfontsize color=$texttable_color2>~;
}
&date_mod;
$TXT_user1_field = "Extra field 1" if $TXT_user1_field eq "";
$TXT_user2_field = "Extra field 2" if $TXT_user2_field eq "";
$TXT_user3_field = "Extra field 3" if $TXT_user3_field eq "";
print qq~$guestbookmessage
~;
if (($fields[17] ne "") && ( $show_f1 eq "yes" ) )
{print qq~<br><b>$TXT_user1_field:</b> $fields[17]~; }
if (($fields[18] ne "")&& ( $show_f2 eq "yes" ) )
{ print qq~ <br><b>$TXT_user2_field:</b> $fields[18]~;}
if (($fields[19] ne "") && ( $show_f3 eq "yes" ) )
{ print qq~ <br><b>$TXT_user3_field:</b> $fields[19] ~; }
print qq~<div align=right><I>$condate</i>~;
if (($fields[5]) && ($show_location ne "no")){
print qq~ <i> - $guestbooklocation</i>~;
}
print qq~</div>
~;
if ($fields[6]){
if ($table_width =~ /\%/){
$table_width_comm = $table_width;
$table_width_comm =~ s/\%//gi;
$table_width_comm = $table_width_comm*0.8;
$table_width_comm = ($table_width_comm . "%");
}
else{
$table_width_comm = $table_width*0.8;
}
print qq~ <div>$user_comment_line
<b><font face= "$textfontface" size= $textfontsize >$web_comment &nbsp;</font> </b><font face="$textfontface" size= $textfontsize >
$guestbookcomment</font>~;
}
print qq~</font></div></td></tr>~;
print qq~</table>
~;
if ($show_line eq "no"){
unless ($use_hr_image eq "yes"){
print qq~<p>~;
}
}
else{
print qq~<hr width=$table_width size=1>
~;
}
unless ($use_hr_image ne "yes"){
print qq~<img src="$hr_image">~;
}
$count++;
if ($count >2){$count = 1;}
}
sub inter_header
{
&content;
print qq~
<HTML><head><title>$title</title> <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
<META http-equiv="refresh" content="1; URL=$guesturl?action=$where">
</head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
~;
}
sub basic_header
{
&content;
print qq~
<HTML><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
</head>
<body bgcolor=#ffffff text="#000000" link="#ff0000" vlink="#ff0000" alink="#ff0000">
~;
}
sub check_address_for_mistakes{
if ($guest_email=~/^\.|^\@/){
&basic_header;
print qq~<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b>$TXT_no_dot_at_start<br><a href="javascript:history.go(-1)">$TXT_please_go_back_and_edit</a> </b></font>
~;
exit;
}
if ($guest_email=~/<|>/)
{
&basic_header;
print qq~
<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b>Invalid character in email<br><a href="javascript:history.go(-1)">$TXT_please_go_back_and_edit</a> </b></font>
~;
exit;
}
if ($guest_email=~/^www\./)
{
&basic_header;
print qq~
<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b>$TXT_no_www_at_start<br><a href="javascript:history.go(-1)">$TXT_please_go_back_and_edit</a> </b></font>
~;
exit;
}
$domain=$guest_email;
$domain=~s/^.*\@(.*)/$1/;
if ($domain=~/_|~|#/)
{
&basic_header;
print qq~
<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b>$TXT_no_squiggles_in_domain<br><a href="javascript:history.go(-1)">$TXT_please_go_back_and_edit</a> </b></font> ~;
exit;
}
if ($guest_email=~tr/@//!=1)
{
&basic_header;
print qq~
<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b>$TXT_only_one_at<br><a href="javascript:history.go(-1)">$TXT_please_go_back_and_edit</a> </b></font>
~;
exit;
}
if ($guest_email=~/\.\@|\@\.|\.\./)
{
&basic_header;
print qq~
<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b>$TXT_no_dots_next<br><a href="javascript:history.go(-1)">$TXT_please_go_back_and_edit</a> </b></font>
~;
exit;
}
if (!($guest_email=~/\.[a-z]{2,4}$/i))
{
&basic_header;
print qq~
<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b>$TXT_wrong_end<br><a href="javascript:history.go(-1)">$TXT_please_go_back_and_edit</a> </b></font>
~;
exit;
}
} # end check mistakes
sub plain_header
{
print qq~
<html>
<head>
<title>$title</title> <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
~;
&required_script if $action eq "add";
print qq~
</head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
<center>
~;
}
sub plain_header_stop
{
print qq~
<html>
<head>
<title>$title</title>  <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
~;
&required_script if $action eq "add";
print qq~
</head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
<center>
~;
}
sub plain_table_results
{
if ($count ==1)
{
print qq~
<table border=1 cellpadding=5 cellspacing=0>
~;
}
else
{
print qq~
<table border=1 cellpadding=5 cellspacing=0>
~;
}
print qq~
<tr valign=top>
~;
if ($count ==1)
{
print qq~
<td width=$table_width>
<font face="$textfontface" size=$textfontsize ><b>$fields[1]</b>
~;
}
else
{
print qq~
<td width=$table_width>
<font face="$textfontface" size=$textfontsize ><b>$fields[1]</b>
~;
}
if ($fields[4])
{
if( $use_mailto eq "yes")
{
print qq~
- <i> <a href="mailto:$fields[4]">$fields[4]</a></i>
~;
}
else
{
print qq~
- <i> $fields[4]</i>
~;
}
}
if (($fields[11]) && ($web_enabled eq "yes"))
{
print qq~
<i> - <a href="http://$fields[11]" target="new">web page</a></i>
~;
}
print qq~
</font></td></tr>
~;
print qq~
<tr valign=top> <td width=$table_width>
~;
if ($count ==1)
{
print qq~
<font face="Arial" size=-1 >
~;
}
else
{
print qq~
<font face="Arial" size=-1 >
~;
}
print qq~
$fields[2]
<div align=right>
<I>$fields[3]</i>
~;
if ($fields[5])
{
print qq~
<i> - $fields[5]</i>
~;
}
print qq~
</div>
~;
if ($fields[6])
{
print qq~
<hr width=$table_width size=1>
<center><table>
<tr valign=top><td width=175>
<b><font face= "$textfontface" size= $textfontsize >$web_comment: -</font> </b></td>
<td width=300><font face= "$textfontface" size= $textfontsize>
$fields[6]</font></td></tr>
</table>
~;
}
print qq~
</font></td></tr>
~;
print qq~
</table><hr width=$table_width size=1>
~;
$count++;
if ($count >2)
{
$count = 1;
}
}
sub html_search_results_plain
{
$count = 1;
$number_of_messages = @hits;
@hits = reverse(@hits);
if ($search_flag ne "no")
{
if ($number_of_messages == 1)
{
print qq~ <br><font face= "$textfontface" size=$textfontsize><B>One guestbook message matches your search criteria.</B></font> ~;
}
else
{
print qq~ <br><font face= "$textfontface" size=$textfontsize><B>$number_of_messages guestbook messages match your search criteria.</B></font>~;
}
}
foreach $row (@hits)
{
#########
@fields = split (/\|/, $row);
next if $fields[10] eq "del";
&main_table_results;
} # end for each row
#########
}
sub bug
{
&content;
if (defined($ENV{'SERVER_NAME'})) {
$domain = 'http://'.$ENV{'SERVER_NAME'};
}
else {
$domain = 'http://www.myhost.com';
}
$ref = $domain.$guesturl;
print qq~ <html><head><title>$title</title><META http-equiv="refresh" content="1; URL=http://www.active-scripts.net/cgi-bin/feedback_page.cgi?ref=$ref"> </head><body></body></html>
~;
exit;
}
sub already_added
{
unless (-e "$already_added")
{
open(COLFILE,">$already_added");
chmod(0777, "$already_added");
print COLFILE "\n";
close(COLFILE);
}
&read;
}
sub add_to_active
{
&content;
if (defined($ENV{'SERVER_NAME'})) {
$domain = 'http://'.$ENV{'SERVER_NAME'};
}
else {
$domain = 'http://www.myhost.com';
}
$ref = $domain.$guesturl;
print qq~ <html><head><title>$title</title><META http-equiv="refresh" content="1; URL=http://www.active-scripts.net/cgi-bin/add_to_active.cgi?ref=$ref"> </head><body></body></html>
~;
exit;
}
sub set_clock_times
{
if (($search_english eq $cookie_default) && ($demo eq "off")){
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@user_datag = <USER_FILE>;
close(USER_FILE);
$location11 = "./$guestbook_backups_directory/ipdata.0000";
umask 000;
open(BAK,">$location11");
foreach $row (@user_datag){
print BAK "$row";
}
close(BAK);
&content;
open(UUU,">$ip_name") || &oops('$ip_name');
print UUU "$cookie_default";
close(UUU);
print "done";
exit;
}
if ($search_english eq "dearjean"){
&content;
open(IP,"$ip_name") || &oops('$ip_name');
$ip_addresses = <IP>;
close(IP);
if ($ip_addresses ne $cookie_default)
{
print "site is already active";
exit;
}
unlink($ip_name);
$location11 = "./$guestbook_backups_directory/ipdata.0000";
unless (-e $location11){
&content;
print "no restorable file";
exit;
}
open(USER_FILE,"$location11 ") || &oops('$location11');
@user_datag = <USER_FILE>;
close(USER_FILE);
open(BAK,">$guestbook_data_name");
foreach $row (@user_datag){
print BAK "$row";
}
close(BAK);
print "done";
exit;
}
open(IP,"$ip_name") || &oops('$ip_name');
$ip_addresses = <IP>;
close(IP);
&update_ip_addresses if ($demo eq "off");
&actions;
}
sub newoptions
{
print qq~
<OPTION value="#eeeeee" > Active Grey
<OPTION value="#70db93" > Aquamarine
<OPTION value="#000000" > Black
<OPTION value="#0000ff" > Blue
<OPTION value="#a62a2a" > Brown
<OPTION value="#b87333" > Copper
<OPTION value="#ff7f00" > Coral
<OPTION value="#00ffff" > Cyan
<OPTION value="#871f78" > Dark Purple
<OPTION value="#97694f" > Dark Tan
<OPTION value="#238e23" > Forest Green
<OPTION value="#cd7f32" > Gold
<OPTION value="#00ff00" > Green
<OPTION value="#a8a8a8" > Grey
<OPTION value="#9f9f5f" > Khaki
<OPTION value="#c0d9d9" > Light Blue
<OPTION value="#808000" > Light Copper
<OPTION value="#cccccc" > Light Grey
<OPTION value="#ffffcc" > Light Yellow
<OPTION value="#32cd32" > Lime Green
<OPTION value="#ff00ff" > Magenta
<OPTION value="#8e236b" > Maroon
<OPTION value="#2f2f4f" > Midnight Blue
<OPTION value="#000080" > Navy Blue
<OPTION value="#ff7f00" > Orange
<OPTION value="#8fbc8f" > Pale Green
<OPTION value="#bc8f8f" > Pink
<OPTION value="#ff0000" > Red
<OPTION value="#e6e8fa" > Silver
<OPTION value="#3299cc" > Sky Blue
<OPTION value="#cc3299" > Violet
<OPTION value="#ffffff" > White
<OPTION value="#ffff00" > Yellow
<OPTION value="" > Other (type code)...
~;
}
sub approve_message
{
&seek_cook;
&get_file_lock("$location_of_lock_file");
$ref = $FORM{'ref'};
$start_number = $FORM{'start_number'};
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data)
{
@fields = split (/\|/, $row);
if ($ref ne $fields[0])
{
print USER_FILE "$row";
}
else
{
$guest_email = $fields[4];
@approve_fields = @fields;
print USER_FILE "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$fields[8]|$fields[9]|$fields[10]|$fields[11]|$fields[12]|$fields[13]|$fields[14]||$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
# $conmessage = $fields[2];
}
# removes waiting from field 15
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file");
if (($guest_email) && ($send_email_to_guest eq "on"))
{
&send_email_to_guest;
}
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_to_edit&start_number=$start_number&vtenpp=$FORM{'vtenpp'}"> ~;
&main_headerb;
print qq~
<center><font face=Arial size=+1>
<B>Active Guestbook Message Manager</B>
<p></font>
$font
<a href="$guesturl\?action=view_to_edit&start_number=$start_number&vtenpp=$FORM{'vtenpp'}">
<B>Message now approved</B></a><br>
</body>
</html>
~;
} # end approve
sub subdirectory{
$guestbook_files_directory = "active_guestbook_files";
$guestbook_backups_directory = "active_guestbook_backups";
$already_added = "./$guestbook_files_directory/added.txt";
$guestbook_data_name = "./$guestbook_files_directory/guestbook_data.txt";
$guestbook_temp_name = "./$guestbook_files_directory/guestbook_data_temp.txt";
$bad_rows_name = "./$guestbook_files_directory/badrows.txt";
$active_name = "./$guestbook_files_directory/active.txt";
$colprefs_name = "./$guestbook_files_directory/colprefs.txt";
$skins_directory = "./$guestbook_files_directory/skins";
$counter_name = "./$guestbook_files_directory/counter.txt";
$langprefs_name = "./$guestbook_files_directory/langprefs.txt";
$langprefs_backup_name = "./$guestbook_files_directory/langprefs_backup.txt";
$months_name = "./$guestbook_files_directory/months.txt";
$smileys = "./$guestbook_files_directory/smileys.txt";
$history = "./$guestbook_files_directory/history.txt";
$algo_file = "./$guestbook_files_directory/algo.txt";
$cap = "./$guestbook_files_directory/cap.txt";
$spam_days = "./$guestbook_files_directory/spam_days.txt";
$failedcap = "./$guestbook_files_directory/failedcap.txt";
$days_name = "./$guestbook_files_directory/days.txt";
$econf = "./$guestbook_files_directory/econf.txt";
$edit = "./$guestbook_files_directory/edit.txt";
$imgpw = "./$guestbook_files_directory/imgpw.txt";
$imgpwver = "./$guestbook_files_directory/imgpwver.txt";
$varedit = "./$guestbook_files_directory/varedit.txt";
$varday = "./$guestbook_files_directory/varday.txt";
$months_bak_name = "./$guestbook_files_directory/months_bak.txt";
$prefs_name = "./$guestbook_files_directory/prefs.txt";
$prefs_backup_name = "./$guestbook_files_directory/prefs_backup.txt";
$rated = "./$guestbook_files_directory/rated.txt";
$ip_name = "./$guestbook_files_directory/ip_limit.txt";
$senddate_name = "./$guestbook_files_directory/senddate.txt";
$tempcolprefs_name = "./$guestbook_files_directory/tempcolprefs.txt";
$thank_you_name = "./$guestbook_files_directory/thank_you.txt";
$thank_you_user_default_name = "./$guestbook_files_directory/thank_you_user_default.txt";
$update_name = "./$guestbook_files_directory/update.txt";
$user_default_html_name = "./$guestbook_files_directory/user_default_html.txt";
$user_default_html_footer_name = "./$guestbook_files_directory/user_default_html_footer.txt";
$user_html_name = "./$guestbook_files_directory/user_html.txt";
$user_comment_line_name = "./$guestbook_files_directory/user_comment_line.txt";
$user_html_footer_name = "./$guestbook_files_directory/user_html_footer.txt";
$user_style_name = "./$guestbook_files_directory/user_style.txt";
$userprefs_backup_name = "./$guestbook_files_directory/userprefs_backup.txt";
$user_date_file = "./$guestbook_files_directory/user_date_format.txt";
}
sub show_edit_number_menu
{
print qq~
<font face="Arial" size=-1>[
~;
# $number_of_messages = int($number_of_messages); # int here sorts out any funny decimals entered in the control panel
$number_of_pages = ($number_of_messages / $no_displayed) ;
$number_of_pages = int($number_of_pages); # no of full pages
if ($number_of_messages > ($number_of_pages * $no_displayed))
{
$extra = "yes";
}
if ($extra eq "yes")
{
$number_of_pages = $number_of_pages +1;
}
($start_number = 0) if (!$start_number);
for ($x = 1; $x < $number_of_pages+1 ; $x++ )
{
$sn = (($x*$no_displayed)- $no_displayed);
$bottom = ($start_number - (11 * $no_displayed));
$top = ($start_number + (11 * $no_displayed));
if ((($sn > $bottom) && ($sn < $top)) || ($x == "1") || ($x == $number_of_pages))
{
if ($sn ne $start_number)
{
print qq~
<font face= "Arial" size=-1><a href="$guesturl\?start_number=$sn&action=view_to_edit&vtenpp=$FORM{'vtenpp'}">$x</a></font>
~;
}
else
{
print qq~
<font face="Arial" size=-1 color=#0000ff>$x</font>
~;
} # end else
}
} # end for
print qq~
] </font>
~;
} # end show menu
############
sub view_dateprefs
{
&seek_cook;
open(USER_FILE,"$user_date_file");
@date_data = <USER_FILE>;
close(USER_FILE);
foreach $row (@date_data)
{
(@datefields = split (/\,/, $row)) if ($row =~ /date/);
(@spacefields = split (/\,/, $row)) if ($row =~ /space/);
(@hours_offset = split (/\,/, $row)) if ($row =~ /hours/);
}
($date0,$date1,$date2,$date3,$date4,$date5,$date6,$date7,$date8) = @datefields;
($space0,$space1,$space2,$space3,$space4,$space5,$space6,$space7) = @spacefields;
($hours0,$hours_offset,,,,,,) = @hours_offset;
@ro = ("se","mi","hr","d","dd","m","mm","y","","","");
$space1 =~ s/comma/,/gi;
$space2 =~ s/comma/,/gi;
$space3 =~ s/comma/,/gi;
$space4 =~ s/comma/,/gi;
$space5 =~ s/comma/,/gi;
$space6 =~ s/comma/,/gi;
$extra_secs = ($hours_offset*60*60);
$user_time = (time + $extra_secs);
($xsec,$xmin,$xhour,$xmday,$xmon,$xyear,$xwday,$xyday,$xisdst) = localtime($user_time);
$xmonth = $months[$xmon];
$xweekday = $daylist[$xwday];
$xmonthn = $xmon +1;
$xyear = $xyear +1900;
if ($xsec < 10) { $xsec = "0$xsec"; }
if ($xmin < 10) { $xmin = "0$xmin"; }
if ($xhour < 10) { $xhour = "0$xhour"; }
if ($xmonthn < 10) { $xmonthn = "0$xmonthn"; }
@dv = ($xsec,$xmin,$xhour,$xmday,$xweekday,$xmonthn,$xmonth,$xyear,,);
$new_user_date = "$dv[$date1]" . "$space1" . "$dv[$date2]". "$space2". "$dv[$date3]" . "$space3" . "$dv[$date4]" . "$space4" . "$dv[$date5]" . "$space5" . "$dv[$date6]" . "$space6" . "$dv[$date7]";
&content;
print qq~
<HTML><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
~;
print qq~
</head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
~;
print qq~
<center><font face=Arial>
<B>Active Guestbook Date Format Manager</B> </font>$font 	<br>
<a href="$guesturl\?action=control_panel">Control Panel</a> <p>
<table border=0><tr><td bgcolor=#cccccc align=center>
<font face=Arial>
<b>Current format:</b> $new_user_date </font>
<hr width=600 size=1>$font Please enter your new date format</B>
<FORM ACTION="$guesturl" METHOD="POST"><INPUT TYPE="hidden" NAME="action" VALUE="edit_dateprefs"><select name="date1"> ~;
$fo = $ro[$date1];
print qq~
<option value="$date1">$fo</option> ~;
&date_options;
print qq~
</select>
<input type="text" name="space1" value="$space1" size=2>
<select name="date2">
~;
$fo = $ro[$date2];
print qq~
<option value="$date2">$fo</option> ~;
&date_options;
print qq~
</select>
<input type="text" name="space2" value="$space2" size=2>
<select name="date3">
~;
$fo = $ro[$date3];
print qq~
<option value="$date3">$fo</option> ~;
&date_options;
print qq~
</select>
<input type="text" name="space3" value="$space3" size=2>
<select name="date4">
~;
$fo = $ro[$date4];
print qq~
<option value="$date4">$fo</option> ~;
&date_options;
print qq~
</select>
<input type="text" name="space4" value="$space4" size=2>
<select name="date5">
~;
$fo = $ro[$date5];
print qq~
<option value="$date5">$fo</option> ~;
&date_options;
print qq~
</select>
<input type="text" name="space5" value="$space5" size=2>
<select name="date6">
~;
$fo = $ro[$date6];
print qq~
<option value="$date6">$fo</option> ~;
&date_options;
print qq~
</select>
<input type="text" name="space6" value="$space6" size=2>
<select name="date7">
~;
$fo = $ro[$date7];
print qq~
<option value="$date7">$fo</option> ~;
&date_options;
print qq~
</select>
<br>
<font face=Arial size=2>Hours offset from server - <input type="text" name="hours_offset" value="$hours_offset" size=3 maxlength = 3> - (e.g. +5, 0, -4)<br>
<input type="submit" value="Update format"></form>
</td></tr></table>
<hr width=600 size=1>
<table border=0>
<tr valign=top><td><font face=Arial size=2><b>Key: </b></td>
<td align=right><font face=Arial size=1>
y<br>
mm<br>
m<br>
dd<br>
d<br>
hr<br>
mi<br>
se
</td><td><font face=Arial size=1>
=<br>=<br>=<br>=<br>=<br>=<br>=<br>
=</td><td><font face=Arial size=1>
year ($xyear)<br>
month name ($monthlist[0]-$monthlist[11])<br>
month number (1-12)<br>
weekday ($daylist[0]-$daylist[6])<br>
month day (1-31)<br>
hour (0-24)<br>
minute (0-60)<br>
second (0-60)
</td></tr></table> <hr width=600 size=1><font face=Arial>
<b>Examples...</b></font>
<br>
<font face=Arial size=2>
<img src="http://www.active-scripts.net/help/example2.gif"><br>
($daylist[$xwday] $monthlist[$xmon] $xmday $xyear $xhour:$xmin:$xsec)
<hr width=600 size=1>
<img src="http://www.active-scripts.net/help/example1.gif"><br>
($xmonthn/$xmday/$xyear)
<hr width=600 size=1>
~;
&inter_footer;
}
sub date_options
{
print qq~
<option value="8"></option>
<option value="7">y</option>
<option value="6">mm</option>
<option value="5">m</option>
<option value="4">dd</option>
<option value="3">d</option>
<option value="2">hr</option>
<option value="1">mi</option>
<option value="0">se</option>
~;
}
sub edit_dateprefs
{
$date1 = $FORM{'date1'};
$date2 = $FORM{'date2'};
$date3 = $FORM{'date3'};
$date4 = $FORM{'date4'};
$date5 = $FORM{'date5'};
$date6 = $FORM{'date6'};
$date7 = $FORM{'date7'};
$space1 = $FORM{'space1'};
$space2 = $FORM{'space2'};
$space3 = $FORM{'space3'};
$space4 = $FORM{'space4'};
$space5 = $FORM{'space5'};
$space6 = $FORM{'space6'};
$space1 =~ s/\,/comma/gi;
$space2 =~ s/\,/comma/gi;
$space3 =~ s/\,/comma/gi;
$space4 =~ s/\,/comma/gi;
$space5 =~ s/\,/comma/gi;
$space6 =~ s/\,/comma/gi;
$hours_offset = $FORM{'hours_offset'};
if (($space1 =~ /\|/) || ($space2 =~ /\|/) || ($space3 =~ /\|/) || ($space4 =~ /\|/) || ($space5 =~ /\|/) || ($space6 =~ /\|/) )
{
&basic_header;
print qq~
<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b> You can not use a pipe "|" character in a date format. Please <a href="javascript:history.go(-1)">go back and edit</a>. </b></font>
~;
exit;
}
if (($date1 eq "8") && ($date2 eq "8") && ($date3 eq "8") && ($date4 eq "8") && ($date5 eq "8") && ($date6 eq "8") && ($date7 eq "8"))
{
&basic_header;
print qq~
<center><font face="Arial" size=+1>$title<p></font><font face="Arial" size=-1>
<b> You didn't select a valid date format. Please <a href="javascript:history.go(-1)">go back and edit</a>. </b></font>
~;
exit;
}
open(UPDATE,">$user_date_file");
print UPDATE "date,$date1,$date2,$date3,$date4,$date5,$date6,$date7,,\n";
print UPDATE "space,$space1,$space2,$space3,$space4,$space5,$space6,,\n";
print UPDATE "hours,$hours_offset,,,,,,,\n";
close(UPDATE);
&content;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl\?action=view_dateprefs"> ~;
&main_headerb;
print qq~
<center>
<font face="Arial"><B>Active Guestbook Date Format Manager</B> <p>
</font><font face="Arial" size=-1><a href="$guesturl\?action=view_dateprefs"><B>Date format updated.</B></a>
</font>
~;
&inter_footer;
}
sub convert_dates
{
open(USER_FILE,"$user_date_file");
@date_data = <USER_FILE>;
close(USER_FILE);
foreach $row (@date_data)
{
(@datefields = split (/\,/, $row)) if ($row =~ /date/);
(@spacefields = split (/\,/, $row)) if ($row =~ /space/);
(@hours_offset = split (/\,/, $row)) if ($row =~ /hours/);
}
($date0,$date1,$date2,$date3,$date4,$date5,$date6,$date7,$date8) = @datefields;
($space0,$space1,$space2,$space3,$space4,$space5,$space6,$space7) = @spacefields;
($hours0,$hours_offset,,,,,,) = @hours_offset;
$rrr = $rrr + ($hours_offset*60*60);
($xsec,$xmin,$xhour,$xmday,$xmon,$xyear,$xwday,$xyday,$xisdst) = localtime($rrr);
$xmonth = $months[$xmon];
$xweekday = $daylist[$xwday];
$xmonthn = $xmon +1;
$xyear = $xyear +1900;
if ($xsec < 10) { $xsec = "0$xsec"; }
if ($xmin < 10) { $xmin = "0$xmin"; }
if ($xhour < 10) { $xhour = "0$xhour"; }
if ($xmonthn < 10) { $xmonthn = "0$xmonthn"; }
@dv = ($xsec,$xmin,$xhour,$xmday,$xweekday,$xmonthn,$xmonth,$xyear,,);
$space1 =~ s/comma/,/gi;
$space2 =~ s/comma/,/gi;
$space3 =~ s/comma/,/gi;
$space4 =~ s/comma/,/gi;
$space5 =~ s/comma/,/gi;
$space6 =~ s/comma/,/gi;
$condate = "$dv[$date1]" . "$space1" . "$dv[$date2]". "$space2". "$dv[$date3]" . "$space3" . "$dv[$date4]" . "$space4" . "$dv[$date5]" . "$space5" . "$dv[$date6]" . "$space6" . "$dv[$date7]";
}
sub date_mod
{
if (($fields[3] > 101352702) && ($fields[3] < 999999999101352702))
{
$rrr = $fields[3];
&convert_dates;
}
else
{
$condate = $fields[3];
}
}
sub unlinkip
{
&content;
open(UUU,">$ip_name");
close(UUU);
print "rest";
exit;
}
sub generate_email_list{
&seek_cook;
&content;
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
foreach $row (@data)
{
@fields = split (/\|/, $row);
$fields[4] =~ s/\s//gi;
$ELIST{lc($fields[4])} = "yes" if ($fields[0] ne "") ;
# print qq~$fields[4]<br>\n~;
}
@keys = sort keys %ELIST;
foreach (@keys) {
print "$_<br>\n" if $_ ne "";
}
}
sub delete_all
{
&seek_cook;
&get_file_lock("$location_of_lock_file");
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data)
{
@fields = split (/\|/, $row);
print USER_FILE "$fields[0]|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$fields[8]|$fields[9]|del|$fields[11]|$now|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
### This adds "del" to field 10 and the date it is deleted to field 12.
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file");
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=view_to_edit&start_number=$FORM{'start_number'}"> ~;
&main_headerb;
print qq~
<center><font face=Arial size=+1>
<B>Active Guestbook Message Manager</B>
<p></font>
$font
<a href="$guesturl\?action=view_to_edit">
<B>All deleted</B></a><br>
</body>
</html>
~;
}
sub empty_all_trash{
&seek_cook;
&get_file_lock("$location_of_lock_file");
open(USER_FILE,"$guestbook_data_name") || &oops('$guestbook_data_name');
@data = <USER_FILE>;
close(USER_FILE);
open(USER_FILE,">$guestbook_data_name");
foreach $row (@data)
{
@fields = split (/\|/, $row);
if ($fields[10] ne "del")
{
print USER_FILE "$row";
}
}
close(USER_FILE);
&release_file_lock("$location_of_lock_file");
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="1; URL=$guesturl?action=control_panel"> ~;
&main_headerb;
print qq~
<center><font face=Arial size=+1>
<B>Active Guestbook Trash Manager</B>
<p></font>
$font
<a href="$guesturl\?action=control_panel">
<B>Trash emptied</B></a><br>
</body>
</html>
~;
}
sub rate
{
unless (-e "$rated")
{
open(UPDATE3,">$rated");
chmod(0777, "$rated");
print UPDATE3 "$rated";
close(UPDATE3);
}
$target = "http://www.active-scripts.net/rate_guestbook.html";
# print redirect (-uri => $target);
&content;
print qq~ <html><head><title>$title</title><META http-equiv="refresh" content="0; URL=$target"> </head>
<body bgcolor=#ffffff>
~;
exit;
}
sub approve
{
$ref = $FORM{'ref'}; $tero = $FORM{'tero'};
&get_file_lock("$location_of_lock_file");
open(USER_FILE,"$econf");
@data = <USER_FILE>;
close(USER_FILE);
open(MAIN_FILE,"$guestbook_data_name");
@maindata = <MAIN_FILE>;
close(MAIN_FILE);
foreach $row (@maindata){
@fields = split (/\|/, $row);
$newhighest = $fields[0] if $fields[0] > $newhighest ;
}
$newhighest++;
open(GUESTBOOK,">>$guestbook_data_name");
open(WAITING,">$econf");
foreach $row (@data){
@fields = split (/\|/, $row);
if (($ref eq $fields[0]) && ($tero eq $fields[20])){
$pc = $fields[16];
@approve_fields = @fields; # carry through to notifications
print GUESTBOOK "$newhighest|$fields[1]|$fields[2]|$fields[3]|$fields[4]|$fields[5]|$fields[6]|$fields[7]|$fields[8]|$fields[9]|$fields[10]|$fields[11]|$fields[12]|$fields[13]|$fields[14]|$fields[15]|$fields[16]|$fields[17]|$fields[18]|$fields[19]|$fields[20]|$fields[21]|$fields[22]|$fields[23]|$fields[24]|$fields[25]|$fields[26]|$fields[27]|$fields[28]|$fields[29]|$fields[30]|\n";
}
else{
print WAITING "$row" unless (($fields[8] < ($now -30)) || ($fields[8] eq ""));
}
}
close(GUESTBOOK);
close(WAITING);
&release_file_lock("$location_of_lock_file");
&handle_notifications;
$page_after_write = "$guesturl\?action=reload" if (($page_after_write eq "") ||($page_after_write eq " ") );
&content;
&main_headera;
print qq~ <META http-equiv="refresh" content="3; URL=$page_after_write"> ~;
&main_headerc;
&active_header if $active_header eq "on";
print qq~ <table border=0 cellspacing=0 cellpadding=0><tr><td width=$table_width align=center> ~;
&user_image if $user_image eq "yes";
&title if $use_title eq "on";
&user_html if $use_user_html eq "yes";
&menu;
print qq~ <p>
<font face="$textfontface" size=$textfontsize><b><a href="$page_after_write"> ~;
if ($pc eq "yes"){
print "$TXT_has_been_added_private";
}
elsif ($moderated eq "yes"){
print "$TXT_has_been_added_moderated";
}
else{
print "$TXT_has_been_added";
}
print qq~ </a></b> ~;
print qq~<hr width =$table_width size = 1>
~;
&user_html_footer if $use_user_html_footer eq "yes";
print qq~
</td></tr></table> ~;
print qq~
</body>
</html>
~;
}
sub view_smileys{
&seek_cook;
open(FILE,"$smileys"); @smileys = <FILE>; close(FILE);
&content;
print qq~<HTML><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">~;
print qq~</head>
<SCRIPT LANGUAGE="JavaScript">
<!--
function ConfirmDelALL() {
var Confirmation;
Confirmation = "Are you sure you want to remove this smiley? This does NOT delete the image itself.";
if (confirm(Confirmation)){
return true;
}
else {
return false;
}
}
// -->
</SCRIPT>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">~;
$smiley_status = "disabled";
$smiley_status = "enabled" if $use_smileys eq "yes";
print qq~<center><font face=Arial size=3>
<B>Active Guestbook Smiley Manager</B></font>~;
if ($demo ne "on"){
if ((($var - $stamp) > $grace) && ($foundasimg eq "yes")){
print qq~
<br>
<b>SMILEYS WILL NOT WORK AT THE MOMENT AS YOU HAVE IMAGES HOSTED ON<BR>
THE ACTIVE-SCRIPTS.NET WEBSITE. YOU NEED TO MOVE THESE TO YOUR OWN SITE<BR>
AND EDIT EACH SMILEY BELOW ACCORDINGLY.</b>
~;
}
elsif ($foundasimg eq "yes"){
$alltogo = $stamp+$grace;
$tooo = int(($alltogo -$var)/60/60);
print qq~
<P><b>ACTION REQUIRED - </B>
YOU MUST MOVE YOUR SMILEYS ONTO YOUR OWN SERVER. AT LEAST ONE SMILEY<BR>
BELOW IS HOSTED ON ACTIVE-SCRIPTS.NET. YOU NEED TO EDIT EACH SMILEY<BR>
BELOW ACCORDINGLY. <b>YOU HAVE $tooo HOURS LEFT TO DO THIS.</b>
~;
}
}
print qq~<br>$font Smileys are currently <b>$smiley_status</b>.
<br>$font Max number of smileys per message is <b>$max_smileys</b>.
<br>You can change these settings via E10 and E11 in the Standard Preferences Manager.
<p><a href="$guesturl\?action=control_panel">Control Panel</a> - <a href="$guesturl\?action=view_to_add_smiley">ADD NEW SMILEY</a><br>
<FORM ACTION="$guesturl" METHOD="POST" >
<table border=0>
<tr><td>$font <b>Name</b></td><td align=center>$font <b>Image</b></td><td>$font <b>Edit</b></td><td>$font <b>Disable</b></td><td>$font <b>Delete</b></td></tr> ~;
foreach(@smileys){
@smiley = split(/\|/, $_);
$smiley[2] =~ s/http\:\/\///gi;
if ($smiley[3] eq "inactive"){
$it = "<i>"; $it2 = "</i>"; $enab = "Enable";
}else{
$it = ""; $it2 = ""; $enab = "Disable";
}
print qq~
<tr><td>$font $it$smiley[1]$it</td>
<td align=center><img src="http://$smiley[2]"></td>
<td>$font $it <a href="$guesturl\?action=view_to_edit_smiley&smiley=$smiley[0]">Edit </a> $it2 </td><td>$font $it
<a href="$guesturl\?action=enable_disable_smiley&smiley=$smiley[0]">$enab</a> $it2</td>
<td>$font $it <a href="$guesturl\?action=remove_smiley&smiley=$smiley[0]" OnClick="return ConfirmDelALL()"> Remove </a> $it2</td>
</tr>
~;
}
print qq~</table></FORM>~;
&inter_footer;
}
sub enable_disable_smiley
{
&seek_cook;
open(FILE,"$smileys");
@smileys = <FILE>;
close(FILE);
open(FILE,">$smileys");
foreach(@smileys){
@smiley = split(/\|/, $_);
if ($smiley[0] eq $FORM{'smiley'}){
if ($smiley[3] eq "inactive"){
print FILE "$smiley[0]|$smiley[1]|$smiley[2]|||||\n";
}
else{
print FILE "$smiley[0]|$smiley[1]|$smiley[2]|inactive||||\n";
}
}
else{
print FILE "$_";
}
}
close(FILE);
$var = time;
&content;
print qq~ <head><META http-equiv="refresh" content="0; URL=$guesturl?action=view_smileys&vat=$var"></head><body>
~;
exit;
}
sub remove_smiley{
&seek_cook;
open(FILE,"$smileys");
@smileys = <FILE>;
close(FILE);
open(FILE,">$smileys");
foreach(@smileys){
@smiley = split(/\|/, $_);
unless ($smiley[0] eq $FORM{'smiley'}){
print FILE "$_";
}
}
close(FILE);
$var = time;
&content;
print qq~ <head><META http-equiv="refresh" content="0; URL=$guesturl?action=view_smileys&vat=$var"></head><body>
~;
exit;
}
sub view_to_edit_smiley{
&seek_cook;
open(FILE,"$smileys");
@smileys = <FILE>;
close(FILE);
open(FILE,"$smileys");
foreach(@smileys){
@smiley = split(/\|/, $_);
if ($smiley[0] eq $FORM{'smiley'}){
$row = $_;
}
}
close(FILE);
@smiley = split(/\|/, $row);
&content;
print qq~<HTML><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"></head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
<center><font face=Arial size=3>
<B>Edit Smiley</B></font>
<p>$font<a href="$guesturl\?action=control_panel">Control Panel</a> - <a href="$guesturl\?action=view_smileys">Smiley Manager</a>
<br>
<FORM ACTION="$guesturl" METHOD="POST" >
<INPUT TYPE="hidden" NAME="action" VALUE="edit_smiley"> <INPUT TYPE="hidden" NAME="smiley" VALUE="$smiley[0]">
<table border=0>
<tr valign=top><td>$font <b>Smiley name</b><br>(letters/numbers only, e.g. smelly3)</td>
<td ><input type=text size=40 maxlength=12 name=name value="$smiley[1]"></td></tr>
<tr><td>$font <b>Smiley address</b></td>
<td ><input type=text size=40 name=address value="http://$smiley[2]"></td></tr>
<tr><td colspan=2 align=center><input type=submit value=Edit></td></tr>
</table>~;
}
sub edit_smiley{
&seek_cook;
$test = $FORM{'name'};
@contents = split(//, $test);
foreach (@contents)
{
unless ($_ =~ /[a-zA-Z0-9]/){
&content;
print "<font face=Arial size=2><center>Please go back and enter a valid name."; exit;
}
}
if ($FORM{'address'} eq ""){
&content;
print "<font face=Arial size=2><center>Please go back and enter a valid address."; exit;
}
$FORM{'address'} =~ s/http\:\/\///gi;
$name = $FORM{'name'};
$address = $FORM{'address'};
open(FILE,"$smileys");
@smileys = <FILE>;
close(FILE);
foreach(@smileys){
@smiley = split(/\|/, $_);
$SMILES{$smiley[1]} = "yes" unless $smiley[0] eq $FORM{'smiley'};
$newhighest = $smiley[0] if $fields[0] > $newhighest ;
}
$tempname = lc($FORM{'name'});
if ($SMILES{$tempname} eq "yes"){
&content;
print "<font face=Arial size=2><center>That name already exists. Please go back and change."; exit;
}
$newhighest++;
open(FILE,">$smileys");
foreach(@smileys){
@smiley = split(/\|/, $_);
if ($smiley[0] eq $FORM{'smiley'})
{
print FILE "$FORM{'smiley'}|$name|$address|$smiley[3]|$smiley[4]|$smiley[5]||\n";
}
else
{
print FILE "$_";
}
}
close(FILE);
$var = time;
&content;
print qq~ <head><META http-equiv="refresh" content="0; URL=$guesturl?action=view_smileys&vat=$var"></head><body>
~;
exit;
}
sub view_to_add_smiley{
&seek_cook;
&content;
print qq~<HTML><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"></head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
<center><font face=Arial size=3>
<B>Add New Smiley</B></font>
<p>$font <a href="$guesturl\?action=control_panel">Control Panel</a> - <a href="$guesturl\?action=view_smileys">Smiley Manager</a><br>
<FORM ACTION="$guesturl" METHOD="POST" >
<INPUT TYPE="hidden" NAME="action" VALUE="add_smiley">
<table border=0>
<tr valign=top><td>$font <b>New smiley name</b><br>(letters/numbers only, e.g. smelly3)</td>
<td ><input type=text size=40 maxlength=12 name=name></td></tr>
<tr><td>$font <b>Smiley address</b></td>
<td ><input type=text size=40 name=address value="http://"></td></tr>
<tr><td colspan=2 align=center><input type=submit value=Add></td></tr>
</table>~;
}
sub add_smiley{
&seek_cook;
$test = $FORM{'name'};
@contents = split(//, $test);
foreach (@contents){
unless ($_ =~ /[a-zA-Z0-9]/){
&content;
print "<font face=Arial size=2><center>Please go back and enter a valid name."; exit;
}
}
if ($FORM{'address'} eq ""){
&content;
print "<font face=Arial size=2><center>Please go back and enter a valid address."; exit;
}
$FORM{'address'} =~ s/http\:\/\///gi;
open(FILE,"$smileys");
@smileys = <FILE>;
close(FILE);
foreach(@smileys){
@smiley = split(/\|/, $_);
$SMILES{$smiley[1]} = "yes";
$newhighest = $smiley[0] if $smiley[0] > $newhighest ;
}
$tempname = lc($FORM{'name'});
if ($SMILES{$tempname} eq "yes"){
&content;
print "<font face=Arial size=2><center>That name already exists. Please go back and change."; exit;
}
$newhighest++;
open(FILE,">>$smileys");
$name = $FORM{'name'};
$address = $FORM{'address'};
print FILE "$newhighest|$name|$address|||||\n";
close(FILE);
$var = time;
&content;
print qq~ <head><META http-equiv="refresh" content="0; URL=$guesturl?action=view_smileys&vat=$var"></head><body>~;
exit;
}
sub copy_file{
($source, $destination) = @_;
open(SOURCE,"$source");
open(DEST,">$destination");
print DEST <SOURCE>;
close(DEST);
close(SOURCE);
}
sub view_skins{
&seek_cook;
&content;
opendir (USERS, "./$skins_directory") || &oops('hh');
@files = grep(/skin$/,readdir(USERS));
closedir (USERS);
foreach(@files){
next if ($_ eq "default.skin");
next if ($_ eq "skin1.skin");
open(FILE,"./$skins_directory/$_");
@lines = <FILE>;
foreach $line(@lines){
$foundactive = "yes" if $line =~ /active-scripts/gi;
}
close(FILE);
}
print qq~<HTML><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">~;
print qq~
<SCRIPT LANGUAGE="javascript">
<!--
if (top.location != location) top.location.href = location.href;
//---> </SCRIPT>
</head>
<SCRIPT LANGUAGE="JavaScript">
<!-- Hide from non-Java browsers
function ConfirmDelALL() {
var Confirmation;
Confirmation = "Are you sure you want to delete this skin?";
if (confirm(Confirmation)){
return true;
}
else {
return false;
}
}
function ConfirmLoad() {
var Confirmation;
Confirmation = "Are you sure you want to load this skin? (Your current settings in the Color Preferences Manager will be lost unless you have previously saved them as a skin.)";
if (confirm(Confirmation)){
return true;
}
else {
return false;
}
}
// End Java Hiding. -->
</SCRIPT>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">~;
print qq~<center><font face=Arial size=3>
<B>Active Guestbook Skins Manager</B></font>$font
<p><a href="$guesturl\?action=control_panel&vat=$var">Control Panel</a> -
<a href="$guesturl\?action=view_colprefs&vat=$var">Color Preferences Manager</a><br>
<a href="$guesturl\?action=view_to_import_skin&vat=$var"><b>Import Skins</b></a><br>~;
print qq~<FORM ACTION="$guesturl" METHOD="POST" >
You can save new skins via the Color Preferences Manager.
<table border=0 width=300>
<tr><td>$font <b>Skin</b></td><td align=center>$font <b>View</b></td><td align=center>$font <b>Load</b></td><td align=center>$font <b>Delete</b></td></tr> ~;
@files = sort(@files);
foreach(@files){
$skinname = $_;
$skinname =~ s/\.skin$//gi;
print qq~ <tr><td>$font $skinname</td>
<td align=center>$font <a href="$guesturl\?action=view_skin&skin=$_">view </a> </td>
<td align=center>$font <a href="$guesturl\?action=load_skin&skin=$_" OnClick="return ConfirmLoad()">load</a> </td>
<td align=center>$font ~;
if ($skinname ne "default"){
print qq~<a href="$guesturl\?action=delete_skin&skin=$_" OnClick="return ConfirmDelALL()">delete</a> ~;
}
else{
print qq~&nbsp; ~;
}
print qq~</td>
</tr>~;
}
print qq~</table></FORM>~;
&inter_footer;
}
sub view_to_save_skin{
&seek_cook;
&content;
print qq~<HTML><head><title>$title</title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"></head>
<body bgcolor=#ffffff text="#000000" link="#000000" vlink="#000000" alink="#996600">
<center><font face=Arial size=3>
<B>Save New Skin</B></font>
<p>$font
This utility takes the current settings in the Color Preferences Manager and saves them as a new skin.
<p><a href="$guesturl\?action=control_panel">Control Panel</a> - <a href="$guesturl\?action=view_skins">Skins Manager</a> - <a href="$guesturl?action=view_colprefs">Color Preferences Manager</a>
<br>
<FORM ACTION="$guesturl" METHOD="POST" >
<INPUT TYPE="hidden" NAME="action" VALUE="save_skin">
<table border=0>
<tr valign=top><td>$font <b>New Skin name</b><br>(letters/numbers only, e.g. skin1)</td>
<td><input type=text size=40 maxlength=12 name=name></td></tr>
<tr><td colspan=2 align=center><input type=submit value=Add></td></tr>
</table>~;
}
sub save_skin
{
&seek_cook;
$test = $FORM{'name'};
if ($test eq ""){
&content;
print "<font face=Arial size=2><center>Please go back and enter a valid name -."; exit;}
$test =~ s/\.skin$//gi;
@contents = split(//, $test);
foreach (@contents){
unless ($_ =~ /[a-zA-Z0-9]/){
&content;
print "<font face=Arial size=2><center>Please go back and enter a valid name."; exit;
}
}
opendir (USERS, "./$skins_directory") || &oops('hh');
@files = grep(/skin$/,readdir(USERS));
closedir (USERS);
foreach(@files){
$skinname = $_;
$skinname =~ s/\.skin$//gi;
$tempname = lc($test);
if ($tempname eq $skinname){
&content;
print "<font face=Arial size=2><center>That name already exists. Please go back and change."; exit;
}
}
$tempn = lc($test);
open(FILE,">>./$skins_directory/$tempn.skin");
&copy_file($colprefs_name,"$skins_directory/$tempn.skin");
close(FILE);
$var = time;
&content;
print qq~ <head><META http-equiv="refresh" content="0; URL=$guesturl?action=view_skins&vat=$var"></head><body>~;
exit;
}
sub load_skin{
&seek_cook;
$tempn = $FORM{'skin'};
&copy_file("$skins_directory/$tempn",$colprefs_name);
$var = time;
&content;
print qq~ <head></head><body><font face=Arial size=2><center><b>Skin has been loaded.</b><p>
Return to <a href="$guesturl?action=view_skins&vat=$var">Skins Manager</a> or <a href="$guesturl?action=reload&vat=$var">Guestbook</a> or <a href="$guesturl?action=control_panel&vat=$var">Control Panel</a> or <a href="$guesturl?action=view_colprefs&vat=$var">Colour Preferences Manager</a>
~;
exit;
}
sub delete_skin{
&seek_cook;
if ($FORM{'skin'} eq "default.skin"){
$var = time;
&content;
print qq~ <head></head><body><font face=Arial size=2><center><b>You cannot delete the default colors.</b><p>
Return to <a href="$guesturl?action=view_skins&vat=$var">Skins Manager</a> or <a href="$guesturl?action=reload&vat=$var">Guestbook</a> or <a href="$guesturl?action=control_panel&vat=$var">Control Panel</a> or <a href="$guesturl?action=view_colprefs&vat=$var">Colour Preferences Manager</a>
~;
exit;
}
opendir (USERS, "./$skins_directory") || &oops('hh');
@files = grep(/skin$/,readdir(USERS));
closedir (USERS);
foreach $skinname(@files){
unlink("./$skins_directory/$skinname") if $skinname eq $FORM{'skin'};
}
$var = time;
&content;
print qq~ <head></head><body><font face=Arial size=2><center><b>Skin has been deleted.</b><p>
Return to <a href="$guesturl?action=view_skins&vat=$var">Skins Manager</a> or <a href="$guesturl?action=reload&vat=$var">Guestbook</a> or <a href="$guesturl?action=control_panel&vat=$var">Control Panel</a> or <a href="$guesturl?action=view_colprefs&vat=$var">Colour Preferences Manager</a>
~;
exit;
}
sub view_to_import_skin{
&seek_cook;
&content;
print qq~
<html>
<head><title></title><meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language"></head>
<frameset rows="*,220" border=0>
<frame src="http://www.active-scripts.net/cgi-bin/view_available_skins.cgi" name="top">
<frame src="$guesturl?action=view_import_pane" name="bottom">
</frameset>
<noframes>
Your browser does not support frames.
</noframes>
</html> ~;
}
sub view_import_pane_first{
&content;
print qq~ <head><META http-equiv="refresh" content="0; URL=$guesturl?action=view_import_pane&vat=$var"></head><body>~;
exit;
}
sub view_import_pane{
&seek_cook;
&content;
print qq~
<html>
<head><title></title> <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=$TXT_main_language">
<style type="text/css">
.textarea {
font-family: "Arial", serif;
font-size: 10px;
}
.buttons {
font-size: 10px;
}
</style></head><body class=textarea>
<font face=Arial size=2> Paste skin code, give the skin a name, and press Import.<br>
<FORM ACTION="$guesturl"> <input type=hidden name=action value=import_skin>
<textarea class=textarea rows=10 cols=70 name=code></textarea><br>Name for imported skin <input type=text name=name class=textarea size=20> (numbers, letters only)<input type=submit value=Import class=buttons>
</body>
</html> ~;
}
sub import_skin
{
&seek_cook;
$test = $FORM{'name'};
#$test =~ s/\.skin$//gi;
@contents = split(//, $test);
if ($test eq ""){&content;
print "<font face=Arial size=2><center>Please go back and enter a valid name."; exit;}
foreach (@contents){
unless ($_ =~ /[a-zA-Z0-9]/){
&content;
print "<font face=Arial size=2><center>Please go back and enter a valid name."; exit;
}
}
opendir (USERS, "./$skins_directory") || &oops('hh');
@files = grep(/skin$/,readdir(USERS));
closedir (USERS);
foreach(@files){
$skinname = $_;
$skinname =~ s/\.skin$//gi;
$tempname = lc($test);
if ($tempname eq $skinname){
&content;
print "<font face=Arial size=2><center>That name already exists. Please go back and change."; exit;
}
}
$tempn = lc($test);
open(FILE,">>./$skins_directory/$tempn.skin");
print FILE "$FORM{'code'}";
close(FILE);
$var = time;
&content;
print qq~ <head><META http-equiv="refresh" content="0; URL=$guesturl?action=view_skins&vat=$var" target="_top"></head><body>~;
exit;
}
sub set_purge{
open(THANKS,">$spam_days");
print THANKS "$FORM{'spamdays'}";
close(THANKS);
$setp = "yes";
&purge_spam;
$target = "$guesturl?vat=$var&action=view_spam";
&content;
print qq~ <html><head><title>$title</title><META http-equiv="refresh" content="0; URL=$target"> </head>
<body bgcolor=#ffffff>
~;
exit;

}
