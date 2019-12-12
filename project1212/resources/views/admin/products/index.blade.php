@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">產品管理 - Index</div>

                <div class="card-body">
                    <a class="btn btn-success" href="/admin/products/create">新增產品</a>
                    <hr>

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>標題(title)</th>
                                <th>圖片(img)</th>
                                <th>排序(sort)</th>
                                <th width="120">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->title}}</td>
                                    <td>{{ $item->img}}</td>
                                    <td>{{ $item->sort}}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="/admin/products/edit/{{ $item->id}}">編輯</a>
                                        <a class="btn btn-danger  btn-sm" href="#" data-itemid="{{$item->id}}">刪除</a>

                                        <form class="destroy-form" data-itemid="{{$item->id}}"
                                            action="/admin/products/destroy/{{$item->id}}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>$(document).ready(function() {
    $('#example').DataTable({
        "order": [1,"dasc"]
    });

    $('.btn-danger').click(function(){
                event.preventDefault();
                var r = confirm("你確定要刪除此項目嗎?");
                if (r == true) {
                    var itemid = $(this).data("itemid");
                    $(`.destroy-form[data-itemid="${itemid}"]`)[0].submit();
                }
            });
});
</script>

@endsection
