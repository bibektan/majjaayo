<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">Mobile</th>
            <th scope="col">Address</th>
            <th scope="col">GPS</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key=>$order)
            <?php
                $color = 'btn-danger';
                if($order->status == 'new'){
                    $color = 'btn-danger';
                }elseif ($order->status == 'process') {
                    $color = 'btn-primary';
                }elseif ($order->status == 'complete') {
                    $color = 'btn-success';
                }
            ?>
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->product}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>
                        <button wire:click="pickId({{$order->id}})" type="button" class="btn {{$color}}">{{$order->status}}</button>
                    </td>
                    <td>{{$order->user->mobile}}</td>
                    <td>{{$order->user->address}}</td>
                    <td>{{$order->user->location}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($isOpen)
        <div class="position-relative mt-3">
            <div class="position-absolute start-50 translate-middle-x">
                <div class="card shadow" style="width: 18rem;">
                    <div class="card-body p-3">
                        <button wire:click="changeStatus('new')" class="btn btn-danger">new</button>
                        <button wire:click="changeStatus('process')" class="btn btn-primary">process</button>
                        <button wire:click="changeStatus('complete')" class="btn btn-success">complete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


</div>
