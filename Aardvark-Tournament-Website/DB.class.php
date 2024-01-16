<?php
class DB{
	
	function dbconnect(){
        return new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}",
        $_SERVER['DB_USER'],$_SERVER['DB_PASSWORD']);
		
		if($this->sql->connect_errno){
			echo "connect failed: ".mysqli_connect_error();
			die();
		}
	}

    //register function
    public function addUser($username, $password, $email, $role, $code){
        try{
            $conn = $this->dbconnect();
            $query = "INSERT INTO user SET username = :u, password = :p, email = :e, role = :r, code = :c;";
            $password = hash("sha256", $password);
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":u",$username,PDO::PARAM_STR);
            $stmt->bindParam(":p",$password ,PDO::PARAM_STR);
            $stmt->bindParam(":e",$email ,PDO::PARAM_STR);
            $stmt->bindParam(":r",$role ,PDO::PARAM_STR);
            $stmt->bindParam(":c",$code ,PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException	$pe){
            echo $pe->getMessage();
        }
    }

    //get user
    public function getUser(){
        try{
            $data = [];
            include ("User.class.php");
            $conn = $this->dbconnect();
            $query = "SELECT userId, username, password, email FROM user;";
            $stmt = $conn->prepare($query);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS,"User");

           while($user=$stmt->fetch()){
                   $data[] = $user;
           }
           
           return $data;
        }//end try
        catch(PDOException	$pe){
            echo $pe->getMessage();
            return [];
        }


    }//end view

    //edit user
    public function editUser($username, $email, $pass, $id){
        try{
            $conn = $this->dbconnect();
            $query = "UPDATE user SET username = :n, email = :e, password = :pass where userId = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":n",$username ,PDO::PARAM_STR);
            $stmt->bindParam(":e",$email ,PDO::PARAM_STR);
            $pass = hash("sha256", $pass);
            $stmt->bindParam(":pass",$pass ,PDO::PARAM_STR);
            $stmt->bindParam(":id",$id ,PDO::PARAM_INT);
            $stmt->execute();
        }
        catch(PDOException	$pe){
            echo $pe->getMessage();
        }
    
    }//end edit

    //delete user
    public function deleteUser($id){
        try{
            $conn = $this->dbconnect();
            $query = "delete from user where userId = :id;";
            $stmt = $conn->prepare($query);
            $stmt->execute(["id"=>$id]);
            

            if($stmt->fetch() != null){
                return "<script>alert('success')</script>";
            }
            
            
        }//end try
        catch(PDOException	$pe){
            echo $pe->getMessage();
            return [];
        }
    
    
    }//end delete

    //add event
    public function addEvent($name, $sDate, $eDate, $team, $venue){
        try{
            $conn = $this->dbconnect();
            $query = "INSERT INTO event SET eventName = :n, eventStartTime = :sDate, eventEndTime = :eDate, eventLocation = :v, teamId = :team;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":n",$name ,PDO::PARAM_STR);
            $stmt->bindParam(":sDate",$sDate ,PDO::PARAM_STR);
            $stmt->bindParam(":eDate",$eDate ,PDO::PARAM_STR);
            $stmt->bindParam(":team",$team ,PDO::PARAM_INT);
            $stmt->bindParam(":v",$venue ,PDO::PARAM_INT);
            $stmt->execute();

        }
        catch(PDOException	$pe){
            echo $pe->getMessage();
        }
    }

    //edit event
    public function editEvent($name, $sDate, $eDate, $team, $venue, $id){
        try{
            $conn = $this->dbconnect();
            $query = "UPDATE event SET eventName = :n, eventStartTime = :sDate, eventEndTime = :eDate, eventLocation = :v, teamId = :team where eventId = :id;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":n",$name ,PDO::PARAM_STR);
            $stmt->bindParam(":sDate",$sDate ,PDO::PARAM_STR);
            $stmt->bindParam(":eDate",$eDate ,PDO::PARAM_STR);
            $stmt->bindParam(":team",$team ,PDO::PARAM_INT);
            $stmt->bindParam(":v",$venue ,PDO::PARAM_INT);
            $stmt->bindParam(":id",$id ,PDO::PARAM_INT);
            $stmt->execute();
        }
        catch(PDOException	$pe){
            echo $pe->getMessage();
        }
    
    }//end edit event

    //delete event
    public function deleteEvent($id){
        try{
            $conn = $this->dbconnect();
            $query = "delete from event where eventId = :id;";
            $stmt = $conn->prepare($query);
            $stmt->execute(["id"=>$id]);
            

            if($stmt->fetch() != null){
                return "<script>alert('success')</script>";
            }
            
            
        }//end try
        catch(PDOException	$pe){
            echo $pe->getMessage();
            return [];
        }
    
    
    }//end delete

    //View event
    public function viewEvent($id){
        try{
            include ("Event.class.php");
            $conn = $this->dbconnect();
            $query = "SELECT eventId FROM manageEvent WHERE adminId = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id",$id ,PDO::PARAM_INT);
            $stmt->execute();
            $data1 = [];

            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $query1 = "select * from event where eventId = " .$row['eventId'] .";";
                $result = $conn->prepare($query1);
                $result->execute();
                $result->setFetchMode(PDO::FETCH_CLASS,"Event");
                while($event=$result->fetch()){
                        $data1[] = $event;
                }
                
            }
            return $data1;
        }//end try
        catch(PDOException	$pe){
            echo $pe->getMessage();
            return [];
        }


    }//end view
    
}//end class

?>