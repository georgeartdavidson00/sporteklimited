
// validation for strong and weak password 
var passregex = /^(?=.*[A-Z]+)(?=.*[a-z]+)(?=.*[\d]+)(?=.*[&@$!]+)(.){8,}$/;
const checkPassword = (password1,password2) => {
const testNameReg = passregex.test(password1.value);

	if(!testNameReg){
		alert("weak password")
		return false;

	}d

	 if (password2.value!==password1.value){
        alert("Passwords did not match")
		return false;
	}
    return true;

		
}
// function to show password 
function myFunction() {
	var x = document.getElementById("password1");
	var y = document.getElementById("password2");
	
	if (x.type === "password"&& y.type=="password") {
	  x.type = "text";
	  y.type = "text";
	} else {
	  x.type = "password";
	  y.type = "password";
	}
  }