document.addEventListener('DOMContentLoaded', function (){
    initApp();
}); 

function initApp () { 
    validateForm();
    
}
function validateForm() {
    
    showPasswordButton();
    validateRegisterForm();
    lenghtChecker();
    onlyNumber();
    emailChecker();
}

function validateRegisterForm(){
    const name = document.getElementById("form-register-nombre");
    const apellido = document.getElementById("form-register-apellido");
    const telefono = document.getElementById("form-register-telefono");
    const email = document.getElementById("form-register-email");


    const cedula = document.getElementById("cedula");
    
    var formulario = document.getElementById("form-register");
        
    formulario.addEventListener("submit", (event) => {

        event.preventDefault();

        

        form.classList.add("was-validated");
    }, false);

  
    validateOpcionalElement(cedula, cedula.value, 10, 10, true);
}

function showPasswordButton() {
    const button = document.getElementById("form-button-showPassword");

    button.addEventListener("click", event => {
        const inputPassword = document.getElementById("inputPassword");

        if (inputPassword.type == "password") {
          inputPassword.type = "text";
        } else inputPassword.type = "password";
    })
}

function validateOpcionalElement(element, value, minlength = 3, maxLength = 12, onlyNumber=false) {
    let bool = false;
    element.addEventListener("input", event => {
        let value = event.target.value
        value = value.slice(0, maxLength);
        event.target.value = value;

        if (value != ''){
            if (value.length >= minlength) {
                bool = true;
            }else{
                bool = false;
            }
            if(bool) {
                setValidElement(element, true);
            }else {
                setValidElement(element, false);
            }
            event.target.value=value;
        }
        else removeValidElement(event.target);

    })
}

function onlyNumber() {
  const classElement = ".onlyNumber";

  source = document.querySelectorAll(classElement);
  source.forEach((element) => {
    element.addEventListener("input", (event) => {
      let value = event.target.value.replace(/[^0-9]/g, "");
      event.target.value = value;
    });
  });
}

function emailChecker() {
  const classElement = ".if-email";
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

  source = document.querySelectorAll(classElement);
  source.forEach((element) => {
    element.addEventListener("input", (event) => {
        const value=event.target.value;
    
        if (emailPattern.test(value)) {
            setValidElement(element, true);
        } else {
            setValidElement(element, false);
        }
    });
  });
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
            if (value.length >= minlength) {
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

