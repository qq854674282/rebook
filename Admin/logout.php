<?php
setcookie('admin_id','',time()-1);
setcookie('admin_type','',time()-1);
echo "<script>location.href='sign_in.php';</script>";
?>