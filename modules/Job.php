<?php
class Job{
  public $connection;
  public $database  = 'webster';
  public $table     = 'jobs';
  public $id;
  public $title;
  public $pub_date;
  public $reference_number;
  public $link;
  public $company;
  public $city;
  public $state;
  public $country;
  public $postal_code;
  public $description;
  public $posting_category;
  public $employment_type;

  public function __construct($connection, $data){
    $this->connection         = $connection;
    $this->$title             = $data['title'];
    $this->$pub_date          = $data['date'];
    $this->$reference_number  = $data['referencenumber'];
    $this->$link              = $data['url'];
    $this->$company           = $data['company'];
    $this->$city              = $data['city'];
    $this->$state             = $data['state'];
    $this->$country           = $data['country'];
    $this->$postal_code       = $data['postalcode'];
    $this->$description       = $data['description'];
    $this->$posting_category  = $data['category'];
    $this->$employment_type   = $data['employmentType'];
    $this->create_table();
  }

  public function create_table(){

    $sql = "CREATE TABLE IF NOT EXISTS `".$this->database."`.`".$this->table."` (
       `job_ID` INT NOT NULL AUTO_INCREMENT , 
       `job_title` VARCHAR(250) NULL , 
       `job_pub_date` VARCHAR(100) NOT NULL , 
       `job_reference_number` VARCHAR(250) NOT NULL , 
       `job_link` VARCHAR(250) NOT NULL , 
       `job_company` VARCHAR(250) NOT NULL , 
       `job_city` VARCHAR(100) NOT NULL , 
       `job_state` VARCHAR(100) NOT NULL , 
       `job_country` VARCHAR(100) NOT NULL , 
       `job_postal_code` VARCHAR(15) NOT NULL , 
       `job_description` TEXT NOT NULL , 
       `job_posting_category` VARCHAR(100) NOT NULL , 
       `job_employment_type` VARCHAR(100) NOT NULL , 
       `job_date_entered` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
       PRIMARY KEY (`job_ID`), 
       UNIQUE (`job_reference_number`)
       ) ENGINE = InnoDB;";

    $result = $this->process_query($sql);
  }

  public function process_query($sql){
    return $result = mysqli_query($this->connection, $sql);
  }

  public function insert(){

    $sql = "INSERT INTO `".$this->table."` (
      `job_ID`, 
      `job_title`, 
      `job_pub_date`, 
      `job_reference_number`, 
      `job_link`, 
      `job_company`, 
      `job_city`, 
      `job_state`, 
      `job_country`, 
      `job_postal_code`, 
      `job_description`, 
      `job_posting_category`, 
      `job_employment_type`, 
      `job_date_entered`
      ) VALUES (
        NULL, 
        '$this->title', 
        '$this->pub_date', 
        '$this->reference_number', 
        '$this->link', 
        '$this->company', 
        '$this->city', 
        '$this->state', 
        '$this->country', 
        '$this->postal_code', 
        '$this->description', 
        '$this->posting_category', 
        '$this->employment_type', 
        CURRENT_TIMESTAMP
      );";

      echo('<pre>');
      print_r($sql);
      echo('</pre>');

      $result = $this->process_query($sql);
  }

}

?>