$(function(){
    var num =0;
    var speed  = 10000;//设置时间 1000=1秒
    var w = $('.small-nav .nav-cont ul li').length*$('.small-nav .nav-cont ul li').width();
    $('.small-nav .nav-cont ul').css({'width':w*2});
    var liW = $('.small-nav .nav-cont ul li').width();
    var bigL= $('.small-nav .nav-cont ul li').length;
    var cloneL = $('.small-nav .nav-cont ul li').eq(0).clone();
    var last = $('.small-nav .nav-cont ul li').last().clone();
    $('.small-nav .nav-cont ul').prepend(last)
    $('.small-nav .nav-cont ul').append(cloneL)
    //$('.small-nav .nav-cont ul li:odd()').addClass('on')
    // jialei
    function litleSlect(numS,index){
        if(numS>=1){
            $('.small-nav .nav-cont ul li').eq(numS).addClass('on').siblings().removeClass('on');
        }else{
            $('.small-nav .nav-cont ul li').eq(numS).addClass('on').siblings().removeClass('on');
        }
        
     }
    $('.small-nav .nav-cont .prev').click(function(event) {
        num--;
        if(num <= -1){
            num=bigL-1;
            $('.small-nav .nav-cont ul').css({ 'left': -liW*num});
            litleSlect(num) 
        } else{
            $('.small-nav .nav-cont ul').css({ 'left': -liW*num});
            litleSlect(num)
        }
    });
    $('.small-nav .nav-cont .next').click(function(event) {
        num++;
        
        if(num >= bigL ){
            num=0;
            $('.small-nav .nav-cont ul').css({ 'left': -liW*num});
            litleSlect(num)
        } else{
            $('.small-nav .nav-cont ul').css({ 'left': -liW*num}); 
            litleSlect(num)
        }
    });
})
