
// Hide element
var post_control = document.getElementsByClassName("post-control");
var space_img = document.getElementById("image_space");
let modal_form = document.getElementById("my-modal");
let btn_post = document.getElementsByClassName("open-create");
let button = document.getElementById("ok-btn");
// let buttonupload = document.getElementById("upload");



function hide(element){
    element.style.display = "none";
}
function show(element){
    element.style.display = "";
}

// We want the modal to open when the Open button is clicked
if(btn_post.length > 0){
  btn_post[0].onclick = function() {
    modal_form.style.display = "block";
  }
  btn_post[1].onclick = function() {
    modal_form.style.display = "block";
  }
}
// We want the modal to close when the OK button is clicked
function close_create() {
  clear_form();
  modal_form.style.display = "none";
}


// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (event.target.matches('.control-post')) {
        let controller = event.target.nextElementSibling;
        show(controller);
    }else{
        var i;
        for (i = 0; i < post_control.length; i++) {
            hide(post_control[i]);
        }
    }
  }

function deleteImg(event){
    if(event.target.className = "delete"){
        swal({
            title: "Are you sure?",
            text: "Do you really want to delete this photo?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Your image has been deleted successfully!!", {
                icon: "success",
              })
              ;
            event.target.parentElement.parentElement.remove();
            } else {
              swal("Nothing deleted!");
            }
          });
    }
}

let deleteImage = document.getElementById("delete");
if(deleteImage != null){
    deleteImage.addEventListener("click", deleteImg);
}

// loadfile image
var image = document.getElementById('output');
var iconRemoveImg = document.getElementById('remove_photo');
var loadFile = function(event) {
  show(content_show_img);
  show(iconRemoveImg);
  image.setAttribute("class","flex w-full border p-1 rounded-md");
  image.src = URL.createObjectURL(event.target.files[0]);
};

// LOADFILE PROFILE
var img_profile = document.getElementById('uprofile');
var loadProfile = function(event) {
  img_profile.src = URL.createObjectURL(event.target.files[0]);
};

// LOADFILE COVER
var img_cover = document.getElementById('cover_img');
var loadCover = function(event) {
  img_cover.src = URL.createObjectURL(event.target.files[0]);
};

// clear post form file
let input_img = document.getElementById("upload-image");
let post_content = document.getElementById("post_content");
let content_show_img = document.getElementById("content_show_img");
function clear_form(){
  hide(iconRemoveImg);
  image.src = "unknown";
  input_img.value = "";
  post_content.value = "";
}

function clear_img(){
  image.src = "unknown";
  input_img.value = "";
  hide(content_show_img);
}

// SHOW PASSWORD
function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function showSave()
{
  document.getElementById('save_submit').style.display = "";
}

let btnSaveImg = document.getElementById("img");
function hideBtn()
{
  if(btnSaveImg.value==''){
    document.getElementById('save_submit').style.display = "none";
  }
}
