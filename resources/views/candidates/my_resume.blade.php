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
                                <div class="border-title"><h3>Candidates Dashboard</h3><a href="#" title=""><i class="la la-plus"></i> Add Education</a></div>
                                <div class="edu-history-sec">
                                    <div class="edu-history">
                                        <i class="la la-graduation-cap"></i>
                                        <div class="edu-hisinfo">
                                            <h3>University</h3>
                                            <i>2008 - 2012</i>
                                            <span>Middle East Technical University <i>Computer Science</i></span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="edu-history">
                                        <i class="la la-graduation-cap"></i>
                                        <div class="edu-hisinfo">
                                            <h3>High School</h3>
                                            <i>2008 - 2012</i>
                                            <span>Tomms College <i>Bachlors in Fine Arts</i></span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="border-title"><h3>Work Experience</h3><a href="#" title=""><i class="la la-plus"></i> Add Experience</a></div>
                                <div class="edu-history-sec">
                                    <div class="edu-history style2">
                                        <i></i>
                                        <div class="edu-hisinfo">
                                            <h3>Web Designer <span>Inwave Studio</span></h3>
                                            <i>2008 - 2012</i>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="edu-history style2">
                                        <i></i>
                                        <div class="edu-hisinfo">
                                            <h3>CEO Founder <span>Inwave Studio</span></h3>
                                            <i>2008 - 2012</i>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="border-title"><h3>Portfolio</h3><a href="#" title=""><i class="la la-plus"></i> Add Portfolio</a></div>
                                <div class="mini-portfolio">
                                    <div class="mp-row">
                                        <div class="mp-col">
                                            <div class="mportolio"><img src="https://place-hold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
                                            <ul class="action_job">
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="mp-col">
                                            <div class="mportolio"><img src="https://place-hold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
                                            <ul class="action_job">
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="mp-col">
                                            <div class="mportolio"><img src="https://place-hold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
                                            <ul class="action_job">
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="mp-col">
                                            <div class="mportolio"><img src="https://place-hold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
                                            <ul class="action_job">
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-title"><h3>Professional Skills</h3><a href="#" title=""><i class="la la-plus"></i> Add Skills</a></div>
                                <div class="progress-sec">
                                    <div class="progress-sec with-edit">
                                        <span>Adobe Photoshop</span>
                                        <div class="progressbar"> <div class="progress" style="width: 80%;"><span>80%</span></div> </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="progress-sec with-edit">
                                        <span>Production In Html</span>
                                        <div class="progressbar"> <div class="progress" style="width: 60%;"><span>60%</span></div> </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="progress-sec with-edit">
                                        <span>Graphic Design</span>
                                        <div class="progressbar"> <div class="progress" style="width: 75%;"><span>75%</span></div> </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="border-title"><h3>Professional Skills</h3><a href="#" title=""><i class="la la-plus"></i> Add Skills</a></div>
                                <div class="edu-history-sec">
                                    <div class="edu-history style2">
                                        <i></i>
                                        <div class="edu-hisinfo">
                                            <h3>Perfect Attendance Programs</h3>
                                            <i>2008 - 2012</i>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="edu-history style2">
                                        <i></i>
                                        <div class="edu-hisinfo">
                                            <h3>Top Performer Recognition</h3>
                                            <i>2008 - 2012</i>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="edu-history style2">
                                        <i></i>
                                        <div class="edu-hisinfo">
                                            <h3>King LLC</h3>
                                            <i>2008 - 2012</i>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                        </div>
                                        <ul class="action_job">
                                            <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
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
