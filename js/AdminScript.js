function logout(){
            checklogout = confirm('Are you sure you want to log out?');
             if (checklogout) {
                window.location.href = '../user-validation/index.html';
            }

}