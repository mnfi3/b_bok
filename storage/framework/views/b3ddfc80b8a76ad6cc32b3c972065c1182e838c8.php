<?php $__env->startSection('user_content'); ?>
    <section id="cart" class="w-100 ">
        <div class="container p-1 p-md-3">
            <div class=" p-1 p-md-3">
                <h5 class="mb-3">سبد خرید شما:</h5>


                <?php if(count($contents) == 0): ?>
                    <span>خالی</span><br><br><br>
                <?php else: ?>



                    <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                            <a href="<?php echo e(route('detail', $content->book->id)); ?>" class="col-md-2 cart-img-container">
                                <img src="<?php echo e(asset($content->book->image_path)); ?>" alt="">
                            </a>
                            <div class="col-md-10 d-flex justify-content-between align-items-center mt-2 mt-md-0">
                                <h6><?php echo e($content->book->name); ?></h6>
                                <h6 class="">
                                    <span><?php echo e(number_format( (int)($content->book->price - ($content->book->price * $content->book->discount_percent/100)))); ?> </span>
                                    <span class="ml-2">تومان</span>
                                </h6>


                                <div class="d-flex align-items-center">
                                    <span class="mr-1">تعداد</span>


                                    <div class="input-group">

                                        <a class="input-group-btn mr-1" onclick="minusFromCart(event,<?php echo e($content->id); ?>)" href="#">
                                            <button type="button" class="btn btn-default "
                                                    
                                                    
                                                    
                                            >
                                                <span class="fa fa-minus"></span>
                                            </button>
                                        </a>


                                        <input id="cart<?php echo e($content->id); ?>" type="text" name="quant[<?php echo e($content->id); ?>]" class="form-control input-number mr-1" value="<?php echo e($content->count); ?>"
                                               min="1"
                                               max="1000">


                                        <a class="input-group-btn" onclick="addToCart(event,<?php echo e($content->id); ?>)" href="#">
                                            <button type="button" class="btn btn-default "
                                                    
                                                    
                                            >
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </a>
                                    </div>

                                </div>


                                <form action="<?php echo e(route('user-cart-remove')); ?>" method="post" class="d-inline" onsubmit="">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="content_id" value="<?php echo e($content->id); ?>">
                                    <button type="submit" class="btn btn-delete"> حذف
                                    </button>
                                </form>


                            </div>
                        </div>
                        <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>








                    <div>
                        <h5>تکمیل فرآیند خرید</h5>
                        <div class="">
                            <form action="<?php echo e(route('user-cart-pay')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">آدرس: </label>
                                    <div class="col-sm-8">
                                    <textarea  name="address" type="text" class="form-control" rows="5" id="address"
                                               placeholder="آدرس دقیق خود را وارد کنید" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">شماره تلفن همراه: </label>
                                    <div class="col-sm-8">
                                        <input name="phone" type="number" class="form-control" rows="5" id="address"
                                               placeholder="مثال: 09000000000" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">کد پستی:</label>
                                    <div class="col-sm-8">
                                        <input id="postalCode" name="postal_code" type="number" class="form-control" rows="5" id="address"
                                               placeholder="مثال: 00000-11111" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">کد تخفیف:</label>
                                    <div class="col-sm-8">
                                        <input id="postalCode" name="discount_code" type="text" class="form-control" rows="5" id="address"
                                               placeholder="در صورت داشتن کد تخفیف آن را وارد کنید" >
                                    </div>
                                </div>

                                <div class="form-group row align-content-center">
                                    <label for="address" class="col-sm-2 col-form-label">تحویل حضوری:</label>
                                    <div class="col-sm-8">

                                        <input  onclick="checkInperson(this)" name="is_in_person" class="m-auto" style="height:40px;width: 20px" type="checkbox" >
                                    </div>
                                    <span class="alert alert-warning">در صورت انتخاب گزینه تحویل حضوری، کتاب/کتابها با پست ارسال نخواهد شد و برای دریافت آن می بایست با در دست داشتن کد خرید به کتابخانه مرکزی دانشگاه مراجعه نمایید!</span>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">مجموع مبلغ پرداختی: </label>
                                    <div class="col-sm-8 align-content-center pt-1">
                                        <span id="sum" class="text-dark" style="font-size: 1.1em"><?php echo e(number_format($sum)); ?> تومان</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-success mt-2 ml-2 col-sm-2">پرداخت</button>
                                    <div class="col-sm-8">

                                    </div>
                                </div>

                            </form>



                        </div>
                    </div>


                <?php endif; ?>


            </div>
        </div>


        <span id="srMsg" class="server-response sr-success"></span>

    </section>
    <script>
      function addToCart(elm,id) {
        elm.preventDefault();
        var url = "http://" + window.location.hostname + "/user-cart-plus/" + id ;
        var xhttp = new XMLHttpRequest();
        xhttp.open('GET',url,true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
          var res;
          try{
            res =JSON.parse(this.responseText)
          } catch(e) {
          }
          if (this.readyState == 4 && this.status == 200 && res.status==1) {
            var msgBox = document.getElementById("srMsg");
            msgBox.innerHTML = res.message;
            msgBox.classList.add("sr-active");
            setTimeout(function () {
              msgBox.classList.remove("sr-active");
            },3000);
            document.getElementById("cart"+id).value = res.count;
            document.getElementById("sum").innerHTML = numberFormat(res.sum) + " تومان ";
          }else if(this.responseText.status==0){
          }
        };
      }
      function minusFromCart (elm,id) {
        elm.preventDefault();
        var url = "http://" + window.location.hostname + "/user-cart-minus/" + id ;
        var xhttp = new XMLHttpRequest();
        xhttp.open('GET',url,true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
          var res;
          try{
            res =JSON.parse(this.responseText)
          } catch(e) {
          }
          if (this.readyState == 4 && this.status == 200 && res.status==1) {
            var msgBox = document.getElementById("srMsg");
            msgBox.innerHTML = res.message;
            msgBox.classList.add("sr-active");
            setTimeout(function () {
              msgBox.classList.remove("sr-active");
            },3000);
            document.getElementById("cart"+id).value = res.count;
            document.getElementById("sum").innerHTML = numberFormat(res.sum) + " تومان ";
          }else if(this.responseText.status==0){
          }
        };
      }
      function numberFormat(value) {
        var formatter = new Intl.NumberFormat()
        return formatter.format(value);
      }
      function checkInperson(elm) {
        var addressInput = document.getElementById('address');
        var postalCodeInput = document.getElementById('postalCode');
        if(elm.checked){
          addressInput.disabled=true;
          postalCodeInput.disabled=true;
        }else{
          addressInput.disabled=false;
          postalCodeInput.disabled=false;
        }
      }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>