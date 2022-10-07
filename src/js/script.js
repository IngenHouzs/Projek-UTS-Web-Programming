const getRandomUser = () => {
  var XMLHttp = new XMLHttpRequest();
  XMLHttp.onload = () => {
    const response = JSON.parse(XMLHttp.responseText);
    console.log(response);
    const container = document.getElementsByClassName(
      "friend-recommendation-section"
    )[0];

    //<div class="random-friend-popup-wrapper">
    //     <img src="#"/>
    //     <a href="index.php">Nama</a>
    // </div>

    for (let user of response) {
      const div = document.createElement("div");
      div.classList.add("random-friend-popup-wrapper");
      const image = document.createElement("img");
      image.setAttribute("src", "../src/user_pfp/" + user.foto);
      const link = document.createElement("a");
      const text = document.createTextNode(user.username);
      link.setAttribute("href", "index.php");
      link.appendChild(text);
      div.append(image);
      div.append(link);
      container.append(div);
    }
  };
  XMLHttp.open("GET", "../src/includes/UserModel.php?query=randomuser", true);
  XMLHttp.send();
};

const showPostTagsOnCreate = () => {
  const tagList = document.getElementById("post-tag");
  if (tagList.style.display === "none") {
    tagList.style.display = "block";
  } else {
    tagList.style.display = "none";
  }
};

const showImagePreview = () => {
  const inpFile = document.getElementById("pictures");
  const container = document.getElementById("preview-image");

  const fileReader = new FileReader();
  document.getElementById("preview-image").innerHTML = "";

  for (let file of inpFile.files) {
    if (file) {
      const encodedImage = URL.createObjectURL(file);
      const image = document.createElement("img");
      image.setAttribute("src", encodedImage);
      container.append(image);
    }
  }
};




// init;

const init = () => {
  document
    .getElementsByClassName("dropdown-button")[0]
    .addEventListener("click", showPostTagsOnCreate);
};

init();


const logout = document.getElementById("logout-website");
logout.onclick = function () {
  document.getElementById("overlay-logout").removeAttribute("hidden");
};

const cancel_logout = document.getElementById("button-no");
cancel_logout.onclick = function () {

  document.getElementById("overlay-logout").setAttribute("hidden", "");
};

const open_button = document.getElementById("openbtn");
open_button.onclick = function () {
  document.getElementById("new-side-bar").style.width = "150px";
  document.getElementsByClassName("main-content")[0].style.marginLeft = "100px";
  document.getElementById("overlay-navbar").removeAttribute("hidden");
};

function closeNav() {
  document.getElementById("new-side-bar").style.width = "0";
  document.getElementsByClassName("main-content")[0].style.marginLeft = "0";
  document.getElementById("overlay-navbar").setAttribute("hidden", "");
}
=======
  document.getElementsByClassName("overlay")[0].setAttribute("hidden", "");
};

