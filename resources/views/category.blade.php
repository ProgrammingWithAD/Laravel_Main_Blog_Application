@extends('layout.test')

@section('content')
<link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bs4.css')}}" />
    <div class="main-content" id="miniaresult">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Category</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ isset($blog) && !empty($blog) ? route('category.update', $blog->id) : route('category') }}" method="post">
                                    <div class="row g-3">

                                        @csrf
                                        <div class="col-md-12 ">
                                            <label for="">Category</label>
                                            <input type="text" name="category" id="category" class="form-control" value="{{ $blog->category ?? '' }}">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-check-circle me-2"></i>SUBMIT DETAILS</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                       <div class="card">
                        <div class="card-header">
                            <h4>List Category</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    
                                </table>
                                </div>
                        </div>
                       </div>
                    </div>
                </div>
                <!-- end page title -->

            </div> <!-- container-fluid -->
        </div>
    </div>
    @include('layout.script')

<script src="{{asset('libs/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
            $(document).ready(function () {
                $.noConflict();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
        
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
        
                $('#datatable').DataTable({
                    ajax: {
                        method: 'POST',
                        url: 'http://127.0.0.1:8000/category-show',
                        dataType: 'json'
                    },
                    order: [[0, "asc"]],
                    columns: [
                        {
                            data: 'id',
                            title: 'ID',
                            orderable: false
                        },
                        {
                            data: 'category',
                            title: 'Blog Category',
                            orderable: false
                        },
                        {
                    data: 'action',
                    title: 'Action',
                    orderable: false,
                    width: '5%',
                }
                    ]
                });
            });


            function delete_row(id){
                
                $.dhConfirm({
                  dhContent: "Are you sure to Delete ?",
                  dhUrl: "{{ route('category.delete', ['id' => ':id']) }}".replace(':id', id), 
                 
                  // This code will be executed after the deletion is confirmed.
                  // You should reload the DataTable here.
                  
             
                });
              //   console.log("fdvgsdfgsg");
              //     $('#table1').DataTable().destroy();
              //     $('#table1').DataTable().draw();
              //     $('#datatable').DataTable().ajax.reload();
              }
</script>
        
@endsection
