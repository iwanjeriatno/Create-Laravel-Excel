<html>

    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr height="30px" style="text-align:center; background-color:green">
        <th></th>
        <th>No</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo</th>
    </tr>
    @foreach($data as $d)
        <tr>
            <th></th>
            <th>{{ $d['id'] }}</th>
            <td style="text-align: center">{{ $date = date('d-m-Y', strtotime(str_replace('/', '-', $d['tanggal']))) }}</td>
            <td>{{ $d['keterangan'] }}</td>
            <td>{{ $d['debet'] }}</td>
            <td>{{ $d['kredit'] }}</td>
            <td>{{ $d['saldo'] }}</td>
        </tr>       
    @endforeach
    <tr></tr>
    <tr style="background-color:green">
        <td></td>
        <td></td>
        <td></td>
        <td>Jumlah</td>
        <td>{{ $total_debet }}</td>
        <td>{{ $total_kredit }}</td>
        <td>{{ $total_saldo }}</td>
    </tr>

</html>