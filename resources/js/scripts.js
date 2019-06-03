$(document).ready(function () {

   var currentImg
   var currentInputimg
   var ul = $("#listColor")

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
            //console.log(response)
            btn.parent().parent().parent().remove()
            deleteImgModal(response)
            updateImgColor(response)
         }
      })
   })

   // se borra la imagen del modal
   function deleteImgModal(img) {
      image = $(`#modal-imagen-${img.id}`)
      //console.log(image)
      image.remove()
   }

   // si existe la imgen que se borro se valida que exista en las opciones del productos
   // de ser asi, se actualiza la imagen a la imagen por defecto
   function updateImgColor(img) {
      inputImgColor = ul.find('.mail-file-img input')
      inputImgColor.each(function() {
         var imgColor = $(this)
         if (imgColor.val() == img.url) {
            imgColor.next().attr('src', '/storage/productos/default.png')
            $.ajax({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url      : `/colores/${imgColor.prev().val()}`,
               type     : 'POST',
               success  : function ( response ) {
                  console.log(response)
               }
            })
         }
      })
   }

   $('#default-modal').on('shown.bs.modal', function (e) {
      var a = $(e.relatedTarget)
      currentImg = a.find('img')
      currentInputimg = a.find('input')
   })

   $('body').on('click', '.colorImg', function (e) {
      e.preventDefault()
      var th = $(e.currentTarget)
      var src = th.find('img')
      currentImg.attr('src', src.attr('src'))
      currentInputimg.val(src.attr('data-url'))
      $('#default-modal').modal('hide')
   })

   $("#add-color").on("click", function (e) {
      e.preventDefault()
      var li = `<li>
          <div class="thumbnail">
              <div class="mail-file-img">
                   <a href="#" data-target="#default-modal" data-toggle="modal">
                      <input type="hidden" name="imgColor[]" value="productos/default.png">
                      <img src="/storage/productos/default.png">
                   </a>
              </div>
              <div class="caption text-center">
                  <div class="flex">
                      <input id="" name="color[]" type="text" placeholder="Color" class="form-control inline input-sm color" style="margin-bottom: 5px;">
                      <input id="" name="codigo[]" type="color" placeholder="Codigo" class="form-control inline input-sm codigo">
                      <input type="hidden" name="ope[]" value="insert">
                      <input type="hidden" name="idColor[]" value="0">
                  </div>
                  <a href="#" class="btn btn-sm btn-default delete-color" data-color-id="0">
                      <i class="demo-pli-recycling icon-lg icon-fw" id="image-delete"></i>
                  </a>
              </div>
          </div>
      </li>`
      ul.prepend(li)
   })

   $('body').on('click', '.delete-color', function (e) {
      e.preventDefault()
      var a = $(e.currentTarget)
      var id = a.attr('data-color-id')
      if (id != 0) {
         $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url      : `/colores/${id}`,
            type     : 'DELETE',
            success  : function ( response ) {
               console.log(response)
            }
         })
      }
      a.parent().parent().parent().remove()
   })

   $("#chosen-select").on('change', function () {
      var select = $(this)
      var select2 = $('#chosen-select2')
      $.ajax({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url      : `/subcategorias/${select.val()}`,
         type     : 'GET',
         success  : function ( response ) {
            console.log(response)
            var html = ""
            for (sub of response) {
               html += `<option value="${sub.id}">${sub.nombre}</option>`
            }
            select2.html(html)
         }
      })
   })
})
