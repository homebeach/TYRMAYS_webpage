<?php



// This is our application class. 
// It has a database object.
// It also has a Smarty object.

class Tyrmays {
  // database object:
  var $sql = null;
  // smarty template object
  var $tpl = null;
  // error messages
  var $error = null;

  // constructor:
  function Tyrmays($lang) {
    // instantiate the template object and the database object
    // and read the configuration file, which also has the
    // internationalised fields
    //
    $this->tpl =& new Tyrmays_Smarty;
    
    $this->tpl->config_load("tyrmays.conf", $lang);
 
    $this->sql =& new Tyrmays_SQL;

  }

//show maintenance events list

  function maint_show_events() {
    $events = $this->sql->getEvents();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('events',$events);
    $this->tpl->display('maint_events.tpl');
  }

//show maintenance news

  function maint_show_news() {
    $news = $this->sql->getNews();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('news',$news);
    $this->tpl->display('maint_news.tpl');
  }


//display form to add news

  function maint_add_news_form() {
	$studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('studentnumber',$studentnumber); 
    $this->tpl->display('maint_add_news.tpl');
  }

//display news edition form
  function maint_edit_news_form($request) {
  	$news = $this->sql->getSingleNews($request);
  	$studentnumber = $_SESSION['studentnumber'];
  	$firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('studentnumber',$studentnumber); 
    $this->tpl->assign('news',$news);
    $this->tpl->display('maint_edit_news.tpl');
  }

//update new values of news
  function maint_edit_news($request)  {
    $this->sql->editNews($request);
    $news = $this->sql->getNews();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('news',$news);
    $this->tpl->display('maint_news.tpl');
  }
//function to delete news
  function maint_delete_news($request)  {

    $this->sql->deleteNews($request);
    $news = $this->sql->getNews();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('news',$news);
    $this->tpl->display('maint_news.tpl');
  }

//show members maintenance
 
  function maint_show_members()  {

	$webmaster = $this->sql->getWebmaster();
	$studentnumber = $_SESSION['studentnumber'];
	$iswebmaster = 'false';

	$webmaster = $webmaster[0]['studentnumber'];

	if ($webmaster == $studentnumber) {
	
		$iswebmaster = 'true';
	}
	
	$valuearray = array('studentnumber' => $studentnumber);
	
    $board = $this->sql->getBoard();
    $oldboard = $this->sql->getAllOldBoards();
    $officials = $this->sql->getOfficials();
    $oldofficials = $this->sql->getAllOldOfficials();
    $nonmembers = $this->sql->getNonMembers();
    $obsoletemembers = $this->sql->getObsoleteMembers();
   	$members = $this->sql->getMembers();
   	$firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $lastlogon = $_SESSION['lastlogon'];
    $this->tpl->assign('iswebmaster', $iswebmaster);
    $this->tpl->assign('firstname', $firstname);
    $this->tpl->assign('surname', $surname);
    $this->tpl->assign('lastlogon', $lastlogon);
    $this->tpl->assign('board', $board);
    $this->tpl->assign('oldboard', $oldboard);
    $this->tpl->assign('officials', $officials);
    $this->tpl->assign('oldofficials', $oldofficials);
    $this->tpl->assign('nonmembers', $nonmembers);
    $this->tpl->assign('obsoletemembers', $obsoletemembers);
    $this->tpl->assign('members', $members);
    $this->tpl->display('maint_members.tpl');
    
  }


//member edition form

  function edit_member_form($request) {

	  	$majors = $this->sql->getMajors();
    	$member = $this->sql->getMember($request);
    	
    	if (DB::isError($member)) {
       		die($member->getMessage());
    	}
    	
    	$membership_requestedday = substr($member[0]['membership_requested'], 8, 2);
		$membership_requestedmonth = substr($member[0]['membership_requested'], 5, 2);
		$membership_requestedyear = substr($member[0]['membership_requested'], 0, 4);

		$membership_requestedhour = substr($member[0]['membership_requested'], 11, 2);
		$membership_requestedminute = substr($member[0]['membership_requested'], 14, 2);
		
		$membership_last_paidday = substr($member[0]['membership_last_paid'], 8, 2);
		$membership_last_paidmonth = substr($member[0]['membership_last_paid'], 5, 2);
		$membership_last_paidyear = substr($member[0]['membership_last_paid'], 0, 4);

		$membership_last_paidhour = substr($member[0]['membership_last_paid'], 11, 2);
		$membership_last_paidminute = substr($member[0]['membership_last_paid'], 14, 2);
	
    	$firstname = $_SESSION['firstname'];
    	$surname = $_SESSION['surname'];
    	
    	$this->tpl->assign('membership_requestedday', $membership_requestedday);
    	$this->tpl->assign('membership_requestedmonth', $membership_requestedmonth);
    	$this->tpl->assign('membership_requestedyear', $membership_requestedyear);
    	$this->tpl->assign('membership_requestedhour', $membership_requestedhour);
    	$this->tpl->assign('membership_requestedminute', $membership_requestedminute);

    	$this->tpl->assign('membership_last_paidday', $membership_last_paidday);
    	$this->tpl->assign('membership_last_paidmonth', $membership_last_paidmonth);
    	$this->tpl->assign('membership_last_paidyear', $membership_last_paidyear);
     	$this->tpl->assign('membership_last_paidhour', $membership_last_paidhour);   	    	
    	$this->tpl->assign('membership_last_paidminute', $membership_last_paidminute);

    	$this->tpl->assign('firstname',$firstname); 
    	$this->tpl->assign('surname',$surname); 
		$this->tpl->assign('majors',$majors); 
		$this->tpl->assign('member',$member); 
		$this->tpl->display('maint_edit_member.tpl');
   }
   
//update new member data to database

