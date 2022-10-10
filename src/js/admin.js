const deletePost = (post_id) => {
    const XMLHttp = new XMLHttpRequest();
    XMLHttp.onload = () => {

        // msg        
        location.href = "index.php";
    }
    XMLHttp.open('POST', '../src/includes/PostModel.php?query=deletepost');
    XMLHttp.send(JSON.stringify({post_id}));
} 


const deleteUser = (user_id) => {
    const XMLHttp = new XMLHttpRequest();
    XMLHttp.onload = () => {
        const response = JSON.parse(XMLHttp.responseText);
        // msg        
        location.href = "index.php";
    }
    XMLHttp.open('POST', '../src/includes/UserModel.php?query=deleteuser');
    XMLHttp.send(JSON.stringify({user_id}));
} 

const unbanUser = (user_id) => {
    console.log("wwkw");
    const XMLHttp = new XMLHttpRequest();
    XMLHttp.onload = () => {
        const response = JSON.parse(XMLHttp.responseText);
        // msg        
        location.href = "index.php";
    }
    XMLHttp.open('POST', '../src/includes/UserModel.php?query=unbanuser');
    XMLHttp.send(JSON.stringify({user_id}));
}


const deleteComment = (comment_id) => {
    const XMLHttp = new XMLHttpRequest();
    XMLHttp.onload = () => {
        const response = JSON.parse(XMLHttp.responseText);
        // msg        
        location.href = "index.php";
    }
    XMLHttp.open('POST', '../src/includes/PostModel.php?query=deletecomment');
    XMLHttp.send(JSON.stringify({comment_id}));    
}   

  
const banUserPermanently = (user_id) => {
    const XMLHttp = new XMLHttpRequest();
    XMLHttp.onload = () => {
        const response = JSON.parse(XMLHttp.responseText);
        // msg        
        location.href = "index.php";
    }
    XMLHttp.open('POST', '../src/includes/UserModel.php?query=banuser');
    XMLHttp.send(JSON.stringify({user_id}));
}


