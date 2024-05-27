var  nameError = document.getElementById("name-error");
var  phoneError = document.getElementById("phone-error");
var  emailError = document.getElementById("email-error");
var  msgError = document.getElementById("msg-error");
var  submitError = document.getElementById("submit-error");

function validatename(){
    var name = document.getElementById('contact-name').value;
    
        if(name.length == 0){
        nameError.innerHTML = 'name is required';
        return false;
          }
        
         if(!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)){
        nameError.innerHTML = 'full name is required';
        return false;
            }
            
            nameError.innerHTML = '<i class="fa-solid fa-check"></i>';
            return true;
}
function validatePhone(){
    var phone = document.getElementById('contact-phone').value;
     if (phone.length == 0){
        phoneError.innerHTML = 'phone no is required';
        return false;
     }
     if(phone.length !==10){
        phoneError.innerHTML = 'phone no should be of 10 digits';
        return false;
     }
     if(!phone.match(/^[0-9]{10}$/)){
        phoneError.innerHTML = 'only digits please';
        return false;
     }

     phoneError.innerHTML = '<i class="fa-solid fa-check"></i>';
     return true;
}
function validateEmail(){
    var email = document.getElementById('contact-email').value;

    if(email.length == 0){
        emailError.innerHTML =' email is required';
        return false;
    }
    if(!email.match(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i)){
      emailError.innerHTML =' email is invalid';
      return false;
    }
    emailError.innerHTML ='<i class="fa-solid fa-check"></i>';
    return true;
}
function validateMsg(){
    var msg = document.getElementById("contact-msg").value;
    var req = 30;
    var left = req - msg.length;
    if (left > 0){
        msgError.innerHTML = 'msg is required';
        return false;

    }
    msgError.innerHTML ='<i class="fa-solid fa-check"></i>';
    return true;
}
function validateForm(){
    if(!validatename() || !validatePhone() || !validateMsg() || !validateEmail() ){
        submitError.innerHTML = "please fill the required field";
        return false;
    }
}
function previewImage(input) {
    var preview = document.getElementById('image-preview');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
ClassicEditor
.create(document.querySelector('#editorTextarea'))
.then(editor => {
    window.editor = editor;
})
.catch(error => {
    console.error(error);
});



//  ClassicEditor
// .create(document.querySelector('#contact-msg'))
// .catch(error => {
//     console.error(error);
// })