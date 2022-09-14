//console.log('Hola mundo')
const formulario = document.querySelector('#formulario');

formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    email();

})

function email() {
    const datos = new FormData(formulario);
    fetch('correo.php', {
            method: 'POST',
            body: datos
        })
        .then(res => res.json())
        .then(res => {
            console.log(res);

            if ('exito') {
                console.log('Mensaje enviado con exito:)');
                location.href = "index.html";
            } else {
                console.log('Mensaje no enviado :(')
            }

        })

}