   function edit_member($request) {
	   
    $this->sql->editMember($request);

    $webmaster = $this->sql->getWebmaster();
	$studentnumber = $_SESSION['studentnumber'];
	$iswebmaster = 'false';
	
	if ($webmaster == $studentnumber) {
	
		$iswebmaster = 'true';
	}
	
    $board = $this->sql->getBoard();
    $oldboard = $this->sql->getAllOldBoards();
    $officials = $this->sql->getOfficials();
    $oldofficials = $this->sql->getAllOldOfficials();
    $nonmembers = $this->sql->getNonMembers();
    $obsoletemembers = $this->sql->getObsoleteMembers();
   	$members = $this->sql->getMembers();
   	$firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $lastlogon = $_SESSION['lastlogon'];
    $this->tpl->assign('iswebmaster', $iswebmaster);
    $this->tpl->assign('firstname', $firstname);
    $this->tpl->assign('surname', $surname);
    $this->tpl->assign('lastlogon', $lastlogon);
    $this->tpl->assign('board', $board);
    $this->tpl->assign('oldboard', $oldboard);
    $this->tpl->assign('officials', $officials);
    $this->tpl->assign('oldofficials', $oldofficials);
    $this->tpl->assign('nonmembers', $nonmembers);
    $this->tpl->assign('obsoletemembers', $obsoletemembers);
    $this->tpl->assign('members', $members);
    $this->tpl->display('maint_members.tpl');
    
   }


//show add new member form

  function maint_add_member_form() {

	$majors = $this->sql->getMajors();
	
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
	$this->tpl->assign('majors',$majors); 
    $this->tpl->display('maint_add_member.tpl');

  }

//update new member information to database
  function maint_add_member($request) {

    	$this->sql->insert_Member($request, 'false');
    	
    	$webmaster = $this->sql->getWebmaster();
		$studentnumber = $_SESSION['studentnumber'];
		$iswebmaster = 'false';
	
		if ($webmaster == $studentnumber) {
	
			$iswebmaster = 'true';
		}
		
	    $board = $this->sql->getBoard();
	    $oldboard = $this->sql->getAllOldBoards();
	    $officials = $this->sql->getOfficials();
	    $oldofficials = $this->sql->getAllOldOfficials();
	    $nonmembers = $this->sql->getNonMembers();
	    $obsoletemembers = $this->sql->getObsoleteMembers();
	   	$members = $this->sql->getMembers();
	   	$firstname = $_SESSION['firstname'];
	    $surname = $_SESSION['surname'];
	    $lastlogon = $_SESSION['lastlogon'];
	    $this->tpl->assign('iswebmaster', $iswebmaster);
	    $this->tpl->assign('firstname', $firstname);
	    $this->tpl->assign('surname', $surname);
	    $this->tpl->assign('lastlogon', $lastlogon);
	    $this->tpl->assign('board', $board);
	    $this->tpl->assign('oldboard', $oldboard);
	    $this->tpl->assign('officials', $officials);
	    $this->tpl->assign('oldofficials', $oldofficials);
	    $this->tpl->assign('nonmembers', $nonmembers);
	    $this->tpl->assign('obsoletemembers', $obsoletemembers);
	    $this->tpl->assign('members', $members);
	    $this->tpl->display('maint_members.tpl');

	}

  function maint_add_to_board_form($request) {

		$boardyears = $this->sql->getMembersBoardYears($request);
	  
	    $currentyear = date("Y");
	  
	    $nextyear = $currentyear + 1;
		
	   	$years = array();
		
		$j = 0;
		
		$k = 0;
		
		for($i = 2007; $i <= $nextyear; $i++)
		{

			if($i != $boardyears[$j][year]) 
			{

				$years[$k] = $i;
				$k++;
			}
			else {
								
				$j++;
			}	
			
		}
	
    	$member = $this->sql->getMember($request);
    	$firstname = $_SESSION['firstname'];
    	$surname = $_SESSION['surname'];
    	$this->tpl->assign('firstname',$firstname); 
    	$this->tpl->assign('surname',$surname);     	
    	$this->tpl->assign('years',$years);
    	$this->tpl->assign('member',$member);
    	$this->tpl->display('maint_add_to_board.tpl');

	}
	
  function maint_add_to_board($request) {

    	$result = $this->sql->addToBoard($request);

    	if (DB::isError($result)) {
      		die($boardmember->getMessage());
    	}
    	
    	$webmaster = $this->sql->getWebmaster();
		$studentnumber = $_SESSION['studentnumber'];
		$iswebmaster = 'false';
	
		if ($webmaster == $studentnumber) {
	
			$iswebmaster = 'true';
		}

	    $board = $this->sql->getBoard();
	    $oldboard = $this->sql->getAllOldBoards();
	    $officials = $this->sql->getOfficials();
	    $oldofficials = $this->sql->getAllOldOfficials();
	    $nonmembers = $this->sql->getNonMembers();
	    $obsoletemembers = $this->sql->getObsoleteMembers();
	   	$members = $this->sql->getMembers();
	   	$firstname = $_SESSION['firstname'];
	    $surname = $_SESSION['surname'];
	    $lastlogon = $_SESSION['lastlogon'];
	    $this->tpl->assign('iswebmaster', $iswebmaster);
	    $this->tpl->assign('firstname', $firstname);
	    $this->tpl->assign('surname', $surname);
	    $this->tpl->assign('lastlogon', $lastlogon);
	    $this->tpl->assign('board', $board);
	    $this->tpl->assign('oldboard', $oldboard);
	    $this->tpl->assign('officials', $officials);
	    $this->tpl->assign('oldofficials', $oldofficials);
	    $this->tpl->assign('nonmembers', $nonmembers);
	    $this->tpl->assign('obsoletemembers', $obsoletemembers);
	    $this->tpl->assign('members', $members);
	    $this->tpl->display('maint_members.tpl');

	}
	
