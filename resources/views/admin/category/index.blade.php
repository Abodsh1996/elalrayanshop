@extends('admin.master')

@section('title')
    {{trans('admin_title_page_trans.category')}}
@stop

@section('css')

@stop

@section('title_page')
    {{trans('admin_title_page_trans.category')}}
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
   <div class="card-header">
       <a href="{{route('categories.create')}}" class="btn btn-outline-primary">{{trans('buttons_trans.create')}}</a>
   </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>{{trans('category_trans.name')}}</th>
                <th>{{trans('category_trans.image')}}</th>
                <th>{{trans('category_trans.is_showing')}}</th>
                <th>{{trans('category_trans.is_popular')}}</th>
                <th>{{trans('buttons_trans.Actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($categories as $category)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$category->name}}</td>
                <td><img src="{{Storage::url($category->image)}}" alt="" class="img-thumbnail" style="max-width:100px;"></td>
                <td>
                    @if($category->is_showing == 1)
                        <span class="badge badge-success">{{trans('category_trans.showing')}}</span>
                    @else
                        <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                    @endif
                </td>
                <td>
                    @if($category->is_popular == 1)
                        <span class="badge badge-success">{{trans('category_trans.popular')}}</span>
                    @else
                        <span class="badge badge-danger">{{trans('category_trans.no_popular')}}</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('categories.show',$category->id)}}" class="btn btn-sm btn-outline-success">{{trans('buttons_trans.show')}}</a>
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-outline-warning">{{trans('buttons_trans.edit')}}</a>
                   @include('admin.includes.delete_modal',['type'=>'category','data'=>$category,'routes'=>'categories.destroy'])
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            // });
        });
    </script>
@endsection
