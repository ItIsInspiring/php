<?php 
require_once('inc/header.php');

$pgTitle = "Newsletter";
$error = null;
$success = null;
$email = null;

if( !empty($_POST['email']) ){
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $file = __DIR__. DIRECTORY_SEPARATOR .'emails'. DIRECTORY_SEPARATOR .date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND );
        $success = 'Votre email a été enregistré.';
    } else {
        $error = 'Votre email n\'est pas valide.';
    }
}

?>
<div class="container">
    <h1>PHP - TP GRAFIKART - <?php if(isset($pgTitle)) echo $pgTitle; ?></h1>
    <section>


        <?php  if($error) : ?>
            <div class="alert alert-danger">
                <?= $error; ?>
            </div>
        <?php endif;?>    
        <?php  if($success) : ?>
            <div class="alert alert-danger">
                <?= $success; ?>
            </div>
        <?php endif;?>    


        <form method="post" class="form-inline">
            <div class="form-group">
                <label for="email">Email addresse : </label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php if( isset($email) ) echo htmlentities($email); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </section>
</div>

<?php 
require_once('inc/footer.php');
?>
