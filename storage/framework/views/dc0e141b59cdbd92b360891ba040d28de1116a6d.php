<?php $__env->startSection('content'); ?>






    <div class=" bg-light books-container p-3">


        <form action="<?php echo e(route('book-search')); ?>" method="get" class="mt-2 mb-5 text-center">
            <?php echo csrf_field(); ?>
            <div class="form-group row mr-5 ">
                <div class="col-sm-4">
                    <input  name="text" type="text" class="form-control mr-5" rows="5"
                            <?php if(!empty($search)): ?>
                                value="<?php echo e($search); ?>"
                            <?php endif; ?>
                            placeholder="بخشی از نام کتاب یا نویسنده را وارد کنید" >
                </div>
                <button type="submit" class="btn btn-outline-primary ml-2 col-sm-1">جستجو</button>
            </div>
        </form>


        <div class="d-flex flex-wrap align-content-center m-3 bg-info p-2" style="border-radius: 0.25rem">
            <span class="mt-2 mr-5 text-white">دسته بندی ها : </span>
            <a href="<?php echo e(route('site-home')); ?>" class="btn btn-light m-1  mx-2  <?php if(\Illuminate\Support\Facades\Request::path() == '/'): ?>bg-warning border-0 <?php endif; ?>">همه کتاب ها</a>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('category-books', $category->id)); ?>" class="btn btn-light m-1  mx-2
                    <?php if(\Illuminate\Support\Facades\Request::path() == 'category/'.$category->id.'/books'): ?>
                        bg-warning border-0
                    <?php endif; ?>"><?php echo e($category->name); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div id="allBooks" class="d-flex flex-row flex-wrap m-0 p-1 p-sm-3 justify-content-center">
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('detail', $book->id)); ?>" class="d-block text-center book-link">
                    <div class="book-container d-flex flex-column align-items-center m-3" style="min-height: 300px !important;">
                        <img src="<?php echo e(asset($book->image_path)); ?>" class="book-img mb-2"/>
                        <div class="d-flex flex-column align-self-stretch ">
                            <span class="mb-1" style="min-height: 50px;max-height: 80px;overflow: hidden"><?php echo e($book->name); ?></span>
                            <span class="mb-2" style="min-height: 25px;max-height: 25px;overflow: hidden"><?php echo e($book->author); ?></span>
                            <?php if($book->discount_percent > 0): ?>
                            <span class="book-price mb-2 bg-danger" style="border-radius: 0.25rem;text-decoration: line-through"><?php echo e(number_format($book->price)); ?> تومان </span>
                            <span class="book-price" style="border-radius: 0.25rem"><?php echo e(number_format( (int)($book->price - ($book->price * $book->discount_percent/100)))); ?> تومان </span>
                            <?php else: ?>
                                <span class="book-price" style="border-radius: 0.25rem"> <?php echo e(number_format($book->price)); ?> تومان </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="container" >
            <div class="d-flex justify-content-center">
                <div class="flex-item text-center mt-2" style="">
                    <nav aria-label="Page navigation example"  >
                        <ul class="pagination" >
                            <?php echo e($books->links()); ?>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>