  function maint_add_to_officials_form($request) {

	    $officalsyears = $this->sql->getMembersOfficialsYears($request);  		  
	  
	    $currentyear = date("Y");    
	  
	    $nextyear = $currentyear + 1;
		
	   	$years = array();
		
		$j = 0;
		
		$k = 0;
		
		for($i = 2007; $i <= $nextyear; $i++)
		{

			if($i != $officalsyears[$j][year]) 
			{

				$years[$k] = $i;
				$k++;
			}
			else {
								
				$j++;
			}	
			
		}
      	
    	$member = $this->sql->getMember($request);
    	$firstname = $_SESSION['firstname'];
    	$surname = $_SESSION['surname'];
    	$this->tpl->assign('firstname',$firstname); 
    	$this->tpl->assign('surname',$surname);     	
    	$this->tpl->assign('years',$years);
    	$this->tpl->assign('member',$member);
    	$this->tpl->display('maint_add_to_officials.tpl');

	}
	
  function maint_add_to_officials($request) {
	  
	  	$result = $this->sql->addToOfficials($request);

    	if (DB::isError($result)) {
      		die($boardmember->getMessage());
    	}
    	
    	$webmaster = $this->sql->getWebmaster();
		$studentnumber = $_SESSION['studentnumber'];
		$iswebmaster = 'false';
	
		if ($webmaster == $studentnumber) {
	
			$iswebmaster = 'true';
		}
    	
	    $board = $this->sql->getBoard();
	    $oldboard = $this->sql->getAllOldBoards();
	    $officials = $this->sql->getOfficials();
	    $oldofficials = $this->sql->getAllOldOfficials();
	    $nonmembers = $this->sql->getNonMembers();
	    $obsoletemembers = $this->sql->getObsoleteMembers();
	   	$members = $this->sql->getMembers();
	   	$firstname = $_SESSION['firstname'];
	    $surname = $_SESSION['surname'];
	    $lastlogon = $_SESSION['lastlogon'];
	    $this->tpl->assign('iswebmaster', $iswebmaster);
	    $this->tpl->assign('firstname', $firstname);
	    $this->tpl->assign('surname', $surname);
	    $this->tpl->assign('lastlogon', $lastlogon);
	    $this->tpl->assign('board', $board);
	    $this->tpl->assign('oldboard', $oldboard);
	    $this->tpl->assign('officials', $officials);
	    $this->tpl->assign('oldofficials', $oldofficials);
	    $this->tpl->assign('nonmembers', $nonmembers);
	    $this->tpl->assign('obsoletemembers', $obsoletemembers);
	    $this->tpl->assign('members', $members);
	    $this->tpl->display('maint_members.tpl');
	}

//function to delete member

  function maint_delete_member($request)  {

    	$this->sql->deleteMember($request);
    	
    	$webmaster = $this->sql->getWebmaster();
		$studentnumber = $_SESSION['studentnumber'];
		$iswebmaster = 'false';
	
		if ($webmaster == $studentnumber) {
	
			$iswebmaster = 'true';
		}
    	
	    $board = $this->sql->getBoard();
	    $oldboard = $this->sql->getAllOldBoards();
	    $officials = $this->sql->getOfficials();
	    $oldofficials = $this->sql->getAllOldOfficials();
	    $nonmembers = $this->sql->getNonMembers();
	    $obsoletemembers = $this->sql->getObsoleteMembers();
	   	$members = $this->sql->getMembers();
	   	$firstname = $_SESSION['firstname'];
	    $surname = $_SESSION['surname'];
	    $lastlogon = $_SESSION['lastlogon'];
	    $this->tpl->assign('iswebmaster', $iswebmaster);
	    $this->tpl->assign('firstname', $firstname);
	    $this->tpl->assign('surname', $surname);
	    $this->tpl->assign('lastlogon', $lastlogon);
	    $this->tpl->assign('board', $board);
	    $this->tpl->assign('oldboard', $oldboard);
	    $this->tpl->assign('officials', $officials);
	    $this->tpl->assign('oldofficials', $oldofficials);
	    $this->tpl->assign('nonmembers', $nonmembers);
	    $this->tpl->assign('obsoletemembers', $obsoletemembers);
	    $this->tpl->assign('members', $members);
	    $this->tpl->display('maint_members.tpl');

  }

  function maint_delete_member_from_board($request)  {

	    $webmaster = $this->sql->getWebmaster();
		$studentnumber = $_SESSION['studentnumber'];
		$iswebmaster = 'false';
	
		if ($webmaster == $studentnumber) {
	
			$iswebmaster = 'true';
		}  
	  
	  
   		$this->sql->deleteMemberFromBoard($request);
	    $board = $this->sql->getBoard();
	    $oldboard = $this->sql->getAllOldBoards();
	    $officials = $this->sql->getOfficials();
	    $oldofficials = $this->sql->getAllOldOfficials();
	    $nonmembers = $this->sql->getNonMembers();
	    $obsoletemembers = $this->sql->getObsoleteMembers();
	   	$members = $this->sql->getMembers();
	   	$firstname = $_SESSION['firstname'];
	    $surname = $_SESSION['surname'];
	    $lastlogon = $_SESSION['lastlogon'];
	    $this->tpl->assign('iswebmaster', $iswebmaster);
	    $this->tpl->assign('firstname', $firstname);
	    $this->tpl->assign('surname', $surname);
	    $this->tpl->assign('lastlogon', $lastlogon);
	    $this->tpl->assign('board', $board);
	    $this->tpl->assign('oldboard', $oldboard);
	    $this->tpl->assign('officials', $officials);
	    $this->tpl->assign('oldofficials', $oldofficials);
	    $this->tpl->assign('nonmembers', $nonmembers);
	    $this->tpl->assign('obsoletemembers', $obsoletemembers);
	    $this->tpl->assign('members', $members);
	    $this->tpl->display('maint_members.tpl');

	}
	
