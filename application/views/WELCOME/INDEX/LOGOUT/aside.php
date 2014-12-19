            <div class="col-xs-12 col-md-4 app-aside float-none">
                <div class="panel panel-default margin-top-50px shadow" style="opacity: 1 !important;">
                    <div class="panel-heading">
                        <h2 class="app-title app-aside-title"><i class="glyphicon glyphicon-hand-right"></i> Ingresar</h2>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo base_url().getIndex()?>/login/verify" method="post" accept-charset="utf-8">                
                                <fieldset>
                                    <label for="username"> Usuario: </label>
                                    <input type="text" class="form-control" name="username" value="" id="data-username" placeholder="Ej. Alfredo195" pattern="^[A-Za-z0-9_-]{6,25}$" required="required" />                                  
                                    <label for="pw" class="margin-top-10px">Contraseña: </label>
                                    <input type="password" class="form-control" name="pw" value="" id="data-pw" placeholder="Ej. 123..."  /> 
                                    
                                    <button id="btn-login" class="btn btn-success btn-lg margin-center margin-top-26px margin-bottom-18px"><i class="glyphicon glyphicon-chevron-right"></i> Acceder</button>
                                     <div id="login-log" class="alert-log scroll-desactive">
                                         
                                     </div> 
                                </fieldset>
                                <a href="#" class="margin-center margin-top-18px margin-bottom-18px"><i class="glyphicon glyphicon-chevron-right"></i>¿Olvidaste tu contraseña</a>
                        </form>
                    </div>
                </div>
            </div>
                