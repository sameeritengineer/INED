<!-- <footer class="footer footer-static footer-dark navbar-border">
  <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
    <span class="float-md-left d-xs-block d-md-inline-block text-center">
      Copyright &copy; {{date('Y')}} <a href="{{url()->current()}}" class="text-bold-800 grey darken-2">PIXINVENT</a>, All rightsreserved.
    </span>
  </p>
</footer> -->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"type="text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"type="text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
<!--<script src="{{asset('admin/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>-->
<script src="{{asset('admin/app-assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{asset('admin/app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"type="text/javascript"></script>
<script src="{{asset('admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"type="text/javascript"></script>
<script src="{{asset('admin/app-assets/js/scripts/extensions/toastr.min.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('admin/app-assets/js/scripts/forms/switch.min.js')}}" type="text/javascript"></script> -->
<script src="{{asset('admin/app-assets/js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>
<!-- google latlong-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2MZzFI6Z32E52Sj4fQYcAVHWmc4--g30&libraries=places&sensor=false&amp;"></script>
<script src="{{asset('admin/js/jquery.geocomplete.js')}}" type="text/javascript" ></script>


<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
<script type="text/javascript">
$(function(){
    $('.editor').each(function(e){
        //CKEDITOR.replace( this.id, { customConfig: '/jblog/ckeditor/config_Large.js' });
        CKEDITOR.replace(this.id, {
      extraPlugins: 'easyimage',
      removePlugins: 'image',
      removeDialogTabs: 'link:advanced',
      cloudServices_uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/',
      // Note: this is a token endpoint to be used for CKEditor 4 samples only. Images uploaded using this token may be deleted automatically at any moment.
      // To create your own token URL please visit https://ckeditor.com/ckeditor-cloud-services/.
      cloudServices_tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',
      easyimage_styles: {
        gradient1: {
          group: 'easyimage-gradients',
          attributes: {
            'class': 'easyimage-gradient-1'
          },
          label: 'Blue Gradient',
          icon: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/gradient1.png',
          iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/hidpi/gradient1.png'
        },
        gradient2: {
          group: 'easyimage-gradients',
          attributes: {
            'class': 'easyimage-gradient-2'
          },
          label: 'Pink Gradient',
          icon: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/gradient2.png',
          iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/hidpi/gradient2.png'
        },
        noGradient: {
          group: 'easyimage-gradients',
          attributes: {
            'class': 'easyimage-no-gradient'
          },
          label: 'No Gradient',
          icon: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/nogradient.png',
          iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/easyimage/icons/hidpi/nogradient.png'
        }
      },
      easyimage_toolbar: [
        'EasyImageFull',
        'EasyImageSide',
        'EasyImageGradient1',
        'EasyImageGradient2',
        'EasyImageNoGradient',
        'EasyImageAlt'
      ]
    });
    });
});
</script>
<!-- END PAGE LEVEL JS-->
<!-- <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>
// CKEDITOR.editorConfig = function( config ) {
//   config.toolbar = [
//     { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
//     { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
//     { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
//     { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
//     '/',
//     { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
//     { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
//     { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
//     { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
//     '/',
//     { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
//     { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
//     { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
//     { name: 'about', items: [ 'About' ] }
//   ];
// };

$('textarea').ckeditor();
  
</script>
 --></body>
</html>