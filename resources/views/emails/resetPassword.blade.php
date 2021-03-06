<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box rtl">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{url(config('settings.logo'))}}" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td  style='direction:ltr'>
                              {{config('settings.company')}}<br>
                              {{config('settings.sitename')}}<br>
                              Created: {{\Carbon\Carbon::now()}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>


وصلتك هذه الرسالة لاننا استلمنا طلب اعادة كلمة المرور من حسابكم الخاص
على   {{config('settings.company')}} - {{config('settings.sitename')}}
 
<br>

<table border="0" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                            <tbody><tr>
                                <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                    <a href="{{url('password/reset/'.$token )}}"  style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-radius:3px;color:#fff;display:inline-block;text-decoration:none;background-color:#3097d1;border-top:10px solid #3097d1;border-right:18px solid #3097d1;border-bottom:10px solid #3097d1;border-left:18px solid #3097d1" target="_blank" data-saferedirecturl="{{url('password/reset/'.$token)}}"> 
                                        اعادة كلمة المرور
                                    </a>
                                </td>
                            </tr>
                        </tbody></table>

* اذا لم تقم بطلب اعادة كلمة المرور تخطي هذه الرسالة    <br>

سعداء باستقبال اقتراحاتكم وشكواكم على البريد<br>
{{config('settings.site_email')}} <br>

شكرا ..

<hr>

<B>مجموعة شمول الخليج</B>



<p style="font-size: 13px;text-align: right;margin-top: 10px;position: relative;right: 27.5%;">&copy; {{config('settings.company')}} -  {{config('settings.sitename')}} {{date('Y')}} </p>
 

                            </td>
                            
                            <td>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
           
            
          
        </table>
    </div>
</body>
</html>