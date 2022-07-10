@extends('layout.app')


@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Blog</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-sec">
                            <div class="row" id="masonry">
                                @forelse($blogs as $blog)
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                        <div class="my-blog">
                                            <div class="blog-thumb">
                                                <a href="{{route('blog.show',$blog->id)}}" title="">
                                                    <img src="{{$blog->cover_image}}"alt=""/>
                                                </a>
                                                <div class="blog-metas">
                                                    <a href="#" title="">{{$blog->created_at->format('M d, Y')}}</a>
                                                    <a href="#" title="">0 Comments</a>
                                                </div>
                                            </div>
                                            <div class="blog-details">
                                                <h3>
                                                    <a href="{{route('blog.show',$blog->id)}}" title="">
                                                        {{$blog->title}}
                                                    </a>
                                                </h3>
                                                <p>
                                                    {{$blog->summary}}
                                                </p>
                                                <a href="{{route('blog.show',$blog->id)}}" title="">Read More
                                                    <i class="la la-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        {{ $blogs->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/isotop.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
@endpush
