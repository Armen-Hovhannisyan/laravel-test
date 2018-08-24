$(document).ready(function () {

    $('#saveText').click(function () {
        let text = $('#homeleInputText').val()
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/edit/text",
            type: "POST",
            data: {'text': text},
            success: function (response) {
                if (response.success) {
                    $('#text').text(text)
                } else {
                    alert(response.message)
                }
            }
        });
    })

})