<?php
/**
 * Created by PhpStorm.
 * User: fangyue
 * Date: 2015/10/28
 * Time: 19:48
 */
//header('Content-type:text/json');     //这句是重点，它告诉接收数据的对象此页面输出的是json数据；
$row1=array(46,17,45,16,46,17,47,18,49,19,50,20);
$row2=array(41,12,40,11,41,12,42,13,44,14,45,15);
$row3=array(36,7, 35 ,6,36, 7,37, 8,39, 9,40,10);
$row4=array(30,1,30,1,31,2,32,3,3,4,35,5);
$row5=array(25,56,24,55,25,56,26,57,28,58,29,59);
$row6=array(20,51,19,50,20,51,21,52,23,53,24,54);
$row7=array(15,46,14,45,15,46,16,47,18,48,19,49);
$row8=array(9,40,9,40,10,41,11,42,13,43,14,44);
$row9=array(4,35,3,34,4,35,5,36,7,37,8,38);
$row10=array(59,30,58,29,59,30,0,31,2,32,3,33);

$row11=array(54,25,53,24,54,25,55,26,57,27,58,28);
$row12=array(48,19,48,19,49,20,50,21,52,22,53,23);
$row13=array(43,14,42,13,43,14,44,15,46,16,47,17);
$row14=array(38,9,37,8,38,9,39,10,41,11,42,12);
$row15=array(33,4,32,3,33,4,34,5,36,6,37,7);
$row16=array(27,58,27,58,28,59,29,0,31,1,32,2);
$row17=array(22,53,21,52,22,53,23,54,25,55,26,56);
$row18=array(17,48,10,47,17,48,18,49,20,50,21,5);
$row19=array(12,43,11,42,12,43,13,44,15,45,16,46);
$row20=array(6,37,6,37,7,38,8,39,10,40,1,41);

$A=array(60=>$row1,61=>$row2,62=>$row3,63=>$row4,64=>$row5,65=>$row6,66=>$row7,67=>$row8,68=>$row9,69=>$row10,
    80=>$row1,81=>$row2,82=>$row3,83=>$row4,84=>$row5,85=>$row6,86=>$row7,87=>$row8,88=>$row9,89=>$row10,
    70=>$row11,71=>$row12,72=>$row13,73=>$row14,74=>$row15,75=>$row16,76=>$row17,77=>$row18,78=>$row19,79=>$row20,
    90=>$row11,91=>$row12,92=>$row13,93=>$row14,94=>$row15,95=>$row16,96=>$row17,97=>$row18,98=>$row19,99=>$row20
    );

$B=array(0=>"龙高星",1=>"牵牛星",2=>"车骑星",3=>"司禄星",4=>"禄存星",5=>"调舒星",6=>"凤阁星",7=>"石门星",8=>"贯索星",9=>"玉堂星");

$start1=array("star"=>"龙高星",
    "message"=>"龙高星是一颗充满母性力量的星体，属于这个星系的人，通常个性细心体贴，能像个母亲一样呵护着情人，大都拥有一颗易感的心，能比一般人更容易产生很深的感受，因此基本上这类的人大都具有艺术丶文学丶戏剧等方面的才华。不过由于情绪上容易大鸣大放，在感情上的压练也将特别丰富。可能需要在一番跌跌撞撞之后，才能了解爱与被爱的真谛。",
    "lovepeople"=>"宿命恋人：才气横溢的对象",
    "lovemessage"=>"你所钦慕的对象，往往都是跳脱视觉丶名利之外的。也就是说，外表之外，你更容易为一个人的才华或特质丶性格等痴迷，这种感觉很难拿捏，但是一旦降临，你将会以迅雷不及掩耳的速度坠入爱河。",
    "loveage"=>"有机会结婚的年龄：18丶19丶20丶28岁",
    "loveagemessage"=>"你的恋爱桃花将从18岁滋长，感性的你很快就能初尝两情相悦所带来的幸福感，但是由于个性及想法尚未成熟，爱情的牵绊与烦恼在此时也特别多，得经历一番磨练后，才能慢慢找出答案。");

