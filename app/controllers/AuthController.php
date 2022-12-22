<?php
require_once __DIR__ . '/../models/UserModel.php';

class AuthController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    /**
     * show login when uri is /login and show register when uri /register
     * 
     */
    public function index()
    {
        $uri = $_SERVER["REQUEST_URI"];
        if ($uri == '/' . Helper::getAppname() . '/login') {
            $this->view('dashboard/login');
        } else if ($uri == '/' . Helper::getAppname() . '/register') {
            $this->view('dashboard/register');
        }
    }

    /**
     * handle login process
     */
    public function processLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->getByEmail($email);
        
        if(!$user){
            ;
            Helper::redirect('/login');
        }

        if(password_verify($password, $user->password)){
            // set session 
            $_SESSION['user'] = $user;
            
            if($user->id_role == 2){
                Helper::redirect('/home');
            } else{

            }
        }
    }

    public function processRegister()
    {
        if($_POST['password'] != $_POST['konfirmasi_password'])
        {
            var_dump('aaa');
            Flasher::setFlash('gagal', 'password tidak sesuai!', 'danger');
            Helper::redirect('/register');
        } else{
            $data = [
                $_POST['nama'], $_POST['email'], $_POST['no_telp'], password_hash($_POST['password'], PASSWORD_DEFAULT), 2
            ];
    
            $this->model->store($data);
    
            $this->processLogin();
        }

    }

    /**
     * handle logout logged user
     */
    public function logout()
    {
        unset($_SESSION['user']);

        Helper::redirect('/home');
    }
}