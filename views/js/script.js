function validate(pForm){
    document.getElementById('success').innerHTML = '';
    document.getElementById('nameError').innerHTML = '';
    document.getElementById('emailError').innerHTML = '';

    const name=pForm.name.value;
    const username=pForm.uname.value;
    const email=pForm.email.value;
    const password=pForm.pwd.value;
    const nameRegex=/^[a-zA-Z ]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let errorFlag=false;

    if(name===""){
        document.getElementById('nameError').innerHTML='Name is empty';
        document.getElementById('nameError').style.color='red';
        errorFlag=true;
    }

    if(!nameRegex.test(name)){
        document.getElementById('nameError').innerHTML='Name only contain A-Z or a-z';
        document.getElementById('nameError').style.color='red';
        errorFlag=true;
    }
    
    if(username===""){
        document.getElementById('userNameError').innerHTML='Please fill up the username';
        document.getElementById('userNameError').style.color='red';
        errorFlag=true;
    }

    if(email===""){
        document.getElementById('emailError').innerHTML='Please fill up the email';
        document.getElementById('emailError').style.color='red';
        errorFlag=true;
    }
    
    if(!emailRegex.test(email)){
        document.getElementById('emailError').innerHTML='Email must be in correct format';
        document.getElementById('emailError').style.color='red';
        errorFlag=true;
    }

    if(password==""){
        document.getElementById('passErrMsg').innerHTML='Password is empty';
        document.getElementById('passErrMsg').style.color='red';
        errorFlag=true;
    }
    if (password.length < 8) {
        document.getElementById('passErrMsg').innerHTML = 'Password must be at least 8 characters long';
        document.getElementById('passErrMsg').style.color = 'red';
        errorFlag = true;
    }
    

    return !errorFlag;

} 

