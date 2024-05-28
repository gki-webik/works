const btn = document.querySelector('.header_btn');
const header = document.querySelector('.header');
btn.addEventListener('click', () => {
    btn.classList.toggle('is-open');
    header.classList.toggle('is-open');
});