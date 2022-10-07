const likePost = (user_id, post_id) => {
  const XMLHttp = new XMLHttpRequest();
  XMLHttp.onload = () => {
    const response = XMLHttp.responseText;
 

  };
  XMLHttp.open("POST", "../src/includes/PostModel.php?query=likepost", true);
  XMLHttp.send(JSON.stringify({ user_id, post_id }));
};




const likeComment = (user_id, comment_id) => {
  const XMLHttp = new XMLHttpRequest();
  XMLHttp.onload = () => {
    const response = XMLHttp.responseText;  
  };  
  XMLHttp.open("POST", "../src/includes/PostModel.php?query=likecomment", true);
  XMLHttp.send(JSON.stringify({ user_id, comment_id }));
}


const liveSearch = (query) => {
    const XMLHttp = new XMLHttpRequest();
    // response
    XMLHttp.onload = () => {
        const response = JSON.parse(XMLHttp.responseText);        
        const oldWrapper = document.querySelector('.search-box');      
        oldWrapper.innerHTML = '';

        if (response.length == 0 || document.querySelector('.search-user-form').value == ''){
          return;
        }
        for (let user of response){
            oldWrapper.innerHTML += `
            <div class="result-search-box" onclick="autoAddInputValue('${user.username}');">
            <img src="../src/user_pfp/goblinlaugh.png"/>
            <p>${user.username}</p>
            </div>             
            `
            
        }

    }
    XMLHttp.open("POST", "../src/includes/UserModel.php?query=livesearch&q=" + query, true);
    XMLHttp.send(JSON.stringify({query}));
} 


const showSearchResult = () => {
    const searchResult = document.querySelector('.search-box');
    if (searchResult.style.display == 'none') searchResult.style.display = 'block';
    else searchResult.style.display = 'none';
} 

const autoAddInputValue = (username) => {
  console.log("hehe");
  const inputBar = document.querySelector('.search-user-form');
  inputBar.value = username;
}


const redirectToPostPage = (post_id) => {
    location.href = "post.php?p=" + post_id;
}

const redirectToUserPage = (username) => {
    location.href= "explore.php?u=" + username;
}

