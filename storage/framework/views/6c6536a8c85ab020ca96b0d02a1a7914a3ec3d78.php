<?php $__env->startSection('admin_content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-10 m-auto">
                <h6 class="mb-3">ویرایش کتاب</h6>
                <form action="<?php echo e(route('admin-book-edit')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="postTitle" class="col-sm-2 col-form-label">عنوان کتاب</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="عنوان کتاب را وارد کنید" value="<?php echo e($book->name); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">تصویر روی جلد</legend>
                            <div class="col-sm-7">
                                <input type="file" name="image" accept="image/*" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="important" class="col-form-label col-sm-2 pt-0">انتخاب به عنوان مهم</label>
                            <div class="col-sm-7">
                                <input id="important" type="checkbox" <?php if($book->is_important == 1): ?> checked <?php endif; ?> name="is_important" style="width: 15px;height: 15px"  />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="category" class="col-form-label col-sm-2 pt-0">دسته بندی</label>

                            <div class="col-sm-7">
                                <select class="form-control" name="category_id" id="category">
                                    <option value="0"></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php if($book->category_id == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">قیمت کتاب</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="قیمت کتاب را به تومان وارد کنید" type="number" value="<?php echo e($book->price); ?>" name="price" required/>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">درصد تخفیف</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="درصد را از 1 تا 100 به عدد وارد کنید" type="number" value="<?php echo e($book->discount_percent); ?>" name="discount_percent" required/>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">نویسنده کتاب</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="نویسنده کتاب" type="text" name="author" value="<?php echo e($book->author); ?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">مترجم کتاب</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="مترجم کتاب(در صورت وجود وارد کنید)" type="text" name="translator" value="<?php echo e($book->translator); ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">ناشر</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="انتشارات" type="text" name="publisher" value="<?php echo e($book->publisher); ?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">سال و نوبت نشر</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="سال نشر" type="text" name="publication_date" value="<?php echo e($book->publication_date); ?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">تعداد صفحات</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="تعداد صفحات کتاب" type="number" name="page_count" value="<?php echo e($book->page_count); ?>" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">تعداد</legend>
                            <div class="col-sm-7">
                                <input class="form-control d-inline" placeholder="تعداد موجودی کتاب" type="number" name="stock" value="<?php echo e($book->stock); ?>" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">توضیحات کتاب</div>
                        <div class="col-sm-10">
                            <textarea name="description"  class="form-control rtl "
                                      placeholder="توضیحات کتاب را وارد کنید"
                                      rows="5" required><?php echo e($book->description); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">نسخه دمو(pdf)</legend>
                            <div class="col-sm-7">
                                <input type="file" name="demo_file" accept="application/pdf" />
                            </div>
                        </div>
                    </div>

                    <br>



                    <input type="hidden" name="book_id" value="<?php echo e($book->id); ?>">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-blue">ثبت تغییرات</button>

                        </div>
                    </div>
                </form>

                <form class="text-center" action="<?php echo e(route('admin-book-remove')); ?>" method="post" onsubmit="return confirm('آیا از حذف کتاب مطمئن هستید؟')">
                    <input type="hidden" name="book_id" value="<?php echo e($book->id); ?>">
                    <input type="submit" class="btn btn btn-danger" value="حذف این کتاب">
                    <?php echo csrf_field(); ?>
                </form>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>