const logform = document.querySelector(".Login form");
logBtn = logform.querySelector(".button input");
logerrorText = logform.querySelector(".error-text");

logform.onsubmit = (e)=>{
    e.preventDefault();
}
;
logBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'php/login.php', true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == 'Success'){
                    location.href =  "userlist.php";
                }
                else{
                    logerrorText.style.display="block";
                    logerrorText.textContent= data;
                }
            }
        }
    } 
    let formData = new FormData(logform);
    xhr.send(formData);
}
