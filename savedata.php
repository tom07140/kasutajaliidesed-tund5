<?php
  $file_name = "data.txt";
  //faili sisu
  $entries_from_file = file_get_contents($file_name);
  //echo $entries_from_file;
  //string objektideks
  $entries = json_decode($entries_from_file);
  //var_dump($entries);
  // {"name":"romil"}
  //?name=nimi&ingridients=koostis
  if(isset($_GET["name"]) && isset($_GET["ingredients"])){
    //ei ole tühjad
    if(!empty($_GET["name"]) && !empty($_GET["ingredients"])){
        //lihtne objekt
        $object = new StdClass();
        $object->name = $_GET["name"];
        $object->ingredients = $_GET["ingredients"];
        //lisan objekti massiivi
        array_push($entries, $object);
        //TEEN STRINGIKS
        $json_string = json_encode($entries);
        //salvestan faili üle, salvestan massiivi stringi kujul
        file_put_contents($file_name, $json_string);
    }
  }
  //trükin välja stringi kuju massiivi (võib-olla lisas midagi juurde)
  echo(json_encode($entries));
?>
