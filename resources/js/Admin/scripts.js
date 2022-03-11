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
                if (typeof files[0] !== "undefined") {
                    const formData = new FormData();
                    formData.append('image', files[0]);
                    let csrf = document.querySelector('input[name="_token"]').value;
                    console.log(csrf);
                    formData.append('_token', csrf);
                    formData.append('csrf', csrf);

                    console.log(formData);

                    axios.post('/api/admin/articles/images/store', formData)
                        .then(result => {
                            console.log(result);
                        })
                        .catch(err => {
                            console.log(err);
                        });


                    console.log(files);
                    // upload image to server and create imgNode...
                    var imgNode = document.createElement('img');
                    imgNode.src = 'https://upload.wikimedia.org/wikipedia/commons/3/3c/IMG_logo_%282017%29.svg';
                    console.log(imgNode);
                    $('#summernote').summernote('insertNode', imgNode);
                }
            }
        }
    });
};

