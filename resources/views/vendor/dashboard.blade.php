@extends('vendor.template.layout')
@php use Illuminate\Support\Facades\DB; @endphp
@section('header')
    <link href="{{ asset('') }}admin-assets/assets/css/support-chat.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}admin-assets/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}admin-assets/plugins/charts/chartist/chartist.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}admin-assets/assets/css/default-dashboard/style.css" rel="stylesheet" type="text/css" />
@stop

<?php 
$role = Auth::user()->role;

if($role == 4) //store manager
{
    $privileges = \App\Models\UserPrivileges::privilege();
    $privileges = json_decode($privileges, true);
} ?>



@section('content')

<div class="row mb-2">
        <div class="col-lg-12 mb-4">
            
            
            <div class="row">
   
   
   <div class="col-xl-3 col-lg-3 col-sm-6 mb-30">
      <a href="{{ url('vendor/coupons') }}" class="icon-card height-100 text-center align-items-center" style="height:100%; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 10px;">
         <div class="icon orange m-0">
               <p>{{$coupons}}</p>
         </div>
         <div class="content m-0">
               <h6 class="mb-0">Voucher</h6>
         </div>
      </a>
      <!-- End Icon Cart -->
   </div>
   

<div class="col-xl-3 col-lg-3 col-sm-6 mb-30">
      <a href="{{ url('vendor/coupon_usage') }}" class="icon-card height-100 text-center align-items-center" style="height:100%; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 10px;">
         <div class="icon orange m-0">
         <p>{{$usage}}</p>
         </div>
         <div class="content m-0">
               <h6 class="mb-0">Voucher Usage</h6>
         </div>
      </a>
      <!-- End Icon Cart -->
   </div>
   <div class="col-xl-3 col-lg-3 col-sm-6 mb-30">
      <a href="{{ url('vendor/reports/customers') }}" class="icon-card height-100 text-center align-items-center" style="height:100%; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 10px;">
         <div class="icon orange m-0">
         <p>{{$customers}}</p>
         </div>
         <div class="content m-0">
               <h6 class="mb-0">Customers</h6>
         </div>
      </a>
      <!-- End Icon Cart -->
   </div>
   
</div>


          








    </div>
@stop

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0-rc"></script>
@stop

@section('script')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line', // also try bar or other graph types

            // The data for our dataset
            data: {
                labels: ["100", "200", "300", "400", "500", "600", "700", "800", "900", "1000", "1100","1200", "1300", "1400", "1500", "1600", "1700"],
                // Information about the dataset
                datasets: [{
                    label: "",
                    fill: true,
                    backgroundColor: 'rgb(204 155 68)',
                    borderColor: 'rgb(235 192 94)',
                    data: [10, 200, 150, 50, 180, 80, 150, 60, 130, 90, 135, 85, 165, 78, 138, 48, 158],
                }]
            },

            // Configuration options
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    x: {
                        position: 'top',
                        grid: {
                            color: '#FAF0E6'
                        },
                        ticks: {
                            maxRotation: 0,
                            minRotation: 0,
                            font: {
                                size: 5
                            }
                        }
                    },
                    y: {
                        grid: {
                            color: '#FAF0E6'
                        },
                        ticks: {
                            display: false
                        }
                        
                    },
                },
                plugins: {
                    legend: {
                        display: false
                    },
                }
            }
        });

        var orderschartctx = document.getElementById("orderschart");
var myChart = new Chart(orderschartctx, {
  type: 'doughnut',
  data: {
    labels: ['Order Pending', 'Order Dispatched', 'Order Completed', 'Order Cancelled'],
    datasets: [{
      label: '',
      data: [12, 19, 3, 5],
      backgroundColor: [
        'rgba(202, 153, 67, 0.8)',
        'rgba(0, 0, 0, 0.8)',
        'rgba(235, 192, 94, 0.8)',
        'rgba(73, 0, 0, 0.8)'
      ],
      borderColor: [
        'rgba(202, 153, 67, 0.8)',
        'rgba(0, 0, 0, 0.8)',
        'rgba(235, 192, 94, 0.8)',
        'rgba(73, 0, 0, 0.8)'
      ],
      borderWidth: 2
    }]
  },
  options:{
    cutout: 60,
    centerPercentage: 80,
    responsive: true,
    maintainAspectRatio: false,
    tooltips: {
        enabled: true
    },
    interaction: {
      intersect: false
    },
    plugins: {
      legend: {
        display: true,
        position: 'bottom',
        
        labels: {
            font: {
                size: 10
            },
            boxWidth: 10
        }
      }
    },
  }
});
    </script>
@stop
