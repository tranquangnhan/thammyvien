<?php 
   require_once "../system/config.php";	

   require_once "../system/database.php";
   require_once "../lib/myfunctions.php";

   require_once "models/home.php"; 
   require_once "models/user.php";
   class Home{
       function __construct()   {
           $this->model = new model_home();
           $this->modelUser = new Model_user();
           $this->lib = new lib();

           $act = "home";
           if(isset($_GET["act"])==true) $act=$_GET["act"];
			switch ($act) {    
				
					case "home": $this->home(); break;
				
			}
           
        }
        function home()
        {

           $page_title ="Trang Chủ - Lê Quân Sneaker";
           $viewFile = "views/home.php";
           require_once "views/layout.php";  
        }
   
       
	
}
   ?>