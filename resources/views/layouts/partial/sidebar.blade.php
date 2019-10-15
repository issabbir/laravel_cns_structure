<div class="nav-side-menu">
     <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
              <li class="{{ Request::is('home') ? 'active' : '' }}">
                  <a href="/home">
                  <i class="fa fa-tachometer fa-lg"></i> Dashboard
                  </a>
                </li>
                <li class="{{ Request::is('add-company') || Request::is('company') ? 'active' : '' }}"  data-toggle="collapse" data-target="#products" class="collapsed">
                  <a href="#"><i class="fa fa-gift fa-lg"></i> Company <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="{{ Request::is('add-company') ? 'active' : '' }}"><a href="/add-company">Add Company</a></li>
                    <li class="{{ Request::is('company') ? 'active' : '' }}"><a href="/company">Company List</a></li>
                </ul>


                <li class="{{ Request::is('add-store') || Request::is('store') ? 'active' : '' }}"  data-toggle="collapse" data-target="#store" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Store <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="store">
                  <li class="{{ Request::is('add-store') ? 'active' : '' }}"><a href="/add-store">Add Store</a></li>
                    <li class="{{ Request::is('store') ? 'active' : '' }}"><a href="/store">Store List</a></li>
                 </ul>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
            </ul>
     </div>
</div>
