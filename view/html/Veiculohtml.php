<form action="" method="POST">

<button type="submit" value="<?php echo $actionName.":"."BACK";?>" name="requestAction">Voltar</button>
<br>
<br>

<?php 
    if ($listObj != null && count($listObj) > 0) { 
        foreach ($listObj as &$obj) { ?>

            Modelo:<br>
            <input type="text" name="modelo" value="<?php echo $obj->modelo != null ? $obj->modelo : null; ?>">
            <br>
            Ano:<br>
            <input type="text" name="ano" value="<?php echo $obj->ano != null ? $obj->ano : null; ?>">
            <br>
            <br>

<?php   } 
    } else { ?>
        
            Modelo:<br>
            <input type="text" name="modelo" value="">
            <br>
            Ano:<br>
            <input type="text" name="ano" value="">
            <br>
            <br>

<?php } ?>

<?php if ($optCommand == "CREATE") { ?>
    <button type="submit" value="<?php echo $actionName.":"."CREATE";?>" name="requestAction">Salvar</button>

<?php } else if ($optCommand == "DELETE") { ?>
    <button type="submit" value="<?php echo $actionName.":"."DELETE";?>" name="requestAction">Deletar</button>

<?php } else if ($optCommand == "UPDATE") { ?>
    <button type="submit" value="<?php echo $actionName.":"."UPDATE";?>" name="requestAction">Atualizar</button>

<?php } ?>

</form>