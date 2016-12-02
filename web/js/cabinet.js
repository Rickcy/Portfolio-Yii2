$(document).ready(function () {





});

function deleteImage($id) {
    console.log('go');
    var $divImage = $('.image'+$id);
    $.ajax({
        url: 'image?id='+$id,
        type: "POST",
        success: function () {
            $divImage.remove()
        }
    });
}
function deleteImages($id,$basename) {
        console.log($id);
         console.log($basename);

    var $imageName = $('#image'+$basename);
   
    $.ajax({
        url: 'images?id='+$id+'&basename='+$basename,
        type: "POST",
        success: function () {
            $imageName.remove();
            console.log('файл удален')
        },
        error: function () {
            console.log('файл не удален');
        }
    });
}