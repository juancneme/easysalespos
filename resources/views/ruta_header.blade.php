<!--new inicio -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#0033C4;">

            <span> <a class="logo navbar-brand" href="/home" style="margin-left:66px;"><img class="logomdi" alt="Logo" src="<?= file_exists(public_path('/support/pictures/partners/'. str_pad($IDcontract, 3, "0", STR_PAD_LEFT) . '/logo000005.png'))
            ? '/support/pictures/partners/' .str_pad($IDcontract, 3, "0", STR_PAD_LEFT) . '/logo000005.png'
                    : '/support/pictures/partners/001/logo000005.png'?>"/>
            </a>
            </span>


        <div>
                <div> <a class="navbar-brand" href="#">{{ $page_title or __('Dashboard') }}</a>
                      <a class="navbar-brand shift-control circlemdi advanced" id="shiftControl" style="top:47px;"></a></div>
        </div>    


      
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarsExampleDefault" >
        <ul class="navbar-nav mr-auto">

            <div style="display: flex; flex-direction: column;">
            <div style="display: flex;">

            <li class="nav-item active" style="padding:10px;">
          <button class="btn btn-warning" type="button" id="Comercioprincipal" aria-haspopup="true" aria-expanded="false" style="width: 25vw; min-width:140px;">
                    Comercio Principal
                </button>
          </li>

          <li class="nav-item" style="padding:10px;">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="TodosLosComercios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 25vw; min-width:160px;">
                    Todos los comercios
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="top: auto;">
                <a class="dropdown-item" href="#">Frutería</a>
                <a class="dropdown-item" href="#">Carnicería</a>
                <a class="dropdown-item" href="#">Salsamentaria</a>
                <a class="dropdown-item" href="#">Panadería</a>
                <a class="dropdown-item" href="#">Papelería</a>
                </div>
            </div>
          </li>

         

            </div>   
         

        <div style="display: flex; justify-content: flex-end; flex-wrap:wrap;">
        <li class="nav-item active">

            <a class="navbar-brand" href="#" style="padding-top:8px;">
                @if(Auth::guard('client')->user() != null)
                    <h5 style="color: white">{{\App\Models\Management\CompaniesUsers::select('name')
                    ->join('companies', 'companies.id', '=', 'companies_users.company_id')
                    ->where('companies_users.user_id', '=', auth()->guard('client')->user()->id)
                    ->value('name')}}</h5>
                @else
                @if(Auth::user()->roles[0]->id != 1 && Auth::user()->roles[0]->id != 2)
                    <h5 style="color: white">{{\App\Models\Management\CompaniesUsers::select('name')
                                ->join('companies', 'companies.id', '=', 'companies_users.company_id')
                                ->where('companies_users.user_id', '=', auth()->user()->id)
                                ->value('name')}}</h5>
                @elseif(Auth::user()->roles[0]->id != 1)
                    <h5 style="color: white"> Contrato - {{\App\Models\Management\Contract::select('numbercontract')
                                ->join('persons', 'persons.id','=','contracts.person_id')
                                ->where('contracts.id', auth()->user()->contract_id)
                                ->value('numbercontract')}}</h5>
                @endif
                @endif
            </a>
        </li>


        

          <li class="nav-item active">
                <a class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user navbar-brand" data-toggle="dropdown" href="#" role="button"
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
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title" style="background-color: #3492ea;">
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
                    {{--                    <a href="/{{ strtolower($group.'/'.$page) }}/editperson/{{  Auth::guard('client')->user()->person_id }}"--}}
                    {{--                       class="dropdown-item notify-item">--}}
                    {{--                        <i class="fa fa-user"></i> <span>{{ __('Profile') }}</span>--}}
                    {{--                    </a>--}}
                    @else
                        <a href="/{{ strtolower($group.'/'.$page) }}/editperson/{{  Entrust::user()->person_id }}"
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
                    </a>

          </li>

        </div>
        </div>


        </ul>
      </div>


      <div class="navbar-brand" href="#" style="color:black;">
            <button onclick="openNav()" class="view_purchase2 btn-open-turn2" style="border: none;padding-left: 0px;padding-right: 0px;padding-top: 0px;padding-bottom: 0px; background-color: #0033C4; ">
                <div  style="display: flex; justify-content: center; background-color: #0033C4;">
                    <div  class="btn" style="display: flex; align-items:center; border: none; justify-content:center; width: 60px; height: 60px; margin-top: -39px; padding-left: 6px; margin-right: 7vw;">
                          <img  src="/support/pictures/config/carrito.svg" style="vertical-align:middle; height:23px; max-width:35px; margin-top: 35px;" alt="Carrito de compras">
                            <div id="canttotal2" style="display:flex; align-items:center; 
                                justify-content: center; height: 20px; width: 20px; 
                                border-radius: 50%; background-color: #D00000; color: #FFFFFF; 
                                margin-top:15px; margin-left: -25px;">
                                <p style="margin-top:14px;">0</p>
                            </div>
                    </div>
                </div>
            </button>
      </div>  



      
     
    </nav>

   <!--new fin --> 






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