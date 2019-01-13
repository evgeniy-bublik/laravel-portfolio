<a href="{{ route('admin.portfolio.categories.edit', ['category' => $model]) }}"><i class="glyphicon glyphicon-pencil"></i></a>
<form class="delete-form" action="{{ route('admin.portfolio.categories.delete', ['category' => $model]) }}" method="post">
    @csrf
    {{ method_field('DELETE') }}
    <button>
        <i class="glyphicon glyphicon-trash"></i>
    </button>
</form>