<aside class="col-lg-3 d-none d-md-block column border-right">
    <div class="widget">
        <div class="tree_widget-sec">
            <ul>
                <li><a @if(url()->current() == route('candidate.profile')) class="active-dashboard" @endif href="{{route('candidate.profile')}}" title=""><i class="la la-user"></i>Profilim</a></li>
                <li><a @if(url()->current() == route('candidate.shop_profile')) class="active-dashboard" @endif href="{{route('candidate.shop_profile')}}" title=""><i class="la la-building"></i>İş yerim</a></li>
                <li><a @if(url()->current() == route('candidate.shortlist')) class="active-dashboard" @endif href="{{route('candidate.shortlist')}}" title=""><i class="la la-paper-plane"></i>İlanlarim</a></li>
                <li><a @if(url()->current() == route('candidate.applied_jobs')) class="active-dashboard" @endif href="{{route('candidate.applied_jobs')}}" title=""><i class="la la-hand-paper-o"></i>İletişime geçtiğim ilanlar</a></li>
                <li><a @if(url()->current() == route('candidate.payment')) class="active-dashboard" @endif href="{{route('candidate.payment')}}" title=""><i class="la la-money"></i>Ödeme işlemlerim</a></li>
                <li><a @if(url()->current() == route('candidate.change_password')) class="active-dashboard" @endif href="{{route('candidate.change_password')}}" title=""><i class="la la-lock"></i>Şifre değiştir</a></li>
                <li><a @if(url()->current() == route('signout')) class="active-dashboard" @endif href="{{route('signout')}}"><i class="la la-user"></i>Çıkış Yap</a></li>
            </ul>
        </div>
    </div>
</aside>

<style>
    .active-dashboard{
        color: rgb(54 61 115)!important;
        font-weight: bolder;
        text-decoration: underline;
    }
</style>
