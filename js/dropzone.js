$(document).ready(function(){
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    var myDropzone = new Dropzone("#new-photo-dropzone", {
        url: urlPath + '/admin/' + galId,
        method: 'POST',
        maxFiles: 1,
        acceptedFiles: "image/*",
        thumbnailWidth: 1260,
        thumbnailHeight: 710,
        previewTemplate: previewTemplate,
        autoProcessQueue: false,
        previewsContainer: "#previews",
        clickable: "#dz-actions",
        init: function() {
            this.on("maxfilesexceeded", function(file) {
                  this.removeAllFiles();
                  this.addFile(file);
            });
        },
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    myDropzone.on("addedfile", function() {
        $("#dz-actions").addClass("d-none");
    });

    myDropzone.on("removedfile", function() {
        $("#dz-error").addClass("d-none");
        $("#dz-actions").removeClass("d-none");
    });
    
    myDropzone.on("success", function(file,response) {
        $(".table tbody").append(response);
        $(".gal-element").last().find('h3').text($(".gal-element").length);
        $("#new-photo").modal('hide');
        $("#loader").hide();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    
    myDropzone.on("error", function() {
        $("#loader").hide();
        $("#dz-error").removeClass("d-none");
    });
    
    $("#confirm-add").on("click", function() {
        $("#loader").show();
        myDropzone.processQueue();
    });
    
    $("#new-photo").on('hidden.bs.modal', function() {
        myDropzone.removeAllFiles();
    });
});