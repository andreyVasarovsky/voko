window.onload = function () {
    $('#summernote').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture']]
        ]
    });
    // $('input[id="visit_date"]').daterangepicker({
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     timePicker: true,
    //     minYear: 1901,
    //     maxYear: parseInt(moment().format('YYYY'), 10),
    //     locale: {
    //         format: 'YYYY-MM-DD hh:mm'
    //     }
    // });
};

