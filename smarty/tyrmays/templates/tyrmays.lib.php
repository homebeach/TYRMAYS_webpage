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

  // get links and lingroups and show links
  function display_links() {
	  
    $links = $this->sql->getLinks(); 
    $linkgroups = $this->sql->getLinkGroups();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('linkgroups',$linkgroups); 
    $this->tpl->assign('links',$links); 
    $this->tpl->display('links.tpl');
    
  }

  // Get a listing of future events and passed events and show them

  function display_events() {
	  
    $future_events = $this->sql->getFutureEvents();    
    $passed_events = $this->sql->getPastEvents();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('future_events',$future_events);  
    $this->tpl->assign('passed_events',$passed_events); 
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
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('futureevent',$futureevent);
	$this->tpl->assign('enrolled',$enrolled);
	$this->tpl->assign('eventfull',$eventfull);
    $this->tpl->assign('event',$event);  
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
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('past_events',$past_events);   
    $this->tpl->display('past_events.tpl');  
  }
  
  function enroll_member($request) {
	  
    $this->sql->enrollMember($request);
    
    $enrolled = 'true'; 
    
    $event = $this->sql->getEvent($request['eventid']);
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('enrolled',$enrolled);  
    $this->tpl->assign('event',$event);  
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
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('enrolled',$enrolled);  
    $this->tpl->assign('event',$event);  
    $this->tpl->display('event.tpl');
  }
  
  
  function display_participants($request) { 
	  
    $participants = $this->sql->getParticipants($request);
    
    $event = $this->sql->getEvent($request['eid']);
    
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
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('years',$years);
    $this->tpl->assign('year',$year);
    $this->tpl->assign('board',$board);
    $this->tpl->assign('officials',$officials);
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
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('years',$years);
    $this->tpl->assign('year',$year);
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
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);    
	$this->tpl->assign('years',$years);
	$this->tpl->assign('year',$year);
    $this->tpl->assign('board',$board);
    $this->tpl->assign('officials',$officials);
    $this->tpl->display('board.tpl');
    
  }
  
  
  function display_minutes() {
	  
	$minutes= $this->sql->getMinutes();  
	
	$years= $this->sql->getBoardYears();
	
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
	$this->tpl->assign('minutes',$minutes);
	$this->tpl->assign('years',$years);
    $this->tpl->display('minutes.tpl');
    
  }
  
  
//display association information
  function display_info() {
	
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->display('info.tpl');
  }
  
  function display_history() {
	  
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->display('history.tpl');  
  }


