//自动关闭提示框  
function Alert(str,time) {
    var msgw,msgh,bordercolor;
    msgw=350;//提示窗口的宽度  
    msgh=80;//提示窗口的高度  
    titleheight=25 //提示窗口标题高度  
    bordercolor="#336699";//提示窗口的边框颜色  
    titlecolor="#99CCFF";//提示窗口的标题颜色  
    var sWidth,sHeight;
    //获取当前窗口尺寸  
    sWidth = document.body.offsetWidth;
    sHeight = document.body.offsetHeight;
//    //背景div  
    var bgObj=document.createElement("div");
    bgObj.setAttribute('id','alertbgDiv');
    bgObj.style.position="absolute";
    bgObj.style.top="0";
    bgObj.style.background="#E8E8E8";
    bgObj.style.filter="progid:DXImageTransform.Microsoft.Alpha(style=3,opacity=25,finishOpacity=75";
    bgObj.style.opacity="0.6";
    bgObj.style.left="0";
    bgObj.style.width = sWidth + "px";
    bgObj.style.height = sHeight + "px";
    bgObj.style.zIndex = "10000";
    document.body.appendChild(bgObj);
    //创建提示窗口的div  
    var msgObj = document.createElement("div")
    msgObj.setAttribute("id","alertmsgDiv");
    msgObj.setAttribute("align","center");
    msgObj.style.background="white";
    msgObj.style.border="1px solid " + bordercolor;
    msgObj.style.position = "absolute";
    msgObj.style.left = "50%";
    msgObj.style.font="12px/1.6em Verdana, Geneva, Arial, Helvetica, sans-serif";
    //窗口距离左侧和顶端的距离   
    //msgObj.style.marginLeft = "-225px";
    msgObj.style.marginLeft = "-175px";
    //窗口被卷去的高+（屏幕可用工作区高/2）-150
    //msgObj.style.top = document.body.scrollTop+(window.screen.availHeight/2)-150 +"px";
    msgObj.style.top = (window.screen.availHeight/5) +"px";
   // alert(window.screen.availHeight+"px");//+(window.screen.availHeight/2)
    msgObj.style.width = msgw + "px";
    msgObj.style.height = msgh + "px";
    msgObj.style.textAlign = "center";
    msgObj.style.lineHeight ="25px";
    msgObj.style.zIndex = "10001";
    document.body.appendChild(msgObj);
    //提示信息标题  
    var title=document.createElement("h4");
    title.setAttribute("id","alertmsgTitle");
    title.setAttribute("align","left");
    title.style.margin="0";
    title.style.padding="3px";
    title.style.background = bordercolor;
    title.style.filter="progid:DXImageTransform.Microsoft.Alpha(startX=20, startY=20, finishX=100, finishY=100,style=1,opacity=75,finishOpacity=100);";
    title.style.opacity="0.75";
    title.style.border="1px solid " + bordercolor;
    title.style.height="18px";
    title.style.font="12px Verdana, Geneva, Arial, Helvetica, sans-serif";
    title.style.color="white";
    title.innerHTML="您好，我将自动消失";
    document.getElementById("alertmsgDiv").appendChild(title);
    //提示信息  
    var txt = document.createElement("p");
    txt.setAttribute("id","msgTxt");
    txt.style.margin="16px 0";
    txt.innerHTML = str;
    document.getElementById("alertmsgDiv").appendChild(txt);
    //设置关闭时间  
    window.setTimeout("closewin()",time);
}
function closewin() {
    document.body.removeChild(document.getElementById("alertbgDiv"));
    document.getElementById("alertmsgDiv").removeChild(document.getElementById("alertmsgTitle"));
    document.body.removeChild(document.getElementById("alertmsgDiv"));
}


/**
 * 留言
 */
