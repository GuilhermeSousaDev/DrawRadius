function borderChangeTopLeft() {
    const inpRadio = document.querySelector('#radiusTopLeft')
    const div = document.querySelector('.div1')
    div.style.borderTopLeftRadius = `${inpRadio.value}px`
}
function borderChangeTopRight() {
    const inpRadio = document.querySelector('#radiusTopRight')
    const div = document.querySelector('.div1')
    div.style.borderTopRightRadius = `${inpRadio.value}px`
}
function borderChangeBottomLeft() {
    const inpRadio = document.querySelector('#radiusBottomLeft')
    const div = document.querySelector('.div1')
    div.style.borderBottomLeftRadius = `${inpRadio.value}px`
}
function borderChangeBottomRight() {
    const inpRadio = document.querySelector('#radiusBottomRight')
    const div = document.querySelector('.div1')
    div.style.borderBottomRightRadius = `${inpRadio.value}px`
}
function changeWidthObj() {
    const div = document.querySelector('.div1')
    const inpRadio = document.querySelector('#widthObj')
    div.style.width = `${inpRadio.value}px`
}
function changeHeightObj() {
    const div = document.querySelector('.div1')
    const inpRadio = document.querySelector('#heightObj')
    div.style.height = `${inpRadio.value}px`
}
function changeColor() {
    const div = document.querySelector('.div1')
    const inpRadio = document.querySelector('#color')
    div.style.background = inpRadio.value
}