@extends('layout.app')

@section('title')
{{$blog->title}}
@endsection
@push('styles')
    <meta name="title" content="{{$blog->title}}">
    <meta name="description" content="{{substr(strip_tags($blog->content), 0, 100)}}">
    <style>
        h1 {
            display: block;
            font-size: 2em;
            margin-top: 0.67em;
            margin-bottom: 0.67em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }
        h2 {
            display: block;
            font-size: 1.5em;
            margin-top: 0.83em;
            margin-bottom: 0.83em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }
        h3 {
            display: block;
            font-size: 1.17em;
            margin-top: 1em;
            margin-bottom: 1em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }
        h4 {
            display: block;
            margin-top: 1.33em;
            margin-bottom: 1.33em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }
        h5 {
            display: block;
            font-size: .83em;
            margin-top: 1.67em;
            margin-bottom: 1.67em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }
        h6 {
            display: block;
            font-size: .67em;
            margin-top: 2.33em;
            margin-bottom: 2.33em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        </div>
    </section>

    <section class="mt-5">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 column">
                        <article itemscope itemtype="http://schema.org/BlogPosting">
                            <div class="blog-single">
                                <div class="bs-thumb"><img src="{{$blog->cover_image ?? 'https://place-hold.it/834x340'}}" alt="{{$blog->title}}" /></div>

                                <header>
                                    <h1 itemprop="headline">{{$blog->title}}</h1>
                                    <p><time itemprop="datePublished" datetime="2023-02-25">{{\Carbon\Carbon::parse($blog->created_at)->locale('tr_TR')->isoFormat('LL')}}</time></p>
                                </header>
                                <div itemprop="articleBody">
                                  {!! $blog->content !!}
                                </div>

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
                        </article>
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
