  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('img/logo1.png') }}" alt="RevolutPay" width="100%">
    
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
 



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
          
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="{{ asset('home')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Fund Your Wallet
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="fund" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monnify (Automatic)</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="fund1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank Deposit (Manual)</p>
                </a>
              </li>
            </ul>
          </li>

        
           
            </ul>
          </li>
    
        
        
          <li class="nav-item">
            <a href="transactions" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Transactions</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="rechargeairtime" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Airtime</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="rechargedata" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Data</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="rechargetv" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Cable TV</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="paybill" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Pay Bills</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
        
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>