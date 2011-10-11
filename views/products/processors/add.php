<?php
//Add brand
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Add Processor</title>
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
                                                Add Processor
                                            </td></tr></table>
                                    <table border="0" width="100%" cellpadding="3" >
                                           <tr><td >
                                                <table border="0" align="center" bgcolor="#99ccff">
													<tr><td> 
                                                    <form method="POST" action="create">
													<tr>
														<td>Category:</td>
														<td>
															<input type="text" name="category_name" value="<?php echo $template->categories['category_name']; ?>" readonly="readonly" />
															<input type="hidden" name="category_id" value="<?php echo $template->categories['category_id']; ?>" />
														</td>
													</tr>
													<tr>
														<td>Brand:</td>
														<td>
															<?php if(count($template->brands) > 1 ): ?>
															<select name="brand_id">
																<?php foreach($template->brands as $brand): ?>
																<option value="<?php echo $brand->brand_id; ?>"><?php echo $brand->brand_name; ?></option>
																<?php endforeach; ?>
															</select>
															<?php else: ?>
															<select name="brand_id">
																<option value="<?php echo $template->brands->brand_id; ?>"><?php echo $template->brands->brand_name; ?></option>
															</select>
															<?php endif; ?>
														</td>
														<td>
															<a href="brands/new">Click here</a> to add a new brand.
														</td>
													</tr>
													<tr>
														<td>Processor Name:</td>
														<td>
															<input type="text" name="proc_name" value="<?php echo $template->processors['proc_name']; ?>" />
														</td>
														<td>
															<?php
															if (isset($template->errors['proc_name'])) {
															echo $template->errors['proc_name'];
															}
															?>
														</td>
													</tr>
													<tr>
														<td>Processor Model:</td>
														<td>
															<input type="text" name="proc_model" value="<?php echo $template->processors['proc_model']; ?>" />
														</td>
														<td>
															<?php
															if (isset($template->errors['proc_model'])) {
															echo $template->errors['proc_model'];
															}
															?>
														</td>
													</tr>
													<tr>
														<td>Processor Speed:</td>
														<td>
															<input type="text" name="proc_speed" value="<?php echo $template->processors['proc_speed']; ?>" />
														</td>
														<td>
															<?php
															if (isset($template->errors['proc_speed'])) {
															echo $template->errors['proc_speed'];
															}
															?>
														</td>
													</tr>
													<tr>
														<td>Stock Available:</td>
														<td>
															<input type="text" name="stock" value="<?php echo $template->processors['stock']; ?>" />
														</td>
														<td>
															<?php
															if (isset($template->errors['stock'])) {
															echo $template->errors['stock'];
															}
															?>
														</td>
													</tr>
													<tr>
														<td>Price:</td>
														<td>
															<input type="text" name="price" value="<?php echo $template->processors['price']; ?>" />
														</td>
														<td>
															<?php
															if (isset($template->errors['price'])) {
															echo $template->errors['price'];
															}
															?>
														</td>
													</tr>
													<tr>
														<td>Warranty:</td>
														<td>
															<input type="text" name="warranty" value="<?php echo $template->processors['warranty']; ?>" />
														</td>
														<td>
															<?php
															if (isset($template->errors['warranty'])) {
															echo $template->errors['warranty'];
															}
															?>
														</td>
													</tr>
													<tr>
														<td>Notes or Comments:</td>
														<td>
															<input type="text" name="comments" value="<?php echo $template->processors['comments']; ?>" />
														</td>
														<td>
															<?php
															if (isset($template->errors['comments'])) {
															echo $template->errors['comments'];
															}
															?>
														</td>
													</tr>
													<tr>
														<td>
															<input type="submit" name="create_processor" value="Create" />
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

