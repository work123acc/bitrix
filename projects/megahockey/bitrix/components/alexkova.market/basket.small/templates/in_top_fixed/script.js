$(document).ready(function(){
    function setBasketMaxH(bcontainer) {
        $(bcontainer+' .bxr-content-scroll').scrollbar();    
        $('.scroll-bar').addClass('bxr-color');
        wHeight = $(window).height();
        pHeight = parseInt($('.bxr-top-fixed-panel').css('height'));
        ownOffset = 24;
        bPosition = $(bcontainer).position().top;
        $(bcontainer+' .scroll-content').closest('.scroll-wrapper').css('max-height', '0px');
        bHeight = parseInt($(bcontainer).css('height'));
        bbHeight = wHeight - pHeight - bPosition - bHeight + ownOffset;
        $(bcontainer+' .scroll-content').closest('.scroll-wrapper').css('max-height', bbHeight+'px');
    }
    
    

    window.BXReady.Market.Basket = {

        ajaxUrl: '/ajax/basket_action.php',

        delayWindow: false,

        list: {},

        newQty: function(item, qty){

            basket = this;

            if (basket.ajaxUrl.length <= 0) return;

            data ='action=newqty&quantity='+qty+'&item='+item+'&ajaxbuy=yes&rg='+Math.random();
            $.ajax({
                url: basket.ajaxUrl+'?'+data,
                success: function(data){

                    basket.refresh(true, data);
                    BXReady.closeAjaxShadow('bxr-basket-body-shadow');
                }
            });

        },

        addItem: function(form, delay, favor){

            basket = this;

            if (basket.ajaxUrl.length <= 0) return;

            data = form.serialize()+'&ajaxbuy=yes&rg='+Math.random();
            if (delay){
                valueDelay = form.children('input[name=delay]').val();

                if (valueDelay == 'yes'){
                    data = data + '&delay='+valueDelay;
                    form.children('input[name=delay]').val('no');
                }else{
                    form.children('input[name=delay]').val('yes');
                }

            }

            if (favor) {
                valueFavor = form.children('input[name=favor]').val();

                if (valueFavor == 'yes'){
                    data = data + '&favor='+valueFavor;
                    form.children('input[name=favor]').val('no');
                }else{
                    form.children('input[name=favor]').val('yes');
                }
            }
            
            notAllProp  = false;
            bProp = {                
                BASKET_PROPS: {}
            };
            if (!delay && !favor) {
                if ($('.bxr-bprop-required').length) {
                    $('.bxr-bprop-required').each(function() {                        
                        prop = $(this);
                        container = prop.closest('.bxr-bprop-value');
                        pVal = prop.val();
                        pCode = prop.data("code");
                        pName = prop.data("name");
                        pSort = prop.data("sort");
                        if (pVal == "false") {
                            container.addClass('wrong-bprop');
                            BXReady.closeAjaxShadow('body-shadow');
                            notAllProp = true;
                        };
                        bProp["BASKET_PROPS"][pCode] = {
                            NAME: encodeURIComponent(pName),
                            CODE: pCode,
                            SORT: pSort,
                            VALUE: encodeURIComponent(pVal),
                        };
                    })
                };
                
                $('.bxr-bprop-optional').each(function() {                        
                    prop = $(this);
                    pVal = prop.val();
                    pCode = prop.data("code");
                    pName = prop.data("name");
                    pSort = prop.data("sort");
                    bProp["BASKET_PROPS"][pCode] = {
                        NAME: encodeURIComponent(pName),
                        CODE: pCode,
                        SORT: pSort,
                        VALUE: encodeURIComponent(pVal),
                    };
                })
            }
            
            
            if (!notAllProp) {
            $.ajax({
                url: basket.ajaxUrl+'?'+data,
                    data: bProp,
                success: function(data){
                    basket.refresh(true, data);

                    if (basket.delayWindow != true && delay || favor){


                    }
                    else {
                        BXReady.closeAjaxShadow('body-shadow');

                        BXReady.basketPopup = BX.PopupWindowManager.create("basketPopup", null, {
                                autoHide: true,
                                offsetLeft: 0,
                                offsetTop: 0,
                                overlay : true,
                                draggable: {restrict:true},
                                closeByEsc: true,
                                closeIcon: { right : "12px", top : "10px"},
                                titleBar: {content: BX.create("span", {html: "<div>"+BX.message('setItemAdded2BasketTitle')+"</div>"})},
                                content: '<div style="width:400px;height:400px; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="<?=$this->GetFolder()?>/images/wait.gif"/></span></div>',
                                events: {
                                    onAfterPopupShow: function()
                                    {
                                        this.setContent(BX("bxr-basket-popup"));

                                        $(document).on(
                                            'click',
                                            '#continue-buy',
                                            function(){
                                                BXReady.basketPopup.close()
                                            }
                                        );
                                    }
                                }
                            });
                            BXReady.basketPopup.show();
                        }


                }
            });
            }
        },

        deleteItem: function(item){
            basket=this;

            if (basket.ajaxUrl.length <= 0) return;

            data ='action=delete&item='+item+'&ajaxbuy=yes&rg='+Math.random();

            $.ajax({
                url: basket.ajaxUrl+'?'+data,
                success: function(data){

                    basket.refresh();
                    BXReady.closeAjaxShadow('bxr-basket-body-shadow');
                }
            });
        },

        delayItem: function(item){
            basket = this;
            if (basket.ajaxUrl.length <= 0) return;
            data ='action=delay&item='+item+'&ajaxbuy=yes&rg='+Math.random();

            $.ajax({
                url: basket.ajaxUrl+'?'+data,
                success: function(data){

                    BXReady.closeAjaxShadow('bxr-basket-body-shadow');
                    basket.refresh();
                }
            });
        },

        delayToCart: function(item){
            basket = this;
            if (basket.ajaxUrl.length <= 0) return;
            data ='action=back&item='+item+'&ajaxbuy=yes&rg='+Math.random();

            $.ajax({
                url: basket.ajaxUrl+'?'+data,
                success: function(data){

                    basket.refresh();
                    BXReady.closeAjaxShadow('bxr-basket-body-shadow');
                }
            });
        },

        animateShowIndicator: function(element,sClass){
            element.css('opacity', '0').addClass(sClass+'-active').animate({'opacity': '1'}, 1000, "easeOutExpo");
        },

        animateHideIndicator: function(sClass){
            this.css('opacity', '0');
            this.addClass('sClass')
        },

        refreshData: function(){
            if (delayClick)
                $('.tab-delay').click();
            else 
                $('.tab-basket').click();

            basket = this;

            $('#bxr-basket-body').html($('#basket-body-content').html());
            $('#bxr-delay-body').html($('#delay-body-content').html());
            $('#bxr-favor-body').html($('#favor-body-content').html());

            basket.list = JSON.parse($('#bxr-basket-data').html());

            $('.bxr-indicator-item-favor').data("favor", 0);

            if (basket.list.FAVOR.length > 0){
                a = basket.list.FAVOR;

                $('.bxr-counter-favor').html(basket.list.FAVOR.length);
                basket.animateShowIndicator($('.bxr-counter-favor'),'bxr-counter');

                for (var i = 0; i < a.length; i++){
                    value = basket.list.FAVOR[a[i]];
                    $('.bxr-indicator-item-favor[data-item='+a[i]+']').each(function() {
                        if (!$(this).hasClass('bxr-indicator-item-active'))
                            basket.animateShowIndicator($(this),'bxr-indicator-item');
                    });
                    $('.bxr-indicator-item-favor[data-item='+a[i]+']').data("favor", 1);
                }
            }else{
                $('.bxr-counter-favor').removeClass('bxr-counter-active'); 
                $('.bxr-indicator-item-favor').removeClass('bxr-indicator-item-active');
            }

            $('.bxr-indicator-item-favor').each(function() {
                if ($(this).data('favor') == 0)
                    $(this).removeClass('bxr-indicator-item-active');
            });

            $('.bxr-indicator-item').data("basket", 0);
            
            if (basket.list.ITEMS.length > 0){
                a = basket.list.ITEMS;

                for (var i = 0; i < a.length; i++){
                    value = basket.list.ALL[a[i]];

                    $('.bxr-indicator-item-basket[data-item='+a[i]+']').each(function() {
                        if (!$(this).hasClass('bxr-indicator-item-active'))
                            basket.animateShowIndicator($(this),'bxr-indicator-item');
                    });
                    $('.bxr-counter-item-basket[data-item='+a[i]+']').html(value);
                    $('.bxr-indicator-item-basket[data-item='+a[i]+']').data("basket", 1);
            }
            }else {
                $('.bxr-counter-item-basket').removeClass('bxr-indicator-item-active');
            }

            $('.bxr-indicator-item-basket').each(function() {
                if ($(this).data('basket') == 0)
                    $(this).removeClass('bxr-indicator-item-active');
            });

            if (Object.keys(basket.list.ALL).length > 0) {
                $('.bxr-counter-basket').html(Object.keys(basket.list.ALL).length);
                basket.animateShowIndicator($('.bxr-counter-basket'),'bxr-counter');
            } else {
                $('.bxr-counter-basket').html(0);
                $('.bxr-counter-basket').removeClass('bxr-counter-active');                
            }

            var panels = ['basket', 'delay', 'favor'];

            for (i=0; i<panels.length; i++){

                $('#bxr-basket-row .bxr-indicator-'+panels[i]).html($('#bxr-basket-content #bxr-indicator-'+panels[i]+'-new').html());
            }

            window.BXReady.Market.setPriceCents();
        },

        refresh: function(notRequest, dataRefresh){
            basket = this;

            if (notRequest === true){
                $('#bxr-basket-content').html(dataRefresh);
                basket.refreshData();
            }else{
                if (basket.ajaxUrl.length <= 0) return;

                data = 'ajaxbuy=yes&rg='+Math.random();
                $.ajax({
                    url: basket.ajaxUrl+'?'+data,
                    success: function(data){

                        $('#bxr-basket-content').html(data);
                        basket.refreshData();
                    }
                });
            }

        },


        basketButtonsInit: function(){
            basket = this;
            $('form.bxr-basket-action').submit(function(){
                window.BXReady.showAjaxShadow('body','body-shadow');
                basket.addItem($(this));
                return false;
            });

            $(document).on(
                'click',
                'form.bxr-basket-action .bxr-basket-add',
                function(){
                    window.BXReady.showAjaxShadow('body','body-shadow');
                    basket.addItem($(this).parent('form'));
                    return false;
                }
            );

            $(document).on(
                'click',
                'form.bxr-basket-action .bxr-basket-delay',
                function(){
                    basket.addItem($(this).parent('form'), true);
                    return false;
                }
            );

            $(document).on(
                'click',
                'form.bxr-basket-action .bxr-basket-favor',
                function(){
                    basket.addItem($(this).parent('form'), false, true);
                    return false;
                }
            );
    
            $(document).on(
                'click',
                'form.bxr-basket-action .bxr-basket-favor-delete',
                function(){
                    basket.addItem($(this).parent('form'), false, true);
                    return false;
                }
            );

            $(document).on(
                'click',
                '#bxr-basket-body .icon-button-delete',
                function(){
                    itemID = $(this).data('item');
                    BXReady.showAjaxShadow('#bxr-basket-body','bxr-basket-body-shadow');
                    basket.deleteItem(itemID);
                }
            );

            $(document).on(
                'click',
                '#bxr-basket-body .icon-button-delete',
                function(){
                    itemID = $(this).data('item');
                    BXReady.showAjaxShadow('#bxr-delay-body','bxr-basket-body-shadow');
                    basket.deleteItem(itemID);
                }
            );

            $(document).on(
                'click',
                '#bxr-basket-body .icon-button-delay',
                function(){
                    itemID = $(this).data('item');
                    BXReady.showAjaxShadow('#bxr-basket-body','bxr-basket-body-shadow');
                    basket.delayItem(itemID);
                }
            );

            $(document).on(
                'click',
                '#bxr-basket-body .icon-button-cart',
                function(){
                    itemID = $(this).data('item');
                    BXReady.showAjaxShadow('#bxr-basket-body','bxr-basket-body-shadow');
                    basket.delayToCart(itemID);
                }
            );

            $(document).on(
                'click',
                '.bxr-basket-indicator',
                function(){

                    var panels = ['bxr-basket-body', 'bxr-delay-body', 'bxr-compare-body', 'bxr-favor-body'];

                    itemID = $(this).data('child');
                    for (i=0; i<panels.length; i++){

                        if (panels[i] != itemID){
                            $('#'+panels[i]).hide();
                        }
                    }

                    $('#'+itemID).fadeToggle(200, function() {
                        setBasketMaxH('#'+itemID);
                    });
                }
            );

            $(document).on(
                'click',
                '.bxr-basket-tab',
                function() {
                    var tabCode = $(this).data('tab');
                    if (tabCode == 'delay') {
                        delayClick = true;
                    } else {
                        delayClick = false;
                    };
                    $('.bxr-basket-tab').removeClass('active');
                    $('.bxr-basket-tab[data-tab='+tabCode+']').addClass('active');
                    $('.bxr-basket-tab-content').removeClass('active');
                    $('.bxr-basket-tab-content[data-tab="'+tabCode+'"]').addClass('active');
                }
            );

            $(document).on(
                'click',
                '.bxr-quantity-button-minus',
                function(){
                    itemID = parseInt($(this).data('item'));

                    operation= $(this).data('operation');

                    newQty = parseInt($(this).parent('.bxr-basket-group').children('.bxr-quantity-text[data-item='+itemID+']').val());
                    if (isNaN(newQty)) newQty = 1;
                    newQty--;

                    if (newQty < 1) newQty = 1;
                    else{
                        if (operation === 'auto_save'){
                            BXReady.showAjaxShadow('#bxr-basket-body','bxr-basket-body-shadow');
                            basket.newQty(itemID, newQty)
                        }
                    }

                    $('.bxr-quantity-text[data-item='+itemID+']').val(newQty);
                }
            );

            $(document).on(
                'click',
                '.bxr-quantity-button-plus',
                function(){
                    itemID = $(this).data('item');

                    operation= $(this).data('operation');
                    maxQty = parseInt($(this).data('max')+0);
                    if (isNaN(maxQty)) maxQty = 0;

                    newQty = parseInt($(this).parent('.bxr-basket-group').children('.bxr-quantity-text[data-item='+itemID+']').val());

                    if (isNaN(newQty)) newQty = 1;
                    newQty++;

                    if (maxQty>0 && newQty > maxQty) newQty = maxQty;
                    else{
                        if (operation === 'auto_save'){
                            BXReady.showAjaxShadow('#bxr-basket-body','bxr-basket-body-shadow');
                            basket.newQty(itemID, newQty)
                        }
                    }

                    $('.bxr-quantity-text[data-item='+itemID+']').val(newQty);
                }
            );

            $(document).mouseup(function (e) {
                var container = 'div.bxr-top-fixed-panel';
                var other = '#bxr-basket-body-shadow';
                var hideContainer = $('div[data-group=basket-group]');

                if ($(e.target).parents(container).length === 0 && $(other).has(e.target).length === 0){
                    hideContainer.hide();
                }
            });

            $(document).on(
                'click',
                '.bxr-close-basket',
                function(){
                    var hideContainer = $('div[data-group=basket-group]');
                    hideContainer.hide(200);
                }
            );

        },

        autoSetVertical: function(){

        },

        init: function(){
            this.basketButtonsInit();
            this.refresh();
        }

    };

});