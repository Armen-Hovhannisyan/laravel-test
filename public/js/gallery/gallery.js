let modalId = $('#image-gallery');

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image_upload_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    loadGallery(true, 'a.thumbnail');

    function loadGallery(setIDs, setClickAttr) {
        let current_image,
            selector,
            counter = 0;
        function updateGallery(selector) {
            let $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-title')
                .text($sel.data('title'));
            $('#image-gallery-image')
                .attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }
        if (setIDs == true) {
            $('[data-image-id]')
                .each(function () {
                    counter++;
                    $(this)
                        .attr('data-image-id', counter);
                });
        }
        $(setClickAttr).on('click', function () {
            updateGallery($(this));
        });
    }

    $('#form-edit-post').submit(function (e) {
        e.preventDefault();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/gallery/add_img",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    $('#image_upload_preview').attr('src', 'http://placehold.it/100x100');
                    var gallery = response.gallery
                    console.log(gallery)
                    $("#img_block_js").append("<div class=\"col-lg-3 col-md-4 col-xs-6 thumb\">\n" +
                        "                        <a class=\"thumbnail\" href=\"#\" data-image-id='"+gallery.id+"' data-toggle=\"modal\" data-title=\"\"\n" +
                        "                           data-image=\"images/"+gallery.image+"\"\n" +
                        "                           data-target=\"#image-gallery\">\n" +
                        "                            <img class=\"img-thumbnail\" height=\"250\" width=\"200\"\n" +
                        "                                 src=\"/images/"+gallery.image+"\"\n" +
                        "                                 alt=\"Another alt text\">\n" +
                        "                        </a>\n" +
                        "                    </div>");
                    loadGallery(true, 'a.thumbnail');

                } else {
                    alert(response.message)
                }
            }
        });
    });
    $("#inputFile").change(function () {
        readURL(this);
    });
});



