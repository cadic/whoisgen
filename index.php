<?
header('Content-type: text/html; charset=windows-1251');
include('whois-gen.php');
$whois = generate_whois();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>«Открытый источник»: генератор whois для массовой регистрации доменов</title>
<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style1 {font-size: 16px}
.style2 {color: #999999}
-->
</style></head>

<body>
 <table width="900" border="0" align="center" cellpadding="10" cellspacing="10">
   <tr align="center">
     <td colspan="2"><h1 class="style1">Открытый источник</h1>
     Генератор whois для массовой регистрации доменов</td>
   </tr>
   <tr valign="top">
     <td><!-- google_ad_section_start(weight=ignore) --><noindex><p><span class="style2">Администратор домена</span><br>
         <strong><?=$whois['eng_name'];?></strong></p>
       <p><span class="style2">Администратор домена (рус)</span> <br>
         <strong><?=$whois['rus_name'];?></strong></p>
       <p><span class="style2">Паспортные данные</span><br>
         <strong><?=$whois['passport'];?></strong></p>
       <p><span class="style2">Адрес  проживания</span><br>
         <strong><?=$whois['reg_address'];?></strong></p>
       <p><span class="style2">Дата рождения</span><br>
         <strong><?=$whois['birthdate'];?></strong> </p>
       <p><span class="style2">Почтовый адрес</span><br>
         <strong><?=$whois['post_address'];?></strong></p>
       <p><span class="style2">Телефон</span><br>
         <strong><?=$whois['phone'];?></strong></p></noindex><!-- google_ad_section_end -->
     </td>
     <td width="250">
<!--       <p><b style="color: white; background: #900; padding: 3px 10px;">Нужны домены?</b></p>
         <p>Регистрируешь много доменов для своих проектов? Предлагаю регистрацию по очень вкусной цене - <b>всего 100 рублей</b> за домен .ru</p>
         <p>За подробностями - в аську: 120858606</p>-->
     </td>
   </tr>
   <tr valign="top">
       <td>
           <h1 class="style1">Создать почтовый API-файл для массовой регистрации доменов</h1>
           <form method="post" action="gen.php">
<script type="text/javascript">
    //<![CDATA[
    function showDoms(){
      $("#domlink").hide();
      $("#numlink").show();
      $("#domdiv").show();
      $("#numdiv").hide();
      $("#num").val('');
      $("#min").val('');
      $("#max").val('');
    }
    function showNum(){
      $("#domlink").show();
      $("#numlink").hide();
      $("#domdiv").hide();
      $("#numdiv").show();
      $("#domains").val('');
    }
    window.onload = function(){
      showDoms();
    }
    //]]>
</script>               
               <a id="domlink" href="#" onclick="showDoms();return false;">Указать список доменов</a> <a id="numlink" href="#" onclick="showNum();return false;">Придумать и проверить на занятость</a>
               <br /><br />
               <div id="domdiv">
                  <label for="domains">Домены</label><br />
                  <textarea id="domains" name="domains" rows="10" cols="50"></textarea>
                  <br /><br /><br />
               </div>

               <div id="numdiv">
                   <label for="num"><b>Придумать названия доменов</b></label><br /><br />
                   Количество:&nbsp;<input type="text" id="num" name="num" value="" size="3" /><br />
                   <small>Максимум 100. Если нужно больше - подождите пару минут и сделайте ещё один запрос.<br />
                   Если просите в районе 100 - будьте готовы получить чуть меньше чем просили.
                   </small>
                   <br /><br />
                   <label for="min">Длина доменов</label><br />
                   От:&nbsp;<input type="text" id="min" name="min" value="" size="3" />
                   До:&nbsp;<input type="text" id="max" name="max" value="" size="3" />
                   <br />
                   <small>Используются двухбуквенные сочетания гласных (oo, ea, ...)<br />
                   При подсчере длины домена они считаются за один символ</small>
                   <br /><br />
               </div>
               
               <label for="ns1">ns1</label><input type="text" name="ns1" id="ns1" value="" /><br />
               <label for="ns2">ns2</label><input type="text" name="ns2" id="ns2" value="" /><br />
               <label for="ns3">ns3</label><input type="text" name="ns3" id="ns3" value="" /><br />
               <label for="ns4">ns4</label><input type="text" name="ns4" id="ns4" value="" /><br />
               <input type="submit" name="test" value="Сгенерировать" />
           </form>
       </td>
       <td>
           <p><b style="color: white; background: #900; padding: 3px 10px;">Зачем это?</b></p>
           <p>На выходе у этой формы Вы получите стандартный API-запрос на регистрацию доменов в кодировке KOI-8, который можно использовать как Вам захочется.<br /><br />Я обычно таким образом регистрирую несколько десятков доменов одним движением.</p>
       </td>
   </tr>
   <tr>
     <td colspan="2"><index><p>Этот генератор пригоден для создания множества уникальных данных whois для регистрации доменов .ru. Форматы полей полностью соответствуют требованиям большинства регистраторов.</p>
       <p>Основные особенности:</p>
       <ul>
         <li>создание уникального имени администратора домена на основе списков из 76 популярный фамилий и 59 мужских имен;</li>
         <li>реалистичные адреса в Москве с правильными почтовыми индексами;</li>
         <li>в 50% случаев генератор создает различные адреса для прописки и почтовый.</li>
     </ul>
	 <p>Если вам нужно автоматизировать получение больших списков whois - не нужно дергать эту страницу парсерами. Воспользуйтесь <a href="whoisgen.xml.php?n=10">экспортом в XML</a>, с помощью параметра n можно указать необходимое число профилей (максимум 50). Если у вас возникли вопросы или предложения - пишите мне на <a href="mailto:me@cadic.name">me@cadic.name</a> или <nobr>в icq 120-858/606</nobr>.</p></index></td>
   </tr>
 </table>
 <center><!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='http://counter.yadro.ru/hit?t26.11;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число посетителей за"+
" сегодня' "+
"border=0 width=88 height=15><\/a>")//--></script><!--/LiveInternet--></center>
</body>
</html>