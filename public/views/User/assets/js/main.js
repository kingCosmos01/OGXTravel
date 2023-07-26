const overlay = document.getElementById('ogxNavContainerOverlay');
const navTrigger = document.getElementById('userNavTrigger');
const navContainer = document.getElementById('OGXNavContainer');
const navCloseBtn = document.getElementById('ogxNavCloseBtn');

const ogxUserBtn = document.getElementById('ogx-user-btn');
const ogxDropDownCta = document.getElementById('ogxUserCta');




navCloseBtn.addEventListener('click', ()=>{
    alert();
    overlay.style.display = 'none';
    navContainer.classList.remove('active');
});


navTrigger.addEventListener('click', ()=>{
    alert();
    overlay.style.display = 'block';
    navContainer.classList.add('active');
});

const ShowOgxDropDown = ()=> {
    ogxDropDownCta.classList.toggle('active');
}

const hideOgxDropDown = ()=> {
    ogxDropDownCta.style.display = 'none';
}

ogxUserBtn.addEventListener('click', ShowOgxDropDown);