$(function(){
   //logo的效果
    var winH = $('.header .nav li .title').height()
    $(window).scroll(function(e) {
        
        var winTop = $(window).scrollTop() 
        if( winTop > winH ){ 
            $('.header .logo').css({'width':'100px'})        
            //$('.notice').fadeIn(500)
        }else{
            //$('.notice').fadeOut(500);
            $('.header .logo').css({'width':'178px'})  
        };

    });
    // 导航
    var winW = $(window).width();

    if( winW >= 1040){
    // 大分区的导航栏的效果
        $('.header .nav li').hover(function() {
            $('.header .nav li .child').stop().hide();
            $(this).find(".child").stop().show();
        },function(){
            $(this).find(".child").stop().hide();
        });
        // 结束
        // 遍历所有 增加样式
        $('.header .nav li .child').each(function(el) {
            $(this).find('.imgs00').eq(0).stop().show();
            $(this).find('.h').hover(function() {
                $('.header .nav li .child').find('.h').removeClass('s');
                $(this).addClass('s');
                var mmm = $(this).index();
                $('.header .nav li .child').each(function(index, el) {
                    $(this).find('.imgs00').eq(mmm).stop().show().siblings().hide();
                });
            });
            // $(this).mouseleave(function(event) {
            //     $(this).hide();
            // });
            
        });
    }
    // 中英文切换
    function s(e){
        $(e).children().stop().slideToggle(400)
    };
    $('.header .customer .child').click(function(event) {
        var i = $(this);
        s(i)
    });
    // 手机端导航的切换
    $('.header .mobile').click(function(event) {
        $('.mobile-nav').toggleClass('show');
        $('body').toggleClass('oh');
		
    });
    $('.header .mobile-nav dt').click(function(event) {

       $(this).parent().toggleClass('l');
       $('.header .mobile-nav dt').not($(this)).parent().removeClass('l')
    
    });
    // $('.header .mobile-nav dl .mm').hover(function() {
    //     $('.header .mobile-nav dl .mm .list').hide();
    //     $(this).find('.list').stop().show();
    // });
    // $('.header .mobile-nav dl .mm').mouseleave(function(event) {
    //     $(this).find('.list').stop().hide();
    // });
    // 结束
	var winWidth = $(window).width()+17;
	if(winWidth<656) {
		$('.header .mobile').click(function(event) {
			$('body,html').toggleClass('oh');
            $('.header .scroll_box').stop().fadeToggle();
		});
         
	}
    if(winWidth<1023) {
        $(".header .mobile-nav dl dd .m0").each(function(i,n){
            $(this).attr("href","javascript:void(0)");
        });
         $(".header .mobile-nav dl dd .m0").click(function(){
            $(".header .mobile-nav dl dd .m0").parent().find('.list').not($(this)).stop().fadeOut();
            $(this).siblings('.list').stop().fadeToggle();
        });
    }
})