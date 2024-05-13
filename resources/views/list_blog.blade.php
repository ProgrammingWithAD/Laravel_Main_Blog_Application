@extends('layout.test')

@section('content')
<link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bs4.css')}}" />
    <div class="main-content" id="miniaresult">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                   
                    <div class="col-md-12">
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
                        url: "{{route('blog-list')}}",
                        dataType: 'json'
                    },
                    order: [[0, "asc"]],
                    columns: [
                        {
                            data: 'id',
                            title: 'ID',
                            orderable: false,
                            visible: true,
                        },
                        {
                            data: 'blog_title',
                            title: 'Blog Title',
                            orderable: false
                        },
                        {
                            data: 'blog_thumbnail',
                            title: 'Blog Thumbnail',
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
            dhUrl: "{{ route('blog.delete', ['id' => ':id']) }}".replace(':id', id), 
           
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
