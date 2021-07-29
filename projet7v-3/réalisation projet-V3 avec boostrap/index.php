<?php 
class calculatrice {
    private $x ;
    private $y ;
    private $operation ;
    function __construct($a,$b,$operation){
        $this->x = $a;
        $this->y = $b;
        $this->operation = $operation;

    }

    function calculer() {
        $solution = null;
        switch($this->operation){
            case'+' :  $solution =  $this->x + $this->y ;
            break;
            case'-' :  $solution =  $this->x - $this->y ;
            break;
            case'x' :  $solution =  $this->x * $this->y ;
            break;
            case'/' :  $solution =  $this->x / $this->y ;
            break;
        }
        return $solution; 
    }
}

$x = null ; $y = null ; $operation = null ; $solution = null ; $afficheur = "" ;

if(isset($_POST['x'])){
    $x = $_POST['x'];
}

if(isset($_POST['y'])){
    $y = $_POST['y'];
}

if(isset($_POST['operation'])){
    $operation = $_POST['operation'];
}

if(isset($_POST['nombre'])){
$nombre = $_POST['nombre'];
    if($operation==null){
        if($x == null) $x = $nombre;
else $x = floatval($x . $nombre);
    } else {  
           if($y == null) $y = $nombre;
        else $y = floatval($y . $nombre); 
  }
}


if (isset($_POST['egale'])){
    $egale = $_POST['egale'];

$calculatrice = new calculatrice($x,$y,$operation);
$solution = $calculatrice-> calculer($x,$y,$operation);

}



if($solution != null) $afficheur = $solution ;
else{
    if($x != null) $afficheur .= "$x" ;
    if($operation != null) $afficheur .= " " . $operation . " ";
    if($y != null) $afficheur .= "$y" ;
}


if(isset($_POST['init'])){
    $x = null ;
    $y = null ;
    $operation = null ; 
    $solution = null ; 
    $afficheur = "" ;

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculatrice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

</head>
<body>
<div class="container my-4">
<form action="" method="post">
    <div class="calculator card">
        <input type="text" class="calculator-screen z-depth-1" name="affichage" value="<?php echo $afficheur ?>">

        <div class="calculator-keys">
            
                <input type="hidden" name="x" value="<?php echo $x ?>">
                <input type="hidden" name="y" value="<?php echo $y ?>">
                <input type="hidden" name="operation" value="<?php echo $operation ?>">

                <button type="submit" name="operation" class="operator btn btn-info" value="+">+</button>
                <button type="submit" name="operation" class="operator btn btn-info" value="-">-</button>
                <button type="submit" name="operation" class="operator btn btn-info" value="x">*</button>
                <button type="submit" name="operation" class="operator btn btn-info" value="&divide;">&divide;</button>
 
                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="7">7</button>
                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="8">8</button>
                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="9">9</button>

                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="4">4</button>
                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="5">5</button>
                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="6">6</button>

                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="1">1</button>
                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="2">2</button>
                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="3">3</button>

                <button type="submit" name="nombre" class="btn btn-light waves-effect" value="0">0</button>
                <button type="submit" name="init" class="all-clear function btn btn-danger btn-sm" value="C">C</button>
                <button type="submit" name="egale" class="equal-sign operator btn btn-default" value="=">=</button>

           
        </div>
    </div>
    </form>
</div>   
</body>
</html>