<?php

class User{
		public $userId;
		public $username;
        public $password;
        public $email;
		
		public function whoAmI(){
            $edit = "edit";
            $delete = "Delete";


			return "<tr>
				<td>{$this->userId}</td>
				<td>{$this->username}</td>
				<td>{$this->password}</td>
                <td>{$this->email}</td>
                <td><a class = '$style' href='editUser.php?id={$this->userId}'>{$edit}</a>
                <a class = '$style' href='deleteUser.php?id={$this->userId}'>{$delete}</a></td>
					</tr>\n";
		}

        // public function addAttendee(){
        //     $edit = "edit";
        //     $delete = "Delete";
        //     $add = "Add";

        //     if($this->role == "1"){
        //         $r = "Admin";
        //     }
        //     else if($this->role == "2"){
        //         $r = "Manager";
        //     }
        //     else {
        //         $r = "Attendee";
        //     }   
		// 	return "<tr>
		// 		<td>{$this->idattendee}</td>
		// 		<td>{$this->name}</td>
		// 		<td>{$r}</td>
        //         <td>
        //         <a href='deteteRE.php?id={$this->idattendee}'>{$delete}</a></td>
		// 			</tr>\n";
		// }

        // public function addAttendee1(){
        //     $edit = "edit";
        //     $delete = "Delete";
        //     $add = "Add";

        //     if($this->role == "1"){
        //         $r = "Admin";
        //     }
        //     else if($this->role == "2"){
        //         $r = "Manager";
        //     }
        //     else {
        //         $r = "Attendee";
        //     }   
		// 	return "<tr>
		// 		<td>{$this->idattendee}</td>
		// 		<td>{$this->name}</td>
		// 		<td>{$r}</td>
        //         <td>
        //         <a href='adminDeleteRE.php?id={$this->idattendee}'>{$delete}</a></td>
		// 			</tr>\n";
		// }
	
	
}