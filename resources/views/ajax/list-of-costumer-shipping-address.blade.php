@foreach ($csa_items as $key => $csa)
    <a href='#/' class="shipping-address" data-csa-id="{{ $csa->id }}">
    <div class="well">
        {{ $csa->address }}<br>
        Kecamatan {{ $csa->kecamatan }} , {{ $csa->kotamadya }} , {{ $csa->provinsi }}<br>
        {{ $csa->postal_code }}<br>
        Penerima: {{ $csa->receiver_name }}<br>
        No. Telepon: {{ $csa->receiver_phone_number }}
    </div>
    </a>
@endforeach
