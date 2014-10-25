<!DOCTYPE HTML>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Site builer Home</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
        <!-- CSS -->
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/builder-common.css" type="text/css" media="screen" />
        <!-- fin CSS -->

        <!-- js commun -->
        <script src="js/lib/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
        <!-- Fin js commun -->
    </head>
    <body class="template3" id="id1">
            <?php
                include 'components/settings.php';
                include 'components/databaseConnector.php';
                //Get Database settings                
                $settingsPath = "conf/serverconfig.properties";
                $dbHost = getSetting($settingsPath,"server.db.host");
                $dbUser = getSetting($settingsPath,"server.db.user");
                $dbPassword = getSetting($settingsPath,"server.db.password");
                $dbName = getSetting($settingsPath,"server.db.name");
                //Get database connection and get the site home page
                $SB_DB = databaseOpen($dbHost,$dbUser,$dbPassword,$dbName);
                $result = mysqli_query($SB_DB,'SELECT * FROM Pages WHERE home_page = 1');
                $row_cnt = $result->num_rows;
                //If no home page in the site display the administration page
                if($row_cnt==0){
                    $Page = "admin/index.php";
                }
                else{
                   $Page = "siteDisplay/index.php";  
                   //TODO : Set parameters pour site display
                }
            ?>
            <div class="container">
                <?php include $Page;?>
            </div>
    </body>
</html>