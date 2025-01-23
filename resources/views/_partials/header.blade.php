<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title }} - System</title>

    {{-- Loading --}}
    <link rel="stylesheet" href="{{ url('assets/css/loading.css') }}">

    <meta name="description" content="" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ url('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('assets/js/config.js') }}"></script>

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
  </head>

  <body>

    {{-- Loading --}}
    <div id="loading" class="loading">
      <div class="spinner"></div>
    </div>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ url('/') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                LOGO
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2 text-uppercase">VISITOR</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{ $title === 'Dashboard' ? 'active' : '' }}">
                <a href="{{ url('/') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Basic">Dashboard</div>
                </a>
            </li>
            <!-- Pages -->
            <li class="menu-item {{ in_array($title, ['AUAH', 'lanjutin title ini']) ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ $title == 'AUAH' ? 'active' : '' }}">
                  <a href="{{ url('#') }}" class="menu-link">
                    <div data-i18n="Account">AUAH</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-account-settings-notifications.html" class="menu-link">
                    <div data-i18n="Notifications">Notifications</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-account-settings-connections.html" class="menu-link">
                    <div data-i18n="Connections">Connections</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item {{ in_array($title, ['AUAH', 'lanjutin title ini']) ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Authentications</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="auth-login-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Login</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="auth-register-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Register</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Forgot Password</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item {{ in_array($title, ['AUAH', 'lanjutin title ini']) ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Misc</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pages-misc-error.html" class="menu-link">
                    <div data-i18n="Error">Error</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-misc-under-maintenance.html" class="menu-link">
                    <div data-i18n="Under Maintenance">Under Maintenance</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
            <!-- Users -->
            <li class="menu-item  {{ $title === 'Users' ? 'active' : '' }}">
              <a href="{{ url('/Manage/User') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Users</div>
              </a>
            </li>
            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            {{-- Clock --}}
            <i class='bx bx-time' ></i> <span class="ml-md-3 font-italic fw-bold" id="clock-realtime"> <?= date('Y-m-d H:i:s') ?> </span>

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item lh-1 me-3">
                  John Doe |
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                      <img src="{{ url('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle shadow" />
                      <span id="signal-indicator" class="position-absolute" 
                          style="width: 12px; height: 12px; right: -2px; bottom: -2px; background-color: #28a745; border-radius: 50%; border: 2px solid #fff;">
                      </span>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="{{ url('#') }}">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="{{ url('assets/img/avatars/1.png') }}" class="w-px-40 h-auto rounded-circle shadow" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ url('#resetPasswordModal') }}" class="btn btn-outline-dark mx-3 mt-2 d-block reset-password-btn" data-user-id="" data-bs-toggle="modal">
                        <i class="bx bx-key me-2"></i>
                        <span class="align-middle">Reset Password</span>
                      </a>                    
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item bg-danger rounded text-white" href="{{ url('/Auth/Login') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Logout</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
          <!-- / Navbar -->

          <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="ti ti-key"></i> Reset Password
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="resetPasswordForm" method="POST">
                            @csrf
                            <div class="mb-3 form-group form-floating">
                              <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Current Password" required>
                              <label for="currentPassword">Current Password</label>
                            </div>
                            <div class="mb-3 form-group form-floating">
                              <input type="password" class="form-control" id="PasswordHash" name="PasswordHash" placeholder="New Password" required>
                              <label for="newPassword">New Password</label>
                            </div>
                            <div class="mb-3 form-group form-floating">
                              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm New Password" required>
                              <label for="confirmPassword">Confirm New Password</label>
                            </div>
                            <div class="d-flex justify-content-end">
                              <button type="submit" class="btn btn-danger">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
              