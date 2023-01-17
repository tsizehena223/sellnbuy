// var settingsmenu = document.querySelector(".settings-menu");
// var darkBtn = document.getElementById("dark-btn");

// function settingsMenuToggle(){
//     settingsmenu.classList.toggle("settings-menu-height");
// }
// darkBtn.onclick = function (){
//     darkBtn.classList.toggle("dark-btn-on"); 
//     document.body.classList.toggle("dark-theme");
// }

// var likeImg = document.getElementById('like');

// // var likeImg = document.getElementById('like');
// var button = document.querySelector(".post-activity-link");

// button.addEventListener('click', () => {
//     if (likeImg.src.match('like')) {
//         likeImg.src = 'images/blue.png';
//         // button.style.background = '#045be6';
//     }
//     else {
//         likeImg.src = 'images/like.png';
//     }
// })

// var choice = document.querySelector('.create-post button');

// choice.addEventListener('click', () => {
//     window.open('', '_blank', 'width = 600, height = 550, left = 380, top = 70');
//     window.moveTo(200, 200);
// });

// resaka manokatra menu
var navProfile = document.querySelector('.navbar-right .nav-profile-img');
navProfile.addEventListener('click', toggleMenu);
navProfile.addEventListener('mouseover', openMenu);
let profileMenu = document.getElementById("profileMenu");

function openMenu(){
    profileMenu.classList.add("open-menu");
};

function closeMenu(){
    profileMenu.classList.remove("open-menu");
};

function toggleMenu(){
    if (profileMenu.classList == 'profile-menu-wrap'){
        openMenu();
        return true
    }
    else {
        closeMenu();
        return false;
    }
};

// Misouligne anle page active 
const activePage = window.location.pathname;
const navlinks = document.querySelectorAll('.navbar-center ul li a').forEach(link => {
    if (link.href.includes(activePage)) {
        link.classList.add('active-link');
    // console.log(activePage)
    };
});

// var settingsmenu = document.querySelector(".settings-menu");
// function settingsMenuToggle(){
    //     settingsmenu.classList.toggle("settings-menu-height");
    // };
    
// changement de theme
var darkBtn = document.getElementById("dark-btn");
darkBtn.onclick = function (){
    darkBtn.classList.toggle("dark-btn-on"); 
    document.body.classList.toggle("dark-theme");
};

// Couleur des bouttons likes
var buttons = document.querySelectorAll(".post-activity-link");
console.log(buttons);

buttons.forEach(button => {
    button.addEventListener('click', () => {
        if (document.body.classList == 'dark-theme'){
            button.classList.remove('blike');
            button.classList.toggle('dlike');
        }
        else {
            button.classList.remove('dlike')
            button.classList.toggle('blike');
    }});
});

// Couleur des bouttons buys
var buys = document.querySelectorAll('.buy-button-link');
var boutBuys = document.querySelectorAll('.buy-button-link button');
console.log(boutBuys);

boutBuys.forEach(buy => {
    buy.addEventListener('click', () => {
        if (buy.classList == 'green-buy') {
            buy.classList.remove('green-buy');
            buy.classList.add('white-buy');
        }
        else {
            buy.classList.remove('white-buy');
            buy.classList.add('green-buy');
        }
    })
})