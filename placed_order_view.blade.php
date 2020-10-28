<html lang="en">

<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,700italic,900);
    body { font-family: 'Roboto', Arial, sans-serif !important; }
    a[href^="tel"]{
        color:inherit;
        text-decoration:none;
        outline:0;
    }
    a:hover, a:active, a:focus{
        outline:0;
    }
    a:visited{
        color:#FFF;
    }
    span.MsoHyperlink {
        mso-style-priority:99;
        color:inherit;
    }
    span.MsoHyperlinkFollowed {
        mso-style-priority:99;
        color:inherit;
    }
  </style>
</head>

<body style="margin: 0; padding: 0;background-color:#EEEEEE;">
  <div style="display:none;font-size:1px;color:#333333;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">
    Questions? Call us any time 24/7 at 1-800-672-4399 or simply reply to this email | Chewy.com
  </div>
  <table cellspacing="0" style="margin:0 auto; width:100%; border-collapse:collapse; background-color:#EEEEEE; font-family:'Roboto', Arial !important">
    <tbody>

    
      <tr>
        <td align="center" style="padding:20px 23px 0 23px">
          <table width="600" style="background-color:#FFF; margin:0 auto; border-radius:5px; border-collapse:collapse;width: 100%;">
            <tbody>
              <tr>
                <td align="center">
                  <table width="500" style="margin:0 auto">
                    <tbody>

                      <tr>
                        <td align="center" style="padding:40px 0 35px 0">
                        <a style="color: #222223a6;"  href="{{url('/cravenation.home')}}" class="btn btn-outline-primary btn-md">Back To Home</a>
                        </td>
                      </tr>
                      <tr>

                        <td align="center" style="font-family:'Roboto', Arial !important">
                          <h2 style="margin:0; font-weight:bold; font-size:40px; color:#444; text-align:center; font-family:'Roboto', Arial !important">
                                        Thanks for your order
                          </h2>
                        </td>
                      </tr>
                      <tr>
                        <td align="center" style="padding:15px 0 20px 0; font-family:'Roboto', Arial !important">
                          <p style="margin:0; font-size:18px; color:#000; line-height:24px; font-family:'Roboto', Arial !important">
                            You'll receive a conformation email at <b>{{$retuserObject[0]->email}}<b> when your items will be delivered. 
                            If you have any questions, call us any time at <b>+91-6201389485</b> or simply reply to this email <b>singhnidhi530@gmail.com</b>.
                          </p>
                        </td>
                      </tr>
                      <tr>
                        <td align="center" style="padding-bottom:30px">
                          <table style="width:255px; margin:0 auto;">
                            <tbody>
                              <tr>
                                <td width="255" style="background-color:#008AF1; text-align:center; border-radius:5px; vertical-align:middle; padding:13px 0">
                                
                                  <a href="{{url('cravenation.order_tracking.'.$retorderObject[0]->order_ref_no)}}" target="_blank" style="outline:0;color:#FFF; text-transform:uppercase; display:block; text-align:center; text-decoration:none; font-weight:bold; font-size:19px;">View
                                    Track Your Order
                                    </a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td align="center" cellspacing="0" style="padding:0 0 30px 0; vertical-align:middle">
                  <table width="550" style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border:1px solid #E5E5E5">
                    <tbody>
                      <tr>
                        <td width="276" style="vertical-align:top; border-right:1px solid #E5E5E5">
                          <table style="width:100%; border-collapse:collapse">
                            <tbody>
                              <tr>
                                <td style="vertical-align:top; padding:18px 18px 8px 23px; font-family:'Roboto', Arial !important">
                                  <p style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                                    Summary:
                                  </p>
                                </td>
                              </tr>
                              <tr style="">
                                <td style="vertical-align:top; padding:0 18px 18px 23px">
                                  <table width="100%" style="border-collapse:collapse">
                                    <tbody>
                                      <tr>
                                        <td style="font-family:'Roboto', Arial !important">
                                          <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                            Order #:
                                          </p>
                                        </td>
                                        <td align="left" style="font-family:'Roboto', Arial !important">
                                          <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                          {{$retorderObject[0]->order_ref_no}}
                                          </p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td style="font-family:'Roboto', Arial !important">
                                          <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                            Order Date:
                                          </p>
                                        </td>
                                        <td align="left" style="font-family:'Roboto', Arial !important">
                                          <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                          {{$retorderObject[0]->order_date}}
                                          </p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td style="font-family:'Roboto', Arial !important">
                                          <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                            Order Total:
                                          </p>
                                        </td>
                                        <td align="left" style="font-family:'Roboto', Arial !important">
                                          <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                          {{$retorderObject[0]->order_amount}}
                                          </p>
                                        </td>
                                      </tr>
                                     
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <td style="vertical-align:top">
                          <table width="100%" style="border-collapse:collapse">
                            <tbody>
                              <tr>
                                <td style="vertical-align:top; padding:18px 18px 8px 23px; font-family:'Roboto', Arial !important">
                                  <p style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                                    Shipping Address:
                                  </p>
                                </td>
                              </tr>
                              <tr>
                                <td style="vertical-align:top; padding:0 18px 18px 23px; font-family:'Roboto', Arial !important">
                                  <table width="100%" style="border-collapse:collapse">
                                    <tbody>
                                      <tr>
                                        <td style="font-family:'Roboto', Arial !important">
                                          <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                          {{$retorderObject[0]->order_address}}
                                          </p>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td align="center" cellspacing="0" style="padding:0; vertical-align:middle">
                  <table width="550" style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border-bottom:1px solid #E5E5E5">
                    <tbody>

                      <tr>
                        <td width="380" align="left" style="padding:15px 0 15px 25px; font-family:'Roboto', Arial !important">
                          <p style="text-transform:uppercase;font-size:16px; color:#333333; margin:0; font-weight:400; font-family:'Roboto', Arial !important; ">
                            <span style="font-weight: 900;">  Items Ordered</span>
                          </p>
                        </td>

                        <td width="60" align="right" style="font-family:'Roboto', Arial !important">
                          <p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:center;">
                            QTY</p>
                        </td>
                        <td width="80" align="right" style="font-family:'Roboto', Arial !important;padding-right:10px;">
                          <p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:right;">
                            PRICE</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              @foreach($retorderItems as $item)
              <tr>
                <td style=" font-family:'Roboto', Arial !important;padding:0;" align="center">
                  <table width="550" style="border-collapse:collapse;margin: 0 auto;border-bottom: 1px solid #EBEBEB">
                    <tbody>
                      <tr>
                        <td width="117" align="right" style="padding:24px 0 24px 10px; text-align:left;">
                              <img style="width:100px;height:100px;" src="{{ URL::asset('uploads/food/'.$item->image) }}" border="0">
                            
                          </a>
                        </td>
                              <td width="270" style="vertical-align:middle; padding:0 0 0 10px; font-family:'Roboto', Arial !important;">
                                <h4>{{$item->resto_name}}</h4>
                                <p style="font-size:16px; margin:0; color:#000; line-height:20px; font-family:'Roboto', Arial !important">
                                  {{$item->food_name}}   
                                  </a>
                                </p>
                                <p style="font-size:14px;font-weight:bold;font-family:'Roboto', Arial !important;padding:0; margin:10px 0 0px 0; float:right; margin-top: -45px;">
                                {{$item->item_quantity}}
                                  </a>
                                </p>
                              </td>
                              <td align="center" width="80" style="font-family:'Roboto', Arial !important;padding:0 10px 0 0;">
                                <p style="font-size:18px; color:#bc0101; margin:0; font-family:'Roboto', Arial !important;text-align:center;font-weight:bold;text-align: right;">
                                ₹ {{$item->item_amount}}
                                </p>
                              </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              @endforeach
  
              <tr>
                <td align="center" style="padding-top:24px; padding-bottom:20px">
                  <table width="520" style="border-collapse:collapse">
                    <tbody>
                      <tr>
                        <td align="right" width="425" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                          <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                            Subtotal :
                          </p>
                        </td>
                        <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                          <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                          ₹ {{$retsumOfCartItem}}
                          </p>
                        </td>
                      </tr>
                      <tr>
                        <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                          <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                            Delivery Charges:
                          </p>
                        </td>
                        <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                          <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important;color:#bc0101;font-weight:bold;">
                          ₹ {{$retsumOfCartItem}}</p>
                        </td>
                      </tr>
                      
                      
                        <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                          <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                            Estimated Tax:
                          </p>
                        </td>
                        <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                          <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important">
                          ₹ 0.00
                          </p>
                        </td>
                      </tr>

                      <tr>
                        <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                          <p style="font-size:18px; color:#000; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                            Order Total:
                          </p>
                        </td>
                        <td align="right" style="padding-bottom:15px; font-family:'Roboto', Arial !important">
                          <p style="font-size:18px; color:#bc0101; font-weight:bold; margin:0; font-family:'Roboto', Arial !important">
                          ₹ {{$rettotalAmount}}
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>