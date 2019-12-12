@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">產品管理 - Edit</div>

                <div class="card-body">
                    <form method="post" action="/admin/products/update/{{$item->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="img" class="col-sm-2 col-form-label">產品圖片</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" id="img" name="img"required>
                            </div>
                          </div>
                        <div class="form-group row">
                          <label for="title" class="col-sm-2 col-form-label">標題</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title"required>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">敘述</label>
                            <div class="col-sm-10">
                             <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                            </div>
                          </div>
                        <div class="form-group row">
                          <label for="sort" class="col-sm-2 col-form-label">sort</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="sort" name="sort"value="1" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')


@endsection
