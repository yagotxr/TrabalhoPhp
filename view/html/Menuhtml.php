<form action="" method="POST">
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <select>
                <option  disabled selected>Cadastrar Veículo:</option>
                <option value="<?php echo $actionName.":"."CREATE";?>" name="requestAction">Avião</option>
                <option value="<?php echo $actionName.":"."CREATE";?>" name="requestAction">Caminhão</option>
                <option value="<?php echo $actionName.":"."CREATE";?>" name="requestAction">Carro</option>
                <option value="<?php echo $actionName.":"."CREATE";?>" name="requestAction">Moto</option>
                <option value="<?php echo $actionName.":"."CREATE";?>" name="requestAction">Trem</option>
            </select>
            <select>
                <option  disabled selected>Listar Veículos:</option>
                <option value="<?php echo $actionName.":"."READ";?>" name="requestAction">Avião</option>
                <option value="<?php echo $actionName.":"."READ";?>" name="requestAction">Caminhão</option>
                <option value="<?php echo $actionName.":"."READ";?>" name="requestAction">Carro</option>
                <option value="<?php echo $actionName.":"."READ";?>" name="requestAction">Moto</option>
                <option value="<?php echo $actionName.":"."READ";?>" name="requestAction">Trem</option>
            </select>
            <select>
                <option  disabled selected>Atualizar Veículo:</option>
                <option value="<?php echo $actionName.":"."UPDATE";?>" name="requestAction">Avião</option>
                <option value="<?php echo $actionName.":"."UPDATE";?>" name="requestAction">Caminhão</option>
                <option value="<?php echo $actionName.":"."UPDATE";?>" name="requestAction">Carro</option>
                <option value="<?php echo $actionName.":"."UPDATE";?>" name="requestAction">Moto</option>
                <option value="<?php echo $actionName.":"."UPDATE";?>" name="requestAction">Trem</option>
            </select>
            <select>
                <option  disabled selected>Deletar Veículo:</option>
                <option value="<?php echo $actionName.":"."DELETE";?>" name="requestAction">Avião</option>
                <option value="<?php echo $actionName.":"."DELETE";?>" name="requestAction">Caminhão</option>
                <option value="<?php echo $actionName.":"."DELETE";?>" name="requestAction">Carro</option>
                <option value="<?php echo $actionName.":"."DELETE";?>" name="requestAction">Moto</option>
                <option value="<?php echo $actionName.":"."DELETE";?>" name="requestAction">Trem</option>
            </select>

            <button type="submit" value="<?php echo $actionName.":"."BACK";?>" name="requestAction">Sair</button>
        </div>
    </div>
</form>

<style>
 
  .wrapper {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    }

    button, select {
        float: left;
        background-color: #56baed;
        border: none;
        color: white;
        padding: 15px 80px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        text-transform: uppercase;
        font-size: 13px;
        -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
        box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
        margin: 5px 20px 40px 20px;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }
</style>