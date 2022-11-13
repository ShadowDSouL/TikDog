// This is the JavaScript for login page

// Form validation + shaking, checking inputs - Line 3 - Line 52
const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');

form.addEventListener('submit', (e) => {
    // If checkInputs is not getting 2, then stop reloading the page 
    // and ask again for the inputs
    if(checkInputs()!=2){
        e.preventDefault();
    }
    
    checkCookie();
});

function checkInputs() {
    // get the values from the inputs
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    var count = 0;

    if(usernameValue === '') {
        //show error
        //add error class
        setErrorFor(username, 'Username cannot be blank!');
    } else {
        // add success class
        setSuccessFor(username);
        count += 1;
    }

    if(passwordValue === '') {
        //show error
        //add error class
        setErrorFor(password, 'Password cannot be blank!');
    } else {
        // add success class
        setSuccessFor(password);
        count += 1;
    }
    return count;
}

function setErrorFor(input, message) {
    const formControl = input.parentElement.parentElement; //.form-control
    const small = formControl.querySelector('small');

    // change error message inside small
    small.innerText = message;

    // change and add error shake class
    formControl.className = 'form-control1 error shake';

    // remove shake class after 500ms
    setTimeout(()=>{
        formControl.className = 'form-control1 error';
    }, 500);
}

function setSuccessFor(input) {
    const formControl = input.parentElement.parentElement;
    formControl.className = 'form-control1 success';
}
// Form Validation end here

// Create Cookies
function createCookies(cookieName, cookieValue, daysToExpire) {
    var date = new Date();
    date.setTime(date.getTime()+ (daysToExpire*24*60*60*1000));
    document.cookie = cookieName + "=" + cookieValue + "; expires=" + date.toGMTString();
}

// Access Cookies
function accessCookies(cookieName) {
    var name = cookieName + "=";
    var allCookieArray = document.cookie.split (';');
    for (var i=0; i<allCookieArray.length; i++) 
    {
        var temp = allCookieArray[i].trim();
        if (temp.indexOf(name)==0) 
        {
            return temp.substring(name.length, temp.length);
        }
    }
            return"";
}

// Check Cookies
function checkCookie(){
    var user = accessCookie("testCookie");
    if (user!="") {
        alert("Welcome Back " + user + "!!!");
    } else {
        user = prompt("Please enter your name");
        num = prompt("How many days you want to store your name on your computer?");
        
        if (user!="" && user!=null)
        {
            createCookies("testCookie",user,num);
        }
    }
}