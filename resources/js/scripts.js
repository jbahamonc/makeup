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
         }
      })
   })

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
                      <input type="hidden" name="imgColor[]">
                      <img src="/image/default.png">
                   </a>
              </div>
              <div class="caption text-center">
                  <div class="flex">
                      <input id="" name="color[]" type="text" placeholder="Color" class="form-control inline input-sm color" style="margin-bottom: 5px;">
                      <input id="" name="codigo[]" type="color" placeholder="Codigo" class="form-control inline input-sm codigo">
                  </div>
                  <a href="#" class="btn btn-sm btn-default">
                      <i class="demo-pli-recycling icon-lg icon-fw" id="image-delete"></i>
                  </a>
              </div>
          </div>
      </li>`
      ul.prepend(li)
   })
})
