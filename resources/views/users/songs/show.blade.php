@extends('master')
@section('content')


    <div class="col-xs-6">

        <h2>{{ $song->title }}</h2>

        <p>User: <a href="{{route('user.show', ['user' => $song->User])}}">{{$song->User->name}}</a></p>  
        <p>Created by: {{$song->creators}}</p>            
        <p>Description: {{ $song->description }} </p>
        <p>Category: {{ $song->Category->name }} </p>
        

        <iframe width="100%" height="300" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url={{$song->url}}&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>
       
    </div>


    <div class="col-xs-6">

        <table class="table vote">

            <thead>

                <tr>        
                    <th>Vote Up</th>

                    <th>Vote Down</th>                
                </tr>
           
            </thead>
            <tbody>
                
                <tr>
                    <td><a href="{{route('song.vote.up', ['song' => $song])}}"><i class="fa fa-thumbs-o-up fa-2x" aria-hidden="true"></i></a></td>
                
                    <td><a href="{{route('song.vote.down', ['song' => $song])}}"><i class="fa fa-thumbs-o-down fa-2x" aria-hidden="true"></i></a></td>              
                </tr>                
                <tr>
                
                    <td>Total score: {{$song->Vote->sum('vote_value')}}</td>
                
                </tr>                
                <tr>
                
                    <td>Total votes: {{$song->Vote->count()}}</td>
                </tr> 
           
            </tbody>
        
        </table>
        

         <form action="{{route('song.comment.create', ['song' => $song])}}" method="post">

            {{csrf_field()}}

            <div class="form-group">

                <label for="body">Add comment</label>
                <textarea class="form-control" name="body" id="body" cols="10" rows="4"></textarea>
                <button class="btn btn-success form-control" type="submit">Leave comment</button>
        
            </div>
        
        </form>

        @if(count($song->Comment))

            <table class="table table-striped">

                <thead>
                    <th>From</th>      

                    <th>Comment</th>      

                    <th>Comment created</th>      
                </thead>

  
                    @foreach($song->Comment as $comment)

                        <tr>                  
                            <td>
                                <a href="{{route('user.show', $comment->User)}}">{{$comment->User->name}}</a>
                         
                            </td>
                            <td>
                         
                                {{$comment->body}}
                         
                            </td>
                         
                            <td>                        
                                {{$comment->created_at}}
                            </td>                       
                        </tr>

                    @endforeach

            </table>
        
        @else
        
            <h4>No comments</h4>
        
        @endif

    </div>


@endsection
