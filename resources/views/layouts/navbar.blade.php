<header class="header">
      <div class="logo-container">
            <a href="../1.7.0" class="logo">
                  <img src="{{ asset('porto-admin') }}/assets/images/logo.png" width="75" height="35" alt="Porto Admin" />
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                  <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
      </div>
      <!-- start: search & user box -->
      <div class="header-right">
            <ul class="notifications">
                  <li>
                        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                              <i class="fa fa-bell"></i>
                              <span class="badge">3</span>
                        </a>
                        <div class="dropdown-menu notification-menu">
                              <div class="notification-title">
                                    <span class="pull-right label label-default">3</span> Alerts
                              </div>
                              <div class="content">
                                    <ul>
                                          <li>
                                                <a href="#" class="clearfix">
                                                      <div class="image">
                                                            <i class="fa fa-thumbs-down bg-danger"></i>
                                                      </div>
                                                      <span class="title">Server is Down!</span>
                                                      <span class="message">Just now</span>
                                                </a>
                                          </li>
                                          <li>
                                                <a href="#" class="clearfix">
                                                      <div class="image">
                                                            <i class="fa fa-lock bg-warning"></i>
                                                      </div>
                                                      <span class="title">User Locked</span>
                                                      <span class="message">15 minutes ago</span>
                                                </a>
                                          </li>
                                          <li>
                                                <a href="#" class="clearfix">
                                                      <div class="image">
                                                            <i class="fa fa-signal bg-success"></i>
                                                      </div>
                                                      <span class="title">Connection Restaured</span>
                                                      <span class="message">10/10/2016</span>
                                                </a>
                                          </li>
                                    </ul>
                                    <hr />
                                    <div class="text-right">
                                          <a href="#" class="view-more">View All</a>
                                    </div>
                              </div>
                        </div>
                  </li>
            </ul>
            <span class="separator"></span>
            <div id="userbox" class="userbox">
                  <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                              <img src="{{ asset('porto-admin') }}/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info" data-lock-name="{{ auth()->user()->name }}" data-lock-email="{{ auth()->user()->email }}">
                              <span class="name">{{ auth()->user()->name }} </span>
                              <span class="role">{{ auth()->user()->username }}</span>
                        </div>
                        <i class="fa custom-caret"></i>
                  </a>
                  <div class="dropdown-menu">
                        <ul class="list-unstyled">
                              <li class="divider"></li>
                              @if(auth()->user()->role == true)
                              <li>
                                    <a role="menuitem" tabindex="-1" href="{{ url('/profil') }}">
                                          <i class="fa fa-user"></i> Profil </a>
                              </li>
                              @endif
                              <li>
                                    <form id="form_logout" action="{{ url('/logout') }}" method="POST"> @csrf <a role="menuitem" tabindex="-1" href="javascript:{}" onclick="document.getElementById('form_logout').submit();">
                                                <i class="fa fa-power-off"></i> Logout </a>
                                    </form>
                              </li>
                        </ul>
                  </div>
            </div>
      </div>
      <!-- end: search & user box -->
</header>