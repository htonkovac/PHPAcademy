<?php


class Db extends PDO
{
    static private $_instance = array();
    
    public function __construct()
    {
        $config = App::config();
        //@todo: die if callee not this ?
        
       /* if(!isset($config['host'])) {
            $config['host'] = 'localhost';
        }
       */
        /*if($config === false) {
        $config = App::config();
        }
        */
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['name'].';charset=utf8';
        
        parent::__construct($dsn, $config['user'], $config['password']);
        
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        //$this->exec('SET NAMES utf8');
    }
    
    public static function connect( $name = 'db')//brisem prvi argument jao si ga meni
    {
        
        if(!isset(self::$_instance[$name])) {
            self::$_instance[$name] = new self();
        }
    
        return self::$_instance[$name];
    }
    
    public function queryPrepared($sql, $bind = array())      //?koliko autonomne trebaju biti metode
    {
        $stmt = $this->prepare($sql);
        $stmt->execute($bind);
        
        return $stmt;
    }
    
    
    public function fetchOne($stmt) //?not shure about this, you can use queryPrepared->fetch() for this purpose,but make shure to an avoid infinite loop
    {
            
        return $stmt->fetch();
        
        
    }
    
        public static function fetchAll()   //feching all is not gud
    {

		$sql='SELECT * FROM attendee';
		$bind =array();
		$obj=Db::connect("")->queryPrepared($sql,$bind);
		

            return $obj->fetchAll();
    }
    
    public function insertData()
    {
        /*
         * This if statement handles file upload
         */
        if(Request::fileUploaded()) {    
        $fileid = uniqid().".".pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
        $target_file =BP."uploads/".$fileid;

        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
       } else {
           $fileid="none";
       }
       
        $bind= array_values(Request::postArray());//jel bi ovo trebao biti parametar ili je ok da samo ovako pozovem unutar funkcije
        $bind[]=$fileid;
        $sql='INSERT INTO attendee (name,email,academy_major,academy_year,motivation,prior_knowledge,prior_languages,file_id) VALUES (?,?,?,?,?,?,?,?)';
       // array($name,$email,$course,$year,$motivation,$foreknowledge,$languages,$fileid);
        /*$obj=*/Db::connect()->queryPrepared($sql,$bind);
        
    }
    
    public function displayData()//?jel smije Db imat tako sta u sebi
    {
        $sql='SELECT * FROM attendee';
        $obj=Db::connect()->queryPrepared($sql);
          ob_start();

          while($attendee = $obj->fetch()) {
              echo "<tr>";
              foreach($attendee as $key=>$value) {
                  if($key=='file_id'&& $value!='none') {
                    echo "<td><a href=".App::config('url').'uploads/'.$value.' >'.$value."</a></td>";
                  } else {
                    echo "<td>".$value."</td>";   
                  }
              }
            echo "</tr>";          
              
          }
    
    return ob_get_clean();
        
        
    }
    
}