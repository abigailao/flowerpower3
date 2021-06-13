<?php
include "../public/layout/header.php";
?>
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <h2></h2>
            </div>

            <div class='col-md-6'>
                <!--Form-->
                <form method='post' action=''>

                    <h1>Contact</h1>
                    <?php
                    // Display Error message
                    if(!empty($error_message)){
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?= $error_message ?>
                        </div>

                        <?php
                    }
                    ?>

                    <?php
                    // Display Success message
                    if(!empty($success_message)){
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?= $success_message ?>
                        </div>

                        <?php
                    }
                    ?>

                    <div class="form-group">
                        <!--                    <label for="fname">Voornaam:</label>-->
                        <input type="email" class="form-control" name="email" id="email" required="required" placeholder="email@voorbeeld.nl">
                    </div>
                    <div class="form-group">
                        <!--                    <label for="lname">Achternaam:</label>-->
                        <input type="text" class="form-control" name="naam" id="naam" required="required" placeholder="Naam">
                    </div>
                    <div class="form-group">
                        <!--                    <label for="onderwerp">Onderwerp:</label>-->
                        <input type="text" class="form-control" name="onderwerp" id="onderwerp" required="required" maxlength="80" placeholder="onderwerp">
                    </div>
                    <div class="form-group">
                        <!--                    <label for="password">Wachtwoord:</label>-->
                        <textarea class="form-control" name="text" id="text" required="required" maxlength="250" placeholder="Uw contact reden"></textarea>
                    </div>
                    <button style="background-color: #c45832;" type="submit" class="btn btn-primary mt-2 border-0">Verzenden</button>
                </form>
            </div>
            <div class='col-md-6'>
                <a href="https://www.savatarian.com/abigail/Portfolio/public/index.php"><img src="../img/desk-contact.jpg" class="d-block w-100" alt="..."></a>
            </div>


        </div>
    </div>





<?php
include("../public/layout/footer.php");
?>