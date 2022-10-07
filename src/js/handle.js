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
        const response = XMLHttp.responseText;
        console.log(response);
    }
    XMLHttp.open("POST", "../src/includes/UserModel.php?query=livesearch&q=" + query, true);
    XMLHttp.send(JSON.stringify({query}));
} 


