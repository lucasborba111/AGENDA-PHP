<?php 
    include_once("../templates/header.php");
?>
    <?php include_once('../templates/backbtn.html')?>

<div class="container">
<?php include_once('../templates/backbtn.html')?>

    <h1 id="main-title">Editar contato</h1>
    <form id="create-form" action="<?=$BASE_URL?>../conf/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="type" value="<?=$contact['id']?>">

        <div class="form-group">
            <label for="name"> Nome do contato</label>
            <input type="text" class="form-control" name="name" value="<?=$contact['name']?>" id="name" placeholder="digite o nome" require>
        </div>
        <div class="form-group">
            <label for="phone"> Telefone do contato</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?=$contact['phone']?>" placeholder="digite o telefone" require>
        </div>
        <div class="form-group">
            <label for="observations"> Observações</label>
            <textarea type="text" class="form-control" name="observations" id="observations" placeholder="digite as observações" rows="3" require>
                <?=$contact['observations']?>
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>

    </form>
</div>
<?php
    include_once("../templates/footer.php");
?>