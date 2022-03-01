require('./bootstrap');
require('alpinejs');

/** Sweet Alert 2*/
import Swal from "sweetalert2";

/** SWETALERT */

window.AlertTimer = function (icon, title){

    Swal.fire({
        position: 'center',
        icon,
        title,
        showConfirmButton: true,
        timer: 3000
    });
}



window.AlertTimerRedirect = function (text, title, url){

    let timerInterval
    Swal.fire({
        title,
        html: text,
        timer: 3000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {}, 2000)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            window.location = url;
        }
    })
}


window.AlertConfirmCancelSale = function (saleId){

    Swal.fire({
        title: 'Estas Seguro?',
        text: "Que deseas eliminar el pedido " + saleId,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('cancelSale', saleId);
        }
    })

}



window.AlertTimerSketchConfirm = function (icon, title){

    Swal.fire({
        position: 'center',
        icon,
        title,
        showConfirmButton: true,
        timer: 3000
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            Livewire.emitTo('refreshComponent');
        }
    });
}

