const form = document.querySelector(".login form"),
  continueBtn = form.querySelector(".button input"),
  errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  console.log("button onclick");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/login.php", true);
  xhr.onload = () => {
    console.log("Inside onclick");
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log("Fuckkkkin fuck ");
        console.log(data);
        if (data == "Chal raha hai!") {
          console.log("executing");
          location.href = "profile.php";
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
          console.log("wapis gadbad ho gaya");
        }
      }
    } else {
      console.log("problem");
    }
  };

  let formData = new FormData(form);

  xhr.send(formData); //sending form data to php
};
