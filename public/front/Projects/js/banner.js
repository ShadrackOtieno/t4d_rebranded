const nextBtnX = document.querySelector('.next-xlide')
const prevBtnX = document.querySelector('.prev-xlide')
const xlides = document.querySelectorAll('.xlide')
const numberOfXlides = xlides.length;
let XlideNumber = 0;

//Slider next button
nextBtnX.addEventListener('click',() => {
    xlides.forEach((slide) => {
        slide.classList.remove('active')
    })

    XlideNumber++

    if(XlideNumber > (numberOfXlides - 1)){
        XlideNumber = 0
    }

    xlides[XlideNumber].classList.add('active')

    console.log('hello')
})

//Slider previous button
prevBtnX.addEventListener('click',() => {
    xlides.forEach((slide) => {
        slide.classList.remove('active')
    })
    
    XlideNumber--

    if(XlideNumber < 0){
        XlideNumber = numberOfXlides - 1
    }

    xlides[XlideNumber].classList.add('active')

    console.log('hello there')
})

function xlidez(){
    
    xlides.forEach((slide) => {
        slide.classList.remove('active')
    })

    XlideNumber++

    if(XlideNumber > (numberOfXlides - 1)){
        XlideNumber = 0
    }

    xlides[XlideNumber].classList.add('active')

}

setInterval(xlidez, 15000)