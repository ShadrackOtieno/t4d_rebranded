
//Shift the array elements by 1 index
function alternateElements(arr){
    
    // let state = ['block', 'hidden']
    
    const dummy = arr[0]
    
    for(i = 0; i < arr.length; i++){
        arr[i] = arr[i+1]
    }

    arr[arr.length - 1] = dummy

    return arr;
}

//This function receive two DOM elements
//The first will be hidden and 
//the second will be revealed
function hideSeek(hide, reveal){
    //Hide
    hide.classList.toggle('hidden')
    
    //Seek
    reveal.classList.toggle('hidden')
}

//Search bar
const srch = document.querySelector('#searchBar')
const SIcon = document.querySelector('#osrch')
const CIcon = document.querySelector('#xsrch')

CIcon.addEventListener('click', e => {
    //hideSeek function
    hideSeek( CIcon, SIcon)
    
    srch.classList.toggle('hidden')
})

SIcon.addEventListener('click', e => {
    //hideSeek function
    hideSeek(SIcon, CIcon)
    
    srch.classList.toggle('hidden')
})

//Hiding the account controls
//Refactor the code
const Acc = document.querySelector('#acc')

Acc.addEventListener('click', e => {
    const Prf = document.querySelector('#prf')
    Prf.classList.toggle('hidden')
})