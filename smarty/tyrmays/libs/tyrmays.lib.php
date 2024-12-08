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

  // display main page

  function display_main() {
	  
	$news = $this->sql->getNews();  
	
	$studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $future_events = $this->sql->getFutureEvents();
    $this->tpl->assign('studentnumber',$studentnumber); 
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->assign('news',$news);
    $this->tpl->display('main.tpl');
    
  }

  // get links and lingroups and show links
  function display_links() {
	  
    $links = $this->sql->getLinks(); 
    $linkgroups = $this->sql->getLinkGroups();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('linkgroups',$linkgroups); 
    $this->tpl->assign('links',$links);
    $this->tpl->assign('future_events',$future_events); 
    $this->tpl->display('links.tpl');
    
  }

  // Get a listing of future events and passed events and show them

  function display_events() {
	  
    $future_events = $this->sql->getFutureEvents();    
    $past_events = $this->sql->getPastEvents();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('future_events',$future_events);  
    $this->tpl->assign('past_events',$past_events); 
    $this->tpl->display('events.tpl');    
  }


 //display singe event
  function display_event($request) {
	  
    $event = $this->sql->getEvent($request['eid']);
	  
    if ($_SESSION['studentnumber'] != '') {
    
	    $request['studentnumber'] = $_SESSION['studentnumber'];
	    
    	$result = $this->sql->checkParticipant($request);
    	
    	
    	if ($result[0]['enrolled'] == 0 ) {
	    	$enrolled = 'false';
    	}
    	else {
	    	$enrolled = 'true';
    	}	
    
	}
	
	$futureevent = 'false';
	
		if ($event[0]['eventstartdatetime'] > date("Y-m-d H:i")) {

			$futureevent = 'true';

		}
	
	$eventfull = 'false';
	
	if ($event[0]['maxparticipants'] != '') {
		    
		$participants = $this->sql->getParticipantCount($request['eventid']);
				
			if ($participants[0]['participantcount'] >= $event[0]['maxparticipants']) {
		
				$eventfull = 'true';
				
			}    
	}    
    
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('futureevent',$futureevent);
	$this->tpl->assign('enrolled',$enrolled);
	$this->tpl->assign('eventfull',$eventfull);
    $this->tpl->assign('event',$event);
    $this->tpl->assign('future_events',$future_events);
    $this->tpl->display('event.tpl');  
  }
  
  function display_future_events() {
	
    $future_events = $this->sql->getFutureEvents();
    
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('future_events',$future_events);
    $this->tpl->display('future_events.tpl');  
  }
  
  function display_past_events() {
	
    $past_events = $this->sql->getPastEvents();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('past_events',$past_events);
    $this->tpl->assign('future_events',$future_events); 
    $this->tpl->display('past_events.tpl');  
  }
  
  function enroll_member($request) {
	  
    $this->sql->enrollMember($request);
    
    $enrolled = 'true'; 
    
    $event = $this->sql->getEvent($request['eventid']);
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('enrolled',$enrolled);  
    $this->tpl->assign('event',$event);
    $this->tpl->assign('future_events',$future_events);
    $this->tpl->display('event.tpl');
  }
  
  function leave_event($request) {
	  
	$request['studentnumber'] = $_SESSION['studentnumber'];  
	  
    $this->sql->leave_event($request);
    
    $enrolled = 'false'; 
    
    $event = $this->sql->getEvent($request['eventid']);
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('enrolled',$enrolled);  
    $this->tpl->assign('event',$event);
    $this->tpl->assign('future_events',$future_events);
    $this->tpl->display('event.tpl');
  }
  
  
  function display_participants($request) { 
	  
    $participants = $this->sql->getParticipants($request);
    
    $event = $this->sql->getEvent($request['eid']);
    
    $eventid = $event[0]['eventid'];
    
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('eventid',$eventid);  
	$this->tpl->assign('event',$event);  
	$this->tpl->assign('participants',$participants);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('participants.tpl');
  }

