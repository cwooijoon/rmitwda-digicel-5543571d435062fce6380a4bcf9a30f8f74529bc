<?php
//Add distributor
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Add Distributor</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>

    <body bgcolor="#ffffff">
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
                                                Add Distributor
                                            </td></tr></table>
                                    <table border="0" width="100%" cellpadding="3" >
                                           <tr><td >
                                                <table border="0" align="center" bgcolor="#99ccff">
													<tr><td> 
                                                    	<form method="POST" action="create">
														<tr>
															<td>Distributor Name:</td>
															<td>
																<input type="text" name="dist_name" value="<?php echo $template->distributor['dist_name']; ?>" />
															</td>
															<td>
																<?php
																if(isset($template->errors['dist_name']))
																{
																	echo $template->errors['dist_name'];
																}
																?>
															</td>
														</tr>
														<tr>
															<td>Contact Number:</td>
															<td>
																<input type="text" name="contact_number" value="<?php echo $template->distributor['contact_number']; ?>" />
															</td>
															<td>
																<?php
																if(isset($template->errors['contact_number']))
																{
																	echo $template->errors['contact_number'];
																}
																?>
															</td>
														</tr>
														<tr>
															<td>Email:</td>
															<td>
																<input type="text" name="email" value="<?php echo $template->distributor['email']; ?>" />
															</td>
															<td>
																<?php
																if(isset($template->errors['email']))
																{
																	echo $tempalte->errors['email'];
																}
																?>
															</td>
														</tr>
														<tr>
															<td>
																<input type="submit" name="create_dist" value="Create" />
															</td>
															<td></td>
															<td></td>
														</tr>
														</form>

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
