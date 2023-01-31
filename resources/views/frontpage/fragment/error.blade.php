<div class="popup-container" id="alert">
  
  <div class="error-alert alert alert-dismissible">
  <button class="close" onclick="btn_close()" data-dismiss="alert" aria-label="close">
        <i class="fa fa-times"></i></button>
        <div class="alert-icon">
        <i class="fa fa-exclamation-circle icon"></i>
        </div>
        <div class="alert-msg">
        <strong>Oops!</strong> {!! session()->get('error') !!}
        </div>
  </div>
</div>
<script>
    function btn_close() {
        document.getElementById("alert").style.display = "none";
    }
</script>