  function maint_delete_member_from_officials($request)  {
	  
	  	$webmaster = $this->sql->getWebmaster();
		$studentnumber = $_SESSION['studentnumber'];
		$iswebmaster = 'false';
	
		if ($webmaster == $studentnumber) {
	
			$iswebmaster = 'true';
		}  
	  
    	$this->sql->deleteMemberFromOfficials($request); 
	    $board = $this->sql->getBoard();
	    $oldboard = $this->sql->getAllOldBoards();
	    $officials = $this->sql->getOfficials();
	    $oldofficials = $this->sql->getAllOldOfficials();
	    $nonmembers = $this->sql->getNonMembers();
	    $obsoletemembers = $this->sql->getObsoleteMembers();
	   	$members = $this->sql->getMembers();
	   	$firstname = $_SESSION['firstname'];
	    $surname = $_SESSION['surname'];
	    $lastlogon = $_SESSION['lastlogon'];
	    $this->tpl->assign('iswebmaster', $iswebmaster);
	    $this->tpl->assign('firstname', $firstname);
	    $this->tpl->assign('surname', $surname);
	    $this->tpl->assign('lastlogon', $lastlogon);
	    $this->tpl->assign('board', $board);
	    $this->tpl->assign('oldboard', $oldboard);
	    $this->tpl->assign('officials', $officials);
	    $this->tpl->assign('oldofficials', $oldofficials);
	    $this->tpl->assign('nonmembers', $nonmembers);
	    $this->tpl->assign('obsoletemembers', $obsoletemembers);
	    $this->tpl->assign('members', $members);
	    $this->tpl->display('maint_members.tpl');

	}
      
// display new event insertion form

  function maint_add_event_form() {
	$day = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",  
                   "11" => "12",  
                   "12" => "13",  
                   "13" => "14",  
                   "14" => "15",  
                   "15" => "16",  
                   "16" => "17",  
                   "17" => "18",  
                   "18" => "19",  
                   "19" => "20",  
                   "20" => "21",  
                   "21" => "22",  
                   "22" => "23",  
                   "23" => "24",  
                   "24" => "25",  
                   "25" => "26",  
                   "26" => "27",  
                   "27" => "28",  
                   "28" => "29",  
                   "29" => "30",  
                   "30" => "31");   

	$month = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",
                   "11" => "12");

	$year = array("0" => "2007",
                   "1" => "2008",                
                   "2" => "2009",  
                   "3" => "2010",  
                   "4" => "2011",  
                   "5" => "2012",  
                   "6" => "2013");  


	$hour = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22",
                   "23" => "23");
                   

	$minute = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22", 
		     	   "23" => "23",
                   "24" => "24",                
                   "25" => "25",  
                   "26" => "26",  
                   "27" => "27",  
                   "28" => "28",  
                   "29" => "29",  
                   "30" => "30",  
                   "31" => "31",  
                   "32" => "32",  
                   "33" => "33",  
                   "34" => "34",  
                   "35" => "35",  
                   "36" => "36",  
                   "37" => "37",  
                   "38" => "38",  
                   "39" => "39",  
                   "40" => "40",  
                   "41" => "41",  
                   "42" => "42",  
                   "43" => "43",  
                   "44" => "44",  
                   "45" => "45",
                   "46" => "46",  
                   "47" => "47",  
                   "48" => "48",  
                   "49" => "49",  
                   "50" => "50",  
                   "51" => "51",  
                   "52" => "52",  
                   "53" => "53",  
                   "54" => "54",  
                   "55" => "55",  
                   "56" => "56",  
                   "57" => "57",  
                   "58" => "58",
                   "59" => "59"); 
           
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname);
    $this->tpl->assign('surname',$surname);
	$this->tpl->assign('day',$day);
	$this->tpl->assign('month',$month);
	$this->tpl->assign('year',$year);
	$this->tpl->assign('hour',$hour);
	$this->tpl->assign('minute',$minute);
    $this->tpl->display('maint_add_event.tpl');
  }
  
//function to delete event
  function maint_delete_event($request) {
    $eventid = $request['eventid'];
    $event = $this->sql->deleteEvent($eventid);
    $events = $this->sql->getEvents();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname);
    $this->tpl->assign('surname',$surname);
    $this->tpl->assign('events',$events);
    $this->tpl->display('maint_events.tpl');
  }
  
  function maint_participants($request) {
	  
    $participants = $this->sql->getParticipants($request);
    
    $event = $this->sql->getEvent($request['eventid']);
    
    $eventid = $event[0]['eventid'];
    
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('eventid',$eventid);  
	$this->tpl->assign('event',$event);  
	$this->tpl->assign('participants',$participants);  
    $this->tpl->display('maint_participants.tpl');
  }
  
 

  function remove_from_participants($request) {
	 
	$this->sql->removeParticipant($request);
	
    $participants = $this->sql->getParticipants($request);
    
    $event = $this->sql->getEvent($request['eventid']);
    
    $eventid = $event[0]['eventid'];
    
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('eventid',$eventid);  
	$this->tpl->assign('event',$event);  
	$this->tpl->assign('participants',$participants);  
    $this->tpl->display('maint_participants.tpl');
  }

