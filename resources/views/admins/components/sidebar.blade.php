  <!-- leftbar-tab-menu -->
  <div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
      <a href="index.html" class="logo">
        <span>
          <img
            src="assets/images/logo-sm.png"
            alt="logo-small"
            class="logo-sm"
          />
        </span>
        <span class="">
          <img
            src="assets/images/logo-light.png"
            alt="logo-large"
            class="logo-lg logo-light"
          />
          <img
            src="assets/images/logo-dark.png"
            alt="logo-large"
            class="logo-lg logo-dark"
          />
        </span>
      </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu">
      <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
        <div class="d-flex align-items-start flex-column w-100">
          <!-- Navigation -->
          <ul class="navbar-nav mb-auto w-100">
            <li class="menu-label pt-0 mt-0">
              <!-- <small class="label-border">
                                  <div class="border_left hidden-xs"></div>
                                  <div class="border_right"></div>
                              </small> -->
              <span>Main Menu</span>
            </li>
            <li class="nav-item">
              <a
                class="nav-link {{$classActive === "Dashboard" ? "bg-active" : ""}}" {{-- Nếu classActive là "Dashboard" thì thêm class bg-active --}}
                href="{{route('admin.index')}}"
              >
                <i class="fas fa-home menu-icon {{$classActive === "Dashboard" ? "text-primary" : ""}}"></i> {{-- Nếu classActive là "Dashboard" thì thêm class text-primary --}}
                <span>Dashboard</span>
              </a>
            </li>
            <!--end nav-item-->
            {{-- <li class="nav-item">
              <a
                class="nav-link"
                href="#sidebarApplications"
                data-bs-toggle="collapse"
                role="button"
                aria-expanded="false"
                aria-controls="sidebarApplications"
              >
                <i class="iconoir-view-grid menu-icon"></i>
                <span>Applications</span>
              </a>
              <div class="collapse" id="sidebarApplications">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="#sidebarAnalytics"
                      data-bs-toggle="collapse"
                      role="button"
                      aria-expanded="false"
                      aria-controls="sidebarAnalytics"
                    >
                      <span>Analytics</span>
                    </a>
                    <div class="collapse" id="sidebarAnalytics">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="analytics-customers.html" class="nav-link"
                            >Customers</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a href="analytics-reports.html" class="nav-link"
                            >Reports</a
                          >
                        </li>
                        <!--end nav-item-->
                      </ul>
                      <!--end nav-->
                    </div>
                  </li>
                  <!--end nav-item-->
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="#sidebarProjects"
                      data-bs-toggle="collapse"
                      role="button"
                      aria-expanded="false"
                      aria-controls="sidebarProjects"
                    >
                      <span>Projects</span>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link" href="projects-clients.html"
                            >Clients</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a class="nav-link" href="projects-team.html"
                            >Team</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a class="nav-link" href="projects-project.html"
                            >Project</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a class="nav-link" href="projects-task.html"
                            >Task</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a
                            class="nav-link"
                            href="projects-kanban-board.html"
                            >Kanban Board</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a class="nav-link" href="projects-chat.html"
                            >Chat</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a class="nav-link" href="projects-users.html"
                            >Users</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a class="nav-link" href="projects-create.html"
                            >Project Create</a
                          >
                        </li>
                        <!--end nav-item-->
                      </ul>
                      <!--end nav-->
                    </div>
                  </li>
                  <!--end nav-item-->
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="#sidebarEcommerce"
                      data-bs-toggle="collapse"
                      role="button"
                      aria-expanded="false"
                      aria-controls="sidebarEcommerce"
                    >
                      <span>Ecommerce</span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link" href="ecommerce-products.html"
                            >Products</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a class="nav-link" href="ecommerce-customers.html"
                            >Customers</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a
                            class="nav-link"
                            href="ecommerce-customer-details.html"
                            >Customer Details</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a class="nav-link" href="ecommerce-orders.html"
                            >Orders</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a
                            class="nav-link"
                            href="ecommerce-order-details.html"
                            >Order Details</a
                          >
                        </li>
                        <!--end nav-item-->
                        <li class="nav-item">
                          <a class="nav-link" href="ecommerce-refunds.html"
                            >Refunds</a
                          >
                        </li>
                        <!--end nav-item-->
                      </ul>
                      <!--end nav-->
                    </div>
                  </li>
                  <!--end nav-item-->

                  <li class="nav-item">
                    <a class="nav-link" href="apps-chat.html">Chat</a>
                  </li>
                  <!--end nav-item-->
                  <li class="nav-item">
                    <a class="nav-link" href="apps-contact-list.html"
                      >Contact List</a
                    >
                  </li>
                  <!--end nav-item-->
                  <li class="nav-item">
                    <a class="nav-link" href="apps-calendar.html">Calendar</a>
                  </li>
                  <!--end nav-item-->
                  <li class="nav-item">
                    <a class="nav-link" href="apps-invoice.html">Invoice</a>
                  </li>
                  <!--end nav-item-->
                </ul>
                <!--end nav-->
              </div>
              <!--end startbarApplications-->
            </li> --}}
            <!--end nav-item-->
            <li class="nav-item">
              <a
                class="nav-link {{$classActive === "Users" ? "bg-active" : ""}}"
                href="{{route('user.index')}}"
              >
                <i class="fas fa-user-friends menu-icon {{$classActive === "Users" ? "text-primary" : ""}}"></i>
                <span>Users</span>
              </a>
              <!--end startbarElements-->
            </li>
            <!--end nav-item-->
          </ul>
          <!--end navbar-nav--->
        </div>
      </div>
      <!--end startbar-collapse-->
    </div>
    <!--end startbar-menu-->
  </div>
  <!--end startbar-->
  <div class="startbar-overlay d-print-none"></div>
  <!-- end leftbar-tab-menu-->