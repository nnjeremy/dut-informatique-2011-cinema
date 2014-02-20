<?php						  
//resource executer_requete(string query)//-ouverture de connexion + demande d'exécution d ’une requête (argument query)//-retour d'une référence de résultat (de type resource) si la requête a pu être exécutée ou retour d'un message en cas d'échec 

function executer_requete($chaine_requete) 
{
  // 1) ouverture de la connexion à la base zoo (serveur postgres-info.iut2.upmf-grenoble.fr)
  $connexion_bd = pg_connect("host=postgres-info.iut2.upmf-grenoble.fr user=invite password=invite dbname=cinema");
  if(!$connexion_bd) 
  {
    echo "<em>Erreur de connexion au serveur de BD </em>";
    exit;
  }
  
  // 2) exécution de la requête  
  $resultats_requete = pg_query($connexion_bd,$chaine_requete);
						  
  // 3) fermeture de la connexion
  if (!pg_close($connexion_bd))
  {
    echo "<em>Erreur de fermeture de la BD</em>";
    exit;
  }
  
  // 4) retour
   if($resultats_requete)
    return $resultats_requete; 
  else	
  {
    echo "<em>Erreur dans la requête '$chaine_requete'</em>";
    exit;
  }
}
?>
