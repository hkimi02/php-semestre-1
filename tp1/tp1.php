<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--/*ex1
    mavar : invalide car il n'ya pas $ 
    $mavar valide
    $var5 valide
    $__mavar valide 
    $__élément1 valide 
    $hotel4* invalide car *
    */-->
    <!--ex2-->
    <?php
        echo "exercice 2 : ";
        do{
            $a=rand(10,100);
            $b=rand(10,100);
            //echo "$a | $b";
        }while($a%2!=0 || $b%2==0);
        echo $a.'|'.$b;
    ?>
    <?php 
    echo "<br>exercice 3 : ";
        $list_amis=array(
            'mejri'=>array(
                'prenom'=>'talel',
                'cin'=>'1350110',
                'ville'=>'bahra',
            ),
            'chaieb'=>array(
                'prenom'=>'ahmed',
                'cin'=>'21231655',
                'ville'=>'tunis',
            ),
            'gassouma'=>array(
                'prenom'=>'achref',
                'cin'=>'112234',
                'ville'=>'tunis',
            ),
            'absouli'=>array(
                'prenom'=>'salah',
                'cin'=>'21231655',
                'ville'=>'tunis',
            ),
            'boussi'=>array(
                'prenom'=>'yassine',
                'cin'=>'21231655',
                'ville'=>'tunis',
            ),
        );

    //******solution avec for


    $keys = array_keys($list_amis);
    echo"<table>";
    for($i=0; $i < count($keys); ++$i) {
        echo "<tr>";
        echo ("<td>$keys[$i]". " : </td>") ; 
        $keyss=array_keys($list_amis[$keys[$i]]);
        echo "<td>";
        echo"<table>";
        for ($j=0;$j<count($keyss);$j++) {
        echo "<tr>";
        echo "<td>";
        echo $keyss[$j]. ' : ';
        echo "</td>";
        echo "<td>";
        echo $list_amis[$keys[$i]][$keyss[$j]];
        echo "</td>";
        echo "</tr>";
        echo "<br>";
        }
        echo"</table>";
        echo "</td>";
        echo "</tr>";
    }
    echo"</table>";
        echo "avec foreach <br><table border='1'>";
        foreach($list_amis as $value){
            echo "<tr>";
            foreach($value as $element){
                echo "<td>$element</td>";
            }
        echo "</tr>";
    }
        echo "</table>";
        echo "<br>";
        /*ex4 */
        $couleur_amis=array(
            'talel'=>'green',
            'chlendi'=>'red',
            'raed'=>'white',
            'nour'=>'blue',
        );
        echo "<table border='1'>";
        foreach($couleur_amis as $key=>$element ){
            echo "<tr style='background-color:$element'><td>$key</td></tr>";
        }
        echo "</table>";
        /*ex5*/
        $mois=array(1=>"janvier","fevrier","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","decembre");
        $couleur=array(1=>"blue","white","red","yellow","grey","lime","lightblue","fuchsia","lightgrey","olive","pink","purple");
        echo "<table border='1'>";
        // for($i=1;$i<=count($mois);$i++){
        //     echo "<tr>";
        //         echo "<td>$i</td><td style='background-color:".$couleur[$i]."'>".$mois[$i]."</td>";
        //         echo "<td>$i+1</td><td style='background-color:".$couleur[$i+1]."'>".$mois[$i+1]."</td>";
        //         echo "<td>$i+2</td><td style='background-color:".$couleur[$i+2]."'>".$mois[$i+2]."</td>";
        //         $i+=2;
        //     echo "</tr>";
        // }
        for($i=1;$i<=count($mois);$i++){
              //  echo "<tr>";
                    echo "<td>$i</td><td style='background-color:".$couleur[$i]."'>".$mois[$i]."</td>";
                    ($i%3==0) ? print('<tr></tr>') : '';
              //  echo "</tr>";
            }
            echo "</table";

        //soultion avec foreach
        $mois_couleurs=array(
            "janvier"=>"blue",
            "fevrier"=>"white",
            "mars"=>"red",
            "avril"=>"yellow",
            "mai"=>"grey",
            "juin"=>"lime",
            "juillet"=>"lightblue",
            "aout"=>"fuchsia",
            "septembre"=>"lightgrey",
            "octobre"=>"olive",
            "novembre"=>"pink",
            "decembre"=>"purple",
        );
        echo "<table border='1'>";
        foreach ($mois_couleurs as $key=>$element){
            echo "<tr><td style='background-color:".$element."'>".$key."</td></tr>";
        }
        echo "</table>";
        /*exercice 6 */
        echo "/********exercice6******//////////////";
        $jours=array(
            'francais'=>array("lundi", "mardi","mercredi","jeudi","vendredi","samedi","dimanche"),
            'anglais'=>array("monday", "tuesday","wednesday","thursday","friday","saturday","sunday"),
        );
        foreach($jours as $key=>$element){
            foreach($element as $value){
                echo "$key : $value<br>";
        }}
    ?>

</body>
</html>