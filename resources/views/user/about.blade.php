@extends('user.layouts.master')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <div class="card  mt-4 border-0">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <h4>About My Home Myanmar</h4>
                    </div>
                    <div>
                        <p>
                            My Home Myanmar brings together property buyers, renters and investors with private home
                            sellers,
                            renters, real estate agents and the best property developers in the respective countries
                        </p>
                        <p>
                            My Home Myanmar offers thousands of properties to search from and keeps users informed
                            through news,
                            tips and features. The My Home Myanmar website aims to make the move online faster and
                            simpler
                            whilst being one of the best tools to help sell or rent property.
                        </p>
                        <p>
                            Launched in August 2020, My Home Myanmar has mission to become one of the leading property
                            websites
                            in Myanmar at April 2022 and to be one of the largest property portal networks across Asia
                            in 2025.
                        </p>
                        <dl class="row">
                            <dt class="col-sm-3">Established</dt>
                            <dd class="col-sm-9">21- August -2020</dd>

                            <dt class="col-sm-3">Registration</dt>
                            <dd class="col-sm-9">
                                <p>21- August -2020</p>
                            </dd>

                            <dt class="col-sm-3">Name</dt>
                            <dd class="col-sm-9">My Home Myanmar Co ltd</dd>

                            <dt class="col-sm-3 text-truncate">Population (Myanmar Branch)</dt>
                            <dd class="col-sm-9">25</dd>
                            <dt class="col-sm-3 text-truncate">Official website</dt>
                            <dd class="col-sm-9"><a href="https://myhomemm.com">www.myhomemm.com</a></dd>
                            <dt class="col-sm-3 text-truncate">Email</dt>
                            <dd class="col-sm-9">info@myhomemm.com</dd>
                        </dl>
                        <h5><u>Our Service</u></h5>
                        <p>
                            Following service is currently available in Myanmar only. We add on our own services: Home
                            Loan, Home Saving, Home Mortage.
                        </p>
                        <p>
                            <u>
                                Other extra services include
                            </u>
                        </p>
                        <ul>
                            <li>မြေပုံကူးပေးခြင်း</li>
                            <li>အမည်ပေါက်မှန်မမှန် စစ်ပေးခြင်း</li>
                            <li>အမည်ပြောင်းခြင်း</li>
                            <li>ဂရန်အသစ်လျှောက်ပေးခြင်း</li>
                            <li>ဂရန်မိတ</li>
                            <li>ဂရန်ခွဲပေးခြင်း</li>
                            <li>ဂရန်သက်တမ်းတိုးခြင်း</li>
                            <li>မြေခွဲစိတ် / ပေါင်းစည်းပေးခြင်း</li>
                        </ul>
                        <small>Note: All of services available only within Yangon Division, Myanmar.</small>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="fb-page" data-href="https://web.facebook.com/myhomemyanmar1" data-tabs="" data-width=""
                data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                data-show-facepile="true">
                <blockquote cite="https://web.facebook.com/myhomemyanmar1" class="fb-xfbml-parse-ignore"><a
                        href="https://web.facebook.com/myhomemyanmar1">My Home Myanmar</a></blockquote>
            </div>
            <hr>
            <p>Advertisements</p>
            @include('user.advertises')
        </div>
    </div>


</div>
@endsection
