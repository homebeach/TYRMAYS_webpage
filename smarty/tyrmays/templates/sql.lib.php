<?php


class SQL {
  var $db = null;
  var $result = null;
  var $error = null;
  var $record = null;

  // dummy constructor

  function SQL() {}

  // connection to database, we assume an options array,
  // which contains name-value pairs
  function connect($dsn, $options) {
    $this->db = DB::connect($dsn, $options);
    if (DB::isError($this->db)) {
      $this->error = $this->db->getMessage();
      return false;
    }
    $this->db->setFetchMode(DB_FETCHMODE_ASSOC);
    return true;
  }

  // simple disconnect:
  function disconnect() {
    $this->db->disconnect();
  }

  function editEvent($request) {
	  
	  
   $eventstartdate = $request['eventstartyear'] . '-' . $request['eventstartmonth'] . '-' . $request['eventstartday'];

   $eventstarttime = $request['eventstarthour'] . ':' . $request['eventstartminute'] . ':' . 00;
   
   $eventstartdatetime = $eventstartdate . " " . $eventstarttime;
   
   $eventenddate = $request['eventendyear'] . '-' . $request['eventendmonth'] . '-' . $request['eventendday'];

   $eventendtime = $request['eventendhour'] . ':' . $request['eventendminute'] . ':' . 00;
   
   $eventenddatetime = $eventenddate . " " . $eventendtime;
	  
	  
   $valuearray = array('eventstartdatetime' => $eventstartdatetime, 
			 	 'eventenddatetime' =>  $eventenddatetime,
			 	 'eventnameen' => $request['eventNameEn'], 
			  	 'eventnamefi' => $request['eventNameFi'],
			  	 'eventdescriptionen' => $request['eventDescriptionEn'],
			  	 'eventlocation' => $request['eventLocation'],
			  	 'eventlocationlink' => $request['eventLocationLink'],
			  	 'eventgallerylink' => $request['eventGalleryLink']);

    $table_name = 'uno3396.events';

    $where = 'eventid = ' . $request['eventid'];
	
    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_UPDATE, $where);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }

  function deleteEvent($eventid) {
    $stmt = "DELETE FROM uno3396.events WHERE eventid = ?";
    $data =  $eventid;
    $res = $this->db->query($stmt, $data);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }

  function insertEvent($request) {
	
   $eventstartdate = $request['eventstartyear'] . '-' . $request['eventstartmonth'] . '-' . $request['eventstartday'];

   $eventstarttime = $request['eventstarthour'] . ':' . $request['eventstartminute'] . ':' . 00;
   
   $eventstartdatetime = $eventstartdate . " " . $eventstarttime;
   
   $eventenddate = $request['eventendyear'] . '-' . $request['eventendmonth'] . '-' . $request['eventendday'];

   $eventendtime = $request['eventendhour'] . ':' . $request['eventendminute'] . ':' . 00;
   
   $eventenddatetime = $eventenddate . " " . $eventendtime;
   

   $valuearray = array('eventstartdatetime' => $eventstartdatetime, 
			 	 'eventenddatetime' =>  $eventenddatetime,
			 	 'eventnameen' => $request['eventNameEn'], 
			  	 'eventnamefi' => $request['eventNameFi'],
			  	 'eventdescriptionen' => $request['eventDescriptionEn'],
			  	 'eventlocation' => $request['eventLocation'],
			  	 'eventlocationlink' => $request['eventLocationLink'],
			  	 'eventgallerylink' => $request['eventGalleryLink']);

    $table_name = 'uno3396.events';
    
    $res = $this->db->autoExecute($table_name, $valuearray,
			    DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }


  function getEvent($eventid) {
    $stmt = "SELECT * FROM uno3396.events WHERE eventid = ?";
    $data =  array('eventid' => $eventid);
    return $this->db->getAll($stmt,$data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }                                  // Smartyn section-rakennetta varten

  function getEvents() {
    $stmt = "SELECT * FROM uno3396.events order by events.eventstartdatetime desc";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }   

  function getFutureEvents() {
	  
    $stmt = "SELECT events.eventstartdatetime, events.eventenddatetime, events.eventnameen, events.eventnamefi, events.eventdescriptionen, events.eventdescriptionfi, events.eventgallerylink, events.eventid
   FROM uno3396.events
  WHERE events.eventstartdatetime >= now() order by events.eventstartdatetime";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }    

  function getPastEvents() {
	  
    $stmt = "SELECT events.eventstartdatetime, events.eventenddatetime, events.eventnameen, events.eventnamefi, events.eventdescriptionen, events.eventdescriptionfi, events.eventgallerylink, events.eventid
   FROM uno3396.events
  WHERE events.eventstartdatetime <= now() order by events.eventstartdatetime desc";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }

  function getNews() {
    $stmt = "SELECT * FROM uno3396.news n, uno3396.members m WHERE n.studentnumber_insert=m.studentnumber order by n.newsinserteddatetime desc LIMIT 0,5";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona
  }
  
  function getAllNews() {
    $stmt = "SELECT * FROM uno3396.news order by newsinserteddatetime desc";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona
  }  

  function getNewsdetails($nid) {
	//SELECT * FROM uno3396.news n, uno3396.members m1,uno3396.members m2 WHERE  n.studentnumber_insert=m1.studentnumber and n.studentnumber_edit=m2.studentnumber order by n.newsinserteddatetime desc LIMIT 0,5
    $stmt = "SELECT * FROM uno3396.news where newsid = ?";
	$data = array($nid); 
    return $this->db->getAll($stmt, $data); // getAll palauttaa kaikki "sopivana" taulukkona 

  }
  
  function getMajors() {
	
   $stmt = "SELECT * FROM major ORDER BY majorfi";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  
  function getMajorStatistics() {
	  
	$stmt = "SELECT m.majoren, m.majorfi, count(e.studentnumber) as members FROM major m, members e WHERE m.majorid = e.majorid and m.majorid != 0 group by e.majorid order by members desc";
	return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona    
  }  
  
  
  function getMemberCount() {
	
	$stmt = "SELECT count(*) as membercount FROM members";
	return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona  
  }  
  
  function getSupportMemberCount() {
	
	$stmt = "SELECT count(*) as supportmembercount FROM members where majorid = 0";
	return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }  
  
  

  function getBoard() {
	
   $stmt = "SELECT m.first_name, m.surname, m.other_names, m.phone, m.email, m.password, m.studentnumber, m.membership_requested, m.membership_last_paid, m.membership_paid, m.band1, m.band2, m.band3, b.statusen, b.statusfi, m.picture, m.ircnick, m.msn_messenger, m.other_ims, m.commentsen, m.commentsfi, b.year, field( statusen, 'The Mighty Black Wizard', 'Chairperson', 'Vice Chairperson', 'Secretary', 'Treasurer' ) as weight
   FROM uno3396.members m, uno3396.board b
  WHERE m.studentnumber = b.studentnumber and b.year=(select max(year) from board) ORDER BY field( field( statusen, 'The Mighty Black Wizard', 'Chairperson', 'Vice Chairperson', 'Secretary', 'Treasurer' ) , 1, 2, 3, 4, 5, 0 )";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getBoardYears() {
	
   $stmt = "SELECT DISTINCT year FROM board ORDER BY year DESC";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getOldBoard($request) {
	  
   $year = $request['year'];
   
   $stmt = "SELECT m.first_name, m.surname, other_names, m.phone, m.email, m.password, m.studentnumber, m.membership_requested, membership_last_paid, m.membership_paid, m.band1, m.band2, m.band3, b.statusen, b.statusfi, m.picture, m.ircnick, m.msn_messenger, m.other_ims, m.commentsen, m.commentsfi, b.year, field( statusen, 'The Mighty Black Wizard', 'Chairperson', 'Vice Chairperson', 'Secretary', 'Treasurer' ) as weight
   FROM uno3396.members m, uno3396.board b
  WHERE m.studentnumber = b.studentnumber and b.year = ? + 2000 ORDER BY field( field( statusen, 'The Mighty Black Wizard', 'Chairperson', 'Vice Chairperson', 'Secretary', 'Treasurer' ) , 1, 2, 3, 4, 5, 0 )";
	 $data = array($year); 
     return $this->db->getAll($stmt,$data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getAllOldBoards() {
   
   $stmt = "SELECT m.first_name, m.surname, other_names, m.phone, m.email, m.password, m.studentnumber, m.membership_requested, membership_last_paid, m.membership_paid, m.band1, m.band2, m.band3, b.statusen, b.statusfi, m.picture, m.ircnick, m.msn_messenger, m.other_ims, m.commentsen, m.commentsfi, b.year, field( statusen, 'The Mighty Black Wizard', 'Chairperson', 'Vice Chairperson', 'Secretary', 'Treasurer' ) as weight
   FROM uno3396.members m, uno3396.board b
  WHERE m.studentnumber = b.studentnumber and b.year not in (select max(year) from board) ORDER BY year, field( field( statusen, 'The Mighty Black Wizard', 'Chairperson', 'Vice Chairperson', 'Secretary', 'Treasurer' ) , 1, 2, 3, 4, 5, 0 )";
     
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getOfficials() {
	
   $stmt = "SELECT m.first_name, m.surname, m.other_names, m.phone, m.email, m.password, m.studentnumber, m.membership_requested, m.membership_last_paid, m.membership_paid, m.band1, m.band2, m.band3, o.statusen, o.statusfi, m.picture, m.ircnick, m.msn_messenger, m.other_ims, m.commentsen, m.commentsfi, o.year
   FROM uno3396.members m, uno3396.officials o
  WHERE m.studentnumber = o.studentnumber and o.year=(select max(year) from officials)";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getOldOfficials($request) {
	  
   $year = $request['year'];  
	
   $stmt = "SELECT m.first_name, m.surname, other_names, m.phone, m.email, m.password, m.studentnumber, m.membership_requested, m.membership_last_paid, m.membership_paid, m.band1, m.band2, m.band3, o.statusen, o.statusfi, m.picture, m.ircnick, m.msn_messenger, m.other_ims, m.commentsen, m.commentsfi, o.year
   FROM uno3396.members m, uno3396.officials o
  WHERE m.studentnumber = o.studentnumber and o.year = ? + 2000";
  	 $data = array($year); 
    return $this->db->getAll($stmt,$data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getAllOldOfficials() {
	
   $stmt = "SELECT m.first_name, m.surname, other_names, m.phone, m.email, m.password, m.studentnumber, m.membership_requested, m.membership_last_paid, m.membership_paid, m.band1, m.band2, m.band3, o.statusen, o.statusfi, m.picture, m.ircnick, m.msn_messenger, m.other_ims, m.commentsen, m.commentsfi, o.year
   FROM uno3396.members m, uno3396.officials o
  WHERE m.studentnumber = o.studentnumber and o.year not in (select max(year) from officials)";

    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }

  function getBoardMember($request) {
 	
    $data =  $request['studentnumber'];
    
    $stmt = "SELECT m.first_name, m.surname, other_names, m.phone, m.email, m.password, m.studentnumber, membership_requested, membership_last_paid, m.membership_paid, m.band1, m.band2, m.band3, b.statusen, b.statusfi, m.picture, m.ircnick, m.msn_messenger, m.other_ims, m.commentsen, m.commentsfi, b.year
   FROM uno3396.members m, uno3396.board b
  WHERE m.studentnumber = b.studentnumber and m.studentnumber = ?";
    return $this->db->getAll($stmt,$data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }  


  function getMember($request) {

    $data = array($request['studentnumber']);
    $stmt = "select * from uno3396.members m, uno3396.major s where m.majorid=s.majorid and m.studentnumber = ?";
    return $this->db->getAll($stmt, $data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getMemberByEmail($request) {

    $data = array('email' => $request['email']);
    $stmt = "select * from uno3396.members m where m.email = ?";
    return $this->db->getAll($stmt, $data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getMembersBoardYears($request) {

    $data = array($request['studentnumber']);
    $stmt = "select year from uno3396.board where studentnumber = ?";
    return $this->db->getAll($stmt, $data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }  

  function getMembersOfficialsYears($request) {

    $data = array($request['studentnumber']);
    $stmt = "select year from uno3396.officials where studentnumber = ?";
    return $this->db->getAll($stmt, $data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }  


  function simpleEditMember($request) {
 
   $where = 'studentnumber = ' . $request['studentnumber'];
     
   $valuearray = array(
      			'first_name' => $request['firstname'], 
      			'surname' => $request['surname'],
     			'other_names' => $request['othernames'],
			 	'phone' => $request['phone'],
			 	'email' => $request['email'],
			  	'majorid' => $request['majorid'],
			    'ircnick' => $request['ircnick'],
			   	'msn_messenger' => $request['msnmessenger'],
			   	'other_ims' => $request['otherims'],
				'commentsen' => $request['commentsen'],
				'commentsfi' => $request['commentsfi']);

    $table_name = 'uno3396.members';

    $res = $this->db->autoExecute($table_name, $valuearray,
			    DB_AUTOQUERY_UPDATE, $where);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }

  }  
  
  function editMember($request) {
 
   $where = 'studentnumber = ' . $request['studentnumber'];
        
   $requestdate = $request['requestyear'] . '-' . $request['requestmonth'] . '-' . $request['requestday'];

   $requesttime = $request['requesthour'] . ':' . $request['requestminute'] . ':' . 00;
   
   $membershiprequested = $requestdate . " " . $requesttime;
   
   $paydate = $request['payyear'] . '-' . $request['paymonth'] . '-' . $request['payday'];

   $paytime = $request['payhour'] . ':' . $request['payminute'] . ':' . 00;
   
   $membershiplastpaid = $paydate . " " . $paytime;
   
     
   $valuearray = array(
      			'first_name' => $request['firstname'], 
      			'surname' => $request['surname'],
     			'other_names' => $request['othernames'],
			 	'phone' => $request['phone'],
			 	'email' => $request['email'],
			  	'majorid' => $request['majorid'],
			  	'membership_requested' => $membershiprequested,
			  	'membership_last_paid' => $membershiplastpaid,
			  	'membership_paid' => $request['membership_paid'], 
			  	'band1' => $request['band1'],
			  	'band2' => $request['band2'],
		        'band3' => $request['band3'],
			    'ircnick' => $request['ircnick'],
			   	'msn_messenger' => $request['msnmessenger'],
			   	'other_ims' => $request['otherims'],
				'picture' => $request['picture'],
				'commentsen' => $request['commentsen'],
				'commentsfi' => $request['commentsfi']);

    $table_name = 'uno3396.members';

    $res = $this->db->autoExecute($table_name, $valuearray,
			    DB_AUTOQUERY_UPDATE, $where);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }

  }
  
  function editMemberPassword($valuearray, $where) {
    $table_name = 'uno3396.members';
    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_UPDATE, $where);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }
  
  function getMembers() {
	  
    $stmt = "SELECT * FROM uno3396.members m, uno3396.major s WHERE m.majorid=s.majorid";
           
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getWebmaster() {
	  
    $stmt = "SELECT DISTINCT b.studentnumber FROM uno3396.board b, uno3396.officials o WHERE b.statusen ='Web-developer' OR b.statusen = 'Webmaster' OR o.statusen = 'Web-developer' OR o.statusen = 'Webmaster'";
    
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }  

  function deleteMember($request) {

    $studentnumber = $request['studentnumber'];

    $data =  array($studentnumber);

   	$stmt = "DELETE FROM uno3396.members WHERE studentnumber = ?";
    $data =  array($studentnumber);
   	$res = $this->db->query($stmt, $data);
   	
  	 if (PEAR::isError($res)) {
      	    die($res->getMessage());
    	}

  }

  function deleteMemberFromBoard($request)  {

	  $studentnumber = $request['studentnumber'];
	  $year = $request['year'];			

   	  $stmt = "DELETE FROM uno3396.board WHERE studentnumber = ? and year = ?";
   	  
      $data =  array('studentnumber' => $studentnumber, 'year' => $year);
      
   	  $res = $this->db->query($stmt, $data);
   	
  	   if (PEAR::isError($res)) {
      	    die($res->getMessage());
    	}

    }
  
   function deleteMemberFromOfficials($request)  {
	    
	  $studentnumber = $request['studentnumber'];
	  $year = $request['year'];			

   	  $stmt = "DELETE FROM uno3396.officials WHERE studentnumber = ? and year = ?";
   	  
      $data =  array('studentnumber' => $studentnumber, 'year' => $year);
      
   	  $res = $this->db->query($stmt, $data);
   	
  	   if (PEAR::isError($res)) {
      	    die($res->getMessage());
    	}

    }  

  function insert_Member($request, $joinrequest) {
	  
	  
	  	  
   if($joinrequest === 'true') {	  
	
   		$stmt = "SELECT now() as now";
	
   		$time = $this->db->getAll($stmt); 
    
   		$membershiprequested = $time[0]['now'];
   		
   }
   else {
   
   
   		$requestdate = $request['requestyear'] . '-' . $request['requestmonth'] . '-' . $request['requestday'];

   		$requesttime = $request['requesthour'] . ':' . $request['requestminute'] . ':' . 00;
   
   		$membershiprequested = $requestdate . " " . $requesttime;
   
	}
   
   
   $paydate = $request['payyear'] . '-' . $request['paymonth'] . '-' . $request['payday'];

   $paytime = $request['payhour'] . ':' . $request['payminute'] . ':' . 00;
   
   $membershiplastpaid = $paydate . " " . $paytime;
     
     
   $valuearray = array(
      			'first_name' => $request['firstname'], 
      			'surname' => $request['surname'],
     			'other_names' => $request['othernames'],
			 	'phone' => $request['phone'],
			 	'email' => $request['email'],
			 	'studentnumber' => $request['studentnumber'],
			 	'password' => $request['password'],
			  	'majorid' => $request['majorid'],
			  	'membership_requested' => $membershiprequested,
			  	'membership_last_paid' => $request['membershiplastpaid'],
			  	'membership_paid' => $membershiplastpaid, 
			  	'band1' => $request['band1'],
			  	'band2' => $request['band2'],
		        'band3' => $request['band3'],
			    'ircnick' => $request['ircnick'],
			   	'msn_messenger' => $request['msn_messenger'],
			   	'other_ims' => $request['other_ims'],
				'picture' => $request['picture'],
				'commentsen' => $request['commentsen'],
				'commentsfi' => $request['commentsfi']);
				
    $table_name = 'uno3396.members';

    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }

  }
  
  function enrollMember($request) {
	  
    $valuearray = array(
      			'eventid' => $request['eventid'], 
      			'studentnumber' => $request['studentnumber']);
				
    $table_name = 'uno3396.participants';

    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }
  
  
  function leave_event($request) {
	    
	    
	$stmt = "DELETE FROM uno3396.participants WHERE eventid = ? and studentnumber = ?";    
	    
	$data = array(
      			'eventid' => $request['eventid'], 
      			'studentnumber' => $request['studentnumber']);    
	    
    $res = $this->db->query($stmt, $data);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }
  
  function getParticipants($request) {
	  
	$stmt = "SELECT m.first_name, m.surname FROM uno3396.members m, uno3396.participants p WHERE m.studentnumber=p.studentnumber and p.eventid = ?";
	        
    $data = array('eventid' => $request['eid']);
      			
    return $this->db->getAll($stmt,$data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  
  function checkParticipant($request) {
	  
	$stmt = "SELECT count(*) as enrolled FROM uno3396.participants p WHERE p.eventid = ? and p.studentnumber = ?";
	        
    $data = array('eventid' => $request['eid'], 
      			  'studentnumber' => $request['studentnumber']);
      			
    return $this->db->getAll($stmt,$data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function getParticipantCount($request) {
	  
	$stmt = "SELECT count(studentnumber) as participantcount FROM uno3396.participants p WHERE p.eventid = ?";
	        
    $data = array('eventid' => $request['eventid']);
      			
    return $this->db->getAll($stmt,$data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  
  function getNewReferenceNumber() {

    $stmt = "SELECT min( referencenumber ) as referencenumber FROM uno3396.references r WHERE r.studentnumber = ''";
    
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 	  
  }
  
  function getReferenceNumber($request) {

	$data = array('studentnumber' => $request['studentnumber']);
	  
    $stmt = "SELECT referencenumber FROM uno3396.references r WHERE r.studentnumber = ?";
    
    return $this->db->getAll($stmt,$data); // getAll palauttaa kaikki "sopivana" taulukkona 	  
  }
  
  
  function getAmountOfFreeReferenceNumbers() {

    $stmt = "SELECT count( referencenumber ) as freereferencenumbercount FROM uno3396.references r WHERE r.studentnumber = ''";
    
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 	  
  }
  
  
  function getNewSupportingMemberId() {
	  
  	$valuearray = array('support' => 'support');
				
    $table_name = 'uno3396.supportingmembers';
	
    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
	
    $stmt = "SELECT max( id ) AS id FROM uno3396.supportingmembers";
	
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 	  
  }
  
  function getNewFormerStudentMemberId() {
	  
  	$valuearray = array('former' => 'former');
				
    $table_name = 'uno3396.formerstudentmembers';
	
    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
	
    $stmt = "SELECT max( id ) AS id FROM uno3396.formerstudentmembers";
	
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 	  
  }
  
  
  function insert_Reference($request) {

  	$valuearray = array('studentnumber' => $request['studentnumber']);

  	$where = "referencenumber = '" . $request['referencenumber'] . "'";
  	
    $table_name = 'uno3396.references';
    
	if($request['referencenumber'] != 'null') {
    
      $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_UPDATE, $where);

	}
	
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
	  
  }	  
  
  function addToBoard($request) {
	  
	$valuearray = array(	
		'statusen' => $request['statusEn'],
		'statusfi' => $request['statusFi'],
		'studentnumber' => $request['studentnumber'],
		'year' => $request['boardyear']);
			
			
    $table_name = 'uno3396.board';

    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
	  
  }	


  function addToOfficials($request) {
	  
	$valuearray = array(
	    'statusen' => $request['statusEn'],
		'statusfi' => $request['statusFi'],
		'studentnumber' => $request['studentnumber'],
		'year' => $request['officialsyear']);
			
			
    $table_name = 'uno3396.officials';

    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
	  
  }
  
  function getMinutes() {
	
    $stmt = "SELECT * FROM uno3396.minutes";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }
  
  function insert_minute() {
	  
		
   $minutestartdate = $request['minuteyear'] . '-' . $request['minutemonth'] . '-' . $request['minuteday'];

   $minutestarttime = $request['minutehour'] . ':' . $request['minuteminute'] . ':' . 00;
   
   $minutedatetime = $minutedate . " " . $minutetime;
  
   $valuearray = array('minutedatetime' => $minutedatetime, 
   			 	 'minuteboard' =>  $request['minuteboard']);
			 	 'minutename' =>  $request['minutename']);

    $table_name = 'uno3396.minutes';
    
    $res = $this->db->autoExecute($table_name, $valuearray,
			    DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }  
	  
  }  
  
  
  
  	
  function getSingleNews($request) {
	
    $stmt = "SELECT * FROM uno3396.news where newsid = ?";
	$data =  array($request['newsid']);
    return $this->db->getAll($stmt,$data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }  
  
  function insert_news($request) {

	$stmt = "SELECT now() as now";
	
    $time = $this->db->getAll($stmt); 
    
    $valuearray = array('newsinserteddatetime' => $time[0]['now'],
    		  'newsheadingen' => $request['newsHeadingEn'], 
			  'newsheadingfi' => $request['newsHeadingFi'], 
			  'newsdescen' => $request['newsDescEn'],
			  'newsdescfi' => $request['newsDescFi'],
			  'studentnumber_insert' => $request['studentnumber']);


    $table_name = 'uno3396.news';
    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }

  function editNews($request) {
	  
  $stmt = "SELECT now() as now";
	
  $time = $this->db->getAll($stmt); 

  $valuearray = array('newsediteddatetime' => $time[0]['now'],
    		  'newsheadingen' => $request['newsHeadingEn'], 
			  'newsheadingfi' => $request['newsHeadingFi'], 
			  'newsdescen' => $request['newsDescEn'],
			  'newsdescfi' => $request['newsDescFi'],
			  'studentnumber_edit' => $request['studentnumber']);

  $where = "newsid = '" . $request['newsid'] . "'";
	
    $table_name = 'uno3396.news';

    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_UPDATE, $where);

    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }

  function deleteNews($request) {
	
    $stmt = "DELETE FROM uno3396.news WHERE newsid = ?";
    $data =  $request['newsid'];
    $res = $this->db->query($stmt, $data);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }


  function getLinks() {
    $stmt = "SELECT l.linkid, l.url, l.linktexten, l.linktextfi, g.groupid, g.groupdescriptionen, g.groupdescriptionfi
   FROM uno3396.links l, uno3396.linkgroups g
  WHERE l.groupid = g.groupid
  ORDER BY g.groupid";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }                                  // Smartyn section-rakennetta varten

  function getLink($request) {

    $stmt = "SELECT * FROM uno3396.linklist WHERE linkid = ?";
    
    $data = array($request['linkid']);

    return $this->db->getAll($stmt, $data); // getAll palauttaa kaikki "sopivana" taulukkona 
  }          

  function getLinkGroups() {
    $stmt = "SELECT * FROM uno3396.linkgroups";
    return $this->db->getAll($stmt); // getAll palauttaa kaikki "sopivana" taulukkona 
  }       

  function insertLink($request) {
	  
   if ($request['groupdescription'] === '') {

   $valuearray = array('url' => $request['url'],
				'linktexten' => $request['linkDescEn'], 
			 	 'linktextfi' => $request['linkDescFi'],
			 	 'groupid' => $request['linkgroup']);

    $table_name = 'uno3396.links';
    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
    }
    else {


   	$valuearray = array('groupdescription' => $request['groupdescription']);

    	$table_name = 'uno3396.linkgroups';
    	$res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    	if (PEAR::isError($res)) {
      	   die($res->getMessage());
    	}


   	$valuearray = array('linkid' => $linkid,
				 'url' => $request['url'],
				 'linktexten' => $request['linkDescEn'], 
			 	 'linktextfi' => $request['linkDescFi'],
			 	 'groupid' => $groupid);

    	$table_name = 'uno3396.links';
    	$res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_INSERT);
    	if (PEAR::isError($res)) {
      		die($res->getMessage());
   	}
    


    }
  }

 function editLink($request) {

   $where = 'linkid = ' . request('linkid');
   if ($request['groupdescription'] === '') {

   $valuearray = array('url' => $request['url'],
				'linktexten' => $request['linkDescEn'], 
			 	 'linktextfi' => $request['linkDescFi'],
			 	 'groupid' => $request['linkgroup']);

    $table_name = 'uno3396.links';
    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_UPDATE, $where);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
    }
    else {

   	$valuearray = array('groupdescription' => $request['groupdescription']);

    	$table_name = 'uno3396.linkgroups';
    	$res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_UPDATE, $where);
    	if (PEAR::isError($res)) {
      	   die($res->getMessage());
    	}


   	$valuearray = array('url' => $request['url'],
				'linktexten' => $request['linkDescEn'], 
			 	 'linktextfi' => $request['linkDescFi'],
			 	 'groupid' => $groupid);

    	$table_name = 'uno3396.links';
    	$res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_UPDATE, $where);
    	if (PEAR::isError($res)) {
      		die($res->getMessage());
   		}
    
    }
  }

  function deleteLink($request) {

    $stmt = "DELETE FROM uno3396.links WHERE linkid = ?";
    $data =  $request['linkid'];
    $res = $this->db->query($stmt, $data);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }


  function login($studentnumber, $md5password) {
	//

    $stmt = "SELECT * FROM uno3396.members m, board b WHERE m.studentnumber = ? AND m.password = ? and m.studentnumber=b.studentnumber and b.year=(select max(year) from board)";
    
    $data = array($studentnumber, $md5password);
    
    $res = $this->db->query($stmt, $data);
        
    if (DB::isError($res)) {
      die($res->getMessage());
    }

    if ($row=$res->fetchRow()) {

      return true;
    }
    else{
	    
	      $stmt = "SELECT * FROM uno3396.members m, officials o WHERE m.studentnumber = ? AND m.password = ? and m.studentnumber=o.studentnumber and o.year=(select max(year) from board)";
    
	      $data = array($studentnumber, $md5password);
    
   		  $res = $this->db->query($stmt, $data); 
        
    	  if (DB::isError($res)) {
      		die($res->getMessage());
    	  }
    		
	      if ($row=$res->fetchRow()) {

      		return true;
    	  }
	      else {
		      
		    return false;  
	 	  }    


    }
  }
  
  
    function publiclogin($studentnumber, $md5password) {
	//

    $stmt = "SELECT * FROM uno3396.members m WHERE m.studentnumber = ? AND m.password = ?";
    
    $data = array($studentnumber, $md5password);
    
    $res = $this->db->query($stmt, $data);
        
	    if (DB::isError($res)) {
	      die($res->getMessage());
	    }
	
	    if ($row=$res->fetchRow()) {
	
	      return true;
	    }
	
		else {
			      
		  return false;  
		}    

    }
    

  function updateMember($valuearray, $where) {
    $table_name = 'uno3396.members';
    $res = $this->db->autoExecute($table_name, $valuearray, DB_AUTOQUERY_UPDATE, $where);
    if (PEAR::isError($res)) {
      die($res->getMessage());
    }
  }


  // $valuearray is to contain (fieldname, value) pairs.



  // $valuearray is to contain (fieldname, value) pairs.
  // notice that we explicitly get the next id from the sequence
  // although here we do not do enything with it - but if needed we could
  // for instance make it a return value of the function:


}
?>