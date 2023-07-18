<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.head')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('layout.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
            <!--Tabel-->
            <div class="container mt-5">
              <div class="row">
                  <div class="col-lg-8">
                  <h1>CRUD LARAVEL AJAX</h1>
                  <button class="btn btn-primary" onclick="create()">+Tambah Data</button>
                  <div id="read" class="md-3"></div>
                  </div>
              </div>
          </div>
            <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="page" class="p-2"></div>
        </div>
      </div>
    </div>
  </div>
    <!---->
    
            <!---->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
@include('layout.foot')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('layout.script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css"></script>
<script>

  //
  $(document).ready(function(){
        read();           
  }); //agar langsung menjalankan fungsi read
            
  //tampil data tabel
  function read(){
    $.get("{{url('read')}}", {}, function(data, status){
        $("#read").html(data);
    });
  }

  //Tampil Modal Dan Isi form Tambah Data
  function create(){

    $.get("{{url('create')}}", {}, function(data, status){
        $("#exampleModalLabel").html("Tambahkan Data");
        $("#page").html(data);
        $("#exampleModal").modal('show');
        $("#error").html(data);
    
    });

    //Simpan data yang diinput dair modal tambah data
  } function store(){
         var name= { 
          'name': $("#name").val(),
        }
         $.ajax({
            type:"get",
            url:"{{url('store')}}",
            data: name,
            success:function(){
                $(".btn-close").click();
                // $("#page").html()
                read();}
         });
  }
  //tampil modal dan isi form edit data     
  function show(id){
    $.get("{{url('show')}}/" + id, {}, function(data, status){
        $("#exampleModalLabel").html("Edit Data");
        $("#page").html(data);
        $("#exampleModal").modal('show');
    });
    
    //ubah/edit data
  }function update(id){
         var name= { 
         'name': $("#name").val(),
        }
         $.ajax({
            type:"get",
            url:"{{url('update')}}/" + id, //mendapatkan url form update beserta parameter id
            data: name,
            success:function(){
                $(".btn-close").click();
                // $("#page").html()
                read();}
         });

         //hapus data
  }      function destroy(id){
    Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.isConfirmed) {

         Swal.fire({
         position: 'top-end',
         icon: 'success',
         title: 'Your work has been saved',
         showConfirmButton: false,
         timer: 1500
})

$.ajax({
            type:"get",
            url:"{{url('destroy')}}/" + id,
            success:function(){
                read();}
         });
    
}
})
  }  

</script>
</body>
</html>