//display memership application form
  function display_membership($request) {
 
	$majors = $this->sql->getMajors();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);	
	$this->tpl->assign('majors',$majors); 
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
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);	
	$this->tpl->assign('majors',$majors);
	$this->tpl->assign('member',$member);
	$this->tpl->assign('referencenumber',$referencenumber);  
    $this->tpl->display('edit_membership.tpl'); 
  }
  
  function changepassword($request) {
 
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
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
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('message',$message);
		$this->tpl->assign('password',$password);
		$this->tpl->assign('oldpassword',$oldpassword);
    	$this->tpl->display('changepassword.tpl');
      }
      
    else {
	
	    if ($lang == 'fi') {
			$message = 'Salasanaa ei muutettu, koska syötteessä oli virheitä!';
	  	}
		else {
	  		$message = 'Password was not changed because there were errors!';  
	  	}
	    
    	$studentnumber = $_SESSION['studentnumber'];
		$firstname = $_SESSION['firstname'];
		$surname = $_SESSION['surname'];
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('message',$message);
		$this->tpl->assign('password',$password);
		$this->tpl->assign('oldpassword',$oldpassword);
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
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);	
	$this->tpl->assign('majorsstats',$majorsstats); 
	$this->tpl->assign('membercount',$membercount); 
	$this->tpl->assign('supportmembercount',$supportmembercount); 
    $this->tpl->display('memberstats.tpl'); 
  }
    
  function edit_membership($request) {
	
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
    	$this->tpl->display('membership.tpl');
		  
  	}
  	  	  
  	else {
	  
	  	$request['studentnumber'] = $_SESSION['studentnumber'];
  
	  	$referencenumber = $this->sql->getReferenceNumber($request);
	  	
		$this->sql->simpleEditMember($request, 'true');
		
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
    	$this->tpl->display('membership.tpl');
		  
  	}
  	  	  
  	else {
	  
		if ($request['maillist'] == "on") {
			
			$to = "listserv@uta.fi";
			//$subject = "Add to tyrmays";
			$body = "add tyrmays " . $request['email'] . " " . $request['firstname'] . " " . $request['surname'];
			
			//mail($to, $subject, $body);
 				
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
			//mail($to, $subject, $body);
			
		}
		else {
		
			$to = $request['email'];
 			$subject = "Welcome to TYRMÄYS ry!";
			$body = "Welcome to TYRMÄYS ry! Price for our membership is 5 euros and it can be paid to our account: 573008-2361224 (TSOP) with referencenumber " . $referencearray['referencenumber'] . " or to some of our board members in our events.";
			//mail($to, $subject, $body);
		
		}
		
		$freereferencenumbers = $this->sql->getAmountOfFreeReferenceNumbers();
		
		$to = "petri.kotiranta@uta.fi";		
		$subject = "Liittynyt " . $request['firstname'] . " " . $request['surname'];
 		$body = "[TYRMAYS_LOMAKE] Jäsenhakemus: " . $request['firstname'] . " " . $request['surname'] . " viitteellä " . $referencearray['referencenumber'] . ". Viitteitä jäljellä: " .	$freereferencenumbers[0]['freereferencenumbercount'] . ".";
		//mail($to, $subject, $body);
		
		$to = "manteli.numminen@uta.fi";
		//mail($to, $subject, $body);
		
		$to = "atte.karhunen@uta.fi";
		//mail($to, $subject, $body);
		
	$majors = $this->sql->getMajors();
	$result = 'success';
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('username',$request['studentnumber']);
	//$this->tpl->assign('action','membership');
	$this->tpl->assign('referencenumber',$referencearray['referencenumber']);
	$this->tpl->assign('result',$result);
	$this->tpl->assign('majors',$majors); 
    $this->tpl->display('memberwelcome.tpl');
   }
  }
  
   function getreferencenumber($request) {
	    
	    $references = $this->sql->getNewReferenceNumber();
		$referencearray['referencenumber'] = $references[0]['referencenumber'];
		$referencearray['studentnumber'] = $_SESSION['studentnumber'];

		$this->sql->insert_Reference($referencearray);

		$request['studentnumber'] = $_SESSION['studentnumber'];

		$member = $this->sql->getMember($request);		
		$majors = $this->sql->getMajors();
		
		$studentnumber = $_SESSION['studentnumber'];
		$firstname = $_SESSION['firstname'];
		$surname = $_SESSION['surname'];
		$this->tpl->assign('studentnumber',$studentnumber);
		$this->tpl->assign('firstname',$firstname);
		$this->tpl->assign('surname',$surname);
		$this->tpl->assign('referencenumber',$references[0]['referencenumber']); 
		$this->tpl->assign('majors',$majors);
		$this->tpl->assign('member',$member);
	    $this->tpl->display('edit_membership.tpl');
	    
	}
  
//display association rules
  function display_rules() {
	  
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->display('rules.tpl');  
  }

//display association contact info
  function display_contact() {
	  
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->display('contact.tpl');  
  }

// display association news
  function display_news() {
	  
    $news = $this->sql->getNews();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('news',$news);  
    $this->tpl->display('news.tpl');  
  }
  
   function display_all_news() {
	   
    $news = $this->sql->getAllNews();
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->assign('news',$news);  
    $this->tpl->display('news_all.tpl');  
  }