//show event edition form

  function maint_edit_event_form($request) {
    $eventid = $request['eventid'];
    $event = $this->sql->getEvent($eventid);


	$day = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",  
                   "11" => "12",  
                   "12" => "13",  
                   "13" => "14",  
                   "14" => "15",  
                   "15" => "16",  
                   "16" => "17",  
                   "17" => "18",  
                   "18" => "19",  
                   "19" => "20",  
                   "20" => "21",  
                   "21" => "22",  
                   "22" => "23",  
                   "23" => "24",  
                   "24" => "25",  
                   "25" => "26",  
                   "26" => "27",  
                   "27" => "28",  
                   "28" => "29",  
                   "29" => "30",  
                   "30" => "31");   

	$month = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",
                   "11" => "12");

	$year = array("0" => "2006",
                   "1" => "2007",                
                   "2" => "2008",  
                   "3" => "2009",  
                   "4" => "2010",  
                   "5" => "2011",  
                   "6" => "2012");  


	$hour = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22",
                   "23" => "23"); 


	$minute = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22",
                   "23" => "23",
                   "24" => "24",                
                   "25" => "25",  
                   "26" => "26",  
                   "27" => "27",  
                   "28" => "28",  
                   "29" => "29",  
                   "30" => "30",  
                   "31" => "31",  
                   "32" => "32",  
                   "33" => "33",  
                   "34" => "34",  
                   "35" => "35",  
                   "36" => "36",  
                   "37" => "37",  
                   "38" => "38",  
                   "39" => "39",  
                   "40" => "40",  
                   "41" => "41",  
                   "42" => "42",  
                   "43" => "43",  
                   "44" => "44",  
                   "45" => "45",
                   "46" => "46",  
                   "47" => "47",  
                   "48" => "48",  
                   "49" => "49",  
                   "50" => "50",  
                   "51" => "51",  
                   "52" => "52",  
                   "53" => "53",  
                   "54" => "54",  
                   "55" => "55",  
                   "56" => "56",  
                   "57" => "57",  
                   "58" => "58",
                   "59" => "59"); 
                   
                   

	$eventstartday = substr($event[0]['eventstartdatetime'], 8, 2);
	$eventstartmonth = substr($event[0]['eventstartdatetime'], 5, 2);
	$eventstartyear = substr($event[0]['eventstartdatetime'], 0, 4);

	$eventstarthour = substr($event[0]['eventstartdatetime'], 11, 2);
	$eventstartminute = substr($event[0]['eventstartdatetime'], 14, 2);
	
	$eventendday = substr($event[0]['eventenddatetime'], 8, 2);
	$eventendmonth = substr($event[0]['eventenddatetime'], 5, 2);
	$eventendyear = substr($event[0]['eventenddatetime'], 0, 4);

	$eventendhour = substr($event[0]['eventenddatetime'], 11, 2);
	$eventendminute = substr($event[0]['eventenddatetime'], 14, 2);

	$this->tpl->assign('day',$day);
	$this->tpl->assign('month',$month);
	$this->tpl->assign('year',$year);
	$this->tpl->assign('hour',$hour);
	$this->tpl->assign('minute',$minute); 
    $this->tpl->assign('event',$event);

	$this->tpl->assign('eventstartday',$eventstartday);
	$this->tpl->assign('eventstartmonth',$eventstartmonth); 
    $this->tpl->assign('eventstartyear',$eventstartyear);

	$this->tpl->assign('eventstarthour',$eventstarthour); 
    $this->tpl->assign('eventstartminute',$eventstartminute);
    
    $this->tpl->assign('eventendday',$eventendday);
	$this->tpl->assign('eventendmonth',$eventendmonth); 
    $this->tpl->assign('eventendyear',$eventendyear);

	$this->tpl->assign('eventendhour',$eventendhour); 
    $this->tpl->assign('eventendminute',$eventendminute);
    
    $this->tpl->display('maint_edit_event.tpl');
  }


//update edited information to database
  function maint_edit_event($request) {
    $this->sql->editEvent($request);
    $events = $this->sql->getEvents();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('events',$events); 
    $this->tpl->display('maint_events.tpl');
    
  }


//display maintenance main menu

  function maint_show_main_menu() {
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->display('maint_main.tpl');
  }


// add new event data to database
  function maint_add_event($request) {
    $this->sql->insertEvent($request);
    $events = $this->sql->getEvents();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('events',$events);
    $this->tpl->display('maint_events.tpl');
  }


//add new news iformation to database
  function maint_add_news($request) {

    $this->sql->insert_news($request);
    $news = $this->sql->getNews();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('news',$news);
    $this->tpl->display('maint_news.tpl');
  }

//show links maintenance page
  function maint_show_links() {

    $links = $this->sql->getLinks();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('links',$links);
    $this->tpl->display('maint_links.tpl');
  }


//show form to insert new link info
  function maint_add_link_form() {

    $linkgroup = $this->sql->getLinkGroups();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('linkgroup',$linkgroup);
    $this->tpl->display('maint_add_link.tpl');

  }

//insert new link information to database
  function maint_add_link($request) {

    $this->sql->insertLink($request);
    $links = $this->sql->getLinks();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('links',$links);
    $this->tpl->display('maint_links.tpl');

  }

//show form to edit link information
  function maint_edit_link_form($request) {

    $link = $this->sql->getLink($request);
    $linkgroup = $this->sql->getLinkGroups();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('link',$link);
    $this->tpl->assign('linkgroup',$linkgroup);
    $this->tpl->display('maint_edit_link.tpl');

  }


//insert new link info to database
  function maint_edit_link($request) {

    $this->sql->editLink($request);
    $links = $this->sql->getLinks();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('links',$links);
    $this->tpl->display('maint_links.tpl');

  }