//display association board members
  function display_board() {
	  
	$years = $this->sql->getBoardYears();  
	
	$year = $years[0]['year'];
	
    $board = $this->sql->getBoard();
    $officials = $this->sql->getOfficials();
    
    $i = 0;
    
    while($i < count($board)) {
	
	    list ($name, $location)=split('@', $board[$i]['email']); 
		$board[$i]['email'] = $name . '(_at_)' . $location;
	    	    
	$i++;        
	}    
	
	$j = 0;
	
	while($j < count($officials)) {
	
	    list ($name, $location)=split('@', $officials[$j]['email']); 
		$officials[$j]['email'] = $name . '(_at_)' . $location;
	    	    
	$j++;        
	}    
    
    
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('years',$years);
    $this->tpl->assign('year',$year);
    $this->tpl->assign('board',$board);
    $this->tpl->assign('officials',$officials);
    $this->tpl->assign('future_events',$future_events);
    $this->tpl->display('board.tpl');
    
  }
  
  
  function display_past_boards() {
	  
	  	
		
	  
	$years = $this->sql->getBoardYears();  
	
	$year = $years[0]['year'];
	
	$i = 0;
    
    while($i < count($board)) {
	
	    list ($name, $location)=split('@', $board[$i]['email']); 
		$board[$i]['email'] = $name . '(_at_)' . $location;
	    	    
	$i++;        
	}    
	
	$j = 0;
	
	while($j < count($officials)) {
	
	    list ($name, $location)=split('@', $officials[$j]['email']); 
		$officials[$j]['email'] = $name . '(_at_)' . $location;
	    	    
	$j++;        
	}    
	
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('years',$years);
    $this->tpl->assign('year',$year);
    $this->tpl->assign('future_events',$future_events);
    $this->tpl->display('past_boards.tpl');
    
  }
  
  function display_oldboard($request) {
	  
	$years = $this->sql->getBoardYears();

	$board = $this->sql->getOldBoard($request);  
	$officials = $this->sql->getOldOfficials($request);
    $year = $request['year'];
    
    $year = $year + 2000;
    
    $i = 0;
    
    while($i < count($board)) {
	
	    list ($name, $location)=split('@', $board[$i]['email']); 
		$board[$i]['email'] = $name . '(_at_)' . $location;
	    	    
	$i++;        
	}    
	
	$j = 0;
	
	while($j < count($officials)) {
	
	    list ($name, $location)=split('@', $officials[$j]['email']); 
		$officials[$j]['email'] = $name . '(_at_)' . $location;
	    	    
	$j++;        
	} 
    
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);    
	$this->tpl->assign('years',$years);
	$this->tpl->assign('year',$year);
    $this->tpl->assign('board',$board);
    $this->tpl->assign('officials',$officials);
    $this->tpl->assign('future_events',$future_events);
    $this->tpl->display('board.tpl');
    
  }
  
  
  function display_minutes() {
	  
	$minutes= $this->sql->getMinutes();  
	
	$years= $this->sql->getBoardYears();
	
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('minutes',$minutes);
	$this->tpl->assign('years',$years);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('minutes.tpl');
    
  }
  
  
//display association information
  function display_info() {
	
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('info.tpl');
  }
  
  function display_history() {
	  
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('history.tpl');  
  }


