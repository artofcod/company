# company

### DETAILED INSTRUCTION TO RUN THE SITE INTO YOUR LOCAL AND HOSTED ENVIRONMENT 
***


1) restore database into your system

2) goto company\private\db_crendital.php

   ``` <?php
    // Keep database file in seperate file
    //1.Easy to exclude that file from sourcecode menager.
    //2.Unique credentials on development and production server.
    //3.Unique credentials for working with multiple developres.
     define('DB_SERVER','localhost');
     define('DB_USER','webuser');
     define('DB_PASSWORD','demoPassword');
     define('DB_NAME','aspire');
    ?>
    ```
   

3) change the credientials as your requerment such as server name,db name,username,password

4) then goto browser and enter this url http://127.0.0.1/company/public/ to enter into the backend

5) then give username == "demoaccount" and password == "Demo@ccount1" to logged into system

6) then feel free to edit username and password or you can edit new admin to enter into system.


Thank you.