//delete link from database
  function maint_delete_link($request) {

    $this->sql->deleteLink($request);
    $links = $this->sql->getLinks();
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $this->tpl->assign('links',$links);
    $this->tpl->display('maint_links.tpl');

  }
  
  
  function maint_show_minutes() {
	  
	    $currentyear = date("Y");
	  
	    $boardyears = array();
	    
	    $j = 0;
	    
		for($i = 2007; $i <= $currentyear; $i++)
		{

			$boardyears[$j] = $i;
			$j++;
		}
		

		
	  $day = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",  
                   "11" => "12",  
                   "12" => "13",  
                   "13" => "14",  
                   "14" => "15",  
                   "15" => "16",  
                   "16" => "17",  
                   "17" => "18",  
                   "18" => "19",  
                   "19" => "20",  
                   "20" => "21",  
                   "21" => "22",  
                   "22" => "23",  
                   "23" => "24",  
                   "24" => "25",  
                   "25" => "26",  
                   "26" => "27",  
                   "27" => "28",  
                   "28" => "29",  
                   "29" => "30",  
                   "30" => "31");         
                   
	$month = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",
                   "11" => "12");

	$year = array("0" => "2006",
                   "1" => "2007",                
                   "2" => "2008",  
                   "3" => "2009",  
                   "4" => "2010",  
                   "5" => "2011",  
                   "6" => "2012");  


	$hour = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22",
                   "23" => "23"); 


	$minute = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22",
                   "23" => "23",
                   "24" => "24",                
                   "25" => "25",  
                   "26" => "26",  
                   "27" => "27",  
                   "28" => "28",  
                   "29" => "29",  
                   "30" => "30",  
                   "31" => "31",  
                   "32" => "32",  
                   "33" => "33",  
                   "34" => "34",  
                   "35" => "35",  
                   "36" => "36",  
                   "37" => "37",  
                   "38" => "38",  
                   "39" => "39",  
                   "40" => "40",  
                   "41" => "41",  
                   "42" => "42",  
                   "43" => "43",  
                   "44" => "44",  
                   "45" => "45",
                   "46" => "46",  
                   "47" => "47",  
                   "48" => "48",  
                   "49" => "49",  
                   "50" => "50",  
                   "51" => "51",  
                   "52" => "52",  
                   "53" => "53",  
                   "54" => "54",  
                   "55" => "55",  
                   "56" => "56",  
                   "57" => "57",  
                   "58" => "58",
                   "59" => "59");                   

	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	
  	$minutes= $this->sql->getMinutes();  
	
	$years= $this->sql->getBoardYears();

	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	
	$this->tpl->assign('day',$day);
	$this->tpl->assign('month',$month);
	$this->tpl->assign('year',$year);
	$this->tpl->assign('hour',$hour);
	$this->tpl->assign('minute',$minute);
    $this->tpl->assign('event',$event);  
    
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('minutes',$minutes);
	
	$this->tpl->assign('boardyears',$boardyears);
	$this->tpl->assign('years',$years);

	$this->tpl->display('maint_minutes.tpl');
  }
  
  function maint_add_minute($request) {
	
	//This is the directory where images will be saved
	$target = "/home/uno3396/public_html/poytakirjat/";
	$target = $target . basename( $_FILES['minute']['name']);
	
	//This gets all the other information from the form
	$minutedatetime=$_POST['minutedatetime'];
	$minute=($_FILES['minute']['name']);

	echo $_FILES['minute']['tmp_name'];

		
	//Writes the photo to the server
	if(move_uploaded_file($_FILES['minute']['tmp_name'], $target))
	{
		
		$request['minutename'] = basename( $_FILES['minute']['name']);
		
		$this->sql->insert_minute($request);
		
		//Tells you if its all ok
		$message = "The file ". basename( $_FILES['minute']['name']). " has been uploaded.";
	}
	else {
		//Gives and error if its not
		$message = "There was a problem uploading the file.";
	}
	

	
		    $currentyear = date("Y");

	    	$boardyears = array();
	    
	    	$j = 0;
	    
			for($i = 2007; $i <= $currentyear; $i++)
			{

				$boardyears[$j] = $i;
				$j++;
			}
	
			$day = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",  
                   "11" => "12",  
                   "12" => "13",  
                   "13" => "14",  
                   "14" => "15",  
                   "15" => "16",  
                   "16" => "17",  
                   "17" => "18",  
                   "18" => "19",  
                   "19" => "20",  
                   "20" => "21",  
                   "21" => "22",  
                   "22" => "23",  
                   "23" => "24",  
                   "24" => "25",  
                   "25" => "26",  
                   "26" => "27",  
                   "27" => "28",  
                   "28" => "29",  
                   "29" => "30",  
                   "30" => "31");   

	$month = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",
                   "11" => "12");

	$year = array("0" => "2006",
                   "1" => "2007",                
                   "2" => "2008",  
                   "3" => "2009",  
                   "4" => "2010",  
                   "5" => "2011",  
                   "6" => "2012");  


	$hour = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22",
                   "23" => "23"); 


	$minute = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22",
                   "23" => "23",
                   "24" => "24",                
                   "25" => "25",  
                   "26" => "26",  
                   "27" => "27",  
                   "28" => "28",  
                   "29" => "29",  
                   "30" => "30",  
                   "31" => "31",  
                   "32" => "32",  
                   "33" => "33",  
                   "34" => "34",  
                   "35" => "35",  
                   "36" => "36",  
                   "37" => "37",  
                   "38" => "38",  
                   "39" => "39",  
                   "40" => "40",  
                   "41" => "41",  
                   "42" => "42",  
                   "43" => "43",  
                   "44" => "44",  
                   "45" => "45",
                   "46" => "46",  
                   "47" => "47",  
                   "48" => "48",  
                   "49" => "49",  
                   "50" => "50",  
                   "51" => "51",  
                   "52" => "52",  
                   "53" => "53",  
                   "54" => "54",  
                   "55" => "55",  
                   "56" => "56",  
                   "57" => "57",  
                   "58" => "58",
                   "59" => "59");                   

	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	
  	$minutes= $this->sql->getMinutes();  
	
	$years= $this->sql->getBoardYears();

	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	
	$this->tpl->assign('day',$day);
	$this->tpl->assign('month',$month);
	$this->tpl->assign('year',$year);
	$this->tpl->assign('hour',$hour);
	$this->tpl->assign('minute',$minute);
    $this->tpl->assign('event',$event);  
    
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('minutes',$minutes);
	
	$this->tpl->assign('boardyears',$boardyears);
	$this->tpl->assign('years',$years);

	$this->tpl->assign('message',$message);
    $this->tpl->display('maint_minutes.tpl');
  }
  
  function maint_delete_minute($request) {
	  
	$minute = $this->sql->getMinute($request);  
	  
	$minute = $minute[0]['minutename'];
	
	  	//Writes the photo to the server
	if(unlink('/home/uno3396/public_html/poytakirjat/' . $minute))
	{
		$this->sql->deleteMinute($request);
		
		//Tells you if its all ok
		$message = "The file ". basename( $_FILES['minute']['name']). " has been deleted";
	}
	else {
		//Gives and error if its not
		$message = "Sorry, there was a problem deleting the file.";
	}

		    $currentyear = date("Y");

	    	$boardyears = array();
	    
	    	$j = 0;
	    
			for($i = 2007; $i <= $currentyear; $i++)
			{

				$boardyears[$j] = $i;
				$j++;
			}
	
			$day = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",  
                   "11" => "12",  
                   "12" => "13",  
                   "13" => "14",  
                   "14" => "15",  
                   "15" => "16",  
                   "16" => "17",  
                   "17" => "18",  
                   "18" => "19",  
                   "19" => "20",  
                   "20" => "21",  
                   "21" => "22",  
                   "22" => "23",  
                   "23" => "24",  
                   "24" => "25",  
                   "25" => "26",  
                   "26" => "27",  
                   "27" => "28",  
                   "28" => "29",  
                   "29" => "30",  
                   "30" => "31");   

	$month = array("0" => "1",
                   "1" => "2",                
                   "2" => "3",  
                   "3" => "4",  
                   "4" => "5",  
                   "5" => "6",  
                   "6" => "7",  
                   "7" => "8",  
                   "8" => "9",  
                   "9" => "10",  
                   "10" => "11",
                   "11" => "12");

	$year = array("0" => "2006",
                   "1" => "2007",                
                   "2" => "2008",  
                   "3" => "2009",  
                   "4" => "2010",  
                   "5" => "2011",  
                   "6" => "2012");  


	$hour = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22",
                   "23" => "23"); 


	$minute = array("0" => "00",
                   "1" => "01",                
                   "2" => "02",  
                   "3" => "03",  
                   "4" => "04",  
                   "5" => "05",  
                   "6" => "06",  
                   "7" => "07",  
                   "8" => "08",  
                   "9" => "09",  
                   "10" => "10",  
                   "11" => "11",  
                   "12" => "12",  
                   "13" => "13",  
                   "14" => "14",  
                   "15" => "15",  
                   "16" => "16",  
                   "17" => "17",  
                   "18" => "18",  
                   "19" => "19",  
                   "20" => "20",  
                   "21" => "21",  
                   "22" => "22",
                   "23" => "23",
                   "24" => "24",                
                   "25" => "25",  
                   "26" => "26",  
                   "27" => "27",  
                   "28" => "28",  
                   "29" => "29",  
                   "30" => "30",  
                   "31" => "31",  
                   "32" => "32",  
                   "33" => "33",  
                   "34" => "34",  
                   "35" => "35",  
                   "36" => "36",  
                   "37" => "37",  
                   "38" => "38",  
                   "39" => "39",  
                   "40" => "40",  
                   "41" => "41",  
                   "42" => "42",  
                   "43" => "43",  
                   "44" => "44",  
                   "45" => "45",
                   "46" => "46",  
                   "47" => "47",  
                   "48" => "48",  
                   "49" => "49",  
                   "50" => "50",  
                   "51" => "51",  
                   "52" => "52",  
                   "53" => "53",  
                   "54" => "54",  
                   "55" => "55",  
                   "56" => "56",  
                   "57" => "57",  
                   "58" => "58",
                   "59" => "59");                   

	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	
  	$minutes= $this->sql->getMinutes();  
	
	$years= $this->sql->getBoardYears();

	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	
	$this->tpl->assign('day',$day);
	$this->tpl->assign('month',$month);
	$this->tpl->assign('year',$year);
	$this->tpl->assign('hour',$hour);
	$this->tpl->assign('minute',$minute);
    $this->tpl->assign('event',$event);  
    
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('minutes',$minutes);
	
	$this->tpl->assign('boardyears',$boardyears);
	$this->tpl->assign('years',$years);

	$this->tpl->assign('message',$message);
    $this->tpl->display('maint_minutes.tpl');
  }
  
  

  // Show change passwd form

  function maint_change_passwd_form($request) {
    $message = "Please give your old password and your new password twice";
    
    $member = $this->sql->getMember($request);
    
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('member',$member);  
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname);
    $this->tpl->assign('message',$message);
    $this->tpl->display('maint_change_passwd_form.tpl');
  }

