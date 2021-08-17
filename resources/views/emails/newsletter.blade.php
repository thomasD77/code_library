@component('mail::message')
<div class="container-fluid">
    <div class="row">
            <div class="card">
                <div class="">
                    <img class="center" src="{{$data['image'] ? asset('images/newsletters') . $data['image'] : 'http://placehold.it/62x62'}}" alt="{{$data['title']}}">
                </div>
                <div class="card-body">
                    <h1>DIVEMASTER</h1>
                    <h2 class="card-title">Title:</h2>
                    <p class="card-text">{{$data['title']}}</p>
                    <h2 class="card-title">Text:</h2>
                    <p class="card-text">{{$data['body']}}</p>
                    <h2 class="card-title">Created:</h2>
                    <p class="card-text">{{$data['created_at']}}</p>
                    <h2 class="card-title">Updated:</h2>
                    <p class="card-text">{{$data['updated_at']}}</p>
                </div>
            </div>
    </div>
</div>
@endcomponent
