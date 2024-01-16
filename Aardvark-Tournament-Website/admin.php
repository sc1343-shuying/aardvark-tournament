<?php
    spl_autoload_register (function($class) {
        require_once "./classes/$class.class.php";
    });
    echo MyUtils::html_header($title="Aardvark Games",$styles="assets/css/admin.css");
        
    echo MyUtils::navigation($navItem=array("Teams","Events","Scores", "About"));

    echo '
    <main>
      <h1 class="title">Users List<button>create</button></h1>

      <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">UserName</div>
        <div class="col col-2">Role</div>
        <div class="col col-3">Date of Birth</div>
        <div class="col col-4">Team</div>
        <div class="col col-5">Action</div>
      </li>
      <li class="table-row">
        <div class="col col-1" data-label="username">abc@email.com</div>
        <div class="col col-2" data-label="Role">College admin</div>
        <div class="col col-3" data-label="DOB">10/20/2000</div>
        <div class="col col-4" data-label="team">Boston</div>
        <div class="col col-5" data-label="Action"><button>Edit</button></div>
      </li>

      <li class="table-row">
          <div class="col col-1" data-label="username">abc@email.com</div>
          <div class="col col-2" data-label="Role">College admin</div>
          <div class="col col-3" data-label="DOB">10/20/2000</div>
          <div class="col col-4" data-label="team">Boston</div>
          <div class="col col-5" data-label="Action"><button>Edit</button></div>
        </li>
      <li class="table-row">
        <div class="col col-1" data-label="username">abc@email.com</div>
        <div class="col col-2" data-label="Role">College admin</div>
        <div class="col col-3" data-label="DOB">10/20/2000</div>
        <div class="col col-4" data-label="team">Boston</div>
        <div class="col col-5" data-label="Action"><button>Edit</button></div>
      </li>

      <li class="table-row">
          <div class="col col-1" data-label="username">abc@email.com</div>
          <div class="col col-2" data-label="Role">College admin</div>
          <div class="col col-3" data-label="DOB">10/20/2000</div>
          <div class="col col-4" data-label="team">Boston</div>
          <div class="col col-5" data-label="Action"><button>Edit</button></div>
        </li>
    </ul>
    </main>   
    ';

    echo MyUtils::html_footer();
?>

