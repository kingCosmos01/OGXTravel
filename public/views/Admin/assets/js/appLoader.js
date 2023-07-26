const appLoader = document.getElementById('appLoader');
const scrollTopBtn = document.getElementById('scrollTop');

window.addEventListener('load', function() {
    appLoader.style.display = 'none';
});


function showScrollToTopBtn() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById('scrollTop').style.opacity = '1';
        document.getElementById('scrollTop').style.visibility = 'visible';
    } else {
        document.getElementById('scrollTop').style.opacity = '0';
        document.getElementById('scrollTop').style.visibility = 'hidden';
    }
}

window.addEventListener('scroll', showScrollToTopBtn);

scrollTopBtn.addEventListener('click', ()=> {
    window.scroll(0);
});