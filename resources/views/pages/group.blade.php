@extends('layouts.app')

@section('content') 
@include('sidebars.bar')

<?php
    use App\Models\GroupJoinRequest;
    if ($group->ispublic == 1 || $group->isMember(Auth::user())) { ?>
        
    <div class="group-container">
        <h1 class="group-name">{{ $group->name }}</h1>
        <h2 class="group-description">{{ $group->description }}</h2>

        <h3 class="group-posts-heading">Posts:</h3>
    </div>
        <section class="group-posts-section" id='posts'>
            @each ('partials.posts', $posts, 'post')
        </section>
    <?php
    }
    else { ?>
        <div class="group-container">
            <h1 class="group-name">{{ $group->name }}</h1>
            <h2 class="group-description">{{ $group->description }}</h2>
            <?php 
                if (GroupJoinRequest::exists($group->groupid, Auth::user()->id)){ ?>
                    <form action = "{{route('group-join-request.remove', ['id' => $group->groupid]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="group-requested-button">Requested</button>
                    </form> 
                    <?php }
                    else { ?>
                        <form action = "{{route('group-join-request.create', ['id' => $group->groupid]) }}" method="POST">
                            @csrf
                            <button class="group-request-button">Request to join</button>
                        </form>
                    <?php } ?>
        </div>
            <section class = "group-notmember">
                <h3 class="notmember-text">This group is private. You must be a member to view posts.</h3>
            </section>
    <?php
    }
    ?>
@endsection