//display memership application form
  function display_membership($request) {
	  
	$majors = $this->sql->getMajors();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);	
	$this->tpl->assign('majors',$majors);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('membership.tpl'); 
  }
  
  
  function display_editmembership($request) {
	    	
	$member = $this->sql->getMember($request);  
	$majors = $this->sql->getMajors();
	
	if(isset($_SESSION['studentnumber'])) {
		
		$request['studentnumber'] = $_SESSION['studentnumber'];
		$referencenumber = $this->sql->getReferenceNumber($request);
		$referencenumber = $referencenumber[0]['referencenumber'];

	}
		
	$studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);	
	$this->tpl->assign('majors',$majors);
	$this->tpl->assign('member',$member);
	$this->tpl->assign('referencenumber',$referencenumber);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('edit_membership.tpl'); 
  }
  
  function changepassword($request) {
	  

    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('changepassword.tpl'); 
  }
  
  function changepassword_request($request) {
	  

 
	
	$studentnumber = $_SESSION['studentnumber'];
    $password = htmlentities($request['oldpassword']);
    $success = $this->sql->publiclogin($studentnumber, md5($password));

    $failure = 'false';
    
    if($request['password'] !== $request['password2'] || strlen($request['password']) < 8)  { 
	
		$password = 'error';
		$failure = 'true';
		
	}
    	
	if(!$success)  { 
	
		$oldpassword = 'error';	
		$failure = 'true';  
		
	}
    
    if ($success && $failure == 'false') {
	    
	    $password = htmlentities($request['password']);
	    $table_fields = array('password' => md5($password));
    	$this->sql->editMemberPassword($table_fields, "studentnumber = " . $studentnumber);
	  
	    if ($lang == 'fi') {
			$message = 'Salasana muutettu onnistuneesti.';
	  	}
		else {
	  		$message = 'Password was succesfully changed.';  
	  	}
	  		      
		$studentnumber = $_SESSION['studentnumber'];
		$firstname = $_SESSION['firstname'];
	    $surname = $_SESSION['surname'];
	    $future_events = $this->sql->getFutureEvents();
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('message',$message);
		$this->tpl->assign('password',$password);
		$this->tpl->assign('oldpassword',$oldpassword);
		$this->tpl->assign('future_events',$future_events);
    	$this->tpl->display('changepassword.tpl');
      }
      
    else {
	
	    if ($lang == 'fi') {
			$message = 'Salasanaa ei muutettu, koska syötteessä oli virheitä!';
	  	}
		else {
	  		$message = 'Password was not changed because there were errors!';  
	  	}
	    
	  	$future_events = $this->sql->getFutureEvents();
	  	
    	$studentnumber = $_SESSION['studentnumber'];
		$firstname = $_SESSION['firstname'];
		$surname = $_SESSION['surname'];
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('message',$message);
		$this->tpl->assign('password',$password);
		$this->tpl->assign('oldpassword',$oldpassword);
		$this->tpl->assign('future_events',$future_events);
    	$this->tpl->display('changepassword.tpl');
    	
 	}
 	 
  }
  
  function display_membershipstatistics() {
	  
	
	$majorsstats = $this->sql->getMajorStatistics();
	$membercount = $this->sql->getMemberCount();
	$supportmembercount = $this->sql->getSupportMemberCount();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);	
	$this->tpl->assign('majorsstats',$majorsstats); 
	$this->tpl->assign('membercount',$membercount); 
	$this->tpl->assign('supportmembercount',$supportmembercount);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('memberstats.tpl'); 
  }
    
  function edit_membership($request) {
	  
	  	$future_events = $this->sql->getFutureEvents();
		$this->tpl->assign('future_events',$future_events);
	
	$failure = 'false';
	$firstname = '';
	$surname = '';
	$phone = '';
	$email = '';
	$studentnumber = '';
	
	if($request['firstname'] === ""	)  {
	
		$firstname = 'error';
		$failure = 'true';
		
	}

	if($request['surname'] === "" )  { 
		
		$surname = 'error';
		$failure = 'true';  
	
	}

	if($request['phone'] === ""	)  { 

		$phone = 'error';
		$failure = 'true';  
		
	}

	if($request['email'] === ""	)  { 

		$email = 'error';
		$failure = 'true';  
		
		
	}
	
	if($lang === "en" && $request['bot'] != "no")  { 

		$bot = 'error';
		$failure = 'true';  
		
		
	}

	if($lang === "fi" && $request['bot'] != "en")  { 

		$bot = 'error';
		$failure = 'true';  
		
		
	}
	
	if($failure === 'true') {
		
	  	$referencenumber = $this->sql->getReferenceNumber($request);
		
		$member = $request;
		
		$majors = $this->sql->getMajors();
	
		$result = 'failure';
		
		$future_events = $this->sql->getFutureEvents();

		$member = $this->sql->getMember($request);		
		$this->tpl->assign('result',$result);
		$this->tpl->assign('majorid',$majorid);
		$this->tpl->assign('majors',$majors);
		$this->tpl->assign('referencenumber',$referencenumber[0]['referencenumber']); 
		$this->tpl->assign('member',$member);		
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('phone',$phone);
		$this->tpl->assign('email',$email);
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('member',$member);
		$this->tpl->assign('future_events',$future_events);
    	$this->tpl->display('membership.tpl');
		  
  	}
  	  	  
  	else {
	  
	  	$request['studentnumber'] = $_SESSION['studentnumber'];
  
	  	$referencenumber = $this->sql->getReferenceNumber($request);
	  	
		$this->sql->simpleEditMember($request, 'true');
		
		$future_events = $this->sql->getFutureEvents();
		
		$member = $this->sql->getMember($request);
		$majors = $this->sql->getMajors();
		$result = 'success';
	    $studentnumber = $_SESSION['studentnumber'];
		$firstname = $_SESSION['firstname'];
		$surname = $_SESSION['surname'];
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('action','membership');
		$this->tpl->assign('result',$result);
		$this->tpl->assign('majors',$majors);
		$this->tpl->assign('referencenumber',$referencenumber[0]['referencenumber']); 
		$this->tpl->assign('member',$member);
		$this->tpl->assign('future_events',$future_events);
	    $this->tpl->display('edit_membership.tpl');
   }
  }
  
  function membership_request($request, $lang) {
	  
	
	$failure = 'false';
	$firstname = '';
	$surname = '';
	$phone = '';
	$email = '';
	$studentnumber = '';


	if($request['firstname'] === ""	)  {
	
		$firstname = 'error';
		$failure = 'true';
		
	}

	
	if($request['surname'] === "" )  { 
		
		$surname = 'error';
		$failure = 'true';  
	
	}


	if($request['phone'] === ""	)  { 

		$phone = 'error';
		$failure = 'true';  
		
	}


	if($request['email'] === ""	)  { 

		$email = 'error';
		$failure = 'true';  
		
		
	}
	
	
	if($request['membershiptype'] === "student" && $request['studentnumber'] === "")  { 
	
		$studentnumber = 'error';	
		$failure = 'true';  
		
	}
	

	if($request['membershiptype'] === "student" && $request['majorid'] === "0")  { 
	
		$majorid = 'error';	
		$failure = 'true';  
		
	}
	
	$passwordsdonotmatch = 'false';	
	
	if($request['password'] !== $request['password2'])  { 
	
		$passwordsdonotmatch = 'true';	
		$failure = 'true';  
		
	}
	
	if($request['password'] === "")  { 
	
		$password = 'error';	
		$failure = 'true';  
		
	}
		
	if($request['bot'] != "no" && $request['bot'] != "en")  { 

		$bot = 'error';
		$failure = 'true';  
			
	}
	

	if($failure === 'true') {
		
		$member = $request;
		
		$majors = $this->sql->getMajors();
	
		$result = 'failure'; 
		
		$future_events = $this->sql->getFutureEvents();
		
		$this->tpl->assign('action','membership');
		$this->tpl->assign('result',$result);
		$this->tpl->assign('majorid',$majorid);
		$this->tpl->assign('majors',$majors); 
		$this->tpl->assign('member',$member);		
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('phone',$phone);
		$this->tpl->assign('email',$email);
		$this->tpl->assign('studentnumber',$studentnumber);  
		$this->tpl->assign('passwordsdonotmatch',$passwordsdonotmatch);
		$this->tpl->assign('bot',$bot);
		$this->tpl->assign('future_events',$future_events);
    	$this->tpl->display('membership.tpl');
		  
  	}
  	  	  
  	else {
	  
		if ($request['maillist'] == "on") {
			
			
			$to = 'listserv@uta.fi"';
			$subject = 'Add to tyrmays list';
			$body = "add tyrmays " . $request['email'] . " " . $request['firstname'] . " " . $request['surname'];
			$headers = 'From: web-developer@tyrmays.net' . "\r\n" .
			    'Reply-To: web-developer@tyrmays.net' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $body, $headers);
 				
		}
		
		if ($request['membershiptype'] === "notstudent") {
			
			$id = $this->sql->getNewSupportingMemberId();
			$request['studentnumber'] = 'support' . $id[0]['id'];
			
		}
		
		if ($request['membershiptype'] === "former") {

			$id = $this->sql->getNewFormerStudentMemberId();
			$request['studentnumber'] = 'former' . $id[0]['id'];
			
		}
		
		$request['password'] = md5($request['password']);
	
		$this->sql->insert_Member($request, 'true');
		
		$references = $this->sql->getNewReferenceNumber();
		$referencearray['referencenumber'] = $references[0]['referencenumber'];
		$referencearray['studentnumber'] = $request['studentnumber'];
		
		$this->sql->insert_Reference($referencearray);

		if ($lang === 'fi') {
		
			$to = $request['email'];
 			$subject = "Tervetuloa TYRMÄYS ry:n jäseneksi!";
			$body = "Tervetuloa TYRMÄYS ry:n jäseneksi! Jäsenmaksu olisi 5 euroa ja sen voi maksaa tilille 573008-2361224 (TSOP) viitteellä " . $referencearray['referencenumber'] . " tai jollekin hallituksen jäsenelle tapahtumissamme.";
			mail($to, $subject, $body);
			
		}
		else {
		
			$to = $request['email'];
 			$subject = "Welcome to TYRMÄYS ry!";
			$body = "Welcome to TYRMÄYS ry! Price for our membership is 5 euros and it can be paid to our account: 573008-2361224 (TSOP) with referencenumber " . $referencearray['referencenumber'] . " or to some of our board members in our events.";
			mail($to, $subject, $body);
		
		}
		
		$freereferencenumbers = $this->sql->getAmountOfFreeReferenceNumbers();
		
		$to = "petri.kotiranta@uta.fi";		
		$subject = "Liittynyt " . $request['firstname'] . " " . $request['surname'];
 		$body = "[TYRMAYS_LOMAKE] Jäsenhakemus: " . $request['firstname'] . " " . $request['surname'] . " viitteellä " . $referencearray['referencenumber'] . ". Viitteitä jäljellä: " .	$freereferencenumbers[0]['freereferencenumbercount'] . ".";
		mail($to, $subject, $body);
		
		$to = "ville.heikkila@uta.fi";
		mail($to, $subject, $body);
		
			
		
		
		
	$majors = $this->sql->getMajors();
	$result = 'success';
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('username',$request['studentnumber']);
	$future_events = $this->sql->getFutureEvents();
	//$this->tpl->assign('action','membership');
	$this->tpl->assign('referencenumber',$referencearray['referencenumber']);
	$this->tpl->assign('result',$result);
	$this->tpl->assign('majors',$majors);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('memberwelcome.tpl');
   }
  }
  
    
   function display_membership_renewal($request) {
	   
	   	
	   	$referencenumber = $this->sql->getReferenceNumber($request);

		$studentnumber = $_SESSION['studentnumber'];
		$firstname = $_SESSION['firstname'];
		$surname = $_SESSION['surname'];
		$future_events = $this->sql->getFutureEvents();
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('referencenumber',$referencenumber[0]['referencenumber']);
		$this->tpl->assign('future_events',$future_events);
	    $this->tpl->display('renewal.tpl');
	    
	}
  
  
  
  
   function getreferencenumber($request) {
	   


	    
	    $references = $this->sql->getNewReferenceNumber();
		$referencearray['referencenumber'] = $references[0]['referencenumber'];
		$referencearray['studentnumber'] = $_SESSION['studentnumber'];

		$this->sql->insert_Reference($referencearray);

		$request['studentnumber'] = $_SESSION['studentnumber'];
		
		$studentnumber = $_SESSION['studentnumber'];
		$firstname = $_SESSION['firstname'];
		$surname = $_SESSION['surname'];
		$future_events = $this->sql->getFutureEvents();
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('referencenumber',$references[0]['referencenumber']);
		$this->tpl->assign('future_events',$future_events);
	    $this->tpl->display('renewal.tpl');
	    
	}
  
