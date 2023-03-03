import { ROOT } from "./constants.js"
import { isValidData, validator } from "./validate.js"

const form = document.querySelector("#form-login")
form.reset()

const { user, password } = form

const data = {
  user: "",
  password: ""
}


user.oninput = (event) => {
  const regEx = /^([a-zA-Z0-9_]{1,64})$/
  const error = {
    element: document.querySelector("#error-user"),
    message: "Solo se permiten hasta 64 caracteres, letras mayusculas, minusculas, numeros y guiones bajos"
  }

  validator(event, regEx, data, error)
}

password.oninput = (event) => {
  const regEx = /^([a-zA-Z0-9_]{1,64})$/
  const error = {
    element: document.querySelector("#error-password"),
    message: "Solo se permiten hasta 64 caracteres, letras mayusculas, minusculas, numeros y guiones bajos"
  }

  validator(event, regEx, data, error)
}


form.onsubmit = async (event) => {
  event.preventDefault()
  const errorForm = document.getElementById("error-form")
  if(isValidData(data)) {
    const formData = new FormData(form)

    const result = await (await fetch(`/${ROOT}/logic/login.php`, {
      method: "POST",
      body: formData
    })).json()

    if(result.access) {
      window.location = `/${ROOT}/pane`
    } else {
      errorForm.innerHTML = result.error
    }
    
  } else {
    errorForm.innerHTML = "Debes completar todos los campos"
  }

}
