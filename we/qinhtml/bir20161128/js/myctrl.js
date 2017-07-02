var app = angular.module('myApp', []);
app.controller('firstCtrl', function($scope) {
	var dropdownMenu4 ={
		des:"2016年11月18日，这是你24岁的生日，我要陪在的身边，这次生日我准备的很匆忙，希望你不要介意啊。",
		time:"2016.11.18",
		items:
		[
		{
			href:"http://photo.xyzlaser.cn/index.php?g=Wap&m=Music&a=show&token=dbuenm1453366864&bookname=oWzDfs038esQjay3yFkgf13VhVkw4745687840925526wqlcms1478088385",
			title:"浪漫十一(1)"
		},
		{
			href:"http://photo.xyzlaser.cn/index.php?g=Wap&m=Music&a=show&token=dbuenm1453366864&bookname=oWzDfs038esQjay3yFkgf13VhVkw436482568131759wqlcms1478089339",
			title:"浪漫十一(2)"
		},
		{
			href:"http://photo.xyzlaser.cn/index.php?g=Wap&m=Music&a=show&token=dbuenm1453366864&bookname=oWzDfs038esQjay3yFkgf13VhVkw5188226903975006wqlcms1478094455",
			title:"浪漫十一(3)"
		},
		{
			href:"http://photo.xyzlaser.cn/index.php?g=Wap&m=Music&a=show&token=dbuenm1453366864&bookname=oWzDfs038esQjay3yFkgf13VhVkw9012216684734442wqlcms1478094829",
			title:"浪漫十一(4)"
		}
		]
	};
    $scope.dropdownMenu4 = dropdownMenu4;

    var dropdownMenu3 ={
		des:"2015年11月30日，这一天是你的生日，但我没有在你的身边，只是简单的为你祝福。",
		time:"2015.11.30",
		items:
		[
		{
			href:"6romantic/index.html",
			title:"浪漫爱心"
		},
		{
			href:"8text-pixel/index.html",
			title:"爆炸文字"
		},
		{
			href:"7swing-text/index.html",
			title:"魔力文字"
		},
		{
			href:"5roller-coaster/index.html",
			title:"过山车"
		},
		{
			href:"2fox-run/index.html",
			title:"奔跑的狐狸"
		},
		{
			href:"1cake/index.html",
			title:"生日蛋糕"
		},
		{
			href:"http://v.youku.com/v_show/id_XMTM3NzMzNTYxMg==.html",
			title:"视频播放(1314520)"
		}
		]
	};
    $scope.dropdownMenu3 = dropdownMenu3;

    var dropdownMenu2 ={
		des:"2015年4月份这个时候，你为了找工作，到处东奔西跑，就在那时候你学会了自己一个人找一个陌生的地方，我很担心你不见了，可我又不能为你做些啥，只能祈祷你别跑不见了，找不到回去的路。最后没找到工作，我让你就自己学习，提高自己，这就是你做的成果。",
		time:"2015.4月",
		items:
		[
		{
			href:"wzgs/index.html",
			title:"学习中"
		}
		]
	};
    $scope.dropdownMenu2 = dropdownMenu2;

    var dropdownMenu1 ={
		des:"2014年12月30日，你说：“你给了我一个华丽的告白，在那天，我觉得自己好幸福。于是这一天成为我们纪念的日子---我们交往的第一天”",
		time:"2014.12.30",
		items:
		[
		{
			href:"2014mywebpage/index.html",
			title:"纪念"
		}
		]
	};
    $scope.dropdownMenu1 = dropdownMenu1;

    /*产生m个随机数，在n的范围内 start*/
    function randNum(m,n){
    	var reds=setnum(n);//红球
    	var items=[];
		while(items.length<m){
		    var index=rang(1,reds.length);
		    if(reds[index]!=0){
		        items.push(index);
		        reds[index]=0;
		    }
		}
		//alert(items);
		return items;
    }
    //产生随机数
	function rang(min,max){
	    var cur=max-min+1;
	    return Math.floor(Math.random()*cur+min);
	}
	function setnum(n){
	    var numbs=[];
	    for(var i=1;i<=n;i++){
	        numbs.push(i);
	    }
	    return numbs;
	}
	/*产生m个随机数，在n的范围内 end*/

	var num = randNum(10,32);
	var center11 = [];
	for(var i=0;i<num.length;i++){
		var rowi={url:"images/20161001/"+num[i]+".jpg"};
		center11.push(rowi);
	}
    //轮播图片
    /*var center11 =[
    	{url:"images/01.jpg"},
    	{url:"images/02.jpg"},
    	{url:"images/03.jpg"},
    	{url:"images/04.jpg"},
    	{url:"images/05.jpg"},
    	{url:"images/06.jpg"},
    	{url:"images/07.jpg"},
    	{url:"images/08.jpg"},
    	{url:"images/09.jpg"},
    	{url:"images/10.jpg"}
    ]*/
    $scope.center11 = center11;

    //背景音乐
    $scope.music = "music/peiniduguomanchangsuiyue.mp3";

});
