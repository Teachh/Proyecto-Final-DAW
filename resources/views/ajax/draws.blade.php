@foreach($draws as $d)
@php
    // Arreglar error que te lo detecta mal
    $draw = App\Draw::findOrFail($d->id);
@endphp
<div class="container">
    <div class="col-md-12 row mb-4 mt-2">
        <img class="w-25 h-50  rounded-circle col-12 col-md-4" src="{{url($draw->image)}}">
        <div class="col-12 col-md-8 text text-2 pl-md-4">
            <h3 class="mb-2"><a href="{{action('DrawController@show', $draw->id)}}">{{$draw->title}}</a></h3>
            <p>{{$draw->description}}</p>
            <div class="row">
                <div class="meta-wrap col-12">
                    <p class="meta">
                        @php
                        // Contar los votos
                        $votes = $draw->votes;
                        $pos = 0;
                        $neg = 0;
                        foreach($votes as $vote){
                        if($vote->vote == 'pos'){
                        $pos = $pos+1;
                        }
                        else{
                        $neg = $neg+1;
                        }
                        }
                        @endphp
                        <span><i class="fas fa-thumbs-up"></i> {{$pos}}</span>
                        <span><i class="fas fa-thumbs-down"></i> {{$neg}}</span>
                    </p>
                </div>
                <div class="col-12 row">
                    <p class="mb-4 col-4"><a style="color:black" href="{{action('UserController@show', $draw->user->id)}}"><i class="fas fa-user"></i> {{$draw->user->name}}</a></p>
                    <p class="col-8 float-right"><a href="{{action('DrawController@show', $draw->id)}}" class="btn btn-outline-warning">Entrar al dibujo <i class="fas fa-eye"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
{!! $draws->links() !!}
