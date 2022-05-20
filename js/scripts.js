//Validating

function validateControls() {

    //Email
    var email = document.getElementById("email");
    var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value == "" || !format.test(email.value)) {
        window.alert("Email is not valid! Please enter a valid email");
        email.focus();
        return false;
    }

    //Password
    var password = document.getElementById("password_1")
    var Chars = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if (password.value == "" || !Chars.test(password.value)) {
        window.alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
        password.focus();
        return false;
    }
    //Confirmation ofpassword_1
    var confirmpassword = document.getElementById("password_2")
    if (confirmpassword.value !== password.value) {
        window.alert("Password details do not match.");
        password.focus();
        return false;
    }
    //Fullnames
    var firstname = document.getElementById("fullname")
    var letters = /^[A-Za-z]+$/;
    if (firstname.value == "" || !letters.test(firstname.value)) {
        window.alert("Please enter your full names, no special characters required");
        firstname.focus();
        return false;
    }
    //Username validation
    var middlename = document.getElementById("username")
    if (middlename.value == "" || !letters.test(middlename.value)) {
        window.alert("Please enter your username");
        middlename.focus();
        return false;
    }
    //phonenumber
    var phonenumber = document.getElementById("phonenumber")
    if (phonenumber.value == "") {
        window.alert("please enter your mobile number");
        phonenumber.focus();
        return false;
    }

}