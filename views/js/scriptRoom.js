function validate(pForm){
    document.getElementById('success').innerHTML = '';
    document.getElementById('priceError').innerHTML = '';
    document.getElementById('nameError').innerHTML = '';
    document.getElementById('quantityError').innerHTML = '';

    const roomName = pForm.roomName.value;
    const roomQuantity = pForm.roomQuantity.value;
    const price=pForm.roomPrice.value;

    let errorFlag=false;


    if (roomName === "") {
        document.getElementById('nameError').innerHTML = 'Please click Edit first';
        document.getElementById('nameError').style.color = 'red';
        errorFlag = true;
    }

    if (roomQuantity === "") {
        document.getElementById('quantityError').innerHTML = 'Please click Edit first';
        document.getElementById('quantityError').style.color = 'red';
        errorFlag = true;
    }

    if(price===""){
        document.getElementById('priceError').innerHTML='Price is empty';
        document.getElementById('priceError').style.color='red';
        errorFlag=true;
    }
    else if (isNaN(price)|| price < 1 || price > 10000) {
        document.getElementById('priceError').innerHTML='Invalid price type';
        document.getElementById('priceError').style.color='red';
        errorFlag=true;
    }
    return !errorFlag;

}