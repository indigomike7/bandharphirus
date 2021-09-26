<?php $__env->startSection('title','Contact Us'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Contact <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Contact <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <style>
        .headerTitle {
            font-size: 25px;
            font-weight: 700;
            margin-top: 2rem;
        }

        .for-contac-image {
            padding: 6%;
        }

        .for-send-message {
            padding: 26px;
            margin-bottom: 2rem;
            margin-top: 2rem;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: <?php echo e($web_config['primary_color']); ?>


            }

            .headerTitle {

                font-weight: 700;
                margin-top: 1rem;
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <div class="row">

            <div class="col-md-12 sidebar_heading text-center mb-2">

                <h1 class="h3  mb-0 folot-left headerTitle"><?php echo e(trans('messages.contact_bold')); ?></h1>


            </div>
        </div>


    </div>

    <!-- Split section: Map + Contact form-->
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6 iframe-full-height-wrap ">
                <img style="" class="for-contac-image" src="<?php echo e(asset("storage/app/public/png/contact.png")); ?>" alt="">
            </div>
            <div class="col-lg-6 for-send-message px-4 px-xl-5  box-shadow-sm">
                <h2 class="h4 mb-4 text-center"
                    style="color: #030303; font-weight:600;"><?php echo e(trans('messages.send_us_a_message')); ?></h2>
                    <form action="" method="POST" id="contactForm">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label ><?php echo e(trans('messages.your_name')); ?></label>
                                <input class="form-control name" name="name" type="text" placeholder="John Doe" required>

                              </div>
                            </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-email"><?php echo e(trans('messages.email_address')); ?></label>
                                <input class="form-control email" name="email" type="email" placeholder="johndoe@email.com" required >

                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-phone"><?php echo e(trans('messages.your_phone')); ?></label>
                                <input class="form-control mobile_number"  type="text" name="mobile_number" placeholder="+088" required>

                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-subject"><?php echo e(trans('messages.Subject')); ?>:</label>
                                <input class="form-control subject" type="text" name="subject"  placeholder="Provide short title of your request" required>

                              </div>
                            </div>
                             <div class="col-md-12">
                            <div class="form-group">
                              <label for="cf-message"><?php echo e(trans('messages.Message')); ?></label>
                              <textarea class="form-control message" name="message"  rows="6" placeholder="Please describe in detail your request" required></textarea>

                            </div>
                          </div>
                        </div>
                        <div class=" ">
                          <button class="btn btn-primary" type="submit"  id="submit">Send message</button>
                      </div>
                    </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
<script type="text/javascript">

$('#contactForm').on('submit',function(event){
    event.preventDefault();

    name = $('.name').val();
    email = $('.email').val();
    mobile_number = $('.mobile_number').val();
    subject = $('.subject').val();
    message = $('.message').val();

    $.ajax({
      url: "<?php echo e(route('admin.contact.store')); ?>",
      type:"POST",
      data:{
        "_token": "<?php echo e(csrf_token()); ?>",
        name:name,
        email:email,
        mobile_number:mobile_number,
        subject:subject,
        message:message,
      },
      success:function(response){
        toastr.success(response.success);
        $('#contactForm').trigger('reset');
        $('.invalid-feedback').remove();
        // window.location.reload();


      },
       });
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bandbkmp/public_html/resources/views/web-views/contacts.blade.php ENDPATH**/ ?>