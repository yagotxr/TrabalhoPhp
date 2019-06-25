<form action="" method="POST">

    First name: <br>
    <input type="text" name="user" value="<?php echo $obj->user != null ? $obj->user : null; ?>"> <br>
    Last name: <br>
    <input type="text" name="pass" value="<?php echo $obj->pass != null ? $obj->pass : null; ?>"> <br>
    <br>
    <button type="submit" value="<?php echo $actionName.":"."LOGAR";?>" name="requestAction">Logar</button>

</form>