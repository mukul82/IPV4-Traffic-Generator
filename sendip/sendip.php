<?php

$sip=$_POST['src_of_ipv4'];
$dip=$_POST['des_of_ipv4'];
$pro=$_POST['protocol'];
if($pro=="udp")
{
$proto="udp";
}
else if($pro=="tcp")
{
$proto="tcp";
}
else if($pro=="icmp")
{
$proto="icmp";
}


$s_p=$_POST['src_port'];
if ($s_p=="443")
{
$sorce_p="443";
}
else if($s_p=="21")
{
$sorce_p="21";
}
else if($s_p=="80")
{
$sorce_p="80";
}
else if($s_p=="22")
{
$sorce_p="22";
}
else if($s_p=="53")
{
$sorce_p="53";
}
else if($s_p=="25")
{
$sorce_p="25";
}

$d_p=$_POST['des_port'];
if($d_p=="443")
{
$des_p="443";
}
else if($d_p=="21")
{
$des_p="21";
}
else if($d_p=="80")
{
$des_p="80";
}
else if($d_p=="22")
{
$des_p="22";
}
else if($d_p=="53")
{
$des_p="53";
}
else if($d_p=="25")
{
$des_p="25";
}


$no_f_pack=$_POST['no_of_pack'];
if($no_f_pack=="yes")
{
$np="yes";
}
else if($no_f_pack=="no")
{
$np="no";
}


$payl=$_POST['plen'];
if($payl=="512")
{
$pl="512";
}
else if($payl=="8")
{
$pl="8";
}


$igap=$_POST['gap'];


$radbut=$_POST['dfnbyown'];
if($radbut=="define")
{
$sel="define";
}
else if($radbut=="rndm")
{
$sel="rndm";
}
$mypack = $_POST['myText'];

$mes = $_POST['message'];

$num = intval($mypack, 10);
$number = 1000;
$igap1 = intval($igap, 10);
//Main code
if($np=="yes")
   {
     while($number>0)
        {
          if($sel == "define")
           {
              if($proto=="udp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -ul $pl -us $sorce_p -ud $des_p -d \"$mes\" -v $dip");
               }
              else if($proto=="tcp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -tomss $pl -ts $sorce_p -td $des_p -d \"$mes\" -v $dip");
                  
               }
              else if($proto=="icmp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -il $pl -d \"$mes\" -v $dip");
                  
               }
            }
          else if($sel == "rndm")
            {
              if($proto=="udp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -ul $pl -us $sorce_p -ud $des_p -v $dip");
                 
               }
              else if($proto=="tcp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -tomss $pl -ts $sorce_p -td $des_p -v $dip");
                
               }
              else if($proto=="icmp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -il $pl -v $dip");
                 
               }
            }
        sleep($igap1);
      }
  echo $proto."   ". "Packet send Successfully";
    }
else if($np=="no")
   {
     while($num--)
        {
          if($sel == "define")
           {
              if($proto=="udp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -ul $pl -us $sorce_p -ud $des_p -d \"$mes\" -v $dip");
                 
               }
              else if($proto=="tcp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -tomss $pl -ts $sorce_p -td $des_p -d \"$mes\" -v $dip");
                
               }
              else if($proto=="icmp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -il $pl -d \"$mes\" -v $dip");
                 
               }
            }
          else if($sel == "rndm")
             {
              if($proto=="udp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -ul $pl -us $sorce_p -ud $des_p  -v $dip");
                
               }
              else if($proto=="tcp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -tomss $pl -ts $sorce_p -td $des_p -v $dip");
                
               }
              else if($proto=="icmp")
               {
                 shell_exec("sendip -p ipv4 -is $sip -p $proto -il $pl -v $dip");
                
               }
            }
        sleep($igap1);
         
        }
       echo $mypack."    ".$proto."   " . "Packet send Successfully";
    }

?> 
