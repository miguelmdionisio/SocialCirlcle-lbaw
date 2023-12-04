@section('sidebar')
    <aside class = 'sidebar'>
        <ul class="list-unstyled sidebar-itens-positioning">
            <li class="sidebar-top">
                <h1 id="page-title"><a href="{{ url('/home') }}">SocialCircle</a></h1>
            </li>
            <li>
                <a href="{{ url('/home') }}">Home</a>
            </li>
            <li>
                <a href="{{ url('/messages') }}">Messages</a>
            </li>
            <li>
                <a href = "{{ url('/groups') }}">Groups</a>
            </li>
            <li>
                <a href="{{ url('/friends') }}">Friends</a>
            </li>
        </ul>
    </aside>
@endsection
            
            