function talk(){
    $message=$("#message").val().trim();
    //alert($("#message").val());
    $friendid=$("#friendid").val();
    $friendNickName=$("#friendid").find("option:selected").text();

    /*alert($friendid+" xxxx "+$friendNickName);
     return ;*/
    if($message==''){
        Alert("请输入留言内容！！！",2500);
        return;
    }
    $(function(){

        $.ajax({
            url: "control/message.php",
            type: "POST",
            //contentType: "application/json; charset=utf-8",
            data:{"message":$message,"toID":$friendid,"toNickName":$friendNickName},
            //dataType: "json",
            error: function(){
                alert('Error loading XML document');
            },
            success: function(data,status){//如果调用php成功
                // alert(data);
                if(data!=1){
                    Alert("留言不成功!!!",3000);
                }else{
                    Alert("留言成功",3000);
                    self.location='index.php';
                }

                // alert(data);
            }
        });

    });
}

/**
 * 注册
 * @returns {boolean}
 */
function register(){
    var username= $("#register_username").val().trim();
    var password= $("#register_password").val().trim();
    var password1= $("#register_password1").val().trim();
    var email= $("#register_email").val().trim();
    var nickname= $("#register_nickname").val().trim();

    if(username==null || username==""){
        Alert("用户名不能为空",2000);
       // $("#register_username_message").text("用户名不能为空");
        return false;
    }

    if(password==null ||password==""){
        Alert("密码不能为空",2000);
        //$("#register_password_message").text("密码不能为空");
        return false;
    }

    if(password!=password1){
        Alert("两次密码不一致",2000);
        //$("#register_password1_message").text("两次密码不一致");
        return false;
    }

    if(email==null || email==""){
        Alert("邮箱不能为空",2000);
        //$("#register_email_message").text("邮箱不能为空");
        return false;
    }

    if(nickname==null || nickname==""){
        Alert("昵称不能为空",2000);
        //$("#register_nickname_message").text("昵称不能为空");
        return false;
    }

    //var datajson='{"username":username ,"password":password ,"email":email,"nickname":nickname}';
    //alert(username+" "+password+" "+password1+" "+email+" "+nickname);
    var result=true;
    //return false;
    $(function(){
        var my_data="前台变量";
        my_data=escape(my_data)+"";//编码，防止汉字乱码
        $.ajax({
            url: "control/registerCheck.php",
            type: "POST",
            //contentType: "application/json; charset=utf-8",
            data:{"username":username ,"password":password ,"email":email,"nickname":nickname},
            //dataType: "json",
            error: function(){
                result=false;
                alert('Error loading XML document');
            },
            async: false,
            success: function(data,status){//如果调用php成功
                //alert(data);
                switch (data){
                    case "0":
                        self.location='index.php';
                        break;
                    case "1":
                        //$("#register_username_message").text("用户名已经存在");
                        Alert("用户名已经存在",2000);
                       // return false;
                        result=false;
                        break;
                    case "2":
                        //$("#register_email_message").text("邮箱已经存在");
                        Alert("邮箱已经存在",2000);
                        //return false;
                        result=false;
                        break;
                    case "3":
                       // $("#register_nickname_message").text("昵称已经存在");
                        Alert("昵称已经存在",2000);
                        //return false;
                        result=false;
                        break;
                    case "-1":
                        Alert("数据库连接错误",2000);
                        //return false;
                        result=false;
                        break;
                    case "-2":
                        Alert("操作错误",2000);
                           // return false;
                        result=false;
                        break;
                }
                if(data!="0"){
                    //return false;
                    result=false;
                }
                // alert(unescape(data));//解码，显示汉字
            }
        });

    });
    return result;
}

/**
 * 登陆
 */
