


function notificacion(msg) {
    alertify.log(msg);
    return false;
}

function ok(msg) {
    alertify.success(msg);
    return false;
}

function error(msg) {
    alertify.error(msg);
    return false;
}
		