 @extends('layouts.app')
 @section('title', 'Dashboard')

 @section('content')<!-- ========== section start ========== -->
     <section class="section">
         <div class="container-fluid">
             <!-- ========== title-wrapper start ========== -->
             <div class="title-wrapper pt-30">
                 <div class="row align-items-center">
                     <div class="col-md-6">
                         <div class="title">
                             <h2>Dashboard</h2>
                         </div>
                     </div>
                 </div>
                 <!-- end row -->
             </div>
             <!-- ========== title-wrapper end ========== -->
             <div class="row">
                 <div class="col-xl-3 col-lg-4 col-sm-6">
                     <div class="icon-card mb-30">
                         <div class="icon purple">
                             <i class="lni lni-cart-full"></i>
                         </div>
                         <div class="content">
                             <h6 class="mb-10">New Orders</h6>
                             <h3 class="text-bold mb-10">34567</h3>
                             <p class="text-sm text-success">
                                 <i class="lni lni-arrow-up"></i> +2.00%
                                 <span class="text-gray">(30 days)</span>
                             </p>
                         </div>
                     </div>
                     <!-- End Icon Cart -->
                 </div>
                 <!-- End Col -->
                 <div class="col-xl-3 col-lg-4 col-sm-6">
                     <div class="icon-card mb-30">
                         <div class="icon success">
                             <i class="lni lni-dollar"></i>
                         </div>
                         <div class="content">
                             <h6 class="mb-10">Total Income</h6>
                             <h3 class="text-bold mb-10">$74,567</h3>
                             <p class="text-sm text-success">
                                 <i class="lni lni-arrow-up"></i> +5.45%
                                 <span class="text-gray">Increased</span>
                             </p>
                         </div>
                     </div>
                     <!-- End Icon Cart -->
                 </div>
                 <!-- End Col -->
                 <div class="col-xl-3 col-lg-4 col-sm-6">
                     <div class="icon-card mb-30">
                         <div class="icon primary">
                             <i class="lni lni-credit-cards"></i>
                         </div>
                         <div class="content">
                             <h6 class="mb-10">Total Expense</h6>
                             <h3 class="text-bold mb-10">$24,567</h3>
                             <p class="text-sm text-danger">
                                 <i class="lni lni-arrow-down"></i> -2.00%
                                 <span class="text-gray">Expense</span>
                             </p>
                         </div>
                     </div>
                     <!-- End Icon Cart -->
                 </div>
                 <!-- End Col -->
                 <div class="col-xl-3 col-lg-4 col-sm-6">
                     <div class="icon-card mb-30">
                         <div class="icon orange">
                             <i class="lni lni-user"></i>
                         </div>
                         <div class="content">
                             <h6 class="mb-10">New User</h6>
                             <h3 class="text-bold mb-10">34567</h3>
                             <p class="text-sm text-danger">
                                 <i class="lni lni-arrow-down"></i> -25.00%
                                 <span class="text-gray"> Earning</span>
                             </p>
                         </div>
                     </div>
                     <!-- End Icon Cart -->
                 </div>
                 <!-- End Col -->
             </div>
             <!-- End Row -->
             <div class="row">
                 <div class="col-lg-7">
                     <div class="card-style mb-30">
                         <div class="title d-flex flex-wrap justify-content-between">
                             <div class="left">
                                 <h6 class="text-medium mb-10">Yearly Stats</h6>
                                 <h3 class="text-bold">$245,479</h3>
                             </div>
                             <div class="right">
                                 <div class="select-style-1">
                                     <div class="select-position select-sm">
                                         <select class="light-bg">
                                             <option value="">Yearly</option>
                                             <option value="">Monthly</option>
                                             <option value="">Weekly</option>
                                         </select>
                                     </div>
                                 </div>
                                 <!-- end select -->
                             </div>
                         </div>
                         <!-- End Title -->
                         <div class="chart">
                             <canvas id="Chart1" style="width: 100%; height: 400px; margin-left: -35px;"></canvas>
                         </div>
                         <!-- End Chart -->
                     </div>
                 </div>
                 <!-- End Col -->
                 <div class="col-lg-5">
                     <div class="card-style mb-30">
                         <div class="title d-flex flex-wrap align-items-center justify-content-between">
                             <div class="left">
                                 <h6 class="text-medium mb-30">Sales/Revenue</h6>
                             </div>
                             <div class="right">
                                 <div class="select-style-1">
                                     <div class="select-position select-sm">
                                         <select class="light-bg">
                                             <option value="">Yearly</option>
                                             <option value="">Monthly</option>
                                             <option value="">Weekly</option>
                                         </select>
                                     </div>
                                 </div>
                                 <!-- end select -->
                             </div>
                         </div>
                         <!-- End Title -->
                         <div class="chart">
                             <canvas id="Chart2" style="width: 100%; height: 400px; margin-left: -45px;"></canvas>
                         </div>
                         <!-- End Chart -->
                     </div>
                 </div>
                 <!-- End Col -->
             </div>


         </div>
         <!-- end container -->
     </section>
     <!-- ========== section end ========== -->
 @endsection
