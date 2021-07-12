<?php 
require_once "../../system/config.php";
require_once "../../system/database.php";
require_once "../models/login.php";
require_once "../../lib/myfunctions.php";
class Login
{
    function __construct()
    {
       
        $this->model = new Model_login();
        $this->lib = new lib();
        $act = "login";
        if(isset($_GET["act"])==true) $act = $_GET['act'];
        switch ($act) {
            case 'login':
                $this->checkUser();
               
                break;
            case 'logout':
                $this->logOut();
                break; 
            default:
                break;
        }
     
    }
    function checkUser()
    {   
        if(isset($_POST['login'])&&($_POST['login']))
        {
            
                $taikhoan= $_POST['taikhoan'];
                $pass = $_POST['password'];
                $exist = $this->model->checkTaiKhoanTonTai($taikhoan);
                if($exist != null){
                   $checklogin = $this->model->checkUser($taikhoan,$pass);
                   if($checklogin == true){
                      
                      if($_SESSION['srole'] == 0){
                          $role = 'You are not admin';
                      }else{
                        header('location: ../?ctrl=product');
                      }
                   }else{
                      $checkloginwarn = 'Your password is not valid';
                   }
                }else{
                   $emailexist= 'Your username does not exist!';
                }
             
    
        }
        require_once "../views/login.php";
    }
    function logOut()
    {
        if(isset($_GET['logout'])&&($_GET['logout'])){
            unset($_SESSION['sid']);
            unset($_SESSION['suser']);
            unset($_SESSION['role']);
            header('location: login.php?act=login');
        }
    }
}
new Login;