//display single news
  function display_newsdetails($nid) {
	  
    $news = $this->sql->getNewsdetails($nid);  
    
    $this->tpl->assign('news',$news);
    $studentnumber = $_SESSION['studentnumber'];
	$firstname = $_SESSION['firstname'];
	$surname = $_SESSION['surname'];
	$this->tpl->assign('studentnumber',$studentnumber);
	$this->tpl->assign('firstname',$firstname);
	$this->tpl->assign('surname',$surname);
    $this->tpl->display('news_details.tpl');  
  }
  
  function getpassword() {

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
	 	$body = "Uusi salasanasi " . $password;
	 	
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
	
	$this->tpl->assign('message',$message);
	$this->tpl->display('getpassword.tpl');  
  }
  
  function login($request, $lang) {
	
    $studentnumber = htmlentities($request['studentnumber']);
    $password = htmlentities($request['password']);
    $success = $this->sql->publiclogin($studentnumber, md5($password));

   
    if ($success) {
	    
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
       $lang = 'en'; 
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
	 $this->display_oldboard($request['year']);
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

    $board = $this->sql->getBoard();
    $oldboard = $this->sql->getAllOldBoards();
    $officials = $this->sql->getOfficials();
    $oldofficials = $this->sql->getAllOldOfficials();
   	$members = $this->sql->getMembers();
   	$firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('iswebmaster', $iswebmaster);
    $this->tpl->assign('firstname', $firstname);
    $this->tpl->assign('surname', $surname);
    $this->tpl->assign('board', $board);
    $this->tpl->assign('oldboard', $oldboard);
    $this->tpl->assign('officials', $officials);
    $this->tpl->assign('oldofficials', $oldofficials);
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
	
    $firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('firstname',$firstname); 
    $this->tpl->assign('surname',$surname); 
    $board = $this->sql->getBoard();
    $oldboard = $this->sql->getAllOldBoards();
    $officials = $this->sql->getOfficials();
    $oldofficials = $this->sql->getAllOldOfficials();
   	$members = $this->sql->getMembers();
   	$this->tpl->assign('iswebmaster', $iswebmaster);
    $this->tpl->assign('board', $board);
    $this->tpl->assign('oldboard', $oldboard);
    $this->tpl->assign('officials', $officials);
    $this->tpl->assign('oldofficials', $oldofficials);
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
   		$members = $this->sql->getMembers();
   		$firstname = $_SESSION['firstname'];
    	$surname = $_SESSION['surname'];
    	$this->tpl->assign('iswebmaster', $iswebmaster);
    	$this->tpl->assign('firstname',$firstname);
    	$this->tpl->assign('surname',$surname);
    	$this->tpl->assign('board', $board);
    	$this->tpl->assign('oldboard', $oldboard);
    	$this->tpl->assign('officials', $officials);
    	$this->tpl->assign('oldofficials', $oldofficials);
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
   		$members = $this->sql->getMembers();
   		$firstname = $_SESSION['firstname'];
    	$surname = $_SESSION['surname'];
    	$this->tpl->assign('firstname',$firstname); 
    	$this->tpl->assign('surname',$surname); 
   	    $this->tpl->assign('board', $board);
    	$this->tpl->assign('oldboard', $oldboard);
    	$this->tpl->assign('officials', $officials);
    	$this->tpl->assign('oldofficials', $oldofficials);
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
   		$members = $this->sql->getMembers();
   		$firstname = $_SESSION['firstname'];
    	$surname = $_SESSION['surname'];
    	$this->tpl->assign('iswebmaster',$iswebmaster); 
    	$this->tpl->assign('firstname',$firstname); 
    	$this->tpl->assign('surname',$surname); 
    	$this->tpl->assign('board', $board);
    	$this->tpl->assign('oldboard', $oldboard);
    	$this->tpl->assign('officials', $officials);
    	$this->tpl->assign('oldofficials', $oldofficials);
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
   		$members = $this->sql->getMembers();
   		$firstname = $_SESSION['firstname'];
    	$surname = $_SESSION['surname'];
    	$this->tpl->assign('iswebmaster',$iswebmaster); 
    	$this->tpl->assign('firstname',$firstname); 
    	$this->tpl->assign('surname',$surname); 
    	$this->tpl->assign('board', $board);
    	$this->tpl->assign('oldboard', $oldboard);
    	$this->tpl->assign('officials', $officials);
    	$this->tpl->assign('oldofficials', $oldofficials);
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
   		$members = $this->sql->getMembers();
   		$firstname = $_SESSION['firstname'];
    	$surname = $_SESSION['surname'];
    	$this->tpl->assign('iswebmaster',$iswebmaster); 
    	$this->tpl->assign('firstname',$firstname); 
    	$this->tpl->assign('surname',$surname); 
    	$this->tpl->assign('board', $board);
    	$this->tpl->assign('oldboard', $oldboard);
    	$this->tpl->assign('officials', $officials);
    	$this->tpl->assign('oldofficials', $oldofficials);
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
   		$members = $this->sql->getMembers();
   		$firstname = $_SESSION['firstname'];
    	$surname = $_SESSION['surname'];
    	$this->tpl->assign('iswebmaster',$iswebmaster); 
    	$this->tpl->assign('firstname',$firstname); 
    	$this->tpl->assign('surname',$surname); 
    	$this->tpl->assign('board', $board);
    	$this->tpl->assign('oldboard', $oldboard);
    	$this->tpl->assign('officials', $officials);
    	$this->tpl->assign('oldofficials', $oldofficials);
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
   	$members = $this->sql->getMembers();
   	$firstname = $_SESSION['firstname'];
    $surname = $_SESSION['surname'];
    $this->tpl->assign('iswebmaster', $iswebmaster); 
    $this->tpl->assign('firstname', $firstname); 
    $this->tpl->assign('surname', $surname); 
    $this->tpl->assign('board', $board);
    $this->tpl->assign('oldboard', $oldboard);
    $this->tpl->assign('officials', $officials);
    $this->tpl->assign('oldofficials', $oldofficials);
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
      
      $_SESSION['studentnumber'] = $studentnumber;
      $_SESSION['firstname'] = $member[0]['first_name'];
      $_SESSION['surname'] = $member[0]['surname'];
      
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
      $action = 'session_expired'; }


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