function login(){
    //alert("ssss");
    var username= $("#login_username").val().trim();
    var password= $("#login_password").val().trim();
   // alert(username);
    if(username==null || username==""){
        Alert("用户名不能为空",2000);
        //$("#login_username_message").text("用户名不能为空");
        return;
    }
    if(password==null || password==""){
        Alert("密码不能为空",2000);
        //$("#login_password_message").text("密码不能为空");
        return;
    }
    $result=true;
    $(function(){
        var my_data="前台变量";
        my_data=escape(my_data)+"";//编码，防止汉字乱码
        $.ajax({
            url: "control/loginCheck.php",
            type: "POST",
            async: false,
            //contentType: "application/json; charset=utf-8",
            data:{"username":username ,"password":password},
            //dataType: "json",
            error: function(){
                Alert("请重试",2000);
            },
            success: function(data,status){//如果调用php成功
                // 0用户名不存在
                // 1登陆成功
                // 2密码错误
                // -1数据库连接错误
                // -2操作错误
                //alert(data);
                switch (data){
                    case "1":
                        $result=true;
                       // self.location='index.php';
                        break;
                    case "0":
                       // $("#login_username_message").text("用户名错误");
                        Alert("用户名不存在",2000);
                        $result=false;
                        break;
                    case "2":
                       // $("#login_password_message").text("密码错误");
                        Alert("密码错误",2000);
                        $result=false;
                        break;
                    default :
                        Alert("请重试......",2000);
                        $result=false;
                        break;
                }
                // alert(unescape(data));//解码，显示汉字
            }
        });

    });
    if($result){
        self.location='index.php';
    }else{
        return false;
    }
}

function login1(){
    //alert("ssss");
    var username= $("#login1_username").val().trim();
    var password= $("#login1_password").val().trim();
    // alert(username);
    if(username==null || username==""){
        Alert("用户名不能为空",2000);
        //$("#login_username_message").text("用户名不能为空");
        return;
    }
    if(password==null || password==""){
        Alert("密码不能为空",2000);
        //$("#login_password_message").text("密码不能为空");
        return;
    }
    $result=true;
    $(function(){
        var my_data="前台变量";
        my_data=escape(my_data)+"";//编码，防止汉字乱码
        $.ajax({
            url: "control/loginCheck.php",
            type: "POST",
            async: false,
            //contentType: "application/json; charset=utf-8",
            data:{"username":username ,"password":password},
            //dataType: "json",
            error: function(){
                Alert("请重试",2000);
            },
            success: function(data,status){//如果调用php成功
                // 0用户名不存在
                // 1登陆成功
                // 2密码错误
                // -1数据库连接错误
                // -2操作错误
                //alert(data);
                switch (data){
                    case "1":
                        $result=true;
                        // self.location='index.php';
                        break;
                    case "0":
                        // $("#login_username_message").text("用户名错误");
                        Alert("用户名不存在",2000);
                        $result=false;
                        break;
                    case "2":
                        // $("#login_password_message").text("密码错误");
                        Alert("密码错误",2000);
                        $result=false;
                        break;
                    default :
                        Alert("请重试......",2000);
                        $result=false;
                        break;
                }
                // alert(unescape(data));//解码，显示汉字
            }
        });

    });
    if($result){
        self.location='index.php';
    }else{
        return false;
    }
}
/**
 * 时间控制
 */
