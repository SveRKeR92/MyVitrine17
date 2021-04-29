const rightFoot = document.querySelector('.rightFoot');
const closeMenu = document.querySelector('.closeMenu');
const openMenu = document.querySelector('.openMenu');

openMenu.addEventListener('click', show);
closeMenu.addEventListener('click', close);

function show() {
    rightFoot.style.display = 'flex';
    rightFoot.style.top = '0';
}

function close() {
    rightFoot.style.top = '-100%';
}