// do password change

  function maint_change_passwd($request) {

	$studentnumber = $request['studentnumber'];
    $newPasswd1 = $request['newPasswd1'];
    $newPasswd2 = $request['newPasswd2'];
    
    if (!($newPasswd1===$newPasswd2)) {
	    
	  $member = $this->sql->getMember(array('studentnumber' => $studentnumber));
	  
      $message = 'New password 1 was different from new password 2';
      $firstname = $_SESSION['firstname'];
	  $surname = $_SESSION['surname'];
      $this->tpl->assign('studentnumber',$studentnumber); 
      $this->tpl->assign('member',$member);
      $this->tpl->assign('firstname',$firstname); 
      $this->tpl->assign('surname',$surname);
      $this->tpl->assign('message',$message);
      $this->tpl->display('maint_change_passwd_form.tpl');
    }
    
    else {
	    
	$webmaster = $this->sql->getWebmaster();
	$studentnumber = $_SESSION['studentnumber'];
	$iswebmaster = 'false';
	
	if ($webmaster == $studentnumber) {
	
		$iswebmaster = 'true';
	}
	      
	$studentnumber = $request['studentnumber'];;
   	$table_fields = array('password' => md5($newPasswd1));
    $this->sql->editMemberPassword($table_fields, "studentnumber = " . $studentnumber);
	$message = "Password changed";
	$this->tpl->assign('message', $message);
    $board = $this->sql->getBoard();
    $oldboard = $this->sql->getAllOldBoards();
    $officials = $this->sql->getOfficials();
    $oldofficials = $this->sql->getAllOldOfficials();
    $nonmembers = $this->sql->getNonMembers();
   	$members = $this->sql->getMembers();
   	$firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $lastlogon = $_SESSION['lastlogon'];
    $this->tpl->assign('iswebmaster', $iswebmaster);
    $this->tpl->assign('firstname', $firstname);
    $this->tpl->assign('surname', $surname);
    $this->tpl->assign('lastlogon', $lastlogon);
    $this->tpl->assign('board', $board);
    $this->tpl->assign('oldboard', $oldboard);
    $this->tpl->assign('officials', $officials);
    $this->tpl->assign('oldofficials', $oldofficials);
    $this->tpl->assign('nonmembers', $nonmembers);
    $this->tpl->assign('members', $members);
    $this->tpl->display('maint_members.tpl');	
    }
  }

    

  // Show login form

  function maint_login_form($request, $message) {
    $_SESSION['request'] = $request; // in case the session expired
    if (isset($message))
      $this->tpl->assign('message',$message);
    $this->tpl->display('maint_login_form.tpl');
  }

  // Logout-login form

  function maint_logout_form($request, $message) {
    // Now we do not store the request
    if (isset($message))
      $this->tpl->assign('message',$message);
    $this->tpl->display('maint_login_form.tpl');
  }

  // Do login.

  function maint_login($request) {
	  
    $studentnumber = htmlentities($request['studentnumber']);
    $password = htmlentities($request['password']);
    $success = $this->sql->login($studentnumber, md5($password));

    if ($success) {
	    
	  $member = $this->sql->getMember(array('studentnumber' => $studentnumber));
	    
	  $this->sql->updateLastLogon($request);  
	        
      $_SESSION['studentnumber'] = $studentnumber;
      $_SESSION['firstname'] = $member[0]['first_name'];
      $_SESSION['surname'] = $member[0]['surname'];
      $_SESSION['lastlogon'] = $member[0]['lastlogon'];
            
      $_COOKIE['studentnumber'] = $studentnumber;
      
      //setcookie ("studentnumber",  $studentnumber, 0);
      
      $this->tpl->assign('firstname', $_SESSION['firstname']);
      $this->tpl->assign('surname', $_SESSION['surname']);
 	  $this->tpl->display('maint_main.tpl');
      }
      
    else {

      $message = "Incorrect studentnumber and/or password";
      $this->tpl->assign('message', $message);
      $this->tpl->display('maint_login_form.tpl');
    }
  }


