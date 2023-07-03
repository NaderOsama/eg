const linkToHome = document.querySelector('#toHomePage');

function moveToHome(){
  location.href = "signin/login.php";
}
linkToHome.addEventListener('click', moveToHome);
