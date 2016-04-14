<?php
  if(empty($_POST))
    exit;

  $firstname = strip_tags($_POST["firstname"]);
  $host = strip_tags($_POST["host"]);
  $time = strip_tags($_POST["time"]);
  $link = strip_tags($_POST["link"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
  </head>
  <body style="min-width: 100%;margin: 0;padding: 0;color: #212121;font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, Verdana, &quot;Trebuchet MS&quot;;font-weight: 400;font-size: 15px;line-height: 1.429;letter-spacing: 0.001em;background-color: #eee;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;width: 100% !important;">
    <table class="mui-body" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;margin: 0;padding: 0;height: 100%;width: 100%;color: #212121;font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, Verdana, &quot;Trebuchet MS&quot;;font-weight: 400;font-size: 15px;line-height: 1.429;letter-spacing: 0.001em;background-color: #eee;">
      <tr>
        <td style="padding: 0;text-align: left;word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-collapse: collapse !important;">
          <center>
            <!--[if mso]><table><tr><td class="mui-container-fixed"><![endif]-->
            <div class="mui-container" style="max-width: 600px;display: block;margin: 0 auto;clear: both;text-align: left;padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
              <h3 class="mui--text-center" style="margin-top: 20px;margin-bottom: 10px;text-align: center;">Homely</h3>
              <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;">
                <tr>
                  <td class="mui-panel" style="padding: 15px;text-align: left;word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-radius: 0;background-color: #FFF;border-top: 1px solid #ededed;border-left: 1px solid #e6e6e6;border-right: 1px solid #e6e6e6;border-bottom: 2px solid #d4d4d4;border-collapse: collapse !important;">
                    <table id="content-wrapper" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;">
                      <tbody>
                        <tr>
                          <td style="padding: 0;text-align: left;word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;padding-bottom: 15px;border-collapse: collapse !important;">
                            <h2 style="margin-top: 0px;margin-bottom: 0px;">It's movie time !</h2>
                          </td>
                        </tr>
                        <tr>
                          <td class="mui--divider-top" style="padding: 0;text-align: left;word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;border-top: 1px solid #e0e0e0;padding-bottom: 15px;padding-top: 15px;border-collapse: collapse !important;">
                            Hello <?= $firstname ?>,
                          </td>
                        </tr>
                        <tr>
                          <td style="padding: 0;text-align: left;word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;padding-bottom: 15px;border-collapse: collapse !important;">
                            Don't forget your movie session in <b><?= $host ?></b>'s house today at <b><?= $time ?></b>.
                          </td>
                        </tr>
                        <tr>
                          <td style="padding: 0;text-align: left;word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;padding-bottom: 15px;border-collapse: collapse !important;">
                            <table class="mui-btn mui-btn--primary" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;cursor: pointer;white-space: nowrap;">
                              <tr>
                                <td style="padding: 0;text-align: left;word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;background-color: #2196F3;border-radius: 3px;border-collapse: collapse !important;">
                                  <a href="<?= $link ?>" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #FFF;text-decoration: none;border-top: 1px solid #2196F3;border-left: 1px solid #2196F3;border-right: 1px solid #2196F3;border-bottom: 1px solid #2196F3;font-weight: 500;font-size: 14px;line-height: 14px;letter-spacing: 0.03em;text-transform: uppercase;display: inline-block;text-align: center;border-radius: 3px;padding: 10px 25px;background-color: transparent;">More informations</a>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding: 0;text-align: left;word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;padding-bottom: 15px;border-collapse: collapse !important;">
                            Thanks,
                          </td>
                        </tr>
                        <tr>
                          <td id="last-cell" style="padding: 0;text-align: left;word-break: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;hyphens: auto;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;padding-bottom: 15px;border-collapse: collapse !important;">
                            The Homely Team
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
          </center>
        </td>
      </tr>
    </table>
  </body>
</html>