$start2=array("star"=>"牵牛星",
    "message"=>"属于牵牛星的男女都拥有相当较好的面貌或体态，而牵牛星又称「恋人星」，对异性的吸引力颇高，在同辈的相处上，也与异性的默契较佳。另外，你拥有相当高的IQ，很懂得拿捏爱情丶面包丶朋友等方面的平衡美感，除非遇到比你更高竿的对象，否则，在爱情这场竞技赛中，你通常扮演着占上风的胜利者。",
    "lovepeople"=>"宿命恋人：身边的好友或冤家",
    "lovemessage"=>"你所钟意的对象往往都是身边与你旗鼓相当丶经常较劲的对象，这样的人初期可能是与你一同努力的好朋友，也可能是你某方面假想敌，你容易带着挑战意味看对方，而最后又可能因为欣赏，或折服于他身上某种优于你的条件，坠入爱河。",
    "loveage"=>"有机会结婚年龄：22岁以前丶27丶28丶29岁",
    "loveagemessage"=>"你对爱情有一套自己的想法，在22岁以前容易抱着好奇丶冒险的精神去尝试不同感觉的爱恋，因此很容易受到异性的欢迎，邀约也特别多；27岁左右会有想成家的冲动，也很可能会奉子成婚。");

$start3=array("star"=>"车骑星",
    "message"=>"车骑星字面上带有行动丶实践的意味。你在爱情中通常都扮演着主导的地位，也比较希望能够掌握大权，因此难免有点强势作风。建议你要学着内敛些丶温柔些，感情上会更顺遂。",
    "lovepeople"=>"宿命恋人：一起工作的伙伴或上司",
    "lovemessage"=>"务实的你没办法一次只做一件事。因此，你特别容易在行动中发现你的爱情，然后工作与爱情齐头并进丶同时发展，对你来说或许是件轻松开心的事，但仍要小心处理喔。",
    "loveage"=>"有机会结婚的年龄：26～29岁丶31岁",
    "loveagemessage"=>"你的姻缘运大多发生在青少年时期，尤其在年少时异性缘更是非常旺，有可能出现众多追求者。过了24岁后爱情运会渐趋向平缓，你也比较能以成熟的角度看待感情，如果到了此时还没有稳定对象，那可能会单身好一阵子才有正缘到来。");

$start4=array("star"=>"司禄星",
    "message"=>"你的笑容经常挂在嘴边，很容易给人一种开朗丶明快的印象，这样的你在异性眼中是非常有魅力的！不过，你的恋爱性格中带有一点点严肃的特质，总是严以律己丶宽以待人，虽然对朋友很好，但对于自己的伴侣，则会用高标准去衡量，希望对方是个完美恋人。",
    "lovepeople"=>"宿命恋人：年长八岁以上的对象",
    "lovemessage"=>"你很容易爱上比自己年纪大上很多的对象，两人之间在相处上，也往往都是他选择先低头退让。由于他的个性较成熟稳健，思考比较周全，通常在冷静之后，你会发现其实很多时候都是你太任性了，也正因为对方的包容，让你们成为相当速配的伴侣。",
    "loveage"=>"有机会结婚的年龄：19岁丶24岁",
    "loveagemessage"=>"「认真的女人最美丽」，你为工作打拼丶忙碌的模样，正是你一大魅力来源。不过基本上你的爱情在年少轻狂的早期特别容易受挫，可能是自己的直肠子作祟，讲话无意重伤了别人的心。一直要到性格成熟之后，才能进入稳定的感情状态。");

$start5=array("star"=>"禄存星",
    "message"=>"「禄存星」代表着安定的经济生活，在爱情中的你通常看得比较远，常常会去思考恋爱之外的课题。即使与对方非常相爱，你仍然可以理智地判断许多事情。基本上在认识对方的初期，你就会深入的思考两人交往的可能性，而对方的背景丶健康丶金钱丶未来的发展等，你可能都会仔细琢磨打量清楚后，再决定下一步。",
    "lovepeople"=>"宿命恋人：经由相亲认识的对象",
    "lovemessage"=>"爱情多多少岁还是要带点冲动才行！或许在感情世界中的你太聪明丶太深思熟虑丶总是时时刻刻在心动之际又把自己拉回现实，与其说你谨慎，不如说你太放不开，最后很可能会透过家人丶朋友的介绍来认识未来的另一半。",
    "loveage"=>"有机会结婚的年龄：23岁丶28～31岁",
    "loveagemessage"=>"23岁那年有机会遇到与自己非常契合的对象，两人的价值观丶想法都很接近，只是该不该因此稳定下来则还需要一点点勇气，28岁是你的结婚高峰期，可能是受到周围朋友的影响，或是来自家中长辈的压力，会有结婚的冲动，但身边的对象是否合适，就要看你的判断了。");

