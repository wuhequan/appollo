$(function(){
            //alert(data['time']);
            
            var showNum= 4;
            var smallNum = 3;
            var Nums = 2;
            var speed = 5000;
            //复制对应的
            var  clineU=$('.banner06 .box ul').clone();
            $('.banner06 .title-big .show').append(clineU);
            //给第一个on
           $('.banner06 .title-big li').eq(0).addClass('on');
            var num=0;
            var time=null;
            var bigL= $('.banner06 .title-big li').length;
            var liW = $('.banner06 .title-big li').height()+10;
            // 定义大图切换
            var bigSlect=function(index){
                $('.banner06 .box li').eq(index).fadeIn(500)
                 .siblings().fadeOut(500);                
            };
            function litleSlect(numS){
               $('.banner06 .title-big li').eq(numS).addClass('on')
                .siblings().removeClass('on');
            }

            //点击缩略图
            $('.banner06 .title-big').on('click', 'li',function(){
                    var index=$(this).index();
                    $(this).addClass('on')
                           .siblings().removeClass('on');
                    bigSlect(index);
                    num=index;
                }
            )

            //定时器
            //var timeF=function(){
               // if( 0 <= num){
                   // num++;
                   // litleSlect(num);
                   // bigSlect(num);
               // }
               // if( num >= bigL){
                //     num=0;
                 //   litleSlect(num);
                 //   bigSlect(num); 
                //    $('.banner06 .title-big ul').css({ 'top': 0})              
              //  }
              //  if( num >=showNum ){
               //     var num1=num-smallNum;
                 //   var leftN=num1*(-liW);
               //     $('.banner06 .title-big ul').css({ 'top': leftN})
               // }
           // }
            //time=setInterval(timeF,speed);

            //鼠标进入离开
           // $('.banner06 .box').mouseenter(function() {
               // clearInterval(time)
          //  }).mouseleave(function(){
             //   clearInterval(time)
           //     time = setInterval(timeF,speed);            
            //});

            /*left*/
            $('.banner06 .left11').click(function(event) {                        
                num--;
                if(num <= -1){
                    num=bigL-1;

                    litleSlect(num);
                    bigSlect(num); 

                } else{

                    litleSlect(num);
                    bigSlect(num); 
                }
                if(num >=smallNum){
                     var leftM = ((num-Nums)-1)*(-liW);                   
                     $('.banner06 .title-big ul').css({ 'top':leftM })
                }
            });

            /*right*/
            $('.banner06 .right11').click(function(event) {
                num++;              
                if(num >= bigL ){
                    num=0;
                    $('.banner06 .title-big ul').css({ 'top': 0})
                    litleSlect(num);
                    bigSlect(num);
                } else{
                    litleSlect(num);
                    bigSlect(num); 
                } 
                if( num >= showNum ){
                    var leftR=(num-smallNum)*(-liW);
                    $('.banner06 .title-big ul').css({ 'top': leftR})
                } 
            });
})