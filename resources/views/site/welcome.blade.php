@extends('layouts.app')
@section('content')






    <div class=" bg-light books-container p-3">


        <form action="{{route('book-search')}}" method="get" class="mt-2 mb-5 text-center">
            @csrf
            <div class="form-group  d-flex align-items-center justify-content-center">
                <div class=" " style="min-width: 40%">
                    <input  name="text" type="text" class="form-control" style="border: 1px darkorange solid"
                            @if(!empty($search))
                                value="{{$search}}"
                            @endif
                            placeholder="بخشی از نام کتاب یا نویسنده را وارد کنید" >
                </div>
                <button type="submit" class="btn btn-outline-info text-white " style="width: 8%;background: #1b9abd;margin-right: 10px">جستجو</button>
            </div>
        </form>
        <div class="d-flex flex-wrap align-content-center m-3 bg-info p-2" style="border-radius: 0.25rem">
            <span class="mt-2 mr-5 text-white">دسته بندی ها : </span>
            <a href="{{route('site-home')}}" class="btn btn-light m-1  mx-2  @if(\Illuminate\Support\Facades\Request::path() == '/')bg-warning border-0 @endif">همه کتاب ها</a>
            @foreach($categories as $category)
                <a href="{{route('category-books', $category->id)}}" class="btn btn-light m-1  mx-2
                    @if(\Illuminate\Support\Facades\Request::path() == 'category/'.$category->id.'/books')
                        bg-warning border-0
                    @endif">{{$category->name}}
                </a>
            @endforeach
        </div>
        <div id="allBooks" class="d-flex flex-row flex-wrap m-0 p-1 p-sm-3 justify-content-center">
            @foreach($books as $book)
                <a href="{{route('detail', $book->id)}}" class="d-block text-center book-link">
                    <div class="book-container d-flex flex-column align-items-center m-3" style="min-height: 300px !important;">
                        <img src="{{asset($book->image_path)}}" class="book-img mb-2"/>
                        <div class="d-flex flex-column align-self-stretch ">
                            <span class="mb-1" style="min-height: 50px;max-height: 80px;overflow: hidden">{{$book->name}}</span>
                            <span class="mb-2" style="min-height: 25px;max-height: 25px;overflow: hidden">{{$book->author}}</span>
                            @if($book->discount_percent > 0)
                            <span class="book-price mb-2 bg-danger" style="border-radius: 0.25rem;text-decoration: line-through">{{number_format($book->price)}} تومان </span>
                            <span class="book-price" style="border-radius: 0.25rem">{{number_format( (int)($book->price - ($book->price * $book->discount_percent/100)))}} تومان </span>
                            @else
                                <span class="book-price" style="border-radius: 0.25rem"> {{number_format($book->price)}} تومان </span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="container" >
            <div class="d-flex justify-content-center">
                <div class="flex-item text-center mt-2" style="">
                    <nav aria-label="Page navigation example"  >
                        <ul class="pagination" >
                            {{$books->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
@stop