$start6=array("star"=>"调舒星",
    "message"=>"「调舒星」是一颗自由自在丶不受约束的星体，你本身是个相对讲究生活品质丶重视质感的人。爱情对你来说，是生活的调剂品，除非对方在你生活里占有很重的影响性，不然个性非常自我的你，最后总是会选择独来独往，或是与好友丶死党快快乐乐地搅合在一起。",
    "lovepeople"=>"宿命恋人：家居型好男",
    "lovemessage"=>"个性洒脱的你对于那些酷酷的丶帅帅的，在某些领域特别出色的对象，总是容易无法自拔的迷恋对方，除非对方也能给你同样热情的回应，否则感情容易走上不归路。而另外家居型男孩非常适合你，如果他了解你丶懂你，在你需要的时候给你照顾与关怀，在你不需要的时候与你保持距离，久而久之你会发现对方的重要性，成为相当速配的伴侣。",
    "loveage"=>"有机会结婚的年龄：17岁丶21岁丶29岁",
    "loveagemessage"=>"你的异性缘颇强，不过都是以哥们儿居多，20岁前的感情都有些暧昧不明，可能你自己也搞不清楚那种快乐到底是爱情还是友谊。不过你的感情在23岁时会空窗一段时间，可能是因为你把重心都放在工作或进修上，这个时期反而会特别喜欢独处。");

$start7=array("star"=>"凤阁星",
    "message"=>"「凤阁」在文辞语意上代表「华丽的楼阁」，是一颗相当浪漫丶女性化的爱情星，你的个性很单纯丶执着，尤其对于感情很容易死心眼，只要遇到自己喜欢的对象，就很容易从一而终认定对方，认真而用心的经营感情。而你一旦恋爱就不太会给自己机会多认识别的对象，朋友间的社交活动也会大量锐减，建议你偶尔要多和自己的好友们联络感情才好。",
    "lovepeople"=>"宿命恋人：需当心薄情郎的温柔陷阱",
    "lovemessage"=>"温柔善良的你要小心浪子型的坏坏男，因为你对于这类型的坏坏男，因为你对于这类霸道却能懂你的对象完全没有免疫力，如果你的温柔拴不住他，那最好要早点醒悟。不妨多请朋友帮忙介绍适合你的对象，基本上善良温柔又体贴的你魅力相当强，只要对方人品丶个性不差，通常都能成为非常不错的伴侣。",
    "loveage"=>"有机会结婚的年龄：22～24岁丶33～35岁",
    "loveagemessage"=>"要特别注意你25岁前後的爱情运势，可能会出现不好的桃花恋情，对方并不是真的有心想和你交往，在投入感情前多评估一下，或是与你的好友分享你的心情，透过别人客观的建议，你也可以做出明智的抉择。你其实适合晚婚，年纪越大，越能遇到与你共度一生的伴侣。");

$start8=array("star"=>"石门星",
    "message"=>"「石门星」通常是一个很有领导天分丶能冷静思考丶凡事有条有理重视原则的人。在爱情上，女性会比男的更受欢迎。因为他们懂事丶体贴，在爱情终比较懂得体谅对方丶尊重对方，反而能赢得情人的疼爱。一般来说善解人意的石门星女孩看似柔弱，但往往都是善于掌控局势的恋爱达人。",
    "lovepeople"=>"宿命恋人：经济丶外貌皆好的男人",
    "lovemessage"=>"其实你是相当重视视觉观感的，首先你对自己的外貌就有基本要求，穿着丶服饰的品味也很高。能让你看上眼的异性，也同样要有体面出众的外表。至于相处上，你会愿意为配合对方而修正自己的习惯，但前提必须是你所钟意的对象才行，如果感觉不是那么对，即使人家用鲜花攻势丶温馨接送的苦肉计攻略，重视原则的你恐怕也很难对他滋生爱苗。",
    "loveage"=>"有机会结婚的年龄：21～25岁丶31岁",
    "loveagemessage"=>"或许一开始对于爱情就有钟莫名的憧憬，25岁前的你像是满怀浪漫的少女，很容易找到自己心仪的对象，但这种情况到了25岁之后就急转之下，你的重心开始放在工作或家人相处上，同时感情压练多了，看的界面也广了，似乎很难再有感情让你投入，31岁时有一个不错的姻缘，但要小心机会稍纵即逝。");

