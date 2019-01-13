<a href="{{ route('admin.blog.comments.edit', ['comment' => $model]) }}"><i class="glyphicon glyphicon-pencil"></i></a>
<form class="delete-form" action="{{ route('admin.blog.comments.delete', ['comment' => $model]) }}" method="post">
    @csrf
    {{ method_field('DELETE') }}
    <button>
        <i class="glyphicon glyphicon-trash"></i>
    </button>
</form>