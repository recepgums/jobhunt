@extends('layout.app')


@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>{{$blog->title}}</h3>
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
                    <div class="col-lg-9 column">
                        <div class="blog-single">
                            <div class="bs-thumb"><img src="{{$blog->cover_image ?? 'https://place-hold.it/834x340'}}" alt="{{$blog->title}}" /></div>

                            <h2>{{$blog->title}}</h2>
                              {!! $blog->content !!}

                            <div class="post-navigation ">
                                @isset($prevBlog)
                                <div class="post-hist prev">
                                    <a href="{{route('blog.show',$prevBlog->slug)}}" ><i class="la la-arrow-left"></i><span class="post-histext">Önceki Blog<i>{{$prevBlog->title}}</i></span></a>
                                </div>
                                @endisset
                                @isset($nextBlog)
                                <div class="post-hist next">
                                    <a href="{{route('blog.show',$nextBlog->slug)}}" title=""><span class="post-histext">Sonraki Blog<i>{{$nextBlog->title}}</i></span><i class="la la-arrow-right"></i></a>
                                </div>
                                @endisset
                            </div>

                        </div>
                    </div>
                    <aside class="col-lg-3 column">
                        <div class="widget">
                            <h3>Güncel Bloglar</h3>
                            <div class="post_widget">
                                @forelse($recentBlogs as $recentBlog)
                                    <div class="mini-blog" style="cursor:pointer;" onclick="location.href=`{{route('blog.show',$recentBlog->slug)}}`;">
                                        <span>
                                            <a href="{{route('blog.show',$recentBlog->slug)}}" title="">
                                                <img src="{{$recentBlog->cover_image ?? 'https://place-hold.it/74x64'}}" alt="{{$recentBlog->title}}" />
                                            </a>
                                        </span>
                                        <div class="mb-info">
                                            <h3>
                                                <a href="{{route('blog.show',$recentBlog->slug)}}" title="">{{$recentBlog->title}}</a>
                                            </h3>
                                            <span>
                                                {{$recentBlog->created_at->format('M d, Y')}}
                                            </span>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/isotop.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
@endpush
