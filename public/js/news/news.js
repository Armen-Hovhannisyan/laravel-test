$(document).ready(function () {
    $('.remove').click(function () {
        let id = $(this).attr('data-id')
        var parent=$(this).parents('.news-block-js')
        console.log(parent)

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/news/delete",
            type: "POST",
            data: {'id': id},
            success: function (response) {
                if (response.success) {
                    parent.remove()
                } else {
                    alert(response.message)
                }
            }
        });
    })

})