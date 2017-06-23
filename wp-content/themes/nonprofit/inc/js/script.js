jQuery(document).ready(function($) {
	
	$('.post-type-post #video_type').change(function () {
         var optionSelected = $(this).find("option:selected");
         var valueSelected  = optionSelected.val();
         if(valueSelected == 'youtube'){
         	$('#nonprofit_vimeo_id').parent().hide();
         	$('#nonprofit_video_webm').parent().hide();
         	$('#nonprofit_video_mp4').parent().hide();
         	$('#nonprofit_video_ogv').parent().hide();
         	$('#nonprofit_youtube_link').parent().show();
         }else if(valueSelected == 'vimeo') {
         	$('#nonprofit_youtube_link').parent().hide();
         	$('#nonprofit_video_webm').parent().hide();
         	$('#nonprofit_video_mp4').parent().hide();
         	$('#nonprofit_video_ogv').parent().hide();
         	$('#nonprofit_vimeo_id').parent().show();
         }else {
         	$('#nonprofit_vimeo_id').parent().hide();
         	$('#nonprofit_video_webm').parent().show();
         	$('#nonprofit_video_mp4').parent().show();
         	$('#nonprofit_video_ogv').parent().show();
         	$('#nonprofit_youtube_link').parent().hide();
         }
         
        });
        var optionSelected = $('.post-type-post #video_type').find("option:selected");
        var valueSelected  = optionSelected.val();
        if(valueSelected == 'youtube'){
         	$('#nonprofit_vimeo_id').parent().hide();
         	$('#nonprofit_video_webm').parent().hide();
         	$('#nonprofit_video_mp4').parent().hide();
         	$('#nonprofit_video_ogv').parent().hide();
         	$('#nonprofit_youtube_link').parent().show();
         }else if(valueSelected == 'vimeo') {
         	$('#nonprofit_youtube_link').parent().hide();
         	$('#nonprofit_video_webm').parent().hide();
         	$('#nonprofit_video_mp4').parent().hide();
         	$('#nonprofit_video_ogv').parent().hide();
         	$('#nonprofit_vimeo_id').parent().show();
         }else {
         	$('#nonprofit_vimeo_id').parent().hide();
         	$('#nonprofit_video_webm').parent().show();
         	$('#nonprofit_video_mp4').parent().show();
         	$('#nonprofit_video_ogv').parent().show();
         	$('#nonprofit_youtube_link').parent().hide();
         }
         
         $('.post-type-post #post-formats-select .post-format').change(function () {
         var postformavalueSelected  = $(this).val();
         if(postformavalueSelected != 'gallery'){
         	$('#nonprofit_meta_box_multiple_image').hide();
         }else{
         	$('#nonprofit_meta_box_multiple_image').show();
         }
         if(postformavalueSelected != 'video'){
         	$('#my-custom-fields').hide();
         }else{
         	$('#my-custom-fields').show();
         }
          if(postformavalueSelected != 'audio'){
         	$('#my-custom-fields-audio').hide();
         }else{
         	$('#my-custom-fields-audio').show();
         }
         });

         $('.post-type-portfolio #post-formats-select .post-format').change(function () {
         var postformavalueSelected  = $(this).val();
         if(postformavalueSelected != 'gallery'){
          $('#nonprofit_meta_box_multiple_image').hide();
         }else{
          $('#nonprofit_meta_box_multiple_image').show();
         }
         if(postformavalueSelected != 'video'){
          $('#custom-fields-video').hide();
         }else{
          $('#custom-fields-video').show();
         }
          if(postformavalueSelected != 'audio'){
          $('#custom-fields-audio').hide();
         }else{
          $('#custom-fields-audio').show();
         }
         });

         $(".post-type-post #post-formats-select input[type='radio']:checked").each(function(){
         	//var optionSelected = $(this).find("checked");
         	var postformavalueSelected  = $(this).val();
         	
         	//alert(postformavalueSelected);
         if(postformavalueSelected != 'gallery'){
         	$('#nonprofit_meta_box_multiple_image').hide();
         }else{
         	$('#nonprofit_meta_box_multiple_image').show();
         }
         if(postformavalueSelected != 'video'){
         	$('#my-custom-fields').hide();
         }else{
         	$('#my-custom-fields').show();
         }
         if(postformavalueSelected != 'audio'){
         	$('#my-custom-fields-audio').hide();
         }else{
         	$('#my-custom-fields-audio').show();
         }
         });



         $(".post-type-portfolio #post-formats-select input[type='radio']:checked").each(function(){
          //var optionSelected = $(this).find("checked");
          var postformavalueSelected  = $(this).val();
          //alert(postformavalueSelected);
         if(postformavalueSelected != 'gallery'){
          $('#nonprofit_meta_box_multiple_image').hide();
         }else{
          $('#nonprofit_meta_box_multiple_image').show();
         }
         if(postformavalueSelected != 'video'){
          $('#custom-fields-video').hide();
         }else{
          $('#custom-fields-video').show();
         }
         if(postformavalueSelected != 'audio'){
          $('#custom-fields-audio').hide();
         }else{
          $('#custom-fields-audio').show();
         }
         });
        
         
         
  var $upload_button = jQuery('.wd-gallery-upload');







        var nonprofit_font_family  = "";
        var nonprofit_font_weight  = "";
        var nonprofit_font_subsets = "";


        $("#tabs-2 select.font_familly").change(function() {
          nonprofit_font_family  = $(this).find(":selected").val();

          $("#wd-google-fonts-css").attr("href", "http://fonts.googleapis.com/css?family=" + nonprofit_font_family + ":" + nonprofit_font_weight + "&subset=" + nonprofit_font_subsets);
          $(this).closest("tbody").find("p").css("font-family",nonprofit_font_family);
          $(this).closest("tbody").find("h2").css("font-family",nonprofit_font_family);
          $(this).closest("tbody").find("ul li").css("font-family",nonprofit_font_family);
        });

        $("#tabs-2 select.font_weight").change(function() {
          nonprofit_font_family  = $(this).find(":selected").val();

          $(this).closest("tbody").find("p").css("font-weight",nonprofit_font_family);
          $(this).closest("tbody").find("h2").css("font-weight",nonprofit_font_family);
          $(this).closest("tbody").find("ul li").css("font-weight",nonprofit_font_family);
        });


        $("#tabs-2 select.text_transform").change(function() {
          nonprofit_font_family  = $(this).find(":selected").val();

          $(this).closest("tbody").find("p").css("text-transform",nonprofit_font_family);
          $(this).closest("tbody").find("h2").css("text-transform",nonprofit_font_family);
          $(this).closest("tbody").find("ul li").css("text-transform",nonprofit_font_family);
        });

        $("#tabs-2 select.text_size").change(function() {
          nonprofit_font_family  = $(this).find(":selected").val();
          $(this).closest("tbody").find("p").css("font-size",nonprofit_font_family + 'px');
          $(this).closest("tbody").find("h2").css("font-size",nonprofit_font_family + 'px');
          $(this).closest("tbody").find("ul li").css("font-size",nonprofit_font_family + 'px');
        });

        $("#tabs-2 select.font_subsets").change(function() {
          nonprofit_font_family  = $(this).find(":selected").val();
          $("#wd-google-fonts-css").attr("href", "http://fonts.googleapis.com/css?family=" + nonprofit_font_family + ":" + nonprofit_font_weight + "&subset=" + nonprofit_font_subsets);
        });







  if (wp.media !== undefined) {
    wp.media.customlibEditGallery = {

      frame : function() {

        if (this._frame)
          return this._frame;

        var selection = this.select();

        this._frame = wp.media({
          id : 'nonprofit_portfolio-image-gallery',
          frame : 'post',
          state : 'gallery-edit',
          title : wp.media.view.l10n.editGalleryTitle,
          editing : true,
          multiple : true,
          selection : selection
        });

        this._frame.on('update', function() {

          var controller = wp.media.customlibEditGallery._frame.states.get('gallery-edit');
          var library = controller.get('library');
          // Need to get all the attachment ids for gallery
          var ids = library.pluck('id');

          $input_gallery_items.val(ids);

          jQuery.ajax({
            type : "post",
            url : ajaxurl,
            data : "action=nonprofit_gallery_upload_get_images&ids=" + ids,
            success : function(data) {

              $thumbs_wrap.empty().html(data);

            }
          });

        });

        return this._frame;
      },

      init : function() {

        $upload_button.click(function(event) {

          $thumbs_wrap = $(this).next();
          $input_gallery_items = $thumbs_wrap.next();

          event.preventDefault();
          wp.media.customlibEditGallery.frame().open();

        });
      },

      // Gets initial gallery-edit images. Function modified from wp.media.gallery.edit
      // in wp-includes/js/media-editor.js.source.html
      select : function() {

        var shortcode = wp.shortcode.next('gallery', '[gallery ids="' + $input_gallery_items.val() + '"]'), defaultPostId = wp.media.gallery.defaults.id, attachments, selection;

        // Bail if we didn't match the shortcode or all of the content.
        if (!shortcode)
          return;

        // Ignore the rest of the match object.
        shortcode = shortcode.shortcode;

        if (_.isUndefined(shortcode.get('id')) && !_.isUndefined(defaultPostId))
          shortcode.set('id', defaultPostId);

        attachments = wp.media.gallery.attachments(shortcode);
        selection = new wp.media.model.Selection(attachments.models, {
          props : attachments.props.toJSON(),
          multiple : true
        });

        selection.gallery = attachments.gallery;

        // Fetch the query's attachments, and then break ties from the
        // query to allow for sorting.
        selection.more().done(function() {
          // Break ties with the query.
          selection.props.set({
            query : false
          });
          selection.unmirror();
          selection.props.unset('orderby');
        });

        return selection;

      },
    };
  }


  if (wp.media !== undefined) {
    $(wp.media.customlibEditGallery.init);
  }


  /*--------------------------------------*/
  var curent_sreen = '';
  function nonprofit_add_ckeckbox_class() {
    curent_sreen = $("input:radio[name='nonprofit_start_screan']:checked").val();
    $("input[name='nonprofit_start_screan']").parent().removeClass('selected');

    $("input[value='" + curent_sreen + "'][name='nonprofit_start_screan']").parent().addClass('selected');
  }


$("#tabs").tabs(); //initialize tabs
$(function() {
    $("#tabs").tabs({
        activate: function(event, ui) {
            var scrollTop = $(window).scrollTop(); // save current scroll position
            window.location.hash = ui.newPanel.attr('id'); // add hash to url
            $(window).scrollTop(scrollTop); // keep scroll at current position
    }
});
});
  // reload the form when the checkbox is changed
  nonprofit_add_ckeckbox_class();
  $('.nonprofit_start_screan').click(function(e) {
    if (curent_sreen != $(this).val()) {
      nonprofit_add_ckeckbox_class();
      $(this).closest('form').submit();
    }
  });

  if ( typeof wp.media !== 'undefined') {

    var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;

    $('.uploader .button').click(function(e) {
      var send_attachment_bkp = wp.media.editor.send.attachment;
      var button = $(this);
      var id = button.attr('id').replace('_button', '');
      _custom_media = true;
      wp.media.editor.send.attachment = function(props, attachment) {
        if (_custom_media) {
          $("#" + id).val(attachment.url);
        } else {
          return _orig_send_attachment.apply(this, [props, attachment]);
        };
      };

      wp.media.editor.open(button);
      return false;
    });

    $('.add_media').on('click', function() {
      _custom_media = false;
    });

  }
  
    $('.logo_position').on('change', 'input[name=nonprofit_logo_position]:radio', function (e) {
	    var input_value = $(this).attr('id');	   
	    $('.logo_position label').removeClass( "label_selected" );
	    $("." + input_value).addClass( "label_selected" );
	});
	 $('.import-demo-screenshot').on('change', 'input[name=nonprofit_footer_columns]:radio', function (e) {
	    var input_value = $(this).attr('id');
	    $('.nonprofit_footer_columns label').removeClass( "label_selected" );
	    $("." + input_value).addClass( "label_selected" );
	});

   $('.import-demo-screenshot').on('change', 'input[name=demo_screenshot]:radio', function (e) {
      var input_value = $(this).attr('id');
      if (input_value != "demo-8" && input_value != "demo-9") {
        $('.import-demo-screenshot label').removeClass( "label_selected" );
        $("." + input_value).addClass( "label_selected" );
      }
  });
//---------page setting-----------
$(function(){
          $('#nonprofit_page_title_area_style').change(function(){
            var selected = $(this).find(':selected').text();
            //alert(selected);
            if(selected == 'Standard Style') {
            $(".nonprofit_show_hide.float_left").hide();
            }else{
            	$(".nonprofit_show_hide.float_left").show();
            }
             //$('#' + selected).show();
          }).change()
});

});
