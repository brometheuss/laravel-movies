
function check_client(){

    let nameR = document.querySelector("#name_register");

    //checks name can have multiple values(two names, two last names etc)
    //first letter must be a capital letter, and has to be at least 1 letter long
    let regName = /^[A-Z][a-z]{1,15}(\s[A-z]{2,16})*$/;

    if(regName.test(nameR.value)){
        document.getElementById("name_register").classList.remove("is-invalid");
        document.getElementById("name_register").classList.add("is-valid");
    } else if(nameR.value == ""){
         document.getElementById("name_provera").innerHTML = "";
        document.getElementById("name_register").classList.remove("is-valid","is-invalid");
    } else {
        document.getElementById("name_register").classList.remove("is-valid");
        document.getElementById("name_register").classList.add("is-invalid");
    }
}

function check_email() {

    let emailR = document.querySelector("#email_register");

    //checks email, only lowercase letters, numbers "-", "_", "." are allowed
    //there can be as many domains as possible (ict.edu.gov.fav.rs.com etc)
    let regEmail = /^[a-z0-9.\-_]{3,20}@[a-z]{2,7}\.[a-z]{1,4}(\.[a-z]{1,3})*$/;

    if(regEmail.test(emailR.value)){
        document.getElementById("email_register").classList.remove("is-invalid");
        document.getElementById("email_register").classList.add("is-valid");
    } else if(emailR.value == ""){
        document.getElementById("email_register").classList.remove("is-valid","is-invalid");
    } else {
        document.getElementById("email_register").classList.remove("is-valid");
        document.getElementById("email_register").classList.add("is-invalid");
    }
}

function check_pass() {

    let passR = document.querySelector("#password_register");
    let passR2 = document.querySelector("#password2_register");

    //checks password, must contain at least 8 letter, including 1 capital letter and 2 numbers
    let regPass = /^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/;

    if(regPass.test(passR.value)){
        document.getElementById("password_register").classList.remove("is-invalid");
        document.getElementById("password_register").classList.add("is-valid");
    } else if(passR.value == ""){
        document.getElementById("password_register").classList.remove("is-valid","is-invalid");
    } else {
        document.getElementById("password_register").classList.remove("is-valid");
        document.getElementById("password_register").classList.add("is-invalid");
    }

    if(passR2.value != ""){
        if(passR.value == passR2.value){
            document.getElementById("password_register").classList.remove("is-invalid");
            document.getElementById("password_register").classList.add("is-valid");
            document.getElementById("password2_register").classList.remove("is-invalid");
            document.getElementById("password2_register").classList.add("is-valid");
        } else {
            document.getElementById("password2_register").classList.remove("is-valid");
            document.getElementById("password2_register").classList.add("is-invalid");
        }
    }
}