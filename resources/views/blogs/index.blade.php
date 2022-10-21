@extends('layout.app')


@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        </div>
    </section>

    <section class="mt-5">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-sec">
                            <div class="row" id="masonry">
                                @forelse($blogs as $blog)
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" onclick="location.href=`{{route('blog.show',$blog->slug)}}`;" style="cursor:pointer;">
                                        <a href="{{route('blog.show',$blog->slug)}}" title="">
                                            <div class="my-blog">
                                            <div class="blog-thumb">
                                                <a href="{{route('blog.show',$blog->slug)}}" title="">
                                                    <img src="{{$blog->cover_image}}"alt=""/>
                                                </a>
                                                <div class="blog-metas">
                                                    <a href="#" title="">{{$blog->created_at->format('M d, Y')}}</a>
                                                    <a href="#" title="">0 Yorum</a>
                                                </div>
                                            </div>
                                            <div class="blog-details">
                                                <h3>
                                                    <a href="{{route('blog.show',$blog->slug)}}" title="">
                                                        {{$blog->title}}
                                                    </a>
                                                </h3>
                                                <p>
                                                    {{$blog->summary}}
                                                </p>
                                                <a href="{{route('blog.show',$blog->slug)}}" title="">Daha fazla oku
                                                    <i class="la la-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        </a>
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
