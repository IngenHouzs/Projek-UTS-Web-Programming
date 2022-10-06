
const likePost = (user_id, post_id) => {
    const XMLHttp = new XMLHttpRequest();
    XMLHttp.onload = () => {
        const response = XMLHttp.responseText;
        console.log(response);
    }
    XMLHttp.open('POST', '../src/includes/PostModel.php?query=likepost', true);
    XMLHttp.send(JSON.stringify({user_id, post_id}));
};

const commentPost = (user_id, post_id) =>{

};
