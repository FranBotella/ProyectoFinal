 <?php 
            $codeIn = $_POST["codigoIn"];
          
            if($code==$codeIn){
                header("location:index.php?ctl=inicio");
            }
        
        else{
            header("location:index.php?ctl=registro");
        }

        ?>