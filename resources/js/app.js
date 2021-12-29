require('./bootstrap');
require('alpinejs');

/** Sweet Alert 2*/
import Swal from "sweetalert2";

window.successAlert = function (icon, title){

    Swal.fire({
        position: 'center',
        icon,
        title,
        showConfirmButton: false,
        timer: 3000
    });

}