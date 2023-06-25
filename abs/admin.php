<?php 

include_once "abs/constant.php";
include_once "abs/common.php";


class Admin{
	public $admin_email;
	public $admin_password;

	public $conn; //database connection handler 

	//functions 

	function __construct(){
		$this->conn = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);
	}


	//begin role 

	 function getRole(){
	 	//prepare statement 
	 	$stmt = $this->conn->prepare("SELECT * FROM role");

	 	//execute 
	 	$stmt->execute();;

	 	//get results 
	 	$result = $stmt->get_result();

	 	$records = array();

	 	if ($result->num_rows > 0) {
	 		//looping through 
	 		while ($row = $result->fetch_assoc()) {
	 			$records[] = $row;
	 		}
	 	}


	 	return $records;
	}


	//end get role

	//begin get pub

		 function getPub(){
	 	//prepare statement 
	 	$stmt = $this->conn->prepare("SELECT * FROM admin WHERE ROLE_ID=2");

	 	//execute 
	 	$stmt->execute();;

	 	//get results 
	 	$result = $stmt->get_result();

	 	$records = array();

	 	if ($result->num_rows > 0) {
	 		//looping through 
	 		while ($row = $result->fetch_assoc()) {
	 			$records[] = $row;
	 		}
	 	}


	 	return $records;
	}



	//end get pub 

	//begin get Category

	 function getCat(){
	 	//prepare statement 
	 	$stmt = $this->conn->prepare("SELECT * FROM categories");

	 	//execute 
	 	$stmt->execute();;

	 	//get results 
	 	$result = $stmt->get_result();

	 	$records = array();

	 	if ($result->num_rows > 0) {
	 		//looping through 
	 		while ($row = $result->fetch_assoc()) {
	 			$records[] = $row;
	 		}
	 	}


	 	return $records;
	}


//end get category
	// begin get CONTACT
	 function allContact(){
	 	//prepare statement 
	 	$stmt = $this->conn->prepare("SELECT * FROM contact limit 5");

	 	//execute 
	 	$stmt->execute();;

	 	//get results 
	 	$result = $stmt->get_result();

	 	$records = array();

	 	if ($result->num_rows > 0) {
	 		//looping through 
	 		while ($row = $result->fetch_assoc()) {
	 			$records[] = $row;
	 		}
	 	}


	 	return $records;
	}
	//end get CONTACT

//begin get Sub-Category
	
	function getSubcat($catid){
		//prepare statement

		$stmt = $this->conn->prepare("SELECT *FROM subcategory WHERE CAT_ID =? ");

		//bind parameter 
		$stmt->bind_param("i",$catid);

		//execute 
		$stmt->execute();

		//get result
		$result = $stmt->get_result();

		$record = array();
		if ($result->num_rows >0) {
			while($row = $result->fetch_assoc()){
				$record[] = $row;
			}
		}
		return $record;
	}
	//end get Sub-Category


	//begin add news 

	function addNews($title,$category,$subcat,$description,$publisher){

		//prepare statement 
		$stmt = $this->conn->prepare("INSERT INTO news(TITLE,CAT_ID,SUBCAT_ID,DESCRIPTION,ADMIN_ID,FEATURED_IMAGE)VALUES(?,?,?,?,?,?) ");

		//ALLOWED FILE EXTENTIONS

		$ext = array('jpg','png','jpeg','gif','jfif');
		//create common object 
		$obj = new Common;
		$picture = $obj->UploadAnyFile("newsphotos/",2097152,$ext);
	

		if (array_key_exists('success', $picture)) {


			$filename = $picture['success'];
			

			//bind parameter 
			$stmt->bind_param("siisis",$title,$category,$subcat,$description,$publisher,$filename);
			//execute

			$stmt->execute();

			if ($stmt->affected_rows == 1 ) {
				return true;

			}else{
				return $stmt->error;
			}
		}else{
			return $picture['error'];
		}
	}

	//end add news


	//begin add headlines 


	function addHeadlines($title,$category,$subcat,$description,$publisher){

		//prepare statement 
		$stmt = $this->conn->prepare("INSERT INTO headlines(TITLE,CAT_ID,SUBCAT_ID,DESCRIPTION,ADMIN_ID,FEATURED_IMAGE)VALUES(?,?,?,?,?,?) ");

		//ALLOWED FILE EXTENTIONS

		$ext = array('jpg','png','jpeg','gif','jfif');
		//create common object 
		$obj = new Common;
		$picture = $obj->UploadAnyFile("newsphotos/",2097152,$ext);
	

		if (array_key_exists('success', $picture)) {


			$filename = $picture['success'];
			

			//bind parameter 
			$stmt->bind_param("siisis",$title,$category,$subcat,$description,$publisher,$filename);
			//execute

			$stmt->execute();

			if ($stmt->affected_rows == 1 ) {
				return true;

			}else{
				return $stmt->error;
			}
		}else{
			return $picture['error'];
		}
	}
	//end headlines 



