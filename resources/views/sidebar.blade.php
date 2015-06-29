<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="/auth/logout">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="/home"><i class="fa fa-home"></i> <span class="nav-label">{{ trans('global.home') }}</span></a>
            </li>
            <li>
                <a href="/users/"><i class="fa fa-th-large"></i> <span class="nav-label">{{ trans('global.users') }}</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/users/">{{ trans('global.viewusers') }}</a></li>
                    <li><a href="/users/create">{{ trans('global.adduser') }}</a></li>
                </ul>
            </li>
            <li>
                <a href="/roles/"><i class="fa fa-th-large"></i> <span class="nav-label">{{ trans('global.roles') }}</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/roles/">{{ trans('global.viewroles') }}</a></li>
                    <li><a href="/roles/create">{{ trans('global.addrole') }}</a></li>
                </ul>
            </li>
            <li>
                <a href="/permissions/"><i class="fa fa-th-large"></i> <span class="nav-label">{{ trans('global.permissions') }}</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/permissions/">{{ trans('global.viewpermissions') }}</a></li>
                    <li><a href="/permissions/create">{{ trans('global.addpermission') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>