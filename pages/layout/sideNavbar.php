<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./dashboard.php" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HOTEL FINANCIAL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="./profile.php" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
            <a href="./dashboard.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- Accounts Receivable -->
          <li class="nav-item">
            <a href="./accountreceivable.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Accounts Receivale
              </p>
            </a>
          </li>
          <!-- Disbursement -->
          <li class="nav-item">
            <a href="./disbursement.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Disbursement
              </p>
            </a>
          </li>
          <!-- General Ledger -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                General Ledger
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./JournalEntry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Journal Entry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./chartOfAccount.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Charts of Accounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./AdjustedTrialBalance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adjusted Trial Balance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./incomeStatement.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Income Statement</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Collection -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Collection
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./collectionAddCollection.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Collection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./salesreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Report</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Budget Management -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Budget Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./budget_allocation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budget Allocation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./budget_request.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budget Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./budget_report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budget Report</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
      <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
      <a href="logout.php" class="btn btn-secondary hide-on-collapse pos-right">Logout</a>
    </div>
    <!-- /.sidebar-custom -->
  </aside>