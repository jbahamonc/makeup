
// Form-File-Upload.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -


$(document).on('nifty.ready', function() {

    // DROPZONE.JS
    // =================================================================
    // Require Dropzone
    // http://www.dropzonejs.com/
    // =================================================================
    Dropzone.options.demoDropzone = { // The camelized version of the ID of the form element
        // The configuration we've talked about above
        autoProcessQueue: false,
        init: function() {
        var myDropzone = this;
        //  Here's the change from enyo's tutorial...
        //  $("#submit-all").click(function (e) {
        //  e.preventDefault();
        //  e.stopPropagation();
        //  myDropzone.processQueue();
            //
        //}
        //    );
        }
    }
    // DROPZONE.JS WITH BOOTSTRAP'S THEME
    // =================================================================
    // Require Dropzone
    // http://www.dropzonejs.com/
    // =================================================================
    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#dz-template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
    var indexImg = 0
    var btnsDelete
    var uplodaBtn = $('#dz-upload-btn');
    var removeBtn = $('#dz-remove-btn');
    var codProducto = document.getElementById('codPro').value
    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/uploads", // Set the url
        thumbnailWidth: 50,
        thumbnailHeight: 50,
        parallelUploads: 10,
        uploadMultiple : false,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#dz-previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    });


    myDropzone.on("addedfile", function(file) {
        // Hookup the button
        uplodaBtn.prop('disabled', false);
        removeBtn.prop('disabled', false);
    });

    myDropzone.on("uploadprogress", function(file, progress, bytesSent) {
          //console.log(progress)
          var thisElement = $(file.previewElement)
		      // Get the current file box progress bar, set its inner span's width accordingly.
		      thisElement.find('.progress-bar').width(progress + '%');
    });

    myDropzone.on("sending", function(file, xhr, formData) {
        formData.append('codigo', codProducto)
        var thisElement = $(file.previewElement);
        // Show the total progress bar when upload starts
        thisElement.find('.dz-total-progress')[0].style.opacity = "1"
    });

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        $("#dz-previews .dz-total-progress").css('opacity',0)
    });

    myDropzone.on("removedfile", function(file) {
        var imgId = $(file.previewElement).find('button').attr('data-img-id')
        // console.log(imgId)
        if (imgId != undefined) {
          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url      : `/imagenes/${imgId}`,
            type     : 'DELETE',
            success  : function ( response ) {
              // console.log(response)
            }
          })
        }
    });

    myDropzone.on("success", function(file, response) {
      //console.log(response)
      var button =   $(file.previewElement).find('button')
      button.attr('data-img-id', response.id)
    });

    // Setup the buttons for all transfers
    uplodaBtn.on('click', function() {
        //Upload all file
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    });

    removeBtn.on('click', function() {
        myDropzone.removeAllFiles(true);
        uplodaBtn.prop('disabled', true);
        removeBtn.prop('disabled', true);
    });



});
