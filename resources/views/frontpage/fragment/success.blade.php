<div class="popup-container" id="alert">
  
  <div class="success-alert alert alert-dismissible">
  <button class="close" onclick="btn_close()" data-dismiss="alert" aria-label="close">
        <i class="fa fa-times"></i></button>
        <div class="alert-icon">
        <i class="fa fa-check-circle-o icon"></i>
        </div>
        <div class="alert-msg">
        <strong>Congrats!</strong> {!! session()->get('success') !!}
        </div>
  </div>
</div>
<script>
    function btn_close() {
        document.getElementById("alert").style.display = "none";
    }
</script>