//begin admin Login 
	
	public function adminLogin($email,$password){
		//prepare statement 

		$stmt = $this->conn->prepare("SELECT * FROM admin WHERE EMAIL_ADDRESS =?");

		//bind parameter 
		$stmt->bind_param("s", $email);

		//execute 
		$stmt->execute();

		//get result 

		$result = $stmt->get_result();

		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();

			//check if password match
			if (password_verify($password, $row['PASSWORD'])) {
				// create session variables
				// session_start();
				$_SESSION['ADMIN_ID'] = $row['ADMIN_ID'];

				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	

//end admin login 


	//begin addadmin password verification

	public function adminVerification($email,$password){
		//prepare statement 

		$stmt = $this->conn->prepare("SELECT * FROM admin WHERE ROLE_ID=1 AND PASSWORD='?' ");

		//bind parameter 
		$stmt->bind_param("s", $email);

		//execute 
		$stmt->execute();

		//get result 

		$result = $stmt->get_result();

		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();

			//check if password match
			if (password_verify($password, $row['PASSWORD'])) {
				// create session variables
				// session_start();
				$_SESSION['ADMIN_ID'] = $row['ADMIN_ID'];

				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	

	//end addamin password verification

	//begin nigeria
	function nigeria(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =6  ORDER BY news.NEWS_ID DESC LIMIT 1;");

		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}

		function naijaSidenews(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =6  ORDER BY news.NEWS_ID DESC LIMIT 3 offset 1;");

		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}

	//end nigeria 
	//get state news

	function State(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =5  ORDER BY news.NEWS_ID DESC LIMIT 1;");

		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}

	//for state side news
			function Statesidenews(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =5  ORDER BY news.NEWS_ID DESC LIMIT 3 offset 1;");

		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}

	//end state side news 

	//end get state news

	//begin Sports News
	function Sports(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =4  ORDER BY news.NEWS_ID DESC LIMIT 1;");
		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}

	function Sportsidenews(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =4  ORDER BY news.NEWS_ID DESC LIMIT 3 offset 1");

		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}


	//end get Sports news


	//begin get business 

	function Buisness(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =1  ORDER BY news.NEWS_ID DESC LIMIT 1;");
		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}



		function Businessnews(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =1  ORDER BY news.NEWS_ID DESC LIMIT 3 offset 1");

		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}

	//end of get business


	//begin get entertainment

	function Entertainment(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =2  ORDER BY news.NEWS_ID DESC LIMIT 1;");
		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}

	//get entertainment side news
		function Entsidenews(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =2  ORDER BY news.NEWS_ID DESC LIMIT 3 offset 1");

		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}

	//end get entertainment side news

	// begin get International
	function International(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =3  ORDER BY news.NEWS_ID DESC LIMIT 1;");
		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}


		function Intsidenews(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =3  ORDER BY news.NEWS_ID DESC LIMIT 3 offset 1");

		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}
	//end get international

	//begin health

	function Health(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =7  ORDER BY news.NEWS_ID DESC LIMIT 1;");
		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}


		function Healthsidenews(){
		$stmt = $this->conn->prepare("SELECT * FROM news  JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID  JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =7  ORDER BY news.NEWS_ID DESC LIMIT 3 offset 1");

		//execute
		$stmt->execute();

		//get result 
		$result = $stmt->get_result();
		$records = array();

		if($result->num_rows > 0){
			//loop through
			while($row = $result->fetch_assoc()){
				$records[] = $row;
			}
		}
		return $records;
	}
	//end begin health

	//BEGIN GET CATEGORY

	function Category($cat_id){
		$stmt = $this->conn->prepare("SELECT * FROM news JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =?  ORDER BY NEWS_ID DESC limit 1");

			// bind the parameter
			$stmt->bind_param("i", $cat_id);
		//EXECUTE
		$stmt->execute();

		//get result
		$result = $stmt->get_result();
		$records = array();

		if ($result->num_rows > 0) {
			// loop through 
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}
		}
		return $records;
	}

	//end get Category
	//get side featured
	function Sidecategory($cat_id){
		$stmt = $this->conn->prepare("SELECT * FROM news JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =?  ORDER BY NEWS_ID DESC limit 4 offset 1");

			// bind the parameter
			$stmt->bind_param("i", $cat_id);
		//EXECUTE
		$stmt->execute();

		//get result
		$result = $stmt->get_result();
		$records = array();

		if ($result->num_rows > 0) {
			// loop through 
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}
		}
		return $records;
	}

	//end side featured

	//get more categories news 

	function Morecategory($cat_id){
		$stmt = $this->conn->prepare("SELECT * FROM news JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.CAT_ID =?  ORDER BY NEWS_ID DESC limit 4 offset 5");

			// bind the parameter
			$stmt->bind_param("i", $cat_id);
		//EXECUTE
		$stmt->execute();

		//get result
		$result = $stmt->get_result();
		$records = array();

		if ($result->num_rows > 0) {
			// loop through 
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}
		}
		return $records;
	}

	//end get more category news
	
	//END GET CATEGORY

	//BEGIN GET HEADLINES
function Headlines(){
		$stmt = $this->conn->prepare("SELECT * FROM news JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID JOIN categories on news.CAT_ID = categories.CAT_ID  ORDER BY NEWS_ID DESC limit 1");
		//EXECUTE
		$stmt->execute();

		//get result
		$result = $stmt->get_result();
		$records = array();

		if ($result->num_rows > 0) {
			// loop through 
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}
		}
		return $records;
	}

	//begin get side headlines 

	function Sideheadlines(){
		$stmt = $this->conn->prepare("SELECT * FROM news JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID JOIN categories on news.CAT_ID = categories.CAT_ID  ORDER BY NEWS_ID DESC limit 1 offset 1");
		//EXECUTE
		$stmt->execute();

		//get result
		$result = $stmt->get_result();
		$records = array();

		if ($result->num_rows > 0) {
			// loop through 
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}
		}
		return $records;
	}

	//end get side headlines 

	//get more headlines 

	function Moreheadlines(){
		$stmt = $this->conn->prepare("SELECT * FROM news JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID JOIN categories on news.CAT_ID = categories.CAT_ID  ORDER BY NEWS_ID DESC limit 2 offset 2");
		//EXECUTE
		$stmt->execute();

		//get result
		$result = $stmt->get_result();
		$records = array();

		if ($result->num_rows > 0) {
			// loop through 
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}
		}
		return $records;
	}


	//end  get more headlines 

	//END GET HEADLINES

	 //GET ALL NEWS 
		function allNews(){
		$stmt = $this->conn->prepare("SELECT * FROM news JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID JOIN categories on news.CAT_ID = categories.CAT_ID  ORDER BY NEWS_ID DESC ");
		//EXECUTE
		$stmt->execute();

		//get result
		$result = $stmt->get_result();
		$records = array();

		if ($result->num_rows > 0) {
			// loop through 
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}
		}
		return $records;
	}

	//get news by news id 

		function getNews($news_id){
			//prepare statement 

			$stmt = $this->conn->prepare("SELECT * FROM news JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID JOIN categories on news.CAT_ID = categories.CAT_ID WHERE news.NEWS_ID =? ");
			//bind sttatement
			$stmt->bind_param("i",$news_id);

			//execute
			$stmt->execute();

			//get result 
			$result = $stmt->get_result();
			return $result->fetch_assoc();
		}

	//end get new by news id

		// get news by category 
		function moreNews(){
		$stmt = $this->conn->prepare("SELECT * FROM news JOIN subcategory on news.SUBCAT_ID = subcategory.SUBCAT_ID JOIN admin on news.ADMIN_ID = admin.ADMIN_ID JOIN categories on news.CAT_ID = categories.CAT_ID  ORDER BY NEWS_ID DESC LIMIT 3 ");
		//EXECUTE
		$stmt->execute();

		//get result
		$result = $stmt->get_result();
		$records = array();

		if ($result->num_rows > 0) {
			// loop through 
			while ($row = $result->fetch_assoc()) {
				$records[] = $row;
			}
		}
		return $records;
	}

			
		//end get news by category 

	//update news 

		public function updateNews($title,$category,$subcat,$description,$news_id){

		//prepare statement 
		$stmt = $this->conn->prepare("UPDATE news SET TITLE=?,CAT_ID=?,SUBCAT_ID=?,DESCRIPTION=?,FEATURED_IMAGE=? WHERE NEWS_ID=?");

		//ALLOWED FILE EXTENTIONS

		$ext = array('jpg','png','jpeg','gif','jfif');
		//create common object 
		$obj = new Common;
		$picture = $obj->UploadAnyFile("newsphotos/",2097152,$ext);
	

		if (array_key_exists('success', $picture)) {


			$filename = $picture['success'];
			

			//bind parameter 
			$stmt->bind_param("siissi",$title,$category,$subcat,$description,$filename,$news_id);
			//execute

			$stmt->execute();
			return $stmt->affected_rows;

			
		}else{
			return $picture['error'];
		}
	}


	//end update news  

	 //END GET ALL NEWS 

	//begin delete news 

	function deleteNews($id){
		$stmt= $this->conn->prepare("DELETE FROM news WHERE NEWS_ID=?");
		$stmt->bind_param("i",$id);
		//execute

			$stmt->execute();

			//check if record was deleted

			if ($stmt->affected_rows ==1) {
				//redirect to list clubs
				$msg = "News  was successfully deleted!";
				header("location:admindashboard.php?m=$msg");
				exit;
			}else{
				$msg = "Oops! could not delete News record.";
				header("location:admindashboard.php?info=$msg");
				exit;
			}

	}
	
	//begin add contact

	function addContact($name,$email,$description){
		$stmt = $this->conn->prepare("INSERT INTO contact(NAME,EMAIL,MESSAGE) VALUES(?,?,?) ");

			$stmt->bind_param("sss",$name,$email,$description);

		//execute prepared statement

		$stmt->execute();
		//check if record was inserted/ successful

		if ($stmt->error) {
			return "oops something happened!".$stmt->error;
		}else{
			return "Contact was successfully inserted";
		}
	}
	//end add contact

	//begin add subscribers 
	function addSubscriber($email){
		$stmt = $this->conn->prepare("INSERT INTO subscribers (EMAIL_ADDRESS) VALUES(?) ");

			$stmt->bind_param("s",$email);

		//execute prepared statement

		$stmt->execute();
		//check if record was inserted/ successful

		if ($stmt->affected_rows == 1){
						return true;
					}else{
						return $stmt->error;
					}

	}

	//end add subscribers  

	//end delete news 
}
	



?>