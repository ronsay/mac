var toDelete;
var listToDelete = [];

function displaySaved(){
    $("#saved").show();
    setTimeout(function () {
        $("#saved").css("background-image", 'url("'+urlPath+'/img/admin/saved.gif?key='+Date.now()+'")'); 
        $("#saved").hide();
    }, 3000);
}

function swapPhotos(photo1,photo2){
    if(photo1.length > 0 && photo2.length > 0){
        var tmp = photo1.find('h3').text();
        photo1.find('h3').text(photo2.find('h3').text());
        photo2.find('h3').text(tmp);
        photo1.after(photo2);
    }
}

function saveGallery(){
    $("#loader").show();
    var listToUpdate = [];
    
    $("tr").each(function() {
        listToUpdate.push(buildGallery($(this)));
    });
    
    $.ajax({
        method: "DELETE",
        url: urlPath+'/admin/'+galId+'/photos',
        data: { 
            "_token": token,
            "ids": JSON.stringify(listToDelete) 
        }
    }).done(function() {
        $.ajax({
        method: "PUT",
        url: urlPath+'/admin/'+galId,
        data: { 
            "_token": token,
            "photos": listToUpdate 
        }
        }).done(function() {
            $("#loader").hide();
            displaySaved();
        });
    });
}

function buildGallery(elem){
    return {
        "id": elem.find('.photo-id').first().val(),
        "title": elem.find('.photo-title').first().val(),
        "localization": elem.find('.photo-localization').first().val()
    };
}

$(document).ready(function(){
    $(".list-group-item").on("click", function() {
        location.href = $(this).find('a').attr('href');
    });
    
    $("#save-gallery").on("click", function() {       
        saveGallery();
    });
    
    $('body').on("click", ".up", function() {
        swapPhotos($(this).closest('tr'), $(this).closest('tr').prev('tr'));
    });
    
    $('body').on("click", ".down", function() {
        swapPhotos($(this).closest('tr').next('tr'), $(this).closest('tr'));
    });
    
    $('body').on("click", ".remove", function() {
        toDelete = $('table tr').index($(this).closest('tr'));
    });
    
    $("#confirm-del").on("click", function() {
        $('table').find('tr').eq(toDelete).fadeOut("slow", function(){
            if($(this).find('.photo-id').first().attr('value') != ''){
                listToDelete.push($(this).find('.photo-id').first().attr('value'));
            }
            $(this).remove();
            
            var i=1;
            $('table').find('tr').each(function(){
                $(this).find('h3').text(i);
                i++;
            });
        });
    });
});

