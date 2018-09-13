
//Sign in pop up
document.getElementById('signIn-pop').addEventListener('click',
  function () {
    document.querySelector("#signIn-wrapper").style.display = "flex";
  });

//Sign in dismiss
var signIn = document.getElementById('signIn-wrapper');
window.onclick = function (event) {
  if (event.target == signIn) {
    signIn.style.display = "none";
  }
}
