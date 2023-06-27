 <?
if (isset($_REQUEST["course_name"])): 
    $course_name=htmlspecialchars($_REQUEST["course_name"]);
else:
    $course_name = null;
endif;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://exchange.kraft.net.ua:44315/kraft_utp/hs/sitemsg/simple_form5?seminar_id='. $course_name . '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
$output = substr($output, strpos($output, "{"));
curl_close($ch);
$data = json_decode($output);
?>
<link rel="stylesheet" type="text/css" href="style.css"></link>
<form action="form.php" method="POST" >
    <div style="display: none">
         <input type="hidden" name="FORM_ID" value="5"> 
         <?php  echo '<input type="hidden" name="SeminarId" value="' . $course_name . '">  '; ?>        
     </div>
     <div class="b24-form" >   
      <div id="b24-995035733017943230523586995011" data-styles-apllied="true" class="">      
        <div class="b24-form-wrapper b24-form-shadow b24-form-border-bottom"> 
          <div class="b24-form-content b24-form-padding-side">                 
            <div>     

            
              <div class="b24-form-field b24-form-field-name b24-form-control-string">             
                <div>                
                  <div>                  
                    <div class="b24-form-control-container b24-form-control-icon-after">         <input type="text" class="b24-form-control b24-form-control-not-empty" name="name_company">   
                      <div class="b24-form-control-label">Назва підприємства                    <span class="b24-form-control-required">*</span>                     
                        <div class="b24-form-control-alert-message" style="display: none;">Поле обов'язкове для заповнення                    </div>
                                        </div>
                                      </div>
                                </div>
                          </div>
                      </div>
             
         
              <div class="b24-form-field b24-form-field-name b24-form-control-string">             
                <div>                
                  <div>                  
                    <div class="b24-form-control-container b24-form-control-icon-after">                  <input type="text" class="b24-form-control b24-form-control-not-empty" name="first_name">                     
                      <div class="b24-form-control-label">Ім'я По Батькові                    <span class="b24-form-control-required">*</span>                     
                        <div class="b24-form-control-alert-message" style="display: none;">Поле обов'язкове для заповнення                    </div>
                                        </div>
                                      </div>
                                </div>
                          </div>
                      </div>
                       
              <div class="b24-form-field b24-form-field-name b24-form-control-string">             
                <div>                
                  <div>                  
                    <div class="b24-form-control-container b24-form-control-icon-after">                  <input type="text" class="b24-form-control b24-form-control-not-empty" name="number_phone">                     
                      <div class="b24-form-control-label">Номер телефону учасника (тільки цифри, без +38, наприклад: 0671234578)                    <span class="b24-form-control-required">*</span>                     
                        <div class="b24-form-control-alert-message" style="display: none;">Поле обов'язкове для заповнення                    </div>
                                        </div>
                                      </div>
                                </div>
                          </div>
                      </div>
                       
              <div class="b24-form-field b24-form-field-name b24-form-control-string">             
                <div>                
                  <div>                  
                    <div class="b24-form-control-container b24-form-control-icon-after">                   <input type="text" class="b24-form-control b24-form-control-not-empty" name="erdpou">  
                      <div class="b24-form-control-label">ЄРДПОУ                    <span class="b24-form-control-required">*</span>                     
                        <div class="b24-form-control-alert-message" style="display: none;">Поле обов'язкове для заповнення                    </div>
                                        </div>
                                      </div>
                                </div>
                          </div>
                      </div>
              <div class="b24-form-field b24-form-field-name b24-form-control-string">             
                <div>                
                  <div>                  
                    <div class="b24-form-control-container b24-form-control-icon-after">                   <input type="text" class="b24-form-control b24-form-control-not-empty" name="email">                     
                      <div class="b24-form-control-label">Електронна пошта                    <span class="b24-form-control-required">*</span></div>
                     
                      <div class="b24-form-control-label"><span class="b24-form-control-required"></span></div>
                     
                      <div class="b24-form-control-label"><span class="b24-form-control-required"></span></div>
                                      </div>
                                </div>
                          </div>
                      </div>
             
              <div class="b24-form-field b24-form-field-name b24-form-control-string">             
                <div>                
                  <div>                  
                    <div class="b24-form-control-container b24-form-control-icon-after"> 
                      <h4 style="color: black;">Оберіть варіант участі </h4>
                     
                     
                      <br />
                     
                      <div class="choices"> <?php

if ($data->RequestStatus = 1) {
  if ($data->MultiplePrices = 1){
//echo $data->Prices->PriceID;
    foreach ($data->Prices as $price) {

    
echo '<p class= "label" style="color:black"><input class="price_c" type="radio" required value="' .$price->PriceID.'" name="price">  ' . $price-> PriceNameUKR . '  ' . $price->Price. '  грн<br></p>';
}
  }
}
?>                 </div>
                                      </div>
                            </div>
                        </div>
                                       
                        </div>
             
   <div class="b24-form-basket"> 
                <table class="basket"> 
                  <tbody> 
                    <tr class="b24-form-basket-pay"><td class="b24-form-basket-label"><br _moz_editor_bogus_node='on'></td> <td class="b24-form-basket-value"> 
                        <p>Ваше замовлення на суму: <span class="total__price"> </span>.00 грн</p>
                       
                        <p></p>
                       </td></tr>
                   </tbody>
                 </table>
               </div>
 
            
             
              <div class="b24-form-btn-container"> 
<!---->
 
<!---->
 
                <div class="b24-form-btn-block"><button class=" b24-form-btn" >Залишити заявку</button></div>
               </div>
                    </div>
            </div>
         </div>
             
<script>  
const totalPrice = document.querySelector(".total__price");
const choices = document.querySelector(".choices");



choices.addEventListener("click", (e)=>{
   if(e.target.checked){
     const label = e.target.closest(".label");
     const currentPrice = label.textContent.replace(/\D/g, '');
     totalPrice.textContent = currentPrice;
          document.getElementById('price').value=currentPrice;
   } else return;
});
var b = document.querySelector("form");

b.setAttribute("onsubmit;", "return false;");
</script>
 
        <div id="gtx-trans" style="position: absolute; left: -19px; top: -18px;"> 
          <div class="gtx-trans-icon"></div>
         </div>
       </div>
     </div>
   </div>
 </div>
 </form>