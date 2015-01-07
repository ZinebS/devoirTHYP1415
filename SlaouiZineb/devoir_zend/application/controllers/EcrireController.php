<?php

class EcrireController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
        $xml = simplexml_load_file('http://picasaweb.google.com/data/feed/base/user/107401320610499259896/albumid/6065229773950541889?alt=rss&kind=photo&authkey=Gv1sRgCNak7e60l-7VlgE&hl=fr');
	foreach ($xml->channel->item as $tof) {
            echo "<table align='center' border ='10'>";
		echo "<tr> <td> <img src='".$tof->enclosure["url"]."'/> </td>";
                echo " <td> " . $tof->title . "</td> <br>";
                echo "<td> <input type='submit' value ='Absent'  /></td>";
                echo "<td> <input type='submit' value ='Present'  /></td>";
                echo "<br/>";
                echo "<td> <input type='submit' value ='liste absences' /></td>";
                echo "<td> <input type='submit' value ='liste presences'/></td> </tr>";
            echo "</table>";
	}
       
    }
    
    public function  ajouterabsenceAction() {
        try {
        $bdd = mysqli_connect('localhost' ,'root', '', 'flux_etu')or die ("error".mysqli_error($flux_etu)) ;;
            }
       catch(Exception $ex) {
          die('Erreur : '.$e->getMessage());
             }
          $query="INSERT INTO etudiant(id , nom , prenom) values ('' , 'slaoui' , 'zineb' ) "
                  . " "  or die ("error".mysqli_error($flux_etu));
          $query1="INSERT INTO absence_presence(id_Etudiant , Abs_Pre , date) values (2 , 'absence' , '2014/12/06' ) "
                  . " "  or die ("error".mysqli_error($flux_etu));
          $req = $bdd->query($query);
          $req = $bdd->query($query1);
        
    }


}

