<aside id="sidebar-left" class="sidebar-left">
      <div class="sidebar-header">
            <div class="sidebar-title"> Navigation </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                  <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
      </div>
      <div class="nano">
            <div class="nano-content">
                  <nav id="menu" class="nav-main" role="navigation">
                        <ul class="nav nav-main">
                              <li>
                                    <a href="{{ url('/dashboard') }}" style="{{ Request::is('dashboard') ? 'color: #0088cc;' : '' }}">
                                          <i class="fa fa-home" aria-hidden="true"></i>
                                          <span>Dashboard</span>
                                    </a>
                              </li>
                              @if(auth()->user()->role == false)
                              <li class="nav-parent {{ Request::is('bank*') ? 'nav-expanded' : '' }}">
                                    <a class="text-muted" style="{{ Request::is('bank*') ? 'color: #0088cc;' : '' }}">
                                          <i class="fa fa-database" aria-hidden="true"></i>
                                          <span>Master Data</span>
                                    </a>
                                    <ul class="nav nav-children">
                                          <li class="{{ Request::is('bank') ? 'nav-active' : '' }}">
                                                <a href="{{ route('bank.index') }}">Bank</a>
                                          </li>
                                    </ul>
                              </li>
                              <li>
                                    <a href="{{ url('/kriteria') }}" style="{{ Request::is('kriteria*') ? 'color: #0088cc;' : '' }}">
                                          <i class="fa fa-list-alt" aria-hidden="true"></i>
                                          <span>Kriteria</span>
                                    </a>
                              </li>
                              @else
                              <li>
                                    <a href="{{ url('/pengajuan') }}" style="{{ Request::is('pengajuan*') ? 'color: #0088cc;' : '' }}">
                                          <i class="fa fa-copy" aria-hidden="true"></i>
                                          <span>Pengajuan</span>
                                    </a>
                              </li>
                              @endif
                        </ul>
                  </nav>
            </div>
            <script>
                  // Maintain Scroll Position
                  if (typeof localStorage !== 'undefined') {
                        if (localStorage.getItem('sidebar-left-position') !== null) {
                              var initialPosition = localStorage.getItem('sidebar-left-position'),
                                    sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                              sidebarLeft.scrollTop = initialPosition;
                        }
                  }
            </script>
      </div>
</aside>