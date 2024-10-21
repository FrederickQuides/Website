<script>
    $(document).ready(function() {
    $("#confirmLogout").on("click", function(e) {
        if (!confirm("Are you sure you want to logout? Any unsaved data will be lost.")) {
            e.preventDefault();
        }
    });
});
</script>
<?php
session_start();
session_destroy();
header("Location:index.php");
?>
