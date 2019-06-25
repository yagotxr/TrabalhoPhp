<form action="" method="POST">

<button type="submit" value="<?php echo $actionName.":"."BACK";?>" name="requestAction">Voltar</button>
<br>
<br>

<?php 
    if ($listObj != null && count($listObj) > 0) { 
        foreach ($listObj as &$obj) { ?>

            Nome:<br>
            <input type="text" name="nome" value="<?php echo $obj->nome != null ? $obj->nome : null; ?>">
            <br>
            Ultimo Nome:<br>
            <input type="text" name="ultimoNome" value="<?php echo $obj->ultimoNome != null ? $obj->ultimoNome : null; ?>">
            <br>
            CPF:<br>
            <input type="text" name="cpf" value="<?php echo $obj->cpf != null ? $obj->cpf : null; ?>">
            <br>
            RG:<br>
            <input type="text" name="rg" value="<?php echo $obj->rg != null ? $obj->rg : null; ?>">
            <br>
            Data Nascimento:<br>
            <input type="text" name="dataNascimento" value="<?php echo $obj->dataNascimento != null ? $obj->dataNascimento : null; ?>">
            <br>
            Idade:<br>
            <input type="text" name="idade" value="<?php echo $obj->idade != null ? $obj->idade : null; ?>">
            <br>
            Endereco:<br>
            <input type="text" name="endereco" value="<?php echo $obj->endereco != null ? $obj->endereco : null; ?>">
            <br>
            Login:<br>
            <input type="text" name="user" value="<?php echo $obj->user != null ? $obj->user : null; ?>">
            <br>
            Senha:<br>
            <input type="text" name="pass" value="<?php echo $obj->pass != null ? $obj->pass : null; ?>">
            <br>
            Email:<br>
            <input type="text" name="email" value="<?php echo $obj->email != null ? $obj->email : null; ?>">
            <br>
            <br>

<?php   } 
    } else { ?>
        
            Nome:<br>
            <input type="text" name="nome" value="">
            <br>
            Ultimo Nome:<br>
            <input type="text" name="ultimoNome" value="">
            <br>
            CPF:<br>
            <input type="text" name="cpf" value="">
            <br>
            RG:<br>
            <input type="text" name="rg" value="">
            <br>
            Data Nascimento:<br>
            <input type="text" name="dataNascimento" value="">
            <br>
            Idade:<br>
            <input type="text" name="idade" value="">
            <br>
            Endereco:<br>
            <input type="text" name="endereco" value="">
            <br>
            Login:<br>
            <input type="text" name="user" value="">
            <br>
            Senha:<br>
            <input type="text" name="pass" value="">
            <br>
            Email:<br>
            <input type="text" name="email" value="">
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