function timezone(){
    var birthdayStr="2015-11-04";
    var myDate = new Date();
    //var year=myDate.getYear();        //获取当前年份(2位)
    var year=myDate.getFullYear();    //获取完整的年份(4位,1970-????)
    var month=myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
    var date=myDate.getDate();        //获取当前日(1-31)
    var day=myDate.getDay();         //获取当前星期X(0-6,0代表星期天)
    var time=myDate.getTime();        //获取当前时间(从1970.1.1开始的毫秒数)
    var hour= myDate.getHours();       //获取当前小时数(0-23)
    var minutes= myDate.getMinutes();     //获取当前分钟数(0-59)
    myDate.getSeconds();     //获取当前秒数(0-59)
    myDate.getMilliseconds();    //获取当前毫秒数(0-999)
    myDate.toLocaleDateString();     //获取当前日期
    var mytime=myDate.toLocaleTimeString();     //获取当前时间
    myDate.toLocaleString( );        //获取日期与时间

    //var timearea=Array(08,10,12,14,16,18,20);
    //$atext=$("#timezone").find("button:eq(1) a").text();
    var birthday=convertTimes(birthdayStr,0,0,0);
    var distance=birthday-Date.parse(myDate);
    if(distance>0){
        //alert("时间还没到");
    }else{
        var result=0;
        if(Date.parse(myDate)>convertTimes(birthdayStr,18,0,0)){
            result=7;
        }else if(hour<8){
            result=1;//alert("还没到8点");
        }else if(hour<10){
            result=2;//alert("还没到10点");
        }else if(hour<12){
            result=3;//alert("还没到12点");
        }else if(hour<14){
            result=4;//alert("还没到14点");
        }else if(hour<16){
            result=5;//alert("还没到16点");
        }else if(hour<18){
            result=6;//alert("还没到18点");
        }else if(hour<20){
            result=7;//alert("还没到20点");
        }
        $("#timezone").find("button:eq(0) span").text(result+"/9");
        //alert(result);
        /*            /!**
         * btn btn-primary
         * btn-success
         * btn-info
         * btn-warning
         * btn-danger
         * btn-primary
         * btn-success
         * btn-default
         * /*/
         alert(result);
        switch (result){
            case 7:
                $("#timezone").find("button:eq(7) a").attr("href","../6romantic/index.html");
                $("#timezone").find("button:eq(7)").attr("class","btn btn-success");

            case 6:
                $("#timezone").find("button:eq(6) a").attr("href","../1cake/index.html");
               $("#timezone").find("button:eq(6)").attr("class","btn btn-primary");

            case 5:
                $("#timezone").find("button:eq(5) a").attr("href","../8text-pixel/index.html");
               $("#timezone").find("button:eq(5)").attr("class","btn btn-danger");

            case 4:
                $("#timezone").find("button:eq(4) a").attr("href","../7swing-text/index.html");
                $("#timezone").find("button:eq(4)").attr("class","btn btn-warning");

            case 3:
                $("#timezone").find("button:eq(3) a").attr("href","../5roller-coaster/index.html");
               $("#timezone").find("button:eq(3)").attr("class","btn btn-info");

            case 2:
                $("#timezone").find("button:eq(2) a").attr("href","../2fox-run/index.html");
                $("#timezone").find("button:eq(2)").attr("class","btn btn-success");

            case 1:
                $("#timezone").find("button:eq(1) a").attr("href","../2fox-run/index.html");
                $("#timezone").find("button:eq(1)").attr("class"," btn btn-primary");

            default :
                break;
        }
    }
}/**
 * 时间控制
 */
