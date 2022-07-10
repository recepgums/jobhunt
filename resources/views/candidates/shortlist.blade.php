@extends('layout.app')


@section('content')
    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1" style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Welcome Ali TUFAN</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-top">
            <div class="container">
                <div class="row no-gape">
                    @include('layout.dashboard_menu')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec">
                                <div class="border-title"><h3>Shortlisted jobs</h3></div>
                                <div class="job-listing wtabs">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                        <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                        <span>Massimo Artemisistator</span>
                                        <div class="job-lctn">November 6, 2017</div>
                                    </div>
                                    <div class="job-list-del">
                                        <a href="#" title=""><i class="la la-trash-o"></i></a>
                                    </div>
                                </div><!-- Job -->
                                <div class="job-listing wtabs">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                        <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                        <span>Massimo Artemisistator</span>
                                        <div class="job-lctn">November 6, 2017</div>
                                    </div>
                                    <div class="job-list-del">
                                        <a href="#" title=""><i class="la la-trash-o"></i></a>
                                    </div>
                                </div><!-- Job -->
                                <div class="job-listing wtabs">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                        <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                        <span>Massimo Artemisistator</span>
                                        <div class="job-lctn">November 6, 2017</div>
                                    </div>
                                    <div class="job-list-del">
                                        <a href="#" title=""><i class="la la-trash-o"></i></a>
                                    </div>
                                </div><!-- Job -->
                                <div class="job-listing wtabs">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                        <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                        <span>Massimo Artemisistator</span>
                                        <div class="job-lctn">November 6, 2017</div>
                                    </div>
                                    <div class="job-list-del">
                                        <a href="#" title=""><i class="la la-trash-o"></i></a>
                                    </div>
                                </div><!-- Job -->
                                <div class="job-listing wtabs">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                        <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                        <span>Massimo Artemisistator</span>
                                        <div class="job-lctn">November 6, 2017</div>
                                    </div>
                                    <div class="job-list-del">
                                        <a href="#" title=""><i class="la la-trash-o"></i></a>
                                    </div>
                                </div><!-- Job -->
                                <div class="job-listing wtabs">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                        <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                        <span>Massimo Artemisistator</span>
                                        <div class="job-lctn">November 6, 2017</div>
                                    </div>
                                    <div class="job-list-del">
                                        <a href="#" title=""><i class="la la-trash-o"></i></a>
                                    </div>
                                </div><!-- Job -->
                                <div class="job-listing wtabs">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img src="https://place-hold.it/98x51" alt="" /> </div>
                                        <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                        <span>Massimo Artemisistator</span>
                                        <div class="job-lctn">November 6, 2017</div>
                                    </div>
                                    <div class="job-list-del">
                                        <a href="#" title=""><i class="la la-trash-o"></i></a>
                                    </div>
                                </div><!-- Job -->
                                <div class="pagination">
                                    <ul>
                                        <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
                                        <li><a href="">1</a></li>
                                        <li class="active"><a href="">2</a></li>
                                        <li><a href="">3</a></li>
                                        <li><span class="delimeter">...</span></li>
                                        <li><a href="">14</a></li>
                                        <li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
                                    </ul>
                                </div><!-- Pagination -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js/circle-progress.min.js')}}" type="text/javascript"></script>
@endpush
