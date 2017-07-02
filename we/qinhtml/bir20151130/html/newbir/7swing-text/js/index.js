var windVal = 0,
    blowVal = 0,
    cycle = 80,
    cycleAmt = 0.03;

var container = document.querySelectorAll('.container')[0];
    container.style.width = window.innerWidth + 'px';
    container.style.height = 528 + 'px';

var Segment = function (settings) {
    settings = settings || {};
    this.angle = settings.angle || 0;
    this.cycle = settings.cycle;
    
    this.x = settings.x || 0;
    this.y = settings.y || 0;
 
    
    this.element = document.createElement('span');
    this.element.classList.add('letter');
    this.element.textContent = settings.letter;
    this.element.style.color = colorCycle(this.cycle);
    container.appendChild(this.element);
    
    this.width = parseInt(window.getComputedStyle(this.element,null).getPropertyValue('width'), 10) + 5;
    this.height = parseInt(window.getComputedStyle(this.element,null).getPropertyValue('height'),10);
}

Segment.prototype.getJoint = function () {
    var x = this.x + Math.cos(this.angle) * this.width,
        y = this.y + Math.sin(this.angle) * this.width;
    return {
        x: x,
        y: y
    };
};

Segment.prototype.render = function (el) {
    el.style.left = this.x +'px';
    el.style.top = this.y + 'px';
    el.style.webkitTransform = "rotate(" + this.angle + "deg)";
    this.element.style.color = colorCycle(this.cycle++);
};

var WordString = function (settings) {
    settings = settings || {};
    this.x = settings.x || 0;
    this.y = settings.y || 0;
    this.target = {x : 0, y : 0},
    this.text = settings.text.split('');
    this.text.reverse().join('');
    
    this.segNum = settings.text.length;
    this.angle = (Math.random() * 360 - 180) * Math.PI / 180;
    this.segments = [];

    for (var s = 0; s < this.segNum-1; s++) {
        this.segments.push(new Segment({
            letter: this.text[s],
            angle: (Math.random() * 360 - 180) * Math.PI / 180,
            cycle : cycle+=cycleAmt
        }));
    }
    
    this.segments.push(new Segment({
        x: this.x,
        y: this.y,
        angle: this.angle,
        letter: this.text[this.segNum-1],
        cycle : cycle+=cycleAmt
    }));
}

WordString.prototype.track = function (segment, x, y) {    
    var dx = x - segment.x,
        dy = y - segment.y;
    
    segment.angle = Math.atan2(dy, dx);

    var w = segment.getJoint().x - segment.x,
        h = segment.getJoint().y - segment.y;

    return {
          x: x - w,
          y: y - h
    };
}

WordString.prototype.position = function(segmentA, segmentB){
    segmentA.x = segmentB.getJoint().x;
    segmentA.y = segmentB.getJoint().y;
};

WordString.prototype.update = function () {
    var curX = this.segments[this.segments.length-1].x + windVal,
        reachTarget = { x : curX, y : window.innerHeight+500};

    this.target = this.track(this.segments[0], reachTarget.x, reachTarget.y);
    var track = this.track,
        target = this.target,
        position = this.position;
    
    this.segments.forEach(function (e, i, seg) {
        if (i !== 0) {
            target = track(e, target.x, target.y);
            position(seg[i - 1], seg[i]);
        }
    });
};

WordString.prototype.render = function () {
    this.segments.forEach(function (e) {
        e.render(e.element);
    });
};

WordString.prototype.destroy = function(){
    this.segments.forEach(function (e, i, arr) {
        e.element.remove();
    });
}

var wordChains = [],
    chainCount = 20;
var words=new Array();
words[0]='把所有的祝福放进希望的船，让你再也感觉不到孤单';//生日快乐!祝你生日快乐，
words[1]='愿你的人生永远幸福美满，让烦恼全都烟消云散';
words[2]='没有彩的鲜花,没有浪漫的诗句,没有宝贵的礼品';
words[3]="没有兴奋的惊喜,只需悄然的祝福,祝你生日快乐";
words[4]='每年的今天，都是我最牵挂你的日子';
words[5]="愿我的祝福，如一缕灿烂的阳光，在你的眼里流淌";
words[6]='清澈的小溪欢快的流淌，秀美的鲜花开心的绽放';
words[7]='源源的泉水叮咚叮咚响，生日的歌此刻为你而唱';
words[8]='人生路上平安吉祥，好运永远伴你身旁';
words[9]='没有你，风的面目变得狰狞';
words[10]='我在岁月的枕上辗转，把思念编成弦乐';
words[11]='你的微笑曾那么顽固地垄断我每个美梦';
words[12]='愿所有的快乐所有的幸福所有的好运围绕在你身边';
words[13]='愿你的生日充满无穷的快乐，愿你今天的回忆温馨';
words[14]='愿你所有的梦想甜美，愿你这一年称心如意';
words[15]='每个生日都有祝福，每句祝福都有礼物';
words[16]='每份礼物都有惊喜,每段惊喜都是人生';
words[17]='每种人生都有记忆，每段记忆中都有你';
words[18]='夜里等待着你生日的来临，当钟声敲响的一瞬间';
words[19]='我将与你共享属于你的一天，我的心与你同在';
words[20]='每年今天你都会收到我的祝福,感到我永远的爱';
words[21]='暖暖的烛光里，有我最美好的祝愿';
words[22]='愿祝福萦绕着你，在你缤纷的人生之旅';
words[23]='在你永远与春天接壤的梦幻里,祝你:幸福快乐';
words[24]='在你生日的这一天，将快乐的音符';
words[25]='作为礼物送给你，愿你一年天快快乐乐，平平安安';
words[26]='感激上苍在今日给了我一个特其余礼品,就是你';
words[27]='长长的人活门途，有你相伴是我终身的幸福';


for(var w = 0; w < chainCount; w++){
    //var word = createRandomString(~~(Math.random()*window.innerHeight/35)+5);
    //alert(parseInt(Math.random()*100000%28));
    var x=parseInt(Math.random()*100000%28);
    //alert(x);
    wordChains.push(new WordString({
        text: words[x],
        x : (window.innerWidth/chainCount) * w,
        y : 0
    }));
}

function update(){
    for(var w = 0; w < chainCount; w++){
        wordChains[w].update();
        wordChains[w].render();
    }
    windVal=Math.sin(blowVal)*75;
    blowVal+=0.1;
    requestAnimationFrame(update);
}

update();


// dem utils
function createRandomString(wlen) {
    //var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    var chars="还是打速度哈的哈就快点哈结婚多久啊";
     var   word = "";
    while(wlen--){
        word+=chars[~~(Math.random()*chars.length)];
    }
    return word;
}

function colorCycle(cycle, bright, light) {
    bright = bright || 255;
    light = light || 0;
    cycle *= .1;
    var r = ~~ (Math.sin(.3 * cycle + 0) * bright + light),
        g = ~~ (Math.sin(.3 * cycle + 2) * bright + light),
        b = ~~ (Math.sin(.3 * cycle + 4) * bright + light);
   // alert('rgb(' + Math.min(r, 255) + ',' + Math.min(g, 255) + ',' + Math.min(b, 255) + ')');
    return 'rgb(' + Math.min(r, 255) + ',' + Math.min(g, 255) + ',' + Math.min(b, 255) + ')';
}
