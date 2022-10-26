@extends('admin.layout.app')
@push('styles')
@endpush
@section('content')
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-4">
            <div class="row y-gap-30 pt-30">
                <div class="col-xl-12 col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Package ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Payment Date</th>
                            <th scope="col">Payment Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span>221319456</span>
                            </td>
                            <td>
                                <div class="table-list-title">
                                    <span><a href="#" title="">Advertise job - Supper Jobs</a></span>
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
                                    <span><a href="#" title="">CV Search - Unlimited CV Pack</a></span>
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
                                    <span><a href="#" title=""> Advertise job - Golden Package</a></span>
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
                                    <span><a href="#" title="">Advertise job - Supper Jobs</a></span>
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
@endsection
