<?php 
    //$tagBeepRegisterUrl = "http://localhost/tagbeep/api_wordpress/register";  //dev path, please ignore

    $tagBeepRegisterUrl = "http://tagbeep.com/a/api_wordpress/register"; //live path
    
    $info4TagBeep = array (
        "blogTitle" => get_bloginfo('name'),
        "blogUrl" => get_bloginfo('home'),
        "blogAdminEmail" => get_bloginfo('admin_email'),
        "blogGmtOffset" => get_option('gmt_offset') /* not used yet */
    );
    
    //the iframe from the tagbeep admin panel path
    $iframeUrl = $tagBeepRegisterUrl . '/' . urlencode($info4TagBeep['blogAdminEmail']) . '/' . rawurlencode(base64_encode($info4TagBeep['blogUrl'])) . '/' . urlencode($info4TagBeep['blogTitle']);
?>

<div class="wrap" style="max-width: 700px"> 

    <div id="icon-plugins" class="icon32" ><br></div>
    
    <h2>tagBeep uptime monitoring plugin</h2>

    <p>
        
        <a href="http://tagbeep.com" style="font-weight:bold;">tagBeep</a> is a free uptime monitoring service. 
        I hope you like this plugin and if you have any suggestions or questions feel free to ask me directly at: contact@tagbeep.com. 
        <br><br> Thanks for using this plugin!
        
    </p>
    
    <h3 class="title">tagBeep options:</h3>
   
    <iframe border="0" frameborder="0" marginheight="0" marginwidth="0" width="700" height="350" scrolling="no" allowtransparency="true" src="<?php echo $iframeUrl ?>"></iframe>

</div>
