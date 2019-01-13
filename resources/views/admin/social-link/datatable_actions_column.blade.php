<a href="{{ route('admin.social.links.edit', ['socialLink' => $model]) }}"><i class="glyphicon glyphicon-pencil"></i></a>
<form class="delete-form" action="{{ route('admin.social.links.delete', ['socialLink' => $model]) }}" method="post">
    @csrf
    {{ method_field('DELETE') }}
    <button>
        <i class="glyphicon glyphicon-trash"></i>
    </button>
</form>