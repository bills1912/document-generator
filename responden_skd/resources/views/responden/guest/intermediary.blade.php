@extends('landing_page.landing_page_layout')

@section('landing_page')
    <div class="container mt-3 hidden">
        <div class="row flex-lg-nowrap ">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-md-11 mb-3">
                        <h4>Form Permintaan Data</h4>
                        <div class="card border-0 shadow ">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px">
                                                <div class="d-flex justify-content-center align-items-center rounded"
                                                    style="
                              height: 140px;
                              background-color: rgb(233, 236, 239);
                            ">
                                                    <span
                                                        style="
                                color: rgb(166, 168, 170);
                                font: bold 8pt Arial;
                              ">140x140</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                                                    {{ Auth::user()->name }}
                                                </h4>
                                                <p class="mb-0">{{ Auth::user()->email }}</p>
                                                <div class="text-muted">
                                                    <small>Last seen 2 hours ago</small>
                                                </div>
                                                <div class="mt-2">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <span>Change Photo</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <span
                                                    class="badge badge-secondary">{{ Auth::user()->user_token == 1 ? 'Administrator' : 'Guest' }}</span>
                                                <div class="text-muted">
                                                    <small>Joined:</small><small
                                                        class="pl-1">{{ Auth::user()->created_at }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="{{ url('/guest/permintaan_data') }}"
                                                class="nav-link {{ Request::is('guest/permintaan_data') ? 'active' : '' }}">Tabel
                                                Permintaan Data</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/guest/permintaan_data/form_permintaan_data') }}"
                                                class="nav-link {{ Request::is('guest/permintaan_data/form_permintaan_data') ? 'active' : '' }}">Form
                                                Permintaan Data</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            @yield('guest_permintaan_data')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