$start9=array("star"=>"贯索星",
    "message"=>"通常在个性上属于「贯索星」的你往往不是那么清楚丶明确的了解自己真正喜欢的对象，以致于感情很容易在迟疑中悄悄溜走。事实上你是一个非常可爱的情人，交往前容易给人内向丶闭俗的印象，但与你交往之后，你聪明又灵巧的心思，常能让对方幸福不已，你该对自己更有信心一些，对于拿捏不定的抉择，不妨就交给直觉吧！",
    "lovepeople"=>"宿命恋人：痴心丶温柔的护花使者",
    "lovemessage"=>"你的爱情中最大罩门便是对方锲而不舍的追求攻势，由于你自己在爱情中欠缺行动力，如果对方也是个一步一脚印丶凡事慢慢来的温吞个性，那么两人的爱情很容易在低温中结束。相反的，面对一开始其实不怎么中意的对象，只要对方认真丶充满诚意的经常对你提出邀约，或三不五时跟你聊聊天丶嘘寒问暖一番，久而久之就会慢慢喜欢上对方。",
    "loveage"=>"有机会结婚的年龄：17～19岁丶23岁丶25岁",
    "loveagemessage"=>"你的感情比较不适合拖太久，像八年丶十年的爱情长跑，或是远距离的恋爱等，都是不太适合你的爱情模式。由于你在爱情中缺乏安全感，对方最好能时时陪在你身边，否外在的诱惑很容易让你迷惘。随着年纪的增加，你的感情姻缘会越来越弱，因此最好在25岁前就让自己安定下来。");

$start10=array("star"=>"玉堂星",
    "message"=>"「玉堂星」本身象征冷静但变化无偿的海洋，这意味着你对于爱情有相当大的包容力，当你爱上一个人，可以不计较对方的身家背景丶也不在乎对方的外表，你是一个只觉相当强的人，只要感觉对了，就会顺势发展。不过，大海也潜藏了危险的因子，你变心的速度极快，只要发觉对方身上再也找不到你所喜欢的特点之后，你就以会快刀斩乱麻的姿态和对方说清楚讲明白。",
    "lovepeople"=>"宿命恋人：沈稳丶可靠男人",
    "lovemessage"=>"变万化的你，需要的是一个沉稳丶可靠的肩膀，尤其稳重丶有耐心丶又很懂得分析事理的对象最深得你心，因此你的对象有可能会是比你年长一些的人，或是比较早熟的异性。光是沈稳还不够，对方也必须是能给你很多新想法的人，一旦你觉得他只是个牵绊，那么爱情的裂缝将会日复一日地扩大",
    "loveage"=>"有机会结婚的年龄：16～20岁丶23岁丶29岁",
    "loveagemessage"=>"你本身就蛮早熟的，因此初恋可能发生的非常早，不过那往往都是出于你对恋爱的好奇心所致，多半以玩票性质居多。真正有缘的年龄是23丶29岁，尤其23岁左右遇到的对象将有可能与你步入红毯，30岁后对于爱情比较无所谓，同事丶死党丶同性朋友反而能让你更开心。");

$C=array(0=>$start1,1=>$start2,2=>$start3,3=>$start4,4=>$start5,5=>$start6,6=>$start7,7=>$start8,8=>$start9,9=>$start10);

$birthday=$_POST['birthday'];
//$birthday="1992-06-11";
$y[]=array();
$y=explode('-',$birthday);
$year = substr($y[0],2,2);

$r1=$A[intval($year)][intval($y[1])-1];
//echo $r1."<br>";
$r2=(intval($y[2])+$r1)%10;
//echo $B[$r2];

//var_dump($C[$r2]);
echo json_encode($C[$r2]);
//$json='{"name":"yovae","password":"12345"}';    //虽然这行数据形式上是json格式，如果没有上面那句的话，它是不会被当做json格式的数据被处理的；