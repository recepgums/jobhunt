@extends('admin.layout.app')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

                            <div class="row y-gap-20 justify-between pt-15">
                                <div class="col text-right">
                                    <a href="{{route('admin.faq.update',$faq->id)}}">
                                        <button type="submit" class="button -md -purple-1 text-white float-right">
                                            Update
                                        </button>
                                    </a>
                                    <a href="{{route('admin.faq.destroy',$faq->id)}}">
                                        <button type="submit" class="button -md -red-1 text-white float-right">
                                            Delete
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100 p-3">
                               <div>
                                   <span>
                                       <h3>
                                           Question
                                       </h3>
                                       {{$faq->question}}
                                   </span>
                               </div>
                                <div>
                                   <span>
                                       <h3>
                                           Answer
                                       </h3>
                                       {{$faq->answer}}
                                   </span>
                                </div>
                                <div>
                                   <span>
                                       <h3>
                                           Order
                                       </h3>
                                       {{$faq->order}}
                                   </span>
                                </div>
                                <div>
                                   <span>
                                       <h3>
                                            Is Published
                                       </h3>
                                       {{$faq->is_published}}
                                   </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush
