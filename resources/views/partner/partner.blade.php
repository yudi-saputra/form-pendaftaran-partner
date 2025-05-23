 @extends('layouts.app')
 @section('title', 'Partner')


 @section('content')
     <!-- ========== tables-wrapper start ========== -->
     <section class="table-components">
         <div class="container-fluid">
             <!-- ========== title-wrapper start ========== -->
             <div class="title-wrapper pt-30">
                 <div class="row align-items-center">
                     <div class="col-md-6">
                         <div class="title">
                             <h2>Daftar Partnership</h2>
                         </div>
                     </div>
                 </div>
                 <!-- end row -->
             </div>
             <!-- ========== title-wrapper end ========== -->

             <!-- ========== tables-wrapper start ========== -->
             <div class="tables-wrapper">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card-style mb-30">
                             {{-- <h6 class="mb-10">Daftar Partnership</h6> --}}
                             {{-- <p class="text-sm mb-20">
                                 Tampilan ini menyajikan daftar perusahaan mitra yang terlibat dalam perjanjian berbagi
                                 data, dikategorikan berdasarkan jenis kemitraan dan tipe akun.
                             </p> --}}
                             <div class="table-wrapper table-responsive">
                                 <table class="table table-hover">
                                     <thead>
                                         <tr>
                                             <th class="text-center">
                                                 <h6>No</h6>
                                             </th>
                                             <th class="">
                                                 <h6>Nama Perusahaan</h6>
                                             </th>
                                             <th class="">
                                                 <h6>Pemilik</h6>
                                             </th>
                                             <th>
                                                 <h6>Mobile</h6>
                                             </th>
                                             <th>
                                                 <h6>Email</h6>
                                             </th>
                                             <th class="py-0">
                                                 <h6>CRM</h6>
                                             </th>
                                             <th class="text-center">
                                                 <h6>Aksi</h6>
                                             </th>
                                         </tr>
                                         <!-- end table row-->
                                     </thead>
                                     <tbody>
                                         @foreach ($partners as $partner)
                                             <tr>
                                                 <td class="text-center">
                                                     <p class="text-sm text-medium text-dark">{{ $loop->iteration }}</p>
                                                 </td>
                                                 <td>
                                                     <p class="text-sm text-medium text-dark">{{ $partner->company_name }}
                                                     </p>
                                                 </td>
                                                 <td>
                                                     <p class="text-sm text-medium text-dark">{{ $partner->owner_name }}</p>
                                                 </td>
                                                 <td>
                                                     <p class="text-sm text-medium text-dark">{{ $partner->owner_mobile }}
                                                     </p>
                                                 </td>
                                                 <td>
                                                     <p class="text-sm text-medium text-dark">{{ $partner->owner_email }}
                                                     </p>
                                                 </td>
                                                 <td>
                                                     <p class="text-sm text-medium text-dark">{{ $partner->crm->name }}</p>
                                                 </td>
                                                 <td>
                                                     <div class="gap-3 d-flex justify-content-center">
                                                         <a href="" class="text-gray">
                                                             <i class="mdi mdi-eye"></i>
                                                         </a>
                                                         <a href="" class="text-primary">
                                                             <i class="mdi mdi-file-document-edit"></i>
                                                         </a>
                                                         <form action="" method="POST">
                                                             @csrf
                                                             @method('DELETE')
                                                             <a type="submit" class="text-danger"
                                                                 onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                                                     class="mdi mdi-trash-can-outline"></i>
                                                             </a>
                                                     </div>

                                                     </form>
                                                 </td>
                                             </tr>
                                         @endforeach
                                     </tbody>

                                 </table>
                                 <!-- end table -->
                             </div>
                         </div>
                         <!-- end card -->
                     </div>
                     <!-- end col -->
                 </div>
                 <!-- end row -->
             </div>
             <!-- ========== tables-wrapper end ========== -->
         </div>
         <!-- end container -->
     </section>
     <!-- ========== tables-wrapper end ========== -->
 @endsection