function timezone1(){
    var birthdayStr="2015-11-30";
    var myDate = new Date();
    //var year=myDate.getYear();        //获取当前年份(2位)
    var year=myDate.getFullYear();    //获取完整的年份(4位,1970-????)
    var month=myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
    var date=myDate.getDate();        //获取当前日(1-31)
    var day=myDate.getDay();         //获取当前星期X(0-6,0代表星期天)
    var time=myDate.getTime();        //获取当前时间(从1970.1.1开始的毫秒数)
    var hour= myDate.getHours();       //获取当前小时数(0-23)
    var minutes= myDate.getMinutes();     //获取当前分钟数(0-59)
    myDate.getSeconds();     //获取当前秒数(0-59)
    myDate.getMilliseconds();    //获取当前毫秒数(0-999)
    myDate.toLocaleDateString();     //获取当前日期
    var mytime=myDate.toLocaleTimeString();     //获取当前时间
    myDate.toLocaleString( );        //获取日期与时间

    //var timearea=Array(08,10,12,14,16,18,20);
    //$atext=$("#timezone").find("button:eq(1) a").text();
    var birthday=convertTimes(birthdayStr,0,0,0);
    var distance=birthday-Date.parse(myDate);
    if(distance>0){
        //alert("时间还没到");
    }else{
        var result=0;
        if(Date.parse(myDate)>convertTimes(birthdayStr,18,0,0)){
            result=6;
        }else if(hour<8){
            result=0;//alert("还没到8点");
        }else if(hour<10){
            result=1;//alert("还没到10点");
        }else if(hour<12){
            result=2;//alert("还没到12点");
        }else if(hour<14){
            result=3;//alert("还没到14点");
        }else if(hour<16){
            result=4;//alert("还没到16点");
        }else if(hour<18){
            result=5;//alert("还没到18点");
        }
        $("#timezone").find("button:eq(0) span").text(result+"/6");
        //alert(result);
        /*            /!**
         * btn btn-primary
         * btn-success
         * btn-info
         * btn-warning
         * btn-danger
         * btn-primary
         * btn-success
         * btn-default
         * /*/
        //alert(result);
        switch (result){
            case 6:
                $("#timezone").find("a:eq(5)").attr("href","../6romantic/index.html");
                $("#timezone").find("a:eq(5)").attr("class","list-group-item btn btn-success");

            case 5:
                $("#timezone").find("a:eq(4)").attr("href","../1cake/index.html");
               $("#timezone").find("a:eq(4)").attr("class","list-group-item btn btn-primary");

            case 4:
                $("#timezone").find("a:eq(3)").attr("href","../8text-pixel/index.html");
               $("#timezone").find("a:eq(3)").attr("class","list-group-item btn btn-danger");

            case 3:
                $("#timezone").find("a:eq(2)").attr("href","../7swing-text/index.html");
                $("#timezone").find("a:eq(2)").attr("class","list-group-item btn btn-warning");

            case 2:
                $("#timezone").find("a:eq(1)").attr("href","../5roller-coaster/index.html");
                $("#timezone").find("a:eq(1)").attr("class","list-group-item btn btn-info");


            case 1:
                $("#timezone").find("a:eq(0)").attr("href","../2fox-run/index.html");
                $("#timezone").find("a:eq(0)").attr("class","list-group-item btn btn-primary ");
            default :
                break;
        }
    }
}
/**
 * 时间戳转换
 * @param dates
 * @param hour
 * @param minutes
 * @param seconds
 * @returns {number}
 */
function convertTimes( dates,hour,minutes,seconds){
    var date = dates.split('-');
    var d= new Date(date[0],date[1]-1,date[2],hour,minutes,seconds);
    /*d.setFullYear(date[0]);
     d.setMonth(date[1]-1);
     d.setDate(date[2]);*/
    //return d.getMilliseconds();
    return Date.parse(d);

}


/**
 * 计算结婚
 */
function jisuanBirthday(){

    var birthday=$("#jisuanbirthday").val();
    if(birthday==""){
        Alert("请输入正确的时间",3000);
        return ;
    }
    var year=parseInt(birthday.split("-")[0]);
    //alert(year);
    if( year>1999){
        Alert("少儿不宜，00后请略过",3000);
        return ;
    }else if(year<1960){
        Alert("您还没结婚啊？赶紧找老婆吧",3000);
        return ;
    }
    $(function(){
        var my_data="前台变量";
        my_data=escape(my_data)+"";//编码，防止汉字乱码
        $.ajax({
            url: "control/jisuanBirthday.php",
            type: "POST",
            //contentType: "application/json; charset=utf-8",
            data:{"birthday":birthday },
            dataType: "json",
            error: function(){
                alert('Error loading XML document');
            },
            success: function(data,status){//如果调用php成功
                console.log(data);
                // alert(data.message);
                var mess='<h2 style="color: red">'+data.star+'</h2><br>'+'<p class="wo" style="text-align: left">'+data.message+'</p>';
                mess=mess+'<h3 style="text-align: left;color: #007700">'+data.lovepeople+'</h3>';
                mess=mess+'<p class="wo" style="text-align: left;color: #31b0d5">'+data.lovemessage+'</p>';
                mess=mess+'<h3 style="text-align: left;color: #7f0055">'+data.loveage+'</h3>';
                mess=mess+'<p class="wo" style="text-align: left;color: #003399">'+data.loveagemessage+'</p>';
                $("#showbirthday").html(mess);
            }
        });
    });
}