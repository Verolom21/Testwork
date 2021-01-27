$(document).ready(function() {
    $('#link-auth').click(function(e) {
        e.preventDefault()
        $('#form-auth').toggle()
    })
    $('#link-reg').click(function(e) {
        e.preventDefault()
        $('#form-reg').toggle()
    })
    $('#form-auth input').on('keyup input', function() {
        $('#form-auth #warning').hide()
        $('#form-auth #wrong').hide()
    })
    $('#form-reg input').on('keyup input', function() {
        $('#form-reg #warning').hide()
    })
});