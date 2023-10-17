<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Total Users<span class="badge badge-subtle-warning rounded-pill ms-2">-0.23%</span></h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>0</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Active Users<span class="badge badge-subtle-info rounded-pill ms-2">0.0%</span></h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>0</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Inactive Users<span class="badge badge-subtle-success rounded-pill ms-2">9.54%</span></h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" data-countup='{"endValue":43594,"prefix":"$"}'>0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card py-3 mb-3">
            <div class="card-body py-3">
              <div class="row g-0">
                <div class="col-6 col-md-4 border-200 border-bottom border-end pb-4">
                  <h6 class="pb-1 text-700">User Queries </h6>
                  <p class="font-sans-serif lh-1 mb-1 fs-2">15,450 </p>
                  <div class="d-flex align-items-center">
                    <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                    <h6 class="fs--2 ps-3 mb-0 text-primary"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->21.8%</h6>
                  </div>
                </div>
                <div class="col-6 col-md-4 border-200 border-bottom border-end-md pb-4 ps-3">
                  <h6 class="pb-1 text-700">Queries Answered </h6>
                  <p class="font-sans-serif lh-1 mb-1 fs-2">1,054 </p>
                  <div class="d-flex align-items-center">
                    <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                    <h6 class="fs--2 ps-3 mb-0 text-warning"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->21.8%</h6>
                  </div>
                </div>
                <div class="col-6 col-md-4 border-200 border-bottom border-end border-end-md-0 pb-4 pt-4 pt-md-0 ps-md-3">
                  <h6 class="pb-1 text-700">Tokens Used </h6>
                  <p class="font-sans-serif lh-1 mb-1 fs-2">$145.65 </p>
                  <div class="d-flex align-items-center">
                    <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                    <h6 class="fs--2 ps-3 mb-0 text-success"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->21.8%</h6>
                  </div>
                </div>
                <div class="col-6 col-md-4 border-200 border-bottom border-bottom-md-0 border-end-md pt-4 pb-md-0 ps-3 ps-md-0">
                  <h6 class="pb-1 text-700">Token Balance </h6>
                  <p class="font-sans-serif lh-1 mb-1 fs-2">$100.26 </p>
                  <div class="d-flex align-items-center">
                    <h6 class="fs--1 text-500 mb-0">$109.65 </h6>
                    <h6 class="fs--2 ps-3 mb-0 text-danger"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->21.8%</h6>
                  </div>
                </div>
                <div class="col-6 col-md-4 border-200 border-bottom-md-0 border-end pt-4 pb-md-0 ps-md-3">
                  <h6 class="pb-1 text-700">Sms Received </h6>
                  <p class="font-sans-serif lh-1 mb-1 fs-2">$365.53 </p>
                  <div class="d-flex align-items-center">
                    <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                    <h6 class="fs--2 ps-3 mb-0 text-success"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->21.8%</h6>
                  </div>
                </div>
                <div class="col-6 col-md-4 pb-0 pt-4 ps-3">
                  <h6 class="pb-1 text-700">Sms Sent </h6>
                  <p class="font-sans-serif lh-1 mb-1 fs-2">861 </p>
                  <div class="d-flex align-items-center">
                    <h6 class="fs--1 text-500 mb-0">13,675 </h6>
                    <h6 class="fs--2 ps-3 mb-0 text-info"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->21.8%</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <div class="row g-3 mb-3">

            <div class="col-xxl-4">
              <div class="card h-100">
                <div class="card-header">
                  <h6 class="mb-0">Recent Activity</h6>
                </div>
                <div class="card-body scrollbar recent-activity-body-height ps-2">
                  <div class="row g-3 timeline timeline-primary timeline-past pb-x1">
                    <div class="col-auto ps-4 ms-2">
                      <div class="ps-2">
                        <div class="icon-item icon-item-sm rounded-circle bg-200 shadow-none"><svg class="svg-inline--fa fa-envelope fa-w-16 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg><!-- <span class="text-primary fas fa-envelope"></span> Font Awesome fontawesome.com --></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row gx-0 border-bottom pb-x1">
                        <div class="col">
                          <h6 class="text-800 mb-1">Antony Hopkins sent an Email</h6>
                          <p class="fs--1 text-600 mb-0">Got an email for previous year sale report</p>
                        </div>
                        <div class="col-auto">
                          <p class="fs--2 text-500 mb-0">2m ago</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3 timeline timeline-primary timeline-past pb-x1">
                    <div class="col-auto ps-4 ms-2">
                      <div class="ps-2">
                        <div class="icon-item icon-item-sm rounded-circle bg-200 shadow-none"><svg class="svg-inline--fa fa-archive fa-w-16 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="archive" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32V160H32v288zm160-212c0-6.6 5.4-12 12-12h104c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H204c-6.6 0-12-5.4-12-12v-8zM480 32H32C14.3 32 0 46.3 0 64v48c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16V64c0-17.7-14.3-32-32-32z"></path></svg><!-- <span class="text-primary fas fa-archive"></span> Font Awesome fontawesome.com --></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row gx-0 border-bottom pb-x1">
                        <div class="col">
                          <h6 class="text-800 mb-1">Emma archived a board</h6>
                          <p class="fs--1 text-600 mb-0">A finished project's board is archived recently</p>
                        </div>
                        <div class="col-auto">
                          <p class="fs--2 text-500 mb-0">26m ago</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3 timeline timeline-primary timeline-current pb-x1">
                    <div class="col-auto ps-4 ms-2">
                      <div class="ps-2">
                        <div class="icon-item icon-item-sm rounded-circle bg-200 shadow-none"><svg class="svg-inline--fa fa-code fa-w-20 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="code" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M278.9 511.5l-61-17.7c-6.4-1.8-10-8.5-8.2-14.9L346.2 8.7c1.8-6.4 8.5-10 14.9-8.2l61 17.7c6.4 1.8 10 8.5 8.2 14.9L293.8 503.3c-1.9 6.4-8.5 10.1-14.9 8.2zm-114-112.2l43.5-46.4c4.6-4.9 4.3-12.7-.8-17.2L117 256l90.6-79.7c5.1-4.5 5.5-12.3.8-17.2l-43.5-46.4c-4.5-4.8-12.1-5.1-17-.5L3.8 247.2c-5.1 4.7-5.1 12.8 0 17.5l144.1 135.1c4.9 4.6 12.5 4.4 17-.5zm327.2.6l144.1-135.1c5.1-4.7 5.1-12.8 0-17.5L492.1 112.1c-4.8-4.5-12.4-4.3-17 .5L431.6 159c-4.6 4.9-4.3 12.7.8 17.2L523 256l-90.6 79.7c-5.1 4.5-5.5 12.3-.8 17.2l43.5 46.4c4.5 4.9 12.1 5.1 17 .6z"></path></svg><!-- <span class="text-primary fas fa-code"></span> Font Awesome fontawesome.com --></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row gx-0 border-bottom pb-x1">
                        <div class="col">
                          <h6 class="text-800 mb-1">Falcon v3.0.0 released with new features</h6>
                          <p class="fs--1 text-600 mb-0">Falcon new version is released successfully with new Dashboards</p>
                        </div>
                        <div class="col-auto">
                          <p class="fs--2 text-500 mb-0">1h ago</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3 timeline timeline-primary  pb-x1">
                    <div class="col-auto ps-4 ms-2">
                      <div class="ps-2">
                        <div class="icon-item icon-item-sm rounded-circle bg-200 shadow-none"><svg class="svg-inline--fa fa-code-branch fa-w-12 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="code-branch" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M384 144c0-44.2-35.8-80-80-80s-80 35.8-80 80c0 36.4 24.3 67.1 57.5 76.8-.6 16.1-4.2 28.5-11 36.9-15.4 19.2-49.3 22.4-85.2 25.7-28.2 2.6-57.4 5.4-81.3 16.9v-144c32.5-10.2 56-40.5 56-76.3 0-44.2-35.8-80-80-80S0 35.8 0 80c0 35.8 23.5 66.1 56 76.3v199.3C23.5 365.9 0 396.2 0 432c0 44.2 35.8 80 80 80s80-35.8 80-80c0-34-21.2-63.1-51.2-74.6 3.1-5.2 7.8-9.8 14.9-13.4 16.2-8.2 40.4-10.4 66.1-12.8 42.2-3.9 90-8.4 118.2-43.4 14-17.4 21.1-39.8 21.6-67.9 31.6-10.8 54.4-40.7 54.4-75.9zM80 64c8.8 0 16 7.2 16 16s-7.2 16-16 16-16-7.2-16-16 7.2-16 16-16zm0 384c-8.8 0-16-7.2-16-16s7.2-16 16-16 16 7.2 16 16-7.2 16-16 16zm224-320c8.8 0 16 7.2 16 16s-7.2 16-16 16-16-7.2-16-16 7.2-16 16-16z"></path></svg><!-- <span class="text-primary fas fa-code-branch"></span> Font Awesome fontawesome.com --></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row gx-0 border-bottom pb-x1">
                        <div class="col">
                          <h6 class="text-800 mb-1">Rowan shared a link to the board</h6>
                          <p class="fs--1 text-600 mb-0">A link is shared with attachments</p>
                        </div>
                        <div class="col-auto">
                          <p class="fs--2 text-500 mb-0">3h ago</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3 timeline timeline-primary">
                    <div class="col-auto ps-4 ms-2">
                      <div class="ps-2">
                        <div class="icon-item icon-item-sm rounded-circle bg-200 shadow-none"><svg class="svg-inline--fa fa-file-code fa-w-12 text-primary" aria-hidden="true" focusable="false" data-prefix="far" data-icon="file-code" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M149.9 349.1l-.2-.2-32.8-28.9 32.8-28.9c3.6-3.2 4-8.8.8-12.4l-.2-.2-17.4-18.6c-3.4-3.6-9-3.7-12.4-.4l-57.7 54.1c-3.7 3.5-3.7 9.4 0 12.8l57.7 54.1c1.6 1.5 3.8 2.4 6 2.4 2.4 0 4.8-1 6.4-2.8l17.4-18.6c3.3-3.5 3.1-9.1-.4-12.4zm220-251.2L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zM256 51.9l76.1 76.1H256zM336 464H48V48h160v104c0 13.3 10.7 24 24 24h104zM209.6 214c-4.7-1.4-9.5 1.3-10.9 6L144 408.1c-1.4 4.7 1.3 9.6 6 10.9l24.4 7.1c4.7 1.4 9.6-1.4 10.9-6L240 231.9c1.4-4.7-1.3-9.6-6-10.9zm24.5 76.9l.2.2 32.8 28.9-32.8 28.9c-3.6 3.2-4 8.8-.8 12.4l.2.2 17.4 18.6c3.3 3.5 8.9 3.7 12.4.4l57.7-54.1c3.7-3.5 3.7-9.4 0-12.8l-57.7-54.1c-3.5-3.3-9.1-3.2-12.4.4l-17.4 18.6c-3.3 3.5-3.1 9.1.4 12.4z"></path></svg><!-- <span class="text-primary far fa-file-code"></span> Font Awesome fontawesome.com --></div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row gx-0">
                        <div class="col">
                          <h6 class="text-800 mb-1">Anna updated a file</h6>
                          <p class="fs--1 text-600 mb-0">Fixed some bugs and spelling errors on this update</p>
                        </div>
                        <div class="col-auto">
                          <p class="fs--2 text-500 mb-0">4h ago</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <div class="row g-3 mb-3">
                    <div class="col-xxl-8">
                        <div class="card overflow-hidden mb-3">
                            <div class="card-header audience-chart-header p-0 bg-light scrollbar-overlay">
                                <ul class="nav nav-tabs border-0 chart-tab flex-nowrap" id="audience-chart-tab" role="tablist">
                                    <li class="nav-item" role="presentation"><a class="nav-link mb-0 active" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">
                                            <div class="audience-tab-item p-2 pe-4">
                                                <h6 class="text-800 fs--2 text-nowrap">Users</h6>
                                                <h5 class="text-800">3.9K</h5>
                                                <div class="d-flex align-items-center"><span class="fas fa-caret-up text-success"></span>
                                                    <h6 class="fs--2 mb-0 ms-2 text-success">62.0%</h6>
                                                </div>
                                            </div>
                                        </a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link mb-0" id="sessions-tab" data-bs-toggle="tab" href="#sessions" role="tab" aria-controls="sessions" aria-selected="false">
                                            <div class="audience-tab-item p-2 pe-4">
                                                <h6 class="text-800 fs--2 text-nowrap">Sessions</h6>
                                                <h5 class="text-800">6.3K</h5>
                                                <div class="d-flex align-items-center"><span class="fas fa-caret-up text-success"></span>
                                                    <h6 class="fs--2 mb-0 ms-2 text-success">46.2%</h6>
                                                </div>
                                            </div>
                                        </a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link mb-0" id="rate-tab" data-bs-toggle="tab" href="#rate" role="tab" aria-controls="rate" aria-selected="false">
                                            <div class="audience-tab-item p-2 pe-4">
                                                <h6 class="text-800 fs--2 text-nowrap">Bounce Rate</h6>
                                                <h5 class="text-800">9.49%</h5>
                                                <div class="d-flex align-items-center"><span class="fas fa-caret-down text-warning"></span>
                                                    <h6 class="fs--2 mb-0 ms-2 text-warning">56.1%</h6>
                                                </div>
                                            </div>
                                        </a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link mb-0" id="duration-tab" data-bs-toggle="tab" href="#duration" role="tab" aria-controls="duration" aria-selected="false">
                                            <div class="audience-tab-item p-2 pe-4">
                                                <h6 class="text-800 fs--2 text-nowrap">Session Duration</h6>
                                                <h5 class="text-800">4m 03s</h5>
                                                <div class="d-flex align-items-center"><span class="fas fa-caret-down text-warning"></span>
                                                    <h6 class="fs--2 mb-0 ms-2 text-warning">32.2%</h6>
                                                </div>
                                            </div>
                                        </a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="users" role="tabpanel" aria-labelledby="users-tab">
                                        <!-- Find the JS file for the following chart at: src/js/charts/echarts/audience.js-->
                                        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                                        <div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
                                    </div>
                                    <div class="tab-pane" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
                                        <div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
                                    </div>
                                    <div class="tab-pane" id="rate" role="tabpanel" aria-labelledby="rate-tab">
                                        <div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
                                    </div>
                                    <div class="tab-pane" id="duration" role="tabpanel" aria-labelledby="duration-tab">
                                        <div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-light py-2">
                                <div class="row flex-between-center g-0">
                                    <div class="col-auto">
                                        <select class="form-select form-select-sm audience-select-menu">
                                            <option value="week" selected="selected">Last 7 days</option>
                                            <option value="month">Last month</option>
                                        </select>
                                    </div>
                                    <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">Visitors overview<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-5.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <div class="row g-2 align-items-sm-center">
                                    <div class="col-auto"><img src="../assets/img/icons/connect-circle.png" alt="" height="55" /></div>
                                    <div class="col">
                                        <div class="row align-items-center">
                                            <div class="col col-lg-8">
                                                <h5 class="fs-0 mb-3 mb-sm-0 text-primary">Access the system's raw logs; i.e. Error and Access logs to review traffic on the site</h5>
                                            </div>
                                            <div class="col-12 col-sm-auto ms-auto">
                                                <a href="{{url('communication-log-viewer')}}" class="btn btn-falcon-primary" type="button">Access Logs</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

</x-app-layout>
