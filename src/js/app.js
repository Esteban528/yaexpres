document.addEventListener('DOMContentLoaded', function (){
    initApp();
}); 

function initApp () { 
    validateForm();
    
}

function validateForm() {
    const class_list = ['.if-lenght-3', '.if-lenght-10']
    const names = document.querySelectorAll('.if-lenght-3');
    const tenChar = document.querySelectorAll('.if-lenght-10')
    
    names.forEach(element => {
        element.addEventListener("input", validateElement);
    });
}

function validateElement(event) {
    const element = event.target; 
    console.log(element.value.length)

    let value = element.value;
    if (value.length > 2) {
        element.classList.remove('is-invalid');
        element.classList.add('is-valid');
    } else {
        element.classList.add('is-invalid');
        element.classList.remove('is-valid');
    }
}

