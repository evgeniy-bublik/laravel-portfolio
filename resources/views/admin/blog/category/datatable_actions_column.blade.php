<a href="{{ route('admin.blog.categories.edit', ['category' => $model]) }}"><i class="glyphicon glyphicon-pencil"></i></a>
<form class="delete-form" action="{{ route('admin.blog.categories.delete', ['category' => $model]) }}" method="post">
    @csrf
    {{ method_field('DELETE') }}
    <button>
        <i class="glyphicon glyphicon-trash"></i>
    </button>
</form>