
<div class="main-container">

    <div class="row gutters mb-3">
        <div class="col-md-12 mb-2">
            @include('admin.layouts.alert')
        </div>

        <div class="col-xs-2 mb-2">
            <a href="{{ route('dashboard', 'web') }}" class="btn btn-primary">Back</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                ADD NEW
            </button>
        </div>
    </div>

    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="table-container">
                <div class="table-responsive">
                    <table id="copy-print-csv" class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Id</th>
                                <th>Product</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>CH0X0{{ $order->id}}</td>
                                    <td>
                                        @if($order->status=="new")
                                        <button  wire:click="packed" type="button" class="btn btn-primary btn-block">Pack</button>
                                        @elseif ($order->status=="packed")
                                        <button  wire:click="shipped" type="button" class="btn btn-primary btn-block">ship</button>
                                        @elseif ($order->status=="shipped")
                                        <button  wire:click="delivered" type="button" class="btn btn-primary btn-block">Deliver</button>
                                        @else
                                        <p>Delivered</p>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-gray-700">
                                    <td class="px-6 py-4 text-sm italic font-semibold" colspan="4">
                                        No Data Found...
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
