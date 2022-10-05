const getRandomUser = () => {
    var XMLHttp = new XMLHttpRequest();
    XMLHttp.onload = () => {
        const response = JSON.parse(XMLHttp.responseText);
        console.log(response);
        const container = document.getElementsByClassName('friend-recommendation-section')[0];

        //<div class="random-friend-popup-wrapper">
        //     <img src="#"/>
        //     <a href="index.php">Nama</a>        
        // </div>    


            for (let user of response){
                const div = document.createElement('div');
                div.classList.add("random-friend-popup-wrapper");
                const image = document.createElement('img');
                image.setAttribute("src", "../src/user_pfp/" + user.foto);
                const link = document.createElement("a");
                const text = document.createTextNode(user.username);
                link.setAttribute("href", "index.php");
                link.appendChild(text);
                div.append(image);
                div.append(link);
                container.append(div);
            }
    }
    XMLHttp.open('GET', '../src/includes/UserModel.php?query=randomuser', true);
    XMLHttp.send();
}


const showImagePreview = () => {
    const inpFile = document.getElementById('pictures');
    const container = document.getElementById('preview-image');

    const fileReader = new FileReader();

    for (let file of inpFile.files){



        const image = document.createElement('img');
        image.setAttribute("src", file.name);

        container.append(image);

    }
}









