@extends('layout.app')

@section('content')
    <section class="overlape d-none d-md-block">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://placehold.jp/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        </div>
    </section>

    <section class="mt-5">
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    @include('layout.dashboard_menu')
                    <div class="col-lg-9">
                        <table>
                            <thead>
                            <tr>
                                <td>Package ID</td>
                                <td>Title</td>
                                <td>Payment Date</td>
                                <td>Payment Type</td>
                                <td>Amount</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <span>221319456</span>
                                </td>
                                <td>
                                    <div class="table-list-title">
                                        <h3><a href="#" title="">Advertise job - Supper Jobs</a></h3>
                                    </div>
                                </td>
                                <td>
                                    <span>April 04, 2017</span>
                                </td>
                                <td>
                                    <span>Pre Bank Transfer</span>
                                </td>
                                <td>
                                    <span class="status active">$99</span>
                                </td>
                                <td>
                                    <span>Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>221319456</span>
                                </td>
                                <td>
                                    <div class="table-list-title">
                                        <h3><a href="#" title="">CV Search - Unlimited CV Pack</a></h3>
                                    </div>
                                </td>
                                <td>
                                    <span>April 04, 2017</span>
                                </td>
                                <td>
                                    <span>Skrill</span>
                                </td>
                                <td>
                                    <span class="status active">$150</span>
                                </td>
                                <td>
                                    <span>Approved</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>221319456</span>
                                </td>
                                <td>
                                    <div class="table-list-title">
                                        <h3><a href="#" title=""> Advertise job - Golden Package</a></h3>
                                    </div>
                                </td>
                                <td>
                                    <span>April 04, 2017</span>
                                </td>
                                <td>
                                    <span>Paypal</span>
                                </td>
                                <td>
                                    <span class="status active">$124</span>
                                </td>
                                <td>
                                    <span>Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>221319456</span>
                                </td>
                                <td>
                                    <div class="table-list-title">
                                        <h3><a href="#" title="">Advertise job - Supper Jobs</a></h3>
                                    </div>
                                </td>
                                <td>
                                    <span>April 04, 2017</span>
                                </td>
                                <td>
                                    <span>Payoneer</span>
                                </td>
                                <td>
                                    <span class="status active">$117</span>
                                </td>
                                <td>
                                    <span>Pending</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js" integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
