            <div class="navbar fixed-top">
                <div class="navbar-content">

                    <a href="/" class="element"><?=$AppLogo?> <?=$AppName?> <sup><?=$AppVersion?></sup></a>
                    <span class="element-divider"></span>

                    <a class="pull-menu" href="#"></a>
                    <ul class="element-menu">
                        <li>
                            <a class="dropdown-toggle" href="#">Base CSS</a>
                            <ul class="dropdown-menu" data-role="dropdown">
                                <li><a href="requirements.html">Requirements</a></li>
                                <li>
                                    <a href="#" class="dropdown-toggle">General CSS</a>
                                    <ul class="dropdown-menu" data-role="dropdown">
                                        <li><a href="global.html">Global styles</a></li>
                                        <li><a href="grid.html">Grid system</a></li>
                                        <div class="divider"></div>
                                        <li><a href="typography.html">Typography</a></li>
                                        <li><a href="tables.html">Tables</a></li>
                                        <li><a href="forms.html">Forms</a></li>
                                        <li><a href="buttons.html">Buttons</a></li>
                                        <li><a href="images.html">Images</a></li>
                                    </ul>
                                </li>
                                <li class="divider"></li>
                                <li><a href="responsive.html">Responsive</a></li>
                                <li class="disabled"><a href="layouts.html">Layouts and templates</a></li>
                                <li class="divider"></li>
                                <li><a href="icons.html">Icons</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-toggle"  href="#">Community</a>
                            <ul class="dropdown-menu" data-role="dropdown">
                                <li class="disabled"><a href="http://blog.metroui.net">Blog</a></li>
                                <li class="disabled"><a href="http://forum.metroui.net">Community Forum</a></li>
                                <li class="divider"></li>
                                <li><a href="https://github.com/olton/Metro-UI-CSS">Github</a></li>
                                <li class="divider"></li>
                                <li><a href="https://github.com/olton/Metro-UI-CSS/blob/master/LICENSE">License</a></li>
                            </ul>
                        </li>
                        <span class="element-divider"></span>

                        <div class="element input-element no-tablet-portrait">
                            <form>
                                <div class="input-control text span3">
                                    <input type="text" placeholder="Search...">
                                    <button class="btn-search"></button>
                                </div>
                            </form>
                        </div>

                        <div class="element place-right">
                            <a id="profile" class="fg-white dropdown-toggle" href="#"><?=$userdata['usuario']?>&nbsp;&nbsp;<i class="icon-cog"></i></a>
                            <ul class="dropdown-menu" data-role="dropdown">
                                <li><a href="#">Mi Perfil &nbsp;<i class="icon-pencil fg-blue"></i></a></li>
                                <li><a href="#">Personalizar &nbsp;<i class="icon-puzzle fg-blue"></i></a></li>
                                <li class="divider"></li>
                                <li><a href="<?=site_url("../../Logout/finish_session");?>">Cerrar Sesión &nbsp;<i class="icon-exit fg-blue"></i></a></li>
                            </ul>
                        </div>
                        <div class="element place-right">
                            <a id="budget" class="fg-white" href="#">Presupuesto: $<?=number_format($userdata['presupuesto'], 2, '.', '');?> </a>
                        </div>
                    </ul>
                </div>
            </div>