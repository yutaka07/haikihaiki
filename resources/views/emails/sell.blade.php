
{{ $admin->name }}　{{$admin->branch}}様

{{ $user->name }}様によって{{ $product->name }}が購入されました。

商品
商品名：{{ $product->name }}
商品詳細：{{ $product->comment }}
消費期限：{{ $product->expiration_date }}
価格：{{ $product->price }}円

