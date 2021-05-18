<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>SPM Dashboard</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- Dropdown -->
  
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="brand" href="{{ route('home') }}">
          <img src="../assets/img/brand/blue.png" class="brand-img" alt="..." style="width: 35%; margin:5%">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                    <i class="fas fa-archive" style="color: #525f7f;"></i>
                    <span class="nav-link-text" style="color: #525f7f">{{ __('Assessment Records') }}</span>
                </a>

                <div class="collapse show" id="navbar-examples">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('assessment-insert') }}">
                                {{ __('Enter Assessment Data') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('assessment-view') }}">
                                {{ __('View Assessment Data') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                    <i class="fas fa-archive" style="color: #525f7f;"></i>
                    <span class="nav-link-text" style="color: #525f7f">{{ __('Enrollment Records') }}</span>
                </a>

                <div class="collapse show" id="navbar-examples">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('enrollment-insert') }}">
                                {{ __('Enter Enrollment Data') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('enrollment-view') }}">
                                {{ __('View Enrollment Data') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('enrollment-compare') }}">
                                {{ __('View Enrollment Comparison') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('table') }}">
                <i class="fas fa-archive text-grey"></i> {{ __('Course Report') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('table') }}">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Account setting</span>
                </a>
              </li>
        </ul>
          <!-- Divider -->
          <hr class="my-3">

          </h6>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

