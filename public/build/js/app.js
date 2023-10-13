import { Modal } from "bootstrap";
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
    const password = document.getElementById("inputPassword");
    const cedula = document.getElementById("cedula");
    const elements = [[name, false], [apellido, false], [telefono, false], [email, false], [password, false]];

    
    const form = document.getElementById("form-register");
        
    form.addEventListener("submit", (event) => {

        event.preventDefault();

            for(let i=0; i < elements.length; i++){
                const element = elements[i][0];

                element.classList.forEach(className => {
                    if (className == 'is-valid'){
                        elements[i][1] = true;
                    }   
                });
                if (!elements[i][1]) {
                    // element.inp
                    const fakeEvent = {"target":element}
                    validateElement(fakeEvent)
                    validateEmail(fakeEvent)
                    //setValidElement(element, false)
                }
            }
            for(let i=0; i < elements.length; i++){
                const [element, bool ] = elements[i];

                if(!bool){
                    break;
                }
                if (i==elements.length-1){
                    form.classList.add("was-validated");
                    const modal = document.createElement("div");

                    const text_nombre = name.value;
                    const text_apellido = apellido.value;
                    const text_telefono = telefono.value;
                    const text_email = email.value;
                    const text_password = password.value;
                    const text_cedula = cedula.value;


                    modal.innerHTML = `
                    <!-- Vertically centered modal -->
                    <div class="modal" tabindex="-1">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Fomulario de registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                            <ul>
                                <li>${text_nombre}</li>
                                <li>${text_apellido}</li>
                                <li>${text_telefono}</li>
                                <li>${text_email}</li>
                                <li>${text_password}</li>
                                <li>${text_cedula}</li>
                            </ul>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Registrarse</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    `
                    form.appendChild(modal);
                    const myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                        keyboard: false
                    });
                    myModal.show();
                }
                
            }
        

        //
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
  
  source = document.querySelectorAll(classElement);
  source.forEach((element) => {
    element.addEventListener("input", (event) => {
        validateEmail(event)
    });
  });
}

function validateEmail(event) {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const value=event.target.value;
    const class_list=event.target.classList;
    const classElement = "if-email";
   
    if (class_list.contains(classElement)){
        if (emailPattern.test(value)) {
            setValidElement(event.target, true);
        } else {
            setValidElement(event.target, false);
        }
    }
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

