<div class="headerbar sidebar-mini" style="background-color: #00a2e8;">

    <!-- LOGO phfisico-->

    <div class="headerbar-left" 
         style="width: 145px !important;height:65px; 
                background-color: ; margin-top: 0px;
                margin-left: 0px; margin-bottom: 0px; padding-bottom: 0px;">

        <div class="">
            <div for="imghead1" id="imghead1" class=""
                 style="background-color: ; width:145px; height:65px;">
                <img style="margin-left: 2px; margin-top: 4px;" 
                     width="138" height="58"
                     src="<?= file_exists(public_path('/support/pictures/partners/'. str_pad(auth()->user()->contract_id, 3, "0", STR_PAD_LEFT) . '/logo000002.png'))
                            ? '/support/pictures/partners/' .str_pad(auth()->user()->contract_id, 3, "0", STR_PAD_LEFT) . '/logo000002.png'
                            : '/support/pictures/partners/001/logo000002.png'?>" />
            </div>
            <!-- <div for="imghead2" id="imghead2" class="imghead2"
                style="background-color: ; ">
                <span> <a href="/home">
                <img alt="Logo"
                     style="margin-left: 2px; margin-top: 4px;" 
                     width="138" height="58"
                     src="<?= file_exists(public_path('/support/pictures/partners/'. str_pad(auth()->user()->contract_id, 3, "0", STR_PAD_LEFT) . '/logo000002.png'))
                            ? '/support/pictures/partners/' .str_pad(auth()->user()->contract_id, 3, "0", STR_PAD_LEFT) . '/logo000002.png'
                            : '/support/pictures/partners/001/logo000002.png'?>"/>
                </span>
            </div> -->
        </div>
        
    </div>

    <nav class="navbar-custom" style="background-color: #00a2e8;">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown lang">
<!-- 
                <h5 class="store_turn" style="color: white">
                   {{\App\Models\Management\Contract::select('numbercontract')
                            ->join('persons', 'persons.id','=','contracts.person_id')
                            ->where('contracts.id', '=', auth()->user()->contract_id)
                            ->value('numbercontract')}}
                    - {{\App\Models\Management\CompaniesUsers::select('id')
                        ->join('companies', 'companies.id', '=', 'companies_users.company_id')
                        ->where('companies_users.user_id', '=', auth()->user()->id)
                        ->value('id')}}

                    @if(!empty($shiftid))
                        - {{$shiftid->id}}
                    @endif
                </h5>
 -->

            </li>
            {{--            <li class="list-inline-item dropdown lang">--}}
            {{--                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"--}}
            {{--                   aria-haspopup="false" aria-expanded="false">--}}
            {{--                    <i class="fa fa-fw fa-flag"></i><span class="notif-bullet"></span>--}}
            {{--                </a>--}}
            {{--                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg">--}}
            {{--                    <a href="#" class="dropdown-item notify-item langlink" data-lang="es">--}}
            {{--                   <div class="notify-icon bg-faded">--}}
            {{--                            <img src="/support/pictures/config/lang/lang-es.png" alt="img"--}}
            {{--                                 class="rounded-circle img-fluid">--}}
            {{--                            <b>Español</b>--}}
            {{--                        </div> --}}
            {{--                    </a>--}}
            {{--                    <a href="#" class="dropdown-item notify-item langlink" data-lang="en">--}}
            {{--                        <div class="notify-icon bg-faded">--}}
            {{--                            <img src="/support/pictures/config/lang/lang-en.png" alt="img"--}}
            {{--                                 class="rounded-circle img-fluid">--}}
            {{--                            <b>English</b>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </li>--}}

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    @if(Auth::guard('client')->user() != null)
                        <label style="margin-top: 5px;"> {{ Auth::guard('client')->user()->email }} </label>
                        <img src="/support/pictures/users/user000000.png" class="avatar-rounded" style="margin-top: 3px;"
                             alt="{{ __('User Image') }}"/>
                    @else
                    <label style="margin-top: 5px;"> {{ Entrust::user()->email }} </label>
                    @if( !empty(Auth::user()->image))
                        <img src='/support/pictures/users/{{Auth::user()->image}}' class="avatar-rounded"
                             alt="{{ __('User Image') }}"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    @else
                        <img src="/support/pictures/users/user000000" class="avatar-rounded" style="margin-top: 3px;"
                             alt="{{ __('User Image') }}"/>

                    @endif
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown" style="margin-top: 5px;">
                    <!-- item-->
                    <div class="dropdown-item noti-title" style="background-color: #00a2e8;">
                        <h5 class="text-overflow">
                            @if(Auth::guard('client')->user() != null)
                                <small>{{ __('Hello User') }}: {{ Auth::guard('client')->user()->name }}</small>
                            @else
                            <small>{{ __('Hello User') }}: {{ Entrust::user()->name }}</small>
                            @endif
                        </h5>
                    </div>

                    <!-- item-->
                    @if(Auth::guard('client')->user() != null)
                        <a href="/{{ strtolower($group.'/'.$page) }}/editperson/{{  Auth::guard('client')->user()->person_id }}"
                           class="dropdown-item notify-item">
                            <i class="fa fa-user"></i> <span>{{ __('Profile') }}</span>
                        </a>
                    @else
                    <a href="/{{ strtolower($group.'/'.$page) }}/editperson/{{ Entrust::user()->person_id }}"
                       class="dropdown-item notify-item">
                        <i class="fa fa-user"></i> <span>{{ __('Profile') }}</span>
                    </a>
                    @endif

                    <!-- item-->
                    <a href="/management/password" class="dropdown-item notify-item">
                        <i class="fa fa-key"></i> <span>{{ __("Change Password") }}</span>
                    </a>

                    <!-- item-->
                    <a href="/auth/logout" class="dropdown-item notify-item">
                        <i class="fa fa-power-off"></i> <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>

        </ul>
<!-- 
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>
        </ul>
 -->
    </nav>

</div>
<script>
    jQuery(document).ready(function ($) {
        $(".langlink").on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/search/ajax?type=lang',
                data: {
                    "lang": $(this).attr("data-lang")
                },
                type: 'get',
                success: function (res) {
                    location.reload();
                }
            });
            return false;
        });

    });
</script>