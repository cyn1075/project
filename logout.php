<?php
session_start();
session_destroy();
?>
<script>
    alert("로그아웃 됐습니다.");
    location.replace('main.php');
</script>

