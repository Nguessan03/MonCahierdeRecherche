<?php 
  include 'connexion.php';

//   upload image 1
    if(isset($_POST['envoyer'])){
        $image = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];  
        $folder = "../assets/img/".$image;
        
        
        if(move_uploaded_file($tempname,$folder)){
            echo 'images est uplade';
        }
        // upload image 2
        $image1 = $_FILES['img1']['name'];
        $tempname1 = $_FILES['img1']['tmp_name'];  
        $folder1 = "../assets/img/".$image1;
        
        if(move_uploaded_file($tempname1,$folder1)){
            echo 'images est uplade';
        }

        $matiere = $_POST['matiere'];
        $niveau = $_POST['niveau'];
        $titre= $_POST['titre'];
        $date = $_POST['date'];
        $requete = $con->prepare("INSERT INTO form_prof(matiere, niveau, titre, img, img1, date_pub) VALUES('$matiere','$niveau','$titre','$folder', '$folder1', '$date')");
        $requete->execute();
   
}
    header('location:publication.php')
    ?>