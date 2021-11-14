<!DOCTYPE html>
<html>
    <head>
        <title>SMS - API</title>
    </head>
    <body>
        <?php 
            session_start();

            if(isset($_SESSION['message'])){
                ?>
                <div class="alert alert-info text-center">
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php
                unset($_SESSION['message']);
            }

        ?>
        <h1>Send a Message</h1>
        <form method="post" action="number.php">
            <input type="text" name="number" placeholder="Number Here" />
            <input type="submit" class="button" name="add_number" value="Add" />
        </form>

        <h3>Recipient:</h3>
        <?php 
            if(isset($_SESSION['number'])) {

                $number_count = count($_SESSION['number']);

                if($number_count > 0) {
                    for ($i = 0 ; $i < $number_count; $i++) {
                        echo $_SESSION['number'][$i].'<br>';
                    }
                }
                else {
                    echo '<span>No Receiver</span>';
                }              
            }
            else {
                echo '<span>No Receiver</span>';
            }  
            
        ?>

        <hr>

        <form method="post" action="send.php">
            <textarea name="message" placeholder="Message"></textarea>
            <button type="submit" name="send">Send</button>
        </form>
    </body>
</html>