<?php 
$pgTitle = "Profil";
$age = null;

if(!empty($_POST['birthday'])){
    setcookie('birthday', $_POST['birthday']);
}

if(!empty($_COOKIE['birthday'])){
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}

require_once('inc/header.php');
?>

<div class="container">
    <h1>PHP - TP GRAFIKART - <?php if(isset($pgTitle)) echo $pgTitle; ?></h1>

    <?php if($age >= 18): ?>
        <p>FILM de cul !!!</p>
    <?php elseif($age !== null): ?>
        <div class="alert alert-danger">Tat ta ta interfis pour toi loulou.Te !</div>
    <?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="birthday">FILM DE BOULES</label>
            <select name="birthday" id="birthday" class="form-control">
                <?php for($i = 2010;  $i > 1919; $i--): ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor ?>
            </select>
        </div>
        <button type="submit">Se connecter</button>
    </form>
                <?php endif; ?>
</div>

<?php 
require_once('inc/footer.php');
?>