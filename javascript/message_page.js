const form = document.querySelector(".typing_area"),
  inputField = form.querySelector(".input-field"),
  sendButton = form.querySelector("button"),
  chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();
};

sendButton.onclick = () => {
  console.log("button onclick");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insert-message.php", true);
  xhr.onload = () => {
    console.log("Inside onclick");
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
      }
    }
  };

  let formData = new FormData(form);

  xhr.send(formData); //sending form data to php
};
setInterval(() => {
  //console.log("button onclick");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
      }
    }
  };
  let formData = new FormData(form);

  xhr.send(formData);
}, 500);