//display association rules
  function display_rules() {
	  
	  	
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('rules.tpl');  
  }

//display association contact info
  function display_contact() {
	  
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('contact.tpl');  
  }

// display association news
  function display_news() {
	  
    $news = $this->sql->getNews();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$future_events = $this->sql->getFutureEvents();  
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('news',$news);
    $this->tpl->assign('future_events',$future_events);
    $this->tpl->display('news.tpl');  
  }
  
   function display_all_news() {
	   
	$future_events = $this->sql->getFutureEvents();   
    $news = $this->sql->getAllNews();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('news',$news);
    $this->tpl->assign('future_events',$future_events);
    $this->tpl->display('news_all.tpl');  
  }

//display single news
  function display_newsdetails($nid) {
	  
	  	$future_events = $this->sql->getFutureEvents();
		$this->tpl->assign('future_events',$future_events);
	  
    $news = $this->sql->getNewsdetails($nid);  
    
    $this->tpl->assign('news',$news);
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('future_events',$future_events);
    $this->tpl->display('news_details.tpl');  
  }
  
  function getpassword() {
	  
	 $future_events = $this->sql->getFutureEvents();
	 $this->tpl->assign('future_events',$future_events);
	 $this->tpl->display('getpassword.tpl');  
  }
  
  function sendpassword($request) {
	 

    $password = "";

    $possible = "0123456789abcdefghijklmnopqrstuvwxyz"; 
    
    $i = 0; 
    
    $length = 8;
    
    while ($i < $length) {

    	$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
        
    	if (!strstr($password, $char)) {
      		$password .= $char;
      		$i++;
        }

  	}
  	
  	$member = $this->sql->getMemberByEmail($request);

  	if ($member[0]['studentnumber'] != '') {
  	
		$table_fields = array('password' => md5($password));
	    $this->sql->editMemberPassword($table_fields, "studentnumber = " . $member[0]['studentnumber']);
	
		$to = $request['email'];
		$subject = "Salasanasi TYRMÄYS ry:n sivuille";
	 	$body = "Käyttäjätunnuksesi/ Your username: " . $member[0]['studentnumber'] . ". Uusi salasanasi/ Your new password: " . $password;
	 	
		mail($to, $subject, $body);
		
		if ($lang == 'fi') {
			$message = "Uusi salasana lähetetty sähköpostiosoitteeseen.";
	  	}
		else {
	  		$message = "New password has been sent to the e-mail address.";  
	  	}
	
	}
	else {
		
		 if ($lang == 'fi') {
		 	$message = "Sähköpostiosoitetta ei löydy!";
	  	 }
		 else {
	  		$message = "E-mail address not found!";
		 }
	}  
	
	$future_events = $this->sql->getFutureEvents();
	$this->tpl->assign('future_events',$future_events);
	$this->tpl->assign('message',$message);
	$this->tpl->display('getpassword.tpl');  
  }
  
  function login($request, $lang) {
	
    $studentnumber = htmlentities($request['studentnumber']);
    $password = htmlentities($request['password']);
    $success = $this->sql->publiclogin($studentnumber, md5($password));

    if ($success) {
	    
	    $this->sql->updateLastLogon($request); 
	    
	    $member = $this->sql->getMember(array('studentnumber' => $studentnumber));
	      
	    $_SESSION['studentnumber'] = $studentnumber;
	    $_SESSION['firstname'] = $member[0]['first_name'];
	    $_SESSION['surname'] = $member[0]['surname'];
	    
	    $_COOKIE['studentnumber'] = $studentnumber;
	      
		$future_events = $this->sql->getFutureEvents();
		$news = $this->sql->getNews();
		
		$studentnumber = $_SESSION['studentnumber'];
		$firstname = $_SESSION['firstname'];
	    $surname = $_SESSION['surname'];
	    
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('future_events',$future_events);
		$this->tpl->assign('news',$news);
		$this->tpl->display('main.tpl');
      }
      
    else {


      $future_events = $this->sql->getFutureEvents();
	  $news = $this->sql->getNews();
	  
	  if ($lang == 'fi') {
		  
	  	$message = "Käyttäjänimi ja salasana eivät kelpaa";
  	  }
	  else {
		  
  		$message = "Incorrect studentnumber and/or password";
	  }
	  
	  
		$future_events = $this->sql->getFutureEvents();
		$news = $this->sql->getNews();
		
		$studentnumber = $_SESSION['studentnumber'];
		$firstname = $_SESSION['firstname'];
	    $surname = $_SESSION['surname'];
	    
	    $this->tpl->assign('message', $message);
	    $this->tpl->assign('studentnumber',$studentnumber);
	    $this->tpl->assign('firstname',$firstname);
	    $this->tpl->assign('surname',$surname);
		$this->tpl->assign('future_events',$future_events);
	    $this->tpl->assign('news',$news);
	    $this->tpl->display('main.tpl');
    }
  }
  
  
    function logout() {
	    
	    unset($_SESSION['studentnumber']);
	    unset($_SESSION['firstname']);	    
	    unset($_SESSION['surname']);
      	unset($_SESSION['request']);
 
      	
      if ($lang == 'fi') {
	  	$message = "Olet kirjautunut ulos.";
  	  }
	  else {
  		$message = "You have been logged out.";
	  }
	  
	  	$future_events = $this->sql->getFutureEvents();
		$news = $this->sql->getNews();
	  		
	  	$this->tpl->assign('future_events',$future_events);
	    $this->tpl->assign('news',$news);
      	$this->tpl->assign('message', $message);
	    $this->tpl->display('main.tpl');
  }

