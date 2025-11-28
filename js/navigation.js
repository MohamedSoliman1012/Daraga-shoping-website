
window.onload = function() {
    
    
  
    
    
    // Login Button
    var loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // look for radio inside the form with value "admin"
            var adminRadio = loginForm.querySelector('input[type="radio"][value="admin"]');
            if (adminRadio && adminRadio.checked) {
                window.location.href = '../admin-panel/adminHome.html';
            } else {
                // go to home by default
                window.location.href = '../user-panel/home.html';
            }
        });
    }
    
    // Signup Button
    var signupForm = document.querySelector('form[name="signupForm"]');
    if (signupForm) {
        signupForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var pass1 = signupForm.querySelector('input[name="password"]');
            var pass2 = signupForm.querySelector('input[name="confirmPassword"]');
            if (!pass1 || !pass2) {
                alert('Please enter password and confirmation.');
                return;
            }
            if (pass1.value !== pass2.value) {
                alert('Passwords do not match!');
                pass1.focus();
                return;
            }
            // simple success action
            window.location.href = 'home.html';
        });
    }
    

   
   
    
};

function login(){
    usercheck = document.getElementById("user").value;
    admimcheck = document.getElementById("admin").value;
    if(usercheck==user){
        window.location.href = '../index.html';
    }else{
        window.location.href = '../adminHome.html';
    }
}

function logout(){
            checklogout = confirm('Are you sure you want to log out?');
             if (checklogout) {
                window.location.href = '../index.html';
            }

}

function continueBtn(){
    window.location.href = '../user-panel/home.html';

}
function checkout(){
    window.location.href = '../user-panel/checkout.html';

}
