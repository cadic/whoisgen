<?
header('Content-type: text/html; charset=windows-1251');
include('whois-gen.php');
$whois = generate_whois();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>��������� ��������: ��������� whois ��� �������� ����������� �������</title>
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
     <td colspan="2"><h1 class="style1">�������� ��������</h1>
     ��������� whois ��� �������� ����������� �������</td>
   </tr>
   <tr valign="top">
     <td><!-- google_ad_section_start(weight=ignore) --><noindex><p><span class="style2">������������� ������</span><br>
         <strong><?=$whois['eng_name'];?></strong></p>
       <p><span class="style2">������������� ������ (���)</span> <br>
         <strong><?=$whois['rus_name'];?></strong></p>
       <p><span class="style2">���������� ������</span><br>
         <strong><?=$whois['passport'];?></strong></p>
       <p><span class="style2">�����  ����������</span><br>
         <strong><?=$whois['reg_address'];?></strong></p>
       <p><span class="style2">���� ��������</span><br>
         <strong><?=$whois['birthdate'];?></strong> </p>
       <p><span class="style2">�������� �����</span><br>
         <strong><?=$whois['post_address'];?></strong></p>
       <p><span class="style2">�������</span><br>
         <strong><?=$whois['phone'];?></strong></p></noindex><!-- google_ad_section_end -->
     </td>
     <td width="250">
<!--       <p><b style="color: white; background: #900; padding: 3px 10px;">����� ������?</b></p>
         <p>������������� ����� ������� ��� ����� ��������? ��������� ����������� �� ����� ������� ���� - <b>����� 100 ������</b> �� ����� .ru</p>
         <p>�� ������������� - � �����: 120858606</p>-->
     </td>
   </tr>
   <tr valign="top">
       <td>
           <h1 class="style1">������� �������� API-���� ��� �������� ����������� �������</h1>
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
               <a id="domlink" href="#" onclick="showDoms();return false;">������� ������ �������</a> <a id="numlink" href="#" onclick="showNum();return false;">��������� � ��������� �� ���������</a>
               <br /><br />
               <div id="domdiv">
                  <label for="domains">������</label><br />
                  <textarea id="domains" name="domains" rows="10" cols="50"></textarea>
                  <br /><br /><br />
               </div>

               <div id="numdiv">
                   <label for="num"><b>��������� �������� �������</b></label><br /><br />
                   ����������:&nbsp;<input type="text" id="num" name="num" value="" size="3" /><br />
                   <small>�������� 100. ���� ����� ������ - ��������� ���� ����� � �������� ��� ���� ������.<br />
                   ���� ������� � ������ 100 - ������ ������ �������� ���� ������ ��� �������.
                   </small>
                   <br /><br />
                   <label for="min">����� �������</label><br />
                   ��:&nbsp;<input type="text" id="min" name="min" value="" size="3" />
                   ��:&nbsp;<input type="text" id="max" name="max" value="" size="3" />
                   <br />
                   <small>������������ ������������� ��������� ������� (oo, ea, ...)<br />
                   ��� �������� ����� ������ ��� ��������� �� ���� ������</small>
                   <br /><br />
               </div>
               
               <label for="ns1">ns1</label><input type="text" name="ns1" id="ns1" value="" /><br />
               <label for="ns2">ns2</label><input type="text" name="ns2" id="ns2" value="" /><br />
               <label for="ns3">ns3</label><input type="text" name="ns3" id="ns3" value="" /><br />
               <label for="ns4">ns4</label><input type="text" name="ns4" id="ns4" value="" /><br />
               <input type="submit" name="test" value="�������������" />
           </form>
       </td>
       <td>
           <p><b style="color: white; background: #900; padding: 3px 10px;">����� ���?</b></p>
           <p>�� ������ � ���� ����� �� �������� ����������� API-������ �� ����������� ������� � ��������� KOI-8, ������� ����� ������������ ��� ��� ���������.<br /><br />� ������ ����� ������� ����������� ��������� �������� ������� ����� ���������.</p>
       </td>
   </tr>
   <tr>
     <td colspan="2"><index><p>���� ��������� �������� ��� �������� ��������� ���������� ������ whois ��� ����������� ������� .ru. ������� ����� ��������� ������������� ����������� ����������� �������������.</p>
       <p>�������� �����������:</p>
       <ul>
         <li>�������� ����������� ����� �������������� ������ �� ������ ������� �� 76 ���������� ������� � 59 ������� ����;</li>
         <li>������������ ������ � ������ � ����������� ��������� ���������;</li>
         <li>� 50% ������� ��������� ������� ��������� ������ ��� �������� � ��������.</li>
     </ul>
	 <p>���� ��� ����� ���������������� ��������� ������� ������� whois - �� ����� ������� ��� �������� ���������. �������������� <a href="whoisgen.xml.php?n=10">��������� � XML</a>, � ������� ��������� n ����� ������� ����������� ����� �������� (�������� 50). ���� � ��� �������� ������� ��� ����������� - ������ ��� �� <a href="mailto:me@cadic.name">me@cadic.name</a> ��� <nobr>� icq 120-858/606</nobr>.</p></index></td>
   </tr>
 </table>
 <center><!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='http://counter.yadro.ru/hit?t26.11;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: �������� ����� ����������� ��"+
" �������' "+
"border=0 width=88 height=15><\/a>")//--></script><!--/LiveInternet--></center>
</body>
</html>