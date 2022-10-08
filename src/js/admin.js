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