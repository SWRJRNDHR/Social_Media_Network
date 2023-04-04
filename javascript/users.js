const userList = document.querySelector(".users.users-list");
setInterval(() => {
  //console.log("button onclick");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log("Fuckkkkin fuck ");
        console.log(data);
        userList.innerHTML = data;
      }
    }
  };
  xhr.send();
}, 500);
