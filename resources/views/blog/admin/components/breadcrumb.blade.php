<h1>
    @if(isset($title)){{$title}} @endif
</h1>
<ol>
    <li><a href="{{route('blog.admin.index.index')}}"><i class="fa fa-dashboard"></i>{{$parent}}</a></li>
    @if(isset($order))
        <li><a href=""><i></i>{{$order}}</a></li>
    @endif
    <li><i class="active"></i>{{$active}}</li>
</ol>
