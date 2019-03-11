<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="http://jrain.oscitas.netdna-cdn.com/tutorial/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="http://jrain.oscitas.netdna-cdn.com/tutorial/css/bootstrap.min.css">


    <link rel="stylesheet" href="../../css/common-1.css"/>    
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="progress.css">  
    <link rel="stylesheet" type="text/css" href="FORM.css"> 
   
</head>


<body>

    <?php

        include_once 'db_connection.php';
        include_once 'connect.php';
        //include_once 'function.php';
        //include 'style.php';

        $query="SELECT nome_utente, quantita FROM soldi";

        $result = $conn->query($query);
        $x = 0;
        $cap = 200000;
        $val = 0;

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<br> nome " . $row["nome_utente"]. " soldi " . $row["quantita"]. "<br>";
                $x = $x + $row["quantita"];
            }

            if ($x >= $cap) $val = 100;
            else {
                $val = (100 * $x) / $cap;
           }
            
        } else {
            echo "0 results";
        }

        echo $x;
    ?>
    

    <div class="demo">
        <div class="container">
            <h2><?php echo $val . "%"; ?></h2>
            <div class="row">
                <div class="col-md-offset-1 col-md-10">                   
                    <div class="progress">
                        <div class="progress-bar" id="tasto" style="width: <?php echo $val . "%"; ?>; background: white;">
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="col-sm-offset-4 col-xs-offset-3 col-sm-1 col-xs-3">
                        <div style="height: 80px;">
                                <button type="button" class="btn btn-primary btn-lg" onclick="openForm()">BUY TOKEN</button>
                                
                                    <div class="form-popup" id="myForm">
                                        <form action="input.php" class="form-container" method="post">
                                            <h1>Login</h1>

                                            <label for="email"><b>Nome utente</b></label>
                                            <input type="text" placeholder="Nome utente" name="name" required>

                                            <label for="psw"><b>Importo</b></label>
                                            <input type="number" placeholder="Importo" name="address" required>

                                            <button type="submit" class="btn" style="margin-top: 10px;">Acquista</button>
                                            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                        </form>
                                    </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-offset-1 col-sm-4 col-xs-3">
                        <div>
                            <button type="button" class="btn btn-primary btn-lg">SEE CHART</button>
                        </div>
                    </div>    
                </div>

            </div>
        </div>
    </div>


    </section>
    
    <!--<input type="text" id="questo" onchange="alert(this.value)">
    <input type="button" value="Button">-->

    <div id="result"></div>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
    
</body>
</html>
