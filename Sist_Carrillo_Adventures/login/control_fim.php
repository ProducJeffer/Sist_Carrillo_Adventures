<?php
   include_once('control_session.php');
   if (!function_exists("NM_is_utf8"))
   {
       include_once("control_nmutf8.php");
   }
   session_start();

//----- 
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            $$nmgp_var = $nmgp_val;
       }
   }
   if (isset($_SESSION['session_sec_aplicacao']["Sist_Carrillo_Adventures_____control"]))
   {
      unset($_SESSION['session_sec_aplicacao']["Sist_Carrillo_Adventures_____control"]);
   }

   if (isset($_SESSION['session_sec_aplicacao']) && empty($_SESSION['session_sec_aplicacao']))
   {
      unset($_SESSION['session_sec_aplicacao']);
      unset($_SESSION['session_sec_usuario']);
   }
   if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['control']))
   {
      unset($_SESSION['sc_session'][$script_case_init]['control']['sc_redir_atualiz']);
      unset($_SESSION['sc_session'][$script_case_init]['control']['sc_redir_insert']);
   }
   $fecha_janela = false;
   if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['control']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['control']['sc_outra_jan'])
   {
       $fecha_janela = true;
   }
   if ((isset($nmgp_parms) && $nmgp_parms == "glo_menu") || $fecha_janela)
   {
       if (isset($script_case_init) && !is_array($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['control']['sc_modal']) && $_SESSION['sc_session'][$script_case_init]['control']['sc_modal'])
       {
           unset($_SESSION['sc_session'][$script_case_init]['control']['sc_modal']);
           if (!isset($_SESSION['sc_session'][$script_case_init]['control']['db_changed']) || $_SESSION['sc_session'][$script_case_init]['control']['db_changed'])
           {
               $saida_final = "if (typeof parent.nm_gp_move == 'function') {parent.nm_gp_move('edit');} self.parent.tb_remove()";
           }
           else
           {
               $saida_final = "self.parent.tb_remove()";
           }
       }
       else
       {
           if (!isset($script_case_init) || is_array($script_case_init) || !isset($_SESSION['sc_session'][$script_case_init]['control']['db_changed']) || $_SESSION['sc_session'][$script_case_init]['control']['db_changed'])
           {
              $saida_final = "if (opener && opener['nm_gp_move']) {opener.nm_gp_move('igual');} window.close()";
           }
           else
           {
              $saida_final = "window.close()";
           }
       }
      nm_limpa_arr_session();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<HTML>
<HEAD>
 <TITLE>control</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && isset($_SESSION['scriptcase']['display_mobile']) && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}

?>
</HEAD>
<BODY>
<SCRIPT LANGUAGE="Javascript">
 <?php echo $saida_final; ?>;
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   elseif (!isset($script_case_init) || is_array($script_case_init) || !isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init]) || empty($_SESSION['scriptcase']['sc_url_saida'][$script_case_init]))
   {
           nm_limpa_arr_session();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<HTML>
<HEAD>
 <TITLE>control</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}

?>
</HEAD>
<BODY>
<SCRIPT LANGUAGE="Javascript">
  history.back();
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   else
   {
       nm_limpa_arr_session();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<HTML>
<HEAD>
 <TITLE>control</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}

?>
</HEAD>
<BODY>
<form name="fsai" method="post" action="<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>">
<input type=hidden name="script_case_init" value="<?php  echo NM_encode_input($script_case_init); ?>"> 
<input type=hidden name="script_case_session" value="<?php  echo NM_encode_input(session_id()); ?>"> 
</form>
<SCRIPT LANGUAGE="Javascript">
   nm_ver_saida = "<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>";
   nm_ver_saida = nm_ver_saida.toLowerCase();
   if (nm_ver_saida.substr(0, 4) != ".php" && (nm_ver_saida.substr(0, 7) == "http://" || nm_ver_saida.substr(0, 8) == "https://" || nm_ver_saida.substr(0, 3) == "../")) 
   { 
       window.location = ("<?php echo $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]; ?>"); 
   } 
   else 
   { 
       document.fsai.submit();
   } 
</SCRIPT>
</BODY>
</HTML>
<?php
   }
   function nm_limpa_arr_session()
   {
      global $script_case_init;
      $achou = false;
      if (!isset($script_case_init) || is_array($script_case_init) || !isset($_SESSION['sc_session'][$script_case_init]))
      {
          return;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control']['embutida_filho']))
      {
          foreach ($_SESSION['sc_session'][$script_case_init]['control']['embutida_filho'] as $ind => $sc_init)
          {
              unset($_SESSION['sc_session'][$sc_init]);
          }
      }
      foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
      {
          if ($nome_apl == 'control' || $achou)
          {
              unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
              $achou = true;
          }
      }
      if (empty($_SESSION['sc_session'][$script_case_init]))
      {
          unset($_SESSION['sc_session'][$script_case_init]);
      }
   }
?>
