<div class="popup-container" id="alert">
  
  <div class="warning-alert alert alert-dismissible">
  <button class="close" onclick="btn_close()" data-dismiss="alert" aria-label="close">
        <i class="fa fa-times"></i></button>
        <div class="alert-icon">
        <i class="fa fa-exclamation-circle icon"></i>
        </div>
        <div class="alert-msg">
        <strong>Warning!</strong> {!! session()->get('alert') !!}
        </div>
  </div>
</div>
<script>
    function btn_close() {
        document.getElementById("alert").style.display = "none";
    }
</script>