@if ($errors->any())
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     @endforeach
     <p class="text-center text-danger">画像を選択された方は、恐れ入りますが再度画像を選択してください。</p>
@endif