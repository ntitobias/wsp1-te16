<?php
/**
 * Funktion för att ansluta till en databas
 * 
 * Funktione förutsätter att några konstanter redan har satts:
 * DB_DBNAME
 * DB_USERNAME
 * DB_PASSWORD
 * TZ
 * 
 * @return PDO Databaskopplingen som ett PDO-objekt.
 */

 function get_dbh()
 {
    //Uppkopplingen återanvänds
    static $dbh;

    if(is_null($dbh)){
        //Kontroll av parametrar
        $dsn = "mysql:host=localhost;dbname=" . DB_DBNAME . 
        ";charset=utf8";

        //Lite grundläggande inställningar
        $attributes = array(
            //Fortsätt att kasta exceptions för alla fel.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            //En specialgrej för MySQL/MariaDB
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            //Använd associative arrayer när svar hämtas som standard.
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try{
            $dbh = new PDO($dsn,DB_USERNAME, DB_PASSWORD, $attributes);
            if(empty($dbh)){
                throw new Exception(
                    "PDO kunde inte instansieras, uppkoppling misslyckad.");
            }

            //Lite inställningar för mySQL under utveckling.
            //Ställ in tidszon för förbindelsen
            $ts_sql= "SET time_zone='" . TZ . "'";
            $svar = $dbh->query($ts_sql);

            
            //Tolerera inga fel under utveckling
            $mode_sql = "SET SESSION sql_mode = 
                'STRICT_ALL_TABLES,NO_ZERO_DATE,NO_ZERO_IN_DATE'";
            $svar=$dbh->query($mode_sql);

            //Idiotsäkra förbindelsen
            $safe_sql = "SET sql_safe_updates-1,sql_select_limit=1000,max_join_size=1000000";
            $svar=$dbh->query($mode_sql);
        }
        catch(Exception $e){
            //Inte färdig felhantering
            echo "<pre>";
            var_dump($e);
            echo "<hr />";
            var_dump($dbh->errorInfo());
            echo "<hr />";
            exit;
        }
    }
    return $dbh;
 }