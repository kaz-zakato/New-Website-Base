<?php
    /**
        This function gets a value of server settings file and return it
        $settingKey : the server settings key to read
    */
    function getSetting($settingKey){
        //Get settings file
        $settingsFile = settingsOpen();
        //prepare variables
        $value = "";
        $line_number = false;
        //Browse file
        if ($settingsFile) {
           $count = 0;
           while (($line = fgets($handle, 4096)) !== FALSE and !$line_number) {
              $count++;
              //if key is found set the value
              if( (strpos($line, $search) !== FALSE) ? $count : $line_number){
                $value = strstr($line, $settingKey."=");
              }
           }
           closeSettings($settingsFile)
        }
        return $value;        
    }

    /**
        This function open the server settings file in a php object and return it
    */
    function openSettings(){
        $myfile = fopen("../conf/serverconfig.properties", "r") or die("Unable to open file!");
        return $myfile;
    }

    /**
        This function close the server settings file in a php object passe as parameter
        $settingsFile : the php object containing the server settings file
    */
    function closeSettings($settingsFile){
        fclose($settingsFile);
    }
?>
            
