<?php $this->load->view('emails/email_head'); ?>
<div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
    <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;" emb-background-style>
        <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
        <div class="column" style='text-align: left;color: #8f8f8f;font-size: 16px;line-height: 24px;font-family: "Open Sans",sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);'>
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 12px;">
                <h1 style="Margin-top: 0;Margin-bottom: 20px;font-style: normal;font-weight: normal;color: #404040;font-size: 28px;line-height: 36px;text-align: center;"></h1>
            </div>
            <div style="Margin-left: 20px;Margin-right: 20px;">
                <div style="line-height:10px;font-size:1px">&nbsp;</div>
            </div>
            <div style="Margin-left: 20px;Margin-right: 20px;text-align:justify;">
                <h2 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #706f70;font-size: 18px;line-height: 26px;font-family: Cabin,Avenir,sans-serif;">Hello, Welcome to NIK's Shopping!</h2><p style="Margin-top: 16px;Margin-bottom: 0;"></p>
                <p style="Margin-bottom: 20px;"><?php echo $order->first_name . " " . $order->last_name; ?> Order is <?php echo $order->status; ?> </p><br>
                <p style="Margin-bottom: 7px;">Order Details Are:</p>
                <table>
                    <tr>
                        <td>Order ID : </td>
                        <td><?php echo $order->track_id; ?></td>
                    </tr>
                    <tr>
                        
                        <td>Name : </td>
                        <td><?php echo $order->first_name . " " . $order->last_name; ?></td>
                    </tr>
                    <tr>
                        <td>Phone No : </td>
                        <td><?php echo $order->phone; ?></td>
                    </tr>
                    
<!--                    <tr>
                        <td>Address : </td>
                        <td><?php // echo $order->address; ?></td>
                    </tr>-->
                    <tr>
                        <td>Order Status : </td>
                        <td><?php echo $order->status; ?></td>
                    </tr>
                </table>
            </div>
            <div style="Margin-left: 20px;Margin-right: 20px;">
                <div style="line-height:10px;font-size:1px">&nbsp;</div>
            </div>
            <div style="Margin-left: 20px;Margin-right: 20px;">
                <div class="btn btn--flat btn--large" style="Margin-bottom: 10px;text-align: center;">
                    <![if !mso]><a style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #e45d6b;font-family: 'Open Sans', sans-serif;" href="<?= site_url() ?>">Click Here!</a><![endif]>
                    <!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://test.com" style="width:123px" arcsize="9%" fillcolor="#E45D6B" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,11px,0px,11px"><center style="font-size:14px;line-height:24px;color:#FFFFFF;font-family:sans-serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">Click Here!</center></v:textbox></v:roundrect><![endif]--></div>
            </div>
        </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    </div>
</div>
<?php $this->load->view('emails/email_footer'); ?>