const signinLink = document.querySelector(".form.Login .link a");
const loginLink = document.querySelector(".form.Signin .link a")
const Loginform = document.querySelector(".form.Login");
const Signinform = document.querySelector(".form.Signin");


signinLink.onclick = (()=>{
    Loginform.style.display= "none";
    Signinform.style.display= "block";
});

loginLink.onclick = (()=>{
    Loginform.style.display= "block";
    Signinform.style.display= "none";
});



