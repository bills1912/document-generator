@extends('dashboard')

@section('container')
    <h1 class="mt-4">Summary Responden</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Summary responden berdasarkan total responden per bulan dan total responden berdasarkan asal instansi</li>
    </ol>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Total Responden Berdasarkan Waktu
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Total Responden Berdasarkan Asal Instansi
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
@endsection
