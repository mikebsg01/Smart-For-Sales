<div class="span4">
    <div style="width: 100%; display: block; height: 10px; margin-top: 19%;" class="no-tablet-portrait"></div>
    <div style="width: 100%; display: block; height: 4px; margin-top: 2%;" class="no-desktop"></div>
    <div class="panel bg-white shadow">
        <hgroup class="panel-header bg-lightBlue fg-white">
            <small id="logIn-User" class="fg-white"><i class="icon-accessibility on-left"></i> Ingresar </small>
        </hgroup>
        <div id="login-container" class="panel-content">
            <?php echo form_open('../../LogIn/verify'); ?>
                <fieldset>
                    <label for="username"> Usuario: </label>
                    <div class="input-control text" data-role="input-control">
                        <?php echo form_input($formLogIn['username']); ?>
                        <label for="pw">Contraseña: </label>
                        <div class="input-control password" data-role="input-control">
                            <?php echo form_input($formLogIn['password']); ?>
                            <button class="btn-reveal" tabindex="-1"></button>
                        </div>
                        <button class="btn-clear" tabindex="-1"></button>
                    </div>
                    <div class="input-control switch margin20" data-role="input-control">
                        <label>
                            No cerrar sesión &nbsp; 
                            <?php echo form_input($formLogIn['NOT_CLOSING_SESSION']); ?>
                            <span class="check bg-lightBlue"></span>
                        </label>
                    </div>
                    <button name="logIn" id="logIn" class="button large info" style="margin-left: auto; margin-right: auto; margin-top: 6%; display: block;"><i class="on-left icon-arrow-right-3"></i> Acceder</button>
                    <?php
                        if($received['login_status'] == 0 && $received['request'] == "failed"){
                    ?> 
                            <p class="fg-red" style="margin-top: 10%; text-align: center;">Usuario o Contraseña Incorrecta.</p>
                    <?php
                        }
                        if($received['login_status'] == 0 && $received['request'] == "duplicate"){
                    ?>  
                       <br/>
                       <script type="text/javascript">
                            $(function(){
                                $close_msg = $("#close_message");
                                $close_msg.css({'cursor':'pointer'});
                                $close_msg.click(function(){
                                    $alert = $(this).parent();
                                    $alert.fadeOut(800);
                                });
                            });
                       </script>
                       <div class="notice bg-darkCyan fg-white marker-on-top">
                            <a id="close_message" class="place-right"><i class="icon-cancel-2"></i></a>
                            <p> ¡El usuario ingresado ya ha iniciado sesión en otro equipo! </p>
                        </div>
                    <?php 
                        }
                    ?>
                </fieldset>
            <?php echo form_close(); ?>
            <a href="#" class="margin20"> <i class="icon-arrow-right-5 on-left"></i>¿Olvidaste tu contraseña? </a>
        </div> 
    </div>
    <div style="width: 100%; display: block; height: 4px; margin-top: 6%;" class="no-desktop"></div>
</div>