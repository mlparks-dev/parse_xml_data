<?php
class XMLImport{
  public $connection;
  public $xml_data;

  public function __construct($connection, $data){
    $this->connection = $connection;
    $this->xml_data   = $data;
  }

  public function parse(){
    
    $count = count($this->xml_data->jobs->job);
    for($i = 0; $i < $count; $i++){
      
      echo '<br/> '.$title            = addslashes($this->xml_data->jobs->job[$i]->title);
      echo '<br/> '.$date             = $this->xml_data->jobs->job[$i]->date;
      echo '<br/> '.$referencenumber  = $this->xml_data->jobs->job[$i]->referencenumber;
      echo '<br/> '.$url              = $this->xml_data->jobs->job[$i]->url;
      echo '<br/> '.$company          = $this->xml_data->jobs->job[$i]->company;
      echo '<br/> '.$city             = $this->xml_data->jobs->job[$i]->city;
      echo '<br/> '.$state            = $this->xml_data->jobs->job[$i]->state;
      echo '<br/> '.$country          = $this->xml_data->jobs->job[$i]->country;
      echo '<br/> '.$postalcode       = $this->xml_data->jobs->job[$i]->postalcode;
      echo '<br/> '.$description      = addslashes($this->xml_data->jobs->job[$i]->description);
      echo '<br/> '.$category         = $this->xml_data->jobs->job[$i]->category;
      echo '<br/> '.$employmentType   = $this->xml_data->jobs->job[$i]->employmentType;

      $data = array(
        'title'            =>        $title,
        'date'             =>        $date,
        'referencenumber'  =>        $referencenumber,
        'url'              =>        $url,
        'company'          =>        $company,
        'city'             =>        $city,
        'state'            =>        $state,
        'country'          =>        $country,
        'postalcode'       =>        $postalcode,
        'description'      =>        $description,
        'category'         =>        $category,
        'employmentType'   =>        $employmentType
      );

      $Job = new Job($this->connection, $this->xml_data);

      // echo('<pre>');
      // print_r($Job);
      // echo('</pre>');

      $Job->insert();
    }
  }
}
?>