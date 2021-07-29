<?php

class Calculatrice{
    private $x;
    private $y;
    private $operation;

    function __construct($a,$b,$operation) {
        $this->x = $a;
        $this->y = $b;
        $this->operation = $operation;
    }
 
    function Calculer(){
        $solution = null;
        switch($this->operation){
            case "+" : $solution = $this->x + $this->y;
                break;
            case "-" : $solution = $this->x - $this->y;
                break;
        }
        return $solution;
    } 

}
   

    // Initialisation des variables
    $x = null;
    $y = null;
    $operation = null;
    $afficheur = "";
    $solution = null;

    // Traitement

    // Récupération des variables de la page
    if(isset($_POST['x'])) $x = $_POST['x'];
    if(isset($_POST['y']))$y = $_POST['y'];
    if(isset($_POST['operation'])) $operation = $_POST['operation'];

    // Ajouter la valeur du Number au X ou Y
    if(isset($_POST['Number'])){
        $Number = $_POST['Number'];
        if($operation == null){
            if($x == null) $x = $Number;
            else $x = floatval($x . $Number);
        }else{
            if($y == null) $y = $Number;
            else $y = floatval($y . $Number);
        }
    }

    if(isset($_POST['Egale'])){
        $Egale = $_POST['Egale'];
        $calculatrice = new Calculatrice($x,$y,$operation);
        $solution = $calculatrice->Calculer($x,$y,$operation);
      
    }
    // Affichage 
    if($solution != null) $afficheur = $solution;
    else{
        if($x != null) $afficheur = $afficheur . "$x" ;
        if($operation != null) $afficheur .= " " .  $operation . " ";
        if($y != null) $afficheur .= $y;
    }
if(isset($_POST['Init'])){
    $x = null;
    $y = null;
    $operation = null;
    $afficheur = "";
    $solution = null;
}
     
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
</head>
<body>
<form action="" method="post">
    <input type="hidden" name="x" value="<?php echo $x ?>">
    <input type="hidden" name="y" value="<?php echo $y ?>">
    <input type="hidden" name="operation" value="<?php echo $operation ?>">
    <br>
    <input type="text" id="afficheur" name="afficheur" value="<?php echo $afficheur ?>" />
    <br><br>
    <input type="submit" name="Number" value="1"  ></input>
    <input type="submit" name="Number" value="2"  ></input>
    <input type="submit" name="Number" value="3"  ></input>
    <input type="submit" name="Init" value="C"  ></input>
    <br><br>
    <input type="submit" name="operation" value="+"  ></input>
    <input type="submit" name="operation" value="-"  ></input>
    <br><br>
    <input type="submit" name="Egale" value="Calculer"  ></input>
</form>
    
</body>
</html>