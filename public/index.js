//alert('hi')

function enter(a) {
    a.style.fontSize = '26px'
    a.style.transition = '500ms'
}

function leave(a) {
    a.style.fontSize = '16px'
}

let selectDelivery = document.querySelector('.select')
let total = document.querySelector('.total')

selectDelivery.onchange = () => {
    total.innerHTML = selectDelivery.value
}


