import { ROOT } from "./constants.js"
import { validator, isValidData } from "./validate.js"

const body = document.querySelector('body')
const modal = document.querySelector(".modal")
const modalTitle = document.querySelector(".modal-title")
const textarea = document.querySelector(".modal-text")
const form = document.querySelector(".modal-form")
const errorBox = document.querySelector("#error-textarea")
const user = document.querySelector(".menu-btn")

loadTasks()

const data = {
  description: "" 
}

textarea.oninput = function (event) {
  const regEx = /^([áéíóúÁÉÍÓÚA-Za-z0-9_.,\s]){1,500}$/
  const error = {
    element: errorBox,
    message: "Solo se permiten letras mayusculas, minusculas, números, guiones bajos, espacios y puntos. Minimo 1 caracter, maximo 200 caracteres."
  }

  validator(event, regEx, data, error)
}

body.onclick = function(event) {
  let {classList, parentNode: {parentNode}} = event.target
  let isBtnNew = classList.contains("btn-new")
  let isModal = classList.contains("modal")
  let isBtnCancel = classList.contains("btn-cancel")
  let isBtnEye = classList.contains("btn-eye")
  let isBtnDelete = classList.contains("btn-delete")

  
  if(isBtnNew ) {
    modal.classList.remove("hide")
    modalTitle.innerHTML = "Nueva"
    form.onsubmit = createTask
  }
  
  if(isModal || isBtnCancel) {
    hideModal()
  }
  
  if(isBtnEye) {
    const id = event.target.getAttribute("idTask")
    const content = parentNode.querySelector(".card-text").innerHTML;
    modal.classList.remove("hide")
    // La logica del cambio del nombre y la carga del contenido
    modalTitle.innerHTML = "Modificar"
    textarea.value = content
    data.description = content
    textarea.id = id
    form.onsubmit = updateTask
  }

  if(isBtnDelete) {
    const id = event.target.getAttribute("idTask")
    deleteTask(id)
  }

}

function createTask(event) {
  event.preventDefault()
  if(isValidData(data) && deleteBlanks()) {
    return sendData()
  } 

  if(errorBox.innerHTML === "") {
    errorBox.innerHTML = "No se permiten espacios en blanco"
    textarea.value = ""
  }
}

function updateTask(event) {
  event.preventDefault()
  if(isValidData(data) && deleteBlanks()) {
    const id = textarea.id
    return updateDetail(id)
  } 

  if(errorBox.innerHTML === "") {
    errorBox.innerHTML = "No se permiten espacios en blanco"
    textarea.value = ""
  }

}

function deleteBlanks() {
  let cleanText = data.description.trim().replace(/\s{2,}/g, " ")
  data.description = cleanText
  return cleanText.length >=1
}

async function sendData() {
  let formData = new FormData()
  formData.append("user_id", user.id)
  formData.append("task", data.description)

  const result = await (await fetch(`/${ROOT}/logic/save_task.php`, {
    method: "POST",
    body: formData
  })).json()

  if(result.error) {
    alert(result.message)
  } else {
    hideModal()
    loadTasks()
    alert(result.message)
  }
}

function hideModal() {
  modal.classList.add("hide")
  textarea.value = ""
  data.description = ""
}


async function loadTasks() {
  let formData = new FormData()
  formData.append("user_id", user.id)
  formData.append("token", "24efgrtyy")

  const result = await (await fetch(`/${ROOT}/logic/get_task.php`, {
    method: "POST",
    body: formData
  })).json()

  const todo = document.getElementById("todo")
  const doing = document.getElementById("doing")
  const done = document.getElementById("done")
  todo.innerHTML = ""
  doing.innerHTML = ""
  done.innerHTML = ""

  result.tasks.forEach((task) => {
    let status = parseInt(task.status)

    const card = document.createElement("div")
    card.classList.add("column-card")
    card.innerHTML = `
        <div class="card-text">${task.detail}</div>
        <div class="card-buttons">
          <iconify-icon icon="ic:outline-remove-red-eye" width="24" class="btn-icon btn-eye" idTask="${task.id}"></iconify-icon>
          <iconify-icon icon="material-symbols:delete-outline-sharp" width="24" class="btn-icon btn-delete" idTask="${task.id}"></iconify-icon>
        </div>  
    `
    if(status === 1) {
      todo.appendChild(card)
    }

    if(status === 2) {
      doing.appendChild(card)
    }

    if(status === 3) {
      done.appendChild(card)
    }

  })
}

async function updateDetail(id) {

  let formData = new FormData()
  formData.append("task_id", id)
  formData.append("task", data.description)

  const result = await (await fetch(`/${ROOT}/logic/update_task.php`, {
    method: "POST",
    body: formData
  })).json()

  if(result.error) {
    // Esto se ejecuta cuando hay error
    alert(result.message)
  } else {
    // Se ejecuta cuando todo va bien
    hideModal()
    await loadTasks()
    alert(result.message)
  }

}

async function deleteTask(id) {
  
  let formData = new FormData()
  formData.append("task_id", id)

  const result = await (await fetch(`/${ROOT}/logic/delete_task.php`, {
    method: "POST",
    body: formData
  })).json()

  if(result.error) {
    // Esto se ejecuta cuando hay error
    alert(result.message)
  } else {
    // Se ejecuta cuando todo va bien
    hideModal()
    await loadTasks()
    alert(result.message)
  }
}