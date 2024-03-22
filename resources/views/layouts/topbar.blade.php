<div class="page-header">

    <div class="toggle-sidebar" id="toggle-sidebar">
        <i class="bi bi-list"></i>
    </div>

    <!-- Header actions ccontainer start -->
    <div class="header-actions-container">

        <!-- Search container start -->
        <div class="search-container me-4 d-xl-block d-lg-none">

            <!-- Search input group start -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" />
                <button class="btn btn-outline-secondary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            <!-- Search input group end -->

        </div>
        <!-- Search container end -->

        <!-- Header actions start -->
        <div class="header-actions d-xl-flex d-lg-none gap-4">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-envelope-open fs-5 lh-1"></i>
                    <span class="count-label"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow-lg">
                    <div class="dropdown-item">
                        <div class="d-flex py-2 border-bottom">
                            <img src="{{asset('assets/images/user.png')}}" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                                <p class="mb-1">Membership has been ended.</p>
                                <p class="small m-0 text-secondary">Today, 07:30pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="d-flex py-2 border-bottom">
                            <img src="{{asset('assets/images/user2.png')}}" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Benjamin Michiels</h6>
                                <p class="mb-1">Congratulate, James for new job.</p>
                                <p class="small m-0 text-secondary">Today, 08:00pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="d-flex py-2">
                            <img src="{{asset('assets/images/user1.png')}}" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
                            <div class="m-0">
                                <h6 class="mb-1 fw-semibold">Jehovah Roy</h6>
                                <p class="mb-1">Lewis added new schedule release.</p>
                                <p class="small m-0 text-secondary">Today, 09:30pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid mx-3 my-1">
                        <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header actions start -->

        <!-- Header profile start -->
        <div class="header-profile d-flex align-items-center">
            <div class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span class="user-name d-none d-md-block">{{Auth::user()->name}}</span>
                    <span class="avatar">
									<img src="{{asset('assets/images/user7.png')}}" alt="Admin Templates" />
									<span class="status online"></span>
								</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <a href="profile.html">Profile</a>
                        <a href="account-settings.html">Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header profile end -->

    </div>
    <!-- Header actions ccontainer end -->

</div>
