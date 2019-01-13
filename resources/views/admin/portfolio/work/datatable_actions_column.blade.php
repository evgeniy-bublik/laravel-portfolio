<a href="{{ route('admin.portfolio.works.edit', ['work' => $model]) }}"><i class="glyphicon glyphicon-pencil"></i></a>
<form class="delete-form" action="{{ route('admin.portfolio.works.delete', ['work' => $model]) }}" method="post">
    @csrf
    {{ method_field('DELETE') }}
    <button>
        <i class="glyphicon glyphicon-trash"></i>
    </button>
</form>