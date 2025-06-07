<?php
        include("../connection.php");

          $email=mysqli_real_escape_string($connection,$_POST["email"]);
          $contrasenia=mysqli_real_escape_string($connection,$_POST["contrasenia"]);

          $result = mysqli_query($connection,"SELECT * FROM usuario WHERE EMAIL='$email' AND CONTRASENIA='$contrasenia' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                  $_SESSION['valid'] = $row['email'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
                  /** NECESARIO AGEGAR UN MODAL PARA DECIR QUE EL USUARIO 
                   * O EL PASSORD NO ES CORRECTO
                   */
                }


                if(isset($_SESSION['valid']))
                {
                  header("Location: .....");// ... PAGINA DEL USUARIO
                }
        
        ?>