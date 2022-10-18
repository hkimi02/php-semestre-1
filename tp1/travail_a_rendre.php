<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    /*exercice 3*/ 
    echo "/*********exercice3**************/<br>";
    for($i=6;$i<=100;$i++){
        if($i%6==0){
            echo "$i est un multipe de 6 <br>";
        }
        if($i%3==0){
            echo "$i est un multipe de 3 <br>";
        }
        if($i%5==0){
            echo "$i est un multipe de 5 <br>";
        }
    }
    /*exercice 4*/
    echo "/*********exercice4**************/<br>";
    $var=rand(1,10);
    $fac=1;
    for($i=1;$i<=$var;$i++){
        $fac=$fac*$i;
    }
    echo "factorielle de $var est $fac <br>";
    /*exercice 4*/
    echo "/*********exercice5**************/<br>";
    for($i=1;$i<=10;$i++){
        echo "$i X 13 = ".$i*13 ."<br>";
    }
    echo "/*********tableau de multiplication**************/<br>";
    for($i=1;$i<=10;$i++){
        echo "table de multiplication de $i <br>";
        for($j=1;$j<=10;$j++){
            echo "$i X $j = ".$i*$j ."<br>";
        }
    }
    echo "/*********exercice6**************/<br>";
    $tab=array();
    for($i=0;$i<50;$i++){
        $tab[$i]=rand(10,999);
    }
    $max=$tab[0];
    $min=$tab[0];
    for($i=0;$i<count($tab);$i++){
        if($tab[$i]>$max){
            $max=$tab[$i];
        }
        if($tab[$i]<$min){
            $min=$tab[$i];
        }
    }
    echo "la valeur maximum de tableau est $max<br>";
    echo "la valeur minimale de tableau est $min <br>";
    echo "/*********exercice7**************/<br>";
    for($i=0;$i<50;$i++){
        $tab_lettres[$i]=chr(rand(65,90));
    }
        echo "<table>";
        for($i=0;$i<count($tab_lettres);$i++){
            echo "<td>$tab_lettres[$i]</td>";
        }
        echo "</table>";
        for($i=65;$i<=90;$i++){
            if(in_array(chr($i),$tab_lettres)){
                $tab_static[chr($i)]=0;
            }
        }
    echo "<table>";
    foreach($tab_lettres as $value){
        $tab_static[$value]++;
    }
    echo "</table>";
    
    echo "<table>";
    foreach($tab_static as $key=>$value){
        echo "<td>$key</td>";
    }
    echo "</table>";

    echo "<table>";
    foreach($tab_static as $key=>$value){
        echo "<td>$value</td>";
    }
    echo "</table>";
    /*exercice 8*/
    echo "/*********exercice8**************/<br>";
    $paire=array();
    $impaire=array();
    for($i=0;$i<50;$i++){
        $tab_pi[$i]=rand(10,99);
    }
    for($i=0;$i<count($tab_pi);$i++){
        if($tab_pi[$i]%2==0){
            array_push($paire,$tab_pi[$i]);
        }
        if($tab_pi[$i]%2!=0){
            array_push($impaire,$tab_pi[$i]);
        }
    }
    echo "<table>";
    foreach($tab_pi as $key=>$value){
        echo "<td>$value</td>";
    }
    echo "</table>";
    echo "tableau paire : ";
    echo "<table>";
    foreach($paire as $key=>$value){
        echo "<td>$value</td>";
    }
    echo "</table>";
    echo "tableau impaire : ";
    echo "<table>";
    foreach($impaire as $key=>$value){
        echo "<td>$value</td>";
    }
    echo "</table>";
    /*exercice 9 */ 
    echo "/*********exercice9**************/<br>";
    for($i=0;$i<20;$i+=2){
        $tab1[$i]=rand(10,99);
        $tab1[$i+1]=$tab1[$i];
}
  echo "<table>";
    foreach($tab1 as $key=>$value){
        echo "<td>$value</td>";
    }
    echo "</table>";
    for($i=0;$i<10;$i++){
        for($j=$i+1;$j<20-$i-1;$j++){
            $tab1[$j]=$tab1[$j+1];
        }
        $tab1[count($tab1)-$i-1]=$tab1[$i];
    }
    echo "<table>";
    foreach($tab1 as $key=>$value){
        echo "<td>$value</td>";
    }
    echo "</table>";
    ?>
</body>
</html>