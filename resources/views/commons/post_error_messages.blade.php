@if(count($errors) > 0)
 <ul class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)
   <li class="ml-4">{{ $error }}</li>
  @endforeach
  @if(empty($errors->first('image')))
   <li>画像ファイルがあれば再度選択してください</li>
  @endif
 </ul>
@endif
