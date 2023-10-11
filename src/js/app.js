document.addEventListener('DOMContentLoaded', function (){
    initApp();
}); 

function initApp () { 
    validateForm();
    
}
function validateForm() {
    

    lenghtChecker();
}

function validateRegisterForm(){
    const cedula = document.querySelector("#cedula");
    validateOpcionalElement(cedula, cedula.value, 10, 10, true)
}

function validateOpcionalElement(element, value, minlength = 3, maxLength = 12, onlyNumber=false) {
    const bool = false;
    element.addEventListener("input", event => {
        if (value.length >= minlength) {
            bool = true;
        }
        if(bool) {

        }
        if(value.length > maxLength) {
            value = value.substring(0, maxLength);
        }
        if(onlyNumber){
            value = value.replace(/[^0-9]/g, '');
        }
        event.target.value=value;
    })
}

function lenghtChecker() {
    const className='if-lenght'
    const class_list = [3, 8, 10]

    class_list.forEach(value => {
        const classElement = "."+className+"-"+value;

        source = document.querySelectorAll(classElement);
        source.forEach(element => {
            element.addEventListener("input", validateElement)
        })
    })
}

function validateElement(event) {
    const element = event.target; 

    element.classList.forEach(className => {
        const split = className.split("-");
        if (split[0]==="if" && split[1]==="lenght") {
            const minlength = parseInt(split[2]);
            
            let value = element.value;
            if (value.length > minlength) {
                setValidElement(element, true);
            } else {
                setValidElement(element, false);
            }
        }
    })
}

function setValidElement(element, value) {
    if (value) {
        element.classList.remove('is-invalid');
        element.classList.add('is-valid');
    } else {
        element.classList.add('is-invalid');
        element.classList.remove('is-valid');
    }
}

function removeValidElement(element) {
    element.classList.remove('is-invalid');
    element.classList.remove('is-valid');
}