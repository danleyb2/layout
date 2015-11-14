




var xhr = new XMLHttpRequest();
var dlBtn;
window.onload= function () {

     dlBtn=document.getElementsByClassName('delete');
    var upBtn=document.getElementsByClassName('upvote');
    var downBtn=document.getElementsByClassName('downvote');

    addL(dlBtn,'delete');
    addL(upBtn,'upvote');
    addL(downBtn,'downvote');


};
function addL(elements,action){
    for(var i=0;i<elements.length;i++){
        elements[i].action=action;
        elements[i].addEventListener('click',Ajax);
    }
}

function Ajax(event) {
    /*var fId= event.target.parentElement.id;
    console.log('/'+event.target.action+'/'+fId);
    return;*/
    if (xhr.readyState == 4 || xhr.readyState == 0) {

        var fId= event.target.parentElement.id;
        xhr.open('get', '/'+event.target.action+'/'+fId);
        xhr.setRequestHeader('AJAX','1');
        xhr.onreadystatechange = handle;
        xhr.send();
    }
}
function handle(){
    if(xhr.status=200 && xhr.readyState==4){
        var response=xhr.response;
        console.log(response);
    }
}
