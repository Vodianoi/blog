<footer> NOTRE SUPER FOOTER
<?php
date_default_timezone_set('Europe/Paris');
$now = new DateTime('now');
echo $now->format('yD, d M Y H:i:s');
?>
</footer>
</body>
</html>