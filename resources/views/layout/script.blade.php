  <!-- JAVASCRIPT -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('libs/jquery-ui/jquery-ui.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
  
  
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
  <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
  <script src="{{asset('libs/node-waves/waves.min.js')}}"></script>
  <script src="{{asset('libs/feather-icons/feather.min.js')}}"></script>
  <!-- pace js -->
  <script src="{{asset('libs/pace-js/pace.min.js')}}"></script>
  <script src="{{asset('js/app.js?v=1.1')}}"></script>
  <script src="{{asset('js/dhScript.js?v=1.1')}}"></script>
  
  
  <script src="{{asset('libs/select2_4.1/select2.min.js?v=1.1')}}"></script>
 
  <script type="text/javascript">
      initializeSelect2();
      function initializeSelect2(destroy = false){
        /* if(destroy){
  
              $("form-select").each(function(index){
                    $(this).select2('destroy');
                    $(this).removeAttr('data-live-search').removeAttr('data-select2-id').removeAttr('aria-hidden').removeAttr('tabindex');
                    $(this).find("option").removeAttr('data-select2-id');
                  });
  
  
                // if ($('.form-select').hasClass('select2-hidden-accessible')) {
                //     $('.form-select').select2('destroy');
                // }
            }else{
  
              $('.form-select').each(function(){
                      var placeholder = $(this).find("option:first-child").text() || 'Choose Option';
                      $(this).select2({
                        placeholder:placeholder
                      });
              });
            } */
      }
  
      // $(document).on('select2:open', () => {
      //     document.querySelector('.select2-search__field').focus();
      // });
  </script>
  <script>
    @if (session('success'))
$.notify("{{ session('success')}}", "success");

@endif
</script>