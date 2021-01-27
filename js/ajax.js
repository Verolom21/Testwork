$(document).ready(function () {
    let url = 'form.php'
    $("#btn-auth").on('click',
        function (e) {
            e.preventDefault()
            let authEmail = $('#auth-email').val()
            let authPass = $('#auth-pass').val()
            if (authEmail && authPass) {
                $.ajax({
                    url: url,
                    type: "POST",
                    dataType: 'json',
                    data: {
                        'authEmail': authEmail,
                        'authPass': authPass
                    },
                    success: function (response) {
                        if (response) {
                            $('#form-auth').html("<div>Здраствуйте, " + response['name'] + ". Ваш email - " + response['email'] + "</div>")
                        } else {
                            console.log('Неправильный логин или пароль')

                        }
                    }
                })
            } else {
                $('#form-auth #warning').show();
            }

        }
    )

    $("#btn-reg").on('click',
        function (e) {
            e.preventDefault()
            let regName = $('#reg-name').val()
            let regEmail = $('#reg-email').val()
            let regPass = $('#reg-pass').val()
            if (regName && regEmail && regPass) {
                $.ajax({
                    url: url,
                    type: "POST",
                    dataType: 'json',
                    data: {
                        'regName': regName,
                        'regEmail': regEmail,
                        'regPass': regPass,
                    },
                    success: function (response) {
                        $('#form-reg').html("<div>" + response + "</div>")
                    },

                })
            } else {
                $('#form-reg #warning').show();
            }

        }
    )
})

