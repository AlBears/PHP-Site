<?php 
namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;

class RegisterController extends BaseController
{

    public function getShowRegisterPage()
    {
        //echo $this->twig->render('register.html');
        echo $this->blade->render("register");
    }

    public function postShowRegisterPage()
    {
        $validation_data = [
            "first_name" => "min:3",
            "last_name" => "min:3",
            "email" => "email|equalTo:verify_email",
            "verify_email" => "email",
            "password" => "min:3|equalTo:verify_password"
            
        ];
        //validate data
        $validator = new Validator;
        //call method
        $errors = $validator->isValid($validation_data);
        // print_r($errors);
        // exit();
        if (sizeof($errors) > 0)
        {
        	$_SESSION['msg'] = $errors;
            echo $this->blade->render('register');
            unset($_SESSION['msg']);
        	exit();
        }

        //go back to register if validation fails
        // show errors
        //save data to database
        $user = new User;
        $user->first_name = $_REQUEST['first_name'];
        $user->last_name = $_REQUEST['last_name'];
        $user->email = $_REQUEST['email'];
        $user->password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $user->save();

        echo "Posted";
    }

    public function getShowLoginPage()
    {
        //echo $this->twig->render('login.html');
        echo $this->blade->render("login");
    }

}
