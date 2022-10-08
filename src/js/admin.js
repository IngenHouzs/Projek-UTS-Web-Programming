const deletePost = (post_id) => {
    const XMLHttp = new XMLHttpRequest();
    XMLHttp.onload = () => {
        const response = JSON.parse(XMLHttp.responseText);
        // msg        
        location.href = "index.php";
    }
    XMLHttp.open('POST', '../src/includes/PostModel.php?query=deletepost');
    XMLHttp.send(JSON.stringify({post_id}));
} 


const deleteUser = (user_id) => {
    console.log("kwkw");
    const XMLHttp = new XMLHttpRequest();
    XMLHttp.onload = () => {
        const response = JSON.parse(XMLHttp.responseText);
        // msg        
        location.href = "index.php";
    }
    XMLHttp.open('POST', '../src/includes/UserModel.php?query=deleteuser');
    XMLHttp.send(JSON.stringify({user_id}));
  } 
  
const banUserPermanently = (user_id) => {
    console.log("hwhhwhw");
}