// main function for public part

  function main($request) {
	  
     // set the current action
     if (isset($request['action'])) {
       $action = $request['action'];
     }
     else {
       $action = 'main'; 
     }
     // set the current language
     if (isset($request['lang'])) {
       $lang = $request['lang'];
     }
     else {
       $lang = 'fi'; 
     }

    $this->tpl->assign('action',$action); 
    $this->tpl->assign('lang',$lang); 
    if  (isset($request['details'])) {
      $this->tpl->assign('details','yes');
      $this->tpl->assign('eventid',$request['eid']);
      $this->tpl->assign('newsnumber',$request['nid']);
    }
    else {
      $this->tpl->assign('details','no');
    }

     switch($action) {
	 case 'login' :
      $this->login($request, $lang);
      break;
     case 'getpassword' :
      $this->getpassword();
      break;
     case 'sendpassword' :
      $this->sendpassword($request);
      break;
     case 'changepassword' :
      $this->changepassword($request);
      break;
     case 'changepassword_request' :
      $this->changepassword_request($request);
      break;
     case 'main' :
       $this->display_main();
       break;
     case 'news' :
       $this->display_news();
       break;
     case 'allnews' :
       $this->display_all_news();
       break;
     case 'newsdetails' :
    if (isset($request['details'])) {
	 $this->display_newsdetails($request['nid']);
	 break;
       }
       else {
	 $this->display_news();
	 break;
       }
     case 'board' :
       $this->display_board();
       break;
     case 'past_boards' :
       $this->display_past_boards();
       break;
     case 'oldboard' :
    if (isset($request['details'])) {
	 $this->display_oldboard($request);
       }
       else {
	 $this->display_board();
       }
       break;  
     case 'minutes' :
       $this->display_minutes();
       break;
     case 'future_events' :
	 $this->display_future_events();
       break;
     case 'past_events' :
	 $this->display_past_events();
       break;
     case 'event' :
       if (isset($request['details'])) {
	 $this->display_event($request);
       }
       else {
	 $this->display_events();
       }
       break;
     case 'enroll' :
	   $this->enroll_member($request);
       break;
     case 'leave' :
	   $this->leave_event($request);
       break;
     case 'participants' :
	   $this->display_participants($request);
       break;           
     case 'info' :
       $this->display_info();
       break;
     case 'history' :
       $this->display_history();
       break;
     case 'joinmember' :
       $this->display_membership($request);
       break;
     case 'membership_request' :
       $this->membership_request($request, $lang);
       break;
     case 'editmember' :
       $this->display_editmembership($request);
       break;  
     case 'editmember_request' :
       $this->edit_membership($request);
       break;
     case 'renewal' :
       $this->display_membership_renewal($request);
       break;
     case 'getreferencenumber' :
       $this->getreferencenumber($request);
       break;
     case 'memberstatistics' :
       $this->display_membershipstatistics();
       break;
     case 'rules' :
       $this->display_rules();
       break;
     case 'contact' :
       $this->display_contact();
       break;
     case 'links' :
       $this->display_links();
       break;
     case 'logout' :
      $this->logout();
      break;
     default :
       $this->display_main();
       break;
     }

  }

}
?>
