<?php
header("Content-Type: application/javascript; charset=UTF-8", true);

define("ROOTDIR", "../../");
define("REAL_ROOTDIR", "../../");

define("NO_SESSION", true);

require_once REAL_ROOTDIR."src/initializer.php";

use \WeTheFuture\Controller;
?>

console.log("%c                            .',;;,'.                            ", "font-family: monospace;");
console.log("%c                    .,ldO00OOkxxxxkOO00Odl,.                    ", "font-family: monospace;");
console.log("%c                .ckKOo;.                .;oOKkc.                ", "font-family: monospace;");
console.log("%c             'dKOc.                          .cOKd'             ", "font-family: monospace;");
console.log("%c          .lKO;                                  ;OKl.          ", "font-family: monospace;");
console.log("%c        .oNd.                                      .dNo.        ", "font-family: monospace;");
console.log("%c       cNd.                                          .dNc       ", "font-family: monospace;");
console.log("%c     .0K.                    ..''''''''''''''''''''''''lW0.     ", "font-family: monospace;");
console.log("%c    ,Nx                ,d0NMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMN,    ", "font-family: monospace;");
console.log("%c   ,Wo              .xWMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMW,   ", "font-family: monospace;");
console.log("%c  .Wd             ,OMMMMKxl:,'.............................dW.  ", "font-family: monospace;");
console.log("%c  K0           'dNMMM0:.   ,lk0000kl,                       0K  ", "font-family: monospace;");
console.log("%c cM.      .,lOWMMMMk.   .xWMMMMMMMMMMWx.                    .Mc ", "font-family: monospace;");
console.log("%c KNcldxOXWMMMMMMXl.    lMMMMMMMMMMMMMMMMl                    0K ", "font-family: monospace;");
console.log("%c.MMMMMMMMMMMNkc.      cMMMMMMMMMMMMMMMMMMc                   lM.", "font-family: monospace;");
<?php
$l = strlen(Controller::getVersion())+2;
$left = (int)(9-ceil($l/2));
$right = (int)(9-floor($l/2));
?>
console.log("%c,MMWNK0ko:'           X<?= str_repeat("M",$left)." ".Controller::getVersion()." ".str_repeat("M",$right) ?>X                   ;M,", "font-family: monospace;");
console.log("%c,M;                   KMMMM c<?= Controller::getCommit() ?> MMMMK          .,cdk0XNMMM,", "font-family: monospace;");
console.log("%c.Ml                   :MMMMMMMMMMMMMMMMMM:      .ckNMMMMMMMMMMM.", "font-family: monospace;");
console.log("%c K0                    cMMMMMMMMMMMMMMMMc    .oXMMMMMMWKOxol:NK ", "font-family: monospace;");
console.log("%c cM'                    .xWMMMMMMMMMMWx.   'OMMMMWOl,.      'Mc ", "font-family: monospace;");
console.log("%c  KK                       'lxO00Oxl'   .cKMMMXo.           KK  ", "font-family: monospace;");
console.log("%c  .Wx............................',;:okXMMMMk'             dW.  ", "font-family: monospace;");
console.log("%c   ,WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMNd.              oW,   ", "font-family: monospace;");
console.log("%c    'NMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMNOo'                kN'    ", "font-family: monospace;");
console.log("%c     .OWl..........................                    'XO.     ", "font-family: monospace;");
console.log("%c       :Nx.                                          .xN:       ", "font-family: monospace;");
console.log("%c        .oNx.                                      .xNo.        ", "font-family: monospace;");
console.log("%c          .cK0:                                  :0Kc.          ", "font-family: monospace;");
console.log("%c             'oK0c.                          .c0Ko'             ", "font-family: monospace;");
console.log("%c                .cxKOd:'.              .':dOKxc.                ", "font-family: monospace;");
console.log("%c                    .,cdO000OkxxxxkO000Odc,.                    ", "font-family: monospace;");
console.log("%c                            ..';;'..                            ", "font-family: monospace;");

window.log("console_message", "main - Message displayed");
