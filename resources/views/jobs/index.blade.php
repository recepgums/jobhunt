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
                            <h3>Job List Modern</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    <aside class="col-lg-3 column border-right">
                        <div class="widget">
                            <div class="search_widget_job">
                                <div class="field_w_search">
                                    <input type="text" placeholder="Search Keywords"/>
                                    <i class="la la-search"></i>
                                </div><!-- Search Widget -->
                                <div class="field_w_search">
                                    <input type="text" placeholder="All Locations"/>
                                    <i class="la la-map-marker"></i>
                                </div><!-- Search Widget -->
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="sb-title open">Date Posted</h3>
                            <div class="posted_widget">
                                <input type="radio" name="choose" id="232"><label for="232">Last Hour</label><br/>
                                <input type="radio" name="choose" id="wwqe"><label for="wwqe">Last 24 hours</label><br/>
                                <input type="radio" name="choose" id="erewr"><label for="erewr">Last 7 days</label><br/>
                                <input type="radio" name="choose" id="qwe"><label for="qwe">Last 14 days</label><br/>
                                <input type="radio" name="choose" id="wqe"><label for="wqe">Last 30 days</label><br/>
                                <input type="radio" name="choose" id="qweqw"><label class="nm"
                                                                                    for="qweqw">All</label><br/>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="sb-title open">Job Type</h3>
                            <div class="type_widget">
                                <p class="flchek"><input type="checkbox" name="choosetype" id="33r"><label for="33r">Freelance
                                        (9)</label></p>
                                <p class="ftchek"><input type="checkbox" name="choosetype" id="dsf"><label for="dsf">Full
                                        Time (8)</label></p>
                                <p class="ischek"><input type="checkbox" name="choosetype" id="sdd"><label for="sdd">Internship
                                        (8)</label></p>
                                <p class="ptchek"><input type="checkbox" name="choosetype" id="sadd"><label for="sadd">Part
                                        Time (5)</label></p>
                                <p class="tpchek"><input type="checkbox" name="choosetype" id="assa"><label for="assa">Temporary
                                        (5)</label></p>
                                <p class="vtchek"><input type="checkbox" name="choosetype" id="ghgf"><label for="ghgf">Volunteer
                                        (8)</label></p>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="sb-title open">Specialism</h3>
                            <div class="specialism_widget">
                                <div class="field_w_search">
                                    <input type="text" placeholder="Search Spaecialisms"/>
                                </div><!-- Search Widget -->
                                <div class="simple-checkbox scrollbar">
                                    <p><input type="checkbox" name="spealism" id="as"><label for="as">Accountancy
                                            (2)</label></p>
                                    <p><input type="checkbox" name="spealism" id="asd"><label for="asd">Banking
                                            (2)</label></p>
                                    <p><input type="checkbox" name="spealism" id="errwe"><label for="errwe">Charity &
                                            Voluntary (3)</label></p>
                                    <p><input type="checkbox" name="spealism" id="fdg"><label for="fdg">Digital &
                                            Creative (4)</label></p>
                                    <p><input type="checkbox" name="spealism" id="sc"><label for="sc">Estate Agency
                                            (3)</label></p>
                                    <p><input type="checkbox" name="spealism" id="aw"><label for="aw">Graduate
                                            (2)</label></p>
                                    <p><input type="checkbox" name="spealism" id="ui"><label for="ui">IT Contractor
                                            (7)</label></p>
                                    <p><input type="checkbox" name="spealism" id="saas"><label for="saas">Charity &
                                            Voluntary (3)</label></p>
                                    <p><input type="checkbox" name="spealism" id="rrrt"><label for="rrrt">Digital &
                                            Creative (4)</label></p>
                                    <p><input type="checkbox" name="spealism" id="eweew"><label for="eweew">Estate
                                            Agency (3)</label></p>
                                    <p><input type="checkbox" name="spealism" id="bnbn"><label for="bnbn">Graduate
                                            (2)</label></p>
                                    <p><input type="checkbox" name="spealism" id="ffd"><label for="ffd">IT Contractor
                                            (7)</label></p>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="sb-title closed">Offerd Salary</h3>
                            <div class="specialism_widget">
                                <div class="simple-checkbox">
                                    <p><input type="checkbox" name="smplechk" id="1"><label for="1">10k - 20k</label>
                                    </p>
                                    <p><input type="checkbox" name="smplechk" id="2"><label for="2">20k - 30k</label>
                                    </p>
                                    <p><input type="checkbox" name="smplechk" id="3"><label for="3">30k - 40k</label>
                                    </p>
                                    <p><input type="checkbox" name="smplechk" id="4"><label for="4">40k - 50k</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="sb-title closed">Experince</h3>
                            <div class="specialism_widget">
                                <div class="simple-checkbox">
                                    <p><input type="checkbox" name="smplechk" id="9"><label for="9">1Year to
                                            2Year</label></p>
                                    <p><input type="checkbox" name="smplechk" id="10"><label for="10">2Year to
                                            3Year</label></p>
                                    <p><input type="checkbox" name="smplechk" id="11"><label for="11">3Year to
                                            4Year</label></p>
                                    <p><input type="checkbox" name="smplechk" id="12"><label for="12">4Year to
                                            5Year</label></p>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="sb-title closed">Gender</h3>
                            <div class="specialism_widget">
                                <div class="simple-checkbox">
                                    <p><input type="checkbox" name="smplechk" id="13"><label for="13">Male</label></p>
                                    <p><input type="checkbox" name="smplechk" id="14"><label for="14">Female</label></p>
                                    <p><input type="checkbox" name="smplechk" id="15"><label for="15">Others</label></p>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="sb-title closed">Industry</h3>
                            <div class="specialism_widget">
                                <div class="simple-checkbox">
                                    <p><input type="checkbox" name="smplechk" id="16"><label for="16">Meezan Job</label>
                                    </p>
                                    <p><input type="checkbox" name="smplechk" id="17"><label for="17">Speicalize
                                            Jobs</label></p>
                                    <p><input type="checkbox" name="smplechk" id="18"><label for="18">Business
                                            Jobs</label></p>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="sb-title closed">Qualification</h3>
                            <div class="specialism_widget">
                                <div class="simple-checkbox">
                                    <p><input type="checkbox" name="smplechk" id="19"><label
                                            for="19">Matriculation</label></p>
                                    <p><input type="checkbox" name="smplechk" id="20"><label
                                            for="20">Intermidiate</label></p>
                                    <p><input type="checkbox" name="smplechk" id="21"><label for="21">Gradute</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="subscribe_widget">
                                <h3>Still Need Help ?</h3>
                                <p>Let us now about your issue and a Professional will reach you out.</p>
                                <form>
                                    <input placeholder="Enter Valid Email Address" type="text">
                                    <button type="submit"><i class="la la-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </aside>
                    <div class="col-lg-9 column">
                        <div class="modrn-joblist">
                            <div class="tags-bar">
                                <span>Full Time<i class="close-tag">x</i></span>
                                <span>UX/UI Design<i class="close-tag">x</i></span>
                                <span>Istanbul<i class="close-tag">x</i></span>
                                <div class="action-tags">
                                    <a href="#" title=""><i class="la la-cloud-download"></i> Save</a>
                                    <a href="#" title=""><i class="la la-trash-o"></i> Clean</a>
                                </div>
                            </div><!-- Tags Bar -->
                            <div class="filterbar">
                                <span class="emlthis"><a href="mailto:example.com" title=" "><i
                                            class="la la-envelope-o"></i> Email me Jobs Like These</a></span>
                                <div class="sortby-sec">
                                    <span>Sort by</span>
                                    <select name="sort_by" data-placeholder="Most Recent" class="chosen">
                                        <option value="recent">Most Recent</option>
                                        <option value="view">Most Viewed</option>
                                    </select>
                                    <select name="per_page" data-placeholder="20 Per Page" class="chosen">
                                        <option value="30">30 Per Page</option>
                                        <option value="40">40 Per Page</option>
                                        <option value="50">50 Per Page</option>
                                        <option value="60">60 Per Page</option>
                                    </select>
                                </div>
                                @if(isset($jobs) && $jobs->total() > 0 )<h5>{{$jobs->total()}} Jobs &
                                    Vacancies</h5>@endif
                            </div>
                        </div><!-- MOdern Job LIst -->
                        <div class="job-list-modern">
                            <div class="job-listings-sec">
                                @forelse($jobs as $job)
{{--                                    {{$job}}--}}
                                    <div class="job-listing wtabs">
                                        <div class="job-title-sec">
                                            <div class="c-logo"><img src="{{$job->cover_image}}" alt=""/></div>
                                            <h3><a href="{{route('job.show',$job->slug)}}" title="">{{$job->title}}</a>
                                            </h3>
                                            <span>{{$job->user->name}}</span>
                                            <div class="job-lctn"><i
                                                    class="la la-map-marker"></i>{{$job->district_id}},
                                                California
                                            </div>
                                        </div>
                                        <div class="job-style-bx">
                                            <span class="job-is ft">{{$job->type}}</span>
                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                            <i>{{$job->created_at->diffForHumans()}}</i>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            {{$jobs->links('vendor.pagination.custom')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
@endpush
