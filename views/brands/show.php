<?php
// available vars:
// $id - id as passed in through the URL
// $show - show retrieved from the db if it exists
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>

    <body bgcolor="#ffffff">
	  <p><a href="/Test/session/destroy">Log out</a><p>
        <table align="center" width="80%" border="0" bgcolor="#ffffff">
            <tr><td width="1%" align="center" valign="top" class="logo">
                    <br/><br/>DiGiCell Presents<br/><img src="digimall-logo.gif" /></td>
                <td  valign="top">

                    <table width="99%" border="0">
                        <tr>
                            <td width="100%" align="right" valign="top" class="menulink"> hardware&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;software&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	  specials&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	notebooks</td>
                        </tr><tr><td>&nbsp;</td></tr>
                        <tr>
                            <td valign="top" Align ="center"> 

                                <table border="0" width="100%">
                                       <tr><td colspan =" 2" align="center">

                                       <table border="0" width="100%"><tr><td width="90%" class="menulink" align="center">
												 <?php if (isset($template->brands)): ?><br />
                                                This is the show page for the brand "<?php echo $template->brands->brand_name;
												?>" and the id "<?php echo $template->brands->brand_id; ?>"
                                            </td></tr></table>
                                    <table border="0" width="100%" cellpadding="3" >
                                           <tr><td >
                                                <table border="0" align="center" bgcolor="#99ccff">
													<tr><td> 
                                                        <ul>
															<li>Name: <?php echo $template->brands->brand_name; ?></li>
															<li>Distributor: <?php echo $template->brands->dist_name; ?></li>
														</ul>
														<?php else: ?>
														<h2>The brand with id "<?php echo $template->id; ?>" does not exist</h2>
														<?php endif; ?>
													</td></tr>
                                                </table>
                                            </td></tr>
									</table>
                            </td>
                        </tr>
                    </table>
                </td><td valign="top" width="18%"><br/><br/>
                    <table bgcolor="ffffff" border =0 cellpadding="3">
                        <tr><td class="menulink" align="right">
                                Search</td></tr>
                        <tr>
                            <td align="center" bgcolor="#99ccff" class="inbox">
                                <input type="text" name="search" />
                                <input type="submit" value="Search"/> 
                            </td>
                        </tr><tr><td>&nbsp;</td></tr>
                        <tr><td class="menulink" align="right">Login</td></tr>
                        <tr><td align="center" bgcolor="#99ccff">

                                <table><tr><td class="inbox">
                                            Username<br/>
                                            <input type="text" name="username"  /><br/>
                                            Password<br/>
                                            <input type="text" name="password" /><br/>
                                            <p align="center"><input type="submit" value="Login"/></p> 
                                        </td></tr></table>
                            </td></tr><tr><td>&nbsp;</td></tr>
                        <tr><td class="menulink" align="right">Products</td></tr>
                        <tr><td bgcolor="#99ccff" class="inbox">
                                Power Supply<br/>
                                Motherboard<br/>
                                Processor  <br/>
                                Harddisk<br/>
                                DVD ROM<br/>
                                CD ROM<br/>
                                Casing<br/>
                                Keyboard<br/>
                                Mouse<br/>
                                Speakers<br/>
                                Graphic Card<br/>
                                Sound<br/>
                                Monitor<br/>


                            </td></tr>
                    </table>

            <tr><td colspan =3>
                    <table  align="center" width="90%" border ="0" cellpadding="3">
                        <tr><td class="menulink" align="right">My Account</td>
                            <td class="menulink" align="right">Customer Service</td>
                            <td class="menulink" align="right">About Us</td></tr>
                        <tr><td width="33%" valign="top" bgcolor="#99ccff" class="inbox">

                                -Register <br />
                                -Login<br />
                                -My account<br />
                                -Order status<br />
                                -Track my order<br />
                            </td>
                            <td width="33%" valign="top" bgcolor="#99ccff" class="inbox">

                                - Contact us<br />
                                - FAQ<Br />
                                - Return Policy infomation<br />
                                - feedback<br /></td>
                            <td width="34%" valign="top" bgcolor="#99ccff" class="inbox">

                                Policy & Agreement<Br />
                                Privacy<Br />
                                Payment options<Br /></td>
                        </tr>
                    </table>
                </td></tr><tr ><td colspan=3 align="center" class="footer">
                    DiGiCell © 2011 All Rights Reserved. 	
                </td>
            </tr>
        </table>
    </body>
</html>