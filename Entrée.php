<?php

$db = new PDO("mysql:host=localhost;dbname=resto",'root','');

$sel = 'SELECT * FROM commande WHERE categories=?';

$req = $db->prepare($sel);
$req->execute(['plat']);
$datas = $req->fetchAll();
//var_dump($datas);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.css">
    <link  href="./css/bootstrap-grid.css" rel="stylesheet">
    <title>Bouf</title>
</head>
<body>
<nav class="nav-bar"> 
    <div class="table">
    <ul>
        <li class="pot"   >
            <a href="Entrée.php">Entrées</a> 
        </li>
        <li class="cak">
            <a href="Plat.php">Plats</a> 
        </li>
        <li class="cak">
            <a href="Déssert.php">Désserts</a> 
        </li>
        <li class="cak">
            <a href="Boisson.php">Boissons</a> 
        </li>
        <li >
            <a href="index.html" class="so">Home</a> 
        </li>
      
    </ul>
</div>
</nav>

<br> <br> <br>
 

 <div class="ligne1">


 <?php
      foreach($datas as $data):
  ?>
        <div class="poi" id="tt"><img src="./img/<?=  $data['image']?>" alt="test" width="100%" height="150px" >
            <div class="wp"> <?=  $data["nom"]?></div>
            <div class="wr">    <?=  $data["desc"]?></div>
            <p class="tu">  <?=  $data["prix"]?> </p>
           
             <a href="./panier/add.php?action=add&amp;id=<?=$data["id"]?>" class="ad">
                     <button class="btn btn<?=$data["id"]?>">Commander</button>
            </a>
           
        </div>
<?php
      endforeach
  ?>
        

         
             
                            
 </div>
<br>
<br>
<br>
 

<hr color="black">

<script>
     let btns=document.querySelectorAll('.btn')
     console.log(btns)

     //let vert=["btn1","btn2"]
     //let blue=["btn3"]

     btns.forEach((el)=>{
            
              el.addEventListener('click',()=>{
                     
                       let attr=el.getAttribute("class").slice(4,9)
                        console.log(attr)
                        att=document.querySelector("."+attr)
                        att.classList.toggle("active")
                    
                      /*  console.log(att)
                        if(vert.includes(attr))
                        {
                            att.classList.toggle("active1")
                           
                        }

                        if(blue.includes(attr))
                        {
                            att.classList.toggle("active2") 
            
                        }   */       
                       
              })
     })
</script>
      

<script src='./panier/panier.js'></script>
</body>
</html>