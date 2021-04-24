<h1>
    @if(isset($title)){{$title}} @endif
</h1>
<ol>
    <li><a href="{{route('blog.admin.index.index')}}"><i class="fa fa-dashboard"></i>{{$parent}}</a></li>
    @if(isset($user))
        <li><a href="{{ route('blog.admin.users.index') }}"><i></i>{{$user}}</a></li>
    @endif
    @if(isset($article))
        <li><a href="{{ route('blog.admin.articles.index') }}"><i></i>{{$article}}</a></li>
    @endif
    @if(isset($survey))
        <li><a href="{{ route('blog.admin.surveys.index') }}"><i></i>{{$survey}}</a></li>
    @endif
    @if(isset($test))
        <li><a href="{{ route('blog.admin.tests.index') }}"><i></i>{{$test}}</a></li>
    @endif
    @if(isset($survey_question))
        <li><a href="{{ route('blog.admin.survey_questions.index') }}"><i></i>{{$survey_question}}</a></li>
    @endif
    @if(isset($survey_answer))
        <li><a href="{{ route('blog.admin.survey_answers.index') }}"><i></i>{{$survey_answer}}</a></li>
    @endif
    <li><i class="active"></i>{{$active}}</li>
</ol>
