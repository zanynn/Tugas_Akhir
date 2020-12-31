@extends('admin.layouts.master')

@section('title', 'Data Kategori Produk | MZ.ID')

@section('content')
<section class="users-list-wrapper">
    <div class="users-list-filter px-1">
        <form>
            <div class="row border border-light rounded py-2 mb-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-verified">Verified</label>
                    <fieldset class="form-group">
                        <select class="form-control" id="users-list-verified">
                            <option value="">Any</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-role">Category</label>
                    <fieldset class="form-group">
                        <select class="form-control" id="users-list-role">
                            <option value="">Any</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Shoes">Shoes</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-status">Harga</label>
                    <fieldset class="form-group">
                        <select class="form-control" id="users-list-status">
                            <option value="">Any</option>
                            <option value="2">2</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                    <button class="btn btn-block btn-primary glow">Show</button>
                </div>
            </div>
        </form>
    </div>
    <div class="users-list-table">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <!-- datatable start -->
                    <div class="table-responsive">
                        <table id="users-list-datatable" class="table">
                            <thead>
                                <tr style="text-align: center; vertical-align: middle;">
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Kategori Induk</th>
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <?php
                                $parent_cates = DB::table('categories')->where('id', $category->parent_id)->get();
                                $i++;
                                ?>
                                <tr style="text-align: center; vertical-align: middle;">
                                    <td>{{$i}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @foreach($parent_cates as $parent_cate)
                                        {{$parent_cate->name}}
                                        @endforeach
                                    </td>
                                    <td>{{$category->created_at->diffForHumans()}}</td>
                                    <td>{{($category->status==0)?' Disabled':'Enable'}}</td>
                                    <td>
                                        <a href="/admin/category/edit/{{$category->id}}" class="badge badge-warning">Edit</a>
                                        <a href="#" class="badge badge-danger delete" category-id="{{$category->id}}" category-name="{{$category->name}}">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- datatable ends -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- users list ends -->
<!-- </div>
    </div>
</div> -->
@endsection
@section('footer')
<script>
    $('.delete').click(function() {
        var category_id = $(this).attr('category-id');
        var category_name = $(this).attr('category-name');
        swal({
                title: "Apakah anda yakin?",
                text: "Menghapus pada data kategori " + category_name + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/category/delete/" + category_id;
                }
            });
    });
</script>
@endsection