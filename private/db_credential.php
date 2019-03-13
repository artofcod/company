<?php

// Keep database file in seperate file
//1.Easy to exclude that file from sourcecode menager.
//2.Unique credentials on development and production server.
//3.Unique credentials for working with multiple developres.

 define('DB_SERVER','localhost');
 define('DB_USER','webuser');
 define('DB_PASSWORD','demoPassword');
 define('DB_NAME','aspire');

?>