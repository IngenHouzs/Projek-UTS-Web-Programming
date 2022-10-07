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
        for (let user of response){
            oldWrapper.innerHTML += `
            <div class="result-search-box">
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


