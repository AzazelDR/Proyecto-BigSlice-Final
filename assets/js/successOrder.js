/*var option = {
    animation: true,
    delay: 1500,

}

var toastElList = [].slice.call(document.querySelectorAll('.toast'))
var toastList = toastElList.map(function(toastEl) {
    return new bootstrap.Toast(toastEl, option)
})

function alerta() {
    for (var i = 0; i < toastList.length; i++) {
        toastList[i].show();
    }
}*/

window.onload = (_event) => {
    var option = {
        animation: true,
        delay: 3000,

    }
    let myAlert = document.querySelector('.toast');
    let bsAlert = new bootstrap.Toast(myAlert, option);
    bsAlert.show();
}