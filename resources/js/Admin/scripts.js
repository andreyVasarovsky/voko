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
        ],
        callbacks: {
            onImageUpload: function (files) {
                $('#img-upload-error').addClass('d-none');
                if (typeof files[0] !== "undefined") {
                    const formData = new FormData();
                    formData.append('image', files[0]);
                    axios.post('/api/admin/articles/images/store', formData)
                        .then(response => {
                            if (response.data.status){
                                let imgNode = document.createElement('img');
                                imgNode.src = response.data.link;
                                $('#summernote').summernote('insertNode', imgNode);
                            }else{
                                $('#img-upload-error').removeClass('d-none');
                            }
                        })
                        .catch(err => {
                            $('#img-upload-error').removeClass('d-none');
                        });
                }
            }
        }
    });
};

