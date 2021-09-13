<?php




session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: beranda.php");
exit;


// <IfModule mod_rewrite.c>
// RewriteEngine On
// RewriteCond %{REQUEST_FILENAME} !-d
// RewriteCond %{REQUEST_FILENAME}.php -f
// RewriteRule ^(.*)$ $1.php
// </IfModule>