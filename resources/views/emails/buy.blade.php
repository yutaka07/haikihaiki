

{{$user->name}}様

{{$product->name}}を購入しました。

商品
商品名：{{ $product->name }}
商品詳細：{{ $product->comment }}
消費期限：{{ $product->expiration_date }}
価格：{{ $product->price }}円

下記の住所の店舗まで取りに行ってください。
住所：{{$admin->address}}
