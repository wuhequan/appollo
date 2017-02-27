$(function(){
    var num =0;
    var speed  = 1000;
    var w = $('.banner04 .big ul li').length*$('.banner04 .big ul li').width();
    $('.banner04 .big ul').css({'width':w});
    
    var four = $('.banner04 .big ul li')
    var liW = $('.banner04 .big ul li').width();
    var bigL= $('.banner04 .big ul li').length;
    var showNum= 2;
    var smallNum = 1;
    var Nums = 0;
    // jialei
    function litleSlect(numS){
        $('.banner04 .big ul li').eq(numS).addClass('on')
             .siblings().removeClass('on');
     }
            function litleSlect(numS){
               $('.banner04 .big ul li').eq(numS).addClass('on')
                .siblings().removeClass('on');
            }
            $('.left00').click(function(event) {                        
                num--;
                if(num <= -1){
                    num=bigL-1;

                    litleSlect(num);

                } else{

                    litleSlect(num);
                }
                if(num >=smallNum){
                     var leftM = ((num-Nums)-1)*(-liW);                   
                     $('.banner04 .big ul').css({ 'left':leftM })
                }
            });
                var i = $('.banner04 .big ul li').length;
                var s = i-4

            /*right*/
            $('.right00').click(function(event) {
                num++;              
                if(num >= bigL ){
                    num=0;
                    $('.banner04 .big ul').css({ 'left': 0})
                    litleSlect(num);
                } else{
                    litleSlect(num);
                } 
               if( num >=showNum ){
                    //var dog =$('.banner04 .big ul li').(odd)*2
                    var leftR=(num-smallNum)*(-liW);
                    //var leftR01=(num-smallNum)*(-liW);
                    //var s =(num-smallNum)*(-dog)
                   $('.banner04 .big ul').css({ 'left': leftR});
              }else{
                    //$('.banner04 .big ul').css({ 'left': leftR01});
                } 
                                //alert(s)
            });
        
})
