<?php

require 'Usuarios.php';
$usuarios=[];
// Manejar petición GET
$usuarios =Usuarios::getAll();
