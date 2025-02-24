
//Scroll opacity animation on the header
const header = document.querySelector("#Top");
const line = document.querySelector("#line");

window.addEventListener("scroll", function() {
    const opacity = Math.min(2, window.scrollY / 50); // Calculate opacity based on scroll position

    if(opacity >= 0) header.style.setProperty('--tw-bg-opacity', opacity)
    if(opacity >= 1){
        line.style.display = 'block'
        header.classList.remove('text-white')
    }else{
        line.style.display = 'none'
        header.classList.remove('text-white')
        header.classList.add('text-white')
    }
});