let celular = document.getElementById('telefono')

celular.addEventListener('keypress', (event) =>{
    event.preventDefault()
    let codigoKey = event.keyCode
    let valorKey = String.fromCharCode(codigoKey)
    console.log(valorKey)
    let valor = parseInt(valorKey)
    console.log(valor)
    if (valor) {
        celular.value += valor
    } 
})