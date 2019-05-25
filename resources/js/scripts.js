$(document).ready(function () {
    $("#btn-save-products").on("click", function () {
        var form = document.getElementById('form-products')
        // Validar campo nombre
        form.submit()
    })

    $("body").on("click", ".btn-delete-img", function (e) {
      e.preventDefault()
      var btn = $(e.currentTarget)
      var imgId = btn.attr('data-img-id')
      $.ajax({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url      : `/imagenes/${imgId}`,
         type     : 'DELETE',
         success  : function ( response ) {
            console.log(response)
            btn.parent().parent().parent().remove()
         }
      })
   })
})
