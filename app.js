const input = document.querySelector("input");
const addBtn = document.querySelector("button");
const todo = document.querySelector("#todo");
const doneTodo = document.querySelector("#done");
const clearBtn = document.querySelector("#clearBtn");
const count = document.querySelector("#countTotal");

updateCount();

function updateCount() {
  let data = getData();
  let result = data.filter((item) => !item.done);
  if (result.length == 0) {
    count.style.display = "none";
  } else {
    count.textContent = result.length;
    count.style.display = "inline";
  }
}

getData().map((item) => createItem(item.text, item.done));

addBtn.addEventListener("click", createText);

// using localStorage Start

function saveData(text) {
  let data = getData();
  let item = { text, done: false };
  data.push(item);
  localStorage.setItem("data", JSON.stringify(data));
  updateCount();
}

function getData() {
  return JSON.parse(localStorage.getItem("data")) || [];
}

function removeData(text) {
  let data = getData();
  let result = data.filter((item) => item.text !== text);
  localStorage.setItem("data", JSON.stringify(result));
  updateCount();
}

function checkData(text) {
  let data = getData();

  let todo = data.find((item) => item.text == text);
  todo.done = true;

  let index = data.findIndex((item) => item.text == text);
  data[index] = { text, done: todo.done };

  localStorage.setItem("data", JSON.stringify(data));
}

// using localStorate End

function createText() {
  const text = input.value;
  if (text === "") return false;

  createItem(text);
  updateCount();
  saveData(text);

  input.value = "";
  input.focus();
}

function createItem(text, done = false) {
  let liTag = document.createElement("li");
  liTag.classList.add("list-group-item");
  liTag.textContent = text;

  const delBtn = document.createElement("a");
  delBtn.href = "#";
  delBtn.classList.add("fa-solid", "fa-trash", "float-end", "text-danger");
  liTag.appendChild(delBtn);
  delBtn.addEventListener("click", () => {
    liTag.remove();
    updateCount();
    removeData(text);
  });

  const checkBtn = document.createElement("a");
  checkBtn.href = "#";
  checkBtn.classList.add(
    "fa-solid",
    "fa-check",
    "float-start",
    "me-2",
    "text-decoration-none"
  );
  liTag.appendChild(checkBtn);
  checkBtn.addEventListener("click", () => {
    doneTodo.appendChild(liTag);
    checkData(text);
    updateCount();
    checkBtn.style.display = "none";
  });

  if (done) {
    doneTodo.appendChild(liTag);
    checkBtn.remove();
  } else {
    todo.appendChild(liTag);
  }
}

input.addEventListener("keydown", (e) => {
  if (e.key === "Enter") {
    createText();
  }
});

clearBtn.addEventListener("click", () => {
  doneTodo.textContent = "";
  let data = getData();
  let result = data.filter((item) => !item.done);
  localStorage.setItem("data", JSON.stringify(result));
});
