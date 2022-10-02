@extends('admin.layout.app')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        table {
            width: 100%;
        }
    </style>
@endpush
@section('content')

    <div class="dashboard__main">
        <div class="dashboard__content bg-light-4">
            <div class="row y-gap-30 pt-30">
                <div class="col-xl-12 col-md-12">
                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                        <div class="d-flex items-center py-20 px-30 border-bottom-light">
                            <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                                <div class="d-flex items-center py-20 px-30 border-bottom-light">
                                    <h2 class="text-17 lh-1 fw-500">Edit Category</h2>
                                </div>

                                <div class="py-30 px-30">
                                    <form class="contact-form row y-gap-30"
                                          enctype="multipart/form-data"
                                          action="{{route('admin.categories.update',$category->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="col-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name</label>
                                            <input name="name" type="text" placeholder="Name"
                                                   value="{{$category->name}}">
                                        </div>

                                        <div class="col-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Main category</label>

                                            <select name="parent_id" class="form-select"
                                                    aria-label="Default select example">
                                                <option value="{{$category->parent->id ?? null}}"
                                                        selected>{{$category->parent->name ?? null}}</option>
                                                @foreach($mainCategories as $mainCategory)
                                                    <option
                                                        value="{{$mainCategory->id}}">{{$mainCategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Description</label>
                                            <textarea name="description" class="form-control"
                                                      id="exampleFormControlTextarea1"
                                                      rows="3">{{$category->description}}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">İmage</label><br/>
                                            <img src="{{$category->default_cover_image ?? null}}"
                                                 style="height: 300px; width: 300px;">
                                            <input type="file" name="image" id="image" class="form-control-file"
                                                   id="exampleFormControlFile1">
                                        </div>

                                        <div class="row y-gap-20 justify-between pt-15">
                                            <div class="col text-right">
                                                <button type="submit"
                                                        class="button -md -purple-1 text-white float-right">Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
@endpush
