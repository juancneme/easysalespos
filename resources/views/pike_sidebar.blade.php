<div class="left main-sidebar" style="background-color: #00a2e8;">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu" style="background-color: #00a2e8;">

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>
            </ul>

            <ul id="ulmenu" style="background-color: #00a2e8;">
                <li id="submenu0" class="submenu" style="background-color: #00a2e8;">
                    <a class="active"" href="#" style="margin-top: 13px;"><i class=""></i><span>{{ __('EasySales POS') }}</span></a>
                    <ul id="ulmenu0" class="list-unstyled"></ul>
                </li>
            </ul>

        </div >
     
        <div class="clearfix"></div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $.ajax({
            url: '/search/ajax?type=menu',
            type: 'get',
            async: false,
            success: function (response) {
                res = JSON.parse(response);
                var item = localStorage.getItem("itemsel");
                var menu = '';
                console.log(res,'este');
                $.each(res, function (i, e) {

                    if (e.typelabel_id == 51 && e.idowner == '0') {
                        $('#ulmenu').append('<li id="submenu' + e.id + '" class="submenu"></li>');
                        $('#submenu' + e.id + '').append('<a href="#" style="color: #fff;"><i  class="fa fa-fw ' + e.icon + '" style="color: #69d9fe;"></i><span> ' + e.name +
                             ' \n\ </span><span class="menu-arrow" style="color:#FFF;"></span></a>');
                        $('#submenu' + e.id + '').append('<ul id="ulmenu' + e.id + '" class="list-unstyled" style="color:#FFF;"></ul>');
                    } else {
                        if (e.typelabel_id == 51) {
                            $('#ulmenu' + e.idowner + '').append('<li id="submenu' + e.id + '" class="submenu" style="color:#BC2F2F;"></li>');
                            $('#submenu' + e.id + '').append('<a href="#" style="color: #fff;"><i  class="fa fa-fw ' + e.icon + '" style="color: #69d9fe;"></i><span> ' + e.name + 
                                ' </span><span class="menu-arrow"></span></a>');
                            $('#submenu' + e.id + '').append('<ul id="ulmenu' + e.id + '" class="list-unstyled"></ul>');
                        } else {
                            if (e.id == item){
                                $('#ulmenu' + e.idowner + '').append('<li class="menuitem active" id="' + e.id + '"><a href="/'+ e.group_name + '/' + e.page_name + '" style="color: #000; background-color: #00a2e8;">\n\
                            <i class="fa fa-fw ' + e.icon + '" style="color: #69d9fe;"></i><span> ' + e.name + 
                                ' </span></a></li>');
                                menu = '#ulmenu' + e.idowner + '';
                            }else{
                                $('#ulmenu' + e.idowner + '').append('<li class="menuitem" id="' + e.id + '"><a href="/'+ e.group_name + '/' + e.page_name + '" style="color: #fff; background-color: #00a2e8;">\n\
                            <i class="fa fa-fw ' + e.icon + '" style="color: #69d9fe;"></i><span> ' + e.name + ' </span></a></li>');
                            }
                        };
                    };

                });
                asd = new $.Sidemenu.Constructor;
                asd.init();
                $(menu).attr('style','display: block;');
            }
        });

        $('.menuitem').click(function () {
            localStorage.setItem("itemsel", this.id);
        });

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