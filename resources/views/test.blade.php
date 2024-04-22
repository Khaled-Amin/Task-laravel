@extends('layouts.nav&footer')
@section('content')



    <section>


        <h3>{{__('messages.welcome')}}</h3>
    @foreach ($article as $item)
        <div>
            <h3>
                {{$item->title}}
            </h3>
            <p>{{$item->descr}}</p>
        </div>
    @endforeach

</section>

@endsection

<style>
    section{
        width: 100%;
        margin: 50px auto;
        background: #f1f1f1;
    }
    section div {
        margin-left: 5rem
    }
</style>
