@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($categories as $category)

           

            <div class="card " style="margin-bottom: 10px">
                <div class="card-header">{{$category->name }} Articles</div>
                   <div class="card-body">
                            <div class="d-flex flex-row bd-highlight mb-3">
                                @foreach ($articles as $article)
                                <div class="p-2 bd-highlight">
                                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                        <div class="card-header">{{ $article->title }}</div>
                                        <div class="card-body">
                                          <h5 class="card-title">Primary card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                      </div>
                                </div>
                                @endforeach
                              </div>
                </div>
            </div>

         
            @endforeach





            
        </div>
    </div>
</div>
@endsection
