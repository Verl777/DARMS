//Validating

function validateform() {

    //Email
    var email = document.getElementById("email");
    if (email.value.length == 0 || email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1) {
        alert("Please enter a valid email address");
        document.getElementById("email").focus();
        return false;
    }
}
//var email = document.getElementById("email");
//var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//if (email.value == "" || !format.test(email.value)) {
//window.alert("Email is not valid! Please enter a valid email");
//email.focus();
//return false;
//}

//Password
//var password = document.getElementById("password_1")
//var Chars = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
//if (password.value == "" || !Chars.test(password.value)) {
//window.alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
//password.focus();
//return false;
//}
//Confirmation ofpassword_1
//var confirmpassword = document.getElementById("password_2")
//if (confirmpassword.value !== password_1.value) {
//window.alert("Password details do not match.");
//password.focus();
//return false;
//}
//Fullnames
//var fullname = document.getElementById("fullname")
//var letters = /^[A-Za-z]+$/;
//if (fullname.value == "" || !letters.test(fullname.value)) {
//window.alert("Please enter your full names, no special characters required");
//firstname.focus();
//return false;
//}
//Username validation
//var username = document.getElementById("username")
//if (username.value == "" || !letters.test(username.value)) {
//window.alert("Please enter your username");
// username.focus();
//return false;
//}
//phonenumber
//var phonenumber = document.getElementById("phonenumber")
//if (phonenumber.value == "") {
//window.alert("please enter your mobile number");
// phonenumber.focus();
//return false;
}

}