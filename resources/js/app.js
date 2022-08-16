import './bootstrap';
const boton = document.querySelector('#botonnav');
const menu = document.querySelector('#menu');

boton.addEventListener('click', () => {
    console.log('click')
    menu.classList.toggle('hidden')
})

const btn = document.querySelectorAll('#btnnotemenu');
const drop = document.querySelectorAll('#notemenu');

btn.forEach((element,key) => {
    element.addEventListener('click', () => {
        console.log('click')
        drop[key].classList.toggle('hidden')
    })
});
