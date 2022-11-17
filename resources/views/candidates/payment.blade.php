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
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec addscroll">
                                <h3>Ödeme işlemlerim</h3>
                                <table>
                                    @if($payments && count($payments) > 0)
                                    <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td width="300">Başlık</td>
                                        <td>Ödeme tarihi</td>
                                        <td>Ücret</td>
                                        <td>Durum</td>
                                    </tr>
                                    </thead>
                                    @endif
                                    <tbody>
                                    @forelse($payments as $payment)
                                        <tr>
                                            <td>
                                                <span>#{{$payment->id}}</span>
                                            </td>
                                            <td>
                                                <div class="table-list-title">
                                                    @php
                                                        $job = \App\Models\Job::find(json_decode($payment->product_json)->model_id);
                                                    @endphp
                                                    <h3><a href="#" title="">{{$job->title}}</a></h3>
                                                </div>
                                            </td>
                                            <td>
                                                <span>{{$payment->created_at->diffForHumans()}}</span>
                                            </td>
                                            <td>
                                                <span class="status active">{{$payment->price}}</span>
                                            </td>
                                            <td>
                                                <span>{{$payment->status === 'success' ? 'Başarılı' : 'Başarısız'}}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center">Ödeme işleminiz bulunmuyor</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js" integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
