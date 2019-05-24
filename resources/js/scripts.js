$(document).ready(function () {
    $("#btn-save-products").on("click", function () {
        var form = document.getElementById('form-products')
        // Validar campo nombre
        form.submit()
        /*var formData = new FormData(form)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url        : form.getAttribute('action'),
            type        : 'POST',
            processData : false,
            contentType : false,
            data        : formData,
            success     : function ( response ) {
                console.log(response)
            }
        })*/
    })
})
