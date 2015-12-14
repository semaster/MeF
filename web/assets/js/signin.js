window.onload = function () {
    if (p1 = document.getElementById("inputPassword")) p1.onchange = validatePassword;
    if (p2 = document.getElementById("confirmPassword")) p2.onchange = validatePassword;
}
function validatePassword(){
  var pass2=document.getElementById("confirmPassword").value;
  var pass1=document.getElementById("inputPassword").value;
  if(pass1!=pass2)
      document.getElementById("confirmPassword").setCustomValidity("Passwords Don't Match");
  else
      document.getElementById("confirmPassword").setCustomValidity('');
}