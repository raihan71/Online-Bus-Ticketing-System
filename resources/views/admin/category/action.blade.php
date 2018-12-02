<center>
	<span><a href="{{route('admin.manage-category.show', urlencode(base64_encode($id))) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> {{__('Detail')}}</a></span>
	<span><a href="{{route('admin.manage-category.edit', urlencode(base64_encode($id))) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i> {{__('Edit')}}</a></span>
	<span><a href="{{route('admin.manage-category.delete',$id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></span>
</center>