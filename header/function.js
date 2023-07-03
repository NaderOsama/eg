const userOptions = document.querySelector('.userContainer');
const arrow = document.querySelector('.Arrow');
// const subMen = document.querySelector('.subMenuContainer');
// function subMenuToggle(){
//   subMen.classList.toggle('show');
//   userOptions.classList.toggle('active');
// }
// userOptions.addEventListener('click', subMenuToggle);


$(function() {
    $(".userContainer").click(function() {
        $(".submenu").slideToggle(500);
        userOptions.classList.toggle('active');
        arrow.classList.toggle('rotateArrow');
    });
});

// document.querySelector('#logout').addEventListener('click', () => {
//     window.
// });