<template>
    <div style="background-color:#efefef">
        <div style="margin:0;padding:0;background-color:#efefef;max-width: 600px; margin: auto">
           <table align="center" cellpadding="0" cellspacing="0" style="padding:10px 0px 50px">
              <tbody>
                 <tr>
                    <td colspan="3" style="background-color:#fff;text-align:left;padding:13px 0px 12px 19px">
                       <a href="https://triplan.asia" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://triplan.asia/&amp;source=gmail"><img src="https://triplan.asia/web/images/logos/logo_blue.png" alt="triplan.asia" width="140"></a>
                    </td>
                 </tr>
                 <tr>
                    <td colspan="6" style="padding:0px 0px 30px">
                       <table align="center" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                             <tr>
                                <td colspan="2" style="background-color:#ebf4d0">
                                   <table cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                         <tr>
                                            <td colspan="2" align="center" style="padding:20px;font-weight:bold;font-size:24px;font-family:Arial;color:#91bb15;text-align:center;">
                                               XÁC NHẬN ĐẶT CỌC
                                            </td>
                                         </tr>
                                      </tbody>
                                   </table>
                                </td>
                             </tr>
                             <tr>
                                <td colspan="2" style="padding:27px 30px 10px;background-color:#fff;text-align:center">
                                   <p style="font-size:14px;font-family:Arial;color:#000;margin-top:0px;text-align:center">
                                      Chào {{ booking.name }}, vui lòng thanh toán để hoàn thiện đặt tour tại Triplan của bạn.
                                   </p>
                                </td>
                             </tr>
                             <tr>
                                <td colspan="2" style="padding:0px 20px 30px;background-color:#fff;text-align:center">
                                   <table cellpadding="0" cellspacing="0" align="center" width="100%" style="background-color:#fffde7;border:1px dotted #f5a623;padding:12px 0px">
                                      <tbody>
                                         <tr>
                                            <td style="font-size:14px;font-family:Arial;color:#000;text-align:center">Mã booking:
                                            </td>
                                         </tr>
                                         <tr>
                                            <td style="font-weight:bold;font-size:24px;font-family:Arial;color:#f8a000;text-align:center;text-transform: uppercase;">{{ booking.code }}</td>
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
                    <td colspan="6" style="background-color:#fff; padding:0px 30px">
                      <div>
                        <div v-for="(bookingCurrent, key) in booking.details" style="margin-top: 20px;font-size:14px">
                          <!-- Tên dịch vụ -->
                          <div class="border-bottom-ddd"">
                            <strong class="margin-10">
                                {{ key + 1 }}/ {{ bookingCurrent.service_name }}
                            </strong>
                            <p class="margin-10" style="color:gray;">
                              Gói: {{ bookingCurrent.service_package_parent_name }} - Ngày: {{ bookingCurrent.date }}
                            </p>
                          </div>
                          <!-- Thông tin dịch vụ -->
                          <div class="display-flex border-bottom-ddd">
                            <div class="margin-10 width-25">
                              <p class="color-a0a0a0 mar-bottom-0">Dịch vụ</p>
                            </div>
                            <div class="width-100">
                              <div v-for="item in bookingCurrent.infomation">
                                <div class="margin-10 display-flex content-between">
                                  <div class="margin-auto">
                                    <p class="mar-bottom-0">
                                      {{ item.quantity }} x {{ item.service_package_name }}
                                    </p>
                                  </div>
                                  <div class="margin-auto">
                                    <p class="mar-bottom-0" style="width:130px; text-align: left">
                                        = {{ item.total_money_origin | vnd }}
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- khuyến mại -->
                          <div class="border-bottom-ddd display-flex">
                            <div class="margin-10 width-25">
                              <p class="color-a0a0a0 mar-bottom-0">Khuyến mại</p>
                            </div>
                            <div class="width-100">
                              <div v-for="item in bookingCurrent.infomation">
                                <div v-if="item.quantity_free" class="margin-10 display-flex content-between">
                                  <div class="margin-auto">
                                    <p class="mar-bottom-0">
                                        {{ item.quantity_free }} x {{ item.service_package_name }}
                                    </p>
                                  </div>
                                  <div class="margin-auto">
                                    <p class="mar-bottom-0" style="width:130px; text-align: left">
                                        = - {{ item.total_money_free | vnd }}
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Tổng tiền -->
                        <div class="display-flex content-between margin-10 border-bottom-ddd">
                          <strong class="mar-bottom-0">Tổng:</strong>
                          <p class="mar-bottom-0" style="font-size:24px;color:#91bb15">{{ booking.payment_total | vnd }}</p>
                        </div>
                        <!-- Thanh toán -->
                        <div class="display-flex content-between margin-10 border-bottom-ddd">
                          <div>
                            <strong>Thanh toán:</strong>
                            <p style="margin:2px 0px;color:#a0a0a0">Đã bao gồm thuế VAT và phí dịch vụ.</p>
                          </div>
                          <div>
                            <p class="mar-bottom-0" style="font-size:24px;color:#91bb15">
                              {{ booking.payment_total | vnd }}
                            </p>
                          </div>
                        </div>
                        <!-- Lưu ý -->
                        <div class="margin-10">
                          <p>Lưu ý: Ăn uống ngoài chương trình, vé thăm quan các điểm, hướng dẫn viên. Dịch vụ ngoài gói khuyến mãi</p>
                        </div>
                      </div>
                    </td>
                 </tr>
                 <tr>
                    <td colspan="6" height="10px" style="float:left">&nbsp;</td>
                 </tr>
                 <tr>
                    <td colspan="6" height="30px" style="float:left">&nbsp;</td>
                 </tr>
                 <tr>
                    <td colspan="6" style="background-color:#fff; padding:0px 30px">
                       <table cellpadding="0" cellspacing="0" width="100%" style="padding:0px 30px">
                          <tbody>
                             <tr>
                                <td colspan="3" style="font-size:14px;font-family:Arial;padding:20px 0px 10px;text-align:left;border-bottom:1px solid #ddd">
                                   <p style="font-weight:bold;color:#222;margin:0px">
                                        Người nhận tour: {{ booking.nameService }}
                                   </p>
                                </td>
                             </tr>
                             <tr>
                                <td width="123px" style="font-size:14px;font-family:Arial;color:#222;padding:10px 10px 10px 0px;text-align:left;border-bottom:1px solid #ddd;vertical-align:top">
                                   <p style="font-weight:bold;margin:0px;line-height:18px">Người nhận:
                                   </p>
                                </td>
                                <td colspan="2" style="font-size:14px;font-family:Arial;color:#222;padding:10px 0px;border-bottom:1px solid #ddd">
                                   <p style="margin:0px;line-height:25px">{{ booking.name }}</p>
                                   <p style="margin:0px;line-height:25px">{{ booking.phone }}</p>
                                   <p style="margin:0px;line-height:25px">{{ booking.email }}</p>
                                </td>
                             </tr>
                          </tbody>
                       </table>
                    </td>
                 </tr>
                 <tr>
                    <td colspan="6" height="10px" style="float:left">&nbsp;</td>
                 </tr>
                 <tr>
                    <td colspan="6" style="background-color:#fff; padding:20px 30px !important">
                       <table cellpadding="0" cellspacing="0" width="100%" style="padding:20px 30px 30px">
                          <tbody>
                             <tr>
                                <td style="font-size:14px;font-family:Arial;text-align:left;padding-bottom:10px">
                                   <p style="font-weight:bold;color:#222;margin:0px">Thanh toán theo hình thức chuyển khoản
                                      ngân hàng:
                                   </p>
                                   <p style="color:#222;margin:0px;padding:5px 0px 0px 0px">Nếu không thể tiến hành thanh toán
                                      online, bạn vui lòng chuyển khoản cho chúng tôi giá trị đơn hàng qua một trong các ngân hàng
                                      liệt kê ở bên dưới.
                                   </p>
                                   <br>
                                   <p style="color:#222;margin:0px;padding:5px 0px 0px 0px">Nội dung chuyển khoản như sau:</p>
                                </td>
                                <td></td>
                             </tr>
                             <tr>
                                <td>
                                   <p style="font-size:18px;text-align:center">
                                    Thanh toán cho đơn hàng
                                    <span style="text-transform: uppercase;">{{ booking.code }}</span>
                                </p>
                                </td>
                             </tr>
                             <tr>
                                <td style="background-color:#ebf4d0;border:1px dotted #91bb15;padding:13px 16px;font-size:14px;font-family:Arial;color:#5b7806">
                                   <p style="margin:0px;line-height:1.8;font-size:15px;font-weight:bold;margin-top:10px">
                                      Vietcombank - Ngân hàng TMCP Ngoại Thương Việt Nam
                                   </p>
                                   <p style="margin:0px;line-height:1.8">Chi nhánh Thành Công</p>
                                   <p style="margin:0px;line-height:1.8">Chủ tài khoản: Lại Văn Đạo</p>
                                   <p style="margin:0px;line-height:1.8">Số tài khoản: 0451000318207</p>
                                   <p style="margin:0px;line-height:1.8;font-size:15px;font-weight:bold;margin-top:10px">
                                      Maritime Bank - Ngân hàng TMCP Hàng Hải Việt Nam
                                   </p>
                                   <p style="margin:0px;line-height:1.8">Chi nhánh Nguyễn Du</p>
                                   <p style="margin:0px;line-height:1.8">Chủ tài khoản: Lại Văn Đạo</p>
                                   <p style="margin:0px;line-height:1.8">Số tài khoản: 11001017981436</p>
                                </td>
                             </tr>
                             <tr>
                                <td style="font-size:14px;font-family:Arial;text-align:left;padding-bottom:10px;padding-top:30px">
                                   <p style="font-weight:bold;color:#222;margin:0px">Thanh toán trực tiếp:</p>
                                   <p style="color:#222;margin:0px;padding:5px 0px 0px 0px">Nếu không thể tiến hành thanh toán
                                      online hoặc chuyển khoản, bạn vui lòng đến thanh toán tiền mặt trực tiếp tại Văn phòng của
                                      <a href="https://triplan.asia" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://triplan.asia&amp;source=gmail">Triplan.asia</a> theo địa chỉ như sau: Tầng 3, 102 Thái Thịnh - Đống Đa - Hà Nội
                                   </p>
                                   <br>
                                </td>
                             </tr>
                          </tbody>
                       </table>
                    </td>
                 </tr>
              </tbody>
           </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Thankyou',
        props: {
            data_params: {
                type: Object,
                default: () => {
                    return {}
                }
            }
        },
        data () {
            return {
                booking: {}
            }
        },
        components: {

        },
        computed: {

        },
        mounted () {
            this.getBooking()
        },
        methods: {
            getBooking () {
                if (this.data_params.code) {
                    console.log(this.data_params.code)
                    axios.get('thankyou-booking/' + this.data_params.code).then(response => {
                        console.log(response.data)
                        switch (response.code) {
                            case 200:
                                this.booking = response.data
                                break;
                            default:
                                break;
                        }
                    })
                }
            },
        }
    }
</script>

<style type="text/css" scoped>
.padding-15{
  padding: 15px 0;
}
.margin-10{
  padding: 10px 0;
}
.margin-auto{
  margin: auto 0;
}
.mar-bottom-0{
  margin-bottom: 0px;
}

.display-flex{
  display: flex;
}
.content-between{
  justify-content: space-between
}

.width-25{
  width: 25%;
}
.width-100{
  width: 100%;
}

.border-bottom-ddd{
  border-bottom:1px solid #ddd
}
.color-a0a0a0{
  color: #a0a0a0;
}
</style>
