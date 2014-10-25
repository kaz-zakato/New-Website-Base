<?php
    /**
        This function gets a value of server settings file and return it
        $settingKey : the server settings key to read
    */
    function getSetting($settingsPath,$settingKey){
        //prepare variables
        $value = "";
        //Browse file and get Value
        $lines = file($settingsPath);
        foreach ($lines as $lineNumber => $line) {
            if (strpos($line, $settingKey."=") !== false) {
                $value = str_replace($settingKey."=","",$line);
            }
        }
        return trim($value);        
    }

    /**
        This function open the server settings file in a php object and return it
    */
    function openSettings($settingsPath){
        $myfile = fopen($settingsPath, "r") or die("Unable to open file!");
        return $myfile;
    }

    /**
        This function close the server settings file in a php object passe as parameter
        $settingsFile : the php object containing the server settings file
    */
    function closeSettings($settingsFile){
        fclose($settingsFile);
    }

    function findStringInFile($filePath, $str) {
      $lines = file($filePath);
      foreach ($lines as $lineNumber => $line) {
          if (strpos($line, $str) !== false) {
              return $line;
          }
      }
      return -1;
    }
?>
            
