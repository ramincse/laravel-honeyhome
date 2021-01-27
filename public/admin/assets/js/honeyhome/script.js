(function($){
    $(document).ready(function(){
        /**
         * CK EDITOR
         */
        CKEDITOR.replace('post_editor');
        //CKEDITOR.replace('post_editor_edit');

        /**
         * Add Datatable
         */
        $('table#data-table').DataTable();

        /**
         * Logout
         */
       $(document).on('click', '#logout-button', function(e){
           e.preventDefault();
            $('form#logout-form').submit();
       });

        /**
         * Image Load
         */
        $(document).on('change', '#fimage', function (e){
            e.preventDefault();
            let file_url = URL.createObjectURL( e.target.files[0] );
            $('img.fimage_load').attr('src', file_url);
        });

        $(document).on('change', '#new_fimage', function (e){
            e.preventDefault();
            let file_url = URL.createObjectURL( e.target.files[0] );
            $('img.fimage_load_edit').attr('src', file_url);
        });

        /**
         * Category Edit
         */
        $(document).on('click', '#category_edit', function(e){
            e.preventDefault();
            let edit_id = $(this).attr('edit_id');

            $.ajax({
               url : 'category-edit/' + edit_id,
                dataType : "json",
               success : function (data){
                   $('#category_modal_update form input[name="name"]').val(data.name);
                   $('#category_modal_update form input[name="id"]').val(data.id);
               }
            });
        });

        /**
         * Tag Edit
         */
        $(document).on('click', '#tag_edit', function(e){
            e.preventDefault();
            let edit_id = $(this).attr('edit_id');

            $.ajax({
                url : 'tag-edit/' + edit_id,
                dataType : "json",
                success : function (data){
                    $('#tag_modal_update form input[name="name"]').val(data.name);
                    $('#tag_modal_update form input[name="id"]').val(data.id);
                }
            });
        });



        /**
         * Post Update or Edit
         */
        $(document).on('click', '#post_edit', function(e){
            e.preventDefault();
            $('#post_modal_update').modal('show');
            let edit_id = $(this).attr('edit_id');
            $.ajax({
                url : 'post/edit/' + edit_id,
                success : function(data){
                    $('#post_modal_update form input[name="id"]').val(data.id);
                    $('#post_modal_update form input[name="title"]').val(data.title);
                    $('#post_modal_update form textarea[name="content"]').text(data.content);
                    $('#post_modal_update img.fimage_load_edit').attr('src', 'media/posts/' + data.image);
                    $('#post_modal_update div.cl').html(data.cat_list);
                }
            });
        });

        /**
         * HoneyHome Slider
         */
        $(document).on('click', '#hh_slide', function (e){
            e.preventDefault();
            let rand = Math.floor(Math.random() * 10000);

            $('.hh-slider-container').append('<div id="slider-card-'+rand+'" class="card">\n' +
                '                                                <div data-toggle="collapse" data-target="#slide-'+rand+'" style="cursor: pointer;" class="card-header"><h4>#Slide-'+rand+'<button id="hh_remove_btn" remove_id="'+rand+'" class="close">&times;</button></h4></div>\n' +
                '                                                <div id="slide-'+rand+'" class="collapse">\n' +
                '                                                    <div class="card-body">\n' +
                '                                                            <div class="form-group row">\n' +
                '                                                                <label class="col-lg-3 col-form-label">Title</label>\n' +
                '                                                                <div class="col-lg-9">\n' +
                '                                                                    <input name="slide_code[]" value="'+rand+'" class="form-control" type="hidden">\n' +
                '                                                                    <input name="title[]" class="form-control" type="text">\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group row">\n' +
                '                                                                <label class="col-lg-3 col-form-label">Sub Title</label>\n' +
                '                                                                <div class="col-lg-9">\n' +
                '                                                                    <textarea name="sub_title[]" class="form-control"></textarea>\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group row">\n' +
                '                                                                <label class="col-lg-3 col-form-label">Button Text</label>\n' +
                '                                                                <div class="col-lg-9">\n' +
                '                                                                    <input name="btn_text[]" class="form-control" type="text">\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group row">\n' +
                '                                                                <label class="col-lg-3 col-form-label">Button Link</label>\n' +
                '                                                                <div class="col-lg-9">\n' +
                '                                                                    <input name="btn_link[]" class="form-control" type="text">\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group row">\n' +
                '                                                                <label class="col-lg-3 col-form-label">Photo</label>\n' +
                '                                                                <div class="col-lg-9">\n' +
                '                                                                    <input name="photo[]" class="form-control" type="file">\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="form-group row">\n' +
                '                                                                <label class="col-lg-3 col-form-label">BG Photo</label>\n' +
                '                                                                <div class="col-lg-9">\n' +
                '                                                                    <input name="bg_img[]" class="form-control" type="file">\n' +
                '                                                                </div>\n' +
                '                                                            </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>');

        });

        /**
         * Slide Remove
         */
        $(document).on('click', '#hh_remove_btn', function(e){
            e.preventDefault();
            let remove_id = $(this).attr('remove_id');
            $('#slider-card-'+remove_id).remove();
        });


    });
})(jQuery)
