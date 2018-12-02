<center>
	<span><a href="{{route('admin.manage-brand.show', urlencode(base64_encode($id))) }}" class="btn btn-default btn-md"><i class="fa fa-eye"></i> {{__('Detail')}}</a></span>
	<span><a href="{{route('admin.manage-brand.edit', urlencode(base64_encode($id))) }}" class="btn btn-default btn-md"><i class="fa fa-pencil"></i> {{__('Edit')}}</a></span>
</center>