<?php
require_once 'autoload.php';

//returns checked if true else ''
function radiobutton($option){
    if($option === $_SESSION['OLD_POST_SIGNUP']['gender'] ){

        return ('checked');
    }
    else{
        return '';
    }
}
function radiobutton2($option){
    if($option === $_SESSION['user']['kla_geslacht'] ){

        return ('checked');
    }
    else{
        return '';
    }
}
//check if there is an email error
function emailError(){
    if(isset($_SESSION['OLD_ERROR']['usr_email_error'])) {
        return 'error';
    }
    else{
        return '';
    }
}
//check if there is a username error
function usernameError(){
    if(isset($_SESSION['OLD_ERROR']['usr_username_error'])) {
        return 'error';
    }
    else{
        return '';
    }
}
//check if there is a password error
function passwordError(){
    if(isset($_SESSION['OLD_ERROR']['usr_password_length_error']) OR isset($_SESSION['OLD_ERROR']['usr_password_confirm_error'])) {
        return 'error';
    }
    else{
        return '';
    }
}