//main function for maintenance section

  function maint_main($request) {
    // set the current action

    
    if (isset($request['action'])) {
      $action = $request['action'];
    }
    else {
      $action = 'init'; 
    }

    if ((!isset($_SESSION['studentnumber']) &&  
	 (!(($action==='init') || ($action==='login'))))) {
      $action = 'session_expired'; 
     }
      

    switch($action) {
    case 'login' :
      $this->maint_login($request);
      break;
    case 'main' :
      $this->maint_show_main_menu();
      break;
    case 'news' :
      $this->maint_show_news();
      break;
    case 'add_news_form':
      $this->maint_add_news_form();
      break;
    case 'add_news' :
      $this->maint_add_news($request);
      break;
    case 'edit_news_form' :
      $this->maint_edit_news_form($request);
      break;
    case 'edit_news' :
      $this->maint_edit_news($request);
      break;
    case 'delete_news' :
      $this->maint_delete_news($request);
      break;
    case 'members' :
      $this->maint_show_members();
      break;
    case 'add_boardmember_form' :
      $this->maint_show_add_boardmember_form();
      break;
    case 'add_boardmember' :
      $this->maint_add_boardmember($request);
      break;
    case 'edit_boardmember_form' :
      $this->maint_show_edit_boardmember_form($request);
      break;
    case 'edit_boardmember' :
      $this->edit_boardmember($request);
      break;
    case 'add_to_board_form' :
      $this->maint_add_to_board_form($request);
      break;
    case 'add_to_board' :
      $this->maint_add_to_board($request);
      break; 
    case 'add_to_officials_form' :
      $this->maint_add_to_officials_form($request);
      break;
    case 'add_to_officials' :
      $this->maint_add_to_officials($request);
      break;
    case 'add_member_form' :
      $this->maint_add_member_form();
      break;
    case 'add_member' :
      $this->maint_add_member($request);
      break;
    case 'edit_member_form' :
      $this->edit_member_form($request);
      break;
    case 'edit_member' :
      $this->edit_member($request);
      break;
    case 'delete_member' :
      $this->maint_delete_member($request);
      break;
    case 'delete_member_from_board' :
      $this->maint_delete_member_from_board($request);
      break;
    case 'delete_member_from_officials' :
      $this->maint_delete_member_from_officials($request);
      break;
    case 'events' :
      $this->maint_show_events();
      break;
    case 'add_event_form':
      $this->maint_add_event_form();
      break;
    case 'add_event' :
      $this->maint_add_event($request);
      break;
    case 'edit_event_form':
      $this->maint_edit_event_form($request);
      break;
    case 'edit_event' :
      $this->maint_edit_event($request);
      break;
    case 'delete_event' :
      $this->maint_delete_event($request);
      break;      
    case 'maint_participants' :
	   $this->maint_participants($request);
       break;
    case 'remove_from_participants' :
	   $this->maint_remove_from_participants($request);
       break;
    case 'links' :
      $this->maint_show_links();
      break;
    case 'add_link_form' :
      $this->maint_add_link_form();
      break;
    case 'add_link' :
      $this->maint_add_link($request);
      break;
    case 'edit_link' :
      $this->maint_edit_link($request);
      break;
    case 'edit_link_form' :
      $this->maint_edit_link_form($request);
      break;
    case 'delete_link' :
      $this->maint_delete_link($request);
      break;
    case 'minutes' :
      $this->maint_show_minutes();
      break;
    case 'add_minute_form' :
      $this->maint_add_minute_form();
      break;
    case 'add_minute' :
      $this->maint_add_minute($request);
      break;
    case 'delete_minute' :
      $this->maint_delete_minute($request);
      break;
    case 'passwd' :
      $this->maint_change_passwd_form($request);
      break;
    case 'change_passwd' :
      $this->maint_change_passwd($request);
      break;
    case 'session_expired' :
      $this->maint_login_form($request, "Your session has expired.");
      break;
    case 'logout' :
      unset($_SESSION['studentnumber']);
      unset($_SESSION['firstname']);	    
	  unset($_SESSION['surname']);
      unset($_SESSION['request']);
      $this->maint_logout_form($request, "You have been logged out.");
      break;
    case 'init' :
    default :
      $this->maint_login_form(NULL, 'Welcome');
      break;
    }       
  }


}
?>
