const pass = document.getElementById("pass"),
      icon = document.getElementById("icono");
      icon.addEventListener("click", e =>{
        if(pass.type == "password"){
            pass.type = "text";
        }else{
            pass.type = "password"
        }
      })

function passwordVisibility (passwordId,toggleId) {
    var passwordInput = document.getElementById(passwordId);
    var toggleIcon = document.getElementById(toggleId);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
}
